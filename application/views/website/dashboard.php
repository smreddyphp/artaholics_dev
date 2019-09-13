<style>

  .artist_works .available_wrapper ul li {
    padding: 20px 15px !important;
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
<div id="account" class="tab-pane active">
  <div class="sort_box">
    <div class="row">
      <div class="col-md-12">
        <div><br>
          <h4 ><?php echo @$language['your_account'];?></h4>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="row sign_up_form">
      <!-- Tab panes -->
      <div class="tab-content signup_content">
        <div id="Customer" class="container tab-pane active">
         <div class="register_box">
           <div class="register_card">
            <div class="form-group wid_50 first_n">
              <label for="usr"><?php echo @$language['first_name'];?>&nbsp;<sup class="mandatory">*</sup> </label>
              <input type="text" class="form-control" placeholder="First Name" value="<?php echo @$userdata['first_name'];?>" disabled>
            </div>
            <div class="form-group wid_50 last_n">
              <label for="usr"><?php echo @$language['last_name'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="text" class="form-control" placeholder="Last Name" value="<?php echo @$userdata['last_name'];?>" disabled>
            </div>
            <div class="form-group">
              <label for="usr"><?php echo @$language['about'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="email" class="form-control" value="<?php echo @$userdata['about'];?>" disabled>              
            </div>
            <div class="form-group">
              <label for="usr"><?php echo @$language['email'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="email" class="form-control" value="<?php echo @$userdata['email'];?>" disabled>
              <span id="custem_error" style="color: red"></span>
            </div>
            <div class="form-group">
              <label for="usr"><?php echo @$language['mobile'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="text" class="form-control" value="<?php echo @$userdata['mobile_no'];?>" disabled>
            </div>
            <input type="hidden" name="data[role]" value="customer">
            <input type="hidden" name="data[auth_level]" value="3">
            <div class="form-group wid_50 first_n">
              <label for="usr"><?php echo @$language['country'];?> &nbsp;<sup class="mandatory">*</sup></label>
              <select class="form-control" id="countrys" name="data[country]" disabled>
                <option value="1" selected="selected"><?php echo @$userdata['country_name'];?></option>
              </select>
            </div>
            <div class="form-group wid_50 last_n">
              <label for="usr"><?php echo @$language['city'];?> &nbsp;<sup class="mandatory">*</sup></label>
              <select class="form-control" id="citys"  disabled>
                <option selected><?php echo @$userdata['city_name'];?></option>
              </select>
            </div>
            <div class="form-group">
             <a id="edit_btn" href="#settings"><button type="button" id="custr_btn" class="btn btn-success shop_btn shop_artist_btn mb-5 save_form"> <?php echo @$language['edit'];?> </button></a>
           </div>
         </div>
         <div class="register_img">
          <div class="user_img">
            <img src="<?php echo (@$userdata["user_image"])?base_url().@$userdata["user_image"]:base_url().'assets/website/images/prof.png';?>" class="media-object">
          </div>
        </div>
      </div>
    </div></div>
  </div>
  </div>
</div>
<div id="settings" class="tab-pane  fade">
  <div class="sort_box">
    <div class="row">
      <div class="col-md-5">
        <div>
          <h4 class="filtered_head"><?php echo @$language['settings'];?></h4>
        </div>
      </div>                  
    </div>
  </div>
  <div class="row">
    <div id="Customer" class="container tab-pane active">

           <ul class="nav nav-tabs edit_tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#edit_profile"><?php echo @$language['edit_profile'];?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#change_password"><?php echo @$language['change_password'];?></a>
              </li>
            </ul>
        <div class="tab-content edit_tab_content">
           <div id="edit_profile" class="container tab-pane active show">
        <form method="post" action="" id="customer" enctype="multipart/form-data">
                 <div class="register_box">
       <div class="register_card">
          <div class="form-group wid_50 first_n">
            <label for="usr"><?php echo @$language['first_name'];?>&nbsp;<sup class="mandatory">*</sup> </label>
            <input type="text" name="data[first_name]" class="form-control" placeholder="First Name" value="<?php echo @$userdata['first_name'];?>">
          </div>
          <div class="form-group wid_50 last_n">
            <label for="usr"><?php echo @$language['last_name'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <input type="text" name="data[last_name]" class="form-control" placeholder="Last Name" value="<?php echo @$userdata['last_name'];?>">
          </div>
          <div class="form-group">
            <label for="usr"><?php echo @$language['email'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <input type="email" name="data[email]" class="form-control" placeholder="Email Id" value="<?php echo @$userdata['email'];?>" disabled>
            <span id="custem_error" style="color: red"></span>
          </div>
          <div class="form-group">
            <label for="usr"><?php echo @$language['about'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <textarea name="data[about]" class="form-control" placeholder="About"><?php echo @$userdata['about'];?></textarea>
                        
          </div>
          <div class="form-group">
            <label for="usr"><?php echo @$language['mobile'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <input type="text" name="data[mobile_no]" class="form-control" placeholder="Mobile Number" value="<?php echo @$userdata['mobile_no'];?>" required>              
            <input type="hidden" name="data[user_id]" class="form-control" placeholder="Mobile Number" value="<?php echo @$userdata['user_id'];?>">              
          </div>
          <input type="hidden" name="user_id" value="<?php echo @$userdata['user_id'];?>">
           <div class="form-group wid_50 first_n">
                <label for="usr"><?php echo @$language['country'];?> &nbsp;<sup class="mandatory">*</sup></label>
              <select class="form-control" id="countrys" name="data[country]" onchange="get_cities(this.value,2)">
                  <option value=""><?php echo @$language['country'];?></option>
                  <?php foreach($countries as $key=>$value){
                        if($value['id']==$userdata['country']){
                   ?>
                      <option value="<?php echo $value['id'];?>" selected><?php echo $value['country_name'];?></option>
                  <?php }else{ ?>
                      <option value="<?php echo $value['id'];?>"><?php echo $value['country_name'];?></option>
                <?php } } ?>
                  </select>
            </div>
          <div class="form-group wid_50 last_n" id="cities">
            <label for="usr"><?php echo @$language['city'];?> &nbsp;<sup class="mandatory">*</sup></label>
            <select class="form-control" id="city" name="data[city]">
              <option value="<?php echo $userdata['city'];?>"><?php echo $userdata['city_name'];?></option>
            </select>
          </div>
          <div class="form-group">
           <button type="button" id="custr_btn" class="btn btn-success shop_btn shop_artist_btn mb-5 save_form customer" ><?php echo @$language['submit'];?></button>
         </div>
         </div>

          <div class="register_img">
        <div class="user_img">
          <img src="<?php echo base_url();?>assets/website/images/dummy-image.jpg" alt="Choosen file" class="img-upload-result">
        </div>
        <div class="upload_btn">                
          <div class="image-upload">
            <label for="file-input"> <img src="<?php echo base_url();?>assets/website//images/upload_img.png" width="70%"> </label>
            <input id="file-input" name="user_image" type="file" onchange="readURL(this);">
          </div>
        </div>
      </div>
               </div>
      </form>  
      </div>
      <div id="change_password" class="container tab-pane">
        <form method="post" action="" id="change_password1" enctype="multipart/form-data">
          <div class="form-group">
            <label for="usr"><?php echo @$language['old_password'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Enter Old Password">
            <input type="hidden" name="old_pass" id="old_pass" value="<?php echo base64_decode($userdata['password']);?>">
            <input type="hidden" name="data[user_id]" value="<?php echo @$userdata['user_id'];?>">
          </div>
          <div class="form-group">
            <label for="usr"><?php echo @$language['new_password'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <input type="password" id="password" name="data[password]" class="form-control" placeholder="Enter New Password">
          </div>
          <div class="form-group">
            <label for="usr"><?php echo @$language['re_enter_new_password'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <input type="password" name="confirm_pwd" class="form-control" placeholder="Confirm New Password">
          </div>
          <div class="form-group">
           <button type="button" id="custr_btn" class="btn btn-success shop_btn shop_artist_btn mb-5 save_form change_password1"><?php echo @$language['submit'];?></button>
         </div>       
      </form>  
    </div>   
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<div id="snackbar">Some text some message..</div>
<script>
    	$(document).ready(function(){
  $(".owl-carousel-fav").owlCarousel({
      items:4,
      autoplay:true,
      margin:30,
      loop:true,
      nav:true,
      navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>" ]
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
                "data[about]"   : "required",                
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
                "data[about]"   : "Please Enter About ",                
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
                    url: "<?php echo base_url();?>website/save_profile",
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
                       myFunction();
                         setTimeout(function(){// wait for 5 secs(2)
                               location.reload(); // then reload the page.(3)
                          }, 2000);
                    }
                });
            }
        });

  $("#change_password1").validate({       
            rules: {
                old_password   :{
                  required:true,
                  equalTo:"#old_pass",
                },
                "data[password]"   : "required",                
                confirm_pwd   :{
                  required:true,
                  equalTo:"#password"
                },
            },
            messages : {
                old_password   :{
                  required:"Please Enter Old Password",
                  equalTo:"Miss Match Old Password",
                },
                "data[password]"   : "Please Enter Current Password",                
                confirm_pwd   :{
                  required:"Please Enter Confirm Password",
                  equalTo:"Miss Match Password And Confirm Password"
                },                              
            },      
        });

    

    $('.change_password1').click(function(){ 

        var validator = $("#change_password1").validate();
            validator.form();
            if(validator.form() == true){                 
                var data = new FormData($('#change_password1')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>website/password_update",
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
                         setTimeout(function(){// wait for 5 secs(2)
                               location.reload(); // then reload the page.(3)
                          }, 2000); 
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