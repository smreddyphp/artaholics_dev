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
            <h4 class="modal-title" align="center">Add / Edit Sub Category</h4>
        </div>
      <div class="modal-body">
            <form id="insert_category">
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Category</label>
                    <div class="col-sm-9">
                        <select name="data[cat_id]" class="form-control">
                            <option value="">Select Category</option>
                            <?php
                               $categories = $this->db->select('*')->from('categories')->get()->result_array();
                                foreach($categories as $row)
                                {
                                    if($row['cat_id'] == $value['cat_id'])
                                    {
                                        //$cat_id = $row['cat_id'];
                                        echo '<option value="'.$row['cat_id'].'" selected>'.$row['category_name_en'].'</option>';
                                    }
                                    else
                                    {
                                       // $cat_id = $row['cat_id'];
                                         echo '<option value="'.$row['cat_id'].'">'.$row['category_name_en'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Sub Category En</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[pcat_name_en]" value="<?php echo @$value['pcat_name_en']?>" placeholder="Enter Category Name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Sub Category Ar</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[pcat_name_ar]" value="<?php echo @$value['pcat_name_ar']?>" placeholder="Enter Category Name" >
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="addimage" >
                    </div>
                </div> -->
                <?php if(@$value['pcat_id']!=''){ ?>
               <!--  <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">
                        <img src="<?php echo base_url().$value['p_image']?>" width="100px" height="100px" style="background-color:gray;" >
                    </div>
                </div> -->
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
                <input type="hidden" name="old_image" value="<?php echo @$value['p_image']; ?>">               
                <input type="hidden" name="data[pcat_id]" value="<?php echo @$pcat_id; ?>">    
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
                <?php if($pcat_id=='') { ?>
                    "addimage"           : "required",
                <?php } ?>
                "data[pcat_name_en]"   : "required",
                "data[pcat_name_ar]"   : "required",
                
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
                    url: "<?php echo base_url();?>admin/save_sub_category",
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