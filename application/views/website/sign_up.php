<style>
    .address_textarea{
        height:100px !important;
    }
    .terms_check{
        padding-top:25px;
    }
    .errmsg
{
color: red;
}
</style>
<div class="page_strip">
    <div class="container">
        <div class="row">
            <div class="strip_box">
                <p><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp;- &nbsp; <?php echo @$language['sign_up'];?></p>
            </div>
        </div>
    </div>
</div>
<!----------===============checkout_section===============---------->
<section class="signup_section">
    <div class="container">
        <h3 class="main_heading"><?php echo @$language['sign_up'];?></h3>
        <div class="row sign_up_form">
             <ul class="nav nav-tabs signup_tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active signup_a" data-toggle="tab" href="#Customer"><span class="user_icon"><i class="fa fa-users" aria-hidden="true"></i></span><span class="user_tag"><?php echo @$language['as_a_customer'];?></span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link signup_a" data-toggle="tab" href="#Artist"><span class="user_icon"><i class="fa fa-user-secret" aria-hidden="true"></i></span><span class="user_tag"><?php echo @$language['as_an_artist'];?></span></a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content signup_content">
    <div id="Customer" class="container tab-pane active">
     <div class="register_box">
         <div class="register_card">
          <form method="post" action="" id="customer" enctype="multipart/form-data">
            <div class="form-group wid_50 first_n">
              <label for="usr"><?php echo @$language['first_name'];?>&nbsp;<sup class="mandatory">*</sup> </label>
              <input type="text" name="data[first_name]" class="form-control" placeholder="<?php echo @$language['first_name'];?>">
            </div>
            <div class="form-group wid_50 last_n">
              <label for="usr"><?php echo @$language['last_name'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="text"  name="data[last_name]" class="form-control" placeholder="<?php echo @$language['last_name'];?>">
            </div>
            <div class="form-group">
              <label for="usr"><?php echo @$language['email'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="email" name="data[email]" class="form-control" placeholder="<?php echo @$language['email'];?>"  onkeyup="chek_email(this.value,1)">
              <span id="custem_error" style="color: red"></span>
            </div>
            <div class="form-group">
              <label for="usr"><?php echo @$language['mobile_no'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="text" id="mobile" maxlength="10" name="data[mobile_no]" class="form-control" placeholder="<?php echo @$language['mobile_no'];?>"><span id="errmsg1" class="errmsg"></span>
            </div>
            <input type="hidden" name="data[role]" value="customer">
            <input type="hidden" name="data[auth_level]" value="3">
            <input type="hidden" name="data[status]" value="1">
            <div class="form-group wid_50 first_n">
                <label for="usr"><?php echo @$language['country'];?> &nbsp;<sup class="mandatory">*</sup></label>
              <select class="form-control" id="countrys" name="data[country]" onchange="get_cities(this.value,1)">
                  <option value=""><?php echo @$language['select_country'];?></option>
                  <?php foreach($countries as $key=>$value){ ?>
                      <option value="<?php echo $value['id'];?>"><?php echo $value['country_name'];?></option>
                  <?php } ?>
                  </select>
            </div>
            <div class="form-group wid_50 last_n" id="cities">
              <label for="usr"><?php echo @$language['city'];?> &nbsp;<sup class="mandatory">*</sup></label>
              <select class="form-control" id="citys" name="data[city]">
                  <option value=""><?php echo @$language['select_city'];?></option>              
              </select>
          </div>
          <div class="form-group">
            <label for="usr"><?php echo @$language['password'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <input type="password"  name="data[password]" id="password" class="form-control" placeholder="<?php echo @$language['password'];?>">
          </div>
          <div class="form-group">
            <label for="usr"><?php echo @$language['password_confirmation'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <input type="password"  name="confirm_pwd" class="form-control" placeholder="<?php echo @$language['password_confirmation'];?>">
          </div>
          <div class="form-group">
            <label for="usr"><?php echo @$language['address'];?>&nbsp;</label>
            <textarea class="form-control address_textarea" name="data[address]" placeholder="<?php echo @$language['address'];?>"></textarea>
          </div>
          <div class="form-group">
              <div class="row">
                  <div class="col-md-6">
            <div class="form-check terms_check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value=""><span class="t_c" data-toggle="modal" data-target="#signup_terms"><?php echo @$language['a_accept_terms'];?></span>
              </label>
            </div>
            </div>
                  <div class="col-md-6">
            <button type="button" id="custr_btn" class="btn btn-success shop_btn shop_artist_btn mb-5 save_form customer"> <?php echo @$language['submit'];?> </button>
            </div>
            </div>
          </div>
        </div>
        <div class="register_img">
            <div class="user_img">
                <img src="<?php echo base_url();?>assets/website/images/dummy-image.jpg" alt="Choosen file" class="img-upload-result">
            </div>
            <div class="upload_btn">                
              <div class="image-upload">
  								<label for="file-input"> <img src="<?php echo base_url();?>assets/website//images/upload_img.png" width="70%" /> </label>
  								<input id="file-input" name="image" type="file" onchange="readURL(this);"/>
              </div>
            </div>
        </div>
        </form>
     </div>
    </div>
    <div id="Artist" class="container tab-pane">
     <div class="register_box">
         <div class="register_card">
          <form method="post" action="" id="artist" enctype="multipart/form-data">
            <div class="form-group wid_50 first_n">
              <label for="usr"><?php echo @$language['first_name'];?>&nbsp;<sup class="mandatory">*</sup> </label>
              <input type="text" name="data[first_name]" class="form-control" placeholder="<?php echo @$language['first_name'];?>">
            </div>
            <div class="form-group wid_50 last_n">
              <label for="usr"><?php echo @$language['last_name'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="text"  name="data[last_name]" class="form-control" placeholder="<?php echo @$language['last_name'];?>">
            </div>
            <input type="hidden" name="data[role]" value="artist">
            <input type="hidden" name="data[auth_level]" value="6">
            <div class="form-group">
              <label for="usr"><?php echo @$language['email'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="email" name="data[email]" class="form-control" placeholder="<?php echo @$language['email'];?>" onkeyup="chek_email(this.value,2)">
              <span id="artistem_error" style="color: red"></span>
            </div>
             <div class="form-group">
              <label for="usr"><?php echo @$language['mobile_no'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="text" id="mobile1"  maxlength="10" name="data[mobile_no]" class="form-control" placeholder="<?php echo @$language['mobile_no'];?>"><span id="errmsg" class="errmsg"></span>
            </div>
             <div class="form-group wid_50 first_n">
                <label for="usr"><?php echo @$language['country'];?> &nbsp;<sup class="mandatory">*</sup></label>
              <select class="form-control" id="countrys" name="data[country]" onchange="get_cities(this.value,2)">
                  <option value=""><?php echo @$language['select_country'];?></option>
                  <?php foreach($countries as $key=>$value){ ?>
                      <option value="<?php echo $value['id'];?>"><?php echo $value['country_name'];?></option>
                  <?php } ?>
                  </select>
            </div>
            <div class="form-group wid_50 last_n" id="cities_1">
              <label for="usr"><?php echo @$language['city'];?> &nbsp;<sup class="mandatory">*</sup></label>
              <select class="form-control" id="citys" name="data[city]">
                  <option value=""><?php echo @$language['select_city'];?></option>              
              </select>
          </div>
          <div class="form-group">
            <label for="usr"><?php echo @$language['password'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <input type="password"  name="data[password]" id="a_password" class="form-control" placeholder="<?php echo @$language['password'];?>">
          </div>
          <div class="form-group">
            <label for="usr"><?php echo @$language['password_confirmation'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <input type="password"  name="confirm_pwd" class="form-control" placeholder="<?php echo @$language['password_confirmation'];?>">
          </div>
          <div class="form-group">
            <label for="usr"><?php echo @$language['address'];?>&nbsp;<sup class="mandatory">*</sup></label>
            <textarea class="form-control address_textarea" name="data[address]" placeholder="<?php echo @$language['address'];?>"></textarea>
          </div>
          <div class="form-group">
              <div class="row">
                  <div class="col-md-6">
            <div class="form-check terms_check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value=""><span class="t_c" data-toggle="modal" data-target="#signupartist_terms"><?php echo @$language['a_accept_terms'];?></span>
              </label>
            </div>
            </div>
                  <div class="col-md-6">
                  <button type="button" id="arist_btn" class="btn btn-success shop_btn shop_artist_btn mb-5 save_form artist"> <?php echo @$language['submit'];?> </button>
                  </div>
            </div>
          </div>

        </div>
        <div class="register_img">
            <div class="user_img">
                <img src="<?php echo base_url();?>assets/website/images/dummy-image.jpg" alt="Choosen file" class="img-upload-result">
            </div>
            <div class="upload_btn">                
            <div class="image-upload">
                <label for="file-input"> <img src="<?php echo base_url();?>assets/images/upload_img.png" width="70%" /> </label>
                <input id="file-input" name="image" type="file" onchange="readURL(this);" /> </div>
            </div>
        </div>
        </form>
     </div>
    </div>
  </div>
        </div>
    </div>
</section>
<div id="snackbar">Some text some message..</div>
<div class="modal modalbg"  id="signup_terms">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Terms &amp; Conditions</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <?php echo $terms_and_conditions["user_terms_".lang];?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success shop_btn agree_btn" data-dismiss="modal">Agree terms and conditions</button>
      </div>

    </div>
  </div>
</div>
<div class="modal modalbg" id="signupartist_terms">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Terms &amp; Conditions</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php echo $terms_and_conditions["artist_terms_".lang];?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success shop_btn agree_btn" data-dismiss="modal">Agree terms and conditions</button>
      </div>

    </div>
  </div>
</div>
 <script type="text/javascript">

  function chek_email(value='',id="")
  {
    if(value != ""){
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
                    success: function(result)
                    {
                      $("#snackbar").html(result);
                      document.getElementById("customer").reset();                  
                         myFunction();
                    }
                });
            }
        });
      </script>

      <script type="text/javascript">
        $("#artist").validate({       
            rules: {
                "data[first_name]"   : "required",
                "data[email]"   : "required",                
                "data[last_name]"   : "required",                
                "data[country]"   : "required",                
                "data[city]"   : "required",                
                "data[mobile_no]"   : "required",                
                "data[address]"   : "required",                
                "data[password]"   : "required",
                confirm_pwd: {
                    required: true,                    
                    equalTo: "#a_password"
                }               
            },
            messages : {
                "data[first_name]"   : "Please Enter the First Name",
                "data[email]"   : "Please Enter the Valid Email",                
                "data[last_name]"   : "Please Enter The Last Name",                
                "data[country]"   : "Please Select Country",                              
                "data[city]"   : "Please Select City",                              
                "data[mobile_no]"   : "Please Select City",                              
                "data[address]"   : "Please Enter Current Address",                              
                "data[password]"   : "Please Enter Password",                              
            },      
        });

    $('.artist').click(function(){ 

        var validator = $("#artist").validate();
            validator.form();
            if(validator.form() == true){                 
                var data = new FormData($('#artist')[0]);   
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
                      document.getElementById("artist").reset();                  
                         myFunction();
                    }
                });
            }
        });

    $(document).ready(function () {
  //called when key is pressed in textbox
  $("#mobile1").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

 $(document).ready(function () {
  //called when key is pressed in textbox
  $("#mobile").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg1").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
      </script>
