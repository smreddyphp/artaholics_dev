<style>
  .artist_works .available_tabs ul li a {
    padding: 22px 41px 20px 41px;
  }
  .artist_works .available_wrapper ul li {
    padding: 0px 15px !important;
  }
  .artist_works .available_wrapper ul {
    padding:0px !important;
  }
  .bottom_pagination{
    width:100%;
    overflow:hidden;
    clear:both;
  }
  .bottom_pagination ul{
    background-color:transparent !important;
    float:right !important;
    width:auto !important;
  }
  .bottom_pagination ul li{
    padding:0px !important;
  }
  .bottom_pagination ul li a{
    padding: 10px 15px !important;
    background-color:#fff ;
    margin-left: 15px !important;
    display: -webkit-inline-box;
  }
  .bottom_pagination li a.current{
    background-color:#E2E1E6;
  }
.table_img:hover{
        transform: scale(5.05);
    transition: all ease 500ms;
}
.action_btns span{
    padding:0;
    height:25px;
    width:29px;
    line-height:25px;
    margin:0px 2px;
}
.action_btns span i{
    font-size:15px;
}
.edit_tabs{
    background-color:transparent !important;

}
.edit_tabs li{
   margin-bottom:15px !important;
}
.edit_tab_content{
    margin-top:30px;
}
</style>
<div class="page_strip">
  <div class="container">
    <div class="row">
      <div class="strip_box">
        <p><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp;- &nbsp; <?php echo @$language['about_user'];?></p>
      </div>
    </div>
  </div>
</div>
<!----------===============artist_section===============---------->
<section class="about_product artist_wrapper">
  <div class="container">
    <div class="row">
      <div class="about_pro">
        <div class="media pro_media">
          <div class="media-left media-top mr-3 ">
            <img src="<?php echo (@$userdata["user_image"])?base_url().@$userdata["user_image"]:base_url().'assets/website/images/prof.png';?>" class="media-object">
          </div>
          <div class="media-body">
            <h3><?php echo @$userdata['first_name'];?><span class="artist_loc"><?php echo @$language['location'];?> : <?php echo @$userdata['country_name'];?></span></h3>
            <p class="art_name"><?php echo @$userdata['role'];?></p>
            <p class="art_para"><?php echo @$userdata['about'];?></p>  
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!----------==============my_designs==================------------>
<section class="available_section artist_works">
  <div class="container">
    <div class="row">
      <div class="available_tabs">
        <?php $this->load->view("website/includes/dashboard_menu");?>
       <div class="tab-content available_wrapper">
<div id="orders" class="tab-pane active show">
  <div class="sort_box">
    <div class="row">
      <div class="col-md-12">
        <div><br>
          <h4><?php echo @$language['your_orders'];?></h4>
        </div>
      </div>                 
    </div>
  </div>
  <div class="row">
    <table class="table table-hover table-responsive" id="example1">
      <thead>
        <tr>
          <th><?php echo @$language['sl_no'];?></th>
          <th><?php echo "Full Name";//@$language['sl_no'];?></th>
          <th><?php echo "Mobile";//@$language['sl_no'];?></th>
          <th><?php echo @$language['order_id'];?></th>
          <th><?php echo @$language['date'];?></th>
          <th><?php echo "Delivery Address";//@$language['delivery_pincode'];?></th>
          <th><?php echo @$language['order_status'];?></th>
          <th><?php echo @$language['total'];?></th>
          <th><?php echo @$language['action'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(@$my_orders){
            foreach($my_orders as $key=>$value){
          ?>
          <tr>
          <td><?php echo $key+1;?></td>
          <td><?php echo @$value['first_name'].' '.@$value['last_name'];?></td>
          <td><?php echo @$value['mobile_no'];?></td>
          <td><?php echo @$value['order_reference'];?></td>
          <td><?php echo @$value['created'];?></td>
          <td><?php echo @$value['street_name'].' ,'.@$value['postal_code'];?></td>
          <td>
            <?php if(@$value['status']==1){ ?>
          <span class="badge badge-success">Success</span>
        </td>
          
           <?php }else{ ?>
          <span class="badge badge-default">Pending</span></td>
          <?php } ?>
            
          <td><?php echo @$value['grand_total'];?></td>
          <td>
            <a href="<?php echo base_url();?>website/view_orders/<?php echo @$value['id'];?>">
              <button type = "button" class = "btn btn-info btn-xs edit_btn"><?php echo @$language['view_items'];?></button>
            </a>
             <?php if(@$value['status']==1){
          
              if(user_id==$value['user_id'])
              {
                if($value['share_status']==1)
                {
                ?><button type="button" onclick="change_order_share_status(this.id,0)" id="<?php echo @$value['id'];?>" class="btn btn-default cont_shopping followBtn followingBtn">Public</button><?php
                }
                else
                {
                  ?><button type="button" onclick="change_order_share_status(this.id,1)" id="<?php echo @$value['id'];?>" class="btn btn-primary cont_shopping followBtn viewOrderBtn">Private</button><?php
                }
              }
          }
          ?>
          </td>
          </tr>
        <?php } 
         }
        else
          {
            echo "No Orders Found";
          }
          ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<div id="snackbar">Some text some message..</div>
<script type="text/javascript">
  function change_order_share_status(id,status)
  {
    $.ajax({                
      url: "<?php echo base_url();?>website/change_order_share_status",
      type: "POST",
      data:{'id':id,'status':status},
      error:function(request,response)
      {
        console.log(request);
      },                  
      success: function(result)
      {
        if(result=="faild")
        {
          window.location.href="<?php echo base_url();?>website/login";
        }
        else
        {
          $("#snackbar").html(result);                
          myFunction();
          setTimeout(function(){
            location = ''
          },1000);
        }
        
      }
    });
  }
</script>
<script>
    	$(document).ready(function(){
  $(".owl-carousel-fav").owlCarousel({
      items:4,
      autoplay:true,
      margin:30,
      loop:true,
      nav:true,
      navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
  });
});
</script>
<script type="text/javascript">
  function get_cities(value='',id="")
  {
      $.ajax({                
            url: "<?php echo base_url();?>website/get_cities",
            type: "POST",
            data: {value:value},                                     
            success: function(result){
               $("#cities").html(result);
            }
        });
  }

  $("#customer").validate({       
            rules: {
                "data[first_name]"   : "required",
                "data[email]"   : "required",                
                "data[last_name]"   : "required",                
                "data[country]"   : "required",                
                "data[city]"   : "required",                
                "data[mobile_no]"   : "required",                
               /* "data[password]"   : "required",
                confirm_pwd: {
                    required: true,                    
                    equalTo: "#password"
                },
                old_password: {
                    required: true,                    
                    equalTo: "#old_pass"
                }*/               
            },
            messages : {
                "data[first_name]"   : "Please Enter the First Name",
                "data[email]"   : "Please Enter the Valid Email",                
                "data[last_name]"   : "Please Enter The Last Name",                
                "data[country]"   : "Please Select Country",                              
                "data[city]"   : "Please Select City",                              
                "data[mobile_no]"   : "Please Enter Mobile Number",                              
                //"data[password]"   : "Please Enter Password",                              
            },      
        });

    $('.customer').click(function(){ 

        var validator = $("#customer").validate();
            validator.form();
            if(validator.form() == true){                 
                var data = new FormData($('#customer')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>website/registration",
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
                      $("#snackbar").html(result);
                      //document.getElementById("customer").reset();                  
                         myFunction();
                    }
                });
            }
        });
</script>
<script>
  pageSize = 4;
  var pageCount =  $(".line-content").length / pageSize;
  for(var i = 0 ; i<pageCount;i++)
  {
    $("#pagin").append('<li><a href="#">'+(i+1)+'</a></li> ');
  }

 $("#pagin li").first().find("a").addClass("current")
 showPage = function(page) {
   $(".line-content").hide();
   $(".line-content").each(function(n) {
     if (n >= pageSize * (page - 1) && n < pageSize * page)
       $(this).show();
   });        
 }

 showPage(1);

 $("#pagin li a").click(function() {
   $("#pagin li a").removeClass("current");
   $(this).addClass("current");
   showPage(parseInt($(this).text())) 
 });
</script>
<script>
  pageSize = 4;

  var pageCount =  $(".line-content1").length / pageSize;

  for(var i = 0 ; i<pageCount;i++){

   $("#pagin1").append('<li><a href="#">'+(i+1)+'</a></li> ');
 }
 $("#pagin1 li").first().find("a").addClass("current")
 showPage = function(page) {
   $(".line-content1").hide();
   $(".line-content1").each(function(n) {
     if (n >= pageSize * (page - 1) && n < pageSize * page)
       $(this).show();
   });        
 }

 showPage(1);

 $("#pagin1 li a").click(function() {
   $("#pagin1 li a").removeClass("current");
   $(this).addClass("current");
   showPage(parseInt($(this).text())) 
 });
</script>
<script>
  pageSize = 4;

  var pageCount =  $(".line-content2").length / pageSize;

  for(var i = 0 ; i<pageCount;i++){

   $("#pagin2").append('<li><a href="#">'+(i+1)+'</a></li> ');
 }
 $("#pagin2 li").first().find("a").addClass("current")
 showPage = function(page) {
   $(".line-content2").hide();
   $(".line-content2").each(function(n) {
     if (n >= pageSize * (page - 1) && n < pageSize * page)
       $(this).show();
   });        
 }

 showPage(1);

 $("#pagin2 li a").click(function() {
   $("#pagin2 li a").removeClass("current");
   $(this).addClass("current");
   showPage(parseInt($(this).text())) 
 });
</script>
<script>
  pageSize = 4;

  var pageCount =  $(".line-content4").length / pageSize;

  for(var i = 0 ; i<pageCount;i++){

   $("#pagin4").append('<li><a href="#">'+(i+1)+'</a></li> ');
 }
 $("#pagin4 li").first().find("a").addClass("current")
 showPage = function(page) {
   $(".line-content4").hide();
   $(".line-content4").each(function(n) {
     if (n >= pageSize * (page - 1) && n < pageSize * page)
       $(this).show();
   });        
 }

 showPage(1);

 $("#pagin4 li a").click(function() {
   $("#pagin4 li a").removeClass("current");
   $(this).addClass("current");
   showPage(parseInt($(this).text())) 
 });
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
<script>
  $(document).ready(function() {
    $('#example1').DataTable();
  } );
</script>
<script>
  $(document).ready(function() {
    $('#example3').DataTable();
  } );
</script>
<script>
  $(document).ready(function() {
    $('#example_designs').DataTable();
  } );
</script>
<script>
  $(document).ready(function() {
    $('#example_following').DataTable();
  } );
</script>
<script>
</script>
<script>
$('#edit_btn').click(function() {
    $("#settings").addClass('active show');
    $("#account").removeClass('active show');
});
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>