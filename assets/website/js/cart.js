function updatecarSSStitem(value,rowid)
{
	$.ajax({                
            url: "update_item_qty",
            type: "POST",
            data: {'qty':value,'rowid':rowid},                            
            success: function(result)
            {
              //ajax_end();
              /*$("#add_carts").removeAttr("disabled","disabled"); 
              if(result=="faild")
              {
                window.location.href="<?php echo base_url();?>website/login";
              }
              else
              {*/
               //$("#snackbar").html(result);                
               /*myFunction();
               setTimeout(function(){
                location = ''
              },3000)
             }  */           
           }
         });
}