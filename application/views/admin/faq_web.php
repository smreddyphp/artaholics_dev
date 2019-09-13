<style>
#advanced-table{
    width:100% !important;
}
    #advanced-table th,#advanced-table td{
    white-space: initial !important;
    }
</style>
<!-- CONTENT-WRAPPER-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
         <div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <h4>FAQ</h4>
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="#">
                <i class="icofont icofont-home"></i>
              </a>
            </li>
            <li class="breadcrumb-item"><a href="#:" >Add/Edit <?php echo @$page_name; ?></a></li>
          </ol>
        </div>
      </div>
    </div>
   <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-header-text">Add/Edit <?php echo @$page_name; ?></h5>
            <span>
            <button class="btn btn-primary waves-effect waves-light pull-right add_faq_web" data-name="<?php echo @$current_page; ?>" style="margin-left:65%">Add </button></span>
          </div>          
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                 <th>S NO</th>
                <th>Question </th>
                <th>Answer</th>
                <th>Date</th>
                <th>Status</th>            
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
               <th>S NO</th>
                <th>Question </th>
                <th>Answer</th>
                <th>Date</th>
                <th>Status</th>            
                <th>Action</th>
              </tr>
              </tfoot>
              <tbody>
                   <?php 
                      $counter = 1;
                      foreach($faq_web as $key)
                      {
                        if ($key["status"] == "1")
                        {
                            $status = "tag tag-success" ;
                            $status1='Active';
                        }
                        else
                        {
                            $status = "tag tag-default" ;
                            $status1='InActive';
                        }
                    ?>
                      <tr id="hide<?php echo $key["faq_id"];?>">
                      <td><?php echo $counter;?></td>
                      <td><?php echo ucwords($key["question"]);?></td>
                      <td><?php echo ucwords($key["answer"]);?></td>
                      
                      <td><?php echo $key["date"];?></td>
                      <td><span class="<?php echo $status;?>"><?php echo ucfirst($status1);?></span></td>
                      <td style="white-space: nowrap; width: 1%;">
                      <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                      <div class="btn-group btn-group-sm" style="float: none;">
                      <div class="btn-group btn-group-sm" style="float: none;">
                      <button data-id="<?php echo $key["faq_id"];?>" class="btn btn-primary waves-effect waves-light add_faq_web" style="float: none;margin: 5px;">
                      <span class="icofont icofont-ui-edit"></span>
                      </button>
                      <button type="button" class="btn btn-danger waves-effect waves-light delete_faq_web" data-id="<?php echo $key["faq_id"]?>" style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button>
                      </div>       
                      </div>
                      </td>
                      </tr>                          
                      <?php  $counter++;
                      }
                  ?>                            
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>   
</div>
  <section>
    <div class ="modal fade" data-backdrop="static" data-keyboard="false" id ="add_faq_web" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
   <script>     
        var $modal = $('#add_faq_web');
        $('.add_faq_web').on('click',function(event)
        {
            var id = $(this).data('id');
            event.stopPropagation();
            $modal.load('<?php echo site_url('admin/add_faq_web');?>', {id: id},
            function(){
              $modal.modal('show');
            });
        });

        //delete 
        $('.delete_faq_web').on('click',function(event)
        { 
            var id = $(this).data('id');            
            alertify.confirm("Do you want to Delete Country ?.",
             function(){
              $.ajax({                
                    url: "<?php echo base_url();?>admin/delete_faq_web",
                    type: "POST",
                    data: {id:id,file:file},
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result)
                    {
                      $("#hide"+id).hide();
                      location.reload();          
                    }
              });

              },
          function(){
           // alertify.error('Cancel');
          }); 
        });               
    </script>