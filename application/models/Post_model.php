<?php

class Post_model extends CI_Model {
	public function GetDataPost($limit,$offset)
	{
		
		$this->db->select('*');
		$this->db->from('tb_post');	
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	

	
}