<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {
	public function __construct()
	{
		$this->model = 'user';
		parent::__construct();
	}

	public function index()
	{	

		$this->data['user_count'] = $this->user->count_all();
		
		$this->data['users'] = $this->user->get_users();
		
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/user/list',$this->data);
		$this->load->view('partials/footer');
	}
	
	public function add()
	{
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/user/form',$this->data);
		$this->load->view('partials/footer');
	}
	
	public function save()
	{
		$data = $this->input->post();
		$this->load->library('user_library');
		$valid = $this->user_library->validate($data);
		
		if(!isset($valid['errors']))
		{
			$this->user->save($valid['fields']);
			
			$message = array(
				'text'=>'Saved User',
				'class'=>'success'
			);
		
			$this->session->set_flashdata('system_message',$message);
			redirect(base_url().'user');
			exit();
		}
		
		$message = array(
			'text'=>'Failed to Save User',
			'class'=>'error'
		);
		
		$this->session->set_flashdata('system_message',$message);
		$this->session->set_flashdata('errors',$valid['errors']);
		$this->session->set_flashdata('fields',$valid['fields']);
		
		if($data['id']=='')
		{
			redirect(base_url()."user/add/");
			exit();
		}
		
		redirect(base_url()."user/edit/{$data['id']}");
		exit();
	}
	
	public function edit($id=false)
	{
		$this->data['user'] = $this->user->get($id);
		
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/user/form',$this->data);
		$this->load->view('partials/footer');
	}
	
	public function delete($id=false)
	{
		$confirmed = $this->input->post('confirmed');
		if($confirmed!==false)
		{
			$this->user->delete($id);
			$message = array(
				'text'=>'Deleted User',
				'class'=>'success'
			);
		
			$this->session->set_flashdata('system_message',$message);
			redirect(base_url().'user');
			exit();
		}
		
		$this->data['user'] = $this->user->get($id);
		
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/user/delete',$this->data);
		$this->load->view('partials/footer');
	}
	
	public function roles($id=false)
	{
		$this->load->model('userrolemodel','user_role');
		$this->load->model('rolemodel','roles');
		
		$this->data['user_roles'] = $this->user_role->get_user_roles($id);
		$this->data['user'] = $this->user->get($id);
		$this->data['roles'] = $this->roles->get_roles();
		
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/user/roles',$this->data);
		$this->load->view('partials/footer');
	}
	
	public function saveroles()
	{
		$data = $this->input->post();
		$user_id = $data['user_id'];
		
		$this->load->model('userrolemodel','user_role');
		
		$this->user_role->clear_roles($user_id);
		$this->user_role->add_roles($data);
		
		$message = array(
			'text'=>'Assigned user roles',
			'class'=>'success'
		);
		
		$this->session->set_flashdata('system_message',$message);
		redirect(base_url()."user/roles/{$user_id}");
		exit();
	}
	
	protected function get_field_info()
	{
		parent::get_field_info();
	}
}

