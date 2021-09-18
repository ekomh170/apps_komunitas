<?php

class Menu_model extends CI_Model {
	public function GetDataMenu()
	{
		$query = $this->db->get('tb_user_menu');
		return $query->result_array();
	}

	public function TambahDataMenu()
	{
		$id = $this->input->post('id', true);
		$menu = $this->input->post('menu', true);

		$data = array(
			'id' => $id,
			'menu' => $menu
		);
	
		$this->db->insert('tb_user_menu', $data);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Menu", "Menambahkan Data", $menu, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}

	public function HapusDataMenu($id)
	{
		$this->db->delete('tb_user_menu', ['id' => $id]);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Menu", "Hapus Data", $id, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}	
	}

	public function IdentitasDataMenu($id)
	{
		return $this->db->get_where('tb_user_menu', ['id' => $id])->row_array();
	}

	public function UbahDataMenu()
	{
		$data = [
			"id" => $this->input->post('id', true),
			"menu" => $this->input->post('menu', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_user_menu', $data);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Menu", "Ubah Data", 'id', $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}	
}	
