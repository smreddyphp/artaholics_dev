<style>
  input.error {
    border: 1px solid red !important;
    color : red !important;
  }  
  textarea.error {
    border: 1px solid red !important;
    color : red !important
  }
  select.error {
    border: 1px solid red !important;
    color : red !important;
  }
  label.error {
    color: red !important;
  }
  .mb10 {
    margin-bottom: 10px;
  }
</style>
<div class="content-wrapper">
    <!-- Container-fluid starts -->
  <div class="container-fluid">
        <!-- Header Starts -->
    <div class="row">
      <div class="col-sm-12 p-0">
        <div class="main-header">
          <h4>Add/Edit FAQ</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="#">
              <i class="icofont icofont-home"></i>
               </a>
          </li>
        <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item"><a href="data-table.html">Add/Edit FAQs</a></li>
      </ol>
    </div>
  </div>
</div>
        <!-- Header end -->  
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header"><h5 class="card-header-text">Add/Edit FAQ</h5>
          </div>
        <div class="card-block">
              <form id="edit_term" method='post' action="<?php echo base_url(); ?>admin/save_faq">       
          <div class="form-group row">
              <label class="col-xs-2 col-form-label form-control-label">Content (En)<span class="required">*&nbsp;</span></label>
        <div class="col-md-10">
          <textarea class="form-control ckeditor" name="data[content_en]" id=""><?php echo @$terms[0]['content_en'];?></textarea>
      </div>
  </div>         
      <div class="form-group row">
          <label class="col-xs-2 col-form-label form-control-label">Content (Ar)<span class="required">*&nbsp;</span></label>
            <div class="col-md-10">
            <textarea class="form-control ckeditor" name="data[content_ar]" id=""><?php echo @$terms[0]['content_ar'];?></textarea>
          </div>
      </div>
		<input type="hidden" name="id" value="<?php echo @$terms[0]['faq_id']; ?>">
        <div class="clearfix"></div>  
            <div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary waves-effect waves-light outlet_address_submit" style="left:440px;">Submit</button>
            </div>
          </div>
        </form>                   
      </div>
     </div>
    </div>
  </div>            
</div>
    <!-- Container-fluid ends -->
</div>

<script>
    $("#edit_term").validate({
      ignore: [], 
        rules: {   
          "data[content_en]": {
            required: function(textarea) 
            {
              CKEDITOR.instances[textarea.name].updateElement();
                var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                return editorcontent.length === 0;
            }
          },
          "data[content_ar]":{
            required: function(textarea) 
            {
              CKEDITOR.instances[textarea.name].updateElement();
                var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                return editorcontent.length === 0;
            }
          },
         submitHandler: function(form) {
			   form.submit();
        }
      }
      });
    </script>
<style type="text/css">
  .images-promocodes {
    float: left;
    margin-right: 10px;
}
.images-promocodes img {
    width: 100px;
    height: 100px;
}
.datepicker-dropdown td.today.day {
    background: #555;
    color: #fff;
}
</style>