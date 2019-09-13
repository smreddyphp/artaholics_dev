<style type="text/css">
  .ch{
        width: -webkit-fill-available;
  }
  .next_btn{
      float: right;
    color: #fff;
    margin-bottom:15px;
  }
  .next_btn:hover{
    color: #fff;
  }
  .hide{
      display:none;
  }
  .ch{
      width:fit-content;
      float:right;
      background-color:#2A7BBC;
      border-color:#2A7BBC;
  }
  .ch:hover{
      background-color:#2A7BBC;
      border-color:#2A7BBC;
  }
  #Summary{
      padding:15px;
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
                <p><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp;- &nbsp; <?php echo @$language['check_out'];?></p>
            </div>
        </div>
    </div>
</div>


<!----------===============checkout_section===============---------->
<section class="checkout_section">
    <div class="container">
        <h3 class="main_heading"><?php echo @$language['shiping_details'];?></h3>
        <div class="row">
            <div class="check_out">               
                <div class="checkout_fill">
                    <div id="accordion">
<div class="info_card">
  <div class="card">
    <div class="card-header">
      <a class="card-link your_head collapsed">
        <?php echo @$language['step_one'];?> : <?php echo @$language['your_info'];?>
      </a>
    </div>
    <div id="your" class="collapse show" data-parent="#accordion">
      <div class="card-body">
        <div class="register_card">          
            <div class="form-group wid_50 first_n">
              <label for="usr"><?php echo @$language['first_name'];?>&nbsp;<sup class="mandatory">*</sup> </label>
              <input type="text" class="form-control" name="" placeholder="First Name" value="<?php echo (@$user['first_name'])?@$user['first_name']:@$guest['first_name'];?>" disabled>
            </div>
            <div class="form-group wid_50 last_n">
              <label for="usr"><?php echo @$language['last_name'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="text" class="form-control" name="" placeholder="Last Name"  value="<?php echo (@$user['last_name'])?@$user['last_name']:@$guest['last_name'];?>" disabled>
            </div>
            <div class="form-group">
              <label for="usr"><?php echo @$language['email'];?>&nbsp;<sup class="mandatory">*</sup></label>
              <input type="email" class="form-control" name="" placeholder="Email Id"  value="<?php echo (@$user['email'])?@$user['email']:@$guest['email'];?>" disabled>
            </div>
            <div class="form-group">
                <label for="usr"><?php echo @$language['mobile_no'];?>&nbsp;<sup class="mandatory">*</sup></label>              
              <input type="text" class="form-control" name="" placeholder="Mobile Number"  value="<?php echo (@$user['mobile_no'])?@$user['mobile_no']:@$guest['mobile_no'];?>" disabled>
            </div>

        </div>
      </div>
    </div>
    </div>
                <div class="form-group">
                <button type="button" class="btn btn-warning step1_btn next_btn"><?php echo @$language['next'];?></button>
            </div>
</div>
    <div class="address_card hide">
	  <div class="card">
      <form id="checkout">
	    <div class="card-header">
	      <a class="card-link ship_head collapsed">
	        <?php echo @$language['step_two'];?> : <?php echo @$language['shiping_address'];?>
	      </a>
	    </div>
	    <div id="Shipping" class="collapse show" data-parent="#accordion">
	      <div class="card-body">
	        
	        <div class="register_card">
	            <div class="form-group wid_50 first_n">
	              <label for="usr"><?php echo @$language['first_name'];?>&nbsp;<sup class="mandatory">*</sup> </label>
	              <input type="text" name="data[first_name]" class="form-control" placeholder="<?php echo @$language['first_name'];?>"  value="<?php echo (@$user['first_name'])?@$user['first_name']:@$guest['first_name'];?>">
	            </div>
	            <div class="form-group wid_50 last_n">
	              <label for="usr"><?php echo @$language['last_name'];?> &nbsp;<sup class="mandatory">*</sup></label>
	              <input type="text" name="data[last_name]" class="form-control" placeholder="<?php echo @$language['last_name'];?>"  value="<?php echo (@$user['last_name'])?@$user['last_name']:@$guest['last_name'];?>">
	            </div>
	            <div class="form-group">
	              <label for="usr"><?php echo @$language['street_name'];?>&nbsp;<sup class="mandatory">*</sup></label>
	              <input type="text" name="data[street_name]" class="form-control" placeholder="<?php echo @$language['street_name'];?>">
	            </div>
	            <div class="form-group wid_50 first_n">
	              <label for="usr"><?php echo @$language['mobile_no'];?> &nbsp;<sup class="mandatory">*</sup> </label>
	              <input type="text" maxlength="10" id="mobile1" name="data[mobile_no]" class="form-control" placeholder="<?php echo @$language['mobile_no'];?>" value="<?php echo (@$user['mobile_no'])?@$user['mobile_no']:@$guest['mobile_no'];?>"><span id="errmsg1" class="errmsg"></span>
	            </div>
	            <div class="form-group wid_50 last_n">
	              <label for="usr"><?php echo @$language['postal_code'];?> </label>
	              <input type="text" maxlength="6" id="postal" name="data[postal_code]" class="form-control" placeholder="<?php echo @$language['postal_code'];?>"><span id="errmsg2" class="errmsg"></span>
	            </div>
	            <div class="form-group wid_50 first_n">
	              <label for="usr"><?php echo @$language['country'];?> &nbsp;<sup class="mandatory">*</sup></label>
	                    <select class="form-control" id="countrys" name="data[country]" onchange="get_cities(this.value,1)">
	                        <option value=""><?php echo @$language['country'];?></option>
	                        <?php foreach($countries as $key=>$value){ ?>
	                                  <option value="<?php echo $value['id'];?>"><?php echo $value['country_name'];?></option>
	                              <?php } ?>                                      
	                    </select>
	            </div>
	            <div class="form-group wid_50 last_n" id="cities">
	                <label for="usr"><?php echo @$language['city'];?> &nbsp;<sup class="mandatory">*</sup></label>
	                  <select class="form-control" id="country" name="data[city]">
	                      <option value=""><?php echo @$language['city'];?></option>
	                  </select>
	            </div>
	        </div>        
	      </div>
	    </div>
	  </div>
	          	            <div class="form-group">
                <button type="button" id="next" class="btn btn-warning step2_btn next_btn "><?php echo @$language['next'];?></button>
            </div>
            </form>
            </div>
            <div class="summary_card hide">
  <div class="card">
    <div class="card-header second_cheader">
      <a class="card-link summary_head collapsed">
        <?php echo @$language['order_summary'];?>
      </a>
    </div>
    <div id="Summary" class="collapse show">
      <div class="card-body">
         <?php
          foreach($cartitems as $item){ ?>   
      <div class="row order_summary">
          <div class="col-md-3">
              <div class="order_summary_img">
                  <img src="<?php echo base_url().@$item['image'];?>">
              </div>
          </div>
          <div class="col-md-4">
              <div class="cart_info order_summary_cart">
                     <h6>mens new product</h6> 
                     <p><?php echo @$this->common_m->get_color($item["options"]['Color'])['color_'.lang]; ?><span class="cart_item_color dot" style="background-color: <?php echo @$this->common_m->get_color($item["options"]['Color'])['color_code']; ?>;"></span></p>
                     <p><?php echo @$this->common_m->get_sizes($item["options"]['Size'])['size']; ?></p>                     
                   </div>
                   </div>
                    <div class="col-md-2">
              <div class="cart_info order_summary_cart">
                     <p><?php echo @$item["qty"]; ?></p>                     
                   </div>
                   </div>
                   <div class="col-md-3">
              <div class="cart_info order_summary_cart">
                     <h6><?php echo @$item["price"].' SAR'; ?></h6> 
                   </div>
                   </div>
      </div>
    <?php } ?>
      </div>
    </div>
  </div>
      <div class="form-group">
    <button type="button" class="btn btn-success checkout ch"> <?php echo @$language['place_order'];?></button>
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

        $("#checkout").validate({       
            rules: {                
                "data[first_name]" :"required",
                "data[last_name]" :"required",
                "data[street_name]" :"required",
                "data[mobile_no]" :"required",
                "data[postal_code]" :"required",
                "data[country]" :"required",
                "data[city]" :"required",
            },
            messages : {
                 "data[first_name]"   : "Please Enter First Name",
                "data[email]"   : "Please Enter Email",                
                "data[last_name]"   : "Please Enter Last Name",                
                "data[mobile_no]"   : "Please Enter Mobile Number",            
                "data[street_name]" :"Please Enter Street Name",               
                "data[postal_code]" :"required",
                "data[country]" :"required",
                "data[city]" :"required",                           
            },      
        });



    $('.checkout').click(function(){    
        var validator = $("#checkout").validate();
            validator.form();
            if(validator.form() == true)
            {                 
                var data = new FormData($('#checkout')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>website/order_confirm",
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
                      document.getElementById("checkout").reset();                  
                         myFunction();
                        /* setTimeout(function(){
                           window.location.href="<?php echo (@$this->session->userdata('userdata'))?base_url().'website/orders':base_url().'website/';?>";
                            }, 1000);*/
                             setTimeout(function(){
                           window.location.href="<?php echo base_url().'website';?>";
                            }, 2000);

                       
                    }
                });
            }
        });

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
      </script> 
      <script>
          $(function() {
    $('.step1_btn').click( function() {
        $('.info_card').addClass('hide');
        $('.address_card').removeClass('hide');
        
    });
});
          $(function() {
    $('.step2_btn').click( function() {
          var validator = $("#checkout").validate();
            validator.form();
            if(validator.form() == true)
            {
              $('.address_card').addClass('hide');
              $('.summary_card').removeClass('hide');
            }

       
        
        
    });
});

          $(document).ready(function () {
  //called when key is pressed in textbox
  $("#postal").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg2").html("Postal Code Allowed Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});


          $(document).ready(function () {
  //called when key is pressed in textbox
  $("#mobile1").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg1").html("Mobile Number Allowed Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});


      </script>
