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
.hert {
    color: #f00d0d;
  }
  .owl-carousel-fav .owl-nav {
    position: absolute;
    top: 45%;
    width: 100%;
}
.owl-carousel-fav .owl-nav .owl-prev {
    right: auto;
    left: -50px !important;
}
.owl-carousel-fav .owl-nav .owl-prev, .owl-carousel-fav .owl-nav .owl-next {
    position: absolute;
    background: #F9DE5A none repeat scroll 0 0 !important;
    border: 5px solid #F9DE5A !important;
    border-radius: 50%;
    color: #fff !important;
    font-size: 24px;
    height: 40px;
    left: -30px;
    line-height: 26px;
    margin-top: -20px;
    position: absolute;
    text-align: center;
    top: 50%;
    width: 40px;
    -webkit-transition: .4s;
    transition: .4s;
    box-shadow: 0 0 1px 1px #fff, 0 0 1px 1px #fff, 0 0 1px 1px #fff, 0 0 1px 1px #fff;
}
.owl-carousel-fav .owl-nav .owl-next {
    left: auto;
    right: -50px;
}
.friendsCard .card {
    box-shadow: none;
    transition: 0.3s;
    border: none;
}
.media-object{
  border: 1px solid #0000003d;
}
#search_data{width:100%;}
.artist_works .col-md-3 {   
   display: inline-table;
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
          <div id="favourites" class="tab-pane active show">
            <div class="sort_box">
             <ul class="nav nav-tabs insideTabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#AllUsers">All Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#Requests">Requests</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#myfriends">My Friends</a>
              </li>
            </ul>
             <div class="tab-content">
                <div class="tab-pane active" id="AllUsers">
                    <div class="row">
                <div class="col-md-12">
                  <div>
                    <h4><?php echo "List of Users"; //@$language['your_favorites'];?>
                    <span class="searchUsers pull-right mb-3">
                        <div class="input-group">
                            <input type="text" onkeyup="searchusers(this.value,1)" class="form-control" placeholder="Search Here..">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                  <i class="fa fa-search" aria-hidden="true"></i>
                              </span>
                            </div>
                          </div>
                    </span>
                    </h4>
                  </div>
                </div>
                <div id="search_data">
                <?php 
                if(@$users)
                {
                  foreach (@$users as $key => $value) { ?>
                     <div class="col-md-3">
                        <div class="friendsCard">
                            <div class="card">
                                <img src="<?php echo ($value['user_image'])?base_url().$value['user_image']:base_url().'assets/website/images/prof.png';?>">
                                <div class="container">
                                  <h4><b><?php echo @$value["first_name"];?></b></h4> 
                                  <?php 
                                    $follow = $this->db->where(array("user_id"=>$value['user_id'],"follower_id"=>$userdata['user_id']))->get("followers")->row_array();
                                    $me_follow = $this->db->where(array("follower_id"=>$value['user_id'],"user_id"=>$userdata['user_id']))->get("followers")->row_array();
                                    if(!empty($follow) || !empty($me_follow))
                                    {
                                      if(!empty($follow))
                                      {
                                          if($follow["status"]==0)
                                          {
                                            ?>
                                             <p class="btnGroup"><button onclick="following(this.id,1)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn acceptBtn">Accept</button>
                                              <button onclick="following(this.id,2)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn rejectBtn">Reject</button>
                                              </p>    
                                            <?php
                                          }
                                          else if($follow["status"]==1)
                                          {
                                            ?><p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn followingBtn">Following</button>
                                              <a href="<?php echo base_url();?>website/share_orders/<?php echo @$value['user_id'];?>"><button class="btn btn-primary cont_shopping followBtn viewOrderBtn">Visit</button></a>
                                              </p><?php
                                          }
                                          else
                                          {
                                            ?><p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn rejectBtn">Rejected</button><?php
                                          }
                                      }
                                      else
                                      {
                                          if($me_follow["status"]==0)
                                          {
                                            ?>
                                             <p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn acceptBtn">Follow Request Sent</button>
                                              </p>    
                                            <?php
                                          }
                                          else if($me_follow["status"]==1)
                                          {
                                            ?><p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn followingBtn">Following</button>
                                             <a href="<?php echo base_url();?>website/share_orders/<?php echo @$value['user_id'];?>"> <button class="btn btn-primary cont_shopping followBtn viewOrderBtn">View Orders</button></a>
                                              </p><?php
                                          }
                                          else
                                          {
                                            ?><p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn rejectBtn">Rejected</button><?php
                                          }
                                      }
                                    }
                                    else
                                    {
                                      ?><p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn">Follow</button></p><?php
                                    }                                   
                                    
                                  ?>
                                  
                                </div>
                              </div>
                        </div>   
                     </div>
                 <?php } } ?>
                 </div>                
          
              </div>
                </div>
                <div class="tab-pane" id="Requests">
                    <div class="row">
                <div class="col-md-12">
                  <div>
                    <h4><?php echo "Requests"; //@$language['your_favorites'];?></h4>                    
                  </div>
                </div>                
                <?php 
                if(@$requests)
                {
                  foreach (@$requests as $key => $value) { ?>
                     <div class="col-md-3">
                        <div class="friendsCard">
                            <div class="card">
                                <img src="<?php echo ($value['user_image'])?base_url().$value['user_image']:base_url().'assets/website/images/prof.png';?>">
                                <div class="container">
                                  <h4><b><?php echo @$value["first_name"];?></b></h4> 
                                  <?php 
                                    $follow = $this->db->where(array("user_id"=>$value['user_id'],"follower_id"=>$userdata['user_id']))->get("followers")->row_array();
                                    $me_follow = $this->db->where(array("follower_id"=>$value['user_id'],"user_id"=>$userdata['user_id']))->get("followers")->row_array();
                                    if(!empty($follow) || !empty($me_follow))
                                    {
                                      if(!empty($follow))
                                      {
                                          if($follow["status"]==0)
                                          {
                                            ?>
                                             <p class="btnGroup"><button onclick="following(this.id,1)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn acceptBtn">Accept</button>
                                              <button onclick="following(this.id,2)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn rejectBtn">Reject</button>
                                              </p>    
                                            <?php
                                          }
                                          else if($follow["status"]==1)
                                          {
                                            ?><p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn followingBtn">Following</button>
                                              <a href="<?php echo base_url();?>website/share_orders/<?php echo @$value['user_id'];?>"><button class="btn btn-primary cont_shopping followBtn viewOrderBtn">Visit</button></a>
                                              </p><?php
                                          }
                                          else
                                          {
                                            ?><p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn rejectBtn">Rejected</button></p><?php
                                          }
                                      }
                                      else
                                      {
                                          if($me_follow["status"]==0)
                                          {
                                            ?>
                                             <p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn acceptBtn">Follow Request Sent</button></p>    
                                            <?php
                                          }
                                          else if($me_follow["status"]==1)
                                          {
                                            ?>
                                            <p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn followingBtn">Following</button>
                                             <a href="<?php echo base_url();?>website/share_orders/<?php echo @$value['user_id'];?>"> <button class="btn btn-primary cont_shopping followBtn viewOrderBtn">Visit</button></a>
                                              </p>
                                              <?php
                                          }
                                          else
                                          {
                                            ?><p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn rejectBtn">Rejected</button><?php
                                          }
                                      }
                                    }
                                    else
                                    {
                                      ?><p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn">Follow</button></p><?php
                                    }
                                  ?>
                                </div>
                              </div>
                        </div>   
                     </div>
                 <?php } } ?>                
         
              </div>
                </div>
                <div class="tab-pane" id="myfriends">
                    <div class="row">
                <div class="col-md-12">
                  <div>
                    <h4><?php echo "My Friends"; //@$language['your_favorites'];?>
                    <span class="searchUsers pull-right mb-3">
                        <div class="input-group">
                            <input type="text" onkeyup="searchusers(this.value,2)" class="form-control" placeholder="Search Here..">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                  <i class="fa fa-search" aria-hidden="true"></i>
                              </span>
                            </div>
                          </div>
                    </span>
                    </h4>
                  </div>
                </div>
                <div id="friends" style="width: 100%">
                <?php 
                if(@$friends)
                {
                  foreach (@$friends as $key => $value) { ?>
                     <div class="col-md-3">
                        <div class="friendsCard">
                            <div class="card">
                                <img src="<?php echo ($value['user_image'])?base_url().$value['user_image']:base_url().'assets/website/images/prof.png';?>">
                                <div class="container">
                                  <h4><b><?php echo @$value["first_name"];?></b></h4> 
                                  <?php 
                                    $follow = $this->db->where(array("user_id"=>$value['user_id'],"follower_id"=>$userdata['user_id']))->get("followers")->row_array();
                                    $me_follow = $this->db->where(array("follower_id"=>$value['user_id'],"user_id"=>$userdata['user_id']))->get("followers")->row_array();
                                    if(!empty($follow) || !empty($me_follow))
                                    {
                                      if(!empty($follow))
                                      {
                                          if($follow["status"]==0)
                                          {
                                            ?>
                                             <p class="btnGroup"><button onclick="following(this.id,1)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn acceptBtn">Accept</button>
                                              <button onclick="following(this.id,2)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn rejectBtn">Reject</button>
                                              </p>    
                                            <?php
                                          }
                                          else if($follow["status"]==1)
                                          {
                                            ?><p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn followingBtn">Following</button>
                                              <a href="<?php echo base_url();?>website/share_orders/<?php echo @$value['user_id'];?>"><button class="btn btn-primary cont_shopping followBtn viewOrderBtn">Visit</button></a>
                                              </p><?php
                                          }
                                          else
                                          {
                                            ?><p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn rejectBtn">Rejected</button><?php
                                          }
                                      }
                                      else
                                      {
                                          if($me_follow["status"]==0)
                                          {
                                            ?>
                                             <p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn acceptBtn">Follow Request Sent</button>
                                              </p>    
                                            <?php
                                          }
                                          else if($me_follow["status"]==1)
                                          {
                                            ?><p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn followingBtn">Following</button>
                                             <a href="<?php echo base_url();?>website/share_orders/<?php echo @$value['user_id'];?>"> <button class="btn btn-primary cont_shopping followBtn viewOrderBtn">View Orders</button></a>
                                              </p><?php
                                          }
                                          else
                                          {
                                            ?><p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn rejectBtn">Rejected</button><?php
                                          }
                                      }
                                    }
                                    else
                                    {
                                      ?><p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn">Follow</button></p><?php
                                    }                                   
                                    
                                  ?>
                                  
                                </div>
                              </div>
                        </div>   
                     </div>
                 <?php } } ?>
                 </div>                
          
              </div>
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
<script type="text/javascript">
  function following(id,status="")
  {
    $.ajax({                
      url: "<?php echo base_url();?>website/user_follow_un_follow",
      type: "POST",
      data:{'follower_id':id,'status':status},
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
    <script type="text/javascript">
      function favourite(id)
      {
        $.ajax({                
                    url: "<?php echo base_url();?>website/add_favourite_product",
                    type: "POST",
                    data:{'pro_id':id},
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
                    },3000)
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
      navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>" ]
  });
});
</script>
<script type="text/javascript">

function searchusers(value,status)
{ 
      $.ajax({                
              url: "<?php echo base_url();?>website/search_users",
              type: "POST",
              data: {value:value,status:status},                                     
              success: function(result){
                if(status==1)
                {
                 $("#search_data").html(result);
                }
                else
                {
                  $("#friends").html(result);
                }
              }
          });
}

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