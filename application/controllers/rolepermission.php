<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rolepermission extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->data['login'] =true;
		$this->data['title'] =array(
		 'site_name'=>$this->config->item('site_title'),
		 'page_title'=>'Admin Panel'
		);
		
		$this->data['is_admin'] = true;
		
		$this->load->model('rolepermissionmodel','rolepermission');
		$this->load->model('rolemodel','role');
	}

	public function assigned($id)
	{	
		array_push($this->data['title'],'Permission Management');
		
		if($this->session->flashdata('system_message')!==false)
		{
			$this->data['system_message'] = $this->session->flashdata('system_message');
		}
		
		$this->data['role'] = $this->role->get($id);
		$this->data['role_permissions'] = $this->rolepermission->get($id);
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/rolepermission/list',$this->data);
		$this->load->view('partials/footer');
		
	}
	
	public function save()
	{
		$data = $this->input->post();
		
		$role_id = $data['role_id'];
		$this->rolepermission->clear($role_id);
		$result = $this->rolepermission->insert_batch($role_id,$data['permission_id']);
		
		$message = array(
			'text'=>'Assigned role permissions',
			'class'=>'success'
		);
		
		$this->session->set_flashdata('system_message',$message);
		redirect(base_url()."rolepermission/assigned/{$role_id}");
		exit();
	}
	
	public function add()
	{
		
	}
	
	public function edit($id=false)
	{
		
		
	}
	
	public function delete($id=false)
	{
		
	}
}

