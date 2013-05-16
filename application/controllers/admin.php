<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {
	public function __construct()
	{
		parent::__construct();
		
	}


	public function index()
	{	
		$this->load->view('partials/header',$this->data);
		$this->load->view('partials/footer');
	}
	
	public function postcode()
	{
		array_push($this->data['title'],'Postcode Management');
		$this->load->view('partials/header',$this->data);
		$this->load->view('partials/footer');
	}
}

