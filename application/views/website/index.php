<style type="text/css">
	.hert {
		color: #f00d0d;
	}

	.featured_div img {
    width: 100%;
}
	.fea_art {
    padding: 5px 10px;
	}

	.artist_info {
    background-color: #F9DE5A;
    padding: 89px 0px;
    display: flex;
    align-items: center;
}
.artist_info .aritst_inner{
    width:100%;
}
.artist_info h1 {
    font-size: 30px;
}
.artist_info p {
    font-size: 15px;
}
.create_span {
    border: 5px solid #E2E1E6;
    overflow: hidden;
    clear: both;
    display: -webkit-inline-box;
    margin-top: 15px;
    cursor: pointer;
}
.create_span .create_btn{
    color:#000 !important;
    padding: 15px 40px;
    font-size: 16px;
}
.artist_sample img{
    height:200px;
    object-fit: contain;
}
</style>
<!----------================banner_section===============---------->
<section class="banner_section">
<div id="demo_carousel" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <?php foreach(@$banners as $key=>$value){?>
    <li data-target="#demo_carousel" data-slide-to="<?php echo $key;?>" class="<?php if($key==0){ echo 'active';}?>"></li>    
    <?php } ?>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <?php foreach(@$banners as $key=>$value){?>
    <div class="carousel-item <?php if(@$key==0){ echo 'active';}?>">
     <div class="bg_overlay"></div>
      <img src="<?php echo base_url().@$value['banner_image'];?>" alt="Los Angeles">
      <div class="carousel-caption">
    <h3><?php echo @$value['content_'.lang];?></h3>
    <p><?php echo @$value['sub_content_'.lang];?></p>
      <a class="" href="<?php echo base_url();?>website/view_products/<?php echo @$value['category'];?>"> <button class="btn btn-success shop_btn"><?php echo @$language['shop_now'];?></button></a>
        </div>
    </div>
  <?php } ?>    
  </div>
</div>
</section>
<!----------================end-banner_section===============---------->
<!----------================browse_section===============---------->
<section class="browse_by">
    <div class="container">
       <h3 class="main_heading"><?php echo @$language['browse_category'];?></h3>
        <div class="row">
            <?php foreach(@$categories as $key=>$value){?>
            <div class="col7">
               <a href="<?php echo base_url();?>website/view_products/<?php echo $value['cat_id'];?>" class="browse_a">
                <div class="browse_div">
                   <div class="browse_overlay">
                       <h4><?php echo $value['category_name_'.lang];?></h4>
                   </div>
                    <img src="<?php echo base_url().$value['image'];?>">
                </div>
                </a>
            </div>
            <?php } ?>            
        </div>
    </div>
</section>
<!----------================end_browse_section===============---------->
<!----------================artist_section===============---------->
<!--<section class="become_artist">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="artist_info">-->
<!--                <h1><?php echo @$language['become_an_artist'];?></h1>-->
<!--                <p><?php echo @$language['turn_your_design_into_profit'];?></p>-->
<!--                <span class="create_span">                  -->
<!--                      <a href="<?php echo base_url();?>website/add_product"> <button class="btn btn-success create_btn"><?php echo @$language['create_your_own'];?></button></a>-->
<!--               </span>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<section class="featured_artist">
    <div class="container">
       <div class="row">
           <div class="col-md-7 pad_0">
               <div class="shop_artist">
                  <h5 class="sub_head"><?php echo @$language['some_of_artist_works'];?></h5>
                   <div class="row">
                    <?php if(@$artist_works){
                        foreach ($artist_works as $key => $value) { ?>
                          <div class="col-md-4">
                             <div class="artists_div">
                                 <img src="<?php echo base_url().@$value['product_image'];?>">
                                 <a href="<?php echo base_url();?>website/product_view/<?php echo @$value['pro_id'];?>" class="feature_a">
                                  <p class="fea_art"><?php echo 'By '.$this->website_Model->get_user($value['user_id'])['first_name'];?></p></a>
                             </div>
                         </div>
                          <?php } } ?>                       
                   </div>
               </div>
           </div>
           <div class="col-md-5 pad_0">
               <div class="artist_box2">
                  <div id="become" class="carousel slide" data-ride="carousel">
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="artist_info">
                              <div class="aritst_inner">
                                  <h1><?php echo @$language['become_an_artist'];?></h1>
                                  <p><?php echo @$language['turn_your_design_into_profit'];?></p>
                                  <span class="create_span">
                                <a href="<?php echo base_url();?>website/add_product"> <button class="btn btn-success create_btn"><?php echo @$language['create_your_own'];?></button></a> </span>
                              </div>
                              </div>
                      </div>
                    </div>
                  </div> 
               </div>
           </div>
       </div>
    </div>
</section>
<!----------================end-artist_section===============---------->
<!----------================featured_section===============---------->
<section class="featured_at">
    <div class="container">
       <h3 class="main_heading"><?php echo @$language['featured_at'];?></h3>
        <div class="row feat_row">
          <?php if(@$featured_products){ 
            foreach (@$featured_products as $key => $value){  ?>
            <div class="col-md-3">
               <div class="feature-outer">
                	<div class="featured_div">                                   
					                    <div class="img_box">
					                        <div class="fea_overlay">
					                        <span onclick="favourite(this.id)" id="<?php echo $value['pro_id'];?>"><i class="<?php if(@$favourites){ if(in_array(@$value['pro_id'],@$favourites)){ echo 'hert';} }?> fa fa-heart" aria-hidden="true"></i></span>
					                         
					                    </div>                              
					                    <img src="<?php echo base_url().@$value['product_image'];?>">
                               
					                    </div>
                              <a href="<?php echo base_url();?>website/product_view/<?php echo @$value['pro_id'];?>" class="feature_a">
                                                           
                         <p class="fea_art"><?php echo 'By '.$this->website_Model->get_user($value['user_id'])['first_name'];?></p></a>
                </div>
                </div>
            </div>
          <?php } } ?>     

            <div class="col-md-12">
                <div class="view_more">
                   <a href="<?php echo base_url();?>website/view_featured_products"><button class="btn btn-success shop_btn"><?php echo @$language['view_more'];?></button></a> 
                </div>
            </div>
        </div>
    </div>
</section>
<!----------================end-featured_section===============---------->
<!----------================featured_section===============---------->
<section class="featured_artist">
    <div class="container">
       <div class="row">
               <div class="artist_box">
                  <div id="artist_profile" class="carousel slide" data-ride="carousel">
                      <!-- The slideshow -->
                      <div class="carousel-inner">
                           <div class="shop_artist">
                               <div class="fa_head">
                                      
                                </div>
                                <?php if(@$featured_artists){
                                  foreach (@$featured_artists as $key => $value){
                                      $products = $this->common_m->featured_artist_products($value['user_id'],3);
                                   ?>
                                <div class="carousel-item <?php if($key==0){ echo "active";}?>">
                                     <div class="row shop_row">
                                        <div class="artists_shop col-md-7">
                                            <h5 class="sub_head"><?php echo @$language['featured_artists'];?></h5>
                                          <?php 
                                            foreach (@$products as $pkey => $pvalue) {                          
                                          ?>
                                           <div class="col-md-4">
                                               <div class="artists_div artist_sample">
                                                   <img src="<?php echo base_url().@$pvalue['product_image'];?>">
                                                   <p class="artist_name"><?php echo "By ".@$value['first_name'];?></p>
                                                   <!-- <p class="artist_cost">SAR 99</p> -->
                                               </div>
                                           </div>
                                         <?php } ?>                       
                                           <div class="col-md-12 more_col">
                                              <div class="view_more">
                                             <a href="<?php echo base_url();?>website/featured_artist_products/<?php echo @$value['user_id'];?>"><button class="btn btn-success shop_btn shop_artist_btn"><?php echo @$language['artist_shop'];?></button></a>
                                               </div>
                                           </div>
                                           </div>
                                           <div class="col-md-5 artist_profile">
                                               <div class="artist_prof">
                                                <img src="<?php echo (@$value["user_image"])?base_url().@$value["user_image"]:base_url().'assets/website/images/prof.png';?>">
                                                <div class="artist_content">
                                                    <p class="art_name"><?php echo @$value['first_name'];?></p>
                                                    <p class="art_loc"><?php echo @$value['country_name'];?>, <?php echo @$value['city_name'];?></p>
                                                    <p class="art_para"><?php echo @$value['about'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                       
                                </div>
                              <?php } } ?>            
                                </div>
                          </div>
                  <!-- Left and right controls -->
                          <div class="control_list">
                            <a class="carousel-control-prev" href="#artist_profile" data-slide="prev">
                              <span><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                            </a>
                            <a class="carousel-control-next" href="#artist_profile" data-slide="next">
                              <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div> 
               </div>
          </div>
      </div>
</section>

<!----------================end-featured_section===============---------->
<!----------================one_piece_section===============---------->
<section class="one_piece">
<div class="container">
    <div class="row">
        <div class="col-md-8 padl_0">
            <div class="one_piece_div">
               <div class="one_piece_overlay">
                   <div class="piece_cont">
                       <h3><?php echo @$onepiece_ads[2]['ads_content_'.lang];?></h3>
                       <p><?php echo @$onepiece_ads[2]['sub_content_'.lang];?></p>
                       <a href="<?php echo base_url();?>website/one_piece_products"><button class="btn btn-success shop_btn shop_artist_btn"><?php echo @$language['shop_now'];?></button></a>
                   </div>
               </div>
                <img src="<?php echo base_url().$onepiece_ads[2]['ads_image'];?>">                
            </div>
        </div>
        <div class="col-md-4 padr_0">
            <div class="one_piece_div mr-btm two_pieces">
               <div class="one_piece_overlay">
                   <div class="piece_cont">
                      <a href="<?php echo base_url();?>website/one_piece_products"> <button class="btn btn-success shop_btn shop_artist_btn"><?php echo @$language['shop_now'];?></button></a>
                   </div>
               </div>
                <img src="<?php echo base_url().$onepiece_ads[1]['ads_image'];?>">
                
            </div>
            <div class="one_piece_div two_pieces">
               <div class="one_piece_overlay">
                   <div class="piece_cont">
                      <a href="<?php echo base_url();?>website/one_piece_products"> <button class="btn btn-success shop_btn shop_artist_btn"><?php echo @$language['shop_now'];?></button></a>
                   </div>
               </div>
                <img src="<?php echo base_url().$onepiece_ads[0]['ads_image'];?>">
                
            </div>
        </div>
    </div>
</div>
</section>
<!----------================end_one_piece_section===============---------->
<!----------================social_section===============---------->
<section class="get_social">
    <div class="container">
       <h3 class="main_heading"><?php echo @$language['get_social'];?></h3>
        <div class="row">
          <?php if($social){
            foreach ($social as $key => $value){ ?>
            <figure class="snip0066 yellow">
              <img src="<?php echo base_url().$value['image'];?>" alt="sample41" />
              <div class="icons">
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
              </div>
              <div class="corner"><i class="fa fa-instagram" aria-hidden="true"></i></div>
            </figure>
          <?php } } ?>            
        </div>
    </div>
</section>
<!----------================end-social_section===============---------->
<script>
    $(document).ready(function(){
    //Event for pushed the video
    $('#artist_profile').carousel({
        pause: true,
        interval: false
    });
});
</script>
<div id="snackbar">Some text some message..</div>
		<script type="text/javascript">
			function favourite(id)
			{
				$.ajax({                
                    url: "<?php echo base_url();?>website/add_favourite_product",
                    type: "POST",
                    data:{'pro_id':id},
                    error:function(request,response)
                    {
                        console.log(request);
                    },                  
                    success: function(result)
                    {
                    	if(result=="faild")
                    	{
                    		window.location.href="<?php echo base_url();?>website/login";
                    	}
                    	else
                    	{
                    		$("#snackbar").html(result);                
                              myFunction();
                              setTimeout(function(){
									    location = ''
									  },3000)
                    	}
                      
                    }
                });
			}
		</script>