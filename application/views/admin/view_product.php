<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <style>
  
      .my_slide { margin:40px 0; }
      
      .my_slide img { width:100%; height:250px !important; }
      
      
  </style>
    <div class="content-wrapper">
      <!-- Container-fluid starts -->
      <div class="container-fluid">
        <!-- Header Starts -->
        <div class="row">
          <div class="col-sm-12 p-0">
            <div class="main-header">
              <h4>Products</h4>
              <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item">
                  <a href="#">
                    <i class="icofont icofont-home"></i>
                  </a>
                </li>
                <li class="breadcrumb-item"><a href="javascript:">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:">Products</a></li>
              </ol>
            </div>
          </div>
        </div>
        <!-- Header end -->
        
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-header-text">Products Details</h5>
              </div>              
              <!--Image slide-->
              
          <div class="col-ms-12">
              <div class="col-sm-4"> 
         <img src="<?php echo base_url().$product['product_image'];?>" style="width:70%;background-color:gray;">
        </div>
        <div class="col-sm-8">
              <!--Image Slide End -->              
              <div class="modal-body" align="center">
               
            <div class="form-group row">
                <label  class="col-xs-3 col-form-label form-control-label">Product Added By :</label>
                <div class="col-sm-9">
                    <span><?php echo @$this->db->where("user_id",$product['user_id'])->get("users")->row_array()['first_name'];?></span>
                </div>
            </div>
          
            <div class="form-group row">
                <label  class="col-xs-3 col-form-label form-control-label">Product Name :</label>
                <div class="col-sm-9">
                    <?php echo @$product['product_name'];?>
                </div>
            </div>
            <?php if($product['product_type']==1){?>
            <div class="form-group row">
                <label  class="col-xs-3 col-form-label form-control-label">Price :</label>
                <div class="col-sm-9">
                    <?php echo @$product['price']. " SAR";?>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-xs-3 col-form-label form-control-label">Product Colors :</label>
                <div class="col-sm-9">
                    <?php
                           if(!empty($colors)){
                            foreach ($colors as $key => $value)
                            { ?>
                              <?php if(@in_array(@$value['color_id'],@$product_colors)){

                                echo @$value['color_en'].' , ';
                               }                        
                            }
                          }?>
                </div>
            </div> 
             <div class="form-group row">
                <label  class="col-xs-3 col-form-label form-control-label">Product Sizes :</label>
                <div class="col-sm-9">
                    <?php
                           if(!empty($sizes)){
                            foreach ($sizes as $key => $value)
                            { ?>
                              <?php if(@in_array(@$value['size_id'],@$product_sizes)){

                                echo @$value['size'].' , ';
                               }                        
                            }
                          }?>
                </div>
            </div>
            <?php }else{ ?>           
            <div class="form-group row">
                <label  class="col-xs-3 col-form-label form-control-label">Customised Product</label>
                <div class="col-sm-9">
                   <?php
                 if(!empty($customized_products))
                {
                  foreach ($customized_products as $key => $value){
                   if(@$product['customised_product_id']==$value['product_id'])
                    { ?>
                       
                         <img src="<?php echo base_url().@$value['image'];?>" class="img-pro" style="height: 100px;">
                        <p class="pro-cont"><?php echo @$value['product_name_en'];?></p>                        
                        
                       
                    <?php } }                        
                  
                }
                ?>
                </div>
            </div>
          <?php } ?>
             <div class="form-group row">
                <label  class="col-xs-3 col-form-label form-control-label">Added Date :</label>
                <div class="col-sm-9">
                    <?php echo @$product['added_date'];?>
                </div>
            </div>             
               <div class="form-group row">
                <label  class="col-xs-3 col-form-label form-control-label">Approval Status :</label>
                <div class="col-sm-9">
                    <?php echo @($product['approval_status']==1)?"Active":"Pending";?>
                </div>
            </div>
             <div class="form-group row">
                <label  class="col-xs-3 col-form-label form-control-label">Product Status :</label>
                <div class="col-sm-9">
                    <?php echo @($product['status']==1)?"Public":"Private";?>
                </div>
            </div>
             <div class="form-group row">
                <label  class="col-xs-3 col-form-label form-control-label">Design Type :</label>
                <div class="col-sm-9">                    
                    <?php echo @($product['product_type']==1)?"One Piece Product":"Customized Product";?>
                </div>
            </div>
               <div class="form-group row">
                <label  class="col-xs-3 col-form-label form-control-label">Description :</label>
                <div class="col-sm-9">
                    <?php echo @$product['description'];?>
                </div>
            </div>       
      </div>
      
</div>
</div>
        
            </div>
          </div>
        </div> 

      </div>
      
      <!-- Container-fluid ends -->
    </div> 
    
    <script>
$(document).ready(function(){
    $("button").click(function(){
        $("p").click();
    });
});
</script> 
