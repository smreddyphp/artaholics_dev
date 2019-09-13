<!-- CONTENT-WRAPPER-->
<div class="content-wrapper">
    <!-- Container-fluid starts -->
  <div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <h4>Customised Products</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="#">
                <i class="icofont icofont-home"></i>
              </a>
            </li>
            <li class="breadcrumb-item"><a href="#:" >Add/Edit <?php echo @$page_name; ?></a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text">Add/Edit <?php echo @$page_name; ?></h5><span>
            <a href="<?php echo base_url();?>admin/add_customised_product"><button class="btn btn-primary waves-effect waves-light pull-right" data-name="<?php echo @$current_page; ?>" style="margin-left:65%">Add Customised Product</button></a></span></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                 <th>S NO</th>
                 <th>Image</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Sub Category</th>                
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tfoot>
               <tr>
                 <th>S NO</th>
                 <th>Image</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Sub Category</th>                
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </tfoot>
              <tbody>
                   <?php 
                      $counter = 1;
                      foreach($customised_products as $key)
                      {   
                          if ($key["status"] == "1")
                          {
                              $status = "tag tag-success" ;
                              $status1='Active';
                          }
                          else
                          {
                              $status = "tag tag-default" ;
                               $status1='InActive';
                          }  
                          ?>
                          <tr id="hide<?php echo $key["product_id"];?>">
                          <td><?php echo $counter;?></td>
                            <td style="width:30%" >
                           <img src="<?php echo base_url().$key['image'];?>" style="width:25%;background-color:gray;"></td>
                            <td><?php echo ucwords($key["product_name_en"]);?></td>
                            <td><?php
                                $type_name = $this->db->get_where('categories',array('cat_id'=>$key['category']))->row_array()['category_name_en'];
                                echo ucwords($type_name);?></td>
                            <td><?php
                                $type_name = $this->db->get_where('sub_categories',array('pcat_id'=>$key['sub_category']))->row_array()['pcat_name_en'];
                                echo ucwords($type_name);?></td>
                            <td><?php echo $key["created_at"];?></td>                            
                            <td><span class="<?php echo $status;?>"><?php echo ucfirst($status1);?></span></td>
                          <td style="white-space: nowrap; width: 1%;">
                          <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                            <div class="btn-group btn-group-sm" style="float: none;">
                              <div class="btn-group btn-group-sm" style="float: none;">                            
                        <a href="<?php echo base_url(); ?>admin/add_customised_product/<?php echo $key["product_id"];?>"><button type="button" data-id="<?php echo $key["product_id"];?>" class="btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;"> 
                        <span class="icofont icofont-ui-edit"></span>
                      </button></a>
                      <!-- <button type="button" class="btn btn-danger waves-effect waves-light delete_product_category" data-id="<?php echo $key["product_id"]?>"  style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button> -->
                            </div>       
                          </div>
                        </td>
                      </tr>                          
                  <?php  $counter++;
                      }
                  ?>                            
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
  <section>
    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_product_category" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
   <script>   
       
        //delete 
        $('.delete_product_category').on('click',function(event){ 
            var id = $(this).data('id');
            //var file = $(this).data('file');
              alertify.confirm("Do you want to Delete Product Category ?.",
              function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/delete_customise_product",
                    type: "POST",
                    data: {id:id},
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result)
                    {      
                        $("#hide"+id).hide();
                        location.reload();                       
                    }
                 });
               },
          function(){
           // alertify.error('Cancel');
          }); 
             });               
    </script>
 