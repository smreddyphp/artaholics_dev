<style>
    .share_modal .modal-dialog {
    max-width: 500px;
    margin: 13.75rem auto;
}
.share_icons i{
    font-size:30px;
    text-align:center;
        margin: 0 auto;
    display: block;
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
.fav_cl{
  color: red;
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
  margin-left: -200px;
  text-align:center;
  position: fixed;
  left: 50%;
  top: -100%;
  z-index: 11;
  width: 360px;
  box-shadow:0 5px 10px rgba(0,0,0,0.3);
  -webkit-transform: translate(0, -500%);
  -ms-transform: translate(0, -500%);
  transform: translate(0, -500%);
  -webkit-transition: -webkit-transform 0.3s ease-out;
  -moz-transition: -moz-transform 0.3s ease-out;
  -o-transition: -o-transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
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
.w_list.openmodales{
    cursor:pointer;
}
.hide{
    display:none;
}
.error {
    position: absolute;
    top: 24px;
    left: 0;
    white-space: pre;
    font-size: 13px;
    font-weight: 600;
}
.no_error {
    position: initial !important;
}
.view_sizes .error {
    top: 63px;
}
.view_sizes {
    position: relative;
}
.color_list .radio {
    margin-bottom: 0px;
}
</style>
<div class="page_strip">
    <div class="container">
        <div class="row">
            <div class="strip_box">
                <p><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp; - &nbsp;One Piece</p>
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
                          <img src="<?php echo base_url().@$onepiece_product['product_image'];?>" style="width:100%">
                      </div>
                      <!-- <div class="mySlides">
                          <img src="<?php echo base_url();?>assets/website/images/women_tshirt3.png" style="width:100%">
                      </div>

                      <div class="mySlides">
                          <img src="<?php echo base_url();?>assets/website/images/women_tshirt4.png" style="width:100%">
                      </div>

                      <div class="mySlides">
                          <img src="<?php echo base_url();?>assets/website/images/women_tshirt5.png" style="width:100%">
                      </div> -->
                    </div>                
                </div>
            </div>
            <div class="col-md-7">
              <form method="post" id="add_cart">
                <div class="fview_info">
                    <h4><?php echo @ucwords($onepiece_product['product_name']);?></h4>
                    <p><small><?php echo 'By '.$this->website_Model->get_user($onepiece_product['user_id'])['first_name'];?></small></p>
                    <h3><b>SAR <?php echo @$onepiece_product['price'];?></b></h3>
                    <h5><?php echo @$language["description"];?></h5>
                    <p><?php echo @$onepiece_product['description'];?></p>                   
                   <div class="view_colors">
                        <h5><?php echo @$language["available_colors"];?></h5>
                        <ul class="color_list onepiece_color_list">
                          <?php if(@$product_colors){
                            foreach (@$colors as $key => $value) {
                              if(in_array(@$value['color_id'],@$product_colors))
                              {
                                ?>
                              <li class="radio red"> <label><input type="radio" class="no_error " name="data[color]"><span class="dot" style="background-color:<?php echo @$value['color_code'];?>"></span></label> </li>
                                <?php
                              }
                            }
                          }                             
                            ?>
            					</ul>
                   </div>
                   <!-- <div class="view_styles">
                      <h5>Style</h5>
                       <div class="form-inline">
                   <select class="form-control show_by">
                         <option>Women Premium T-Shirt</option>
                         <option selected="">Women Dress</option>
                         <option>Women Basic T-Shirt</option>
                         <option>Women Premium Hoodie</option>
                         <option>Women Graphic T-Shirt</option>
                     </select>
                  </div>
                   </div> -->
                   <div class="view_sizes view_styles">
                      <h5><?php echo @$language["size"];?></h5>
                       <div class="form-inline">
                   <select class="form-control show_by no_error" name="data[size]">
                    <option value="">Select Sizes</option>
                    <?php if(@$product_sizes)
                    {
                      foreach (@$sizes as $key => $value) {
                        if(in_array(@$value['size_id'],@$product_colors))
                          {
                          ?>                     
                            <option value="<?php echo @$value['size_id'];?>"><?php echo @$value['size'];?></option>
                    <?php }
                        }
                     } ?>
                     </select>
</div>
                   </div>
                   <div class="add_cart">
                       <div class="wish_list">
                           <div class="form-inline">
                           <label><?php echo "Quantity";//@$language["qty"];?> &nbsp;</label>
                        <input type="number" name="data[qty]" class="form-control" value="1" min="1" max="5">
                        <input type="hidden" name="data[product_id]" value="<?php echo @$onepiece_product['pro_id'];?>">
                        <input type="hidden" name="data[price]" value="<?php echo @$onepiece_product['price'];?>">
                        <input type="hidden" name="data[product_name]" value="<?php echo @$onepiece_product['product_name'];?>">
                        <input type="hidden" name="data[product_image]" value="<?php echo @$onepiece_product['product_image'];?>">
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
                     <div class="media p-3 mr-auto ml-auto">
                         <div class="mr-3 <?php if(@$favourites){ if(in_array(@$onepiece_product['pro_id'],@$favourites)){ echo 'fav_cl';} }?>"><!-- <img src="<?php echo base_url();?>assets/website/images/wish.png"> -->
                           <span onclick="favourite(this.id)" id="<?php echo $onepiece_product['pro_id'];?>"><i class=" fa fa-heart" aria-hidden="true"></i></span>
                         </div>
                          <div class="media-body w_head">
                            <h4 class=""><?php echo @$language["wish_list"];?></h4>
                          </div>
                        </div>
                </div>
                 </div>
                 <div class="w_list openmodales">
                     <div class="media p-3">
                         <div class="mr-3 w_icon"><img src="<?php echo base_url();?>assets/website/images/share.png"></div>
                          <div class="media-body w_head">
                            <h4 data-toggle="modal" data-target="#onepiece_share"><?php echo @$language["share"];?></h4>
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
<!----------===============available===============---------->
<section class="available_section other_designs">
              <div class="container">
               <h3 class="main_heading"><?php echo @$language['avilable_other_designs'];?></h3>
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
                              <a href="<?php echo base_url();?>website/one_piece_product_view/<?php echo @$value['pro_id'];?>">
                              <p class="fea_art"><?php echo 'By '.$this->website_Model->get_user($value['user_id'])['first_name'];?></p></a>
                            </div>
                          <?php } } ?>
                </div>
            </div>
      </div>
</div>
</section>

<div id="snackbar">Some text some message..</div>

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
<!----------===============end-available===============---------->
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
}</script>
<script>
      function ajax_start()
     {
        $(".loader2").removeClass("hide");                
        //$(".loader2").addClass("show"); 
      }

      function ajax_end()
      {                         
        $(".loader2").addClass("hide");
      }

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
        400:{
            items:2,
            nav:false
        },
        600:{
            items:3,
            nav:false
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

      $("#add_cart").validate({       
        rules: {
          "data[qty]"   : "required",
          "data[color]"   : "required",                
          "data[size]"   : "required",             
        },
        messages : {
          "data[qty]"   : "Please Enter Quantity",
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
      });
    </script>
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