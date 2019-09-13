<div class="page_strip">
    <div class="container">
        <div class="row">
            <div class="strip_box">
                <p><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp; - &nbsp; <?php echo @$language['login'];?> </p>
            </div>
        </div>
    </div>
</div>
<div id="myLogin">
  <div class="overlay-content login_content">
      <div class="login_form" >
          <h1 class="h3 mb-3 font-weight-normal login_head"><?php echo @$language['login'];?></h1>
          <form class="form-signin" id="login" method="post" action="">
              <div class="form-group ">
                <label for="usr"><?php echo @$language['email_address'];?></label>
                <input type="email" name="data[email]" id="inputEmail" class="form-control">
              </div>
              <div class="form-group password_input">
                <label for="pwd"><?php echo @$language['password'];?></label>
                <input type="password" name="data[password]" id="inputPassword" class="form-control">
              </div>
              <div class="checkbox mb-3">
                <span class="frgt_pwd"><a class="forgot_pwd" data-toggle="modal" data-target="#myPassword"><?php echo @$language['forgot_password'];?></a></span>
              </div>
        
      <button class="btn btn-lg btn-primary btn-block sign_btn login" type="button"><?php echo @$language['log_me_in'];?></button>
     <p class="not_member"><?php echo @$language['not_a_member'];?>&nbsp;<a  href="<?php echo base_url();?>website/sign_up"><span ><?php echo @$language['sign_up'];?></span></a></p> 
      
    </form>
      </div>
       <div class="modal" id="myPassword">
          <div class="modal-dialog">
            <form id="forgot_pwd">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Recovery Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
                <span id="msg" style="color:green;float: center"></span>
              <!-- Modal body -->
              <div class="modal-body">
                <div class="form-group ">
                    <label>Email Address</label>
                    <input type="email" id="inputEmail2" name="forgot[email]" class="form-control" required="">
                  </div>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger forgot_pwd">Recover Password</button>
              </div>
            </div>
          </form>
          </div>
</div>
<!--                <div class="">-->
<!--                           <div class="form-inline form_checkout">-->
<!--                   <a href="checkout.php"><button class="btn btn-success add_btn check_btn">CheckOut</button></a>-->
<!--</div>-->
<!--                       </div>-->
  </div>
</div>

<div id="snackbar"></div>
<script type="text/javascript">

  $("#forgot_pwd").validate({
            ignore: [],
             rules: {                        
                        
                        "forgot[email]"       : "required",
                        
                    },
           messages:{                        
                      
                        "forgot[email]"       : "Please Enter Your Registered Email",
                     
                    }

    });

$('.forgot_pwd').click(function(e)
{
    $(".message").html('') ;    
    var validator = $("#forgot_pwd").validate();

    validator.form();

    if(validator.form()==true)
    {     
         var formdata = new FormData($('#forgot_pwd')[0]);
         $.ajax({
            url: "<?php echo base_url();?>website/forgot_password",
            type: "POST",
            data: formdata,
            dataType: 'text',
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            error:function(request,response)
            {
                console.log(request);
            },
            success: function(result)
            {              
                  $("#msg").html(result);
                  //myFunction();  
                  setTimeout(function(){ location.reload();  }, 2000);                
                            
              
            }

        });
   }

 });
        $("#login").validate({       
            rules: {
                "data[email]"   : "required",
                "data[password]"   : "required",
            },
            messages : {
                "data[password]"   : "Please Enter Your Password",
                "data[email]"   : "Please Enter The Registered Email",
            },      
        });

    $('.login').click(function(){    
        var validator = $("#login").validate();
            validator.form();
            if(validator.form() == true){                 
                var data = new FormData($('#login')[0]);   
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
                         document.getElementById("login").reset();                  
                         myFunction();
                         window.location.href = "<?php if($this->session->userdata('last_page')){ echo $this->session->userdata('last_page'); }else{ echo base_url(); }?>";
                      }
                      else
                      {
                        $("#snackbar").html(result);
                      //document.getElementById("login").reset();                  
                         myFunction();
                      }
                      
                       
                    }
                });
            }
        });
</script> 

<script>
    function forgotPassword() {
  var x = document.getElementById("myPassword");
  if (x.style.display === "block") {
    x.style.display = "none";
    
  } else {
    x.style.display = "block";
  }
}
</script>