<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct()
	{
		parent :: __construct();
		if($this->session->userdata('auth_level'))
		{ 
		  define('USER_ID',$this->session->userdata('user_id'),true);
		  define('AUTH_LEVEL',$this->session->userdata('auth_level'),true);
		}
	}

	public function index()
	{
		$this->load->view("login");
	}

	public function design_tool($product_id="")
   {

       if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="dashboard";
				$data['pro_id'] = $product_id;  
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
			    $data['user_info'] = $this->common_m->get_user_details(user_id);
				$this->load->view('admin/includes/header',$data);	   
                $this->load->view('website/design/admin_design',$data);
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		else
		{
			redirect(base_url().'admin');
		}
   }

	public function dashboard()
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="dashboard";
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
			    $data['user_info'] = $this->common_m->get_user_details(user_id);
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/index');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		else
		{
			redirect(base_url().'admin');
		}
	}

	public function login()
	{				
		$data = $this->input->post('data');

		if(@$data)
		{
			 $pwd = $data['password'];
			 unset($data['password']);
			 //$data['status']=1;
			 $auth_data = $this->db->select("*")->from('users')->where($data)->get()->row_array();
			if($auth_data)
			{
				if($auth_data['status'] == 1)
				{
					if($pwd == base64_decode($auth_data['password']))
					{						
						$this->session->set_userdata('first_name',$auth_data['first_name']);
						$this->session->set_userdata('email',$auth_data['email']);
						$this->session->set_userdata('auth_level',$auth_data['auth_level']);
						$this->session->set_userdata('user_id',$auth_data['user_id']);
						if($auth_data['auth_level']==9 || $auth_data['auth_level']==8)
						{
						    redirect("admin/dashboard");
						}
						else
						{
							$e_data['error'] = "Please check login credentials";
							$this->load->view('login.php', $e_data);
						}
					}
					else
					{					
						    $e_data['error'] = "Please check Your Password";
							$this->load->view('login.php', $e_data);
					}
			    }
				else
				{					
					     $e_data['error'] = "Your Account Was In-Active Please Contact Asministrator";
						 $this->load->view('login.php', $e_data);
				}			
			}
			else
			{					
				redirect('admin/index');
			}
		}
		else
		{
			redirect('admin/index');
		}
		
	}

	public function add_product($product_id="")
	{
	    if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				if($product_id != "")
				{
					$data['product'] = $this->db->where('pro_id',$product_id)->get("products")->row_array();
					if($data['product']['product_type'] == 1)
					{
						$product_colors = $this->db->where('pro_id',$product_id)->get("product_colors")->result_array();
						foreach ($product_colors as $key => $value) {
							$data['product_colors'][] = $value['color_id'];
						}

						$product_sizes = $this->db->where('pro_id',$product_id)->get("product_sizes")->result_array();
						foreach ($product_sizes as $key => $value) {
							$data['product_sizes'][] = $value['size_id'];
						}
					}
					else
					{
						$data['product_colors'] = array(0,0,0,0);
						$data['product_sizes'] =  array('0'=>'0');
					}
				}

				$data['page_name'] ="add_product";
				$data['page'] ="products";
				$data['product_id'] =$product_id;
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['user_info'] = $this->common_m->get_user_details(@user_id);
				$data['pcat'] = $this->common_m->get_categories();				
				$data['colors'] = $this->common_m->get_color();				
				$data['designs'] = $this->common_m->get_designs();				
				$data['sizes'] = $this->common_m->get_sizes();				
				$data['upload_help_content'] = $this->db->where("id",1)->get("terms_and_conditions")->row_array();	
				$data['customized_products'] = $this->common_m->get_customised_products();				
				$this->load->view('admin/includes/header',$data);				
				$this->load->view('admin/add_product',$data);
				$this->load->view('admin/includes/footer',$data);
			}
			else
			{
				redirect(base_url().'admin/index');
			}
		}
		else
		{
			redirect(base_url().'admin/index');
		}
	}

	public function save_product()
	{
		/*$data = $this->input->post('data');
		$pro_id = $this->input->post('product_id');
		$data['user_id'] = $this->session->userdata('user_id');

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
		}*/
		$data = $this->input->post('data');
		$data['approval_status']=1;
        $pro_id = $this->input->post('product_id');
        $data['user_id'] = $this->session->userdata('user_id');

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

	public function add_customised_product($id="")
	{
	    if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				if($id != "")
				{
					$data['product'] = $this->common_m->get_customised_products($id);
					$colors = $this->common_m->get_cproduct_colors($id);
					$data['pcolors'] = array_column($colors,'color_id');					
					$sizes = $this->common_m->get_cproduct_sizes($id);
					$data['psizes'] = array_column($sizes,'size_id');	
					$data['psub_cat'] = $this->common_m->subcategories($data['product']['category']);
				}
				else
				{
					$data['product'] = array();
					$data['pcolors'] =  array();
					$data['psizes'] =  array();
					$data['psub_cat'] =  array();
				}

				$data['current_page'] = "categories";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['pcat'] = $this->common_m->get_categories();				
				$data['colors'] = $this->common_m->get_color();				
				$data['sizes'] = $this->common_m->get_sizes();

				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/add_customised_product');
			}
			else
			{
				redirect(base_url().'admin/index');
			}
		}
		else
		{
			redirect(base_url().'admin/index');
		}
	}

	public function save_customised_product()
	{
		$data = $this->input->post('data');
		$id = $this->input->post('product_id');
		$old_image = $this->input->post('old_image');
		if(!empty($_FILES['prodct_image']['name']))
		{
			   $config['upload_path'] = 'assets/uploads/customised_products';
			   $config['allowed_types'] = '*';
			   $config['file_name'] = "cproduct".time();  
			   $this->load->library('upload',$config);
			   $this->upload->initialize($config);
			   if($this->upload->do_upload('prodct_image'))
			   {
				   $uploadData = $this->upload->data();
				   $data['image'] = $config['upload_path'].'/'.$uploadData['file_name'];
			   }
			   else
			   {
			   		$data['image'] = ($old_image)?$old_image:'';
			   }
		}
		else
		{
			$data['image'] = ($old_image)?$old_image:'';
		}

		$sizes = $this->input->post('size');
		$colors = $this->input->post('colors');

		if($id != "")
		{
			$this->db->where("pro_id",$id)->delete("customised_product_sizes");
			$this->db->where("pro_id",$id)->delete("customised_product_colors");
			$res = $this->db->where("product_id",$id)->update("customised_products",$data);
			$pro_id = $id;
		}
		else
		{
			$res = $this->db->insert("customised_products",$data);
			$pro_id = $this->db->insert_id();
		}		

		if($pro_id)
		{
			foreach ($sizes as $key => $value)
			{
				$size['pro_id'] = $pro_id;
				$size['size_id'] = $value;
				$this->db->insert("customised_product_sizes",$size);
			}

			foreach ($colors as $key => $value)
			{
				$color['pro_id'] = $pro_id;
				$color['color_id'] = $value;
				$this->db->insert("customised_product_colors",$color);
			}
		}
		
		if($res)
		{
			if($id)
			{
				$this->session->set_flashdata('success','Customised Product Updated successfully !');
				echo json_encode(["status"=>"success","message"=>"Customised Product Updated successfully !"]);
			}
			else
			{
				$this->session->set_flashdata('success','Customised Product Added successfully !');
				echo json_encode(["status"=>"success","message"=>"Customised Product Added successfully !"]);
			}
			
		}
		else
		{
			$this->session->set_flashdata('success','Unable to Save Customised Product');
			echo json_encode(["status"=>"success","message"=>"Unable to Add Customised Product"]);
		}
	}

	public function get_subcategories()
	{
		$id = $this->input->post('value');
		if($id != "")
		{
			$subcategories = $this->common_m->subcategories($id);
			echo '<label for="sel1">Select Sub Category</label>
	           <select class="form-control product_control" name="data[sub_category]">
	           <option value="">Select Sub Category</option>';
	           foreach ($subcategories as $key => $value) {
	           	echo '<option value="'.$value['pcat_id'].'">'.$value['pcat_name_en'].'</option>';
	           }   
	           echo '</select>';
		}		
	}

	public function sub_categories()
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="product category";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['pcat'] = $this->common_m->get_sub_categories_by_admin(2);			
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/sub_categories');
			}
			else
			{
				redirect(base_url().'admin/index');
			}
		}
		else
		{
			redirect(base_url().'admin/index');
		}

	}

	public function categories()
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="categories";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['pcat'] = $this->common_m->get_categories_by_admin(2);

				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/categories');		

			}
			else
			{
				redirect(base_url().'admin/index');
			}

		}
		else
		{
			redirect(base_url().'admin/index');
		}
	}

	public function customised_products()
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="categories";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['customised_products'] = $this->common_m->get_customised_products_by_admin(2);							
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer',$data);
				$this->load->view('admin/customised_products');
			}
			else
			{
				redirect(base_url().'admin/index');
			}
		}
		else
		{
			redirect(base_url().'admin/index');
		}
	}

	public function add_category()
	{
	    $data 			= array();
		$data['cat_id'] = $this->input->post('id');
		$data['pname'] 	= $this->input->post('pname');
		$data['value']  = ($data['cat_id'] != "") ? $this->common_m->get_categories($data['cat_id']):array();
		$this->load->view('admin/add_category',$data);
	}

	public function add_sub_user()
	{
	    $data 			= array();
		$data['user_id'] = $this->input->post('id');
		$data['value']  = ($data['user_id'] != "") ? $this->db->where("user_id",$data['user_id'])->get("users")->row_array():array();
		if(@$data['user_id'] != "")
		{
			$data['permissions'] = $this->common_m->get_sub_user_permissions($data['user_id']);			
		}

		$this->load->view('admin/add_sub_user',$data);
	}

	public function add_sub_category()
	{
	    $data 			= array();
		$data['pcat_id'] = $this->input->post('id');
		$data['pname'] 	= $this->input->post('pname');
		$data['value']  = ($data['pcat_id'] != "") ? $this->common_m->get_sub_categories($data['pcat_id']):array();		
		$this->load->view('admin/add_sub_category',$data);
	}

	public function add_commission()
	{
	    $data 			= array();
		$data['user_id'] = $this->input->post('id');				
		$this->load->view('admin/add_commission',$data);
	}  

	public function save_sub_category()
	{
		$data = $this->input->post('data');		
		if($data['pname']=='product_category')
		{
			$table = 'product_categories';
		}	
		unset($data['pname']);

		if(!empty($_FILES['addimage']['name']))
		{
			   $config['upload_path'] = 'assets/uploads/sub_category';
			   $config['allowed_types'] = '*';
			   $config['file_name'] = $_FILES['addimage']['name'];  
			   $this->load->library('upload',$config);
			   $this->upload->initialize($config);
			   if($this->upload->do_upload('addimage')){
			   $uploadData = $this->upload->data();
			   $data['p_image'] = $config['upload_path'].'/'.$uploadData['file_name'];
			   }else{
			   $data['p_image'] = '';
			   }
		}
		else
		{
			$data['p_image'] = $this->input->post('old_image');
		}

		if(!empty($data['pcat_id']))
		{
			$this->db->where('pcat_id',$data['pcat_id']);
			unset($data['pcat_id']);
			$update=$this->db->update('sub_categories',$data);
			$this->session->set_flashdata('success','Data Updated successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated successfully"]);
		}
		else 
		{
			$this->db->insert('sub_categories',$data);		
			$this->session->set_flashdata('success','Data Inserted successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted successfully"]);
		}		
	}

	public function save_commission()
	{
		$data = $this->input->post('data');
		$user_id = $this->input->post('user_id');
		echo $this->db->where("user_id",$user_id)->update("users",$data);
	}

	public function save_category()
	{
		$data = $this->input->post('data');		
		if($data['pname']=='product_category')
		{
			$table = 'product_categories';
		}

		unset($data['pname']);
		if(!empty($_FILES['addimage']['name']))
		{
			   $config['upload_path'] = 'assets/uploads/category';
			   $config['allowed_types'] = '*';
			   $config['file_name'] = "category_image_".time();  
			   $this->load->library('upload',$config);
			   $this->upload->initialize($config);
			   if($this->upload->do_upload('addimage'))
			   {
			   		$uploadData = $this->upload->data();
			   		$data['image'] = $config['upload_path'].'/'.$uploadData['file_name'];
			   }
			   else
			   {
			   		$data['image'] = '';
			   }
		}
		else
		{
			$data['image'] = $this->input->post('old_image');
		}

		if(!empty($data['cat_id']))
		{
			$this->db->where('cat_id',$data['cat_id']);
			unset($data['cat_id']);
			$update=$this->db->update('categories',$data);
			$this->session->set_flashdata('success','Data Updated successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated successfully"]);
		}
		else 
		{
			$this->db->insert('categories',$data);		
			$this->session->set_flashdata('success','Data Inserted successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted successfully"]);
		}		
	}

	public function save_sub_user()
	{
		$data = $this->input->post('data');
		$permissions = $this->input->post('permissions');
		$data['permissions'] = implode(",",$permissions);

		if(@$data['password'])
		{
			$data['password'] = base64_encode($data['password']);
		}
		
		if(!empty($_FILES['addimage']['name']))
		{
		   $config['upload_path'] = 'assets/uploads/user_profiles';
		   $config['allowed_types'] = '*';
		   $config['file_name'] = "profile_".time();  
		   $this->load->library('upload',$config);
		   $this->upload->initialize($config);
		   if($this->upload->do_upload('addimage'))
		   {
		   		$uploadData = $this->upload->data();
		   		$data['user_image'] = $config['upload_path'].'/'.$uploadData['file_name'];
		   }
		   else
		   {
		   		$data['user_image'] = '';
		   }
		}
		else
		{
			$data['user_image'] = $this->input->post('old_image');
		}

		if(!empty($data['user_id']))
		{
			$this->db->where('user_id',$data['user_id']);
			unset($data['user_id']);
			$update=$this->db->update('users',$data);
			$this->session->set_flashdata('success','Data Updated successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated successfully"]);
		}
		else 
		{
			$this->db->insert('users',$data);		
			$this->session->set_flashdata('success','User Added successfully !');
			echo json_encode(["status"=>"success","message"=>"User Added successfully !"]);
		}		
	}

	public function users()
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="users_list";
				$data['page'] ="users_list";
				$data['auth_level'] ="3";
				$data['user_info'] = $this->common_m->get_user_details(@user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['users'] = $this->common_m->get_users_list(3);
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/users_list');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	public function orders($user_type="")
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="orders";
				$data['page'] ="orders";
				$data['auth_level'] ="3";
				$data['user_info'] = $this->common_m->get_user_details(@user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['orders'] = $this->db->where("user_type",$user_type)->get("orders")->result_array();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/orders');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	public function sub_users()
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="users_list";
				$data['page'] ="users_list";
				$data['auth_level'] ="8";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['users'] = $this->common_m->get_users_list(8);
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/sub_users');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	public function view_orders($order_id="")
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="users_list";
				$data['page'] ="users_list";
				 $data['order_items'] = $this->website_Model->get_order_items($order_id);
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['users'] = $this->common_m->get_users_list(8);
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/view_orders');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	public function guest_orders($order_id="")
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="users_list";
				$data['page'] ="users_list";
				$data['order_items'] = $this->website_Model->get_order_items($order_id);
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/guest_orders');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	public function artists()
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="users_list";
				$data['auth_level'] ="6";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['users'] = $this->common_m->get_users_list(6);
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/users_list');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	public function delete_sub_category($value='')
	{
		$id=$this->input->post('id');
		$this->db->where('pcat_id',$id);
		$this->db->update('sub_categories',array("status"=>2));
		$this->session->set_flashdata('success','Data Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Data Deleted successfully"]);
	}

	public function delete_customise_product($value='')
	{
		$id=$this->input->post('id');
		$this->db->where('product_id',$id);
		$this->db->update('customised_products',array("status"=>2));
		$this->session->set_flashdata('success','Data Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Data Deleted successfully"]);
	}

	public function delete_category($value='')
	{
		$id=$this->input->post('id');
		$this->db->where('cat_id',$id);
		$this->db->update('categories',array("status"=>2));
		$this->session->set_flashdata('success','Data Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Data Deleted successfully"]);
	}

	public function profile()
	{
		if($this->session->userdata('auth_level'))
		{ 
			$data['user_info'] = $this->common_m->get_user_details(user_id);
			$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/includes/footer');
			$this->load->view('admin/profile');
		}
		else
		{
			redirect(base_url().'admin/index');
		}
	}

	public function profile_update()
	{
		$data = $this->input->post('data');
		$old_image = $this->input->post('old_image');
		if(!empty($_FILES['profile_image']['name']))
		{
	       $config['upload_path'] = 'assets/uploads/user_profiles/';
	       $config['allowed_types'] = '*';
	       $config['file_name'] = $_FILES['profile_image']['name'];
	       $this->load->library('upload',$config);
	       $this->upload->initialize($config);
	       if($this->upload->do_upload('profile_image'))
	       {
	       		$uploadData = $this->upload->data();
	       		$data['user_image'] = $config['upload_path'].$uploadData['file_name'];
	       }
	       else
	       {
	       		$data['user_image'] = '';
	       }
	    }
	    else
	    {
	    	$data['user_image'] =$old_image; 
	    }
		$this->db->where('user_id',$data['user_id'])->update('users',$data);
		$this->session->set_flashdata('success','Profile Updated successfully !');
		echo json_encode(["status"=>"success","message"=>"Profile Updated successfully"]);	   
	}

	public function update_pwd()
	{	 
	     $data2=$this->input->post('data2');
		 $id = $data2['user_id'];
		 $oldpassword =$data2['old_pass'];
		 $password =$data2['new_pass']; 
		 $data2['password']=base64_encode($password);
		 $res = $this->db->where('user_id',$id)->get('users')->row();
		 $db_pass = base64_decode($res->password);
		 
		 if($db_pass===$oldpassword)
		 {
		    $id = $data2['user_id'];
			$this->session->set_flashdata('success','Password Updated Successfully');
	        $this->db->set('password',$data2['password'])->where('user_id',$id)->update('users');
		    echo json_encode(["status"=>"success","message"=>"Password Updated successfully"]);			
		}
		else
		{
			echo json_encode(["status"=>"error","message"=>"Old Password is Incorrect !"]);
		}	   
	}

	public function color()
	{
	  if($this->session->userdata('auth_level')) 
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['color'] = $this->common_m->get_color();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/color');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}  
	}

	public function add_color($value='') 
	{
		$data 			= array();
		$data['color_id'] = $this->input->post('id');
		$data['pname'] 	= $this->input->post('pname');	
		$data['value']  = ($data['color_id'] != "") ? $this->common_m->get_color($data['color_id']) : array();
		$this->load->view('admin/add_color',$data);
	}

	public function save_color()
	{
		$data = $this->input->post('data');
		if($data['pname']=='color')
		{
			$table = 'color';
		}
		unset($data['pname']);	
		if(!empty($data['color_id']))
		{
			$this->db->where('color_id',$data['color_id']);
			unset($data['color_id']);
			$update=$this->db->update('color',$data);
			$this->session->set_flashdata('success','Data Updated successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated successfully"]);
		}
		else
		{
			$this->db->insert('color',$data);		
			$this->session->set_flashdata('success','Data Inserted successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted successfully"]);
		}
		
	}

	public function delete_color($value='')
	{
		$id=$this->input->post('id');
		$file=$this->input->post('file');
		if(@$file)
			@ unlink($file);
		$this->db->where('color_id',$id);
		$this->db->delete('color');		
		$this->session->set_flashdata('success','Type Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Type Deleted successfully"]);
	}

	public function size()
	{
	  if($this->session->userdata('auth_level')) 
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['size'] = $this->common_m->get_sizes();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/size');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}  
	}

	public function add_size($value='') 
	{
		$data 			= array();
		$data['size_id'] = $this->input->post('id');
		$data['pname'] 	= $this->input->post('pname');
		$data['value']  = ($data['size_id'] != "") ? $this->common_m->get_sizes($data['size_id']):array();
		$this->load->view('admin/add_size',$data);
	}

	public function save_size()
	{
		$data = $this->input->post('data');
		if($data['pname'] == 'size')
		{
			$table = 'size';
		}
		unset($data['pname']);

		if(!empty($data['size_id']))
		{
			$this->db->where('size_id',$data['size_id']);
			unset($data['size_id']);
			$update=$this->db->update('sizes',$data);
			$this->session->set_flashdata('success','Data Updated successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated successfully"]);
		}
		else
		{
			$this->db->insert('sizes',$data);			
			$this->session->set_flashdata('success','Data Inserted successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted successfully"]);
		}		
	}

	public function delete_size($value='')
	{
		$id=$this->input->post('id');
		$file=$this->input->post('file');
		if(@$file)
			@ unlink($file);
		$this->db->where('size_id',$id);
		$this->db->delete('sizes');		
		$this->session->set_flashdata('success','Type Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Type Deleted successfully"]);
	}

	public function change_status()
	{
	    $user_id = $this->input->post('user_id');
	    $status = $this->input->post('status');
	   
	    if($status == 1)
	    {
	     	$this->db->where('user_id',$user_id);
			$this->db->update('users',array('status'=>0));	
			$this->session->set_flashdata('success','User De Activate ');
			echo json_encode(["status"=>"success","message"=>"User De Activate"]);   
		
	    }
	    else
	    {
	      	$this->db->where('user_id',$user_id);
			$this->db->update('users',array('status'=>1));
			$this->session->set_flashdata('success','User Activated');
			echo json_encode(["status"=>"success","message"=>"User Activated"]);
	    }	    
	}

	//subscribe
	public function subscribe()
	{
	    if($this->session->userdata('auth_level'))
	    { 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['user_info'] = $this->common_m->get_user_details(@user_id);
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['subscribe'] = $this->common_m->get_subscribe();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/subscribe');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	public function delete_subscribe($value='')
	{
		$id=$this->input->post('id');		
		$this->db->where('sub_id',$id);
		$this->db->delete('subscribe');		
		$this->session->set_flashdata('success','Subscribe Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Subscribe Deleted successfully"]);
	}

	public function contactus()
	{
	    if($this->session->userdata('auth_level')) 
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
			    if($_POST)
			    {
			        $data = $this->input->post('data');
			        $this->db->update('contact',$data);
			        $this->session->set_flashdata('success','Data Updated successfully !');
			        redirect(base_url().'admin/contactus');
			    }			    
				$data['current_page']       ="contactus";
				$data['page_name']          ="Contact Us";
				$data['user_info']          = $this->common_m->get_user_details(user_id);
				$data['contact']     = $this->common_m->get_contact_us_requests();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/contactus');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	public function contact_us()
	{
	    if($this->session->userdata('auth_level')) 
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
			    if($_POST)
			    {
			        $data = $this->input->post('data');
			        $this->db->update('contact',$data);
			        $this->session->set_flashdata('success','Data Updated successfully !');
			        redirect(base_url().'admin/contactus');
			    }
			    
				$data['current_page']       ="contactus";
				$data['page_name']          ="Contact Us";
				$data['user_info']          = $this->common_m->get_user_details(user_id);
				$data['contact_us']     = $this->common_m->get_contact_us();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/contact_us');
			}
			else
			{
				redirect(base_url().'home/index');
			}

		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	public function delete_contact_req()
	{
		$id = $this->input->post('id');		
		$this->db->where('contact_id',$id);
		$this->db->delete('contact');	
		$this->session->set_flashdata('success','Contact Request Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Contact Request Deleted successfully"]);
	}

	public function faq_web()
	{
	    if($this->session->userdata('auth_level'))
	    { 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['faq_web'] = $this->common_m->get_faq_web();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/faq_web');

			}
			else
			{
				redirect(base_url().'home/index');
			}

		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	public function add_faq_web($value='') 
	{
		$data 			= array();
		$data['faq_id'] = $this->input->post('id');
		$data['value']  = ($data['faq_id'] != "") ? $this->common_m->get_faq_web($data['faq_id']) : array();
		$this->load->view('admin/add_faq_web',$data);
	}

	public function save_faq_web()
	{
		$data = $this->input->post('data');
	    $data['date'] = date('Y-m-d H:i:s');
		if(!empty($data['faq_id']))
		{
			$this->db->where('faq_id',$data['faq_id']);
			unset($data['faq_id']);
			$update=$this->db->update('faq_website',$data);
			$this->session->set_flashdata('success','Data Updated successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated successfully"]);
		}
		else
		{
			$this->db->insert('faq_website',$data);
			$this->session->set_flashdata('success','Data Inserted successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted successfully"]);
		}
		
	}

	public function delete_faq_web($value='')
	{
		$id=$this->input->post('id');
		$file=$this->input->post('file');
		if(@$file)
			@ unlink($file);
		$this->db->where('faq_id',$id);
		$this->db->delete('faq_website');
		$this->session->set_flashdata('success','Data Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Data Deleted successfully"]);
	}

	public function save_data($table)
	{
		$data = array();
		$data = $this->input->post('data');
		$id   = $this->input->post('id');

		if($id)
		{
			$this->db->set($data)->where('id',$id)->update($table);
			$this->session->set_flashdata('success','Data Updated Successfully');
			echo 1;
		}
		else
		{
			$this->db->insert($table,$data);			
			$this->session->set_flashdata('success','Data Inserted Successfully');
			echo 2;
		}
	}

	public function delete($table)
	{
		  $id=$this->input->post("id");
		  echo $this->db->where("id",$id)->delete($table);
	}

	public function feature_product($value='')
	{
		$id=$this->input->post('id');
		
		$feature_product = $this->db->get_where('products',array('pro_id'=>$id))->row_array()['feature_product'];
	   
	    if($feature_product == 1)
	    {
	     	$this->db->where('pro_id',$id);
			$this->db->update('products',array('feature_product'=>0));
			$this->session->set_flashdata('success','Un Set as Feature Product');
			echo json_encode(["status"=>"success","message"=>"Un Set as Feature Product "]);	
	    }
	    else
	    {
	      $this->db->where('pro_id',$id);
		  $this->db->update('products',array('feature_product'=>1));
		  $this->session->set_flashdata('success','Set as Feature Product ');
		  echo json_encode(["status"=>"success","message"=>' Set as Feature Product ']);
	    }
	}

	public function feature_artist($value='')
	{
		$id=$this->input->post('id');
		
		$feature_artist = $this->db->get_where('users',array('user_id'=>$id))->row_array()['featured_artist'];
	   
	    if($feature_artist == 1)
	    {
	     	$this->db->where('user_id',$id);
			$this->db->update('users',array('featured_artist'=>0));
			$this->session->set_flashdata('success','Un Set as Featured Artist');
			echo json_encode(["status"=>"success","message"=>"Un Set as Featured Artist"]);	
	    }
	    else
	    {
	      $this->db->where('user_id',$id);
		  $this->db->update('users',array('featured_artist'=>1));
		  $this->session->set_flashdata('success','Set as Featured Artist ');
		  echo json_encode(["status"=>"success","message"=>'Set as Featured Artist  ']);
	    }
	}

	public function approve_product($value='')
	{
		$id=$this->input->post('id');
		
		$approve_product = $this->db->get_where('products',array('pro_id'=>$id))->row_array()['approval_status'];
	   
	    if($approve_product == 1)
	    {
	     	$this->db->where('pro_id',$id);
			$this->db->update('products',array('approval_status'=>0));
			$this->session->set_flashdata('success','Now Product Is De-Active');
			echo json_encode(["status"=>"success","message"=>"Now Product Is De-Active"]);	
	    }
	    else
	    {
	      $this->db->where('pro_id',$id);
		  $this->db->update('products',array('approval_status'=>1));
		  $this->session->set_flashdata('success','Now Product Is Active');
		  echo json_encode(["status"=>"success","message"=>'Now Product Is Active']);
	    }
	}

	//<=========================Language Maintenanace START==================================================>

	public function language($page_id)
	{

	$page_details = $this->db->where('id',$page_id)->get('lang_manage')->row_array();
	$this->data['lang_manage'] = $this->db->get('lang_manage')->result_array();
	$this->data['user_info'] = $this->common_m->get_user_details(user_id);   

	$this->data['page_id']        = $page_id ;
	$this->data['page']           = $page_details['param_name'] ;
	$this->data['main_page_name'] = 'language' ;
	$this->data['page_name']      = $page_details['param_name'] ;
	$this->data['mode']           = (ENVIRONMENT=='development') ? '' : 'readonly' ;

	$data_en = ($page_details['data_en']) ? json_decode($page_details['data_en'],TRUE) : array();

	$data_ar = json_decode($page_details['data_ar'],TRUE);

	foreach ($data_en as $param => $value_en) 
	{
	  $data[$param] =  [
	                    'en' => $value_en, 
	                    'ar' => $data_ar[$param],
	                   ] ; 
	}

	$this->data['data'] = (@$data) ? $data : array() ;
	$this->load->view('admin/includes/header',$this->data);
	$this->load->view('admin/includes/footer',$this->data);
	$this->load->view('admin/set_lang',$this->data);
	}

	//Save Language
	public function save_language()
	{
	$en = $this->input->post('data')['en'];
	$ar = $this->input->post('data')['ar'];
	$page_id = $this->input->post('data')['id'];

	  $iar = array();

	  foreach ($ar as $param => $value) 
	  {
	    $iar[$param] = $value ;
	  }

	  $data_ar = json_encode($iar);

	  $this->db->set('data_ar',$data_ar)->where('id',$page_id)->update('lang_manage');   
	}


	//Adding Param
	public function add_param()
	{
		$this->data['lang_manage'] = $this->db->get('lang_manage')->result_array();
		$this->data['pages'] = $this->db->get('lang_manage')->result_array();
		$this->data['user_info'] = $this->common_m->get_user_details(user_id);
		$this->data['main_page_name'] = 'language' ;
		$this->data['page_name']      = "add_param" ;

		$this->load->view('admin/includes/header',$this->data);
		$this->load->view('admin/includes/footer',$this->data);
		$this->load->view('admin/add_param',$this->data);
	}


	//SAVING pARAMS
	public function save_params()
	{
		$data = $this->input->post('data');

		$page_id      = $data['page_id'] ;
		$param_names  = $data['params']  ;
		$en           = $data['en']      ;
		$ar           = $data['ar']      ;

		unset($data);

		$new_en = array();
		$new_ar = array();

		if($page_id)
		{
		  $old_data = $this->db->where('id',$page_id)->get('lang_manage')->row_array();

		  $new_en   = json_decode($old_data['data_en'],TRUE);
		  $new_ar   = json_decode($old_data['data_ar'],TRUE);
		}

		foreach ($param_names as $key => $param) 
		{
		  if($param!='')
		  {
		    $new_en[$param] = $en[$key] ;
		    $new_ar[$param] = $ar[$key] ;
		  }
		}

		$new_en = json_encode($new_en);
		$new_ar = json_encode($new_ar);

		$data = ['data_en'=>$new_en,'data_ar'=>$new_ar];

		if($page_id)
		{
		  $flag =$this->db->set($data)->where('id',$page_id)->update('lang_manage');
		}
		else
		{
		  $flag = $this->db->insert('lang_manage',$data);
		}

		echo $flag ;
	}


	//Remove Param from Page
	public function remove_param($page_id,$param_name)
	{
	    $old_data = $this->db->where('id',$page_id)->get('lang_manage')->row_array();

	    $new_en  = json_decode($old_data['data_en'],TRUE);
	    $new_ar  = json_decode($old_data['data_ar'],TRUE);


	    unset($new_en[$param_name]);
	    unset($new_ar[$param_name]);


	    $new_en = json_encode($new_en);
	    $new_ar = json_encode($new_ar);

	    $data = ['data_en'=>$new_en,'data_ar'=>$new_ar];   

	    $flag = $this->db->set($data)->where('id',$page_id)->update('lang_manage');
	    redirect('admin/language/'.$page_id);

	}

	//=========================Language Maintenanace START==================================================

	public function products()
	{
	    if($this->session->userdata('auth_level')) 
		{ 
			if($this->session->userdata('auth_level')==9)
			{
			    $data['page'] = "products";
			    $data['lang_manage'] = $this->db->get('lang_manage')->result_array();
			    $data['pcat_id'] = $this->uri->segment(4);
				$data['user_info'] = $this->common_m->get_user_details(@user_id);
				//$data['products'] = $this->common_m->get_products($product_type=2);
				$data['products'] = $this->common_m->get_customised_products_list();				
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer',$data);
				$this->load->view('admin/product',$data);
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}	    
	}

	public function one_piece_products()
	{
	    if($this->session->userdata('auth_level')) 
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
			    $data['page'] = "onepiece";
			    $data['lang_manage'] = $this->db->get('lang_manage')->result_array();			    
			    $data['pcat_id'] = $this->uri->segment(4);
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['products'] = $this->common_m->get_products($product_type=1);
				//$data['products'] = $this->common_m->get_customised_products_list();				
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer',$data);
				$this->load->view('admin/product',$data);
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}	    
	}	

	public function ads()
	{
		if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
		{
			$data['current_page'] ="ads";
			$data['user_info'] = $this->common_m->get_user_details(user_id);
			$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
			$data['ads'] = $this->common_m->get_ads();
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/includes/footer');
			$this->load->view('admin/ads');
		}
		else
		{
			redirect(base_url().'home/index');
		}

	}

	public function banners()
	{
		if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
		{
			$data['current_page'] ="ads";
			$data['user_info'] = $this->common_m->get_user_details(user_id);
			$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
			$data['banners'] = $this->common_m->get_banners();
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/includes/footer');
			$this->load->view('admin/banners');
		}
		else
		{
			redirect(base_url().'home/index');
		}

	}

	public function add_ads()
	{
	    $data 			= array();
		$data['ads_id'] = $this->input->post('id');
		$data['pname'] 	= $this->input->post('pname');
		$data['value']  = ($data['ads_id'] != "") ? $this->common_m->get_ads($data['ads_id']) : array();
		$this->load->view('admin/add_ads',$data);        
	}

	public function add_banner()
	{
	    $data 			= array();
		$data['banner_id'] = $this->input->post('id');
		$data['pname'] = $this->input->post('pname');
		$data['value'] = ($data['banner_id'] != "")?$this->common_m->get_banners($data['banner_id']):array();
		$data['pcat'] = $this->common_m->get_categories();
		$this->load->view('admin/add_banner',$data); 
	}

	public function save_ads()
	{
		$data = $this->input->post('data');		
		$data['date'] = date('Y-m-d H:i:s');
		unset($data['pname']);
		
		if(!empty($_FILES['addimage']['name']))
		{
		    $config['upload_path'] = 'assets/uploads/ads';
		    $config['allowed_types'] = '*';
		  
		    $path = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
		   	$extension = explode("/", $_FILES["addimage"]["type"]);
		    $new_name = $path.time().".".$extension[1];
		    $config['file_name'] = $new_name;   
		   
		   $this->load->library('upload',$config);
		   $this->upload->initialize($config);
		   if($this->upload->do_upload('addimage'))
		   {
		   		$uploadData = $this->upload->data();
		   		$data['ads_image'] = $config['upload_path'].'/'.$uploadData['file_name'];
		   }
		   else
		   {
		   		$data['ads_image'] = '';
		   }
		}
		else
		{
			$data['ads_image'] = $this->input->post('old_image');
		}

		if(!empty($data['ads_id']))
		{
			$this->db->where('ads_id',$data['ads_id']);
			unset($data['ads_id']);
			$update=$this->db->update('ads',$data);
			$this->session->set_flashdata('success','Data Updated successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated successfully"]);
		}
		else
		{
			$this->db->insert('ads',$data);
			$this->session->set_flashdata('success','Data Inserted successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted successfully"]);
		}	
	}

	public function save_banner()
	{
		$data = $this->input->post('data');
		$data['date'] = date('Y-m-d H:i:s');
		unset($data['pname']);

		if(!empty($_FILES['addimage']['name']))
		{
		    $config['upload_path'] = 'assets/uploads/banners';
		    $config['allowed_types'] = '*';
		  
		    $path = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
		   	$extension = explode("/", $_FILES["addimage"]["type"]);
	        $new_name = $path.time().".".$extension[1];
		    $config['file_name'] = $new_name;   
		   
		   $this->load->library('upload',$config);
		   $this->upload->initialize($config);
		   if($this->upload->do_upload('addimage'))
		   {
		   	    $uploadData = $this->upload->data();
		   		$data['banner_image'] = $config['upload_path'].'/'.$uploadData['file_name'];
		   }
		   else
		   {
		   		$data['banner_image'] = '';
		   }
		}
		else
		{
			$data['banner_image'] = $this->input->post('old_image');
		}

		if(!empty($data['banner_id']))
		{
			$this->db->where('banner_id',$data['banner_id']);
			unset($data['banner_id']);
			$update=$this->db->update('banners',$data);
			$this->session->set_flashdata('success','Data Updated successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated successfully"]);
		}
		else
		{
			$this->db->insert('banners',$data);
			$this->session->set_flashdata('success','Data Inserted successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted successfully"]);
		}	
	}

	public function delete_ads($value='')
	{
		$id=$this->input->post('id');
		$this->db->where('ads_id',$id);
		$this->db->delete('ads');
		$this->session->set_flashdata('success','Data Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Data Deleted successfully"]);
	}

	public function delete_banner($value='')
	{
		$id=$this->input->post('id');
		$this->db->where('banner_id',$id);
		$this->db->delete('banners');
		$this->session->set_flashdata('success','Data Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Data Deleted successfully"]);
	}

	 public function designs()
	{
	  if($this->session->userdata('auth_level')) 
    	{ 
    		if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
    		{
    			$data['user_info'] = $this->common_m->get_user_details(user_id);
    			$data['brand'] = $this->common_m->get_designs();
    			$this->load->view('admin/includes/header',$data);
    			$this->load->view('admin/includes/footer');
    			$this->load->view('admin/designs');
    		}
    		else
    		{
    			redirect(base_url().'home/index');
    		}
    	}
    	else
    	{
    		redirect(base_url().'home/index');
    	}  
	}
	
	public function add_design($value='') 
	{
		$data 			= array();
		$data['design_id'] = $this->input->post('id');
		$data['pname'] 	= $this->input->post('pname');
		$data['value']  = ($data['design_id'] != "") ? $this->common_m->get_designs($data['design_id']) : array();		
		$this->load->view('admin/add_design',$data);
	}
	
	public function save_design()
	{
		$data = $this->input->post('data');
		unset($data['pname']);
	
		if(!empty($data['design_id']))
		{
			$this->db->where('design_id',$data['design_id']);
			unset($data['design_id']);
			$update=$this->db->update('designs',$data);
			$this->session->set_flashdata('success','Data Updated successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated successfully"]);
		}
		else
		{
			$this->db->insert('designs',$data);
			$this->session->set_flashdata('success','Data Inserted successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted successfully"]);
		}
		
	}

	public function delete_design($value='')
	{
		$id=$this->input->post('id');		
		$this->db->where('design_id',$id);
		$this->db->delete('designs');
		$this->session->set_flashdata('success','Brand Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Brand Deleted successfully"]);
	}

	public function delete_product($value='')
	{
		$id=$this->input->post('id');
		$this->db->where('pro_id',$id);
		$this->db->update('products',array('approval_status' =>'2'));
		$this->session->set_flashdata('success','Data Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Data Deleted successfully"]);
	}

	public function testimonials()
	{
       if($this->session->userdata('auth_level')) 
       { 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['testimonials'] = $this->common_m->get_testimonials();
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/testimonials');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
		}
	}
	
	public function add_testimonial($value='') 
	{
		$data 			= array();
		$data['id'] = $this->input->post('id');
		$data['pname'] 	= $this->input->post('pname');
		$data['value']  = ($data['id'] != "") ? $this->common_m->get_testimonials($data['id']) : array();		
		$this->load->view('admin/add_testimonial',$data);
	}
	
	public function save_testimonial()
	{
		$data = $this->input->post('data');
	
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('testimonials',$data);
			$this->session->set_flashdata('success','Data Updated successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated successfully"]);
		}
		else
		{
			$this->db->insert('testimonials',$data);
			$this->session->set_flashdata('success','Data Inserted successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted successfully"]);
		}		
	}
	
	public function delete_testimonial($value='')
	{
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$this->db->delete('testimonials');
		$this->session->set_flashdata('success','Testimonial Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Testimonial Deleted successfully !"]);
	}

	public function social_media()
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="social_media";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['social_media'] = $this->common_m->get_social_media();
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/social_media');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
    	}
    }
    	
    public function add_social_media($value='') 
	{
		$data 			= array();
		$data['id'] = $this->input->post('id');
		$data['value']  = ($data['id'] != "") ? $this->common_m->get_social_media($data['id']) : array();
		$this->load->view('admin/add_social_media',$data);
	}

	public function set_positions_categories($value='') 
	{
		$data 			= array();
		$data['id'] = $this->input->post('id');
		$data['categories']  = $this->db->where("status",1)->order_by("position","asc")->get("categories")->result_array();
		$this->load->view('admin/categories_position',$data);
	}

	public function set_categories_positions()
	{
		$data = $this->input->post("cat");
		$i=1;
		foreach ($data as $key => $value)
		{
			$this->db->where("cat_id",$value)->update("categories",array("position"=>$i));
			$i++;		
		}
		$this->session->set_flashdata('success','positions successfully Changed !');
		echo json_encode(["status"=>"success","message"=>"positions successfully Changed !"]);
	}
	
	public function save_social_media()
	{
		$data = $this->input->post('data');
	    $data['date'] = date('Y-m-d H:i:s');
	    if(!empty($_FILES['addimage']['name']))
		{
		    $config['upload_path'] = 'assets/uploads/social';
		    $config['allowed_types'] = '*';
		  
		    $path = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
		   	$extension = explode("/", $_FILES["addimage"]["type"]);
	        $new_name = $path.time().".".$extension[1];
		    $config['file_name'] = $new_name;   
		   
		   $this->load->library('upload',$config);
		   $this->upload->initialize($config);
		   if($this->upload->do_upload('addimage'))
		   {
		   	    $uploadData = $this->upload->data();
		   		$data['image'] = $config['upload_path'].'/'.$uploadData['file_name'];
		   }
		   else
		   {
		   		$data['image'] = '';
		   }
		}
		else
		{
			$data['image'] = $this->input->post('old_image');
		}

		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('social_media',$data);	
			$this->session->set_flashdata('success','Data Updated successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated successfully"]);
		}
		else
		{
			$this->db->insert('social_media',$data);		
			$this->session->set_flashdata('success','Data Inserted successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted successfully"]);
		}
		
	}   	
	
	public function delete_social_media($value='')
	{
		$id = $this->input->post('id');		
		$check = $this->db->delete('social_media',array('id'=>$id))->row_array();
		if($check)
		{
			$this->session->set_flashdata('success','Data Deleted successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Deleted successfully !"]);
		}
		else
		{
			$this->session->set_flashdata('success','Data Unable to Deleted !');
			echo json_encode(["status"=>"success","message"=>"Data Unable to Deleted"]);
		}
	}

    public function showuser($id)
	{
		if($this->session->userdata('auth_level'))
		{ 
			$data['user_info'] = $this->common_m->get_user_details(user_id);
			$data['customer_info'] = $this->common_m->get_user_details($id);
			$data["orders"] = $this->db->order_by("id","desc")->where("user_id",@$id)->get("orders")->result_array();
			$data['favorites'] = $this->website_Model->get_user_favorites(@$id);
			$data['followings'] = $this->website_Model->get_user_followings(@$id);
		   if($data['customer_info']->auth_level==6)
	       {
	          $data['sales'] = $this->website_Model->artist_sales(@$id);
	          $data['mydesigns'] = $this->db->where(array("user_id"=>@$id))->get("products")->result_array();
	          $data['onepiece_designs'] = $this->db->where(array("user_id"=>@$id,"product_type"=>1))->get("products")->result_array();
	       }
			//print_r($data['sales']);exit();
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/includes/footer');
			$this->load->view('admin/view_users');	
		}
		else
		{
			redirect(base_url().'home/index');
		}

	}

	/*public function delete_users($value='')
	{
		$id=$this->input->post('id');
		$file=$this->input->post('file');
		if(@$file){
		if(@$file != 'assets/uploads/user_profiles/user.jpg'){
			@ unlink($file);
		 }
		}
		$this->db->where('user_id',$id)->delete("users");
		
		$this->session->set_flashdata('success','User Deleted successfully !');
		echo json_encode(["status"=>"success","message"=>"Member Deleted successfully"]);
	}*/

	public function product_details($product_id='')
	{
		if($this->session->userdata('auth_level')) { 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				if($product_id != "")
				{
					$data['product'] = $this->db->where('pro_id',$product_id)->get("products")->row_array();
					if($data['product']['product_type'] == 1)
					{
						$product_colors = $this->db->where('pro_id',$product_id)->get("product_colors")->result_array();
						foreach ($product_colors as $key => $value) {
							$data['product_colors'][] = $value['color_id'];
						}

						$product_sizes = $this->db->where('pro_id',$product_id)->get("product_sizes")->result_array();
						foreach ($product_sizes as $key => $value) {
							$data['product_sizes'][] = $value['size_id'];
						}
					}
					else
					{
						$data['product_colors'] = array(0,0,0,0);
						$data['product_sizes'] =  array('0'=>'0');
					}
				}

				$data['current_page'] ="categories";
				$data['lang_manage'] = $this->db->get('lang_manage')->result_array();
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['pcat'] = $this->common_m->get_categories();				
				$data['colors'] = $this->common_m->get_color();				
				$data['designs'] = $this->common_m->get_designs();				
				$data['sizes'] = $this->common_m->get_sizes();				
				$data['customized_products'] = $this->common_m->get_customised_products();

				$data['page'] = 'Product';
				$data['subpage'] = 'products';
				$data['user_info'] = $this->common_m->get_user_details(user_id);				
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer',$data);
			    $this->load->view('admin/view_product',$data);
		    }
		    else
		    {
				redirect(base_url().'home/index');
		    }

		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	public function terms_conditions()
	{
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="terms_conditions";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['terms'] = $this->common_m->get_terms('terms_and_conditions');
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/terms_conditions');

			}
			else
			{
				redirect(base_url().'home/index');
			}

		}
		else
		{
			redirect(base_url().'home/index');
		}
	}

	//terms save
	public function save_terms()
	{
		$data = $this->input->post('data');
		$id =$this->input->post('id');
		if($id){
			$this->db->set($data)->where('id',$id)->update('terms_and_conditions');
			$this->session->set_flashdata('success','Date Updated successfully !');
			redirect(base_url()."admin/terms_conditions");
		}
		else
		{
			$this->db->insert('terms_and_conditions',$data);
			$this->session->set_flashdata('success','Date Inserted successfully !');
			redirect(base_url()."admin/terms_conditions");

		}
	}

//updated methods above
		
	  
	//about
   public function about()
   {
	if($this->session->userdata('auth_level')) { 
		if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
		{
			$data['current_page'] ="about";
			$data['user_info'] = $this->common_m->get_user_details(user_id);
			$data['terms'] = $this->common_m->get_about('about');
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/includes/footer');
			$this->load->view('admin/about');
		}
		else
		{
			redirect(base_url().'home/index');
		}
	}
	else
	{
		redirect(base_url().'home/index');
		}
	}

	//about  save
	public function save_about()
	{
		$data = $this->input->post('data');
		$id =$this->input->post('id');
		
		 if(!empty($_FILES['addimage']['name']))
		 {
			   $config['upload_path'] = 'assets/uploads/banners';
			   $config['allowed_types'] = '*';
			   $config['file_name'] = $_FILES['addimage']['name'];     
			   $this->load->library('upload',$config);
			   $this->upload->initialize($config);
			   if($this->upload->do_upload('addimage')){
			   $uploadData = $this->upload->data();
			   $data['image'] = $config['upload_path'].'/'.$uploadData['file_name'];
			   }else{
			   $data['image'] = '';
			   }
		}
		else
		{
			$data['image'] = $this->input->post('old_image');
		}
		
		
		if($id)
		{
			$this->db->set($data)->where('about_id',$id)->update('about');
			$this->session->set_flashdata('success','Data Updated successfully !');
			redirect(base_url()."admin/about");
		}
		else
		{
			$this->db->insert('about',$data);
			//echo $this->db->last_query(); exit;
			$this->session->set_flashdata('success','Data Inserted successfully !');
			redirect(base_url()."admin/about");

		}
	}

	//services list
	public function promo_code()
	{
		if($this->session->userdata('auth_level')) { 
			if($this->session->userdata('auth_level') == 9 || $this->session->userdata('auth_level') == 8)
			{
				$data['current_page'] ="promo_code";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['promo'] = $this->common_m->get_promo_code();
				//print_r($data['promo']);exit;
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/promo_code');

			}else{
				redirect(base_url().'home/index');
			}

		}else{
			redirect(base_url().'home/index');
		}
	}	   
	
//resize
	public function resize2($file,$save)
	{
        list($width, $height) = getimagesize($file) ;

             $modwidth = 10; //350
             $diff = $width / $modwidth;
             $modheight = $height / $diff;
             $tn = imagecreatetruecolor($modwidth, $modheight) ;
             
             $image = imagecreatefrompng($file) ;
             imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

             imagejpeg($tn, $save, 100) ;
    }
	
	

}
