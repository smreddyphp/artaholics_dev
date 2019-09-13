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
.sr_only{
    visibility: hidden;
}
.user_details{
    width:100%;
}

.guest_user .details_tr{
    line-height: 30px;
}
.guest_user .details_tr td{
font-size: 15px;
}
.guest_user .details_tr td:nth-child(1),.guest_user .details_tr td:nth-child(3){
    width:45%;
}
.guest_user .details_tr td:nth-child(2){
    width:10%;
    
}
.guest_head{
    margin-bottom:20px;
}
.card:nth-child(1){
    margin-bottom:15px;
}
</style>


<!-- CONTENT-WRAPPER-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
         <div class="container-fluid">
    
    <div class="row" style="margin-top: 5%">
      <div class="col-md-12">
          <div class="card">
          <div class="card-block"> 
          <h1 class="guest_head">Guest Order Details</h1>
          <hr>
          <div class="guest_user row">
              <div class="col-md-4">
                  <table class="user_details">
                      <tr class="details_tr">
                          <td><b>First Name</b></td>
                          <td>:</td>
                          <td><?php echo @$order_items['first_name'];?></td>
                      </tr>
                      <tr class="details_tr">
                          <td><b>Country</b></td>
                          <td>:</td>
                          <td><?php echo @$this->db->where("id",@$order_items['country'])->get("country")->row_array()['country_name'];?></td>
                      </tr>
                      <tr class="details_tr">
                          <td><b>Postal Code</b></td>
                          <td>:</td>
                          <td><?php echo @$order_items['postal_code'];?></td>
                      </tr>
                  </table>
              </div>
              <div class="col-md-4">
                  <table class="user_details">
                      <tr class="details_tr">
                          <td><b>Last Name</b></td>
                          <td>:</td>
                          <td><?php echo @$order_items['last_name'];?></td>
                      </tr>
                      <tr class="details_tr">
                          <td><b>City</b></td>
                          <td>:</td>
                          <td><?php echo @$this->db->where("id",@$order_items['city'])->get("cities")->row_array()['name'];?></td>
                      </tr>
                      <tr class="details_tr">
                          <td><b>Street Name</b></td>
                          <td>:</td>
                          <td><?php echo @$order_items['street_name'];?></td>
                      </tr>
                  </table>
              </div>
              <div class="col-md-4">
                  <table class="user_details">
                    <tr class="details_tr">
                          <td><b>Order Id</b></td>
                          <td>:</td>
                          <td><?php echo @$order_items['order_reference'];?></td>
                      </tr>
                      <tr class="details_tr">
                          <td><b>Ordered Date</b></td>
                          <td>:</td>
                          <td><?php echo @$order_items['created'];?></td>
                      </tr>
                      <tr class="details_tr">
                          <td><b>Mobile Number</b></td>
                          <td>:</td>
                          <td><?php echo @$order_items['mobile_no'];?></td>
                      </tr>
                  </table>
              </div>
          </div>
          </div>
          </div>
        <div class="card">
         <!--  <div class="card-header"><h5 class="card-header-text">Customers Details</h5></div> -->
          <div class="card-block"> 
    <div class="tab-content">
        <div  id="Favourites" role="tabpanel">
            <div class="row">
<table class="table table-hover" id="exampleView">
    <thead>
      <tr>        
        <th>Sl No</th>
        <th>Product Name</th>
        <th>Image</th>
        <th>Size</th>
        <th>Color</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
       <?php if(@$order_items['order_items']){
        foreach (@$order_items['order_items'] as $key => $value) { ?>
              <tr>
        <td><?php echo @$key+1;?></td>
        <td><?php echo @$value['product_name'];?></td>
        <td><img src="<?php echo base_url().@$value['product_image'];?>" class="table_img"></td>
        <td><?php echo @$this->db->where("size_id",$value['size'])->get("sizes")->row_array()['size'];?></td>
        <td><?php echo @$this->db->where("color_id",$value['color'])->get("color")->row_array()['color_en'];?></td>
        <td><?php echo @$value['quantity'];?></td>
        <td><?php echo @$value['sub_total']." SAR";?></td>      
      </tr>
          <?php  } }  ?> 
      <tr>
        <td><span class="sr_only">Z</span><b>Grand Total</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo @$order_items['grand_total']." SAR";?></td>
      </tr>
    </tbody>
  </table>
            </div>
<div class="bottom_pagination">
            <ul id="pagin5">
               
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
    $('#exampleView').DataTable();
} );

</script>
