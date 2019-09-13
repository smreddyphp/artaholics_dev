<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');


class Website_Model extends CI_Model {


    public function __construct()
    {
        parent :: __construct();
       
    }

    public function get_category_products($category="")
    {
        if($category != "")
        {
           $result = $this->db->query("select * from products where customised_product_id in (select product_id from customised_products where category=$category) and approval_status=1 and status=1 and product_type=2");
           return $result->result_array();
        }
        else
        {
            return array();
        }
    }

    public function get_order_items($id='')
    {        
        $result = $this->db->where("id",$id)->get("orders")->row_array();
        $this->db->select('oi.*, p.product_image, p.product_name');
        $this->db->from('order_items'.' as oi');
        $this->db->join('products'.' as p', 'p.pro_id = oi.product_id', 'left');
        $this->db->where('oi.order_id', $id);
        $query2 = $this->db->get();
        $result['order_items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        return !empty($result)?$result:false;
    }

    public function artist_sales($user_id="")
    {
        return $this->db->query("select * from products where user_id = $user_id and pro_id in (select product_id from order_items)")->result_array();
    }

    public function some_artist_works()
    {
        return $this->db->order_by("pro_id","RANDOM")->where(array("approval_status"=>1,"status"=>1,"product_type"=>2))->limit(3)->get("products")->result_array();
    }

   /* public function getOrder($id)
    {
       /* $this->db->select('o.*, c.name, c.email, c.phone, c.address');
        $this->db->from('orders'.' as o');
        $this->db->join('users'.' as c', 'c.id = o.user_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('i.*, p.image, p.name, p.price');
        $this->db->from('order_items'.' as i');
        $this->db->join('products'.' as p', 'p.id = i.product_id', 'left');
        $this->db->where('i.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // Return fetched data
        return !empty($result)?$result:false;
    }*/

    public function get_user($user_id)
    {
        $result = $this->db->query("select users.*,country.country_name,cities.name as city_name from users join country on users.country=country.id join cities on users.city=cities.id where users.user_id=$user_id")->row_array();     
        return $result;  
    }

    public function get_customised_product_data($customised_product_id)
    {
        $result = $this->db->query("select customised_products.*,categories.category_name_en ,categories.category_name_ar from customised_products join categories on customised_products.category=categories.cat_id where customised_products.product_id=$customised_product_id")->row_array();     
        return $result;  
    }

    public function get_product_data($product_type,$product_id="")
    {
        if($product_type =='2')
        {
            $data = $this->db->where("pro_id",$product_id)->get("products")->row_array();
            $id = $data['customised_product_id'];
            $data['colors'] = $this->db->query("select * from color where color_id in(select color_id from customised_product_colors where pro_id=$id)")->result_array();
            $data['sizes'] = $this->db->query("select * from sizes where size_id in(select size_id from customised_product_sizes where pro_id=$id)")->result_array();
            $data['customised_product'] = $this->db->query("select * from customised_products where product_id=$id")->row_array();
            return $data;
        }
    }

    public function get_artist_uploaded_product_categories($user_id)
    {
        return $this->db->query("select distinct(category) from customised_products where product_id in (select customised_product_id from products where user_id=$user_id and status = 1 and approval_status = 1)")->result_array();
    }

    public function get_artist_products_by_categories($category,$user_id,$limit="")
    {
        if($limit != "")
        {
             return $this->db->query("select * from products where customised_product_id in (select product_id from customised_products where category=$category) and product_type=2 and approval_status=1 and status=1 and user_id=$user_id limit 0,$limit")->result_array();
        }
        else
        {
             return $this->db->query("select * from products where customised_product_id in (select product_id from customised_products where category=$category) and product_type=2 and status=1 and approval_status=1 and user_id=$user_id")->result_array();
        }
       
    }

    public function get_user_favorites($user_id)
    {
        return $this->db->query("select * from products where pro_id in (select pro_id from favourites where user_id=$user_id) and status=1 and approval_status=1")->result_array();
    }

    public function get_user_followings($user_id)
    {
        return $this->db->query("select * from users where user_id in (select follower_id from followers where user_id=$user_id) and status=1")->result_array();
    }

     public function search_items_by_filter($filter)
    {
         if($filter !='')
         {
             if(@$filter['category']!=''){
                $this->db->where_in('category',$filter['category'],false); 
             }

             if(@$filter['subcategory'] !=''){
                $this->db->where_in('sub_category',$filter['subcategory'],false);
             }

             if(@$filter['min_price'] !='' && $filter['max_price'] !=''){                 
                 $this->db->where("price BETWEEN ".$filter['min_price']." AND ".$filter['max_price']);
             }            

            $this->db->where_in('status',1,false);
            $results = $this->db->get("customised_products")->result_array();

            if(!empty(@$results))
            {
                foreach ($results as $key => $value) {
                    $products[]=$value['product_id'];
                }

                $products_array = (@$products)?$products:array();
            }

            if(@$filter['color'] != "")
            {
                $color = implode(',', $filter['color']);
                $colors = $this->db->where_in("color_id",$color)->get("customised_product_colors")->result_array();
                foreach($colors as $key=>$value)
                {
                    $color_ids[] = $value['pro_id'];
                }

                $colors_array = (@$color_ids)?$color_ids:array();               
            }

            if(@$filter['size'] != "")
            {                
                $size = implode(',',$filter['size']);
                $sizes = $this->db->where_in("size_id",$size)->get("customised_product_sizes")->result_array();
                foreach($sizes as $key=>$value)
                {
                    $size_ids[] = $value['pro_id'];
                }
                $sizes_array = (@$size_ids)?$size_ids:array();
            }

            if(@$filter['color'] != "" && @$filter['size'] != "" && !empty(@$products_array))
            {
                 $result = array_intersect(@$products_array,$colors_array,$sizes_array);
            }
            else if(@$filter['color'] != "" && !empty(@$products_array))
            {
                $result = array_intersect($products_array,$colors_array);
            }
            else if(@$filter['size'] != "" && !empty(@$products_array))
            {
                $result = array_intersect(@$products_array,$sizes_array);
            }
            else
            {
                $result = (@$products_array)?@$products_array:array();
            }
            return $result;
         }
    }

    public function product_search_filter($filter)
    {
        $result = $this->search_items_by_filter($filter);
        /* if($filter !='')
         {
             if(@$filter['category']!=''){
                $this->db->where_in('category',$filter['category'],false); 
             }

             if(@$filter['subcategory'] !=''){
                $this->db->where_in('sub_category',$filter['subcategory'],false);
             }

             if(@$filter['min_price'] !='' && $filter['max_price'] !=''){                 
                 $this->db->where("price BETWEEN ".$filter['min_price']." AND ".$filter['max_price']);
             }            

            $this->db->where_in('status',1,false);
            $results = $this->db->get("customised_products")->result_array();

            if(!empty(@$results))
            {
                foreach ($results as $key => $value) {
                    $products[]=$value['product_id'];
                }

                $products_array = (@$products)?$products:array();
            }

            if(@$filter['color'] != "")
            {
                $colors = $this->db->where("color_id",$filter['color'])->get("customised_product_colors")->result_array();
                foreach($colors as $key=>$value)
                {
                    $color_ids[] = $value['pro_id'];
                }

                $colors_array = (@$color_ids)?$color_ids:array();               
            }

            if(@$filter['size'] != "")
            {
                $sizes = $this->db->where("size_id",$filter['size'])->get("customised_product_sizes")->result_array();
                foreach($sizes as $key=>$value)
                {
                    $size_ids[] = $value['pro_id'];
                }

                $sizes_array = (@$size_ids)?$size_ids:array();

            }

            if(@$filter['color'] != "" && @$filter['size'] != "" && !empty(@$products_array))
            {
                 $result = array_intersect(@$products_array,$colors_array,$sizes_array);
            }
            else if(@$filter['color'] != "" && !empty(@$products_array) )
            {
                $result = array_intersect($products_array,$colors_array);
            }
            else if(@$filter['size'] != "" && !empty(@$products_array))
            {
                $result = array_intersect(@$products_array,$sizes_array);
            }
            else
            {
                $result = (@$products_array)?@$products_array:array();
            }*/

            if(!empty(@$result))
            {
                $string = implode(",",$result);
                $search_products = $this->db->query("select * from products where status=1 and approval_status=1 and customised_product_id in ($string)")->result_array();
                 return ($search_products)?$search_products:array();
            }
            else
            {
                return array();
            }    
    }

   

    public function search_artist_items_by_periority($data,$periority,$artist_id)
    {
        $result = $this->search_items_by_filter($data);
        if(@$result)
        {
            if(@$periority==2)
            {
                $top_selling_result = $this->top_selling_products();                
                $top = implode(",",$top_selling_result);
                $search_products = $this->db->query("select * from products where status=1 and user_id=$artist_id and approval_status=1 and pro_id in ($top)")->result_array();
            }

            if(@$periority==3)
            {
                 $search_products = $this->db->query("select * from products where status=1 and feature_product=1 and user_id = $artist_id and approval_status=1 and customised_product_id in ($string)")->result_array();
            }

             return ($search_products)?$search_products:array();
        }
        else
        {
            return array();
        }
    }

    public function search_items_by_periority($data,$periority)
    {
        $result = $this->search_items_by_filter($data);        
        if(@$result)
        {           
            $string = implode(",",$result);

            if(@$periority==3)
            {
                 $search_products = $this->db->query("select * from products where status=1 and feature_product=1 and approval_status=1 and customised_product_id in ($string)")->result_array();
            }

            if(@$periority==2)
            {
                 
                 $cate_products = $this->category_product_ids($string);
                 $top_selling_result = $this->top_selling_products();
                 $selling = array_intersect($cate_products,$top_selling_result);
                 if(@$selling)
                 {
                    $top = implode(",",$selling);
                    $search_products = $this->db->query("select * from products where status=1 and approval_status=1 and pro_id in ($top)")->result_array();
                 }
                 else
                 {
                    $search_products=array();
                 }
                 
            }
            return ($search_products)?$search_products:array();           
        }
        else
        {
            return array();
        }
    }

    public function category_product_ids($string)
    {
        $best_products = $this->db->query("select * from products where status=1 and approval_status=1 and customised_product_id in ($string)")->result_array();
        $best_products_ids = array();
        foreach ($best_products as $key => $value) {
            $best_products_ids[] = $value['pro_id'];
        }
        return $best_products_ids;
    }

    public function top_selling_products()
    {
        $result = $this->db->query("select product_id, sum(quantity) from order_items group by product_id Order by sum(quantity) desc")->result_array();
        $selling_products = array();
        foreach ($result as $key => $value) {
            $selling_products[] = $value['product_id'];
        }
        return $selling_products;
    }

    public function insert_order_items($data = array()) 
    {  
        $insert = $this->db->insert_batch("order_items",$data);
        return $insert?true:false;
    }

    public function insert_order($data)
    {        
        $insert = $this->db->insert("orders",$data);
        return $insert?$this->db->insert_id():false;
    }


    //Updated Methods Above
    
    public function get_product_type($lang)
    {
        if($lang == 'en')
        {
            $this->db->select('type_id,product_type_en as product_type,date,status');
        }
        else
        {
             $this->db->select('type_id,product_type_ar as product_type,date,status');
        }
        $this->db->where(array('status'=>1));
        return $this->db->from('product_type')->get()->result_array();
    }
    
     public function get_product_category($data)
    {
        if($data['lang'] == 'en')
        {
            $this->db->select('pcat_id,pcat_name_en as product_catgeory,date,status');
        }
        else
        {
            $this->db->select('pcat_id,pcat_name_ar as product_catgeory,date,status');
        }
        $this->db->where(array('type_id'=>$data['type_id'],'status'=>1));
        return $this->db->from('product_categories')->get()->result_array(); 
    }  
    
    public function get_ads($lang,$type)
    {
	  return $this->db->get_where('ads',array('type'=>$type,'status'=>1))->result_array();
    }
    
    
    public function get_category($lang)
    {
        if($lang =='en')
        {
            $this->db->select('pcat_id, pcat_name_en as pcat_name,date,status');
        }
        else
        {
            $this->db->select('pcat_id, pcat_name_ar as pcat_name, date, status');
        }
        //$this->db->order_by('brand_id','desc');
         $this->db->order_by('pcat_id','asc');
        return $this->db->get_where('product_categories',array('status'=>1))->result_array();
    }
    
    public function get_color($lang)
    {
        if($lang =='en')
        {
            $this->db->select('color_id,color_code, color_en as color,date,status');
        }
        else
        {
            $this->db->select('color_id,color_code, color_ar as color, date, status');
        }
        $this->db->order_by('color_id','desc');
        return $this->db->get_where('color',array('status'=>1))->result_array();
    }
    
    public function get_size()
    {
        $this->db->select('size_id,size,date,status');
        $this->db->order_by('size_id','desc');
        return $this->db->get_where('sizes',array('status'=>1))->result_array();
    }
    
    public function get_city($lang)
    {
        if($lang =='en')
        {
            $this->db->select('country_id as city_id, country_en as city');
        }
        else
        {
            $this->db->select('country_id as city_id, country_ar as city');
        }
        return $this->db->get_where('countries_name',array('status'=>1))->result_array();
    }      
    
}

?>