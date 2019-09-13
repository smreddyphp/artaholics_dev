<?php 
$page_name = array("3"=>"Orders List");
?>
<style>
    .tag{
        cursor:pointer;
       font-size:12px;
    }
</style>
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

<!-- CONTENT-WRAPPER-->
<div class="content-wrapper">
        <!-- Container-fluid starts -->
  <div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <h4><?php echo @$page_name[$auth_level]; ?></h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="#">
                <i class="icofont icofont-home"></i>
              </a>
            </li>
            <li class="breadcrumb-item"><a href="#:" ><?php echo @$page_name[$auth_level]; ?></a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->    
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header"><h5 class="card-header-text"><?php echo @$page_name[$auth_level]; ?></h5></div>
      <div class="card-block">
        <table id="advanced-table" class="table table-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                <th>S NO</th>
                <th>Order Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>                              
                <th>Postal Code</th>
                <th>Order Status</th>                             
                <th>Grand Total</th>                              
                <th>Actions</th>
              </tr>
              </thead>
              <tfoot>
               <tr>
                <th>S NO</th>
                <th>Order Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>                              
                <th>Postal Code</th>                              
                <th>Order Status</th>                              
                <th>Grand Total</th>
                <th>Actions</th>
              </tr>
              </tfoot>
              <tbody>
                   <?php 
                      $counter = 1;
                      foreach($orders as $key)
                      { 
                                if(@$key["status"] == "1")
                                {
                                    $sta1 = "tag tag-success" ;
                                    $status1='Success';
                                }
                                else if(@$key["status"] == "0")
                                {
                                     $sta1 = "tag tag-default" ;
                                     $status1='Pending';
                                }                            

                                                        
                          ?>
                              <tr id="hide<?php echo @$key["user_id"];?>">
                                  <td><?php echo $counter;?></td>
                                  <td><?php echo @$key["order_reference"];?></td>
                                  <td><?php echo ucwords(@$key["first_name"]);?></td>
                                  <td><?php echo ucwords(@$key["last_name"]);?></td>
                                  <td><?php echo @$key["mobile_no"];?></td>                                                                  
                                  <td><?php echo @$key["postal_code"];?></td>                                                                  
                                  <td>                                   
                                       <button type="button" class="<?php echo $sta1;?> add_product_category" data-id="<?php echo $key["user_id"]?>" ><?php echo ucfirst($status1);?></button>                                      
                                  </td>
                                  <td><?php echo @$key["grand_total"];?></td>                                   
                                 <td style="white-space: nowrap; width: 1%;">
                             <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                                <div class="btn-group btn-group-sm" style="float: none;">
                                  <?php if($key['user_type']==1){?>
                                  <a href="<?php echo base_url()?>admin/showuser/<?php echo @$key
                                ['user_id'];?>"  class="btn btn-primary waves-effect waves-light " style="float: none;margin: 5px;">
                                  <i class="icofont icofont-eye m-r-5"></i></a>
                                <?php }else{ ?>
                                   <a href="<?php echo base_url()?>admin/guest_orders/<?php echo @$key
                                ['id'];?>"  class="btn btn-primary waves-effect waves-light " style="float: none;margin: 5px;">
                                  <i class="icofont icofont-eye m-r-5"></i></a>
                                <?php } ?>
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
<section>
    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_product_category" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
   <script>     
        var $modal = $('#add_product_category');

        $('.add_product_category').on('click',function(event)
        {       
            var id = $(this).data('id');
            //var pname = $(this).data('name');
            event.stopPropagation();
            $modal.load('<?php echo site_url('admin/add_commission');?>', {id: id},
            function(){            
            $modal.modal('show');
            });
        });
        </script>
 <!-- CONTENT-WRAPPER-->
 <script type="text/javascript">
   $(document).on("click",".change_ustatus",function(){
    var id =$(this).data('id') ;
    var status =$(this).data('status') ;
    $.ajax({                
          url: "<?php echo base_url();?>admin/update_user_status",
          type: "POST",
          data: {id:id},
          error:function(request,response){
              console.log(request);
          },                  
          success: function(result){
              var res = jQuery.parseJSON(result);
              if(res.status=='success')
              {             
                  location.reload();
              }
              else
              {
                 $.notify({
                    title: '<strong>Hello!</strong>',
                    message: res.message
                  },{
                    type: 'warning'
                  });
              }
              
          }
    });
   })
   //delete user
   
   $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();  

});
     $('.delete_users').on('click',function(event){ 
            var id = $(this).data('id');
            var file = $(this).data('file');
            alertify.confirm("Do you want to Delete User ?.",
             function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/delete_users",
                    type: "POST",
                    data: {id:id,file:file},
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
           // alertify.error('Cancel');
          }); 
        }); 

//for payment status

  $('.featured_artist').on('click',function(event){ 
            var id = $(this).data('id');
           alertify.confirm("Are you sure Want to Set or Unset Featured Artist ?.",           
             function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/feature_artist",
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
        
        
        
     $('.trust_users').on('click',function(event)
     { 
            var id = $(this).data('id');
           // var file = $(this).data('file');
            alertify.confirm("This Users was Trust ?.",
             function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/trust_users",
                    type: "POST",
                    data: {id:id},
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result){                        
                        //if(result==1){
                         // alert('successfully deleted');
                        location.reload(); 
                            $("#hide"+id).hide();
                        //}
                        
                    }
              });
               },
          function(){
           // alertify.error('Cancel');
          }); 
        });     

//change status

function change_status(user_id,status)
{
   
    if(status == 1)
    {
       var a = 'Do you want to DeActive this User ?';
    }
    else if(status == 2)
    {
       var a ='Do you want to Approve this User ?';
    }
    else
    {
      var a ='Do you want to Active this User ?';
    }

    alertify.confirm(a,  
    function(){
      $.ajax({                
            url: "<?php echo base_url();?>admin/change_status",
            type: "POST",
            data: {user_id:user_id,status:status},
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
   // alertify.error('Cancel');
  });
    
}
</script>

 