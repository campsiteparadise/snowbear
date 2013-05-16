<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_library{
	function __construct()
	{
		$this->CI = &get_instance();
		$this->user_key = 'Buttersc0tch_';
	}
	
	public function validate($params)
	{
		$errors = array();
		$required = array_keys($params);
		foreach($required as $field)
		{
			if($params[$field]==''&&$field!='id')
			{
				$errors[] = 'Required field empty';
				break;
			}
		}
		
		if($params['password']!=$params['repeat_password'])
		{
			$errors[]='Passwords do not match';
		}
		
		if(count($errors)>0)
		{
			return array('errors'=>$errors,'fields'=>$fields);
		}
		
		$params['password'] = sha1($this->user_key.$params['password']);
		unset($params['repeat_password']);
		
		return array('fields'=>$params);
	}
	
	function encode_password($pass)
	{
		return sha1($this->user_key.$pass);
	}
	
	function check_login($params=array())
	{
		$this->errors = array();
		
		if($params['password']=='')
		{
			$this->errors['password'] = 'Missing password';
		}
		
		if($params['username']=='')
		{
			$this->errors['username'] = 'Missing username';
		}
		
		if(count($this->errors)>0)
		{
			return $this->errors;
		}
		
		return true;
	}
}
