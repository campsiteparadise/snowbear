<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rolepermissionmodel extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get($role_id=false)
    {
		$assigned = array();
		$sql = "
			SELECT 
				RP.`id` AS `assignment_id`,
				RP.`permission_id`
			FROM
				`role` R
			JOIN
				`role_permission` RP
			ON
				R.`id`=RP.`role_id`
			WHERE
				R.`id`=?
		";
		$query = $this->db->query($sql, array('id' => $role_id));
		
		$ass = $query->result_array();
		
		if(count($ass)>0)
		{
			foreach($ass as $a)
			{
				$assigned[$a['permission_id']] = $a['assignment_id'];
			}
		}		
		
		$sql = "
			SELECT `id`,`name` FROM `permission`
		";
		
		$query = $this->db->query($sql);
		$list = $query->result_array();
		
		return array('list'=>$list,'assigned'=>$assigned);
	}
	
	function clear($id)
	{
		$this->db->where('role_id', $id);
		$this->db->delete('role_permission'); 
	}
	
	function insert_batch($role_id,$permissions = array())
	{
		if(empty($permissions))
		{
			return false;
		}
		
		foreach($permissions as $permission)
		{
			$row = array(
				'role_id'=>$role_id,
				'permission_id'=>$permission
			);
			$this->db->insert('role_permission',$row); 
		}
		
		$sql = 'SELECT count(*) AS `count` FROM `role_permission` WHERE `role_id`=?';
		$query = $this->db->query($sql,array('role_id'=>$role_id));
		$result = $query->row();
		
		return $result->count;
	}
}
