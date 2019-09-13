<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<style>
    table.table-bordered.dataTable th:last-child, table.table-bordered.dataTable th:last-child, table.table-bordered.dataTable td:last-child, table.table-bordered.dataTable td:last-child {
    border-right-width: initial;
}
.z_none{
       visibility: hidden;
}
#example5_paginate .pagination{
    float:right !important;
    margin:15px 0px;
}
</style>
<div class="page_strip">
    <div class="container">
        <div class="row">
            <div class="strip_box">
                <p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp; - &nbsp; View Order Details </p>
            </div>
        </div>
    </div>
</div>


<!----------===============women_section===============---------->
<section class="view_orders_box">
    <div class="container">
    <div id="orders" class="">
      <div class="sort_box view_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <h4>Your Order Details</h4>
                                </div>
                            </div>
                  <!--          <div class="col-md-7 select_col">-->
                  <!--              <div class="pro_type">-->
                  <!--              <div class="form-inline">-->
                  <!--<label for="sel1">Product Type &nbsp; : &nbsp;</label>-->
                  <!-- <select class="form-control show_by">-->
                  <!--   <option selected="">All</option>-->
                  <!--   <option >Featured</option>-->
                  <!--   </select>-->
                  <!--          </div>-->
                  <!--          </div>-->
                  <!--          <div class="pro_type">-->
                  <!--          <div class="form-inline sort_by">-->
                  <!--<label for="sel1">Sort By &nbsp; : &nbsp;</label>-->
                  <!-- <select class="form-control show_by">-->
                  <!--   <option>Best Selling</option>-->
                  <!--   <option selected="">Featured</option>-->
                  <!--     <option>Alphabetically , A-Z</option>-->
                  <!--     <option>Alphabetically , Z-A</option>-->
                  <!--     <option>Price Low to High</option>-->
                  <!--     <option>rice High to Low</option>-->
                  <!--   </select>-->
                  <!--          </div>-->
                  <!--          </div>-->
                  <!--      </div>-->
                    </div>
                    </div>
   <div class="row">
<table class="table table-bordered view_order_table" id="example5">
    <thead>
      <tr>
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
        <td><?php echo @$value['product_name'];?></td>
        <td><img src="<?php echo base_url().@$value['product_image'];?>" class="table_img"></td>
        <td><?php echo @$this->db->where("size_id",$value['size'])->get("sizes")->row_array()['size'];?></td>
        <td><?php echo @$this->db->where("color_id",$value['color'])->get("color")->row_array()['color_en'];?></td>
        <td><?php echo @$value['quantity'];?></td>
        <td><?php echo @$value['sub_total']." SAR";?></td>      
      </tr>
          <?php  } }  ?>     
     
    <tr>
        <th><span class="z_none">z</span>Grand Total</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo @$order_items['grand_total']." SAR";?></td>
      </tr>
    </tbody>
  </table>

            </div>
  </div>
  </div> 
</section>


<script>
    $(document).ready(function() {
    $('#example5').DataTable();
} );
</script>