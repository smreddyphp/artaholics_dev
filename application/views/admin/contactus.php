<!-- CONTENT-WRAPPER-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
         <div class="container-fluid">
    <!-- Row Starts -->
    <div class="row">
      <div class="col-sm-12">
        <div class="main-header">
          <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
            <li class="breadcrumb-item">
              <a href="#">
                <i class="icofont icofont-home"></i>
              </a>
            </li>
           <li class="breadcrumb-item"><a href="#:" ><?php echo @$page_name; ?></a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- Row end -->
    
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text"><?php echo @$page_name; ?></h5><span>
              </span>
          </div>
          <div class="card-block">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                    <th>S NO</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Status</th>                   
                    <th>Action</th>                   
              </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>S NO</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Status</th>                   
                    <th>Action</th>                   
                </tr>
              </tfoot>
               <tbody>
                   <?php 
                      $counter = 1;
                      foreach($contact as $key) { 
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
                      <tr id="hide<?php echo $key["contact_id"];?>">
                      <td><?php echo $counter;?></td>
                      <td><?php echo ucwords($key["name"]);?></td>
                      <td><?php echo ucwords($key["subject"]);?></td>
                      <td><?php echo ucwords($key["email"]);?></td>
                      <td><?php echo ucwords($key["message"]);?></td>
                      <td><?php echo $key["date"];?></td>
                      <td><span class="<?php echo $status;?>"><?php echo ucfirst($status1);?></span></td>
                      <td><div class="btn-group btn-group-sm" style="float: none;">
                              <div class="btn-group btn-group-sm" style="float: none;">
                                <button type="button" class="btn btn-danger waves-effect waves-light delete_team_mem" data-id="<?php echo $key["contact_id"]?>"  style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button>
                            </div>       
                          </div></td>
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
        <!-- Container-fluid ends -->
        
     </div> 
   <script>
        //delete 
        $('.delete_team_mem').on('click',function(event){ 
          
            var id = $(this).data('id');
              $.ajax({                
                    url: "<?php echo base_url();?>admin/delete_contact_req",
                    type: "POST",
                    data: {id:id},
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result){
                        var res = jQuery.parseJSON(result);
                        if(res.status='success'){
                            $("#hide"+id).hide();
                            location.reload();
                        }
                        
                    }
              });
        });               
    </script>
 