<?php  
defined('BASEPATH') or exit('No direct script access allowed');

if( ! function_exists('send_mail') )
{
	function send_mail($to,$subject,$message)
	{
		
		$from = "noreply@artaholics.com";
	    $headers ="From:<$from>\n";
	    $headers.="MIME-Version: 1.0\n";
	    $headers.="Content-type: text/html; charset=iso 8859-1";
	    //mail($to,$subject,$txt,$headers);
	    mail($to,$subject,$message,$headers,"-f$from");
	    return true;
	    

		 /* $CI =& get_instance();
		  
		  $CI->email->initialize(array(
				'protocol'  => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_user' => 'vaalshipping@gmail.com',
				'smtp_pass' => 'vaalshipping123456',
				'smtp_port' => 465,
				'mailtype'  => 'html',
				'crlf'      => "\r\n",
				'newline'   => "\r\n"
			));
			
			
		  $CI->email->from('vaalshipping@gmail.com',strtoupper('ZIDO'));
		  $CI->email->to($to);
		  $CI->email->subject($subject);
		  $CI->email->message($template);
	      
		  $result = $CI->email->send();
		  
		  if($result)
		  {
			return true;
		  }
		  else
		  {
			return false;
		  }*/
	  
	}
}