<!-- CONTENT-WRAPPER-->
<div class="content-wrapper">
    <!-- Container-fluid starts -->
  <div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <h4>Sub Categories</h4>
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
            <button class="btn btn-primary waves-effect waves-light pull-right add_product_category" data-name="<?php echo @$current_page; ?>" style="margin-left:65%">Add Sub-Category</button></span></div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                 <th>S NO</th>
                 <th>Category</th>
                 <!-- <th>Image</th> -->
                <th>Sub Category EN</th>
                <th>Sub Category AR</th>
                
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tfoot>
               <tr>
                 <th>S NO</th>
                 <th>Category</th>
                 <!-- <th>Image</th> -->
                <th>Sub Category EN</th>
                <th>Sub Category AR</th>
                
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </tfoot>
              <tbody>
                   <?php 
                      $counter = 1;
                      foreach($pcat as $key)
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
                          <tr id="hide<?php echo $key["pcat_id"];?>">
                          <td><?php echo $counter;?></td>
                          <td><?php
                                $type_name = $this->db->get_where('categories',array('cat_id'=>$key['cat_id']))->row_array()['category_name_en'];
                                echo ucwords($type_name);?></td>
                            <!-- <td style="width:30%" >
                           <img src="<?php echo base_url().$key['p_image'];?>" style="width:25%;background-color:gray;"></td> -->
                            <td><?php echo ucwords($key["pcat_name_en"]);?></td>
                            <td><?php echo ucwords($key["pcat_name_ar"]);?></td>                            
                            
                            <td><?php echo $key["date"];?></td>                            
                             <td><span class="<?php echo $status;?>"><?php echo ucfirst($status1);?></span></td>
                          <td style="white-space: nowrap; width: 1%;">
                          <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                            <div class="btn-group btn-group-sm" style="float: none;">
                              <div class="btn-group btn-group-sm" style="float: none;">                            
                        <button type="button" data-id="<?php echo $key["pcat_id"];?>" class="btn btn-primary waves-effect waves-light add_product_category" style="float: none;margin: 5px;"> 
                        <span class="icofont icofont-ui-edit"></span>
                      </button>
                      <!-- <button type="button" class="btn btn-danger waves-effect waves-light delete_product_category" data-id="<?php echo $key["pcat_id"]?>"  style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button> -->
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
        var $modal = $('#add_product_category');
        $('.add_product_category').on('click',function(event){          
            var id = $(this).data('id');
            var pname = $(this).data('name');
            event.stopPropagation();
            $modal.load('<?php echo site_url('admin/add_sub_category');?>', {id: id,pname:pname},
            function(){
            /*$('.modal').replaceWith('');*/
            $modal.modal('show');
            });
        });
        //delete 
        $('.delete_product_category').on('click',function(event){ 
            var id = $(this).data('id');
            //var file = $(this).data('file');
              alertify.confirm("Do you want to Delete Product Category ?.",
              function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/delete_sub_category",
                    type: "POST",
                    data: {id:id},
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result){                        
                        //if(result==1){
                         // alert('successfully deleted');
                         //location.reload(); 
                            $("#hide"+id).hide();
                        //}                        
                      }
                 });
               },
          function(){
           // alertify.error('Cancel');
          }); 
             });               
    </script>
 