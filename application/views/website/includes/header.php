<!DOCTYPE html>
<html lang="en">
<head>
  <title>:: Artaholics ::</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url();?>assets/website/images/small logo.png" sizes="16x16" type="image/png">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/website/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>assets/website/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/website/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/website/js/cart.js"></script>
  <?php if(lang=='ar'){?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/website/css/rtl.css">
  <?php } ?>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/website/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/website/css/responsive.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/website/css/comments.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/website/css/animate.css">
  <script src="<?php echo base_url();?>assets/js/jquery.validate.js" type="text/javascript"></script>
  <style>
    .lang_menu{
      min-width: 7rem !important; 
    }
    .cart_sidebar ::-webkit-scrollbar {
  width: 1px;
}
.cart_sidebar ::-webkit-scrollbar-thumb {
  background: #F9DE5A; 
}
  </style>
</head>
<body>
  <!----------================header_section===============---------->
  <section class="artaholics_header" id="artaholics_header">
   <nav class="navbar navbar-expand-lg navbar-light top_header">
     <div class="container">
       <div class="row">
         <div class="col-md-3 right_hwrapper">
           <div class="collapse navbar-collapse t_headcollapse">
            <ul class="navbar-nav">
            <!--  <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SAR</a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="#">SAUDI ARABIA</a>
                <a class="dropdown-item" href="#">RIYADH</a>
                <a class="dropdown-item" href="#">INDIA</a>
                <a class="dropdown-item" href="#">USA</a>
                <a class="dropdown-item" href="#">CANADA</a>
              </div>
            </li> -->
            <li class="nav-item dropdown lang_dropdown">
              <a class="nav-link dropdown-toggle" href="" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LANG</a>
              <div class="dropdown-menu lang_menu" aria-labelledby="dropdown10">
                <?php if(lang=='ar'){?>
                  <a class="dropdown-item" href="<?php echo base_url('language/change_lang/?lang=en');?>">ENGLISH</a>
                <?php }else{ ?>
                  <a class="dropdown-item" href="<?php echo base_url('language/change_lang/?lang=ar');?>">ARABIC</a>
                <?php } ?>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 logo_div">
        <a class="navbar-brand artaholics_logo" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/website/images/Logo.png"></a> 
      </div>
      <div class="col-md-3 left_hwrapper">
       <div class="collapse navbar-collapse t_headcollapse right_head">
        <ul class="navbar-nav">
          <li class="nav-item search_icon">
           <div id="myOverlay" class="search_overlay">
            <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
            <div class="overlay-content">
              <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
          <a class="nav-link" href="#"> <i class="fa fa-search openBtn" onclick="openSearch()" aria-hidden="true"></i></a>
        </li>
        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="" href="" id="dropdown15" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user-o" aria-hidden="true"></i>  </a>
         <div class="dropdown-menu lang_menu" aria-labelledby="dropdown15">
          <?php if(!$this->session->userdata('userdata')){?>
            <a class="dropdown-item" href="<?php echo base_url();?>website/login"><?php echo @$header['login'];?></a>
            <a class="dropdown-item" href="<?php echo base_url();?>website/sign_up"><?php echo @$header['signup'];?></a>
          <?php }else{ ?>
            <a class="dropdown-item" href="<?php echo base_url();?>website/dashboard"><?php echo @$header['my_dashboard'];?></a>
            <?php if(@AUTH_LEVEL==6){?>
            <a class="dropdown-item" href="<?php echo base_url();?>website/add_product"><?php echo @$header['create_new_design'];?></a>
          <?php } ?>
            <a class="dropdown-item" href="<?php echo base_url();?>website/logout"><?php echo @$header['logout'];?></a>
          <?php } ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link cart_items" href="#" onclick="openNav()"> <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-secondary" id="items_no"><?php echo @count($this->cart->contents());//@$this->cart->total_items(); ?></span></a>
      </li>
    </ul>
  </div>
</div>
</div>
</div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark second_header">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExample08">
      <ul class="navbar-nav menu_nav">
        <?php foreach($categories as $key=>$value){?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>website/view_products/<?php echo $value['cat_id'];?>"><?php echo $value['category_name_'.lang];?></a>
          </li>          
        <?php } ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url();?>website/one_piece_products"><?php echo (lang=="ar")?"قطعه":"One Piece";?></a>
        </li> 
      </ul>
    </div>
  </div>
</nav>    
</section>
<!----------================end-header_section===============---------->
<section class="cart_sidebar">
  <div id="myNavcart" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
      <div class="cart_itemss">
        <h3><?php echo @$header['my_cart'];?></h3>        
         <?php if($this->cart->total_items() > 0)
         { ?>
         <div class="cart_list">
         <?php
          foreach($cartitems as $item){ ?>              
              <div class="cart_item" id="remove<?php echo $item['rowid'];?>">
                    <div class="cart_img">
                      <img src="<?php echo base_url().@$item['image'];?>">
                    </div>
                    <div class="cart_info">
                     <h6><?php echo @$item["name"]; ?></h6> 
                     <p><?php echo @$this->common_m->get_color($item["options"]['Color'])['color_'.lang]; ?></p>
                     <p><span class="cart_item_color dot" style="background-color: <?php echo @$this->common_m->get_color($item["options"]['Color'])['color_code']; ?>;"></span></p>
                     <p><?php echo @$this->common_m->get_sizes($item["options"]['Size'])['size']; ?></p>                     
                     <div class="form-inline">
                      <input type="number" class="form-control text-center" min="0" value="<?php echo $item["qty"]; ?>" onchange="updatecartitem(this.value, '<?php echo $item["rowid"]; ?>')">
                     </div>
                     <h5><b><?php echo @$item["price"].' SAR'; ?></b></h5>
                   </div>
                   <div class="close_item">
                     <span onclick="removecart_item('<?php echo $item["rowid"];?>')">
                      <i class="fa fa-times-circle" aria-hidden="true"></i>
                    </span>
                  </div>
              </div>
           
              <?php  } ?>
                </div>
               <div class="total_cost">
    <table class="table cost_table">
     <tr>
            <td><?php echo @$header['subtotal'];?></td>
         <td><?php echo @$this->cart->total().' SAR'; ?></td>
          </tr>
        <!-- <tr>
        <td>Shipping Cost</td>
            <td>00 SAR</td>
          </tr> -->
   <!--  <tr>
            <td colspan="2">
              <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Enter Coupon Code">
                <div class="input-group-append">
                  <span class="input-group-text"><?php echo @$header['apply'];?></span>
                </div>
              </div>
            </td>
          </tr> -->
          <tr>
            <td><?php echo @$header['total'];?></td>
            <td><b><?php echo @$this->cart->total().' SAR'; ?></b></td>
          </tr>
        </table>
 </div>
    </div>
    </div>
    <div class="">
    <div class="form-inline form_checkout">
      <a href="<?php echo base_url();?>website/<?php echo (@$user)?"check_out":"guest_check_out";?>"><button class="btn btn-success add_btn check_btn"><?php echo @$header['check_out'];?></button></a>
    </div>
</div>
 <?php }else{ ?>
    <div class="empty_cart">
        <img src="<?php echo base_url();?>assets/website/images/empty_cart.png">
        <h3 class="empty_head"><?php echo @$header['your_cart_is_empty'];?></h3>
        <!-- <p><?php echo @$header['i_think'];?></p> -->
        <a href="<?php echo base_url();?>"><button class="btn btn-primary cont_shopping"><?php echo @$header['continue_shopping'];?></button></a>
    </div>              
    <?php } ?>       
  </div>
</div>
</div>
</section>
<!-- <section class="cart_sidebar">
			<div id="myNavpro" class="overlay"> <a href="javascript:void(0)" class="closebtn" onclick="closePro()">×</a>
				<div class="overlay-content">
					<div class="row">
						<div class="col-md-1 slide_bar">
							<div class="slidecontainer"><i class="fa fa-plus slider_plus" aria-hidden="true"></i>
  <input type="range" min="1" max="100" value="50" class="slider" id="myRange"><i class="fa fa-minus slider_minus" aria-hidden="true"></i>
</div>							
						</div>
						<div class="col-md-11">
                        <div class="preview_img"><div class="print_size">
						    <span><img src="http://volive.in/artaholics_dev/assets/website/images/dummy image.png" alt="Choosen file" class="" id=""></span>
						</div>
						 <img src="http://volive.in/artaholics_dev/assets/uploads/customised_products/cproduct1555578877.png" class="img-over"></div>
							<div class="container">
								<div class="row py-a">
									<div class="col-md-15"><a href=""><div class="icons-pro tooltip"> <img src="<?php echo base_url();?>assets/website/images/REUPLOAD.png" class="img-pro-side"><span class="tooltiptext">RE UPLOAD</span> </div></a> </div>
									<div class="col-md-15"><a href=""><div class="icons-pro tooltip"><img src="<?php echo base_url();?>assets/website/images/HORIZONTAL.png" class="img-pro-side"><span class="tooltiptext">HORIZONTAL</span> </div></a>  </div>
									<div class="col-md-15"><a href=""><div class="icons-pro tooltip"> <img src="<?php echo base_url();?>assets/website/images/VERTICAL.png"><span class="tooltiptext">VERTICAL</span></div></a>  </div>
									<div class="col-md-15"><a href=""><div class="icons-pro tooltip"><img src="<?php echo base_url();?>assets/website/images/rotate.png" class="img-pro-side"><span class="tooltiptext">ROTATE</span></div></a>  </div>
									<div class="col-md-15"><a href=""><div class="icons-pro tooltip"><img src="<?php echo base_url();?>assets/website/images/display_col.png" class="img-pro-side"><span class="tooltiptext">DISPLAY COLOUR</span></div></a>  </div>
								</div>
								<button class="btn btn-success add_btn cancel_btn mx-auto"> Cancel </button>
								<button class="btn btn-success add_btn save_btn mx-auto"> Save </button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
<!----------================login_section===============---------->
<script type="text/javascript">
  function updatecartitem(value,rowid)
{
  $.ajax({                
            url: "<?php echo base_url();?>website/update_item_qty",
            type: "POST",
            data: {'qty':value,'rowid':rowid},                            
            success: function(result)
            {              
               /*$("#snackbar").html(result);                
               myFunction();
               setTimeout(function(){
                location = ''
              },3000)*/
              alert(result);

             }            
           
         });
}

function removecart_item(rowid)
{
  if(confirm("Are youe sure Want remove This Item"))
  {
      $.ajax({                
            url: "<?php echo base_url();?>website/remove_cart_item",
            type: "POST",
            data: {'rowid':rowid},                            
            success: function(result)
            {
                if(result==0)
                {
                       setTimeout(function(){
                        location = ''
                      },1000);
                }
                else
                {
                  $("#items_no").html(result);
                  $("#remove"+rowid).remove();
                }
            }  
           
         });
  }
  else
  {

  }
  
}
</script>


<script>
  function openNav() {
    document.getElementById("myNavcart").style.width = "50%";
  }

  function closeNav() {
    document.getElementById("myNavcart").style.width = "0%";
  }
</script>
<script>
    $(".cart_items").click(function(){
  $("#myNavcart").addClass("resp_custom");
});
$(".closebtn").click(function(){
  $("#myNavcart").removeClass("resp_custom");
});
</script>
<script>
  $(".cart_items").click(function(){
    $(".body-backdrop").addClass("modal-backdrop show");
  });
  $(".closebtn").click(function(){
    $(".body-backdrop").removeClass("modal-backdrop show");
  });
</script>
<script>
  function myFunction() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
<div class="body-backdrop"></div>
<div class="body-backdrop"></div>