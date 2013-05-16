<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->data['login'] =true;
		$this->data['title'] =array(
		 'site_name'=>$this->config->item('site_title'),
		 'page_title'=>'Admin Panel'
		);
		
		$this->data['is_admin'] = true;
		
		$this->load->model('permissionmodel','permission');
	}

	public function index()
	{	
		array_push($this->data['title'],'Permission Management');
		$this->data['permissions'] = $this->permission->get_permissions();
		
		if($this->session->flashdata('system_message')!==false)
		{
			$this->data['system_message'] = $this->session->flashdata('system_message');
		}
		
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/permission/list',$this->data);
		$this->load->view('partials/footer');
	}
	
	public function add()
	{
		$data = array(
			'id'=>false,
			'name'=>$this->input->post('permission_name')
		);
		$this->permission->edit($data);
		
		$message = array(
			'text'=>'Added User Permission',
			'class'=>'success'
		);
		
		$this->session->set_flashdata('system_message',$message);
		redirect(base_url().'permission');
	}
	
	public function edit($id=false)
	{
		$data = array(
			'id'=>$this->input->post('id'),
			'name'=>$this->input->post('permission_name')
		);
		
		if($data['id']!=false && $data['name']!=false)
		{
			$this->permission->edit($data);
		
			$message = array(
				'text'=>'Updated Permission',
				'class'=>'success'
			);
		
			$this->session->set_flashdata('system_message',$message);
			redirect(base_url().'permission');
			exit();
		}
		
		$this->data['permission'] = $this->permission->get($id);
		
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/permission/add',$this->data);
		$this->load->view('partials/footer');
	}
	
	public function delete($id=false)
	{
		$confirmed = $this->input->post('confirmed');
		if($confirmed!==false)
		{
			$this->permission->delete($id);
			$message = array(
				'text'=>'Deleted Permission',
				'class'=>'success'
			);
		
			$this->session->set_flashdata('system_message',$message);
			redirect(base_url().'permission');
			exit();
		}
		
		$this->data['permission'] = $this->role->get($id);
		
		$this->load->view('partials/header',$this->data);
		$this->load->view('admin/permission/delete',$this->data);
		$this->load->view('partials/footer');
	}
}

