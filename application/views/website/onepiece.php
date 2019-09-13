<style>
    .onepiece_row{
        list-style-type:none;
    }
    .onepiece_row .img_box img{
        height:200px;
    }
    .bottom_pagination{
    width:100%;
    overflow:hidden;
    clear:both;
}
.bottom_pagination ul{
    background-color:transparent !important;
    float:right !important;
    width:auto !important;
    list-style-type:none;
}
.bottom_pagination ul li{
    padding:0px !important;
    float:left;
}
.bottom_pagination ul li a{
        padding: 10px 15px !important;
    background-color:#fff ;
    margin-left: 15px !important;
    display: -webkit-inline-box;
    color:#000;
}
.bottom_pagination li a.current{
    background-color:#E2E1E6;
    color: rgba(0,0,0,.5) !important;
}
.hert {
        color: #f00d0d;
    }
</style>
<div class="page_strip">
    <div class="container">
        <div class="row">
            <div class="strip_box">
                <p><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp;- &nbsp; <?php echo (lang=="ar")?"قطعه":"One Piece";?></p>
            </div>
        </div>
    </div>
</div>

<!----------===============artist_section===============---------->
<section class="onepiece_section">
    <div class="container">
        <h3 class="main_heading"><?php echo (lang=="ar")?"قطعه":"One Piece";?></h3>
        <ul class="row onepiece_row">
            <?php
            if($onepiece_products)
            {
                foreach ($onepiece_products as $key => $value) { ?>
                    <li class="col-md-3 line-content3">
                       
                        <div class="featured_div">
                            <div class="img_box">
                               <div class="fea_overlay">
                                <span onclick="favourite(this.id)" id="<?php echo $value['pro_id'];?>"><i class="<?php if(@$favourites){ if(in_array(@$value['pro_id'],@$favourites)){ echo 'hert';} }?> fa fa-heart" aria-hidden="true"></i>
                                </span>                               
                            </div>
                            <img src="<?php echo base_url().@$value['product_image'];?>" style="object-fit: contain;">
                            </div>
                            <a href="<?php echo base_url();?>website/one_piece_product_view/<?php echo $value['pro_id'];?>" class="feature_a">
                                 <p class="fea_art"><?php echo 'By '.@$this->website_Model->get_user($value['user_id'])['first_name'];?><span class="rate">SAR <?php echo @$value['price'];?></span></p> </a> 
                        </div>              
                    </li>
                    <?php
                }
            }
            ?>
            </ul>
             <div class="bottom_pagination">
            <ul id="pagin3">
               
    </ul>
    </div>
    </div>
</section>
<script>
pageSize = 8;

	var pageCount =  $(".line-content3").length / pageSize;
    
     for(var i = 0 ; i<pageCount;i++){
        
       $("#pagin3").append('<li><a href="#">'+(i+1)+'</a></li> ');
     }
        $("#pagin3 li").first().find("a").addClass("current")
    showPage = function(page) {
	    $(".line-content3").hide();
	    $(".line-content3").each(function(n) {
	        if (n >= pageSize * (page - 1) && n < pageSize * page)
	            $(this).show();
	    });        
	}
    
	showPage(1);

	$("#pagin3 li a").click(function() {
	    $("#pagin3 li a").removeClass("current");
	    $(this).addClass("current");
	    showPage(parseInt($(this).text())) 
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