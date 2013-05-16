<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campsite extends Admin_Controller {
	public function __construct()
	{
		$this->model = 'campsite';
		parent::__construct();
	}
}

