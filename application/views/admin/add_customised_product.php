<style>
.customized_product_div{
    width:90%;
    margin:0 auto;
}

.upload_btn img{
        height: 47px;
}
.dot {
  height: 30px;
  width: 30px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}
.dot.white {
  border:1px solid #0000003d;
}
.select_size span{
    padding-left:5px;
}
.form-group {
    margin-bottom: 30px;
}
.select_color .form-check-input {
    margin-top: 10px;
}
.select_color{
    margin-top:10px;
}
.select_size{
    margin-top:10px;
}
.shop_artist_btn{
    padding:15px 30px;
    float:right;
    border-color:#fff !important;
}
.shop_artist_btn:hover{
    border-color:#fff !important;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}
</style>

<div class="content-wrapper">
    <div class="container">
 <div class="customized_product_div">
      <div class="well well-sm">
        <h3 class="admin_main_head">Add Customized Product</h3>
      </div>     
     <form class="customized_product_form" method="post" action="" id="add_product">
         <div class="row">
             <div class="col-md-6">
           <div class="form-group">
              <label for="sel1">Select Category</label>
               <select class="form-control product_control" name="data[category]" onchange="get_subcategories(this.value)">
                  <option value="">Select</option>
                   <?php foreach($pcat as $key=>$value){ 
                   		if($product['category'] == $value['cat_id']){ ?>
                   	<option value="<?php echo @$value['cat_id'];?>" selected><?php echo @$value['category_name_en'];?></option> 
                   <?php }else{ ?>
                      <option value="<?php echo @$value['cat_id'];?>"><?php echo @$value['category_name_en'];?></option>                   
                   <?php } } ?>
               </select>
           </div>           
           <div class="form-group">
              <label for="sel1">Product Name English</label>
              <input type="text" class="form-control product_control" name="data[product_name_en]" value="<?php echo @$product['product_name_en'];?>">
           </div>
           <div class="form-group">
              <label for="sel1">Product Name Arabic</label>
              <input type="text" class="form-control product_control" name="data[product_name_ar]" value="<?php echo @$product['product_name_ar'];?>">
           </div>
            <div class="form-group">
              <label for="sel1">Select Sizes</label>
              <div class="form-check select_size">
                 <?php foreach($sizes as $key=>$value){ 
                 	if(in_array($value['size_id'],$psizes)){ ?>
                 	<div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" name="size[]" class="form-check-input" value="<?php echo @$value['size_id'];?>" checked><span><?php echo @$value['size'];?></span>
                      </label>
                    </div>
                 	<?php }else{ ?>
                  <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" name="size[]" class="form-check-input" value="<?php echo @$value['size_id'];?>"><span><?php echo @$value['size'];?></span>
                      </label>
                    </div>
                    <?php }	?>
                  <?php } ?>                                 
           </div>
           
         </div>
         <!-- <div class="form-group">
              <label for="sel1">Quantity</label>
              <input type="number" name="data[quantity]" class="form-control product_control" min="0">
           </div> -->
         </div>
         <div class="col-md-6">
           <div class="form-group" id="subcategory">
              <label for="sel1">Select Sub Category</label>
               <select class="form-control product_control" name="data[sub_category]">
                   <option value="">Select Sub Category</option>
                   <?php foreach($psub_cat as $key=>$value){ 
                   		if($product['sub_category'] == $value['pcat_id']){ ?>
                   	<option value="<?php echo @$value['pcat_id'];?>" selected><?php echo @$value['pcat_name_en'];?></option> 
                   <?php }else{ ?>
                      <option value="<?php echo @$value['pcat_id'];?>"><?php echo @$value['pcat_name_en'];?></option>                   
                   <?php } } ?>                  
               </select>
           </div>
          <div class="form-group">
              <label for="sel1">Select Colors</label>
              <div class="form-check select_color">
                <?php foreach($colors as $key=>$value){ 
                	if(in_array(@$value['color_id'],$pcolors)){ ?>
					  <div class="form-check-inline">
	                    <label class="form-check-label">
	                      <input type="checkbox" name="colors[]" class="form-check-input" value="<?php echo @$value['color_id'];?>" checked><span class="dot" style="background-color:<?php echo @$value['color_code'];?> !important"></span>
	                    </label>
	                  </div>
                	<?php }else{ ?>
						<div class="form-check-inline">
	                    <label class="form-check-label">
	                      <input type="checkbox" name="colors[]" class="form-check-input" value="<?php echo $value['color_id'];?>"><span class="dot" style="background-color:<?php echo @$value['color_code'];?> !important"></span>
	                    </label>
	                  </div>
                <?php }	?>                  
                <?php } ?>                  
           </div>
           
         </div>
         <div class="form-group">
            <label for="usr">Price</label>
            <input type="text" name="data[price]" class="form-control product_control" value="<?php echo @$product['price'];?>">
          </div>
          <div class="form-group">
              <label for="sel1">Upload Product Image</label>
              <div class="upload_input">
              <div class="upload_btn">                
            <div class="image-upload">
                <label for="file-input"> <img src="<?php echo base_url();?>assets/website/images/upload_img.png" width="100%"> </label>
                <input id="file-input" name="prodct_image" type="file" onchange="readURL(this);"> </div>
                <input name="old_image" id="old_image" type="hidden" value="<?php echo @$product['image'];?>">
                <input name="product_id" id="product_id" type="hidden" value="<?php echo @$product['product_id'];?>">
            </div>
              </div>
               
           </div>
         </div>
         <div class="col-md-12">
             <button type="button" id="btn" class="btn btn-success shop_btn shop_artist_btn mb-5 add_product"> SUBMIT </button>
         </div>
         </div>
         
     </form>
 </div>
	</div>
	</div>
<script>
  var _URL = window.URL;
$("#file-input").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
          if(this.width>400)
          {
               alert("Please Upload Below 400Px Width");
               $("#btn").attr("disabled","disabled");
          }
          else
          {
            $("#btn").removeAttr("disabled","disabled");
          }

          if(this.height>500)
          {
            alert("Please Upload Below 500Px Hight");
            $("#btn").attr("disabled","disabled");
          }
          else
          {
            $("#btn").removeAttr("disabled","disabled");
          }
        };
        img.src = _URL.createObjectURL(file);
    }
});

  function get_subcategories(value)
  {    
      $.ajax({                
          url: "<?php echo base_url();?>admin/get_subcategories",
          type: "POST",
          data:{value:value},                           
          success: function(result){
              $("#subcategory").html(result);
          }
      });

  }

      $("#add_product").validate({       
            rules: {               
                "data[category]"   : "required",
                "data[subcategory]"   : "required",
                "data[product_name]"   : "required", 
                "data[price]"         : "required", 
                "data[quantity]"         : "required",
                <?php if(@$product['image'] == ""){?>
                "prodct_image"         : "required", 
                <?php } ?>
                'size[]': {
                        required: true,                        
                    },
                'colors[]': {
                    required: true,                    
                }              
            },
            messages : {
                "data[category]"   : "Please Select Category",
                "data[subcategory]"   : "Please Select subcategory",
                "data[product_name]"   : "Please Enter Product Name", 
                "data[price]"         : "Please Enter Product Price", 
                "data[quantity]"         : "Please Enter Product Quantity", 
                "prodct_image"         : "Please Choose Product Image", 
               'size[]': {
                  required: "check at least 1 Size",                
                },
                'colors[]': {
                  required: "check at least 1 Color",                
                }
                              
            },      
        });

    $('.add_product').click(function(){    
        var validator = $("#add_product").validate();
            validator.form();
            if(validator.form() == true)
            {                 
                  var data = new FormData($('#add_product')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_customised_product",
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
                            location.reload();
                        } 
                        //console.log(result);
                    }
                });
            }
        });
   
   
function my_type(id)
{
    var lang ='<?= $this->session->userdata('lang')?>';
   
    $.ajax({
        url     :   '<?= base_url()?>ajax/get_type_id',
        type    :   'POST',
        data    :   {type_id : id,lang:lang},
        error:function(request,response){
            console.log(request);
        },
        success : function(data){
           $('#get_cat').html(data);
        }

    });
}
   
$(document).ready(function(){
   var count = 0;
    $('#add_more1').click(function(){
        count += 1;
        if(count <= 4)
        {
         $('.add_image').append('<div><div class="col-md-4"></div><div class="col-md-6"><input type="file" name="images[]" class="form-control my_img"  id="'+count+'"/></div><div class="col-md-1 plus-delete"><a title="Remove" id="remove'+count+'" class="img_del"><i class="fa fa-trash"></i></a></div></div>');
        }
        else
        {
         $("#add_more1").hide();
        }
    });

  //remove
  $('.add_image').on('click', '.img_del', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove();
        //count--;
      });



});   
   
</script>