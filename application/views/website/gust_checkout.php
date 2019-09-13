<style type="text/css">
   .errmsg
{
color: red;
}
</style>
<section class="checkout_section">
    <div class="container">
        <h3 class="main_heading"><?php echo @$language['check_out'];?></h3>
        <div class="row checkout_row">
            <div class="checkout_box">
                <!-- <h4 class="check_sidehead">1.CHECKOUT METHOD</h4> -->
                <div class="row">
                <div class="as_guest col-md-4">
                    <h4 class="check_sidehead"><?php echo @$language['check_out_as_guest'];?></h4>
                    <!-- <p>Register with us for future convenience:</p> -->
                    <ul class="checkout_tabs list-group">
                     <li class="list-group-item">
                          <label class="form-check-label login">
                               <input type="radio" class="form-check-input" checked="checked" name="optradio"><?php echo @$language['login'];?>
                          </label>
                    </li>
                    <li class="list-group-item" >
                          <label class="form-check-label register">
                               <input type="radio" class="form-check-input" name="optradio"><?php echo @$language['register'];?>
                          </label>
                    </li>
                    <li class="list-group-item">
                          <label class="form-check-label guest">
                               <input type="radio" class="form-check-input" name="optradio"><?php echo @$language['check_out_as_guest'];?>
                          </label>
                    </li>
                   </ul>
                </div>
                <div class="col-md-8 as_login">
                    <div class="tab-content">
                       <div class="tab-pane active" id="login">
                           <h4 class="log_head"><?php echo @$language['login'];?></h4>

                           <div class="checkout_form">
                             <form id="loginform">
                           <div class="form-group">
                              <label><?php echo @$language['email_address'];?></label>
                                     <input type="email" name="login[email]" id="inputEmail" class="form-control">
                              </div>
                              <div class="form-group">
                              <label><?php echo @$language['password'];?></label>
                                     <input type="password" name="login[password]" id="inputPassword" class="form-control">
                              </div>
                             <!--  <div class="">
                              <label><a href="#" class="frgt_pwd">Forgot Password ?</a></label>
                              </div> -->
                              <div class="form-group">
                              <button class="btn btn-lg btn-primary btn-block sign_btn loginform" type="button"><?php echo @$language['login'];?></button>
                              </div>
                              </form>
                              </div>
                            
                       </div>
                       <div class="tab-pane" id="register">
                           <h4 class="log_head"><?php echo @$language['register'];?></h4>
                           <div class="checkout_form">
                            <form id="customer">
                           <div class="form-group">
                              <label><?php echo @$language['first_name'];?>&nbsp;<sup class="mandatory">*</sup></label>
                                     <input type="text" name="data[first_name]"  class="form-control">
                              </div>
                              <div class="form-group">
                              <label><?php echo @$language['last_name'];?></label>
                                     <input type="text" name="data[last_name]"  class="form-control">
                              </div>
                              <div class="form-group">
                              <label><?php echo @$language['email_address'];?>&nbsp;<sup class="mandatory">*</sup></label>
                                      <input type="email" name="data[email]" class="form-control valid" placeholder="Email" onkeyup="chek_email(this.value,1)">
                                    <span id="custem_error" style="color: red;"></span>
                              </div>
                              <div class="form-group">
                              <label><?php echo @$language['password'];?>&nbsp;<sup class="mandatory">*</sup></label>
                                     <input type="password" name="data[password]" id="password" class="form-control">
                              </div>
                              <div class="form-group">
                              <label><?php echo @$language['confirm_password'];?>&nbsp;<sup class="mandatory">*</sup></label>
                                     <input type="password" name="confirm_pwd" id="" class="form-control">
                              </div>
                              <div class="form-group">
                                    <label for="usr"><?php echo @$language['country'];?>&nbsp;<sup class="mandatory">*</sup></label>
                                  <select class="form-control" id="countrys" name="data[country]" onchange="get_cities(this.value,1)">
                                      <option value=""><?php echo @$language['country'];?></option>
                                        <?php foreach($countries as $key=>$value){ ?>
                                          <option value="<?php echo $value['id'];?>"><?php echo $value['country_name'];?></option>
                                      <?php } ?>
                                    </select>
                              </div>
                              <div class="form-group" id="cities">
                                <label for="usr"><?php echo @$language['city'];?> &nbsp;<sup class="mandatory">*</sup></label>
                                <select class="form-control" id="citys" name="data[city]">
                                    <option value=""><?php echo @$language['city'];?></option>              
                                </select>
                            </div>
                            <div class="form-group">
                                      <label><?php echo @$language['mobile_no'];?>&nbsp;<sup class="mandatory">*</sup></label>
                                     <input type="text" maxlength="10" id="mobile1" name="data[mobile_no]" placeholder="<?php echo @$language['mobile_no'];?>"  class="form-control"><span id="errmsg1" class="errmsg"></span>
                              </div>
                              <div class="form-group">
                              <label><?php echo @$language['address'];?>&nbsp;<sup class="mandatory">*</sup></label>
                                    <textarea class="form-control" name="data[address]" placeholder="<?php echo @$language['address'];?> " cols="2" rows="3"></textarea>
                              </div>
                              <div class="form-group">
                              <button class="btn btn-lg btn-primary btn-block sign_btn register_btn custr_btn customer" type="button"><?php echo @$language['register'];?></button>
                              </div>
                            </form>
                              </div>
                       </div>
                       <div class="tab-pane " id="guest">
                           <h4 class="log_head"><?php echo @$language['check_out_as_guest'];?></h4>
                           <div class="checkout_form">
                            <form id="guest_form">
                              <div class="form-group">
                              <label><?php echo @$language['first_name'];?>&nbsp;<sup class="mandatory">*</sup></label>
                                     <input type="text" name="guest[first_name]"  class="form-control">
                              </div>
                              <div class="form-group">
                              <label><?php echo @$language['last_name'];?></label>
                                     <input type="text" name="guest[last_name]"  class="form-control">
                              </div>
                              <div class="form-group">
                              <label><?php echo @$language['email_address'];?>&nbsp;<sup class="mandatory">*</sup></label>
                                     <input type="email" name="guest[email]" id="inputEmail" class="form-control">
                              </div>                             
                              <div class="form-group">
                              <label for="usr"><?php echo @$language['country'];?></label>
                            <select class="form-control" id="countrys" name="guest[country]" onchange="get_cities(this.value,2)">
                                <option value=""><?php echo @$language['country'];?></option>
                                <?php foreach($countries as $key=>$value){ ?>
                                          <option value="<?php echo $value['id'];?>"><?php echo $value['country_name'];?></option>
                                      <?php } ?>                                      
                            </select>
                          </div>
                            <div class="form-group" id="cities_1">
                              <label for="usr"><?php echo @$language['city'];?> &nbsp;<sup class="mandatory">*</sup></label>
                              <select class="form-control" id="cities_list" name="data[city]">
                                  <option value=""><?php echo @$language['city'];?></option>              
                              </select>
                            </div>
                            <div class="form-group">
                              <label><?php echo @$language['mobile_no'];?>&nbsp;<sup class="mandatory">*</sup></label>
                                     <input type="text" id="mobile2" maxlength="10" name="guest[mobile_no]"  class="form-control"><span id="errmsg2" class="errmsg"></span>
                              </div>                              
                              <div class="form-group">
                              <button class="btn btn-lg btn-primary btn-block sign_btn register_btn guest_form" type="button"><?php echo @$language['check_out'];?></button>
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
<script type="text/javascript">
        $("#loginform").validate({       
            rules: {
                "login[email]"   : "required",
                "login[password]"   : "required",
            },
            messages : {
                "login[password]"   : "Please Enter Your Password",
                "login[email]"   : "Please Enter The Registered Email",
            },      
        });

    $('.loginform').click(function(){    
        var validator = $("#loginform").validate();
            validator.form();
            if(validator.form() == true){                 
                var data = new FormData($('#loginform')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>website/check_login",
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
                      if(result=="success")
                      {
                          $("#snackbar").html("Login Success...!");
                          document.getElementById("loginform").reset();                  
                          myFunction();
                          setTimeout(function(){
                           window.location.href="<?php echo base_url();?>website/check_out";
                            }, 1000);                       
                        
                      }
                      else
                      {
                        $("#snackbar").html(result);                
                         myFunction();
                      }
                      
                       
                    }
                });
            }
        });
      </script> 

<script>
   function chek_email(value='',id="")
  {
    if(value != "")
    {
       $.ajax({                
          url: "<?php echo base_url();?>website/chek_email_existence",
          type: "POST",
          data: {value:value},                                     
          success: function(result){
            if(id==1)
            {
              if(result==1)
              {   
                $("#custem_error").html('');               
                $("#custr_btn").removeAttr("disabled");
              }
              else
              {
                $("#custem_error").html(result);  
                $("#custr_btn").attr("disabled","disabled");
              }
              
            }
            else
            {
              if(result==1)
              {
                $("#artistem_error").html('');                         
                $("#arist_btn").removeAttr("disabled");
              }
              else
              {
                $("#artistem_error").html(result);
                $("#arist_btn").attr("disabled","disabled");
              }
            }
            
          }
      });
    }
  }

  function get_cities(value='',id="")
  {
      $.ajax({                
            url: "<?php echo base_url();?>website/get_cities",
            type: "POST",
            data: {value:value},                                     
            success: function(result){
              if(id==1)
              {
                $("#cities").html(result);
              }
              else
              {
                $("#cities_1").html(result);
                $("#sel2").attr("name","guest[city]");
              }
              
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
                "data[password]"   : "required",
                confirm_pwd: {
                    required: true,                    
                    equalTo: "#password"
                }               
            },
            messages : {
                "data[first_name]"   : "Please Enter the First Name",
                "data[email]"   : "Please Enter the Valid Email",                
                "data[last_name]"   : "Please Enter The Last Name",                
                "data[country]"   : "Please Select Country",                              
                "data[city]"   : "Please Select City",                              
                "data[mobile_no]"   : "Please Enter Mobile Number",                              
                "data[password]"   : "Please Enter Password",                              
            },      
        });

    $('.customer').click(function(){ 

        var validator = $("#customer").validate();
            validator.form();
            if(validator.form() == true){                 
                var data = new FormData($('#customer')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>website/check_out_registration",
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
                      if(result=="success")
                      {
                          $("#snackbar").html(result);
                         document.getElementById("customer").reset();                  
                         myFunction();
                         setTimeout(function(){
                           window.location.href="<?php echo base_url();?>website/check_out";
                            }, 1000);
                      }
                      else
                      {
                          $("#snackbar").html(result);
                         document.getElementById("customer").reset();                  
                         myFunction();
                      }
                      
                    }
                });
            }
        });

    $("#guest_form").validate({       
            rules: {
                "guest[first_name]"   : "required",
                "guest[email]"   : "required",                
                "guest[last_name]"   : "required",                
                "guest[country]"   : "required",                
                "guest[city]"   : "required",                
                "guest[mobile_no]"   : "required",                           
            },
            messages : {
                "guest[first_name]"   : "Please Enter the First Name",
                "guest[email]"   : "Please Enter the Valid Email",                
                "guest[last_name]"   : "Please Enter The Last Name",                
                "guest[country]"   : "Please Select Country",                              
                "guest[city]"   : "Please Select City",                              
                "guest[mobile_no]"   : "Please Enter Mobile Number", 
            },      
        });

    $('.guest_form').click(function(){ 

        var validator = $("#guest_form").validate();
            validator.form();
            if(validator.form() == true){                 
                var data = new FormData($('#guest_form')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>website/check_out_as_guest",
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
                      /*$("#snackbar").html(result);
                      document.getElementById("guest").reset();                  
                         myFunction();*/
                         if(result==1)
                         {
                            window.location.href="<?php echo base_url();?>website/check_out";
                         }
                    }
                });
            }
        });
      </script>
<script>

    $(".login").click(function(){
        $("#login").addClass('active');
  $("#login").siblings().removeClass('active');
    
});
   $(".register").click(function(){
       $("#register").addClass('active');
  $("#register").siblings().removeClass('active');
    
});
   $(".guest").click(function(){
        $("#guest").addClass('active');
  $("#guest").siblings().removeClass('active');
   
});

   $(document).ready(function () {
  //called when key is pressed in textbox
  $("#mobile1").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg1").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

   $(document).ready(function () {
  //called when key is pressed in textbox
  $("#mobile2").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg2").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
</script>
