<?php 
                if(@$users)
                {
                  foreach (@$users as $key => $value) { ?>
                     <div class="col-md-3">
                        <div class="friendsCard">
                            <div class="card">
                                <img src="<?php echo ($value['user_image'])?base_url().$value['user_image']:base_url().'assets/website/images/prof.png';?>">
                                <div class="container">
                                  <h4><b><?php echo @$value["first_name"];?></b></h4> 
                                  <?php 
                                    $follow = $this->db->where(array("user_id"=>$value['user_id'],"follower_id"=>$userdata['user_id']))->get("followers")->row_array();
                                    $me_follow = $this->db->where(array("follower_id"=>$value['user_id'],"user_id"=>$userdata['user_id']))->get("followers")->row_array();
                                    if(!empty($follow) || !empty($me_follow))
                                    {
                                      if(!empty($follow))
                                      {
                                          if($follow["status"]==0)
                                          {
                                            ?>
                                             <p class="btnGroup"><button onclick="following(this.id,1)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn acceptBtn">Accept</button>
                                              <button onclick="following(this.id,2)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn rejectBtn">Reject</button>
                                              </p>    
                                            <?php
                                          }
                                          else if($follow["status"]==1)
                                          {
                                            ?><p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn followingBtn">Following</button>
                                              <a href="<?php echo base_url();?>website/share_orders/<?php echo @$value['user_id'];?>"><button class="btn btn-primary cont_shopping followBtn viewOrderBtn">Visit</button></a>
                                              </p><?php
                                          }
                                          else
                                          {
                                            ?><p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn rejectBtn">Rejected</button><?php
                                          }
                                      }
                                      else
                                      {
                                          if($me_follow["status"]==0)
                                          {
                                            ?>
                                             <p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn acceptBtn">Follow Request Sent</button>
                                              </p>    
                                            <?php
                                          }
                                          else if($me_follow["status"]==1)
                                          {
                                            ?><p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn followingBtn">Following</button>
                                             <a href="<?php echo base_url();?>website/share_orders/<?php echo @$value['user_id'];?>"> <button class="btn btn-primary cont_shopping followBtn viewOrderBtn">View Orders</button></a>
                                              </p><?php
                                          }
                                          else
                                          {
                                            ?><p class="btnGroup"><button class="btn btn-primary cont_shopping followBtn rejectBtn">Rejected</button><?php
                                          }
                                      }
                                    }
                                    else
                                    {
                                      ?><p class="btnGroup"><button onclick="following(this.id)" id="<?php echo @$value['user_id'];?>" class="btn btn-primary cont_shopping followBtn">Follow</button></p><?php
                                    }                                   
                                    
                                  ?>
                                  
                                </div>
                              </div>
                        </div>   
                     </div>
                 <?php } }else{

                  echo "No Data Found";
                 } ?>