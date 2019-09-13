<?php if(@$products)
{
    foreach (@$products as $key => $value){ ?>
        <div class="col-md-4">                                          
            <div class="featured_div">
                <div class="img_box">
                
                    <img src="<?php echo base_url().@$value['product_image'];?>" style="object-fit: contain;">
                        <div class="fea_overlay">
                        <span onclick="favourite(this.id)" id="<?php echo $value['pro_id'];?>"><i class="<?php if(@$favourites){ if(in_array(@$value['pro_id'],@$favourites)){ echo 'hert';} }?> fa fa-heart" aria-hidden="true"></i></span>
                    </div>
                </div>
                <a href="<?php echo base_url();?>website/product_view/<?php echo @$value['pro_id'];?>" class="feature_a">
                <p class="fea_art"><?php echo 'By '.$this->website_Model->get_user($value['user_id'])['first_name'];?></p></a>
            </div>                                          
        </div>                          
    <?php   } }else{ ?>
        <div class="col-md-4">                     
            <div>
                <b>

                    <?php 
                    if(@lang=="en")
                    {
                        echo "No Products Found";
                    }
                    else
                    {
                        echo "لا توجد منتجات";
                    }
                    ?>                                                      
                </b>
            </div>                          
        </div>
<?php } ?> 