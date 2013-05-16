<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissionmodel extends CI_Model {

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
		$query = $this->db->get_where('permission', array('id' => $id));
		return $query->row(); 
	}
    
    function get_permissions()
    {
		$permissions = array();
		
		$query = $this->db->get('permission');
		
		if(count($query->result())>0)
		{
			foreach($query->result() as $row)
			{
				$permissions[] = $row;
			}
			
			return $permissions;
		}
		
		return false;
	}
	
	function edit($data=array())
	{
		$id = $data['id'];
		unset($data['id']);
		
		if($id===false)
		{
			$this->db->insert('permission', $data); 
		}
		else
		{
			$this->db->where('id', $id);
			$this->db->update('permission', $data); 
		}
		
		return true;
	}
	
	function delete($id)
	{
		$this->db->delete('permission', array('id' => $id)); 
		return true;
	}
}
