<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {        
         parent::__construct();
         $this->load->library('email');
		 $this->load->helper('mail');
		 $this->load->library('parser');
    }

	public function index()
	{
		if($this->session->userdata('auth_level'))
		{ 
			redirect('admin/dashboard');
		}else{
			redirect('admin/index');
		}
		
	}

	//login function
	public function login(){
		$data = $this->input->post('data');

		if($data){
			 $pwd = $data['password'];
			$data['auth_level']=9;
			unset($data['password']);
			$auth_data = $this->db->select("*")->from('users')->where($data)->get()->row_array();
			echo $this->db->last_query();
			exit();
			print_r($auth_data);
		exit();		 
			if($auth_data){
				if($pwd==base64_decode($auth_data['password'])){	
					//echo $auth_data['user_name'];		
					$this->session->set_userdata('username',$auth_data['user_name']);
					$this->session->set_userdata('email',$auth_data['email']);
					$this->session->set_userdata('auth_level',$auth_data['auth_level']);
					$this->session->set_userdata('user_id',$auth_data['user_id']);
					if($auth_data['auth_level']==9){
							redirect("admin/index");
					}
					else
					{
						$e_data['error'] = "Please check login credentials";
					$this->load->view('login.php', $e_data);
					}
				}
				else
				{
					$e_data['error'] = "Please check login credentials";
					$this->load->view('login.php', $e_data);
				}
				//if user is admin redirect to admin page
				
			
		}else{
				$e_data['error'] = "Please check login credentials";
				$this->load->view('login.php', $e_data);

			}
		}
		else{
				$this->load->view('login.php');
		}
		
	}
	
	public function logout(){
		$this->session->sess_destroy();
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('auth_level');
		//$this->session->unset_userdata('role');
		$this->session->unset_userdata('user_id');
		
		redirect('home/login');
	}

	public function forgot_password()
	{
		$this->load->library('parser');
		if($this->input->post('email'))
		{
    		$email = $this->input->post('email');			
			$user_data = $this->db->where('email',$email)->get('users')->row_array();
			
			if($user_data){
				if($user_data['status']==1)
				{
					// Set the link protocol
					$link_protocol =  NULL;
					$enc_id= base64_encode(($user_data['user_id']));
					$link_uri = 'home/recovery_verification/' .$enc_id;
					$view_data['special_link'] = anchor( 
						site_url( $link_uri, $link_protocol ), 
						site_url( $link_uri, $link_protocol ), 
						'target ="_blank"' 
					);
					$template_data['special_link'] = isset($view_data['special_link']) ? $view_data['special_link'] : "";
					$template_data['user_name'] = isset($user_data['user_name']) ? $user_data['user_name'] : "";
					 $message = $this->parser->parse("admin/forgotpasswordmailform.php", $template_data, TRUE); 
					$mail = send_mail($email,'Password Recovery',$message);
					$this->session->set_flashdata('success','Congratulations ! We have sent you an email with instructions on how to recover your account.');
					$this->load->view('forgot-password.php');

				}
				else
				{
			
					$this->session->set_flashdata('error','Your account is in-active please contact admin');
					$this->load->view('forgot-password.php');
				}
			}
			else
			{
				$this->session->set_flashdata('error','No records found for the given email');
				$this->load->view('forgot-password.php');
			}
		}
		else
		{
			$this->load->view('forgot-password.php');
		}
		
	}
	
	public function recovery_verification($uid=""){
	     $uid= base64_decode(($uid));
		$data = $this->input->post();
		if($data){
			$u_data['data'] = $this->common_m->get_user_details($uid);
			if($data['password']==$data['cnf_password']){
				/*if (!preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9@$!%*#?&]{8,20}$/",$data['password'] )) {
					$this->session->set_flashdata('error','Please Ensure that you have at least one lower case letter, one upper case letter, one digit and minimum length 8 characters');
				}*/
				
					$uid = $data['uid'];
					$data['password']=123456;
					$pwd = base64_encode($data['password']);
					$this->db->SET('password',$pwd)->where('user_id',$uid)->update('register');
					$this->session->set_flashdata('success',"Password changed successfully.Please login");
			
			}else{
				$this->session->set_flashdata('error','Password and confirm password does not match');
			}
			$u_data['encode_email'] = @$u_data['data']->email;
			
			$this->load->view('admin/new_password.php',$u_data);

		}else{
			$u_data['data'] = $this->common_m->get_user_details($uid);
			if($u_data['data']){
				if($u_data['data']->status=="inactive"){
					$this->session->set_flashdata('error','Your status is inactive please contact admin');
				}
			}else {
				$this->session->set_flashdata('error','No records found for the user');
			}
			$u_data['encode_email'] = @$u_data['data']->email;
			$this->load->view('admin/new_password.php',$u_data);
		}	
	}
	public function change_password()
	{	$this->data = array();
		$this->data['encode_email'] = $this->input->post('email');
		if(!empty($this->input->post()))
		{
			$email = $this->input->post('email');
			$passwd = $this->input->post('password');
			$cpasswd = $this->input->post('cpassword');
			if($passwd == $cpasswd){
	                $passwd     = base64_encode($passwd);
	                $this->db->where('email',$email);
	                $this->db->update('register',array('password'=>$passwd));
	                $this->data['msg'] = 'Your Password changed Sucessfully!';
	                redirect(base_url().'home/login','refresh');
	           
	         }else{
	         	$this->data['error'] = 'Password not matched';
	         }
	     }
		$this->load->view('admin/new_password',$this->data);
	}
	
	public function resize2()
	{
        $file = $save = 'assets/uploads/products/154643514256l81546435099591.jpg';
        list($width, $height) = getimagesize($file) ;
             $modwidth = 150;

             $diff = $width / $modwidth;

             $modheight = $height / $diff;
             $tn = imagecreatetruecolor($modwidth, $modheight) ;
             $image = imagecreatefromjpeg($file) ;
             imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

             imagejpeg($tn, $save, 100) ;
    }
	
}
