<!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> -->
<style type="text/css">
  ul.dropdown-menu.status_dropdown {
    min-width: 100px !important;
    height: auto;
    padding: 5px 0 0px 0px;
    text-align: center;
    font-size: 10px;
    font-weight: 100;

}

ul.dropdown-menu.status_dropdown  li a {
       font-size: 12px;
}
.tab-content {
    padding: 20px;
}
div#simpletable1_wrapper {
    overflow-x: auto;
}
.form-group {
    margin-bottom: 2rem;
}
.user_details_tabs .nav-item{
    width:auto !important;
        padding: 15px 30px;
        position:relative;
}
.nav-tabs .slide {
    background: #ad891b;
    width: 100%;
    height: 4px;
    position: absolute;
    -webkit-transition: left 0.3s ease-out;
    transition: left 0.3s ease-out;
    bottom: 0;
    left: 0;
}
.user_pro_card.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.user_pro_card.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.user_pro_card .container {
  padding: 2px 16px;
  margin:0px;
  box-shadow:none !important;
}
.user_pro_card .product_name p{
    padding:15px 0px;
    font-size: 15px;
    letter-spacing: 1px;
}
.bottom_pagination{
    width:100%;
}
.bottom_pagination ul{
    float:right;
}
.bottom_pagination ul li{
    float:left;
}
.bottom_pagination ul li a{
    padding:10px 15px;
    color:#666666;
}
.md-tabs .nav-item a {
    padding: 2px 0 20px !important;
    color: #666;
    font-weight: 600;
}
.bottom_pagination ul li a.current{
    background-color:#2A7BBC;
    color:#fff;
}
.dataTables_wrapper {
    margin:30px 0px;
}
.dataTables_paginate .pagination li{
    float:left;
}
.dataTables_paginate .pagination li a{
    padding:10px 15px;
    background-color:#fff;
}
.dataTables_paginate .pagination li a{
    padding:10px 15px;
    background-color:#fff;
}
.dataTables_paginate .pagination li.active a{
    padding:10px 15px;
    background-color:#fff;
}
.table_img{
    height:100px;
}
td,th{
    vertical-align:middle !important;
}
.dataTables_paginate .pagination li.active a {
    color: #ad891b;
}
</style>


<!-- CONTENT-WRAPPER-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
         <div class="container-fluid">
    
    <div class="row" style="margin-top: 5%">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text">Customers Details</h5></div>
          <div class="card-block">            
      <ul class="nav nav-tabs md-tabs user_details_tabs" role="tablist">
        <?php if(@$customer_info->auth_level==6){?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#my_Designs" role="tab"><i class=""></i>Designs</a>
            <div class="slide"></div>
        </li>      
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#my_Sales" role="tab"><i class=""></i>Sales</a>
            <div class="slide"></div>
        </li>
        <?php } ?>
        <li class="nav-item active">
           <a class="nav-link" data-toggle="tab" href="#user_view" role="tab"><i class=""></i>User Details</a>
            <div class="slide"></div>
        </li>
                <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#my_Orders" role="tab"><i class=""></i>Orders</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#Favourites" role="tab"><i class=""></i>Favourites</a>
            <div class="slide"></div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#my_Followings" role="tab"><i class=""></i>Following</a>
            <div class="slide"></div>
        </li> 
        
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="user_view" role="tabpanel">
          <div class="col-md-2">
            <img src="<?php echo (@$customer_info->user_image)?base_url().@$customer_info->user_image:base_url().'assets/images/noimage.png';?>" style="object-fit: contain;width:100px;background-color:gray;">             
          </div>
            <div class="col-md-8">            
            <div class="form-group">
                <label class="control-label col-sm-3 text-right" for="email"><b>Name</b> &nbsp:</label>
                <div class="col-sm-6">  
                    <p class="edit-field"> <?php echo ucwords(@$customer_info->first_name).' '.@$customer_info->last_name; ?> </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="control-label col-sm-3 text-right" for="email"><b>Phone No</b> &nbsp:</label>
                <div class="col-sm-6">  
                    <p class="edit-field"><?php echo @$customer_info->mobile_no; ?></p>
                </div>
            </div>
             <div class="clearfix"></div>
            <div class="form-group">
                <label class="control-label col-sm-3 text-right" for="email"><b>Email</b> &nbsp:</label>
                <div class="col-sm-6">  
                    <p class="edit-field"><?php echo @$customer_info->email; ?></p>
                </div>
            </div>           
           <!-- <div class="clearfix"></div>
            <div class="form-group">
                <label class="control-label col-sm-3 text-right" for="email"><b>Profile Pic</b> &nbsp:</label>
                <div class="col-sm-6">  
                    <p class="edit-field"><img src="<?php echo base_url(); ?>assets/images/avatar-1.png" tppabs="http://ableproadmin.com/light/vertical/assets/images/avatar-1.png" class="img-fluid img-circle p-absolute d-block text-center" alt="" style="width: 35px;height: 35px;"></p>
                </div>
            </div> -->
            <div class="clearfix"></div>
            <div class="form-group">
                <label class="control-label col-sm-3 text-right" for="email"><b>Country</b> &nbsp:</label>
                <div class="col-sm-6">  
                    <p class="edit-field"><?php echo @$this->common_m->get_countries(@$customer_info->country)['country_name']; ?></p>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="form-group">
                <label class="control-label col-sm-3 text-right" for="email"><b>Status</b> &nbsp:</label>
                <div class="col-sm-6">  
                    <p class="edit-field"><?php echo (@$customer_info->status==1)?"Active":"De-Active"; ?></p>
                </div>
            </div>

             <div class="clearfix"></div>
           <div class="form-group">
                <label class="control-label col-sm-3 text-right" for="email"><b>Address</b>&nbsp:</label>
                <div class="col-sm-6">  
                    <p class="edit-field"><?php echo @ucwords(@$customer_info->address); ?></p>
                </div>
            </div>
             <div class="clearfix"></div>
            <div class="form-group">
                <label class="control-label col-sm-3 text-right" for="email"><b>Role</b>  &nbsp:</label>
                <div class="col-sm-6">  
                    <p class="edit-field"><?php echo (@$customer_info->auth_level==3)?"USER":"ARTIST"; ?></p>
                </div>
            </div>
             <div class="clearfix"></div>
             <?php if(@$customer_info->auth_level==6){?>
             <div class="form-group">
                <label class="control-label col-sm-3 text-right" for="email"><b>Admin Commission</b> &nbsp:</label>
                <form id="update_commission">  
                <div class="col-sm-6">                
                    <p class="edit-field">
                      <input type="number" name="data[commission]" value="<?php echo @$customer_info->commission; ?>">
                      <input type="hidden" name="user_id" value="<?php echo @$customer_info->user_id; ?>">
                    </p>                  
                </div>
                <div class="col-sm-1">                
                    <p class="edit-field">
                      <button type="button" class="badge badge-info update_commission">submit</button>
                    </p>                  
                </div>
                </form>
            </div>
              <div class="clearfix"></div>
           <?php } ?>
        </div>
        </div>
    
        <div class="tab-pane fade" id="Favourites" role="tabpanel">
            <div class="row">
<table class="table table-hover" id="exampleF">
    <thead>
      <tr>
        <th>Sl No</th>
        <th>Product Name</th>
        <th>Product Type</th>
        <th>Image</th>      
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(@$favorites){ 
          foreach (@$favorites as $key => $value) { ?>
      <tr>
        <td><?php echo @$key+1;?></td>
        <td><?php echo $value['product_name'];?></td>
        <td><?php echo (@$value['product_name']==1)?"One Piece Design":"Customised Design";?></td>
        <td><img src="<?php echo base_url().$value['product_image'];?>" class="table_img"></td>        
        <th><a href="<?php echo base_url();?>admin/product_details/<?php echo $value['pro_id'];?>"><button type = "button" class = "btn btn-info btn-xs edit_btn">View</button></a></th>        
      </tr>
    <?php }} ?>
    </tbody>
  </table>
            </div>
<div class="bottom_pagination">
            <ul id="pagin5">
               
    </ul>
    </div>
                        </div>
                        
<div class="tab-pane fade" id="my_Designs" role="tabpanel">
<div class="row">
<table class="table table-hover" id="example2">
    <thead>
      <tr>
        <th>Sl No</th>
        <th>Product Name</th>
        <th>Product Type</th>
        <th>Image</th>
        <th>Date Of Created</th>
        <th>Approval Status</th>
        <th>View Status</th>
        <!-- <th>Action</th> -->
      </tr>
    </thead>
    <tbody>
      <?php 
      if(@$mydesigns)
      {
        foreach (@$mydesigns as $key => $value){
            if($value['approval_status']==1)
            {
              $approval_status="success";
              $approval_status1="Active";
            }
            else
            {
              $approval_status="default";
              $approval_status1="pending";
            }

            if($value['status']==1)
            {
              $view_status="success";
              $view_status1="Public";
            }
            else
            {
              $view_status="primary";
              $view_status1="Private";
            }
         ?>
      <tr id="mydesign_<?php echo @$value["pro_id"];?>">
        <td><?php echo @$key+1;?></td>
        <td><?php echo @$value["product_name"];?></td>
        <td><?php echo @(@$value["product_type"]==1)?"One Piece Design":"Custome Design";?></td>
        <td><img src="<?php echo base_url().@$value['product_image'];?>" class="table_img"></td>
        <td><?php echo @$value["added_date"];?></td>
        <td><span class="badge badge-<?php echo @$approval_status;?>"><?php echo @$approval_status1;?></span></td>
        <td><span class="badge badge-<?php echo @$view_status;?>"><?php echo @$view_status1;?></span></td>
        <!-- <td class="action_btns"><span id="<?php echo @$value["pro_id"];?>" class="badge badge-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></span><a href="<?php echo base_url();?>website/add_product/<?php echo @$value["pro_id"];?>"><span class="badge badge-primary"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></td> -->
      </tr>
  <?php } } ?>
    </tbody>
  </table>
            </div>
                        </div>
                        <div class="tab-pane fade" id="my_Sales" role="tabpanel">
                              <div class="row">
<table class="table table-hover" id="example3">
    <thead>
      <tr>
        <th>Sl No</th>
        <th>Product Name</th>
        <th>Product Type</th>
        <th>Image</th>      
        <th>Sales</th>      
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <?php if(@$sales){ 
          foreach (@$sales as $key => $value) { ?>
      <tr>
        <td><?php echo @$key+1;?></td>
        <td><?php echo $value['product_name'];?></td>
        <td><?php echo (@$value['product_name']==1)?"One Piece Design":"Customised Design";?></td>
        <td><img src="<?php echo base_url().$value['product_image'];?>" class="table_img"></td>
        <td><?php echo @$this->db->select("sum(quantity) as total")->where("product_id",$value['pro_id'])->get("order_items")->row_array()['total'];?></td>    
        <td><?php echo @$this->db->select("sum(sub_total) as total")->where("product_id",$value['pro_id'])->get("order_items")->row_array()['total'];?> SAR</td>    
        <!-- <th><a href="<?php echo base_url();?>admin/product_details/<?php echo $value['pro_id'];?>"><button type = "button" class = "btn btn-info btn-xs edit_btn">View</button></a></th>     -->    
      </tr>
    <?php }} ?>
    </tbody>
  </table>
            </div>
                        </div>
<div class="tab-pane fade" id="my_Orders" role="tabpanel">                            
<div class="row">
<table class="table table-hover" id="example1">
    <thead>
     <tr>
          <th>Sl No</th>
          <th>Order ID#</th>
          <th>Full Name</th>
          <th>Mobile</th>
          <th>Date</th>
          <th>Delivery Address</th>
          <th>Order Status</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php if(@$orders){
            foreach($orders as $key=>$value){
          ?>
          <tr>
          <td><?php echo $key+1;?></td>
          <td><?php echo @$value['order_reference'];?></td>
          <td><?php echo @$value['first_name'].' '.@$value['last_name'];?></td>
          <td><?php echo @$value['mobile_no'];?></td>
          <td><?php echo @$value['created'];?></td>
          <td><?php echo @$value['street_name'].' ,'.@$value['postal_code'];?></td>
          <td>
            <?php if(@$value['status']==1){ ?>
          <span class="badge badge-success">Success</span></td>
           <?php }else{ ?>
          <span class="badge badge-default">Pending</span></td>
          <?php } ?>
            
          <td><?php echo @$value['grand_total'];?></td>
          <td>
            <a href="<?php echo base_url();?>admin/view_orders/<?php echo @$value['id'];?>">
              <button type = "button" class = "btn btn-info btn-xs edit_btn">View Items</button>
            </a>
          </td>
          </tr>
        <?php } }?>
    </tbody>
  </table>
</div>
</div>
<div class="tab-pane fade" id="my_Followings" role="tabpanel">
<div class="row">
<table class="table table-hover" id="exampleFollowings">
    <thead>
      <tr>
        <th>Order#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Date Of Created</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(@$followings){
            foreach($followings as $key=>$value){
          ?>
      <tr>
        <td><?php echo $key+1;?></td>
        <td><?php echo @$value['first_name'];?></td>
        <td><?php echo @$value['last_name'];?></td>
        <td><?php echo @$value['email'];?></td>
        <td><?php echo @$value['mobile_no'];?></td>
        <td><?php echo @$value['register_date'];?></td>
        <td>
          <?php if(@$value['approval_status']==1){?>
            <span class="badge badge-success">Active</span>
            <?php }else{ ?>
              <span class="badge badge-primary">Inactive</span>
            <?php } ?>
        </td>
        <th><a href="<?php echo base_url();?>admin/showuser/<?php echo @$value['user_id'];?>"><button type = "button" class = "btn btn-info btn-xs edit_btn">View</button></a></th>
        
      </tr>
       <?php } }?>
    </tbody>
  </table>
            </div>
<div class="bottom_pagination">
            <ul id="pagin7">
               
    </ul>
    </div>
                        </div>
                        
                        
                        
                        
               </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
   <footer class="f-fix">
    <div class="footer-bg b-t-muted" style="text-align: center;"> Copyrights © 2017 Volivesolutions. All Rights Reserved.
                   
                    </div>
     </footer>
           </div>
  </div>
        <!-- Container-fluid ends -->
        
     </div>
     <script type="text/javascript">
      $("#update_commission").validate({       
            rules: {
                "data[commission]"   : "required",                              
            },
            messages : {                                              
            },      
        });

    $('.update_commission').click(function(){ 

        var validator = $("#update_commission").validate();
            validator.form();
            if(validator.form() == true){                 
                var data = new FormData($('#update_commission')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_commission",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result)
                    {
                      location.reload();
                    }
                });
            }
        });
</script>
 <!-- CONTENT-WRAPPER-->
 <script type="text/javascript">
     $(document).ready(function() {
      var advance = $('#advanced2-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });

  // Setup - add a text input to each footer cell
      $('#advanced2-table tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<div class="md-input-wrapper"><input type="text" class="md-form-control" placeholder="Search '+title+'" /></div>');
      });
        // Apply the search
      advance.columns().every( function () {
          var that = this;
          $( 'input', this.footer() ).on( 'keyup change', function () {
              if (that.search() !== this.value) {
                  that
                      .search( this.value)
                      .draw();
              }
          });
      });

      var advance3 = $('#advanced3-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });

  // Setup - add a text input to each footer cell
      $('#advanced3-table tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<div class="md-input-wrapper"><input type="text" class="md-form-control" placeholder="Search '+title+'" /></div>');
      });
        // Apply the search
      advance3.columns().every( function () {
          var that = this;
          $( 'input', this.footer() ).on( 'keyup change', function () {
              if (that.search() !== this.value) {
                  that
                      .search( this.value)
                      .draw();
              }
          });
      });
  });
     $(document).ready(function(e) {
      var $modal = $('#showModal');
  $(document).on('click','.view_job',function(){ 
    var id = $(this).data('id');
    event.stopPropagation();
    $modal.load('<?php echo site_url('admin/job_details');?>', {job_id: id},
    function(){
    /*$('.modal').replaceWith('');*/
    $modal.modal('show');

  });
   
  });
  });
 </script>
 <style>
 </style>
 <div class = "modal fade" id="showModal" tabindex = "-1" role = "dialog"  aria-labelledby = "myModalLabel" aria-hidden = "true">
                
              </div> 

<script>

pageSize = 4;

	var pageCount =  $(".line-content5").length / pageSize;
    
     for(var i = 0 ; i<pageCount;i++){
        
       $("#pagin5").append('<li><a href="#">'+(i+1)+'</a></li> ');
     }
        $("#pagin5 li").first().find("a").addClass("current")
    showPage = function(page) {
	    $(".line-content5").hide();
	    $(".line-content5").each(function(n) {
	        if (n >= pageSize * (page - 1) && n < pageSize * page)
	            $(this).show();
	    });        
	}
    
	showPage(1);

	$("#pagin5 li a").click(function() {
	    $("#pagin5 li a").removeClass("current");
	    $(this).addClass("current");
	    showPage(parseInt($(this).text())) 
	});
</script>
<script>
pageSize = 4;

	var pageCount =  $(".line-content6").length / pageSize;
    
     for(var i = 0 ; i<pageCount;i++){
        
       $("#pagin6").append('<li><a href="#">'+(i+1)+'</a></li> ');
     }
        $("#pagin6 li").first().find("a").addClass("current")
    showPage = function(page) {
	    $(".line-content6").hide();
	    $(".line-content6").each(function(n) {
	        if (n >= pageSize * (page - 1) && n < pageSize * page)
	            $(this).show();
	    });        
	}
    
	showPage(1);

	$("#pagin6 li a").click(function() {
	    $("#pagin6 li a").removeClass("current");
	    $(this).addClass("current");
	    showPage(parseInt($(this).text())) 
	});
</script>
<script>
pageSize = 4;

	var pageCount =  $(".line-content7").length / pageSize;
    
     for(var i = 0 ; i<pageCount;i++){
        
       $("#pagin7").append('<li><a href="#">'+(i+1)+'</a></li> ');
     }
        $("#pagin7 li").first().find("a").addClass("current")
    showPage = function(page) {
	    $(".line-content7").hide();
	    $(".line-content7").each(function(n) {
	        if (n >= pageSize * (page - 1) && n < pageSize * page)
	            $(this).show();
	    });        
	}
    
	showPage(1);

	$("#pagin7 li a").click(function() {
	    $("#pagin7 li a").removeClass("current");
	    $(this).addClass("current");
	    showPage(parseInt($(this).text())) 
	});
</script>
 <script>
    $(document).ready(function() {
    $('#example1').DataTable();
} );
 $(document).ready(function() {
    $('#example2').DataTable();
} );
 $(document).ready(function() {
    $('#example3').DataTable();
} );
 $(document).ready(function() {
    $('#exampleF').DataTable();
} );
 $(document).ready(function() {
    $('#exampleFollowings').DataTable();
} );
</script>
