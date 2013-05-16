<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->data['login'] =true;
		$this->data['title'] =array(
		 'site_name'=>$this->config->item('site_title'),
		 'page_title'=>'Login'
		);
		
		$this->load->library('user_library');
		$this->load->model('usermodel','user');
	}

	public function index()
	{	
		$this->load->view('security/login',$this->data);
	}
	
	public function authorise()
	{
		$input = $this->input->post();
		$valid_input = $this->user_library->check_login($input);
		
		if($valid_input==true)
		{
			$input['password'] = $this->user_library->encode_password($input['password']);
			$try_login = $this->user->login($input);
			
			if($try_login!==false)
			{
				$message ='Login succeeded';
				$this->session->set_flashdata('system_message',$message);
				$this->session->set_userdata('user',$try_login);
				
			}
		}
		
		$message = 'Login failed';
		$this->session->set_flashdata('system_message',$message);
		$this->session->set_flashdata('login_errors',$valid_input);
		$this->session->set_flashdata('login_data',$input);
		
		redirect(base_url()."login");
	}
	
}

