<!-- CONTENT-WRAPPER-->
<div class="content-wrapper">
        <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="main-header">
                <h4>Profile</h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item"><a href="javascript:" ><i class="icofont icofont-home"></i></a>
                        </li>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:" >Profile</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- Header end -->
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card faq-left">
                        <div class="card-block">
						<img class="img-fluid" src="<?php echo base_url((empty($user_info->user_image)) ? "assets/uploads/user_profiles/profile.png": $user_info->user_image); ?>" alt="" style="max-width: 50%">
						</br>
                            <ul>
							<li class="faq-contact-card">
                                <i class="icofont icofont-ui-user"></i>
                                 <?php echo ucwords($user_info->user_name);  ?>
                                </li>
                                <li class="faq-contact-card">
                                    <i class="icofont icofont-telephone"></i>
                                    <?php echo $user_info->mobile_no; ?>
                                </li>
                                <li class="faq-contact-card">
                                    <i class="icofont icofont-email"></i>
                                    <?php echo $user_info->email; ?>
                                </li>
                            </ul>
                    </div>
                    </div>
                    <!-- end of card-block -->
                    <!-- end of card -->
                </div>
                <!-- end of col-lg-3 -->
                <!-- start col-lg-9 -->
                <div class="col-xl-9 col-lg-8">
                    <!-- Nav tabs -->
                    <div class="tab-header">
                        <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link " data-toggle="tab" href="#personal" role="tab"><i>Personal Info</i></a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a  class="nav-link" data-toggle="tab" href="#tab2" role="tab"><i>Change Password</i></a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                    </div>
                    <!-- end of tab-header -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal" role="tabpanel">
                            <div class="card">
                                <div class="card-header"><h5 class="card-header-text">About Me</h5>
                                    <?php 
                                    ?>
                                </div>
                                <div class="card-block">           
            <div class="edit-info">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="general-info">
                            <div class="row">
                                <div class="col-lg-12">
                                <form id="profile_update" method="post">
                                <table class="table">
                                <tbody>
                                 <tr>
                                <td>
                        <div class="md-group-add-on">
                            <span class="md-add-on">
                            <i class="icofont icofont-ui-user"></i>
                            </span>
                        <div class="md-input-wrapper">
                            <input type="text" class="md-form-control" value="<?php echo $user_info->user_name; ?>" placeholder="Please Enter Name" name="data[user_name]">
                            <input type="hidden" name="data[user_id]" value="<?php echo $user_info->user_id; ?>">
                        </div>
                    </div>
                        </td>
                    </tr>
                        <tr>
                            <td>
                            <div class="form-radio">
                                <div class="md-group-add-on">
                            <span class="md-add-on">
                            <i class="icofont icofont-group-students"></i>
                            </span>
                        </div>
                    </div>
                        </td>
                            </tr>
                            <tr>
                            <td>
                        <div class="md-group-add-on">
                            <span class="md-add-on-file">
                            <button class="btn btn-success waves-effect waves-light">File</button>
                            </span>
                        <div class="md-input-file">
                            <input type="file" class="" name="profile_image">
                            <input type="text" class="md-form-control md-form-file">
                            <label class="md-label-file">Upload Profile Pic</label>
                            <span class="md-line"></span>
                        </div>
                            <input type="hidden" name="old_image" value="<?php echo $user_info->user_image;?>">
                        </div>
                            </td>
                                </tr>
                                <tr>
                                <td>
                        <div class="md-group-add-on">
                            <span class="md-add-on">
                            <i class="icofont icofont-email"></i>
                            </span>
                        <div class="md-input-wrapper">
                            <input type="email" class="md-form-control" value="<?php echo $user_info->email; ?>" placeholder="Enater Your Email" name="data[email]" readonly>
                            <!-- <label>Email</label> -->
                        </div>
                    </div>
                            </td>
                                </tr>
                                <tr>
                                 <td>
                        <div class="md-group-add-on">
                            <span class="md-add-on">
                            <i class="icofont icofont-mobile-phone"></i>
                            </span>
                        <div class="md-input-wrapper">
                            <input type="text" class="md-form-control" placeholder="Enater Your Mobile Number" value="<?php echo $user_info->mobile_no; ?>" 
                            name="data[mobile_no]">
                            <!--  <label>Mobile Number</label> -->
                        </div>
                    </div>
                        </td>
                            </tr>
                              <tr>
                            <td>
                            <button type="submit" class="btn btn-warning waves-effect waves-light m-r-30 update_profile" style="margin-left: 50%;">Submit</button></td>       
                                            </tr>
                                        </tbody>
                                     </table>
                                    </form>
                                </div>
                            </div>
                         </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                            
                            <!-- end of row -->
    <div class="tab-pane fade " id="tab2" role="tabpane">
        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text">Change Password</h5>
                    </div>
                    <div class="card-block">          
                        <div class="edit-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="general-info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                        <form id="change_password" method="post">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-xs-3 col-form-label form-control-label">Old Password</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" value="" id="" name="data2[old_pass]">
                                        <input type="hidden" name="data2[user_id]" value="<?php echo $user_info->user_id; ?>">
                                    </div>
                                </div>
                            <div class="form-group row">
                                    <label for="example-text-input" class="col-xs-3 col-form-label form-control-label">New Password</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="password"  id="password_length" name="data2[new_pass]">
                                    <span id="min_char" style="color:red;text-align:center"></span>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-xs-3 col-form-label form-control-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="Password"  name="data2[confirm_pass]">
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-xs-2 col-form-label form-control-label"></label>
                            <div class="col-sm-10">
                                <button type="button" class="btn btn-warning waves-effect waves-light m-r-30 change_password" style="margin-left: 50%;">Submit</button>
                                         </div>
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
           </div>
         </div>
       </div>
    </div>
</div>
<!-- <footer class="f-fix">
    <div class="footer-bg b-t-muted" style="text-align: center;"> Copyrights © 2017 Volivesolutions. All Rights Reserved.
</div>
     </footer> -->
    </div>
 <!-- CONTENT-WRAPPER-->
 <script type="text/javascript">
    $("#profile_update").validate({       
            rules: {
              "data[user_name]"     : "required",
              "data[email]"         : "required",
              "data[mobile_no]"        : "required"
            },
            messages : {
             // "data[user_name]"    : "Please Enter your name",
             // "data[email]"        : "Please Enter your email",
             // "data[mobile]"       : "Please Enter your phone number"
            },     
    });
    $('.update_profile').on("click",function(event){
        event.preventDefault();
        var validator = $("#profile_update").validate();
            validator.form();
            if(validator.form() == true){                
                var data = new FormData($('#profile_update')[0]);  
                
                $.ajax({                
                    url: "<?php echo base_url();?>/admin/profile_update",
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
                        //console.log(result)
                    var obj = jQuery.parseJSON(result);
                          if (obj.status == 'success') {
                           //alert(obj.message);
                            location.reload();                  
                          } else if (obj.status =='error') {
                            $.notify({
                                    title: '<strong>Hello!</strong>',
                                    message: obj.message
                                  },{
                                    type: 'warning'
                                  });
                                } 
                            }
                        });
                    }
                });
 $(".change_password").click(function(){
      var validator = $("#change_password").validate();
      validator.form();
      if(validator.form() == true)
      {        
        if($('#password_length').val().length >= 6){
           $('#min_char').css('display','none');
           var data = new FormData($('#change_password')[0]);
           $.ajax({
            url: "<?php echo base_url()?>/admin/update_pwd",
            type: "POST",
            dataType: "html",
            mimeType: "multipart/form-data",
            data: data,
            contentType: false,
            cache: false,
            processData:false,
              success: function(result){
                var obj = jQuery.parseJSON(result);
                  if (obj.status == 'success') {
                   //alert(obj.message);
                    location.reload();                  
                  } else if (obj.status =='error') {
                    $.notify({
                            title: '<strong>Hello!</strong>',
                            message: obj.message
                          },{
                            type: 'warning'
                          });
                        } 
                    }
                });
        }else{
            $('#min_char').html('Minimum 6 characters required !');
        }
      }
      else{
        $('.show_alert').css('display','block');
        $("body,html").animate({scrollTop: 0}, 'slow');
      }
    });
$("#change_password").validate({
      rules: {
          "data2[old_pass]"          : "required",
          "data2[new_pass]"          : "required",
          "data2[confirm_pass]"      : {required:true,equalTo:'[name="data2[new_pass]"]'}
        },
        messages : {
          "data2[old_pass]"          : "Please Enter Old Password",
          "data2[new_pass]"          : "Please Enter New Password",
          "data2[confirm_pass]"      : "<p style='color:red;text-align:center;margin-top:10px;'>New Password and Confirm Password should be same !</p>"
        }
    });

 </script>
 <style type="text/css">
     .nav-tabs .slide {
   
    width: calc(100% / 2);
}
.md-tabs .nav-item {
   
    width: calc(100% / 2);
}
 .error{
   color:red;
   font-size: 13px;
    }
    li.nav-item.active {
    border-bottom: 3px solid #76b0ae;
}
label.error {
        color: red;
    top: -5px;
}
 </style>}
