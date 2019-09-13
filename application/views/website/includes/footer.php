<!----------================footer_section===============---------->
<section class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer_col rtl_footer_col">
                <div class="footer_info rtl_nobrdr">    
                    <h4><?php echo @$footer['contact_us'];?></h4>
                    <p><?php echo @$footer['phone'];?> : <?php echo @$contact_us['phone'] ; ?></p>
                    <p><?php echo @$footer['email'];?> :  <?php echo @$contact_us['email'] ; ?></p>
                </div>
            </div>
            <div class="col-md-4 footer_col">
                <div class="footer_info">    
                    <h4><?php echo @$footer['news_letter'];?></h4>
                    <form method="post" action="" id="subscription">
                    <div class="input-group mb-3">
                      <input type="email" class="form-control" placeholder="Email" id="demo" name="data[email]">
                      <div class="input-group-append">
                        <span class="input-group-text subscription"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></span>
                      </div>
                    </div>
                  </form>
                </div>
                </div>
                <div class="col-md-4 rtl_footer_col testinomial_footer">
                <div class="footer_info no_brdr">    
                    <h4><?php echo @$footer['test_nomials'];?></h4>
                    <div id="testinomial" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#testinomial" data-slide-to="0" class="active"></li>
    <li data-target="#testinomial" data-slide-to="1"></li>
    <li data-target="#testinomial" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <?php if(@$testmonials){
      foreach ($testmonials as $key => $value) {        
      ?>
        <div class="carousel-item <?php echo ($key==0)?'active':'';?>">
          <p class="testinomial_para"><i class="fa fa-quote-left" aria-hidden="true"></i>&nbsp;&nbsp;
          <?php echo @$value['content_'.lang];?>   
             
               &nbsp;  &nbsp;  <i class="fa fa-quote-right" aria-hidden="true"></i></p>
               <p class="test_author"><small>&nbsp;-&nbsp; <?php echo @$value['name'];?></small></p>
        </div>
  <?php } } ?>   
  </div>
</div>
                   
                </div>
                </div>
                <div class="col-md-12">
                    <div class="footer_icons">
                        <span>
                            <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href=""><i class="fa fa-google" aria-hidden="true"></i></a>
                            <a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a>
                            <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>   
                        </span>
                    </div>
                </div>
           
        </div>
    </div>
    <div class="cards">
       <div class="line_bg"></div>
        <div class="cards_img">
            <img src="<?php echo base_url();?>assets/website/images/creditcards.png">
        </div>
        <div class="line_bg2"></div>
    </div>
    <div class="container footer_least">
        <div class="row">
            <div class="col-md-12">
                <div class="footer_menu">
                    <ul>
                      <li><a href="<?php echo base_url();?>website/about_us"><?php echo @$footer['about_us'];?></a></li>
                      <!-- <li><a href="custom.php">custom t-shirts</a></li> -->
                      <li><a href="<?php echo base_url();?>website/faq"><?php echo @$footer['faq'];?></a></li>
                      <li><a href="<?php echo base_url();?>website/contact_us"><?php echo @$footer['contact_us'];?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="copy_right">
                    <p>&copy; 2019 Artaholics all Rights Reserved.</p>
                </div>
            </div>
        </div>
        <div class="top_box scroll-top-wrapper">
           <a href="#artaholics_header" class="go_topa">
            <img src="<?php echo base_url();?>assets/website/images/small%20logo.png">
            <p><?php echo @$footer['top'];?></p>
            </a>
        </div>
    </div>
</section>
</body>
 <script type="text/javascript">
        $("#subscription").validate({       
            rules: {                
                "data[email]"   : "required",
            },
            messages:{
              "data[email]" :"Email Required",
            } 
        });
    $('.subscription').click(function(){       
        var validator = $("#subscription").validate();
            validator.form();
            if(validator.form() == true){                 
                var data = new FormData($('#subscription')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>website/email_subscription",
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
                        $("#snackbar").html(result);
                      document.getElementById("subscription").reset();                  
                         myFunction();
                    }
                });
            }
        });
      </script>  
<script type="text/javascript">
	  /* Demo purposes only */
  $("figure").mouseleave(
    function() {
      $(this).removeClass("hover");
    }
  );
</script>
<script>
function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
}

function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
}
</script>
<script>
			/*function openPro() {
				document.getElementById("myNavpro").style.width = "50%";
			}

			function closePro() {
				document.getElementById("myNavpro").style.width = "0%";
			}*/
		</script>
<script>
    $(document).ready(function(){

$(function(){
 
	$('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 1000, 'linear');
}

});
</script>

<style>
.loader {
  border: 4px solid #f3f3f3;
  display: none;
  border-radius: 50%;
  border-top: 4px solid #3498db;
  width: 40px;
  height: 40px;
  -webkit-animation: spin 1.5s linear infinite; /* Safari */
  animation: spin 1.5s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>


</html>