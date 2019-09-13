<style>
    #insert_brand label.error {
        color:red; 
    }
    #insert_brand input.error,textarea.error,select.error {
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
            <h4 class="modal-title" align="center">Add / Edit Design</h4>
        </div>
        <div class="modal-body">
            <form id="insert_brand">  
                
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Design Name En</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[design_name_en]" value="<?php echo @$value['design_name_en']?>" placeholder="Enter Brand Name En" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Design Name Ar</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[design_name_ar]" value="<?php echo @$value['design_name_ar']?>" placeholder="Enter Brand Name Ar" >
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
                    </div>
                </div>
             
               
                <input type="hidden" name="data[design_id]" value="<?php echo @$design_id; ?>">    
                <input type="hidden" name="data[pname]" value="<?php echo @$pname; ?>">    
            </form> 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_brand">Save changes</button>
        </div>
    </div>
</div>

<script>
$("#insert_brand").validate({       
            rules: {   
               
                "data[design_name_en]"        : "required",
                "data[design_name_ar]"        : "required",
               
            },
            messages : {
                              
            },      
        });
    $('.insert_brand').click(function(){    
        var validator = $("#insert_brand").validate();
            validator.form();
            if(validator.form() == true){
                 $('.insert_brand').html("<img src='<?php echo base_url()?>assets/images/ajax-loaderr.gif' style='width:20px; height:15px;'>"); 
                  var data = new FormData($('#insert_brand')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_design",
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