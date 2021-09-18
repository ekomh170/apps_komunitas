<?php

class Akses_model extends CI_Model {
	public function GetDataAkses()
	{
		$query = $this->db->get('tb_user_akses_menu');
		return $query->result_array();
	}

	public function TambahDataAkses()
	{
		$id = $this->input->post('id', true);
		$id_role = $this->input->post('id_role', true);
		$id_menu = $this->input->post('id_menu', true);

		$data = array(
			'id' => $id,
			'id_role' => $id_role,
			'id_menu' => $id_menu,
		);
	
		$this->db->insert('tb_user_akses_menu', $data);
		$id_role = $this->input->post('id_role', true);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Akses", "Menambah Data", $id_role, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}

	public function HapusDataAkses($id)
	{

		$this->db->delete('tb_user_akses_menu', ['id' => $id]);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Akses", "Menambah Data", $id, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}

	public function IdentitasDataAkses($id)
	{
		return $this->db->get_where('tb_user_akses_menu', ['id' => $id])->row_array();
	}

	public function UbahDataAkses()
	{
		$data = [
			"id" => $this->input->post('id', true),
			"id_role" => $this->input->post('id_role', true),
			"id_menu" => $this->input->post('id_menu', true)
		];

		$this->db->where('id',  $this->input->post('id'));
		$this->db->update('tb_user_akses_menu', $data);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Dosen", "Ubah Data","id", $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}	
}	