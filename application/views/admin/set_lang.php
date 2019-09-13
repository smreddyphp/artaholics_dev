<!-- CONTENT-WRAPPER-->
<style>

#insert_services label.error 
{
    color:red; 
}

#insert_services input.error,textarea.error,select.error 
{
    border:1px solid red;
    color:red; 
}

.popover 
{
  z-index: 2000;
  position:relative;
}

  
</style>

<div class="content-wrapper">
        <!-- Container-fluid starts -->
<div class="container-fluid">
  <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <h4><?php echo @$page ; ?></h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="#">
                <i class="icofont icofont-home">Home</i>
              </a>
            </li>
			      <li class="breadcrumb-item"><a href="#:" ><?php echo @$page ; ?></a></li>
          </ol>
        </div>
      </div>
    </div>

    <!-- Row end -->

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-header-text"><?php echo @$page ; ?> Management</h5>
          </div>
          <div class="card-block">
              <form id="insert_services">
                <div class="form-group row">
                  <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Param Name</label>
                  <label for="example-tel-input" class="col-xs-3 col-form-label form-control-label">English Word</label>
                  <label for="example-tel-input" class="col-xs-5 col-form-label form-control-label">Arabic Word</label>
                  <?php if(@$user_info->auth_level==9) { ?>
                    <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Remove</label>
                  <?php } ?>
                </div>
              <?php foreach($data as $param => $lang_vals) { ?>                        
                 <div class="form-group row">
                 <div class="col-sm-2">
                      <span><?php echo strtolower($param); ?></span>
                  </div>
                  <div class="col-sm-3">
                      <span><?php echo @$lang_vals['en'];?></span>
                  </div>
                  <div class="col-sm-5">
                       <input  id="ar_<?php echo $param; ?>" name="data[ar][<?php echo $param ; ?>]"  class="form-control" placeholder="Arabic"  
                       value="<?php echo @$lang_vals['ar'];?>">
                  </div>
                  <?php if(@$user_info->auth_level==9) { ?>
                    <div class="col-sm-1">
                      <a href="<?php echo base_url(); ?>admin/remove_param/<?php echo @$page_id ; ?>/<?php echo @$param ; ?>"><span class="btn btn-sm btn-danger fa fa-trash"></span></a>
                    </div>
                  <?php } ?>    
                </div>  
              <?php } ?>
                <div id="append_fields">
                </div>
              <input type="hidden" id="page_id" name="data[id]" value="<?php echo @$page_id; ?>">
              </form> 
  				  <div class="modal-footer">
              <button type="submit" class="btn btn-primary waves-effect waves-light insert_services">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        <!-- Container-fluid ends -->
</div>

 <!-- CONTENT-WRAPPER-->


<script>     

$("#insert_services").validate({       

           
		   ignore:[],
			rules: {

                      <?php foreach ($data as $param => $value) { ?>
                        "data[en][<?php echo $param ; ?>]"     : "required",
                      <?php } ?>
                      <?php foreach ($data as $param => $value) { ?>
                        "data[ar][<?php echo $param ; ?>]"     : "required",
                      <?php } ?>
             },

      messages : {
                      <?php foreach ($data as $param => $value) { ?>
                        "data[en][<?php echo $param ; ?>]"     : "required",
                      <?php } ?>
                      <?php foreach ($data as $param => $value) { ?>
                        "data[ar][<?php echo $param ; ?>]"     : "required",
                      <?php } ?>
                 },       

    });

    $('.insert_services').click(function(){ 
        var validator = $("#insert_services").validate();
            validator.form();
            if(validator.form() == true){                  
              var data = new FormData($('#insert_services')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_language",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    error:function(request,response)
                    {
                      console.log(request);
                    },                  
                    success: function(result)
                    {
                      location.reload();
                    }
                });
            }
        });

</script>

 