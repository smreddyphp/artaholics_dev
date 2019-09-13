<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller{
    
    public function __construct()
    {
        parent :: __construct();        
        date_default_timezone_set('Asia/Kolkata');
       	$this->load->model('Website_Model');       	
    }

    //Updated Above Methods
    
    public function check_user()
    { 
      $user_name = $this->input->post('user_name');
      $get_user_name = $this->db->get_where('users',array('user_name'=>$user_name))->num_rows();
      
      if($get_user_name > 0)
      {
       echo json_encode(['status'=> 0, 'message'=>'User Name Already Exists... Try Another Name']);
      }
      else 
      {
        echo json_encode(['status'=> 1, 'message'=>'User Name Available']);
      }
      
    }
    
    public function check_mobile()
    { 
      $mobile_no = $this->input->post('mobile_no');
      $get_user_mobile = $this->db->get_where('users',array('mobile_no'=>$mobile_no))->num_rows();
      
      if($get_user_mobile > 0)
      {
          echo json_encode(['status'=> 0, 'message'=>'User Name Already Exists... Try Another Name']);
      }
      else 
      {
          echo json_encode(['status'=> 1, 'message'=>'User Name Available']);
      }
      
    }
    
    public function get_type_id()
    {
        $data['type_id'] = $this->input->post('type_id');
        $data['lang'] = $this->input->post('lang');
       // print_r($data);exit;
        $get_product_categories = $this->Website_Model->get_product_category($data);
      //  print_r($get_product_categories);exit;
        foreach($get_product_categories as $value)
        {
            echo '<option value="'.$value['pcat_id'].'">'.ucfirst($value['product_catgeory']).'</option>';
        }
        
    }
    
    
    public function my_filter()
    {
       $data['lang'] = $this->session->userdata('lang');    
       $price   = $this->input->post('price');
       $search = $this->input->post('search');
       $data['sort'] = $this->input->post('sort');
       $data['mcat_id'] = $this->input->post('mcat_id');
       $filter['brand'] = implode(',',$this->input->post('brand_id'));
       $filter['color'] = implode(',',$this->input->post('color_id'));
       $filter['size'] = implode(',',$this->input->post('size_id'));
       $filter['category'] = implode(',',$this->input->post('pcat_id'));
       $filter['hide_sold'] = implode(',',$this->input->post('hide_sold'));
       $filter['city'] = implode(',',$this->input->post('city_id'));
       
      /* $filter['condition1'] = $this->input->post('condition1');
       $filter['condition2'] = $this->input->post('condition2');*/
       
      // $filter['check_service'] = $this->input->post('check');
      // $filter['new']   = implode(',',$this->input->post('my_new'));
      // $filter['invoice_available'] = $this->input->post('invoice');
      // $filter['guarantee_available'] = $this->input->post('guarantee');
       
         $new = implode(',',$this->input->post('my_new'));
         if($new != '')
         {
           $filter['new'] =  "'" . str_replace(",", "','", $new) . "'"; //this code for 'yes','no'
         }else{$filter['new'] ='';}
        
         $check_service = implode(',',$this->input->post('check'));
          if($check_service !=''){
          $filter['check_service'] = "'" . str_replace(",", "','", $check_service) . "'";
          }else{$filter['check_service'] ='';}
         
         $invoice_available = implode(',',$this->input->post('invoice'));
         if($invoice_available !=''){
         $filter['invoice_available'] = "'" . str_replace(",", "','", $invoice_available) . "'";
         }else{$filter['invoice_available'] ='';}
          
         $guarantee_available =  implode(',',$this->input->post('guarantee'));
         if($guarantee_available !=''){
         $filter['guarantee_available'] = "'" . str_replace(",", "','", $guarantee_available) . "'";
         }else{$filter['guarantee_available'] ='';}     
         
       
       if($price !='')
       {
           $price1 = explode('-',$price[0]);
           $filter['min_price'] = $price1[0];
           
           $price2 = explode('-',$price[count($price)-1]);
           if($price2[1] == 'higher')
           {
             $this->db->select_max('price');
             $filter['max_price'] = $this->db->get('products')->row_array()['price'];  
           }
           else
           {
           $filter['max_price'] = $price2[1];
           }
       }
       
      // print_r($filter);exit;
       
       $filter_product = $this->Website_Model->get_my_filter($data,$search,$filter);
      // echo $this->db->last_query();exit;
    //  print_r($filter_product);exit;
    //converter   
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
         //  $filter_product =array();
       
       }
       //end converter
       
      
       if($filter_product)
       {
           foreach($filter_product as $key=>$value)
           {
                $prod_image = $this->db->get_where('product_images',array('prod_id'=>$value['prod_id'],'image_select'=>1))->row_array();
                $brand = $this->db->get_where('brand',array('brand_id'=>$value['brand_id']))->row_array()['brand_name_'.$data['lang']];
				$type = $this->db->get_where('product_type',array('type_id'=>$value['type_id']))->row_array()['product_type_'.$data['lang']];
				$cat = $this->db->get_where('product_categories',array('pcat_id'=>$value['category_id']))->row_array()['pcat_name_'.$data['lang']];
				
					///////////Image rotation fixed
                     $image = $prod_image['image'];
        
                     $exif = exif_read_data($image,"EXIF");
       
                     if($exif['Orientation']==6)
                     {
                       $prod_image['image_res_flag'] = 90 ;  //assigning rotation value
                     }
                 //////////////////////////
				            
	            echo '
		               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 width-resp320">
					<div class="single-new-product bg_white">
						<div class="'; echo ($prod_image['image_res_flag']==90)?'product-img1':'product-img'; echo'">
							<a href="'.base_url().'website/product_details/'.$value['prod_id'].'"> <img src="'.base_url().$prod_image['image'].'" class="first_img '; if(@$prod_image['image_res_flag']==90) { echo 'diff_image' ; } echo '" alt="" />  </a>
						</div>
					<div class="products_thumb img-thumnail prodctar-thumnail ">
							<div class="bg-overlay"></div>
								<img src="'.base_url().'assets/uploads/watermark/logosmall@3x.png" class="first_img" alt="">
							</div>
						
						<div class="product-content text-center">
							<h4>'.ucfirst($cat).'</h4>
							<h4>'.$brand.'</h4> <a href="javascript:"><h4>'.ucfirst($value['product_name']).'</h4></a>
							<div class="price">
								<h4>'.$value['price'].'&nbsp;<span>'.$value['currency'].'</span></h4> </div>
							<div class="product-price-star">  </div>
						</div>
						<div class="product-icon-wrapper">
							<div class="product-icon">
								<ul>
									<li><a href="#"><span class="lnr lnr-sync"></span></a></li>
									<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
									<li><a href="#"><span class="lnr lnr-cart"></span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
	            ';
           }
       }
       else if($new_product)
       {
           foreach($new_product as $key=>$value)
           {
                $prod_image = $this->db->get_where('product_images',array('prod_id'=>$value['prod_id'],'image_select'=>1))->row_array();
                $brand = $this->db->get_where('brand',array('brand_id'=>$value['brand_id']))->row_array()['brand_name_'.$data['lang']];
				$type = $this->db->get_where('product_type',array('type_id'=>$value['type_id']))->row_array()['product_type_'.$data['lang']];
				$cat = $this->db->get_where('product_categories',array('pcat_id'=>$value['category_id']))->row_array()['pcat_name_'.$data['lang']];
				
					///////////Image rotation fixed
                     $image = $prod_image['image'];
        
                     $exif = exif_read_data($image,"EXIF");
       
                     if($exif['Orientation']==6)
                     {
                       $prod_image['image_res_flag'] = 90 ;  //assigning rotation value
                     }
                 //////////////////////////
						            
                echo '
    	               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 width-resp320">
    				<div class="single-new-product bg_white">
    					<div class="'; echo ($prod_image['image_res_flag']==90)?'product-img1':'product-img'; echo'">
    						<a href="'.base_url().'website/product_details/'.$value['prod_id'].'"> <img src="'.base_url().$prod_image['image'].'" class="first_img '; if(@$prod_image['image_res_flag']==90) { echo 'diff_image' ; } echo '" alt="" />  </a>
    					</div>
    				<div class="products_thumb img-thumnail prodctar-thumnail ">
							<div class="bg-overlay"></div>
								<img src="'.base_url().'assets/uploads/watermark/logosmall@3x.png" class="first_img " alt="">
							</div>
    					
    					<div class="product-content text-center">
    						<h4>'.ucfirst($cat).'</h4>
    						<h4>'.$brand.'</h4> <a href="javascript:"><h4>'.ucfirst($value['product_name']).'</h4></a>
    						<div class="price">
    							<h4>'.$value['price'].'&nbsp;<span>'.$value['currency'].'</span></h4> </div>
    						<div class="product-price-star"> </div>
    					</div>
    					<div class="product-icon-wrapper">
    						<div class="product-icon">
    							<ul>
    								<li><a href="#"><span class="lnr lnr-sync"></span></a></li>
    								<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
    								<li><a href="#"><span class="lnr lnr-cart"></span></a></li>
    							</ul>
    						</div>
    					</div>
    				</div>
    			</div>
                ';
           }
       }
       else
       {
           echo 'No record Found';
       }
       
       
       
    }
    
    //for list view
    
     public function my_filter_list()
    {
       $data['lang'] = $this->session->userdata('lang');    
       $price   = $this->input->post('price');
       $search = $this->input->post('search');
       $data['sort'] = $this->input->post('sort');
       $data['mcat_id'] = $this->input->post('mcat_id');
       $filter['brand'] = implode(',',$this->input->post('brand_id'));
       $filter['color'] = implode(',',$this->input->post('color_id'));
       $filter['size'] = implode(',',$this->input->post('size_id'));
       $filter['category'] = implode(',',$this->input->post('pcat_id'));
       $filter['hide_sold'] = implode(',',$this->input->post('hide_sold'));
       $filter['city'] = implode(',',$this->input->post('city_id'));
       
       
      /* $filter['condition1'] = $this->input->post('condition1');
       $filter['condition2'] = $this->input->post('condition2');*/
       
      // $filter['check_service'] = $this->input->post('check');
      // $filter['new']   = implode(',',$this->input->post('my_new'));
      // $filter['invoice_available'] = $this->input->post('invoice');
      // $filter['guarantee_available'] = $this->input->post('guarantee');
       
         $new = implode(',',$this->input->post('my_new'));
         if($new != '')
         {
           $filter['new'] =  "'" . str_replace(",", "','", $new) . "'"; //this code for 'yes','no'
         }else{$filter['new'] ='';}
        
         $check_service = implode(',',$this->input->post('check'));
          if($check_service !=''){
          $filter['check_service'] = "'" . str_replace(",", "','", $check_service) . "'";
          }else{$filter['check_service'] ='';}
         
         $invoice_available = implode(',',$this->input->post('invoice'));
         if($invoice_available !=''){
         $filter['invoice_available'] = "'" . str_replace(",", "','", $invoice_available) . "'";
         }else{$filter['invoice_available'] ='';}
          
         $guarantee_available =  implode(',',$this->input->post('guarantee'));
         if($guarantee_available !=''){
         $filter['guarantee_available'] = "'" . str_replace(",", "','", $guarantee_available) . "'";
         }else{$filter['guarantee_available'] ='';}     
         
       
       if($price !='')
       {
           $price1 = explode('-',$price[0]);
           $filter['min_price'] = $price1[0];
           
           $price2 = explode('-',$price[count($price)-1]);
           if($price2[1] == 'higher')
           {
             $this->db->select_max('price');
             $filter['max_price'] = $this->db->get('products')->row_array()['price'];  
           }
           else
           {
           $filter['max_price'] = $price2[1];
           }
       }
       
      // print_r($filter);exit;
       
       $filter_product = $this->Website_Model->get_my_filter($data,$search,$filter);
       //echo $this->db->last_query();exit;
    //  print_r($filter_product);exit;
    //converter   
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
         //  $filter_product =array();
       
       }
       //end converter
       
     
       if($filter_product)
       {
           foreach($filter_product as $key=>$value)
           {
                $prod_image = $this->db->get_where('product_images',array('prod_id'=>$value['prod_id'],'image_select'=>1))->row_array();
                $brand = $this->db->get_where('brand',array('brand_id'=>$value['brand_id']))->row_array()['brand_name_'.$data['lang']];
				$type = $this->db->get_where('product_type',array('type_id'=>$value['type_id']))->row_array()['product_type_'.$data['lang']];
				$cat = $this->db->get_where('product_categories',array('pcat_id'=>$value['category_id']))->row_array()['pcat_name_'.$data['lang']];
				  
				  	///////////Image rotation fixed
                     $image = $prod_image['image'];
        
                     $exif = exif_read_data($image,"EXIF");
       
                     if($exif['Orientation']==6)
                     {
                       $prod_image['image_res_flag'] = 90 ;  //assigning rotation value
                     }
                 //////////////////////////class="'; echo ($prod_image['image_res_flag']==90)?'product-img1':'product-img1'; echo'"
				            
	            echo '
		                  <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 width_res">
							<div class="single-new-product bg_white list-new-product">
							<div class="col-lg-3 col-md-4 col-sm-5 col-xs-6 pad320_0 product_lview">
							<div class="img-thumnail prodctar-thumnail listv_thumb products_thumb">
							<div class="bg-overlay"></div>
								<img src="'.base_url().'assets/uploads/watermark/logosmall@3x.png" class="first_img" alt="">
							</div>
    										
							<div class=" '; echo ($prod_image['image_res_flag']==90)?'product-img1':'product-img'; echo' list1_img">
								<a href="'.base_url().'website/product_details/'.$value['prod_id'].'"> <img src="'.base_url().$prod_image['image'].'" class="first_img '; if(@$prod_image['image_res_flag']==90) { echo 'diff_image' ; } echo '" alt="" /> </a>
							</div>
							</div>
                            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-6 pad320_0 product_lviewc">
							<div class="product-content text-center listp_content">
								<h4>'.ucfirst($cat).'</h4>
								<h4>'.$brand.'</h4> <a href="javascript:">	<h4>'.ucfirst($value['product_name']).'</h4></a>
								<div class="price">
									<h4>'.$value['price'].'&nbsp;<span>'.$value['currency'].'</span></h4> </div>
								<div class="product-price-star">  </div>
							</div>
							<div class="product-icon-wrapper">
								<div class="product-icon">
									<ul>
										<li><a href="#"><span class="lnr lnr-sync"></span></a></li>
										<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
										<li><a href="#"><span class="lnr lnr-cart"></span></a></li>
									</ul>
								</div>
							</div>
							</div>
						</div>
					</div>
	            ';
           }
       }
       else if($new_product)
       {
           foreach($new_product as $key=>$value)
           {
                $prod_image = $this->db->get_where('product_images',array('prod_id'=>$value['prod_id'],'image_select'=>1))->row_array();
                $brand = $this->db->get_where('brand',array('brand_id'=>$value['brand_id']))->row_array()['brand_name_'.$data['lang']];
				$type = $this->db->get_where('product_type',array('type_id'=>$value['type_id']))->row_array()['product_type_'.$data['lang']];
				$cat = $this->db->get_where('product_categories',array('pcat_id'=>$value['category_id']))->row_array()['pcat_name_'.$data['lang']];
				
				///////////Image rotation fixed
                 $image = $prod_image['image'];
    
                 $exif = exif_read_data($image,"EXIF");
   
                 if($exif['Orientation']==6)
                 {
                   $prod_image['image_res_flag'] = 90 ;  //assigning rotation value
                 }
             //////////////////////////class="'; echo ($prod_image['image_res_flag']==90)?'product-img1':'product-img1'; echo'"
				
						            
                echo '
                      <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 width_res">
                    					<div class="single-new-product bg_white list-new-product">
                    					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    					<div class="img-thumnail prodctar-thumnail listv_thumb products_thumb">
                    	<div class="bg-overlay"></div>
                    		<img src="'.base_url().'assets/uploads/watermark/logosmall@3x.png" class="first_img" alt="">
                    	</div>
					
						<div class=" list1_img '; echo ($prod_image['image_res_flag']==90)?'product-img1':'product-img'; echo'">
							<a href="'.base_url().'website/product_details/'.$value['prod_id'].'"> <img src="'.base_url().$prod_image['image'].'" class="first_img '; if(@$prod_image['image_res_flag']==90) { echo 'diff_image' ; } echo ' " alt="" /> </a>
						</div>
						</div>
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6">
						<div class="product-content text-center listp_content">
							<h4>'.ucfirst($cat).'</h4>
							<h4>'.$brand.'</h4> <a href="javascript:"><h4>'.ucfirst($value['product_name']).'</h4></a>
							<div class="price">
								<h4>'.$value['price'].'&nbsp;<span>'.$value['currency'].'</span></h4> </div>
							<div class="product-price-star">  </div>
						</div>
						<div class="product-icon-wrapper">
							<div class="product-icon">
								<ul>
									<li><a href="#"><span class="lnr lnr-sync"></span></a></li>
									<li><a href="#"><span class="lnr lnr-heart"></span></a></li>
									<li><a href="#"><span class="lnr lnr-cart"></span></a></li>
								</ul>
							</div>
						</div>
						</div>
					</div>
				</div>
                ';
           }
       }
       else
       {
           echo 'No record Found';
       }
       
       
       
    }
    
    
    
    
    
    
    
    public function image_select()
    {
        $pimg_id = $this->input->post('pimg_id');
        $update = $this->db->where(array('pimg_id'=>$pimg_id))->update('product_images',array('image_select'=>1));
    
        if($update)
        {
            echo json_encode(['status'=>1,'message'=>'success']);
            $this->session->set_flashdata('message3','Product Add Successfull');
        }
        else
        {
            echo json_encode(['status'=>0,'message'=>'fail']);
        }
    }
    
    public function my_favorite()
    {
        $data['user_id'] = $this->input->post('user_id');
        $data['prod_id'] = $this->input->post('prod_id');
        $data['date']    = date('Y-m-d H:i:s');
        $check_fav = $this->db->get_where('my_favorite',array('user_id'=>$data['user_id'],'prod_id'=>$data['prod_id']))->num_rows();
        if($check_fav > 0)
        {
            $this->db->where(array('prod_id'=>$data['prod_id'],'user_id'=>$data['user_id']))->delete('my_favorite');  
        }
        else
        {
            $this->db->insert('my_favorite',$data);
        }
    }
    
    
    public function my_sold()
    {
        $prod_id = $this->input->post('prod_id');
        $product = $this->db->get_where('products',array('prod_id'=>$prod_id))->row_array();
        if($product['sold_out'] == 0)
        {
            $this->db->where(array('prod_id'=>$prod_id))->update('products',array('sold_out'=>1));
        }
        else
        {
            $this->db->where(array('prod_id'=>$prod_id))->update('products',array('sold_out'=>0));
        }
    }
  
    public function my_ads_delete()
    {
        $prod_id = $this->input->post('prod_id');
        $this->db->where(array('prod_id'=>$prod_id))->update('products',array('delete_product'=>1));
    }
    
     public function my_fav_delete()
    {
        $prod_id = $this->input->post('prod_id');
        $user_id = $this->input->post('user_id');
        $this->db->delete('my_favorite',array('prod_id'=>$prod_id,'user_id'=>$user_id));
    }
    
    public function my_img_delete()
    {
         $pimg_id = $this->input->post('pimg_id');
         $this->db->delete('product_images',array('pimg_id'=>$pimg_id));
    }
    
    public function my_saved_search()
    {
       $data['user_id'] = $this->input->post('user_id');    
       $price   = $this->input->post('price');
       $data['search'] = $this->input->post('search');
       $data['mcat_id'] = $this->input->post('mcat_id');
       $data['brand_id'] = $this->input->post('brand_id');
       $data['color_id'] = $this->input->post('color_id');
       $data['size_id'] = $this->input->post('size_id');
       $data['category_id'] = $this->input->post('pcat_id');
       $data['hide_sold'] = $this->input->post('hide_sold');
       $data['new']  = $this->input->post('my_new');
       $data['check_service'] = $this->input->post('check');
       $data['invoice_available'] = $this->input->post('invoice');
       $data['guarantee_available'] = $this->input->post('guarantee');
       $data['city_id'] = $this->input->post('city_id');
       
       
       if($data['brand_id'] !=''){
       $data['brand_id'] = implode(',', $data['brand_id']);
       }else{$data['brand_id']='';}
       if($data['color_id'] !=''){
       $data['color_id'] = implode(',',$data['color_id']);
       }else{$data['color_id'] ='';}
       if($data['size_id'] !=''){
       $data['size_id'] = implode(',',$data['size_id']);
       }else{$data['size_id'] = '';}
       if($data['category_id'] !=''){
       $data['category_id'] = implode(',',$data['category_id']);
       }else{$data['category_id'] ='';}
       if($data['hide_sold'] !=''){
       $data['hide_sold'] = implode(',',$data['hide_sold']);
       }else{$data['hide_sold'] ='';}
       if($data['city_id'] !=''){
       $data['city_id'] = implode(',', $data['city_id']);
       }else{$data['city_id']='';}
       
       
      
         if($data['new'] != '')
         {
            $data['new'] = implode(',',$data['new']);
         }else{$data['new'] ='';}
        
         
          if($data['check_service'] !=''){
          $data['check_service'] = implode(',',$data['check_service']);
          }else{$data['check_service'] ='';}
         
         
         if($data['invoice_available'] !=''){
        $data['invoice_available'] = implode(',',$data['invoice_available']);
         }else{$data['invoice_available'] ='';}
          
         
         if($data['guarantee_available'] !=''){
         $data['guarantee_available'] =  implode(',',$data['guarantee_available']);
         }else{$data['guarantee_available'] ='';}     
         
       
       if($price !='')
       {
           $price1 = explode('-',$price[0]);
           $data['min_price'] = $price1[0];
           
           $price2 = explode('-',$price[count($price)-1]);
           if($price2[1] == 'higher')
           {
             $this->db->select_max('price');
             $data['max_price'] = $this->db->get('products')->row_array()['price'];  
           }
           else
           {
           $data['max_price'] = $price2[1];
           }
       }
    
     $saved_search = $this->db->insert('saved_search',$data);
   //  echo $this->db->last_query();exit;
   // print_r($data);exit;
    /*if($data['mcat_id'] != '')
    {
    $get_saved = $this->db->get_where('saved_search',array('user_id'=>$data['user_id'],'mcat_id'=>$data['mcat_id'],'color_id'=>$data['color_id'],'brand_id'=>$data['brand_id'],'size_id'=>$data['size_id'],'min_price'=>$data['min_price'],'max_price'=>$data['max_price'],'city_id'=>$data['city_id'],'hide_sold'=>$data['hide_sold'],'new'=>$data['new'],'check_service'=>$data['check_service'],'invoice_available'=>$data['invoice_available'],'guarantee_available'=>$data['guarantee_available'],'sort_by'=>$data['sort_by'],'search'=>$data['search']))->num_rows();    
    }
    else
    {
    $get_saved = $this->db->get_where('saved_search',array('user_id'=>$data['user_id'],'type_id'=>$data['type_id'],'category_id'=>$data['category_id'],'color_id'=>$data['color_id'],'brand_id'=>$data['brand_id'],'size_id'=>$data['size_id'],'min_price'=>$data['min_price'],'max_price'=>$data['max_price'],'city_id'=>$data['city_id'],'hide_sold'=>$data['hide_sold'],'new'=>$data['new'],'check_service'=>$data['check_service'],'invoice_available'=>$data['invoice_available'],'guarantee_available'=>$data['guarantee_available'],'sort_by'=>$data['sort_by'],'search'=>$data['search']))->num_rows();
    }
    echo $this->db->last_query();exit;
      if($get_saved == 0)
      {
        $saved_search = $this->db->insert('saved_search',$data);
          
          if($saved_search)
          {
           // $result = ["status"=> 1, "message" =>($lang=='en')? "Your Search was saved":"تم حفظ البحث الخاص بك"];
            echo 'Your Search was saved';
          }
          else
          {
          // $result = ["status"=> 0, "message" =>($lang=='en')? "Your Search not saved":"البحث الخاص بك غير محفوظ"];
           echo 'Your Search not saved';
          }   
      }
      else
      {
        //   $result = ["status"=> 0, "message" =>($lang=='en')? "Already Saved this Search":"بالفعل قمت بحفظ هذا البحث"];
           echo 'Already Saved this Search';
      }*/
    
    }
    
    
    public function send_chat()
    {
        $data['sender_id'] = $this->input->post('sender_id');
        $data['receiver_id'] = $this->input->post('receiver_id');
        $data['chat_msg'] = $this->input->post('chat_msg');
        $data['date'] = date('Y-m-d H:i:s');
        
        $insert = $this->db->insert('chat',$data);
      
        if($insert)
        {
            echo 'success';
            
             $get_users = $this->db->get_where('users',array('user_id'=>$data['receiver_id'],'status'=>1))->row_array();
                  
                    if($get_users['device_type'] =='Android' || $get_users['device_type'] =='iOS')
                    {
                       if($lang=='en')
                       {
                    	$data1['message'] = "New Message ";
                       }
                       else
                       {
                    	$data1['message'] = "رسالة جديدة";
                       }
                    
                    	$image1 = '';
                    //	$s_data['user_id'] = $res->user_id;
                    //	$s_data['name'] = $res->user_name;
                    	//$s_data['image'] = $image1;
                    	$s_data['date'] = date('Y-m-d H:i:sA');
                    	$s_data['message'] = $data1['message'];//$data['message']
                    	$s_data['type'] = 'message';
                    	$s_data['title'] = 'message';
                    	$s_data['body'] = $data1['message']; 
                    	
                    	$notify = array(
                    				'notification_en' => "New Message ",
                    				'notification_ar'=> "رسالة جديدة",
                    				'date' => $s_data['date'],
                    				'user_id' => $get_users['user_id']
                    				);
                    
                       //for android
                    	if($get_users['device_type'] =='Android')
                    	{	
                    		$re = send_user_notification_android($get_users['device_token'], $s_data);		
                    		if($re)
                    		{			
                    		  $this->db->insert('notification',$notify);
                    		}  
                    	}

                    	//for ios
                    	if($get_users['device_type'] =='iOS')
                    	{
                    		$ss = send_user_notification_ios($get_users['device_token'],$s_data);		
                    		if($ss)
                    		{
                    			$this->db->insert('notification',$notify);
                    		}
                    	}
                      }
                 
                   
                   
                 //end notification code
            
        }
        else
        {
            echo 'failed';
        }
    }
    
    
    public function chat_view()
    {
     $sender_id = $this->input->post('sender_id');
     $receiver_id = $this->input->post('receiver_id');
     
      $query = "select * from `chat` where sender_id IN(".$sender_id.",".$receiver_id.") and receiver_id IN(".$sender_id.",".$receiver_id.") ORDER BY `date` asc";
	  $record = $this->db->query($query)->result_array();
	  
	  if($record)
	  {
	      foreach($record as $key=>$value)
	      {
	           if($value['sender_id'] == $sender_id)
            {
                echo '
	                <div class="d-flex justify-content-end mb-4">
				    <div class="msg_send">
					<div class="msg_cotainer_send">
						'.$value['chat_msg'].'
						<span class="msg_time_send">'.$value['date'].'</span>
					</div>
					<div class="img_cont_msg">
					</div>
					</div>
				</div>
                ';
            }
            else if($value['receiver_id'] == $receiver_id)
            {
                echo '
                 <div class="d-flex justify-content-start mb-4">
				<div class="img_cont_msg">
				</div>
				<div class="msg_receive">
				<div class="msg_cotainer">
				'.$value['chat_msg'].'
					<span class="msg_time">'.$value['date'].'</span>
				</div>
				</div>
			</div>
                ';
            }
	      }
	  }
    
    }
    
    
    
    
    
    
    
    
    
}    


?>