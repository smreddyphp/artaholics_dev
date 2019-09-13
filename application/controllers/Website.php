<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

    public function __construct()
    {
        parent :: __construct();

        if($this->session->userdata('lang'))
    		{
    			$language = $this->session->userdata('lang');
    		}
        else
        {
    	    $this->session->set_userdata('lang','en');
    	  }

        $language = $this->session->userdata('lang');

        if(!$this->input->is_ajax_request())
        {
           $_SESSION['current_url'] = current_url();
        }       
      
        define('LANG',$language,true);
        if($this->session->userdata('userdata'))
        {
        	  $user_id = $this->session->userdata('userdata')['user_id'];
            $auth_level = $this->session->userdata('userdata')['auth_level'];
            $this->data['user'] = $this->db->where("user_id",$user_id)->get("users")->row_array();
        	  define('USER_ID',$user_id,true);
            define('AUTH_LEVEL',$auth_level,true);
            $this->data['favourites'] = $this->common_m->get_favorites(user_id);
            $this->data['followers'] = $this->common_m->get_followers(user_id);
        }

    	  $this->load->helper('mail');
		    $this->load->library('parser');
	      $this->lang->load('main',$this->session->userdata('lang'));
        date_default_timezone_set('Asia/Kolkata');

	       $present_url = current_url();
       	 $array = explode('/', $present_url);
       	 $method_name = isset($array[5])?$array[5]:'';      

         if(isset($method_name))
         {
             $where['param_name'] = $method_name;
             $data = $this->db->get_where('lang_manage',$where)->row_array()['data_'.$language];
             $this->data["language"] = json_decode($data,TRUE);
         } 

         $where['param_name'] = "header"; //Header Page id
         $this->data["header"] = json_decode($this->db->get_where('lang_manage',$where)->row_array()['data_'.$language],TRUE);

         $where['param_name'] = "footer"; //Footer Page id
         $this->data["footer"] = json_decode($this->db->get_where('lang_manage',$where)->row_array()['data_'.$language],TRUE);
         $this->data['contact_us']     = $this->common_m->get_contact_us();
         //$this->data['categories'] = $this->common_m->get_categories();      
         $this->data['categories'] = $this->common_m->get_categories_by_status(1);      
         $this->data['testmonials'] = $this->common_m->get_active_testimonials();
         $this->data['cartitems'] = $this->cart->contents();     
    }   

    public function _remap($method, $params = array())
    {
        if(method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        else
        {
          $this->show_404();
        }        
    }

    public function friends()
   {
       $this->check_session();
       $this->data['page'] = "friends";
       $this->data['userdata'] = $this->website_Model->get_user(@user_id);
       $this->data['users'] = $this->db->where(array("auth_level"=>3,"status"=>1,"user_id !="=>user_id))->get("users")->result_array();
       $user_id = @user_id;
       $this->data['requests'] = $this->db->query("select * from users where user_id in (select user_id from followers where follower_id=$user_id and status=0)")->result_array();
       $this->data['friends'] = $this->db->query("select * from users where user_id in (select user_id from followers where follower_id=$user_id and status=1)")->result_array();
       //echo $this->db->last_query();exit();
       $this->load->view('website/includes/header',$this->data);
       $this->load->view('website/friends',$this->data);
       $this->load->view('website/includes/footer',$this->data);
   }     

  	public function index()
  	{
        if($this->session->userdata('logged_in') != TRUE)
        {
            $this->session->set_userdata('last_page',current_url());
        }

        $where['param_name'] = "index";
        $language = $this->session->userdata('lang');
        $data = $this->db->get_where('lang_manage',$where)->row_array()['data_'.$language];
        $this->data["language"] = json_decode($data,TRUE);
  	    $lang = $this->session->userdata('lang');
        $this->data['banners'] = $this->common_m->get_active_banners();
        $this->data['social'] = $this->common_m->get_active_social();
        $this->data['featured_products'] = $this->common_m->get_featured_products(12);
        $this->data['featured_artists'] = $this->common_m->get_featured_artists();
        $this->data['onepiece_ads'] = $this->common_m->get_active_ads(); 
        $this->data['artist_works'] = $this->website_Model->some_artist_works();
  	  	$this->load->view('website/includes/header',$this->data);
  	  	$this->load->view('website/index',$this->data);
  		  $this->load->view('website/includes/footer');
  	}

    public function search_users()
    {
       $value = $this->input->post("value");
       $status = $this->input->post("status");
      $this->data['userdata'] = $this->website_Model->get_user(@user_id);
      $user_id=@user_id;
      if($value != "")
      {
        if($status==1)
        {
          $this->data['users'] = $this->db->query("select * from users where auth_level=3 and status=1 and first_name like '%$value%'")->result_array();
        }
        else
        {
          
          $this->data['users'] = $this->db->query("select * from users where auth_level=3 and status=1 and first_name like '%$value%' and user_id in (select user_id from followers where follower_id=$user_id and status=1)")->result_array();
        }
        
      }
      else
      {
        if($status==1)
        {
          $this->data['users'] = $this->db->where(array("auth_level"=>3,"status"=>1,"user_id !="=>user_id))->get("users")->result_array();
        }
        else
        {
          $this->data['users'] = $this->db->query("select * from users where user_id in (select user_id from followers where follower_id=$user_id and status=1)")->result_array();
        }
        
      }
      
      return $this->load->view("website/user_search",$this->data);    
    }

   public function faq()
   {
       $this->data['faqs'] = $this->common_m->get_faq_web();
       $this->load->view('website/includes/header',$this->data);
       $this->load->view('website/faq',$this->data);
       $this->load->view('website/includes/footer');
   }

   public function view_orders($order_id="")
   {

    if ($order_id == "")
    {
       $this->show_404();
    }
       $this->check_session();
       $this->data['order_items'] = $this->website_Model->get_order_items($order_id);
       //echo $this->db->last_query();
       //print_r($this->data['order_items']);exit();
       $this->load->view('website/includes/header',$this->data);
       $this->load->view('website/view_orders',$this->data);
       $this->load->view('website/includes/footer');
   }

   public function forgot_password()
   {
      $data = $this->input->post("forgot");
      $result = $this->db->where("email",$data['email'])->get("users")->row_array();
      if(@$result)
      {
          $password = base64_decode($result['password']);      
          $message = 'This Is Your Artaholics Password '. $password;
          $this->load->helper("mail");
          if(send_mail($data['email'],'Recovery Password',$message))
          {
            echo  (@lang=='en') ? "We have Sent your Password to Your Registered Email Id" : "لقد أرسلنا كلمة مرورك إلى معرف البريد الإلكتروني المسجل الخاص بك  ";
          }  
      }
      else
      {
          echo  (@lang=='en') ? "Email Not Registered" : "البريد الإلكتروني غير مسجل   ";
      }
          
   }

   public function orders()
   {
       $this->check_session();
       $this->data['page'] = "orders";
       $this->data['userdata'] = $this->website_Model->get_user(@user_id);
       $this->data["my_orders"] = $this->db->order_by("id","desc")->where("user_id",@user_id)->get("orders")->result_array();
       $this->load->view('website/includes/header',$this->data);
       $this->load->view('website/orders',$this->data);
       $this->load->view('website/includes/footer');
   }

   public function share_orders($user_id)
   {
       $this->check_session();
       if(@$user_id)
       {
           $this->data['page'] = "orders";
           $this->data['userdata'] = $this->website_Model->get_user(@user_id);
           $this->data["my_orders"] = $this->db->order_by("id","desc")->where(array("user_id"=>@$user_id,"share_status"=>1))->get("orders")->result_array();
           $this->load->view('website/includes/header',$this->data);
           $this->load->view('website/orders',$this->data);
           $this->load->view('website/includes/footer');
       }
       else
       {
          $this->show_404();
       }
      
   }

   public function design_tool($product_id="")
   {
       $this->data['pro_id'] = $product_id;
       $this->check_session();
       $this->load->view('website/design/index',$this->data);
   }

   public function favourites()
   {
       $this->check_session();
       $this->data['page'] = "favourites";
       $this->data['userdata'] = $this->website_Model->get_user(@user_id);
       $this->data['user_favorites'] = $this->website_Model->get_user_favorites(user_id);
       $this->load->view('website/includes/header',$this->data);
       $this->load->view('website/favourites',$this->data);
       $this->load->view('website/includes/footer');
   }

   public function followings()
   {
       $this->check_session();
       $this->data['page'] = "followings";
       $this->data['userdata'] = $this->website_Model->get_user(@user_id);
       $this->data['user_followings'] = $this->website_Model->get_user_followings(user_id);
       $this->load->view('website/includes/header',$this->data);
       $this->load->view('website/followings',$this->data);
       $this->load->view('website/includes/footer');
   }

   public function my_designs()
   {
       $this->check_session();
       $this->data['userdata'] = $this->website_Model->get_user(@user_id);
       $this->data['page'] = "my_designs";
       if($this->data['userdata']['auth_level']==6)
       {
          $this->data['mydesigns'] = $this->db->where(array("user_id"=>user_id))->get("products")->result_array();
          $this->data['onepiece_designs'] = $this->db->where(array("user_id"=>user_id,"product_type"=>1))->get("products")->result_array();
       }
       $this->load->view('website/includes/header',$this->data);
       $this->load->view('website/my_designs',$this->data);
       $this->load->view('website/includes/footer');
   }

   public function my_sales()
   {
       $this->check_session();
       $this->data['page'] = "my_sales";
        $this->data['userdata'] = $this->website_Model->get_user(@user_id);
       $this->data['sales'] = $this->website_Model->artist_sales(@user_id);
       $this->load->view('website/includes/header',$this->data);
       $this->load->view('website/my_sales',$this->data);
       $this->load->view('website/includes/footer');
   }

   public function dashboard()
   {
       $this->check_session();
   	   $this->data['page'] = "dashboard";
       $this->data['userdata'] = $this->website_Model->get_user(user_id);      
       $this->data['countries'] = $this->common_m->get_countries();
       $this->data['page'] = "dashboard";
       $this->load->view('website/includes/header',$this->data);
       $this->load->view('website/dashboard',$this->data);
       $this->load->view('website/includes/footer');
   }

   public function order_id_generation()
   {
      $today = date("Ymd");
      $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
      return $unique = $today . $rand;
   }

   public function contact_us()
   {           
      $this->load->view('website/includes/header',$this->data);
      $this->load->view('website/contact',$this->data);
      $this->load->view('website/includes/footer');
   }

   public function about_us()
   {          
      $this->load->view('website/includes/header',$this->data);
      $this->load->view('website/about',$this->data);
      $this->load->view('website/includes/footer');
   }

   public function save_contact_us()
   {
      $this->data = $this->input->post('data');
      $result = $this->db->insert("contact",$this->data);
      if($result)
      {
        echo "success";
      }
      else
      {
        echo "faild";
      }
   }

   public function artist()
   {   
      $this->load->view('website/includes/header',$this->data);
      $this->load->view('website/artist',$this->data);
      $this->load->view('website/includes/footer');
   }

   public function guest_check_out()
   {
       if($this->cart->total_items() <= 0)
       {
            redirect(base_url().'website');
       }

      $this->data['countries'] = $this->common_m->get_countries(); 
      $this->load->view('website/includes/header',$this->data);
      $this->load->view('website/gust_checkout',$this->data);
      $this->load->view('website/includes/footer');
   }

   public function check_out_as_guest()
   {
     $data = $this->input->post("guest");
     $this->session->set_userdata("guest",$data);
     if($_SESSION["guest"])
     {
        echo 1;
     }
     else
     {
       echo 0;
     }
   }

   public function view_products($category="")
   { 
      if($category != "")
      {
            if($this->session->userdata('logged_in') != TRUE)
            {
                $this->session->set_userdata('last_page',current_url());
            }
          $this->data['products'] = $this->website_Model->get_category_products($category);
          $this->data['colors'] = $this->common_m->get_color();
          $this->data['sizes'] = $this->common_m->get_sizes();
          $this->data['cat_id'] =$category;
          $this->data['category_name'] = $this->common_m->get_categories($category)['category_name_'.lang];         
          $this->load->view('website/includes/header',$this->data);
          $this->load->view('website/view_products',$this->data);
          $this->load->view('website/includes/footer');
      }
      else
      {
        $this->show_404();
      }
   }

   public function view_featured_products()
   { 
        $this->data['products'] = $this->common_m->get_featured_products();
        $this->data['colors'] = $this->common_m->get_color();
        $this->data['sizes'] = $this->common_m->get_sizes();
        $this->data['category_name'] = ($_SESSION['lang']=="ar")?"منتجات مميزة ":"Featured Products";         
        $this->load->view('website/includes/header',$this->data);
        $this->load->view('website/view_featured_products',$this->data);
        $this->load->view('website/includes/footer'); 
   }

   public function featured_artist_products($user_id="")
   { 
      if(is_numeric($user_id))
      {
          $this->data['products'] = $this->common_m->featured_artist_products($user_id);
          $this->data['colors'] = $this->common_m->get_color();
          $this->data['sizes'] = $this->common_m->get_sizes();
          $this->data['artist_id'] = $user_id;
          $this->data['category_name'] = ($_SESSION['lang']=="ar")?"منتجات الفنان المميز ":"Featured Artist Products";
          $this->load->view('website/includes/header',$this->data);
          $this->load->view('website/view_featured_artist_products',$this->data);
          $this->load->view('website/includes/footer');
      }
      else
      {
        $this->show_404();
      }
   }

   public function product_view($product_id="")
   {
      if(is_numeric($product_id) && $product_id != "")
      {
            if($this->session->userdata('logged_in') != TRUE)
            {
                $this->session->set_userdata('last_page',current_url());
            }

            $this->data['product'] = $this->website_Model->get_product_data(2,$product_id);
            if(@$this->data['product']['pro_id'])
            { 
               $this->data['category_name'] =  $this->website_Model->get_customised_product_data($this->data['product']['customised_product_id']); 
             //  print_r($this->data['category_name']);exit();      
               $this->data['artist'] = $this->website_Model->get_user($this->data['product']['user_id']);             
               $artist_categories = $this->website_Model->get_artist_uploaded_product_categories($this->data['product']['user_id']);
               foreach ($artist_categories as $key => $value){
                  $this->data['artist_categories'][] = $value['category'];
               }
               $this->data['other_products'] = $this->db->where(array("product_type"=>2,"status"=>1,"approval_status"=>1))->get("products")->result_array();
               $this->load->view('website/includes/header',$this->data);
               $this->load->view('website/product_view',$this->data);
               $this->load->view('website/includes/footer');
            }
            else
            {
              $this->show_404();
            }
      }
      else
      {
        $this->show_404();
      }      
   }

   public function show_404()
   {  
      $this->load->view('website/includes/header',$this->data);
      $this->load->view('website/404',$this->data);
      $this->load->view('website/includes/footer');
   }

   public function one_piece_products()
   {
      $this->data['onepiece_products'] = $this->db->where(array("product_type"=>1,"approval_status"=>1,"status"=>1))->get("products")->result_array();    
      $this->load->view('website/includes/header',$this->data);
      $this->load->view('website/onepiece',$this->data);
      $this->load->view('website/includes/footer');
   }

   public function search_products()
   {
      $data = $this->input->post("data");
      //$this->session->set_userdata("products",$data);
      $this->data['products'] = $this->website_Model->product_search_filter($data);
      $this->load->view("website/search_results",$this->data);
   }

   public function search_items_by_periority()
   {
      $value = $this->input->post("value");
      $category = $this->input->post("cat_id");
      if(!empty(@$_SESSION['products']))
      {
      	$data = $_SESSION["products"];
      }
      else
      {
        $data = array();
      	$data['category'] = @$category;
      }
      $this->data['products'] = $this->website_Model->search_items_by_periority($data,$value);
      $this->load->view("website/search_results",$this->data);
   }

   public function search_artist_items_by_periority()
   {
      $value = $this->input->post("value");
      $artist_id = $this->input->post("artist_id");      
      if(!empty(@$_SESSION['products']))
      {
      	$data = $_SESSION["products"];
      }
      else
      {
      	$data = array();
      }

      $this->data['products'] = $this->website_Model->search_artist_items_by_periority($data,$value,$artist_id);     
      $this->load->view("website/search_results",$this->data);
   }

   public function one_piece_product_view($id="")
   {
      if(is_numeric(@$id))
      {
          $this->data['onepiece_product'] = $this->db->where(array("product_type"=>1,'pro_id'=>$id))->get("products")->row_array();
          
          if(!$this->data['onepiece_product']['pro_id'])
          {
            $this->show_404();
          }

          $product_colors = $this->db->where('pro_id',$id)->get("product_colors")->result_array();
          foreach ($product_colors as $key => $value)
          {
            $this->data['product_colors'][] = $value['color_id'];
          }

          $product_sizes = $this->db->where('pro_id',$id)->get("product_sizes")->result_array();
          foreach ($product_sizes as $key => $value) {
            $this->data['product_sizes'][] = $value['size_id'];
          }
          $this->data['other_products'] = $this->db->where(array("status"=>1,"product_type"=>1,"approval_status"=>1))->get("products")->result_array();
           //$this->common_m->get_products(1);
          $this->data['colors'] = $this->common_m->get_color();
          $this->data['sizes'] = $this->common_m->get_sizes();
          $this->load->view('website/includes/header',$this->data);
          $this->load->view('website/onepiece_view',$this->data);
          $this->load->view('website/includes/footer');
      }
      else
      {
         $this->show_404();
      }
        
   }

   public function add_product($product_id="")
   {
        if($this->session->userdata('logged_in') != TRUE)
        {
            $this->session->set_userdata('last_page',current_url());
            redirect('website/login');
        }

        if(@auth_level==3)
        {
          redirect('website');
        }

        if($product_id != "")
        {
          $this->data['product'] = $this->db->where('pro_id',$product_id)->get("products")->row_array();
          if($this->data['product']['product_type'] == 1)
          {
              $product_colors = $this->db->where('pro_id',$product_id)->get("product_colors")->result_array();
              foreach ($product_colors as $key => $value) {
                $this->data['product_colors'][] = $value['color_id'];
              }

              $product_sizes = $this->db->where('pro_id',$product_id)->get("product_sizes")->result_array();
              foreach ($product_sizes as $key => $value) {
                $this->data['product_sizes'][] = $value['size_id'];
              }
          }
          else
          {
            $this->data['product_colors'] = array();
            $this->data['product_sizes'] =  array();
          }
          $this->data['pro_id'] = $product_id;
        }
        $this->data['upload_help_content'] = $this->db->where("id",1)->get("terms_and_conditions")->row_array();
        $this->data['colors'] = $this->common_m->get_color();       
        $this->data['designs'] = $this->common_m->get_designs();        
        $this->data['sizes'] = $this->common_m->get_sizes();        
        $this->data['customized_products'] = $this->common_m->get_customised_products();      
        $this->load->view('website/includes/header',$this->data);
        $this->load->view('website/new_design',$this->data);
        $this->load->view('website/includes/footer');
   }

   //Add To cart Methods Start Here...

   public function add_to_cart()
   {
       /* if($this->session->userdata('logged_in') != TRUE)
        {
            echo "faild";
        }
        else
        {*/
           $data = $this->input->post('data');            
           // Add product to the cart
           $cart = array(
                    'id'      => $data['product_id'],
                    'qty'     =>$data['qty'],
                    'price'   => $data['price'],
                    'name'    => $data['product_name'],
                    'image' => $data['product_image'],
                    'options' => array('Size' =>$data['size'], 'Color' => $data['color'])
            );
            $result = $this->cart->insert($cart);
            if($result)
            {
              echo @(lang=='ar')?"تم اضافة البند في سلة التسوق  ":"Item Added In Your Cart";
            }
            else
            {
              echo @(lang=='ar')?"غير قادر على إضافة عنصر قائمة سلة التسوق  ":"Unable to added Item Your Cart List";
            }

       // }
   }

   public  function update_item_qty()
   {
       $rowid = $this->input->post('rowid');
       $qty = $this->input->post('qty');       
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
          $update = $this->cart->update($data);
        }            
        echo $update?'Quantity Updated Successfully':'Quantity Unable to Updated';
  }

  public function remove_cart_item()
  {
    $rowid = $this->input->post("rowid");        
    $remove = $this->cart->remove($rowid);
    echo count($this->cart->contents());
  }

  public function check_out()
  {
       if($this->cart->total_items() <= 0)
       {
            redirect(base_url().'website');
       }

      $this->data['countries'] = $this->common_m->get_countries(); 
      $this->data['guest'] = $this->session->userdata("guest");
      $this->load->view('website/includes/header',$this->data);
      $this->load->view('website/checkout',$this->data);
      $this->load->view('website/includes/footer');
  }

  public function share_product($social_website,$product_id)
  {

      $product_details = $this->db->where("pro_id",$product_id)->get("products")->row_array();

      $this->data['product_details'] = $product_details ;
      $this->data['product_id']      = $product_id ;
      $this->data['website']         = $social_website ;

      //echo "<pre>"; print_r($product_details);exit;

      $this->load->view('website/social_media_sharing',$this->data);
  }

  //Order Confirmation Methods

  public function order_confirm()
  {
        if($this->cart->total_items() <= 0){
           echo @(lang=='ar')?"عناصر السلة فارغة  ":"Cart Items Is Empty";
           return;
        }       

        $order_data = $this->input->post('data');
        $order_data['order_reference'] = $this->order_id_generation();

        if(isset($order_data))
        {                     
            
            if($this->session->userdata('userdata'))
            {
              $order_data['user_id'] = user_id;
              $order_data['user_type'] =1;
            }
            else
            {
              $order_data['user_id'] =0;
              $order_data['user_type'] =0;
            }

            $order_data['grand_total'] = $this->cart->total();
            $insert = $this->website_Model->insert_order($order_data);
            if($insert)
            {
                $order = $this->place_order($insert);
                if($order)
                {
                   echo @(lang=='ar')?"تم وضع الطلب بنجاح.  ":"Order placed successfully.";
                }
                else
                {
                    echo @(lang=='ar')?"فشل إرسال الطلب ، يرجى المحاولة مرة أخرى.  ":"Order submission failed, please try again.";
                }
            }
            else
            {
                echo @(lang=='ar')?"حدثت بعض المشاكل يرجى المحاولة مرة أخرى  ":"Some Problem Occurred Please try again";
            }
          
        }
    }

  function place_order($order_id)
  {

        if(@$order_id)
        {
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            $ordItemData = array();
            $i=0;
            //print_r($cartItems);exit();
            foreach($cartItems as $item)
            {
                $ordItemData[$i]['order_id']             = $order_id;
                $ordItemData[$i]['product_id']           = $item['id'];
                $ordItemData[$i]['quantity']             = $item['qty'];
                $ordItemData[$i]['sub_total']            = $item["subtotal"];
                $ordItemData[$i]['size']      = $item['options']['Size'];
                $ordItemData[$i]['color']      = $item['options']['Color'];
                $i++;
            }            
            if(!empty($ordItemData))
            {
                $insertOrderItems = $this->website_Model->insert_order_items($ordItemData);                
                if($insertOrderItems)
                {
                    $this->cart->destroy();                    
                    return $order_id;
                }
            }
        }
        return false;
    }


  //Add to cart methods ends here.........

   public function add_favourite_product()
   {        
        if($this->session->userdata('logged_in') != TRUE)
        {
            echo "faild";
        }
        else
        {
           $data['pro_id'] = $this->input->post("pro_id");
           $data['user_id'] = user_id;
           $res = $this->db->where($data)->get("favourites")->row_array();
           if($res)
           {
              $this->db->delete("favourites",$data);
              echo "Product Removed From Favourites List";
           }
           else
           {
               $this->db->insert("favourites",$data);
               echo "Product Added Favourites List";
           }          
        }
   }

   public function follow_un_follow()
   {        
        if($this->session->userdata('logged_in') != TRUE)
        {
            echo "faild";
        }
        else
        {
           $data['follower_id'] = $this->input->post("follower_id");
           $data['user_id'] = user_id;
           $user = $this->website_Model->get_user($data['follower_id']);
           $res = $this->db->where($data)->get("followers")->row_array();
           if(@$res)
           {
              $this->db->delete("followers",$data);
              echo "Now You Unfollowing ".@$user["first_name"];
           }
           else
           {
               $this->db->insert("followers",$data);
               echo "Now You following ".@$user["first_name"];
           }          
        }
   }

   public function user_follow_un_follow()
   {        
        if($this->session->userdata('logged_in') != TRUE)
        {
            echo "faild";
        }
        else
        {
           $data['follower_id'] = $this->input->post("follower_id");
           $data['user_id'] = user_id;
           $status = $this->input->post("status");
           $user = $this->website_Model->get_user($data['follower_id']);
           if(@$status)
           {
                $where['user_id'] = $this->input->post("follower_id");
                $where['follower_id'] = user_id;
                $this->db->where($where)->update("followers",array("status"=>$status));
                echo "Now Your following Request Changed  ".@$user["first_name"];
           }
           else
           {              
              $res = $this->db->where($data)->get("followers")->row_array();
             if(@$res)
             {
                $this->db->delete("followers",$data);
                $de['user_id'] = $this->input->post("follower_id");
                $de['follower_id'] = user_id;
                $this->db->delete("followers",$de);
                echo "Now You Unfollowing ".@$user["first_name"];
             }
             else
             {
                 $this->db->insert("followers",$data);
                 echo "Now You following Request Sent to ".@$user["first_name"];
             }
           }
                     
        }
   }

   public function change_order_share_status()
   {        
        if($this->session->userdata('logged_in') != TRUE)
        {
            echo "faild";
        }
        else
        {
           $id = $this->input->post("id");
           $status = $this->input->post("status");
          $this->db->where("id",$id)->update("orders",array("share_status"=>$status));         
          echo "Now Your Changed Your Order Sharing status ";
                            
        }
   }

  public function base64_to_image($img_url)
  {
      $image_parts = explode(";base64,", $img_url);
      $image_type_aux = explode("image/", $image_parts[0]);
      $image_type = $image_type_aux[1];
      $image_base64 = base64_decode($image_parts[1]);
      $file = 'product'.uniqid().'.png';
      file_put_contents('assets/uploads/products/'.$file, $image_base64);
      return $file;
  }

  public function save_product()
  {
        $data = $this->input->post('data');
        $pro_id = $this->input->post('product_id');
        $data['user_id'] = USER_ID;

        if($data['product_type']==1)
        {
            if(!empty($_FILES['image']['name']))
            {
                $config['upload_path'] = 'assets/uploads/products';
                $config['allowed_types'] = '*';
              
                $path = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
                $extension = explode("/", $_FILES["image"]["type"]);
                $new_name = $path.time().".".$extension[1];
                $config['file_name'] = $new_name;   
               
                 $this->load->library('upload',$config);
                 $this->upload->initialize($config);
                 if($this->upload->do_upload('image'))
                 {
                    $uploadData = $this->upload->data();
                    $data['product_image'] = $config['upload_path'].'/'.$uploadData['file_name'];
                 }
                 else
                 {
                    $data['product_image'] = '';
                 }
            }
            else
            {
              $data['product_image'] = ($this->input->post('old_image'))?$this->input->post('old_image'):'';
            }

            $data['customised_product_id']="";
            //$data['approval_status']=0;
        }
        else
        {
              if($this->session->userdata('image_design'))
              {
                  $image = $this->base64_to_image($this->session->userdata('image_design'));
                  unset($_SESSION['image_design']);
                  $data['product_image'] = 'assets/uploads/products/'.$image;
              }
              else if($this->session->userdata('image_design')=="" && !empty($_FILES['image']['name']))
              {
                  $config['upload_path'] = 'assets/uploads/products';
                  $config['allowed_types'] = '*';
                
                  $path = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
                  $extension = explode("/", $_FILES["image"]["type"]);
                  $new_name = $path.time().".".$extension[1];
                  $config['file_name'] = $new_name;   
                 
                   $this->load->library('upload',$config);
                   $this->upload->initialize($config);
                   if($this->upload->do_upload('image'))
                   {
                      $uploadData = $this->upload->data();
                      $data['product_image'] = $config['upload_path'].'/'.$uploadData['file_name'];
                   }
                   else
                   {
                      $data['product_image'] = '';
                   }
              }
              else
              {
                 $data['product_image'] = ($this->input->post('old_image'))?$this->input->post('old_image'):'';
              }

              $data['price']="";
              $data['quantity']="";
              //$data['approval_status']=0;


        }       

        if($pro_id != "")
        {
            $this->db->where("pro_id",$pro_id);
            $result = $this->db->update("products",$data);      
            if($result)
            {
                $this->db->where("pro_id",$pro_id)->delete("product_colors");
                $this->db->where("pro_id",$pro_id)->delete("product_sizes");
                $message = "Product Updated successfully !";
            }
            $product_id = $pro_id;          
        }
        else
        {
            $result = $this->db->insert("products",$data);
            $product_id = $this->db->insert_id();
            $message = "Product Added successfully !";
        }   

        if($result)
        {
            if($data['product_type']==1)
            {       
              if($product_id != "")
              {
                $sizes = $this->input->post('sizes');   
                $colors = $this->input->post('colors');

                foreach($sizes as $key => $value)
                {           
                  $size['pro_id'] = $product_id;
                  $size['size_id'] = $value;
                  $this->db->insert("product_sizes",$size);
                }

                foreach($colors as $key => $value)
                {           
                  $color['pro_id'] = $product_id;
                  $color['color_id'] = $value;
                  $this->db->insert("product_colors",$color);
                }

              }
              
              $this->session->set_flashdata('success',$message);
              echo json_encode(["status"=>"success","message"=>$message]);        
            }
            else
            {
              $this->session->set_flashdata('success',$message);
              echo json_encode(["status"=>"success","message"=>$message]);
            }
      }
      else
      {
            $this->session->set_flashdata('success','Faild Please try Again !');
            echo json_encode(["status"=>"success","message"=>"Faild Please try Again !"]);
      }   
  }

   public function email_subscription()
   {
       	$lang = $this->session->userdata('lang'); 
      	$data = $this->input->post('data');

       $data['date'] = date('Y-m-d H:i:s');
       $check_email = count($this->db->get_where("subscribe",array("email"=>$data["email"]))->result());
       if($check_email > 0)
       {
           echo $message =($lang == 'en')?'This User Already subscriber':'هذا المستخدم مشترك بالفعل';        
       }
       else
       {
          $this->db->insert("subscribe",$data);
          echo $message =($lang == 'en')?'Thank You For Subscribing!':'شكرا لك على الاشتراك!';             
       }
   }

   public function sign_up()
   {
  		   if($this->session->userdata('userdata'))
         {
         		redirect('website');
         }         
	      $this->data['countries'] = $this->common_m->get_countries(); 
        $this->data['terms_and_conditions'] = $this->db->where("id",1)->get("terms_and_conditions")->row_array();
	      $this->load->view('website/includes/header',$this->data);
	      $this->load->view('website/sign_up',$this->data);
	      $this->load->view('website/includes/footer');
   }

   public function login()
   {
		   if($this->session->userdata('userdata'))
       {
       		redirect('website');
       }
		  $this->load->view('website/includes/header',$this->data);
		  $this->load->view('website/login',$this->data);
		  $this->load->view('website/includes/footer');
   }

  public function get_cities()
	{
		  $id = $this->input->post('value');	
  		if($id != "")
  		{
  			$cities = $this->common_m->get_cities($id);
  		}
  		else
  		{
  			$cities = array();
  		}	
			echo '<label for="usr">City &nbsp;<sup class="mandatory">*</sup></label>
       <select class="form-control product_control" name="data[city]" id="sel2">
       <option value="">Select City</option>';
       foreach ($cities as $key => $value)
       {
       	echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
       }   
       echo '</select>';		
	}

	public function registration()
	{
		    $lang = $this->session->userdata('lang');
        $data = $this->input->post('data');
        $data['password'] = base64_encode($data['password']);       

  		if(!empty($_FILES['image']['name']))
  		{
  		   $config['upload_path'] = 'assets/uploads/user_profiles/';
  		   $config['allowed_types'] = '*';
  		   $config['file_name'] = "profile".time();
  		   $this->load->library('upload',$config);
  		   $this->upload->initialize($config);
  		   if($this->upload->do_upload('image'))
  		   {
  		   		$uploadData = $this->upload->data();
  		   		$data['user_image'] = $config['upload_path'].'/'.$uploadData['file_name'];
  		   }
  		   else
  		   {
  		   		$data['user_image'] = '';
  		   }
  		}

  		$result = $this->db->insert("users",$data);

  		if($result)
  		{
  			echo $message = ($lang =='en')?'Registration Completed Successfully':'تم الانتهاء من التسجيل بنجاح  ';
  		}
  		else
  		{
  			echo $message = ($lang =='en')?' Please Try Again':'حاول مرة اخرى  ';
  		}
	}

	public function chek_email_existence()
	{
  		$email = $this->input->post('value');
  		$user_id = $this->input->post('user_id');
  		$lang = $this->session->userdata('lang');
  		$language = ($lang)?$lang:'en';
  		if($user_id != "")
  		{
  			echo $this->common_m->check_email_existance($email,$language);
  		}
  		else
  		{
  			echo $this->common_m->check_email_existance($email,$language);
  		}
	}

	public function check_login()
	{
          if($this->input->post('data'))
          {
            $data = $this->input->post('data');
          }
          else
          {
            $data = $this->input->post('login');
          }
        
        $language = $this->session->userdata('lang');
        $lang= ($language)?$language:'en';
        $password = base64_encode($data['password']);
        $check_user = $this->db->get_where('users',array('email'=>$data['email']))->row_array();
        if(count($check_user) > 0)
        {
            if($password == $check_user['password'] && $check_user['auth_level'] != 9)
            {               
                if($check_user['status'] == 1)
                {               
                   $this->session->set_userdata('userdata',$check_user);
                   $this->session->set_userdata('logged_in',true);
                   echo "success";                
                }
                else
                {
                   echo $message = ($lang =='en')?'Admin Approval Required..!':'موافقة المسؤول مطلوبة ..!';
                }              	
            }
            else
            {
               echo $message = ($lang =='en')?'Invalid Credentials ':'شهادة اعتماد غير صالحة';              
            }
        }
        else
        {
             echo $message = ($lang =='en')?'This Email not registered ':'هذا البريد الإلكتروني غير مسجل';
        }
	}

  public function check_out_registration()
  {
        $lang = $this->session->userdata('lang');
        $data = $this->input->post('data');
        $data['password'] = base64_encode($data['password']);
        $data['auth_level'] = 3;
        $data['role'] = "customer";
        $data['status'] = 1;
        $result = $this->db->insert("users",$data);
        $user_id = $this->db->insert_id();
        $user =  $this->db->where("user_id",$user_id)->get("users")->row_array();        
        if($result)
        {
          $this->session->set_userdata('userdata',$user);
          $this->session->set_userdata('logged_in',true);
         // print_r($this->session->userdata('userdata'));exit();

          echo "success";
        }
        else
        {
          echo $message = ($lang =='en')?' Please Try Again':'حاول مرة اخرى  ';
        }
  }

   public function logout()
   {
       $this->session->sess_destroy();
       redirect('website');
   }

   public function check_session()
   {
       if($this->session->userdata('image_design'))
       {
          unset($_SESSION['image_design']);
       }

       if(!$this->session->userdata('userdata'))
       {
          redirect('website/login');
       }
   }   


  //updating above methods


	public function brand_product()
	{
	   	$this->load->view('website/includes/header');
	  	$this->load->view('website/brand-products');
		  $this->load->view('website/includes/footer');
	}

	public function all_product()
	{
	   	$this->load->view('website/includes/header');
	  	$this->load->view('website/all-products');
		  $this->load->view('website/includes/footer');
	}	    

    public function contactus_request()
    {
        $lang = $this->session->userdata('lang');
        $data = $this->input->post('data');
        if($this->session->userdata("user_id"))
        {
        	$data["user_id"] = $this->session->userdata("user_id");
        }

        $result = $this->db->insert("contact",$data);
        if($this->db->affected_rows() > 0)
        {
            $message = ($lang == 'en')?'Thanks for Contact Us':'شكرا على الاتصال بنا';
            
            $this->session->set_flashdata('message', $message);
            redirect(base_url().'website/contactus');
        }
        else
        {
            $message = ($lang == 'en')?'Please Tryagin...!':'من فضلك ترياجين ...!';
            
            $this->session->set_flashdata('message', $message);
            redirect(base_url().'website/contactus');

        }
    }

    public function sell_product($prod_id='')
    {
        $lang = $this->session->userdata('lang');
        $data['product_type'] = $this->Website_Model->get_product_type($lang);
        $data['brand']  = $this->Website_Model->get_brand($lang);
        $data['color']  = $this->Website_Model->get_color($lang);
        $data['size']   = $this->Website_Model->get_size();     
        $data['currency'] = $this->db->get_where('currency',array('status'=>1))->result_array();
      
        if($prod_id != '')
        {
            $data['product'] = $this->db->get_where('products',array('prod_id'=>$prod_id))->row_array();
        }

        if($this->session->userdata("user_id"))
        {
        	 $this->load->view('website/includes/header');
		  	   $this->load->view('website/sell1',$data);
			     $this->load->view('website/includes/footer');

        }
        else
        {
        	$this->session->set_userdata('redirect','website/sell_product');
        	redirect('website/login');
        }
    }    


  public function products($mcat)
	{
	    $lang = $this->session->userdata('lang');
	    
	    if($this->uri->segment(4) !='')
	    {
	       $saved_id = $this->uri->segment(4);
           $saved = $this->db->get_where('saved_search',array('saved_id'=>$saved_id))->row_array();
           $search = $saved['search'];
           $data['mcat_id'] = $saved['mcat_id'];
           $filter['brand'] = $saved['brand_id'];
           $filter['color'] = $saved['color_id'];
           $filter['size'] = $saved['size_id'];
           $filter['category'] = $saved['category_id'];
           $filter['hide_sold'] = $saved['hide_sold'];
           $filter['min_price'] = $saved['min_price'];
           $filter['max_price'] = $saved['max_price'];
           $filter['city']  = $saved['city_id'];
          /* $filter['new']       = $saved['new'];
           $filter['check_service'] = $saved['check_service'];
           $filter['invoice_available']    = $saved['invoice_available'];
           $filter['guarantee_available']  = $saved['guarantee_available'];*/
            $new = implode(',',$saved['new']);
             if($new != '')
             {
               $filter['new'] =  "'" . str_replace(",", "','", $new) . "'"; //this code for 'yes','no'
             }else{$filter['new'] ='';}
            
             $check_service = implode(',',$saved['check_service']);
              if($check_service !=''){
              $filter['check_service'] = "'" . str_replace(",", "','", $check_service) . "'";
              }else{$filter['check_service'] ='';}
             
             $invoice_available = implode(',',$saved['invoice_available']);
             if($invoice_available !=''){
             $filter['invoice_available'] = "'" . str_replace(",", "','", $invoice_available) . "'";
             }else{$filter['invoice_available'] ='';}
              
             $guarantee_available =  implode(',',$saved['guarantee_available']);
             if($guarantee_available !=''){
             $filter['guarantee_available'] = "'" . str_replace(",", "','", $guarantee_available) . "'";
             }else{$filter['guarantee_available'] ='';}   
	        
	       $filter_product = $this->Website_Model->get_my_filter($data,$search,$filter);
	       if($filter['min_price'] !='' && $filter['max_price'] !='')
           {
               foreach($filter_product as $key=>$cvalue)
               {
                $price = 0;
                    
                    $get_value = $this->db->get_where('currency',array('currency_code'=>$cvalue['currency']))->row_array()['currency_value'];
                    $price = $cvalue['price'] / $get_value;
              
                     if(round($price) > $filter['min_price'] && round($price) <= $filter['max_price'])
                     {
                         $new_product[] = $filter_product[$key];
                     }
                     else
                     {
                         unset($filter_product[$key]);
                     }
               }
             }

	         if($filter_product)
           {
               $data['products'] = $filter_product;
           }
           else if($new_product)
           {
               $data['products'] = $new_product;
           }
           else
           {
               echo 'No record Found';
           }
	       
	       
	      // echo $this->db->last_query();exit;
	    }
	    else
	    {
	    $data['products'] = $this->Website_Model->get_product($mcat,$lang);
	    }
	    
	    $data['brand']  = $this->Website_Model->get_brand($lang);
	    $data['category'] = $this->Website_Model->get_category($lang);
        $data['color']  = $this->Website_Model->get_color($lang);
        $data['size']   = $this->Website_Model->get_size();
        $data['city']   = $this->Website_Model->get_city($lang);
        $data['lang']   = $lang;
	   	$this->load->view('website/includes/header');
	  	$this->load->view('website/products',$data);
		$this->load->view('website/includes/footer');
	}

	public function product_details($prod_id)
	{
	    $lang = $this->session->userdata('lang');
	    $type = '4';
	    $data['product_detail'] = $this->Website_Model->get_product_detail($prod_id,$lang);
	    $data['ads']  = $this->Website_Model->get_ads($lang,$type);
        $data['lang'] = $lang;
	  // print_r($data);

	    $this->load->view('website/includes/header');
	  	$this->load->view('website/product-details',$data);
		$this->load->view('website/includes/footer');

	}

	public function product_by_name($user_id)
	{
	   $data['lang'] = $this->session->userdata('lang');
	   $data['products'] = $this->Website_Model->get_product_by_name($user_id);
	   $data['user_name'] = $this->db->get_where('users',array('user_id'=>$user_id))->row_array()['user_name'];
	 //  print_r($data);exit;
	   $this->load->view('website/includes/header');
       $this->load->view('website/product_by_name',$data);
       $this->load->view('website/includes/footer');

	}

	public function product_search()
	{
	    $lang = $this->session->userdata('lang');
	    $search['mysearch'] = $this->input->post('mysearch');
	    $search['mcat_id']   = $this->input->post('mtype');
	    if($this->session->userdata('user_id') !='')
	    {
	        $data['user_id'] = $this->session->userdata('user_id');
	        $data['search'] = $search['mysearch'];
	        $this->db->insert('saved_search',$data);
	    }

	      $data['products'] = $this->Website_Model->get_search($search,$lang);

	      $data['brand']  = $this->Website_Model->get_brand($lang);
        $data['color']  = $this->Website_Model->get_color($lang);
        $data['size']   = $this->Website_Model->get_size();
        $data['city']   = $this->Website_Model->get_city($lang);
        $data['lang']   = $lang;

	   	$this->load->view('website/includes/header',$search);
	  	$this->load->view('website/products',$data);
		  $this->load->view('website/includes/footer');
	}


	public function manage($user_id)
	{
	    $lang = $this->session->userdata('lang');
	    $data['my_ads'] = $this->Website_Model->get_my_ads($lang,$user_id);
	    $data['my_favorite'] = $this->Website_Model->get_my_favorite($lang,$user_id);
	    $data['mobile_code'] = $this->Website_Model->get_country_code();
	    $data['my_notification'] = $this->Website_Model->get_my_notification($lang,$user_id);
	    $data['my_saved_search'] = $this->Website_Model->get_my_saved_search($lang,$user_id);
	    $data['my_profile']  = $this->Website_Model->get_my_profile($lang,$user_id);

	    $this->load->view('website/includes/header');
	  	$this->load->view('website/manage',$data);
		$this->load->view('website/includes/footer');
	}

   public function term_condition()
   {
   		$data['terms'] = $this->db->get("term_condition")->row();
      $this->load->view('website/includes/header');
	  	$this->load->view('website/terms-conditons',$data);
		  $this->load->view('website/includes/footer');
   }

   public function privacy_policy()
   {
   		$data['privacy'] = $this->db->get("privacy_policy")->row();
      	$this->load->view('website/includes/header');
	  	$this->load->view('website/privacy-policy',$data);
		$this->load->view('website/includes/footer');
   }

  

   public function help()
   {
   		$data['help'] = $this->db->get("help")->row();
      	$this->load->view('website/includes/header');
	  	$this->load->view('website/help',$data);
		$this->load->view('website/includes/footer');
   }

   public function support_center()
   {
   		$data['support'] = $this->db->get("support_center")->row();
      	$this->load->view('website/includes/header');
	  	$this->load->view('website/support_center',$data);
		$this->load->view('website/includes/footer');
   }

   public function item_check()
   {
   		$data['item_check'] = $this->db->get("item_check")->row();
      	$this->load->view('website/includes/header');
	  	$this->load->view('website/item_check',$data);
		$this->load->view('website/includes/footer');
   }

   public function my_ads()
   {
        if($this->session->userdata('user_id') != "")
        {
            $lang = $this->session->userdata('lang');
            $user_id = $this->session->userdata('user_id');
    	      $data['my_ads'] = $this->Website_Model->get_my_ads($lang,$user_id);
           	$this->load->view('website/includes/header');
          	$this->load->view('website/myads',$data);
        	  $this->load->view('website/includes/footer');
        }
        else
        {
            $this->session->set_userdata('redirect','website/my_ads');
        	  redirect('website/login');
        }
   }

   public function my_favorite()
   {
        if($this->session->userdata('user_id') != "")
        {
          $lang =$this->session->userdata('lang');
          $user_id = $this->session->userdata('user_id');
          $data['my_favorite'] = $this->Website_Model->get_my_favorite($lang,$user_id);
         	$this->load->view('website/includes/header');
        	$this->load->view('website/favourites',$data);
      	  $this->load->view('website/includes/footer');
        }
        else
        {
            $this->session->set_userdata('redirect','website/my_favorite');
            redirect('website/login');
        }
   }

   public function manage_profile()
   {
       if($this->session->userdata('user_id') != "")
        {

         $lang =$this->session->userdata('lang');
  	     $user_id = $this->session->userdata('user_id');
  	     $data['my_profile']  = $this->Website_Model->get_my_profile($lang,$user_id);
  	     $data['mobile_code'] = $this->Website_Model->get_country_code();

       	$this->load->view('website/includes/header');
      	$this->load->view('website/myprofile',$data);
    	  $this->load->view('website/includes/footer');
      }
      else
      {
          $this->session->set_userdata('redirect','website/manage_profile');
          redirect('website/login');
      }
   }

   public function password_update()
   {
    $data  = $this->input->post("data");
    $password = base64_encode($data["password"]);
    $update = $this->db->where(array('user_id'=>$data['user_id']))->update('users',array("password"=>$password));

         if($update)
         {
             
                echo $message =(@lang == 'en')?'Your Password Updated Successfully !':'تم تحديث كلمة مرورك بنجاح!  '           ;
         }
         else
         {
              echo $message =(@lang == 'en')?'Your Password Not Updated':'كلمة المرور الخاصة بك غير محدثة  ';
         }
   }
   


   public function save_profile()
   {
      $lang = $this->session->userdata('lang');
      $data = $this->input->post('data');
	    //$data['password'] = base64_encode($data['password']);

    	  if(!empty($_FILES['user_image']['name']))
    		{
    			   $config['upload_path'] = 'assets/uploads/user_profiles/';
    			   $config['allowed_types'] = '*';
    			   $config['file_name'] = time().$_FILES['user_image']['name'];
    			   $this->load->library('upload',$config);
    			   $this->upload->initialize($config);
    			   if($this->upload->do_upload('user_image')){
    			   $uploadData = $this->upload->data();
    			   $data['user_image'] = $config['upload_path'].$uploadData['file_name'];
    			   }else{
    			   $data['user_image'] = '';
    			   }
    		}

    	   $update = $this->db->where(array('user_id'=>$data['user_id']))->update('users',$data);

    	   if($update)
    	   {
    	       
    	          echo $message =($lang == 'en')?'Your Profile Updated Successfull !':'ملفك الشخصي تم تحديثه بنجاح';   	       
    	   }
    	   else
    	   {
    	        echo $message =($lang == 'en')?'Your Profile Not Updated':'ملفك الشخصي غير محدث';
    	   }
   }


    public function send_report()
    {
        $lang = $this->session->userdata('lang');
        $data = $this->input->post('data');
        $insert = $this->db->insert('reports',$data);
        if($insert)
        {
            $message =($lang == 'en')?'Your Report sent Successfull !':'تم إرسال تقريرك بنجاح!';
            $this->session->set_flashdata('success',$message);
            redirect(base_url().'website/product_details/'.$data['prod_id']);
        }
        else
        {
             $message =($lang == 'en')?'Your Report Not sent':'لم يتم إرسال التقرير الخاص بك';
            $this->session->set_flashdata('success',$message);
            redirect(base_url().'website/product_details/'.$data['prod_id']);
        }

    }
    
    
    
    
    
    //end saved search
    
    
    public function chat()
    {
        $lang = $this->session->userdata('lang');
        $data['receiver_id'] = $this->uri->segment(3);
        $data['sender_id'] = $this->session->userdata('user_id');        
        $data['chat_view'] = $this->Website_Model->get_chat($data);	    
  	    $data['sender_detail'] = $this->Website_Model->get_user_detail($data['sender_id']);
  	    $data['receiver_detail'] = $this->Website_Model->get_user_detail($data['receiver_id']);
        $data['lang'] = $lang;
  	    $this->load->view('website/includes/header');
  	  	$this->load->view('website/chat',$data);
  		  $this->load->view('website/includes/footer');        
    }
    
    public function send_mobile()
    {
        $lang = $this->session->userdata('lang');
        $mobile = $this->input->post('mobile');
      
        $check_mobile = $this->db->get_where('users',array('mobile_no'=>$mobile))->row_array();
        $code = $check_mobile['country_code'];
        $code = (strpos($code,"+") !== false) ? $code : "+".$check_mobile['country_code'];
        $code = str_replace(' ', '', $code);
  
        if(count($check_mobile) > 0)
        {
            $new_pass = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
            $this->db->where('mobile_no',$mobile);
            $res =  $this->db->update("users",array("password"=>base64_encode($new_pass)));
            $mobile_no = $code.$mobile;
            
             //email coding
              /*  $to = $email;
            	$subject = 'Forget Password' ;
            	$from ="noreply@contrology.com";
             //   $from = "mazharradiance@gmail.com";
            	 
            	$headers  = 'MIME-Version: 1.0' . "\r\n";
            	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            	
            	$headers .= 'From: '.$from."\r\n".
            	    'Reply-To: '.$from."\r\n" .
            	    'X-Mailer: PHP/' . phpversion();
            	 
            	
            	$message = '<html><body>';
            	$message .= '<h1 style="color:#080;">Welcome To PriceMetric...</h1>';
            	$message .= '<p style="color:#f40;font-size:18px;">Email : '.$email.'</p>';
            	$message .= '<p style="color:#f40;font-size:18px;">Your New Password : '.$new_pass.'</p>';
            	$message .= '</body></html>';
            	 
            	$send_email = mail($to,$subject,$message,$headers);*/
            	
        	
            $message =($lang == 'en')?'Password Sent To Your Registered Mobile Number':'تم إرسال كلمة المرور إلى الرقم المسجل';
            $this->session->set_flashdata('success',$message);
            redirect(base_url().'website/login/'.$data['prod_id']);
        
           
        	
        }
        else
        {
             $message =($lang == 'en')?'Invalid Mobile':'رقم الجوال غير صحيح';
            $this->session->set_flashdata('success',$message);
            redirect(base_url().'website/login/'.$data['prod_id']);
        }

    } 


//end social login's





}
