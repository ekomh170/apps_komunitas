<?php

class Sub_model extends CI_Model {
	public function GetDataSub()
	{
		$query = $this->db->get('tb_user_sub_menu');
		return $query->result_array();
	}

	public function TambahDataSub()
	{
		$id = $this->input->post('id', true);
		$id_menu = $this->input->post('id_menu', true);
		$title = $this->input->post('title', true);
		$url = $this->input->post('url', true);
		$icon = $this->input->post('icon', true);
		$is_active = $this->input->post('is_active', true);

		$data = array(
			'id' => $id,
			'id_menu' => $id_menu,
			'title' => $title,
			'url' => $url,
			'icon' => $icon,
			'is_active' => $is_active
		);
	
		$this->db->insert('tb_user_sub_menu', $data);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Sub", "Menambah Data", $title, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}

	public function HapusDataSub($id)
	{
		$this->db->delete('tb_user_sub_menu', ['id' => $id]);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Sub", "Hapus Data", $id, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}

	public function IdentitasDataSub($id)
	{
		return $this->db->get_where('tb_user_sub_menu', ['id' => $id])->row_array();
	}


	public function CariDataSub()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('title', $cari);
		$this->db->or_like('url', $cari);
		return $this->db->get('tb_user_sub_menu')->result_array();
	}

	public function UbahDataSub()
	{
		$data = [
			"id" => $this->input->post('id', true),
			"id_menu" => $this->input->post('id_menu', true),
			"title" => $this->input->post('title', true),
			"url" => $this->input->post('url', true),
			"icon" => $this->input->post('icon', true),
			"is_active" => $this->input->post('is_active', true)
		];

		$this->db->where('id',  $this->input->post('id'));
		$this->db->update('tb_user_sub_menu', $data);
		$title = $this->input->post('title', true);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Sub", "Ubah Data", $title, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}	
}	