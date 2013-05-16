<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->data['login'] =true;
		$this->data['title'] =array(
		 'site_name'=>$this->config->item('site_title'),
		 'page_title'=>'Admin Panel'
		);
		
		$this->data['is_admin'] = true;
		
		$this->load->model('rolemodel','role');
	}

	public function index()
	{	
		array_push($this->data['title'],'Permission Management');
		$this->data['roles'] = $this->role->get_roles();
		
		if($this->session->flashdata('system_message')!==false)
		{
			$this->data['system_message'] = $this->session->flashdata('system_message');
		}
		
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/role/list',$this->data);
		$this->load->view('partials/footer');
	}
	
	public function add()
	{
		$data = array(
			'id'=>false,
			'name'=>$this->input->post('role_name')
		);
		$this->role->edit($data);
		
		$message = array(
			'text'=>'Added User Role',
			'class'=>'success'
		);
		
		$this->session->set_flashdata('system_message',$message);
		redirect(base_url().'role');
	}
	
	public function edit($id=false)
	{
		$data = array(
			'id'=>$this->input->post('id'),
			'name'=>$this->input->post('role_name')
		);
		
		if($data['id']!=false && $data['name']!=false)
		{
			$this->role->edit($data);
		
			$message = array(
				'text'=>'Updated User Role',
				'class'=>'success'
			);
		
			$this->session->set_flashdata('system_message',$message);
			redirect(base_url().'role');
			exit();
		}
		
		$this->data['role'] = $this->role->get($id);
		
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/role/add',$this->data);
		$this->load->view('partials/footer');
	}
	
	public function delete($id=false)
	{
		$confirmed = $this->input->post('confirmed');
		if($confirmed!==false)
		{
			$this->role->delete($id);
			$message = array(
				'text'=>'Deleted User Role',
				'class'=>'success'
			);
		
			$this->session->set_flashdata('system_message',$message);
			redirect(base_url().'role');
			exit();
		}
		
		$this->data['role'] = $this->role->get($id);
		
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/role/delete',$this->data);
		$this->load->view('partials/footer');
	}
}

