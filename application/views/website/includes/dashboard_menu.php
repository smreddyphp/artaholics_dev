        <ul class="nav nav-tabs">
         <?php if(auth_level==6){?>
           <li class=""><a class="<?php if(@$page=='my_designs'){ echo 'active';}?>" href="<?php echo base_url();?>website/my_designs"><?php echo @$language['my_designs'];?></a></li>
           <li class=""><a  class="<?php if(@$page=='my_sales'){ echo 'active';}?>" href="<?php echo base_url();?>website/my_sales"><?php echo @$language['my_sales'];?></a></li>
         <?php } ?>
         <li class=""><a  class="<?php if(@$page=='dashboard'){ echo 'active';}?>" href="<?php echo base_url();?>website/dashboard"><?php echo @$language['account'];?></a></li>
         <li class=""><a  class="<?php if(@$page=='orders'){ echo 'active';}?>" href="<?php echo base_url();?>website/orders"><?php echo @$language['orders'];?></a></li>
         <li class=""><a class="<?php if(@$page=='favourites'){ echo 'active';}?>" href="<?php echo base_url();?>website/favourites"><?php echo @$language['favourites'];?></a></li>
         <li class=""><a class="<?php if(@$page=='followings'){ echo 'active';}?>" href="<?php echo base_url();?>website/followings"><?php echo @$language['my_artists'];?></a></li>
         <li class=""><a class="<?php if(@$page=='friends'){ echo 'active';}?>" href="<?php echo base_url();?>website/friends"><?php echo (@lang=='en')?"Friends":"اصحاب  ";//@$language['followings'];?></a></li>
       </ul>
       <?if(@auth_level==6){?>
       <a href="<?php echo base_url();?>website/add_product"> <button class="btn btn-success add_btn design_btn"><?php echo @$language['create_new_design'];?></button></a>
     <?php } ?>