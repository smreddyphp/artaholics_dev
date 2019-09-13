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
            <h4 class="modal-title" align="center">Add / Edit Category</h4>
        </div>
      <div class="modal-body">
            <form id="insert_category">                
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Category En</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[category_name_en]" value="<?php echo @$value['category_name_en']?>" placeholder="Enter Category Name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Category Ar</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[category_name_ar]" value="<?php echo @$value['category_name_ar']?>" placeholder="Enter Category Name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="addimage" >
                    </div>
                </div>
                <?php if(@$value['cat_id']!=''){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">
                        <img src="<?php echo base_url().$value['image']?>" width="100px" height="100px" style="background-color:gray;" >
                    </div>
                </div>
                <?php } ?>                 
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
                <input type="hidden" name="old_image" value="<?php echo @$value['image']; ?>">               
                <input type="hidden" name="data[cat_id]" value="<?php echo @$cat_id; ?>">    
                <input type="hidden" name="data[pname]" value="<?php echo @$pname; ?>">    
            </form> 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_category">Save changes</button>
        </div>
    </div>
</div>

<script>
$("#insert_category").validate({       
            rules: {               
                <?php if($cat_id=='') { ?>
                    "addimage"           : "required",
                <?php } ?>
                "data[category_name_en]"   : "required",
                "data[category_name_ar]"   : "required",                
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
                    url: "<?php echo base_url();?>admin/save_category",
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