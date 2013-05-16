<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rolemodel extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get($id=false)
    {
		$query = $this->db->get_where('role', array('id' => $id));
		return $query->row(); 
	}
    
    function get_roles()
    {
		$roles = array();
		
		$query = $this->db->get('role');
		
		if(count($query->result())>0)
		{
			foreach($query->result() as $row)
			{
				$roles[] = $row;
			}
			
			return $roles;
		}
		
		return false;
	}
	
	function edit($data=array())
	{
		$id = $data['id'];
		unset($data['id']);
		
		if($id===false)
		{
			$this->db->insert('role', $data); 
		}
		else
		{
			$this->db->where('id', $id);
			$this->db->update('role', $data); 
		}
		
		return true;
	}
	
	function delete($id)
	{
		$this->db->delete('role', array('id' => $id)); 
		return true;
	}
}
