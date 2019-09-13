
<style>
.featured{
    color:#4CAF50;
        font-size: 23px !important; 
}
.un_featured{
    color:#00000047;
        font-size: 23px !important;
}
.trusted_div{
margin: 0 auto;
    display: table;
}
</style>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <h4> <?php echo @ucfirst($page); ?></h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="#">
                <i class="icofont icofont-home"></i>
              </a>
            </li>
            <li class="breadcrumb-item"><a href="#:" >Add/Edit <?php echo @ucfirst($page); ?></a></li>
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text">Add/Edit <?php echo @$page_name; ?></h5><span>
          </span></div>
          <div class="card-block table-responsive">
            <table id="advanced-table" class="table table-responsive table-striped table-bordered nowrap">
              <thead>
               <tr role="row">
                   <th>S NO</th>
                   <th>Image</th>
                   <th>Product Name</th>
                   <th>Price</th>
                   <?php if($page == "products"){ ?>
                   <th>Category</th>
                   <th>Feature Product</th>
                   <?php } ?>                   
                   <th>Product Status</th>
                   <th>Date</th>
                   <th>Approval Status</th>
                   <th>Action</th>  
              </thead>
              <tfoot>
               <tr>
               <tr role="row">
                   <th>S NO</th>
                   <th>Image</th>
                   <th>Product Name</th>
                   <th>Price</th>
                   <?php if($page == "products"){ ?>
                   <th>Category</th>
                   <th>Feature Product</th>
                   <?php } ?>                    
                   <th>Product Status</th>
                   <th>Date</th>
                   <th>Approval Status</th>
                   <th>Action</th> 
              </tr>
              </tfoot>
              <tbody>
              <?php

               if(@$products)
               {
                     foreach($products as $key => $product)
                     {                             
                             if (@$product["status"] == "1")
                             {                                  
                                $product_status = "tag tag-info" ;
                                $product_status1='Public';
                             }
                             else
                             {
                                $product_status = "tag tag-primary" ;
                                $product_status1='Private'; 
                             }
                              
                             if(@$product["approval_status"] == "1")
                             {
                                $status = "tag tag-success";
                                $trust_product='Active';
                             }
                             else if(@$product["approval_status"] == "0")
                             {
                                 $status = "tag tag-danger" ;
                                 $trust_product ='InActive';
                             }
                             else
                             {
                                 $status = "tag tag-primary" ;
                                 $trust_product ='Approve';
                             }

                            if(@$product["feature_product"] == "1")
                             {
                                $feature_status = "featured";                                
                             }
                             else
                             {
                                 $feature_status = "un_featured";                                 
                             }        
                             
                             ?>
                              <tr >
                                <td><?php echo @$key+1?></td>
                                <td style="width:70%" >
                                 <img src="<?php echo base_url().$product['product_image'];?>" style="width:70%;background-color:gray;"></td>
                                <td><?php echo $product['product_name'];?></td>
                                <td><?php echo $product['price'];?></td>
                                <?php if($page == "products"){ ?>
                                    <td><?php echo $product['category_name_en'];?></td>
                                    <td>
                                  <span class="trusted_div">
                                      <span><i data-id="<?php echo @$product['pro_id'];?>" class="fa fa-star feature_product <?php echo $feature_status;?>" aria-hidden="true"></i></span>
                                </td>
                                 <?php } ?>
                                 <td>                                  
                                  <span class="<?php echo $product_status;?>"><?php echo ucfirst($product_status1);?>
                                  </span>
                                </td>
                                <td><?php echo $product['added_date'];?></td>
                                <td>
                                  <span class="">
                                  </span>
                                    <button type="button" class="btn btn-success waves-effect waves-light approve_product" data-id="<?php echo @$product['pro_id'];?>" style="float: none;margin: 5px;"><span class="icofont icofont-medal"><?php echo ucfirst($trust_product);?></span>
                                    </button>
                                </td>
                                <td style="white-space: nowrap; width: 1%;">
                                  <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                                    <div class="btn-group btn-group-sm" style="float: none;">
                                      <a href="<?php echo base_url()?>admin/product_details/<?php echo @$product['pro_id'];?>"  class="btn btn-primary waves-effect waves-light " style="float: none;margin: 5px;"> 
                                        <i class="icofont icofont-eye m-r-5"></i>
                                      </a>
                                      <?php if(@$user_info->user_id==$product['user_id']){?>
                                      <a href="<?php echo base_url()?>admin/add_product/<?php echo @$product['pro_id'];?>"  class="btn btn-primary waves-effect waves-light " style="float: none;margin: 5px;"> 
                                        <i class="icofont icofont-ui-edit"></i>
                                      </a>
                                    <?php } ?>
                                      <button type="button" class="btn btn-danger waves-effect waves-light delete_product" data-id="<?php echo $product['pro_id']?>"  style="float: none;margin: 5px;">
                                        <span class="icofont icofont-ui-delete"></span>
                                      </button>                            
                                 </div>                                                       
                              </div>
                          </td>
                        </tr>
                      <?php } 
                    } ?>        
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
        <!-- Container-fluid ends -->
        
     </div>
 <!-- CONTENT-WRAPPER-->
<script>     
       
        //delete 
        $('.delete_product').on('click',function(event){ 
            var id = $(this).data('id');
              alertify.confirm("Do you want to Delete This Product ?",
              function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/delete_product",
                    type: "POST",
                    data: {id:id},
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result)
                    {  
                         location.reload(); 
                          $("#hide"+id).hide();                     
                    }
                 });
               },
          function(){
          }); 
             });
             
        $('.approve_product').on('click',function(event){ 
            var id = $(this).data('id');
           alertify.confirm("Are you sure to Want Active or Deactive this Product ?",         
             function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/approve_product",
                    type: "POST",
                    data: {id:id},
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result)
                    {                      
                        location.reload();                       
                    }
              });
               },
          function(){
          }); 
        }); 

        $('.feature_product').on('click',function(event){ 
            var id = $(this).data('id');
           alertify.confirm("Are you sure Want to Set or Unset as Featured Product ?.",           
             function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/feature_product",
                    type: "POST",
                    data: {id:id},
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result)
                    {                      
                        location.reload();                       
                    }
              });
               },
          function(){
          }); 
        }); 
    </script>