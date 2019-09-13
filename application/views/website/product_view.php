  <style>
    .share_modal .modal-dialog {
      max-width: 400px;
      margin: 13.75rem auto;
    }
    .share_icons i{
      font-size:30px;
      text-align:center;
      margin: 0 auto;
      display: block;
    }
    .share_icons a{
            overflow: hidden;
    clear: both;
    display: block;
    width: max-content;
    margin: 0 auto;
    }
    .share_icons .facebook_icon{
      color:#3B5998;
    }
    .share_icons .twitter_icon{
      color:#55ADED;
    }
    .share_icons .instagram_icon{
      color:#C93084;
      }.share_icons .google_icon{
        color:#EA4335;
      }
      .share_modal .modal-header {
        -ms-flex-align: start;
        align-items: flex-start;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding:5px;
        border-bottom: none;
      }
      .share_modal{
        visibility: hidden;
        animation-duration: 1s;
        animation-delay: 0.1s;
        animation-name: zoomIn;
      }
      .other_customers{
    margin-bottom:0px !important;
}
      .share_modal_row .col-md-3{
        padding:0px;
      }
      .hide{
        display:none;
      }
      .error{
       position:absolute;
       top: 24px;
    left: 0;
    white-space: pre;
    font-size:13px;
    font-weight:600;
      }
      .color_list li{
          margin-bottom:0px !important;
      }
      .no_error{
          position:initial !important;
      }
      .view_sizes{
          position:relative;
      }
      .view_sizes .error{
              top: 63px;;
      }
      .hert {
    color: #f00d0d;
  }
  .fav_cl{
  color: red;
}
.qty_list {
    position:relative;
}
.qty_list .error{
    position:absolute;
    top:55px;
    left:0;
}
.w_list {
    cursor:pointer;
}
      
/*-------=======new_modal=====---------*/
.modales:before {
  content: "";
  display: none;
  background: rgba(0, 0, 0, 0.6);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 10;
}
.opened:before {
  display: block;
}
.opened .modales-dialog {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
  top: 33%;
}
.modales-dialog{
  background: #fefefe;
  border: #333333 solid 0px;
  border-radius: 5px;
  text-align:center;
  position: fixed;
  top: -100%;
  z-index: 11;
  box-shadow:0 5px 10px rgba(0,0,0,0.3);
  -webkit-transform: translate(0, -500%);
  -ms-transform: translate(0, -500%);
  transform: translate(0, -500%);
  -webkit-transition: -webkit-transform 0.3s ease-out;
  -moz-transition: -moz-transform 0.3s ease-out;
  -o-transition: -o-transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
      position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1050;
    overflow: hidden;
    outline: 0;
}
.modales .modal-body {
  padding:15px;
}
.modales .modal-body input{
  width:200px;
  padding:8px;
  border:1px solid #ddd;
  color:#888;
  outline:0;
  font-size:14px;
  font-weight:bold
}
.modales .modal-header,
.modales .modal-footer {
  padding: 10px 20px;
}
.modales .modal-header {
  border-bottom: #eeeeee solid 1px;
}
.modales .modal-header h2 {
  font-size: 20px;
}
.modal-dialog {
    pointer-events: all;
}
      .dot {
    top: auto;
    bottom: auto;
    left: auto;
    right: auto;
}
    </style>
    <div class="page_strip">
      <div class="container">
        <div class="row">
          <div class="strip_box">
            <p><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp; - &nbsp; <?php echo @$category_name['category_name_'.lang];?> &nbsp; - &nbsp; <?php echo @$category_name['product_name_'.lang];?></p>
          </div>
        </div>
      </div>
    </div>
    <!----------===============view_section===============---------->
    <section class="view_section">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="full_view">
              <div class="row">
                <!-- Full-width images with number text -->
                <div class="mySlides">
                  <img src="<?php echo base_url().@$product['product_image'];?>" style="width:100%">
                </div>
                <!-- <div class="mySlides">
                <img src="<?php echo base_url();?>assets/website/images/3.png" style="width:100%">
                </div>

                <div class="mySlides">
                <img src="<?php echo base_url();?>assets/website/images/4.png" style="width:100%">
                </div>

                <div class="mySlides">
                <img src="<?php echo base_url();?>assets/website/images/5.png" style="width:100%">
              </div> -->
            </div>                
          </div>
        </div>
        <div class="col-md-7">
          <form method="post" id="add_cart">
            <div class="fview_info">
              <h4 class="pview_name"><?php echo @ucwords($product['product_name']);?></h4>
              <p><small><?php echo "By ".@$artist['first_name'];?></small></p>
              <h3><b> <?php echo @$product['customised_product']['price'];?> SAR</b></h3>
              <h5><?php echo @$language['description'];?></h5>
              <p><?php echo @$product['description'];?></p>                   
              <div class="view_colors">
                <h5><?php echo @$language['available_colors'];?></h5>
                <ul class="color_list onepiece_color_list">
                  <?php if(@$product['colors']){
                    foreach (@$product['colors'] as $key => $value) { ?>
                      <li class="radio"> <label><input class="no_error" type="radio" name="data[color]" value="<?php echo @$value['color_id'];?>"><span class="dot" style="background-color:<?php echo @$value['color_code'];?>"></span></label> </li>
                    <?php } } ?>      					   
                  </ul>
                </div>
                
                <div class="view_sizes view_styles">
                  <h5><?php echo @$language['size'];?></h5>
                  <div class="form-inline">
                    <select class="form-control show_by no_error" name="data[size]">
                      <option value="">Select Sizes</option>
                      <?php if(@$product['sizes']){
                        foreach (@$product['sizes'] as $key => $value) {                       
                          ?>                     
                          <option value="<?php echo @$value['size_id'];?>"><?php echo @$value['size'];?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="add_cart">
                    <div class="wish_list">
                      <div class="form-inline qty_list">
                        <label><?php echo @$language['qty'];?> &nbsp;</label>
                        <input type="number" name="data[qty]" class="form-control no_error" value="1" min="1" max="5">
                        <input type="hidden" name="data[product_id]" value="<?php echo @$product['pro_id'];?>">
                        <input type="hidden" name="data[price]" value="<?php echo @$product['customised_product']['price'];?>">
                        <input type="hidden" name="data[product_name]" value="<?php echo @$product['product_name'];?>">
                        <input type="hidden" name="data[product_image]" value="<?php echo @$product['product_image'];?>">
                      </div>
                    </div>
                    <div class="add">
                      <div class="form-inline">
                        <button type="button" id="add_carts" class="btn btn-success add_btn add_to_cart"><?php echo @$language['add_to_cart'];?></button>
                        <div class="loader2 hide"></div>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="wish_share">
                  <div class="w_list">
                    <div>
                      <a>
                        <div class="media p-3 mr-auto ml-auto">
                          <div class="mr-3 <?php if(@$favourites){ if(in_array(@$product['pro_id'],@$favourites)){ echo 'fav_cl';} }?> "><!-- <img src="<?php echo base_url();?>assets/website/images/wish.png"> -->
                            <span onclick="favourite(this.id)" id="<?php echo $product['pro_id'];?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
                          </div>
                          <div class="media-body w_head">
                            <h4 class=""><?php echo @$language['wish_list'];?></h4>
                          </div>
                        </div></a>
                      </div>
                    </div>
                    <div class="w_list openmodales">
                      <div class="media p-3">
                        <div class="mr-3 w_icon"><img src="<?php echo base_url();?>assets/website/images/share.png"></div>
                        <div class="media-body w_head">
                          <h4 data-toggle="modal" class="share_head" data-target="#myModal_share"><?php echo @$language['share'];?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>
        </section>
        <!----------===============end-view_section===============---------->
        <!----------===============about_product===============---------->
        <section class="about_product">
          <div class="container">
            <div class="row">
              <div class="about_pro">
                <h3><?php echo @$language['about_the_artist'];?></h3>
                <div class="media pro_media">
                  <div class="media-left media-top mr-3 ">
                    <img src="<?php echo (@$artist["user_image"])?base_url().@$artist["user_image"]:base_url().'assets/website/images/prof.png';?>" class="media-object">
                  </div>
                  <div class="media-body">
                    <p class="art_name"><?php echo @$artist["first_name"];?></p>
                    <p class="art_para"><?php echo @$artist["about"];?></p>
                    <button class="btn btn-success shop_btn follow_btn" onclick="following(this.id)" id="<?php echo $artist['user_id'];?>">
                      <?php
                      
                        if(@in_array(@$artist['user_id'],@$followers))
                        { 
                          echo "Unfollow";//@$language['unfollow']; 
                        }
                        else
                        { 
                          echo "Follow";//@$language['follow'];
                        } 
                     
                     ?>
                        
                      </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!----------===============end-about_product===============---------->
        <!----------===============available===============---------->
        <section class="available_section">
          <div class="container">
           <h3 class="main_heading"><?php echo @$language['also_available_on'];?></h3>
           <div class="row">
            <div class="available_tabs">
              <ul class="nav nav-tabs">
                <?php if(@$artist_categories){
                  $i=0;
                  foreach (@$categories as $key => $value) {
                    if(@in_array(@$value['cat_id'],@$artist_categories))
                      { ?>
                        <li class="<?php if($key==0){ echo 'active';}?>"><a data-toggle="tab" class="<?php if($i==0){ echo 'active';}?>" href="#cata_<?php echo $i; ?>"><?php echo @$value['category_name_'.lang];?></a></li>
                        
                        <?php $i++; }  }  }?>
                      </ul>
                      <div class="tab-content available_wrapper">
                       <?php  if(@$artist_categories){
                        $i=0;
                        foreach(@$categories as $key => $value) {
                          if(@in_array(@$value['cat_id'],@$artist_categories))
                          { 

                            $products = $this->website_Model->get_artist_products_by_categories(@$value['cat_id'],@$artist['user_id'],4);
                            ?>
                            <div id="cata_<?php echo @$i;?>" class="tab-pane <?php if($i==0){ echo 'active';}else{ echo 'fade';}?>">
                             <div class="row">
                              <?php if(@$products){
                                foreach (@$products as $pkey => $pvalue) { ?>
                                  <div class="col-md-3">
                                   
                                   <div class="featured_div">
                                   <div class="img_box">
                                   <div class="fea_overlay">
                                    <span onclick="favourite(this.id)" id="<?php echo $pvalue['pro_id'];?>"><i class="<?php if(@$favourites){ if(in_array(@$pvalue['pro_id'],@$favourites)){ echo 'hert';} }?> fa fa-heart" aria-hidden="true"></i></span>
                                  </div>
                                  <img src="<?php echo base_url().@$pvalue['product_image'];?>">
                                </div>
                                <a class="feature_a" href="<?php echo base_url();?>website/product_view/<?php echo @$pvalue['pro_id'];?>">
                                <p class="fea_art"><?php echo "By ".@$artist['first_name'];?></p>
                                </a>
                              </div>
                            </div>
                          <?php }  }?>
                          <div class="col-md-12">
                            <div class="view_more">
                             <a href="<?php echo base_url();?>website/view_products/<?php echo @$value['cat_id']; ?>"><button class="btn btn-success shop_btn"><?php echo @$language['view_more'];?></button></a>
                           </div>
                         </div>
                       </div>
                     </div>            
                     <?php $i++; }  }  }?>
                   </div>
                 </div>
               </div>
             </section>
             <!----------===============end-available===============---------->
             <!----------===============other-customers===============---------->
             <section class="other_customers">
              <div class="container">
               <h3 class="main_heading"><?php echo @$language['other_customer'];?></h3>
               <div class="row">
                <div class="customer_carousel">
                  <div class="owl-carousel owl-carousel-fav">
                    <!-- The slideshow -->
                          <?php if(@$other_products){
                                foreach (@$other_products as $key => $value) {
                            ?>
                            <div class="featured_div">
                              <div class="img_box">
                                <div class="fea_overlay">
                                  <a href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                                <img src="<?php echo base_url().@$value['product_image'];?>">
                              </div>
                              <a href="<?php echo base_url();?>website/product_view/<?php echo @$value['pro_id'];?>">
                              <p class="fea_art"><?php echo 'By '.$this->website_Model->get_user($value['user_id'])['first_name'];?></p></a>
                            </div>
                          <?php } } ?>
                </div>
            </div>
      </div>
</div>
</section>
<!--<div class="modal share_modal" id="myModal_share">-->
<!--  <div class="modal-dialog">-->
<!--    <div class="modal-content">-->

      <!-- Modal Header -->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--      </div>-->

      <!-- Modal body -->
<!--      <div class="modal-body">-->
<!--        <div class="container">-->
<!--          <div class="row share_modal_row">-->
<!--            <div class="col-md-3">-->
<!--              <div class="share_icons">-->
<!--                <a href="<?php echo base_url();?>website/share_product/facebook/<?php echo @$product['pro_id'];?>" target="_blank">-->
<!--                  <i class="fa fa-facebook facebook_icon" aria-hidden="true"></i>-->
<!--                </a>-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="col-md-3">-->
<!--              <div class="share_icons">-->
<!--                <a href="<?php echo base_url();?>website/share_product/twitter/<?php echo @$product['pro_id'];?>" target="_blank">-->
<!--                  <i class="fa fa-twitter twitter_icon" aria-hidden="true"></i>-->
<!--                </a>-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="col-md-3">-->
<!--              <div class="share_icons">-->
<!--                <a href="<?php echo base_url();?>website/share_product/instagram/<?php echo @$product['pro_id'];?>" target="_blank">-->
<!--                  <i class="fa fa-instagram instagram_icon" aria-hidden="true"></i>-->
<!--                </a>-->
<!--              </div>-->
<!--            </div>-->
<!--            <div class="col-md-3">-->
<!--              <div class="share_icons">-->
<!--                <a href="<?php echo base_url();?>website/share_product/google/<?php echo @$product['pro_id'];?>" target="_blank">-->
<!--                  <i class="fa fa-google google_icon" aria-hidden="true"></i>-->
<!--                </a>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->

<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<div class="modales" aria-hidden="true">
  <div class="modal-dialog modales-dialog">
    <div class="modal-header">
      <h2>Share</h2>
      <button type="button" class="close closemodales" data-dismiss="modal">×</button>
    </div>
    <div class="modal-body">
        <div class="container">
          <div class="row share_modal_row">
            <div class="col-md-3">
              <div class="share_icons">
                <a href="<?php echo base_url();?>website/share_product/facebook/<?php echo @$product['pro_id'];?>" target="_blank">
                  <i class="fa fa-facebook facebook_icon" aria-hidden="true"></i>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="share_icons">
                <a href="<?php echo base_url();?>website/share_product/twitter/<?php echo @$product['pro_id'];?>" target="_blank">
                  <i class="fa fa-twitter twitter_icon" aria-hidden="true"></i>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="share_icons">
                <a href="<?php echo base_url();?>website/share_product/instagram/<?php echo @$product['pro_id'];?>" target="_blank">
                  <i class="fa fa-instagram instagram_icon" aria-hidden="true"></i>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="share_icons">
                <a href="<?php echo base_url();?>website/share_product/google/<?php echo @$product['pro_id'];?>" target="_blank">
                  <i class="fa fa-google google_icon" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>
  </div>
<div id="snackbar">Some text some message..</div>

<script type="text/javascript">
  function favourite(id)
  {
    $.ajax({                
      url: "<?php echo base_url();?>website/add_favourite_product",
      type: "POST",
      data:{'pro_id':id},
      error:function(request,response)
      {
        console.log(request);
      },                  
      success: function(result)
      {
        if(result=="faild")
        {
          window.location.href="<?php echo base_url();?>website/login";
        }
        else
        {
          $("#snackbar").html(result);                
          myFunction();
          setTimeout(function(){
            location = ''
          },1000)
        }
        
      }
    });
  }
</script>
<script type="text/javascript">
  function following(id)
  {
    $.ajax({                
      url: "<?php echo base_url();?>website/follow_un_follow",
      type: "POST",
      data:{'follower_id':id},
      error:function(request,response)
      {
        console.log(request);
      },                  
      success: function(result)
      {
        if(result=="faild")
        {
          window.location.href="<?php echo base_url();?>website/login";
        }
        else
        {
          $("#snackbar").html(result);                
          myFunction();
          setTimeout(function(){
            location = ''
          },1000)
        }
        
      }
    });
  }
</script>
<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  // Next/previous controls
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  // Thumbnail image controls
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
      }
    </script>
    <script type="text/javascript">

      $("#add_cart").validate({       
        rules: {
          "data[qty]"   :{
          	required:true,
          	maxlength:5,
          },
          "data[color]"   : "required",                
          "data[size]"   : "required",             
        },
        messages : {
          "data[qty]"   :{
          	required:"Please Enter Quantity",
          	maximum:"Please Select Below 5 Quantity"
          },
          "data[color]"   : "Please Select Color",                
          "data[size]"   : "Please Select Size",                             
        },      
      });

      $('.add_to_cart').click(function()
      { 

        var validator = $("#add_cart").validate();
        validator.form();
        if(validator.form() == true){ 
          ajax_start();
          $("#add_carts").attr("disabled","disabled");             
          var data = new FormData($('#add_cart')[0]);   
          $.ajax({                
            url: "<?php echo base_url();?>website/add_to_cart",
            type: "POST",
            data: data,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            error:function(request,response)
            {
              console.log(request);
            },                  
            success: function(result)
            {
              ajax_end();
              $("#add_carts").removeAttr("disabled","disabled"); 
              /*if(result=="faild")
              {
                window.location.href="<?php echo base_url();?>website/login";
              }
              else
              {*/
               $("#snackbar").html(result);                
               myFunction();
               setTimeout(function(){
                location.reload();
              },2000)
            // }             
           }
         });
        }
      });
    </script>
    <script>
      $(".share_head").click(function(){
        $(".share_modal").css("visibility", "visible");
      });
    </script>
    <script>
      $(".share_head").click(function(){
        $(".share_modal").css("visibility", "visible");
      });
    </script>
    <script>
  /*  $("#add_cart").click(function(){
  $(".loader2").toggleClass("hide");
});*/
function ajax_start()
{
     $(".loader2").removeClass("hide");                
        //$(".loader2").addClass("show"); 
      }

      function ajax_end()
      {                         
        $(".loader2").addClass("hide");
      }
    </script>
<script>
    	$(document).ready(function(){
  $(".owl-carousel-fav").owlCarousel({
      items:4,
      autoplay:true,
      margin:30,
      loop:true,
      nav:true,
      navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>" ],
      responsive:{
        0:{
            items:1,
            nav:true
        },
        480:{
            items:2,
            nav:true
        },
        600:{
            items:3,
            nav:true
        },
        768:{
            items:4,
            nav:true,
            loop:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        }
    }
  });
});
</script>
<script type="text/javascript">
  //You may use vanilla JS, I just chose jquery

$('.openmodales').click(function (e) {
         e.preventDefault();
         $('.modales').addClass('opened');
    });
$('.closemodales').click(function (e) {
         e.preventDefault();
         $('.modales').removeClass('opened');
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>