<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userrolemodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_user_roles($id=false)
    {
		$query = $this->db->get_where('user_role', array('user_id' => $id));
		$results =  $query->result_array();
		
		$roles = array();
		
		foreach($results as $row)
		{
			$roles[$row['role_id']] = 1;
		}
		
		return $roles;
	}
	
	function clear_roles($id)
	{
		$this->db->delete('user_role', array('user_id' => $id));
	}
	
	function add_roles($data=array())
	{
		$user_id = $data['user_id'];
		
		foreach($data['role_id'] as $role_id)
		{
			$this->db->insert('user_role',
				array('user_id'=>$user_id,'role_id'=>$role_id)
			); 
		}
	}
}
