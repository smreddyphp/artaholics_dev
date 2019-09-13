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
          <h4>Add New Param to a PAGE</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="#">
                <i class="icofont icofont-home">Home</i>
              </a>
            </li>
			      <li class="breadcrumb-item"><a href="#:" >Add Param</a></li>
          </ol>
        </div>
      </div>
    </div>

    <!-- Row end -->

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-header-text">Add Page</h5>
          </div>
          <div class="card-block">
              <form id="insert_page">                     
                 <div class="form-group row">
                  <div class="col-sm-2">
                       <input  class="form-control" name="data[param_name]]" placeholder="eg: index_page" required="">
                  </div>
                  <div class="col-sm-5">
                       <input name="data[page_name]"  class="form-control" placeholder="eg: Index Page" required="">
                  </div>
                </div>
              </form> 
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary waves-effect waves-light insert_page">Insert</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-header-text">Add PARAMETER</h5>
            <a href="javascript:add_field()"><button class="btn btn-m btn-success fa fa-plus" style="float: right"> Add Param</button></a>
          </div>
          <div class="card-block">
              <form id="insert_services">
                <div class="form-group row">
                  <div class="col-sm-12">
                       <select  class="form-control" name="data[page_id]" required>
                        <?php foreach ($pages as $key => $page) { ?>
                          <option value="<?php echo $page['id'];  ?>"><?php echo $page['page_name'] ; ?></option>
                        <?php } ?>  
                       </select>
                  </div>     
                </div>
                <div class="form-group row">
                  <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Param Name</label>
                  <label for="example-tel-input" class="col-xs-5 col-form-label form-control-label">English Word</label>
                  <label for="example-tel-input" class="col-xs-5 col-form-label form-control-label">Arabic Word</label>
                </div>                      
                 <div class="form-group row">
                  <div class="col-sm-2">
                       <input  class="form-control" name="data[params][]" placeholder="English">
                  </div>
                  <div class="col-sm-5">
                       <input name="data[en][]"  class="form-control" placeholder="English">
                  </div>
                  <div class="col-sm-5">
                       <input  name="data[ar][]"  class="form-control" placeholder="Arabic" >
                  </div>
                </div>
                <div id="append_fields">
                </div>
              </form> 
  				  <div class="modal-footer">
              <button type="submit" class="btn btn-primary waves-effect waves-light insert_services">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-header-text">Delete Pages</h5>
          </div>
          <div class="card-block">
              <form id="insert_services">
                <div class="form-group row">
                  <label for="example-tel-input" class="col-xs-2 col-form-label form-control-label">Param Name</label>
                  <label for="example-tel-input" class="col-xs-5 col-form-label form-control-label">Remove</label>
                </div>
                <?php foreach ($lang_manage as $key => $page) { ?>                      
                   <div class="form-group row">
                    <div class="col-sm-2">
                      <?php echo $page['page_name']; ?>
                    </div>
                    <div class="col-sm-5">
                      <button type="button" class="btn btn-primary waves-effect waves-light delete_categories" data-id="<?php echo $page["id"] ; ?>" style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button>
                    </div>
                  </div>
                <?php } ?> 
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


    $('.insert_services').click(function(){ 
                
      var data = new FormData($('#insert_services')[0]); 

      $.ajax({                
                url: "<?php echo base_url();?>admin/save_params",
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
                  //alert(result);
                  location.reload();
                }
              });
        });

    $('.insert_page').click(function(){ 
                
      var data = new FormData($('#insert_page')[0]); 

      $.ajax({                
                url: "<?php echo base_url();?>admin/save_data/lang_manage",
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
                  //alert(result);
                  location.reload();
                }
              });
        });

function add_field()
{
    var str = "<div class='form-group row'><div class='col-sm-2'><input  class='form-control' name='data[params][]' placeholder='English'></div><div class='col-sm-5'><input name='data[en][]'  class='form-control' placeholder='English'></div><div class='col-sm-5'><input  name='data[ar][]'  class='form-control' placeholder='Arabic' ></div></div>" ;

    $("#append_fields").append(str);
}

    $('.delete_categories').on('click',function(event)
    { 
          var id = $(this).data('id');                
          
         $.ajax({                
              url: "<?php echo base_url();?>admin/delete/lang_manage",
              type: "POST",
              data: {id:id},
              error:function(request,response)
              {
                  console.log(request);
              },                  
              success: function(result)
              {
                location.reload();                                
              }
        });
    });

   

</script>

 