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
<?php 
$commission = $this->db->where("id",1)->get("terms_and_conditions")->row_array()['artist_commission'];
?>
<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Add Commission</h4>
        </div>
      <div class="modal-body">
            <form id="insert_category">                
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Commission</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[commission]" value="<?php echo @$commission;?>" placeholder="Enter Commission In Percentage" >
                    </div>
                </div>                        
                <input type="hidden" name="user_id" value="<?php echo @$user_id; ?>">   
                <input type="hidden" name="data[status]" value="1">   
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
                "data[commission]"   : "required",
            },
            messages : {
                   "data[commission]"   : "Please Enter Commission",           
            },      
        });
    $('.insert_category').click(function(){    
        var validator = $("#insert_category").validate();
            validator.form();
            if(validator.form() == true){
                 $('.insert_category').html("<img src='<?php echo base_url()?>assets/images/ajax-loaderr.gif' style='width:10px; height:20px;'>"); 
                  var data = new FormData($('#insert_category')[0]);   
               
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_commission",
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
                        if (result == "1") {
                            location.reload();
                        } 
                    }
                });
            }
        });
   
</script>