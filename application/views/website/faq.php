<div class="page_strip">
    <div class="container">
        <div class="row">
            <div class="strip_box">
                <p><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i></a> &nbsp;- &nbsp; FAQ's</p>
            </div>
        </div>
    </div>
</div>

<!----------==============faq_section==================------------>
<section class="faq_section">
    <div class="container">
        <h3 class="main_heading">faq</h3>
     <div class="row">
         <div class="faq_div">
         	<?php foreach($faqs as $key=>$value){?>
             <div class="question">
                 <h4><?php echo @$value['question'];?></h4>
             </div>
             <div class="answer">
                 <p><?php echo @$value['answer'];?>
                </p>
             </div>
         <?php } ?>
             <!-- <div class="question q2">
                 <h4>Is there a minimum or maximum number of designs I should upload?</h4>
             </div>
             <div class="answer">
                 <p>Nope. You can upload as few or as many designs as you want. But, keep in mind that customers love options — which means adding more designs can maximize your sales potential! Cha-ching! Plus, a solid collection of designs helps reaffirm your status as an established artist — which adds value to your designs.
                </p>
             </div>
             <div class="question q2">
                 <h4>Will I be credited for my work?</h4>
             </div>
             <div class="answer">
                 <p>Absolutely! Your recognition as an artist is just as important to us as it is to you. In fact, once you sign up, you create your own profile so there’s no doubt about who created your jaw-dropping designs. From then on out, all the designs you upload and adjust on our products will be located in your profile. Your name will also be visible in the public category pages where people can see the artist who created that specific design! To further personalize your profile (and attract more visitors) you can add your add your own profile picture.
                </p>
             </div> -->
         </div>
     </div>
    </div>
</section>