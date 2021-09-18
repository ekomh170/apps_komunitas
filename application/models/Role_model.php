<?php

class Role_model extends CI_Model {
	public function GetDataRole()
	{
		$query = $this->db->get('tb_user_role');
		return $query->result_array();
	}

	public function TambahDataRole()
	{
		$id = $this->input->post('id', true);
		$role = $this->input->post('role', true);

		$data = array(
			'id' => $id,
			'role' => $role
		);
	
		$this->db->insert('tb_user_role', $data);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Role", "Menambah Data", $role, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}	
	}

	public function HapusDataRole($id)
	{
		$this->db->delete('tb_user_role', ['id' => $id]);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Role", "Hapus Data", $id, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}	
	}

	public function IdentitasDataRole($id)
	{
		return $this->db->get_where('tb_user_role', ['id' => $id])->row_array();
	}



	public function CariDataRole()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('Role', $cari);
		$this->db->or_like('id', $cari);
		return $this->db->get('tb_user_role')->result_array();
	}

	public function UbahDataRole()
	{
		$data = [
			"id" => $this->input->post('id', true),
			"role" => $this->input->post('role', true)
		];

		$this->db->where('id',  $this->input->post('id'));
		$this->db->update('tb_user_role', $data);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Role", "Ubah Data", $id_role, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}
}	