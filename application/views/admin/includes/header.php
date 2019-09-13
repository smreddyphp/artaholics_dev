<!DOCTYPE html>
<html lang="en">
<head>
    <title>:: Artaholics  ::</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/icon/icofont/css/icofont.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/icon/simple-line-icons/css/simple-line-icons.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/charts/chartlist/css/chartlist.css"  type="text/css" media="all">
    <script src="<?php echo base_url();?>assets/admin/plugins/charts/echarts/js/echarts-all.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/plugins/data-table/css/dataTables.bootstrap4.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/plugins/data-table/css/buttons.dataTables.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/plugins/data-table/css/responsive.bootstrap4.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/main.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/bootstrap-datetimepicker.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/alertify.css"/>
    <style type="text/css">        
    .sidebar-menu>li>a .inactive-arrow {
    float: right;
    position: relative;
    top: 5px;
}
.active-arrow{
display: none !important;
    float: right;
    position: relative;
    top: 5px;
}
li.dropdown.active .active-arrow  {
    display: block !important;
    transition: all ease-in-out .5s;
      -webkit-transition: display 2s; 
    transition: display 2s;
}
li.dropdown.active .inactive-arrow{
    display: none !important;
}
.sidebar-menu>li>a:hover{ background: #ad891b; color: #f9f3f3;}
    </style>
</head>
<?php
 if(@auth_level==8)
 {
  $access_levels = $this->common_m->get_sub_user_permissions(@user_id); 

 }
?>
<body class="sidebar-mini fixed">   
<div class="wrapper">    
    <header class="main-header-top hidden-print">
        <a href="<?php echo base_url();?>admin/index"  class="logo">      
          <img class="img-fluid able-logo" src="<?php echo base_url();?>assets/images/Logo.png" alt="Theme-logo" style="height:75%;">   
        </a>
        <nav class="navbar navbar-static-top">
            <a href="javascript:" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <div class="navbar-custom-menu">
                <ul class="top-nav">                   
                    <li class="pc-rheader-submenu">
                        <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                            <span><img class="img-circle " src="<?php echo base_url((empty($user_info->user_image)) ? "assets/uploads/user_profiles/profile.png": $user_info->user_image); ?>" style="width:40px;" alt="User Image"></span>
                            <span><?php echo ucwords(@$user_info->first_name); ?> <i class=" icofont icofont-simple-down"></i></span>
                        </a>
                        <ul class="dropdown-menu settings-menu">                           
                            <li><a href="<?php echo base_url();?>admin/profile"><i class="icon-user"></i> Profile</a></li>
                            <li class="p-0">
                                <div class="dropdown-divider m-0"></div>
                            </li>                            
                            <li><a href="<?php echo base_url();?>home/logout"><i class="icon-logout"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>          
            </div>
        </nav>
    </header>
    <!-- Side-Nav-->
    <aside class="main-sidebar hidden-print " >
        <section class="sidebar" id="sidebar-scroll">
            <div class="user-panel">
                <div class="f-left image"><img src="<?php echo base_url((empty(@$user_info->user_image)) ? "assets/uploads/user_profiles/profile.png": @$user_info->user_image); ?>" alt="User Image" class="img-circle">
                </div>
                <div class="f-left info">
                    <p><?php echo ucwords(@$user_info->first_name); ?></p>
                    <p class="designation"><?php echo ucwords(@$user_info->email);?>
                    <i class="icofont icofont-caret m-l-5"></i></p>
                </div>
            </div>
            <!-- Sidebar Menu-->
            <?php if(@auth_level==9){ ?>
            <ul class="sidebar-menu">
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/dashboard" >
                        <i class="fa fa-th"></i><span> Dashboard</span></a>
                </li>
                <li class="<?php echo (@$main_page_name=='language')?'active':'';?>">
                       <a href="javascript:"><i class="fa fa-language"></i><span>Language</span><i class="icon-arrow-down"></i></a>
                       <ul class="treeview-menu">                     
                               <li class="<?php echo (@$page_name=='add_param')?'active':'';?>">
                                   <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/add_param" >
                                   <i class="fa fa-lock"></i><span>Add Params</span></a>
                               </li>                          
                           <?php foreach ($lang_manage as $key => $page) { ?>
                               <li class="<?php echo (@$page_name==$page['param_name'])?'active':'';?>">
                                   <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/language/<?php echo @$page['id'] ; ?>" >
                                   <i class="fa fa-lock"></i><span><?php echo @$page['page_name'] ; ?></span></a>
                               </li>
                           <?php } ?>
                       </ul>
                   </li>
                   <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/categories" >
                      <i class="fa fa-th-large"></i><span>Categories</span></a>
                  </li>
                   <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/sub_categories" >
                      <i class="fa fa-th-large"></i><span>Sub Categories</span></a>
                  </li>
                  <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/color" >
                      <i class="fa fa-cube"></i><span>Colour </span></a>
                  </li>
                  <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/sub_users" >
                      <i class="fa fa-cube"></i><span>Sub-Users</span></a>
                  </li>
                  <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/size" >
                      <i class="fa fa-cube"></i><span>Size</span></a>
                  </li>
                  <li class="<?php echo (@$page=='products')?'active':'';?>">
                    <a class="waves-effect waves-dark" href="javascript:" >
                        <i class="fa fa-child"></i><span>Products Management</span><i class="icon-arrow-down"></i>
                    </a>  
                    <ul class="treeview-menu">                    
                      <!--   <li class="">
                            <a class="waves-effect waves-dark <?php echo (@$page_name=='add_product')?'active':'';?>" href="<?php echo base_url();?>admin/add_product" >
                             <i class="fa fa-user-plus"></i><span>add product</span></a>
                        </li> -->
                        <li class="">
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/products" >
                             <i class="fa fa-user-plus"></i><span>Manage Products</span></a>
                        </li>
                        <li class="">
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/one_piece_products" >
                             <i class="fa fa-user-plus"></i><span>One Piece Products</span></a>
                        </li>                   
                    </ul>              
                  </li>                   
                  <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/designs" >
                      <i class="fa fa-cube"></i><span>Designs </span></a>
                  </li>               
                  <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/customised_products" >
                      <i class="fa fa-cubes"></i><span>Customised Products</span></a>
                  </li>
                  <li class="<?php echo (@$page=='users')?'active':'';?>">
                    <a class="waves-effect waves-dark" href="javascript:" >
                        <i class="fa fa-child"></i><span>Users Management </span><i class="icon-arrow-down"></i>
                    </a>  
                    <ul class="treeview-menu">                    
                        <li class="">
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/users" >
                             <i class="fa fa-user-plus"></i><span>Users</span></a>
                        </li>
                        <li class="">
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/artists" >
                             <i class="fa fa-user-plus"></i><span>Artists</span></a>
                        </li>                    
                    </ul>              
                  </li>
                  <li class="<?php echo (@$page=='users')?'active':'';?>">
                    <a class="waves-effect waves-dark" href="javascript:" >
                        <i class="fa fa-child"></i><span>Orders Management </span><i class="icon-arrow-down"></i>
                    </a>  
                    <ul class="treeview-menu">                    
                        <li class="">
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/orders/1" >
                             <i class="fa fa-user-plus"></i><span>Orders</span></a>
                        </li>
                        <li class="">
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/orders/0" >
                             <i class="fa fa-user-plus"></i><span>Guest Orders</span></a>
                        </li>                    
                    </ul>              
                  </li>
                
                <!-- <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/country" >
                    <i class="fa fa-globe"></i><span> Cities</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/product_category" >
                    <i class="fa fa-cubes"></i><span>Product Category</span></a>
                </li>
                 <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/product_type" >
                    <i class="fa fa-cube"></i><span>Gender</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/currency" >
                    <i class="fa fa-dollar"></i><span>Currency </span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/product/0/0" >
                    <i class="fa fa-globe"></i><span> All Products</span></a>
                </li> -->
               <!--  <li class="<?php //echo (@$page=='Requests')?'active':'';?>">
                <a class="waves-effect waves-dark" href="javascript:" >
                    <i class="fa fa-female"></i><span>Women </span><i class="icon-arrow-down"></i>
                </a>  
                <ul class="treeview-menu">
                   <?php
                   /*$women_data = $this->db->get_where('product_categories',array('type_id'=>1))->result_array();
                   foreach($women_data as $key=>$value)
                   {
                       echo '<li class="">
                            <a class="waves-effect waves-dark" href="'.base_url().'admin/product/1/'.$value['pcat_id'].'"><i class="fa fa-dot-circle-o"></i><span>'.$value['pcat_name_en'].'</span></a>
                            </li>';
                   }
                   */
                   ?>
                </ul>                  
            </li> --> 
            
            
                <!-- <li class="<?php //echo (@$page=='Requests')?'active':'';?>">
                <a class="waves-effect waves-dark" href="javascript:" >
                    <i class="fa fa-child"></i><span>Kids </span><i class="icon-arrow-down"></i>
                </a>  
                <ul class="treeview-menu">
                    
                     <?php
                  /* $kid_data = $this->db->get_where('product_categories',array('type_id'=>2))->result_array();
                   foreach($kid_data as $key=>$value)
                   {
                       echo '<li class="';
                       if($this->uri->segment(3) == $value['pcat_id']){echo 'active';}
                       echo '?>">
                            <a class="waves-effect waves-dark" href="'.base_url().'admin/product/2/'.$value['pcat_id'].'"><i class="fa fa-dot-circle-o"></i><span>'.$value['pcat_name_en'].'</span></a>
                            </li>';
                   }*/
                   
                   ?>                   
                    
                </ul>                  
            </li> -->
                <!--  

                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/terms_conditions" >
                    <i class="fa fa-file-text-o"></i><span> Term & Conditions</span></a>
                </li>
                 <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/about" >
                    <i class="fa fa-users"></i><span> About Us</span></a>
                </li>
                
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/faq" >
                    <i class="fa fa-question-circle-o"></i><span> FAQ</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/privacy_policy" >
                    <i class="fa fa-file-text-o"></i><span> Privacy Policy</span></a>
                </li>
                
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/help" >
                    <i class="fa fa-question-circle" aria-hidden="true"></i><span> Help</span></a>
                </li>
                
                 <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/support_center" >
                    <i class="fa fa-question-circle" aria-hidden="true"></i><span> Support Center</span></a>
                </li>
                
                 <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/item_check" >
                    <i class="fa fa-life-saver"></i><span> Item Check Service</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/reports" >
                    <i class="fa fa-flag" aria-hidden="true"></i><span> Reports</span></a>
                </li>   -->
                 <li class="<?php echo (@$page=='Requests')?'active':'';?>">
                <a class="waves-effect waves-dark" href="javascript:" >
                    <i class="fa fa-child"></i><span>Website Content </span><i class="icon-arrow-down"></i>
                </a>  
                <ul class="treeview-menu">                    
                    <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/subscribe" >
                     <i class="fa fa-envelope" aria-hidden="true"></i><span>Subscribe Email's</span></a>
                </li>                    
                   <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/social_media" >
                     <i class="icon-list"></i><span> Social Media Management</span></a>
                  </li> 
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/faq_web" >
                    <i class="fa fa-file-text-o"></i><span> FAQ Website</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/contactus" >
                     <i class="icon-list"></i><span> Contact Us Requests</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/contact_us" >
                     <i class="icon-list"></i><span> Contact Us Details</span></a>
                </li>
                <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/banners" >
                      <i class="fa fa-photo"></i><span>Banners</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/ads" >
                    <i class="fa fa-photo"></i><span>One Piece Ads</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/testimonials" >
                    <i class="fa fa-photo"></i><span>Testimonials</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/terms_conditions" >
                    <i class="fa fa-file-text-o"></i><span>Terms and Conditions</span></a>
                </li>                   
                </ul>              
            </li>
            </ul>
            <?php }else{ ?>
              <ul class="sidebar-menu">
                  <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/dashboard" >
                          <i class="fa fa-th"></i><span> Dashboard</span></a>
                  </li>
                  <?php if(@auth_level==8 && @in_array(1,@$access_levels)){?>              
                   <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/categories" >
                      <i class="fa fa-th-large"></i><span>Categories</span></a>
                  </li>
                <?php } ?>
                 <?php if(@auth_level==8 && @in_array(2,@$access_levels)){?> 
                   <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/sub_categories" >
                      <i class="fa fa-th-large"></i><span>Sub Categories</span></a>
                  </li>
                  <?php } ?>
                   <?php if(@auth_level==8 && @in_array(3,@$access_levels)){?> 
                  <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/color" >
                      <i class="fa fa-cube"></i><span>Colour </span></a>
                  </li>
                  <?php } ?>
                  <!-- <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/sub_users" >
                      <i class="fa fa-cube"></i><span>Sub-Users</span></a>
                  </li> -->
                   <?php if(@auth_level==8 && @in_array(4,@$access_levels)){?> 
                  <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/size" >
                      <i class="fa fa-cube"></i><span>Size</span></a>
                  </li>
                  <?php } ?>
                   <?php if(@auth_level==8 && @in_array(5,@$access_levels)){?> 
                  <li class="<?php echo (@$page=='products')?'active':'';?>">
                    <a class="waves-effect waves-dark" href="javascript:" >
                        <i class="fa fa-child"></i><span>Products Management</span><i class="icon-arrow-down"></i>
                    </a>  
                    <ul class="treeview-menu">                    
                        <li class="">
                            <a class="waves-effect waves-dark <?php echo (@$page_name=='add_product')?'active':'';?>" href="<?php echo base_url();?>admin/add_product" >
                             <i class="fa fa-user-plus"></i><span>add product</span></a>
                        </li>
                        <li class="">
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/products" >
                             <i class="fa fa-user-plus"></i><span>Manage Products</span></a>
                        </li>
                        <li class="">
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/one_piece_products" >
                             <i class="fa fa-user-plus"></i><span>One Piece Products</span></a>
                        </li>                   
                    </ul>              
                  </li>
                  <?php } ?> 
                   <?php if(@auth_level==8 && @in_array(6,@$access_levels)){?>                   
                  <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/designs" >
                      <i class="fa fa-cube"></i><span>Designs </span></a>
                  </li>
                  <?php } ?>
                   <?php if(@auth_level==8 && @in_array(9,@$access_levels)){?>                
                  <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/customised_products" >
                      <i class="fa fa-cubes"></i><span>Customised Products</span></a>
                  </li>
                  <?php } ?>
                   <?php if(@auth_level==8 && @in_array(7,@$access_levels)){?> 
                  <li class="<?php echo (@$page=='users')?'active':'';?>">
                    <a class="waves-effect waves-dark" href="javascript:" >
                        <i class="fa fa-child"></i><span>Users Management </span><i class="icon-arrow-down"></i>
                    </a>  
                    <ul class="treeview-menu">                    
                        <li class="">
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/users" >
                             <i class="fa fa-user-plus"></i><span>Users</span></a>
                        </li>
                        <li class="">
                            <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/artists" >
                             <i class="fa fa-user-plus"></i><span>Artists</span></a>
                        </li>                    
                    </ul>              
                  </li>
                  <?php } ?>
                   <?php if(@auth_level==8 && @in_array(8,@$access_levels)){?>                 
                 <li class="<?php echo (@$page=='Requests')?'active':'';?>">
                <a class="waves-effect waves-dark" href="javascript:" >
                    <i class="fa fa-child"></i><span>Website Content </span><i class="icon-arrow-down"></i>
                </a>  
                <ul class="treeview-menu">                    
                    <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/subscribe" >
                     <i class="fa fa-envelope" aria-hidden="true"></i><span> Subscribe Email's</span></a>
                </li>                    
                   <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/social_media" >
                     <i class="icon-list"></i><span> Social Media Management</span></a>
                  </li> 
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/faq_web" >
                    <i class="fa fa-file-text-o"></i><span> FAQ Website</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/contactus" >
                     <i class="icon-list"></i><span> Contact Us Requests</span></a>
                </li>
                <li class="">
                      <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/banners" >
                      <i class="fa fa-photo"></i><span>Banners</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/ads" >
                    <i class="fa fa-photo"></i><span>One Piece Ads</span></a>
                </li>
                <li class="">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/testimonials" >
                    <i class="fa fa-photo"></i><span>Testimonials</span></a>
                </li>                    
                </ul>              
            </li>
          <?php } ?>
            </ul>

         <?php } ?>
        </section>
    </aside>
    <!-- Side-Nav-end-->
    