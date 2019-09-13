<style>
    #insert_faq_web label.error {
        color:red; 
    }
    #insert_faq_web input.error,textarea.error,select.error {
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
            <h4 class="modal-title" align="center">Add / Edit FAQ</h4>
        </div>
        <div class="modal-body">
            <form id="insert_faq_web">                         
                 <!--<div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="addimage" >
                    </div>
                </div>-->
               
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Question </label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[question]" value="<?php echo @$value['question']?>" placeholder="Enter Question" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Answer</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[answer]" value="<?php echo @$value['answer']?>" placeholder="Enter Answer" >
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Currency Code</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[currency_code]" value="<?php echo @$value['currency_code']?>" placeholder="Enter Currency Code" >
                    </div>
                </div>-->
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
                                  echo '  <option value="0">DeActive</option>
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
                       <!-- <input class="form-control" type="text" name="data[cat_name_ar]" value="<?php //echo @$value['status']?>" placeholder="Enter Category Name" >-->
                    </div>
                </div>
                 
                 <input type="hidden" name="data[faq_id]" value="<?php echo @$value[0]['faq_id']; ?>"> 
                            
               <!-- <input type="hidden" name="old_image" value="<?php // echo @$value['cat_image']; ?>">
                <input type="hidden" name="data[cat_id]" value="<?php //echo @$cat_id; ?>">    
                <input type="hidden" name="data[pname]" value="<?php //echo @$pname; ?>">    -->
            </form> 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_faq_web">Save changes</button>
        </div>
    </div>
</div>

<script>
$("#insert_faq_web").validate({       
            rules: {               
               
                "data[quetsion]"        : "required",
                "data[answer]"        : "required",
               
               
            },
            messages : {
                              
            },      
        });
    $('.insert_faq_web').click(function(){    
        var validator = $("#insert_faq_web").validate();
            validator.form();
            if(validator.form() == true){
                 $('.insert_faq_web').html("<img src='<?php echo base_url()?>assets/images/ajax-loaderr.gif' style='width:20px; height:15px;'>"); 
                  var data = new FormData($('#insert_faq_web')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_faq_web",
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