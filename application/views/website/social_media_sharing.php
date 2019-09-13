<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>.::Artaholics::.</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:url"         content="<?php echo current_url(); ?>" />
	<meta property="og:type"        content="article" />
	<meta property="og:title"       content="<?php echo  $product_details['product_name'] ; ?>" />
	<meta property="og:description" content="<?php echo  $product_details['description'] ; ?>" />
	<meta property="og:image"       content="<?php echo  base_url().$product_details['product_image'] ; ?>" />
</head>
<body>
</body>		
		<?php $url = base_url().'website/product_view/'.$product_id; ?>
	<p>
	    <a href="https://twitter.com/intent/tweet?text=<?php echo $url; ?>" class="btn btn-social-icon btn-twitter" >
	      <span class="fa fa-twitter twitter" style="color: white;font-size: 30px;"></span>
	    </a>
	    <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"  class="btn btn-social-icon btn-twitter">
	      <span class="fa fa-facebook-f facebook" style="color: white;font-size: 30px;"></span>
	    </a>
	    <a href="https://www.linkedin.com/cws/share?url=<?php echo $url; ?>"  class="btn btn-social-icon btn-twitter" >
	      <span class="fa fa-linkedin linkedin" style="color: white;font-size: 30px;"></span>
	    </a>
	    <a href="https://www.instagram.com/?url=<?php echo $url; ?>"  class="btn btn-social-icon btn-instagram" >
	      <span class="fa fa-instagram instagram" style="color: white;font-size: 30px;"></span>
	    </a>
	    <a href="https://plus.google.com/share?url=<?php echo $url; ?>"  class="btn btn-social-icon btn-twitter" >
	      <span class="fa fa-google-plus google" style="color: white;font-size: 30px;"></span>
	    </a>
  </p>  



</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

	var website = '<?php echo $website ; ?>';

	$("."+website).click();


})

	
</script>