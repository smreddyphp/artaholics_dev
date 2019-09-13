<style>
    #insert_product_type label.error {
        color:red; 
    }
    #insert_product_type input.error,textarea.error,select.error {
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
            <h4 class="modal-title" align="center">Add / Edit Gender</h4>
        </div>
        <div class="modal-body">
            <form id="insert_product_type">  
                
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Product Type En</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[product_type_en]" value="<?php echo @$value['product_type_en']?>" placeholder="Enter Product Type En" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Product Type En</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[product_type_ar]" value="<?php echo @$value['product_type_ar']?>" placeholder="Enter Product Type Ar" >
                    </div>
                </div>
               <!-- <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Category Type</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[cat_type]" value="<?php //echo @$value['cat_type']?>" placeholder="Enter Category Type" >
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
                       <!-- <input class="form-control" type="text" name="data[content_ar]" value="<?php //echo @$value['status']?>" placeholder="Enter Category Name" >-->
                    </div>
                </div>
                 
                
             
               
                <input type="hidden" name="data[type_id]" value="<?php echo @$type_id; ?>">    
                <input type="hidden" name="data[pname]" value="<?php echo @$pname; ?>">    
            </form> 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_product_type">Save changes</button>
        </div>
    </div>
</div>

<script>
$("#insert_product_type").validate({       
            rules: {               
               
                "data[product_type_en]"        : "required",
                "data[product_type_ar]"        : "required",
               
            },
            messages : {
                              
            },      
        });
    $('.insert_product_type').click(function(){    
        var validator = $("#insert_product_type").validate();
            validator.form();
            if(validator.form() == true){
                 $('.insert_product_type').html("<img src='<?php echo base_url()?>assets/images/ajax-loaderr.gif' style='width:20px; height:15px;'>"); 
                  var data = new FormData($('#insert_product_type')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_product_type",
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