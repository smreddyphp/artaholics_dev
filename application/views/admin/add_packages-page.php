  <style>
    #insert_package label.error {
        color:red; 
    }
    #insert_package input.error,textarea.error,select.error {
        border:1px solid red;
        color:red; 
    }
    .popover {
    z-index: 2000;
    position:relative;
    }    
</style>  

    <div class="content-wrapper">
      <!-- Container-fluid starts -->
      <div class="container-fluid">
        <!-- Header Starts -->
        <div class="row">
          <div class="col-sm-12 p-0">
            <div class="main-header">
              <h4>Add / Edit Packages</h4>
              <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item">
                  <a href="#">
                    <i class="icofont icofont-home"></i>
                  </a>
                </li>
                <li class="breadcrumb-item"><a href="javascript:">Add / Edit Packages</a></li>
              </ol>
            </div>
          </div>
        </div>
        <!-- Header end -->
        
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-header-text">Package Details</h5>
              </div>
              <div class="modal-body" align="center">
                <form id="insert_package" >
            <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="package_image" >
                    </div>
                </div>
                <?php if(@$value['package_id']!=''){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">
                        <img src="<?php echo base_url().$value['package_image']?>" width="100px" height="100px" style="background-color:gray;" >
                    </div>
                </div>
                <?php } ?>
          
             <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Package Name En</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[package_name_en]" value="<?php echo @$value['package_name_en']?>" placeholder="Enter Package Name" >
                    </div>
                </div>

           <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Package Name Ar</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[package_name_ar]" value="<?php echo @$value['package_name_ar']?>" placeholder="Enter Package Name" >
                    </div>
                </div>
            
            <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Price</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[price]" value="<?php echo @$value['price']?>" placeholder="Enter Package Price" >
                    </div>
                </div>

             <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">No of Cleanings</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[no_of_cleaning]" value="<?php echo @$value['no_of_cleaning']?>" placeholder="Enter No of Cleanings" >
                    </div>
                </div>

            <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">No of Polishings</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[no_of_polishing]" value="<?php echo @$value['no_of_polishing']?>" placeholder="Enter No of Polishings" >
                    </div>
                </div>

             <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">No of Waxings</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[no_of_waxing]" value="<?php echo @$value['no_of_waxing']?>" placeholder="Enter No of Waxings" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">No of Interior</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[no_of_interior]" value="<?php echo @$value['no_of_interior']?>" placeholder="Enter No of Interior" >
                    </div>
                </div>

            <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">No of Visits</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[total_visit]" value="<?php echo @$value['total_visit']?>" placeholder="Enter No of Visits" >
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Package Detail En</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" type="text" name="data[package_detail_en]" placeholder="Enter Package" ><?php echo @$value['package_detail_en']?></textarea>
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Package Detail Ar</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" type="text" name="data[package_detail_ar]"  placeholder="Enter Service" ><?php echo @$value['package_detail_ar']?></textarea>
                    </div>
                </div>
             <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-xs-3 col-form-label form-control-label">Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="data[status]">
                            <option value="1" <?php if(isset($value->status)) { if($value->status == 1){ echo "selected";}} ?>>Active</option>
                            <option value="0" <?php if(isset($value->status)) { if($value->status == 0){ echo "selected";}} ?>>Inactive</option>
                        </select>
                    </div>
                </div> 
                <input type="hidden" name="old_image" value="<?php echo @$value['package_image']; ?>">
                <input type="hidden" name="data[package_id]" value="<?php echo @$package_id; ?>">    
                <input type="hidden" name="data[pname]" value="<?php echo @$pname; ?>"> 
                </form>          
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_package">Submit</button>
        </div>           
    </div>      
      <!-- Container-fluid ends -->
    </div> 
    <script>
$("#insert_package").validate({       
            rules: {               
                <?php if($package_id=='') { ?>
                "package_image"                : "required",
                <?php } ?>
                "data[package_name_en]"        : "required",
                "data[package_name_ar]"        : "required",
                "data[price]"                  : "required",
                "data[total_visit]"            : "required",
                "data[no_of_cleaning]"         : "required",
                "data[no_of_polishing]"        : "required",
                "data[no_of_waxing]"           : "required",
                "data[no_of_interior]"         : "required",
                "data[package_detail_en]"      : "required",
                "data[package_detail_ar]"      : "required",
            },
            messages : {
                //<?php //if($package_id=='') { ?>
               // "package_image"                : "",
                //<?php //} ?>
              //  "data[package_name_en]"        : "",
              //  "data[package_name_ar]"        : "",
               // "data[price]"                  : "",
              //  "data[total_visit]"            : "",
               // "data[no_of_cleaning]"         : "",
              //  "data[no_of_polishing]"        : "",
              //  "data[no_of_waxing]"           : "",
              //  "data[no_of_interior]"         : "",
              //  "data[package_detail_en]"      : "",
              //  "data[package_detail_ar]"      : ""            
            },      
    });
    $('.insert_package').click(function(){ 
    
        var validator = $("#insert_package").validate();
            validator.form();
            if(validator.form() == true){
                 $('.insert_package').html("<img src='<?php echo base_url()?>assets/images/ajax-loaderr.gif' style='width:20px; height:15px;'>"); 
                  var data = new FormData($('#insert_package')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_package",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    error:function(request,response){
                       // console.log(request);
                        location.reload();
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
    