<style>
.new_design_onepiece .dot {
  height: 30px;
    width: 30px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    cursor: pointer;
    margin: 0px 5px 0px 0px;
    position: relative;
}
.colors_div{
    margin:15px 0px;
}
.sizes_onepiece .form-check-label{
    font-size: 13px;
    color: rgba(0,0,0,.5) !important;
    font-weight: 600;
}
.new_design_onepiece .upload_art {
    margin-top: initial !important;
}
.colors_div .form-check-inline{
    width:auto !important;
}
.colors_div .form-check-input{
    margin-top: 10px;
}
.dot_div{
    width:auto;
    float:right;
}
.dot_div span{
    margin-left:0px !important;
}
.colors_div .form-check-label{
    margin-right:10px;
}
.design_type_tabs{
    border:none;
    margin:15px 0px;
}
.design_type_tabs a{
    border:none !important; 
}
.label_container {
  display: block;
  position: relative;
  padding-left: 20px;
  margin-top: 6px;
  cursor: pointer;
  font-size: 15px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
   color: #959596;
}

/* Hide the browser's default radio button */
.label_container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 3px;
  left: 0;
  height: 15px;
  width: 15px;
  background-color: #eee;
  border-radius: 50%;
  border:1px solid #959596;
}

/* On mouse-over, add a grey background color */
.label_container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.label_container input.checked ~ .checkmark {
  background-color: #2196F3;
  border:none;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.label_container input.checked ~ .checkmark:after {
  display: block;
}

 /*Style the indicator (dot/circle) */
.label_container .checkmark:after {
  top: 5px;
    left: 5px;
    width: 5px;
    height: 5px;
  border-radius: 50%;
  background: white;
}
.design_type_tabs h4{
   font-size: 18px;
    font-weight: 600; 
    padding-top:15px;
}
.new_design .hide{
    display:none;
}
.width_100{
    width:100%;
}
.new_design     .form-check-inline span {
   margin-left: 10px;
   font-size: 14px;
}
.new_design     .form-check-inline{
margin-bottom: 1rem;
}
.tabs section {
  display: none;
  padding: 20px 0 0;
  border:none
}


.tabs label {
  display: inline-block;
  margin: 0 10px 0 0;
  padding: 5px 10px;
  font-weight: 600;
  text-align: center;
  color: #000;
  background:#FFF;
  border: none;
}

.tabs label:before {
  font-family: fontawesome;
  font-weight: normal;
  margin-right: 10px;
}


.tabs label:hover {
  color: #888;
  cursor: pointer;
}

.tabs input:checked + label {
  color: #555;
  background: rgb(205, 215, 226);
  border: none;
}

.tabs #tab1:checked ~ #content1,
.tabs #tab2:checked ~ #content2,
.tabs #tab3:checked ~ #content3,
.tabs #tab4:checked ~ #content4 {
  display: block;
}
.nav-tabs .design_type_item+.design_type_item {
    margin-left: 1.2rem;
    margin-top: 10px;
    cursor:pointer;
}
.image-upload input {
    visibility: hidden;
    max-width: 0;
    max-height: 0;
}
.new_design .image-upload>input {
     display: initial !important; 
}
.image-upload .error {
    display: block;
}
.no_error {
    position: initial !important;
}
.art_options{
    position:relative;
}
.art_options .error {
    position: absolute;
    top: 100px;
    left: 0px;
    font-size: 14px;
}
.terms_conditions_div{
    position:relative;
}
.terms_conditions_div .error {
    position: absolute;
    top: -24px;
    left: 0px;
}
.edit_option{
    cursor: pointer;
    position: absolute;
    width: 23px;
    right: 6px;
    top: 10px;
}
.new_design	img.img-roundp {
    top: auto; 
}
.designed_img img{
    height:300px;
}
/*-------=======new_modal=====---------*/
.modale:before {
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
.opened .modale-dialog {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
  top: 20%;
}
.modale-dialog{
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
.modale .modal-body {
  padding:15px;
}
.modale .modal-body input{
  width:200px;
  padding:8px;
  border:1px solid #ddd;
  color:#888;
  outline:0;
  font-size:14px;
  font-weight:bold
}
.modale .modal-header,
.modale .modal-footer {
  padding: 10px 20px;
}
.modale .modal-header {
  border-bottom: #eeeeee solid 1px;
}
.modale .modal-header h2 {
  font-size: 20px;
}
.modal-dialog {
    pointer-events: all;
}
.color_options{
    position:relative;
}
.color_options .error {
    position: absolute;
    top: 73px;
    left: 0px;
    font-size: 14px;
}
.size_options{
    position:relative;
}
.size_options .error {
    position: absolute;
    top: 45px;
    left: 0px;
    font-size: 14px;
}
.product_options{
    position:relative;
}
.product_options .error {
    position: absolute;
    top: -30px;
    left: 0px;
    font-size: 14px;
}
    .col-md-15.uploadCol{
        position:relative;
    }
    .uploadedDesign{
     position: absolute;
        z-index: 9999;
        top:130px;
        width:100%;
    }
    
    .uploadedDesign .uploadedImage{
        width:80px;
        margin:0 auto;
        display:block;
    }
</style>
	<div class="page_strip">
		<div class="container">
			<div class="row">
				<div class="strip_box">
					<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp; - &nbsp; Create new design &nbsp;</p>
				</div>
			</div>
		</div>
	</div>
	<!---------- New Design section ---------->
	<section class="new_design">
		<div class="container">
			<form method="post" enctype="mutipart/form-data" id="add_product">
			<div class="row">
			    <div class="design_ng">
				<!-- <h3>Hello Pilotwingz</h3>
				<p>Design your own trend and sell at your own shop. Let your wardrobe be your canvas.</p>
				<p>Let your life be your gallery . Go PLAY !</p> -->

					<div class="my-3 upload_design">

				 <div class="row">
      <div id="tab" class="btn-group btn-group-justified create_tabs" data-toggle="buttons">
          				<h3>Upload New Design
				</h3>
      </div>
    </div>
				<p class="need_help openmodale">Need Help Uploading?</p>
</div>

<div class="row">
    <ul class="nav nav-tabs design_type_tabs">
         <li class="nav-item design_type_item">
      		<h4>Design Type :</h4>
  		</li>
		<li class="nav-item design_type_item ">
           <input class="design-type_check1"  id="tab1" type="radio" name="data[product_type]" value="2" <?php if(@$product['product_type']==2){ echo "checked";}?> <?php if(@$product['product_type']==""){ echo "checked";}?>>
              <label for="tab1" class="design-type_tab1">Custom Design</label>
        </li>
  		<li class="nav-item design_type_item"> 
              <input id="tab2" class="design-type_check2" type="radio" name="data[product_type]" value="1" <?php if(@$product['product_type']==1){ echo "checked";}?>>
                <label for="tab2" class="design-type_tab2">One Piece</label>
        </li>
	</ul>
</div>
			</div>
			<div class="my-3 row">
				<table id="upload_design">
					<tr>
						<td>
							<div class="image-upload">
							    <input id="file-input" type="file" name="image" onchange="readURL(this);" />
								<label for="file-input"><img src="<?php echo base_url();?>assets/website/images/upload.png" width="70%" /></label>							
							</div>
						</td>
						<td>
							<img src="<?php echo (@$product['product_type']==1)?base_url().@$product['product_image']:base_url().'assets/website/images/dummy image.png';?>" alt="Choosen file" class="img-upload-result blah" id="">
						</td>
					</tr>
				</table>
			</div>
       <?php if(@$product['product_image'] != "" && @$product['product_type']==1){?>
         <!-- <div class="designed_img">
            <img src="<?php echo (@$product['product_image'])?base_url().@$product['product_image']:'';?>">
          </div> -->
        <?php } ?>
			<div class="width_100">
			<div class="upload_art <?php echo (@$product['product_type']==1)?'hide':'show';?>" id="upload_art">
        <?php if(@$_SESSION['image_design']){?>
			    <div class="designed_img">
			      <img src="<?php echo ($_SESSION['image_design'])?$_SESSION['image_design']:'';?>">
			    </div>
        <?php } ?>
				<h3 class="my-5">SELECT YOUR PRODUCTS</h3>
				<div class="col-md-12">
					<div class="row product_row product_options">
						<?php
            if(!empty($customized_products))
            {
              foreach ($customized_products as $key => $value)
              {
                ?>
                <?php if(@$product['customised_product_id']==$value['product_id']){?>
                	 <div class="col-md-15"> 
                    
                     <img src="<?php echo base_url().@$value['image'];?>" class="img-pro">
                    <p class="pro-cont"><?php echo @$value['product_name_en'];?></p>
                    <input type="radio" class="img-roundc" name="data[customised_product_id]" checked="checked" value="<?php echo @$value['product_id'];?>"> 
                   <a href="JavaScript:Void(0);" target="_blank" class="edit_option" onclick="openPro()" id="<?php echo @$value['product_id'];?>"> <img src="<?php echo base_url();?>assets/website/images/round-pen.png" class="img-roundp"></a>
                   </div>
                	<?php }else{ ?>
                  <div class="col-md-15 uploadCol"> 
                    <div class="uploadedDesign">
                        <img src="" class="uploadedImage blah">
                    </div>
                     <img src="<?php echo base_url().@$value['image'];?>" class="img-pro">
                    <p class="pro-cont"><?php echo @$value['product_name_en'];?></p>
                    <input type="radio" class="img-roundc" name="data[customised_product_id]" value="<?php echo @$value['product_id'];?>"> 
                   <a href="JavaScript:Void(0);" class="edit_option cart_items" onclick="openPro(this.id)" id="<?php echo base_url().@$value['image'];?>"> 
                   <img src="<?php echo base_url();?>assets/website/images/round-pen.png" class="img-roundp"></a>
                   </div>
                <?php }
              }
            }
            ?>					
					</div>
				</div>
			</div>
		
			<div class="fill_pinfo">
				<h3 class="">FILL THE PRODUCT INFO</h3>
					<div class="form-group">
						<label for="design-type">Design Type *</label>
					</div>					
					<div class="form-group art_options">
						<?php						
				            if(!empty($designs))
				            {
				              foreach ($designs as $key => $value) { ?>
				              	 <?php if(@$product['design_type']==$value['design_id']){?>
				              	 	<div class="form-check-inline">
				                  <label class="form-check-label">
				                    <input type="radio" class="form-check-input no_error" value="<?php echo @$value['design_id'];?>" name="data[design_type]" checked> <span><?php echo @$value['design_name_en'];?></span></label>
				                </div>
				              	 	<?php }else{ ?> 
				                <div class="form-check-inline">
				                  <label class="form-check-label">
				                    <input type="radio" class="form-check-input no_error" value="<?php echo @$value['design_id'];?>" name="data[design_type]"> <span><?php echo @$value['design_name_en'];?></span></label>
				                </div>
				            <?php  }   
				              }
				            }
				            ?>						
					</div>
					<div class="fill_pinfo <?php if(@$product['product_type']==1){ echo "show";}else{ echo "hide";}?>" id="one_piece">
					<div class="form-group art_options color_options">
                    <label for="select-type">Select Colors *</label>
                    <div class="new_design new_design_onepiece">
                        <div class="upload_art">
                       <div class="colors_div">
                       	<?php
                           if(!empty($colors)){
                            foreach ($colors as $key => $value)
                            { ?>
                            	<?php if(@in_array($value['color_id'],@$product_colors)){ ?>
                            		<div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input color_input no_error" name="colors[]" value="<?php echo @$value['color_id'];?>" checked><div class="dot_div"><span class="dot" style="background-color:<?php echo @$value['color_code'];?> !important;"></span></div>
                                    </label>
                                  </div>
                            		<?php }else{ ?> 
                                  <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input color_input no_error" name="colors[]" value="<?php echo @$value['color_id'];?>"><div class="dot_div"><span class="dot" style="background-color:<?php echo @$value['color_code'];?> !important;"></span></div>
                                    </label>
                                  </div>
                              <?php   }                          
                            }

                          }?>                          
                       </div>
                    </div>
                    </div>
                    </div>
                    <div class="form-group sizes_onepiece size_options">
                    <label for="select-type">Select Sizes *</label>
                    <div class="new_design new_design_onepiece">
                        <div class="upload_art">
                        	<?php
                           if(!empty($sizes))
                           {
                            foreach ($sizes as $key => $value)
                            { ?>
                            	<?php if(@in_array($value['size_id'],@$product_sizes)){?>
                            		<div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input no_error" name="sizes[]" value="<?php echo @$value['size_id'];?>" checked>&nbsp;&nbsp;<?php echo @$value['size'];?>
                                    </label>
                                  </div>
                            		<?php }else{ ?>
                                 <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input no_error" name="sizes[]" value="<?php echo @$value['size_id'];?>">&nbsp;&nbsp;<?php echo @$value['size'];?>
                                    </label>
                                  </div>
                              <?php   }                          
                            }
                          }
                          ?>                         
                    </div>
					</div>
					</div>
					<div class="form-group">
						<label for="name">Price *</label>
						</div>
						<div class="form-group">
						<input type="text" class="form-control no_error" name="data[price]" placeholder="Price" value="<?php echo @$product['price'];?>" onkeypress="return isNumber(event)">
					</div>
			</div>
					<div class="form-group">
						<label for="name">Name *</label>
					</div>
					<div class="form-group">
						<input type="text" class="form-control no_error" name="data[product_name]" placeholder="3 to 4 words" value="<?php echo @$product['product_name'];?>"> </div>
					<div class="form-group">
						<label for="Description">Description </label>
					</div>
					<div class="form-group">
						<textarea class="form-control no_error" name="data[description]" placeholder="Description" rows="4" cols="4"><?php echo @$product['description'];?></textarea>
					</div>
					<!-- <div class="form-group">
						<label for="Tags">Tags (Up to 50)</label>
					</div>
					<div class="form-group">
						<input type="text" class="form-control no_error" name="data[tags]" placeholder="Separate with comma" value="<?php echo @$product['tags'];?>">
						<p><em>This field accepts 1 or more values. Please use the return key to enter each value</em></p>
					</div>
					<h5 class="my-cu">* Add tags for your products to be found by other users.</h5> -->
          <input type="hidden" name="product_id" value="<?php echo @$product['pro_id'];?>">
          <input type="hidden" name="old_image" value="<?php echo @$product['product_image'];?>">
					<div class="custom-control custom-switch my-cu toggle_switch">
						<label>Make Design Public *</label>
						<label class="switch">
						  <input type="checkbox" class="no_error" name="data[status]" <?php if(@$product['status']==1){ echo "checked";}?> value="1" >
						  <span class="slider round"></span>
						</label>
					</div>
					<div class="my-cu ml-c terms_conditions_div">
						<label class="form-check-label">
							<input type="checkbox" <?php echo (@$product['pro_id'])?"checked":"";?> name="terms_conditios" class="form-check-input no_error" value=""><span> I have read and accepted the <span  class="t_c" data-toggle="modal" data-target="#terms">terms and conditons </span> of this agreement </span>
						</label>
					</div>					
					<button type="button" class="btn btn-success shop_btn shop_artist_btn mb-5 add_product">SUBMIT</button>
				</form>
			</div>
			</div>
			
		</div>
		</div>
	</div>
	 <div id="snackbar"></div>
	</section>
	<!---------- Ending New Design section ---------->
			<!----------================end-header_section===============---------->
		<section class="cart_sidebar">
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
                <span><img src="" alt="Choosen file" class="blah" id=""></span>
            </div>
             <img src="" class="img-over" id="editor"></div>
              <div class="container">
                <div class="row py-a">
                  <div class="col-md-15"><div class="icons-pro tooltip">
                    <img src="<?php echo base_url();?>assets/website/images/REUPLOAD.png" class="img-pro-side"><span class="tooltiptext">RE UPLOAD</span><input id="file-input" type="file" name="image" onchange="readURL(this);" /></div>
                  </div>
                  <div class="col-md-15"><div class="icons-pro tooltip">
                    <img src="<?php echo base_url();?>assets/website/images/HORIZONTAL.png" class="img-pro-side"><span class="tooltiptext">HORIZONTAL</span></div>
                  </div>
                  <div class="col-md-15"><div class="icons-pro tooltip"> 
                    <img src="<?php echo base_url();?>assets/website/images/VERTICAL.png"><span class="tooltiptext">VERTICAL</span></div>
                  </div>
                  <div class="col-md-15"><div class="icons-pro tooltip">
                    <img src="<?php echo base_url();?>assets/website/images/rotate.png" class="img-pro-side"><span class="tooltiptext">ROTATE</span></div>
                  </div>
                  <div class="col-md-15"><div class="icons-pro tooltip">
                    <img src="<?php echo base_url();?>assets/website/images/display_col.png" class="img-pro-side"><span class="tooltiptext">DISPLAY COLOUR</span></div>
                  </div>
                </div>
                <button class="btn btn-success add_btn cancel_btn mx-auto">Cancel</button>
                <button class="btn btn-success add_btn save_btn mx-auto">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
		
		<div class="modal modalbg" id="terms">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Terms &amp; Conditions</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php echo @$upload_help_content['design_terms_conditions']; ?>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success shop_btn agree_btn" data-dismiss="modal">Agree terms and conditions</button>
      </div>

    </div>
  </div>
</div>



<div class="modale" aria-hidden="true">
  <div class="modal-dialog modale-dialog">
    <div class="modal-header">
      <h2>Need Help?</h2>
      <button type="button" class="close closemodale" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <p><?php echo @$upload_help_content['need_help_uploading']; ?></p>
      </div>
    <div class="modal-footer">
 
      <button type="button" class="btn btn-danger closemodale">Close</button>
    </div>
  </div>
  </div>
		<script>
$("#add_product").validate({       
            rules: {
                "data[product_name]"   : "required",
                "data[description]"    : "required",
                "data[price]"          : "required",
                //"data[tags]"           : "required",
                "data[design_type]"    : "required",
                "data[customised_product_id]"    : "required",
                <?php if(@$product['product_image'] == ""){?>
                "image"                : "required",
                  <?php } ?> 
                "terms_conditios"      : "required",
                'sizes[]'              : {
                        required: true,                        
                    },
                'colors[]'             : {
                    required: true,                    
                } 
            },
            messages : {
                "data[product_name]"   : "Please Enter Product Name", 
                "data[description]"    : "Please Enter Product description",
                "data[price]"          : "Please Enter Product Price",                
                "data[design_type]"    : "Please Check Your Design Type", 
                "data[customised_product_id]"  : "Please Select Your Product", 
                //"data[tags]"           : "Please Enter Tags With Comma Separation",
                <?php if(@$product['product_image'] == ""){?>
                "image"                : "Please Select Product Image",
                <?php } ?> 
                "terms_conditios"      : "Please Accept Terms and Conditions", 
               'sizes[]'               : {
                  required: "check at least 1 Size",                
                },
                'colors[]'             : {
                  required: "check at least 1 Color",                
                }
                              
            },      
        });

    $('.add_product').click(function(){    
        var validator = $("#add_product").validate();
            //alert(validator.form());
            if(validator.form() == true){
                 $('.insert_ads').html("<img src='<?php echo base_url()?>assets/images/ajax-loaderr.gif' style='width:10px; height:20px;'>"); 
                  var data = new FormData($('#add_product')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>website/save_product",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result){
                        var obj = jQuery.parseJSON(result);
                        if (obj.status == "success") {
                            $("#snackbar").html(obj.message);                
                         		myFunction();
                         		setTimeout(function(){
							   window.location.reload(1);
								},3000);
                        } 
                    }
                });
            }
        });
   
</script>
		<script>
			function openPro(id)
      {
        $("#editor").attr("src",id);     
				document.getElementById("myNavpro").style.width = "50%";
			}

			function closePro() {
				document.getElementById("myNavpro").style.width = "0%";
			}
		</script>
<script>
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>
<script>
        $(document).ready(function() {
         //location.reload();
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
    $(".dot").click(function(){
  $(this).toggleClass("selected");
});
</script>
<script>
    $(function() {
    $('.design-type_tab1').click( function() {
        $("#one_piece").addClass('hide');
        $("#upload_art").removeClass('hide');
        $("#upload_design").addClass('hide');
        $('#add_product')[0].reset();
    });
    $('.design-type_tab2').click( function() {
        $("#one_piece").removeClass('hide');
        $("#upload_art").addClass('hide');
        $("#upload_design").removeClass('hide');
        $('#add_product')[0].reset();
    });
});
</script>
<script>
    $(function() {
    $('.design-type_check1').click( function() {
        $(".design-type_check2").removeAttr("checked","checked");
        $(".design-type_check1").attr("checked","checked");
        $("#one_piece").addClass('hide');
        $("#upload_art").removeClass('hide');
        $("#upload_design").removeClass('hide');
        $('#add_product')[0].reset();
    });
    $('.design-type_check2').click( function() {
        $("#one_piece").removeClass('hide');
        $(".design-type_check2").attr("checked","checked");
        $("#upload_art").addClass('hide');
        $("#upload_design").removeClass('hide');
        $('#add_product')[0].reset();
    });
});
</script>
<script type="text/javascript">
  //You may use vanilla JS, I just chose jquery

$('.openmodale').click(function (e) {
         e.preventDefault();
         $('.modale').addClass('opened');
    });
$('.closemodale').click(function (e) {
         e.preventDefault();
         $('.modale').removeClass('opened');
    });
</script>
<!--<div class="body-backdrop"></div>-->
