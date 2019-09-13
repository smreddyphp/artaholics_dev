
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; }
  #sortable li {    margin: 0 4px 20px 4px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
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
   .ui-state-default.chip {
  display: inline-block;
  padding: 10px 15px !important;
  height: 50px;
  font-size: 16px;
  line-height: 50px;
  border-radius: 25px;
  background-color: #f1f1f1;
  height:auto !important;
     font-size:15px !important;
     width:50%;
         text-align:center;
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2), 0 2px 2px 0 rgba(0,0,0,0.2);
}

.ui-state-default.chip i {
  float: left;
  margin: 0 10px 0 10px;
  height: 50px;
  width: 50px;
  line-height: 50px;
  border-radius: 50%;
}
.modal-body {
    position: relative;
    padding: 15px;
    max-height: 400px;
    overflow: scroll;
}
</style>
<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Set Categories Position</h4>
        </div>
        <div class="modal-body">
            <form id="set_p">
            <ul id="sortable">
                <?php foreach ($categories as $key => $value) { ?>
                 <div class="">
              <li class="ui-state-default chip">
                 
                  <span class="ui-icon ui-icon-arrowthick-2-n-s">
                      <input type="hidden" name="cat[]" value="<?php echo @$value['cat_id'];?>"></span>
                      <?php echo @$value['category_name_en'];?></li>  
                      </div>
          <?php } ?>
            </ul>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_ads">Save changes</button>
        </div>
        </form>
    </div>
</div>

<script>
    $('.insert_ads').click(function(){   
        
              var data = new FormData($('#set_p')[0]);   
            $.ajax({                
                url: "<?php echo base_url();?>admin/set_categories_positions",
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
        });
   
</script>