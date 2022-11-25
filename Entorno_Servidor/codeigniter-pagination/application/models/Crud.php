<?php
class Crud extends CI_Model{
    
    

	function get_data($table)
	{   
	   $data= $this->db->get($table);
	   return $data->result();		
	} 

	
	
	function selectdatainlimit($limit, $start,$table)
	{
	    $this->db->order_by('addeddate',"desc");
	    $this->db->limit($limit, $start);
		$data= $this->db->get($table);
		return $data->result();
	}

    	

	
}

