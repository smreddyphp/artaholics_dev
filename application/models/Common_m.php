<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');


class Common_m extends CI_Model
{

	public function get_sub_categories($id='')
	{
	    if($id !='')
	    {
	    	return $this->db->get_where('sub_categories',array('pcat_id'=>$id))->row_array();
	    }
	    else
	    {
	    	return $this->db->select('*')->from('sub_categories')->order_by('pcat_id','desc')->get()->result_array();
	    }
	}

	public function get_sub_categories_by_admin($status="")
	{	 
	    return $this->db->select('*')->from('sub_categories')->where("status !=",$status)->order_by('pcat_id','desc')->get()->result_array();
	}

	public function get_categories($id='')
	{
	    if($id !='')
	    {
	      return $this->db->get_where('categories',array('cat_id'=>$id))->row_array();
	    }
	    else
	    {
	      return $this->db->select('*')->from('categories')->order_by('cat_id','desc')->get()->result_array();    
	    }
	}

	public function get_categories_by_admin($status='')
	{	  
	      return $this->db->select('*')->from('categories')->where("status !=",$status)->order_by('cat_id','desc')->get()->result_array();
	}

	public function get_categories_by_status($status='')
	{
	    
	    return $this->db->select('*')->from('categories')->where('status',$status)->order_by('position','asc')->get()->result_array();
	}

	public function subcategories($id="")
	{
		return $this->db->where('cat_id',$id)->select('*')->from('sub_categories')->order_by('pcat_id','desc')->get()->result_array();
	}

	public function check_email_existance($email,$lang,$user_id="")
	{
		if($user_id != "")
		{
			$result = $this->db->get_where('users',array('email'=>$email,'user_id !=',$user_id))->result_array();
		}else{
			$result = $this->db->get_where('users',array('email'=>$email))->result_array();
		}
		
		if(count($result) != 0)
		{
			return ($lang =='en')?'This Email Already Exists':'هذا البريد الإلكتروني موجود بالفعل';
		}
		else
		{
			return true;
		}
	}

	public function get_cities($id="")
	{		
		return $this->db->query("select * from cities where state_id in(select id from states where country_id=$id)")->result_array();
	}

	public function get_color($id='')
	{
	    if($id !='')
	    {
	    	return $this->db->get_where('color',array('color_id'=>$id))->row_array();
	    }
	    else
	    {
	    	return $this->db->select('*')->from('color')->order_by('color_id','desc')->get()->result_array();  
	    }
	}	

	public function get_cproduct_colors($id="")
	{
		return $this->db->get_where('customised_product_colors',array('pro_id'=>$id))->result_array();
	}

	public function get_cproduct_sizes($id="")
	{
		return $this->db->get_where('customised_product_sizes',array('pro_id'=>$id))->result_array();
	}

	public function get_sizes($id='')
	{
	    if($id !='')
	    {
	    	return $this->db->get_where('sizes',array('size_id'=>$id))->row_array();
	    }
	    else
	    {
	    	return $this->db->select('*')->from('sizes')->order_by('size_id','desc')->get()->result_array();   
	    }
	}

	public function get_countries($id='')
	{
	    if($id !='')
	    {
	       return $this->db->get_where('country',array('id'=>$id))->row_array(); 
	    }
	    else
	    {
	      return $this->db->select('*')->from('country')->order_by('country_name','asc')->get()->result_array();      
	    }
	}

	public function get_customised_products($id='')
	{
	    if($id !='')
	    {	    	
	       return $this->db->get_where('customised_products',array('product_id'=>$id))->row_array(); 
	    }
	    else
	    {
	      return $this->db->select('*')->from('customised_products')->order_by('product_id','desc')->get()->result_array();      
	    }
	}

	public function get_customised_products_by_admin($status='')
	{	  
	      return $this->db->select('*')->from('customised_products')->where("status !=",$status)->order_by('product_id','desc')->get()->result_array();
	}

	public function get_contact_us()
	{
	     return $this->db->where('id',1)->select('*')->from('contact_us')->get()->row_array(); 
	}

	public function get_contact_us_requests()
	{
	     return $this->db->select('*')->from('contact')->get()->result_array(); 
	}



	public function get_products($product_type,$product_id="")
	{
		if($product_type != "" && $product_id != "")
		{
			$this->db->where("product_type",$product_type);
			$this->db->where("pro_id",$product_id);
			return $this->db->get("products")->row_array();			
		}
		else
		{
			$this->db->order_by("pro_id","desc");
			$this->db->where("product_type",$product_type);
			return $this->db->get("products")->result_array();		     
		}
	}

	public function get_customised_products_list()
	{      
	 	$this->db->select('a.*,b.*,c.*');
	    $this->db->from('products a');
	    $this->db->join('customised_products b', 'b.product_id = a.customised_product_id', 'left'); 
	    $this->db->join('categories c', 'c.cat_id = b.category','left');
	    $this->db->where('a.product_type',2);
	    $this->db->where('a.approval_status != ',2);
	    $query = $this->db->get();
	    return $query->result_array();
	}

	public function get_sub_user_permissions($user_id)
	{
		$user = $this->db->where("user_id",$user_id)->get("users")->row_array();
		$permission = explode(",",$user['permissions']);
			foreach(@$permission as $key => $value)
			{
				$permissions[] = $value;
			}

			return $permissions;
	}

	public function get_user_details($id='')
	{
		if(@$id)
		{
	     	return  $this->db->get_where('users',array('user_id'=>$id))->row();	 
		}
		else
		{
			return	 $this->db->get_where('users',array('auth_level'=>9))->row();			
		}	 
	}

	public function get_ads($id='')
	 {
		if($id)
		{
			return $this->db->select('*')->from('ads')->where('ads_id',$id)->get()->row_array();
		}
		else
		{
			return $this->db->select('*')->from('ads')->order_by('ads_id desc')->get()->result_array();
		}
	}

	public function get_banners($id='')
	 {
		if($id)
		{
			return $this->db->select('*')->from('banners')->where('banner_id',$id)->get()->row_array();
		}
		else
		{
			return $this->db->select('*')->from('banners')->order_by('banner_id desc')->get()->result_array();
		}
	}

	public function get_active_banners()
	{		
		return $this->db->where("status",1)->get('banners')->result_array();
	}

	public function get_active_ads()
	{		
		return $this->db->where("status",1)->get('ads')->result_array();
	}

	public function get_active_social()
	{		
		return $this->db->where("status",1)->get('social_media')->result_array();
	}
	public function get_active_testimonials()
	{		
		return $this->db->where("status",1)->get('testimonials')->result_array();
	}

	public function get_designs($id='')
	{
	    if($id !='')
	    {
	    return $this->db->get_where('designs',array('design_id'=>$id))->row_array();
	    }
	    else
	    {
	    	return $this->db->select('*')->from('designs')->order_by('design_id','desc')->get()->result_array();   
	    }
	}

	public function get_testimonials($id="")
	{
		if($id != "")
		{
			$this->db->where("id",$id);
			$result = $this->db->get("testimonials");
			return $result->row_array();
		}
		else
		{
			$res = $this->db->get("testimonials");
			return $res->result_array();
		}
	}

	public function get_featured_products($limit="")
	{
		if($limit != "")
		{			
			$result = $this->db->query("select * from products where product_type=2 and feature_product=1 and approval_status=1 limit 0,$limit")->result_array();
			return $result;
		}
		else
		{
			return $this->db->where(array("product_type"=>2,"feature_product"=>1,"approval_status"=>1))->get("products")->result_array();
		}		
	}

	public function get_featured_artists()
	{					
	    $result = $this->db->query("select users.*,country.country_name,cities.name as city_name from users join country on users.country=country.id join cities on users.city=cities.id where users.auth_level=6 and users.featured_artist = 1 and users.status = 1")->result_array();		
	   return $result;				
	}

	public function featured_artist_products($user_id,$limit="")
	{
		if($limit)
		{
			return $this->db->query("select * from products where user_id = $user_id and approval_status=1 limit 0,3")->result_array();
		}else{
			return $this->db->query("select * from products where user_id = $user_id and approval_status=1")->result_array();
		}
	   
	}

	public function get_favorites($user_id="")
	{
		$favorites = $this->db->where("user_id",$user_id)->get("favourites")->result_array();
		if(@$favorites){
			foreach ($favorites as $key => $value)
			{
				$result[] = $value['pro_id'];
			}
			return $result;
		}		
	}

	public function get_followers($user_id="")
	{
		$favorites = $this->db->where("user_id",$user_id)->get("followers")->result_array();
		if(@$favorites){
			foreach ($favorites as $key => $value)
			{
				$result[] = $value['follower_id'];
			}
			return $result;
		}		
	}


		//updated Methods above
	

	

	public function get_users_list($auth_level,$status='')
	{     
        return $this->db->where('auth_level',$auth_level)->order_by('user_id','desc')->get('users')->result_array();                 
    }   

	public function get_favorite($id)
	{
	    $this->db->select('products.*');
	    $this->db->from('products');
	    $this->db->join('my_favorite','products.prod_id = my_favorite.prod_id');
	    $this->db->where('my_favorite.user_id',$id);
	    return $this->db->get()->result_array();
	}

	public function get_request_detail($prod_id)
	{
	    $this->db->select('products.*,user_name,user_image');
	    $this->db->from('products');
	    $this->db->join('users','products.user_id = users.user_id');
	    $this->db->where('products.pro_id',$prod_id);
	    return $this->db->get()->row_array();
	}	
	
	public function get_product_type($id='')
	{
	    if($id !='')
	    {
	    return $this->db->get_where('product_type',array('type_id'=>$id))->row_array();
	    }
	    else
	    {
	    return $this->db->select('*')->from('product_type')->order_by('type_id','desc')->get()->result_array();    
	    }
	}

	public function get_reports()
	{
	     return $this->db->select('*')->from('reports')->order_by("report_id", "desc")->get()->result_array(); 
	}
		
	
	public function get_currency($id='')
	{
	     if($id !='')
	    {
	    return $this->db->get_where('currency',array('currency_id'=>$id))->row_array();
	    }
	    else
	    {
	      return $this->db->select('*')->from('currency')->order_by('currency_id','desc')->get()->result_array();    
	    }	    
	}	
	
	public function get_product($data)
	{
         $this->db->select('*');
         $this->db->order_by("prod_id", "desc");
         
         if($data['pcat_id'] ==0 & $data['ptype'] ==0)
         {
         return $this->db->get('products')->result_array();    
         }
         else
         {
         return $this->db->get_where('products',array('category_id'=>$data['pcat_id'],'type_id'=>$data['ptype']))->result_array();
         }
	}
	
	public function get_terms($table,$id="")
	{
            if($id){
                return $this->db->select('*')->from($table)->where('id',$id)->get()->result_array();
            }else{
                return $this->db->get($table)->result_array();
            }            
    }  	
    
    public function get_about($table,$id="")
	{
            if($id){
                return $this->db->select('*')->from($table)->where('about_id',$id)->get()->result_array();
            }else{
                return $this->db->get($table)->result_array();
            }            
    }
    
    public function get_faq($table,$id="")
	{
            if($id)
            {
                return $this->db->select('*')->from($table)->where('id',$id)->get()->result_array();
            }
            else
            {
                return $this->db->get($table)->result_array();
            }            
    }  
    
    
    public function get_item_check($table,$id="")
	{
            if($id){
                return $this->db->select('*')->from($table)->where('item_check_id',$id)->get()->result_array();
            }else{
                return $this->db->get($table)->result_array();
            }            
    }
    
    public function get_social_media($id="")
	{
            if($id)
            {
                return $this->db->select('*')->from('social_media')->where('id',$id)->get()->row_array();
            }else{
                return $this->db->get('social_media')->result_array();
            }            
    }
    
    public function get_faq_web($id="")
	{
            if($id)
            {
                return $this->db->select('*')->from('faq_website')->where('faq_id',$id)->get()->result_array();
            }else{
                return $this->db->get('faq_website')->result_array();
            }            
    }
    
    public function get_subscribe($id="")
	{
        if($id)
        {
            return $this->db->select('*')->from('subscribe')->where('sub_id',$id)->get()->result_array();
        }else{
            return $this->db->get('subscribe')->result_array();
        }            
    }
    
    public function get_support($id="")
	{
        if($id)
        {
            return $this->db->select('*')->from('support_center')->where('support_id',$id)->get()->result_array();
        }else{
            return $this->db->get('support_center')->result_array();
        }            
    }
}