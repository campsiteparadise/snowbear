<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends MY_Model {



    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function count_all()
    {
		$sql = "
			SELECT count(*) AS `user_count` FROM `user`;
		";
		
		$result = $this->db->query($sql);
		
		return $result->row()->user_count;
	}
	
	function get($id=false)
	{
		$query = $this->db->get_where('user', array('id' => $id));
		return $query->row(); 
	}
	
	function get_users()
	{
		$users = array();
		
		$query = $this->db->get('user');
		
		if(count($query->result())>0)
		{
			foreach($query->result() as $row)
			{
				$users[] = $row;
			}
			
			return $users;
		}
		
		return false;
	}
	
	function login($data = array())
	{
		foreach(array('username','password') as $field)
		{
			if(!isset($data[$field])||$data[$field]==false)
			{
				return false;
			}
		}
		
		$result = $this->db->get_where('user',array('username'=>$data['username'],'password'=>$data['password']));
		$ret = $result->row_array();
		
		if(isset($ret['id']))
		{
			$this->set_last_login($ret['id'],date('Y-m-d H:i:s'));
			unset($ret['password']);
			return $ret;
		}
		
		return false;
	}
	
	function set_last_login($id,$datetime)
	{
		$this->db->update('user',array('last_login'=>$datetime),array('id'=>$id));
		
		return true;
	}
	
	function delete($id)
	{
		$this->db->delete('user', array('id' => $id)); 
		return true;
	}
	
	function save($params=array())
	{
		if($params['id']=='')
		{
			$this->db->insert('user', $params);
		}
		else
		{
			$id = $params['id'];
			unset($params['id']);
			$this->db->where('id', $id);
			$this->db->update('user', $params); 
		}
		
		return true;
	}
	
	public function get_field_data()
	{
		parent::get_field_data();
	}
}
