<?php
class Language extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
    }
 
   public function change_lang()
   {    
        $lang =  $this->input->get('lang');        
        $url  =  (@$_SESSION['current_url'])?$_SESSION['current_url']:base_url();
        $lang = ($lang != "") ? $lang : "en";
        $this->session->set_userdata('lang', $lang);
		redirect($url,'refresh');
    }
}
