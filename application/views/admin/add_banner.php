<style>
    #insert_ads label.error {
        color:red; 
    }
    #insert_ads input.error,textarea.error,select.error {
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
            <h4 class="modal-title" align="center">Add / Edit Banner</h4>
        </div>
        <div class="modal-body">
            <form id="insert_ads">                         
                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="addimage" >
                    </div>
                </div>
                <?php if(@$value['banner_id']!=''){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">
                        <img src="<?php echo base_url().$value['banner_image']?>" width="100px" height="100px" style="background-color:gray;" >
                    </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Banner Content En</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[content_en]" value="<?php echo @$value['content_en']?>" placeholder="Enter Content" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Banner Content Ar</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[content_ar]" value="<?php echo @$value['content_ar']?>" placeholder="Enter Content" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Banner Sub-Content En</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[sub_content_en]" value="<?php echo @$value['sub_content_en']?>" placeholder="Enter Sub Content" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Banner Sub-Content Ar</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[sub_content_ar]" value="<?php echo @$value['sub_content_ar']?>" placeholder="Enter Sub Content" >
                    </div>
                </div>
                <div class="form-group row">
                      <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Select Category For Link</label>
                      <div class="col-sm-9">
                       <select class="form-control" name="data[category]">
                          <option value="">Select</option>
                           <?php foreach($pcat as $key=>$values){ 
                                if($value['category'] == $values['cat_id']){ ?>
                            <option value="<?php echo @$values['cat_id'];?>" selected><?php echo @$values['category_name_en'];?></option> 
                           <?php }else{ ?>
                              <option value="<?php echo @$values['cat_id'];?>"><?php echo @$values['category_name_en'];?></option>                   
                           <?php } } ?>
                       </select>
                   </div>
                </div>               
                 <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-xs-3 col-form-label form-control-label">Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="data[status]">
                            <option value="1" <?php if(isset($value['status'])) { if(@$value['status'] == 1){ echo "selected";}} ?>>Active</option>
                            <option value="0" <?php if(isset($value['status'])) { if(@$value['status'] == 0){ echo "selected";}} ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                  
                <input type="hidden" name="old_image" value="<?php echo @$value['banner_image']; ?>">
                <input type="hidden" name="data[banner_id]" value="<?php echo @$banner_id; ?>">    
                <input type="hidden" name="data[pname]" value="<?php echo @$pname; ?>">    
            </form> 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_ads">Save changes</button>
        </div>
    </div>
</div>

<script>
$("#insert_ads").validate({       
            rules: {               
                <?php if($banner_id == '') { ?>
                    "addimage"           : "required",
                <?php } ?>
                "data[sub_content_ar]"   : "required",
                "data[category]"   : "required",
                "data[sub_content_en]"   : "required",
                "data[content_en]"   : "required",
                "data[content_ar]"   : "required",
                
            },
            messages : {
                              
            },      
        });

    $('.insert_ads').click(function(){    
        var validator = $("#insert_ads").validate();
            validator.form();
            if(validator.form() == true){
                 $('.insert_ads').html("<img src='<?php echo base_url()?>assets/images/ajax-loaderr.gif' style='width:10px; height:20px;'>"); 
                  var data = new FormData($('#insert_ads')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_banner",
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
                        var obj = jQuery.parseJSON(result);
                        if (obj.status == "success")
                        {
                            location.reload();
                        } 
                    }
                });
            }
        });
   
</script>