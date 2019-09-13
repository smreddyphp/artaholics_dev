<script src="<?php echo base_url();?>assets/website/js/paginateIt.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<style>
	.dot {
		height: 25px;
		width: 25px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline-block;
        position:relative;
	}
	.color_list .custom-control-label::before {
		position: absolute;
		top: 5px;
		left: -10px;
		display: block;
		width: 1rem;
		height: 1rem;
		pointer-events: none;
		content: "";
		background-color: #fff;
		border: #adb5bd solid 1px;
	}
	.color_list .custom-control-label::after {
		position: absolute;
		top: 5px;
		left: -10px;
		display: block;
		width: 1rem;
		height: 1rem;
		content: "";
		background: no-repeat 50%/50% 50%;
	}
	.color_list .radio {
		padding-left: 15px;
		line-height: 28px;
		color: #404040;
		cursor: pointer;
		position: Relative;
		margin-right: 15px;
		margin-bottom: 25px;
	}
	.hert {
		color: #f00d0d;
	}
	.custom-checkbox .custom-control-input:indeterminate~.custom-control-label::after {
		background-image: none !important;
	}
	.custom-checkbox .custom-control-input:indeterminate~.custom-control-label::before {
		border-color:initial !important;
		background-color:initial !important;
	}
	.list-wrapper {
	padding: 15px;
	overflow: hidden;
}



.list-item h4 {
	color: #FF7182;
	font-size: 18px;
	margin: 0 0 5px;	
}

.list-item p {
	margin: 0;
}

.simple-pagination ul {
	margin: 0 0 20px;
	padding: 0;
	list-style: none;
	text-align: center;
}

.simple-pagination li {
	display: inline-block;
	margin-right: 5px;
}

.simple-pagination li a,
.simple-pagination li span {
	color: #666;
	padding: 5px 10px;
	text-decoration: none;
	border: 1px solid #EEE;
	background-color: #FFF;
	box-shadow: 0px 0px 10px 0px #EEE;
}

.simple-pagination .current {
	color: #FFF;
	background-color: #FF7182;
	border-color: #FF7182;
}

.simple-pagination .prev.current,
.simple-pagination .next.current {
	background: #e04e60;
}
.hide{
    display:none;
}
.loader-open{
    overflow:hidden;
}

</style>
<div class="page_strip">
	<div class="container">
		<div class="row">
			<div class="strip_box">
				<p><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp; - &nbsp; <?php echo @ucwords($category_name);?></p>
			</div>
		</div>
	</div>
</div>
<!----------===============women_section===============---------->
<section class="women_section">
	<div class="container">
		<div class="row">
			
			<div class="col-md-3">
				<form id="search_items" method="post">
				<div class="filters_div">
					<h3><?php echo @$language['categories'];?></h3>
					<div class="container demo">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<?php 
							if(@$categories)
							{
								foreach (@$categories as $key => $value) {
									$sub_categories = $this->db->where(array("cat_id"=>$value['cat_id'],"status"=>1))->get("sub_categories")->result_array();
									?>
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingOne">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#ca<?php echo @$value['cat_id'];?>" aria-expanded="<?php if(@$cat_id==@$value['cat_id']){ echo 'true'; }else{ echo 'false';}?>" aria-controls="collapseOne">
													<?php echo @$value['category_name_'.lang]?>
												</a>
												<?php if(@$cat_id==@$value['cat_id'])
												{
												 ?><input type="hidden" name="data[category]" value="<?php echo @$cat_id;?>"><?php
												  } ?>
												
											</h4>
										</div>
										<div id="cat<?php echo @$value['cat_id'];?>" class="panel-collapse <?php if(@$cat_id==@$value['cat_id']){ echo 'show'; }else{ echo 'collapse';}?>" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												<ul class="info_list">
													<?php foreach(@$sub_categories as $keys=>$sub_cat){?>
														<li>
															<div class="custom-checkbox">
																<input type="radio" name="data[subcategory]" class="custom-control-input" id="customCheck<?php echo @$sub_cat['pcat_id'];?>" value="<?php echo @$sub_cat['pcat_id'];?>">
																<label class="custom-control-label" for="customCheck<?php echo @$sub_cat['pcat_id'];?>"><?php echo @$sub_cat['pcat_name_'.lang]?></label>
															</div>
														</li>
													<?php } ?>					    
												</ul>					 
											</div>
										</div>
									</div>
								<?php } } ?>			
								<!-- <div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingSeven">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#OnePiece" aria-expanded="false" aria-controls="collapseOne">
												One Piece
											</a>
										</h4>
									</div>
									<div id="OnePiece" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">

										</div>
									</div>
								</div> -->
							</div><!-- panel-group -->
						</div><!-- container -->
					</div>
					<div class="filters_div">
						<h3><?php echo @$language['refine_search'];?></h3>
						<div class="container demo">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#Color" aria-expanded="true" aria-controls="collapseOne">
												<?php echo @$language['color'];?>
											</a>
										</h4>
									</div>
									<div id="Color" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<ul class="color_list">
												<div class="row">
													<?php if($colors){
														foreach ($colors as $key => $value) { ?>
															<div class="radio red"> <div class="custom-checkbox">
																<input type="checkbox" class="custom-control-input" value="<?php echo @$value['color_id'];?>" id="customCheck_color1<?php echo @$key;?>" name="data[color][]">
																<label class="custom-control-label" for="customCheck_color1<?php echo @$key;?>">
																	<span class="dot" style="background-color:<?php echo @$value['color_code'];?>"></span>
																</label>
															</div>
														</div>
													<?php } } ?>                         
												</div>					    
											</ul>					
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingTwo">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#Size" aria-expanded="false" aria-controls="collapseOne">
												<?php echo @$language['size'];?>
											</a>
										</h4>
									</div>
									<div id="Size" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<ul class="size_list">
												<?php if($sizes){
													foreach ($sizes as $key => $value) { ?>
														<li>
															<div class="custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="custom<?php echo @$key;?>" name="data[size][]" value="<?php echo @$value['size_id'];?>">
																<label class="custom-control-label" for="custom<?php echo @$key;?>"><?php echo @$value['size'];?></label>
															</div>
														</li>
													<?php } } ?>				    
												</ul> 
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingThree">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#Prize" aria-expanded="false" aria-controls="collapseOne">
													<?php echo @$language['prize'];?>
												</a>
											</h4>
										</div>
										<div id="Prize" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												<div class="prize_range">													
														<input type="text" name="data[min_price]" placeholder="Minimum" class="form-control">
														<input type="text" name="data[max_price]" placeholder="Maximum" class="form-control">
												</div> 
											</div>
										</div>
									</div>
									<div class="col-md-12 apply_btn">
										<button type="button" class="btn btn-success shop_btn search_items"><?php echo @$language['apply'];?></button>
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>
				
					<div class="col-md-9">
						<div class="filter_result">
							
							<div class="sort_box">
								<div class="row">
									<div class="col-md-6">
										<h4><?php echo @ucwords($category_name);?></h4>
									</div>
									<div class="col-md-6">
										<div class="form-inline sort_by">
											<label for="sel1"><?php echo @$language['sort_by'];?> &nbsp; : &nbsp;</label>
											<select class="form-control show_by" onchange="search_products(this.value,'<?php echo @$cat_id; ?>');">
												<option value="1" selected><?php echo "All";//@$language['best_selling'];?></option>
												<option value="2"><?php echo @$language['best_selling'];?></option>
												<option value="3"><?php echo @$language['featured'];?></option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div id="search_result">
							<div class="row" id="search_resulst" paginate="9" >
								<?php if($products)
								{
									foreach ($products as $key => $value){ ?>
										<div class="col-md-4 col-sm-4">											
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
									<?php	} }else{ ?>
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
								</div>    
								</div>    
							</div>
						</div>                
					</div>
				</div>
			</div>
		</section>
		<div id="snackbar">Some text some message..</div>
		<div class="loader_bg hide">
        <div class="loader5"></div>
      </div>
      <script> 
        $(document).ready(function() { 
            $("button").click(function() { 
                $(".loader_bg").hasClass("hide"); 
            }); 
        }); 
    </script> 
		<script type="text/javascript">

			function loader_on()
			{
				$(".loader_bg").removeClass("hide");
				$("body").addClass("loader-open");
				
			}

			function loader_off()
			{
				$(".loader_bg").addClass("hide");
				$("body").removeClass("loader-open");
			}

			function search_products(value,category)
			{
				loader_on();
				if(value==1)
				{
					setTimeout(function(){
					loader_off();		            
                    	location.reload();
					},3000);
				}
				
				$.ajax({                
                    url: "<?php echo base_url();?>website/search_items_by_periority",
                    type: "POST",
                    data: {value:value,cat_id:category},                 
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result)
                    {
                    	setTimeout(function(){
									    loader_off();		            

                    	$("#search_result").html(result);
									  },3000)
                    }
                });
			}

			 $('.search_items').click(function(){
			 	loader_on();		            
                var data = new FormData($('#search_items')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>website/search_products",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    error:function(request,response){
                        console.log(request);
                    },                  
                    success: function(result)
                    {
                    	setTimeout(function(){
									    loader_off();		            
                    	$("#search_result").html(result); 
									  },3000)
                    	                    
                    }
                });
        });
      </script>
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
									  },3000);
                    	}
                      
                    }
                });
			}
		</script>
		<script>
var items = $(".list-wrapper .list-item");
    var numItems = items.length;
    var perPage = 6;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });
		</script>
		