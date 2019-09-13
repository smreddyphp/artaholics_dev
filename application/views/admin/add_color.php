<script type="text/javascript" src="http://chir.ag/projects/ntc/ntc.js"></script>
<style>
    #insert_color label.error {
        color:red; 
    }
    #insert_color input.error,textarea.error,select.error {
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
            <h4 class="modal-title" align="center">Add / Edit Color</h4>
        </div>
        <div class="modal-body">
            <form id="insert_color">  
            
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Color Code</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="color" id="color_code" name="data[color_code]" value="<?php echo @$value['color_code']?>" placeholder="Enter Color Code" style="height:50px" >
                    </div>
                </div>
                <input type="hidden" name="data[color_en]" id="color_name">
               <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Color En</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[color_en]" value="<?php  echo @$value['color_en']?>" placeholder="Enter Color En" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Color Ar</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[color_ar]" value="<?php  echo @$value['color_ar']?>" placeholder="Enter Color Ar" >
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
                 
                
             
               
                <input type="hidden" name="data[color_id]" value="<?php echo @$color_id; ?>">    
                <input type="hidden" name="data[pname]" value="<?php echo @$pname; ?>">    
            </form> 
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_color">Save changes</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    
  /*var n_match  = ntc.name("#000000");
  n_rgb        = n_match[0]; // RGB value of closest match
  n_name       = n_match[1]; // Text string: Color name
  n_exactmatch = n_match[2]; // True if exact color match

  alert(n_match);
*/
</script>

<script>
$("#insert_color").validate({       
            rules: {               
               
                "data[color_en]"        : "required",
                "data[color_ar]"        : "required",
               
            },
            messages : {
                              
            },      
        });
    $('.insert_color').click(function(){  
        var color_code = $('#color_code').val();
        var n_match  = ntc.name(color_code);
         color_name = n_match[1];
         
        document.getElementById('color_name').value = color_name;
        
        var validator = $("#insert_color").validate();
            validator.form();
            if(validator.form() == true){
                 $('.insert_color').html("<img src='<?php echo base_url()?>assets/images/ajax-loaderr.gif' style='width:20px; height:15px;'>"); 
                  var data = new FormData($('#insert_color')[0]); 
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_color",
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