<style>
    #insert_category label.error {
        color:red; 
    }
    #insert_category input.error,textarea.error,select.error {
        border:1px solid red;
        color:red; 
    }
    .popover {
    z-index: 2000;
    position:relative;
    }    
</style>
<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Add / Sub-User</h4>
        </div>
      <div class="modal-body">
            <form id="insert_category">                
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">First Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[first_name]" value="<?php echo @$value['first_name']?>" placeholder="Enter First Name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[last_name]" value="<?php echo @$value['last_name']?>" placeholder="Enter Last Name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[email]" value="<?php echo @$value['email']?>" placeholder="Enter Email ID"  onkeyup="chek_email(this.value)">
                    </div>
                    <span id="custem_error" style="color: red"></span>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Mobile</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[mobile_no]" value="<?php echo @$value['mobile_no']?>" placeholder="Enter Mobile Number" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="addimage" >
                    </div>
                </div>
                <?php if(@$value['user_id']!=''){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">
                        <img src="<?php echo base_url().$value['user_image']?>" width="100px" height="100px" style="background-color:gray;" >
                    </div>
                </div>
                <?php } ?>
                <?php if(@$value['user_id']==''){ ?>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Password</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="password" type="password" name="data[password]" value="<?php echo @$value['password']?>" placeholder="Enter Password" >
                        <input type="hidden" name="data[auth_level]" value="8">
                        <input type="hidden" name="data[role]" value="subuser">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Confirm Password</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="password" name="confirm_password" value="" placeholder="Enter Confirm Password" >
                    </div>
                </div>
            <?php } ?>
                <label for="example-tel-input" class="col-xs-12 col-form-label form-control-label">Permissions</label>
                <div class="form-group row">
                    <div class="col-sm-2">
                        categories<input class="form-control" type="checkbox" name="permissions[]" value="1" <?php if(@in_array(1,$permissions)){ echo "checked";}?>>                         
                    </div><div class="col-sm-2">
                        Sub-Categories<input class="form-control" type="checkbox" name="permissions[]" value="2" <?php if(@in_array(2,$permissions)){ echo "checked";}?>>                         
                    </div><div class="col-sm-1">
                        Colors<input class="form-control" type="checkbox" name="permissions[]" value="3" <?php if(@in_array(3,$permissions)){ echo "checked";}?>>                         
                    </div><div class="col-sm-1">
                        Sizes<input class="form-control" type="checkbox" name="permissions[]" value="4" <?php if(@in_array(4,$permissions)){ echo "checked";}?>>                         
                    </div><div class="col-sm-2">
                        Products<input class="form-control" type="checkbox" name="permissions[]" value="5" <?php if(@in_array(5,$permissions)){ echo "checked";}?>>                         
                    </div><div class="col-sm-1">
                        Designs<input class="form-control" type="checkbox" name="permissions[]" value="6" <?php if(@in_array(6,$permissions)){ echo "checked";}?>>                         
                    </div><div class="col-sm-1">
                        Users<input class="form-control" type="checkbox" name="permissions[]" value="7" <?php if(@in_array(7,$permissions)){ echo "checked";}?>>                         
                    </div><div class="col-sm-2">
                        Website<input class="form-control" type="checkbox" name="permissions[]" value="8" <?php if(@in_array(8,$permissions)){ echo "checked";}?>>                         
                    </div>
                </div>                 
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Status</label>
                    <div class="col-sm-9">
                        <select name="data[status]" class="form-control">
                            <?php 
                            if($value['status'] !='')
                            {
                                if($value['status'] ==1)
                                {
                                echo '<option value="1">Active</option>
                                     <option value="0">DeActive</option>';
                                }
                                else
                                {
                                  echo '<option value="0">DeActive</option>
                                          <option value="1">Active</option>';
                                }
                            }
                            else
                            {
                                echo '<option value="1">Active</option>
                                <option value="0">DeActive</option>';
                            }
                            ?>
                       
                        </select>                      
                    </div>
                </div>
                <input type="hidden" name="old_image" value="<?php echo @$value['user_image']; ?>">               
                <input type="hidden" name="data[user_id]" value="<?php echo @$user_id; ?>">
            </form> 
        </div>
        <div class="modal-footer">
            <button type="button" id="custr_btn" class="btn btn-primary waves-effect waves-light insert_category">Save changes</button>
        </div>
    </div>
</div>

<script>

  function chek_email(value)
  {
    if(value!="")
    {
        $.ajax({                
          url: "<?php echo base_url();?>website/chek_email_existence",
          type: "POST",
          data: {value:value},                                     
          success: function(result)
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
      });
    }    
  }
$("#insert_category").validate({       
            rules: {               
                <?php if($user_id=='') { ?>
                     "data[password]"   : "required",                
                "confirm_password"   : {
                    required:true,
                    equalTo:"#password",
                },                   
                <?php } ?>
                "data[first_name]"   : "required",
                "data[last_name]"   : "required",                
                "data[mobile_no]"   : "required",                
                "data[email]"   : "required",
                'permissions[]':"required",

            },
            messages : {
                              
            },      
        });

    $('.insert_category').click(function(){ 
        var validator = $("#insert_category").validate();
            validator.form();
            if(validator.form() == true){
                 $('.insert_category').html("<img src='<?php echo base_url()?>assets/images/ajax-loaderr.gif' style='width:10px; height:20px;'>"); 
                  var data = new FormData($('#insert_category')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_sub_user",
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
                        var obj = jQuery.parseJSON(result);
                        if (obj.status == "success") {
                            location.reload();
                        } 
                    }
                });
            }
        });
   
</script>