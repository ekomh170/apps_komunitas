<?php

class Pengguna_model extends CI_Model {
	public function getDataKomunitas()
	{
		$this->db->select('tb_user.id, tb_user.nama, tb_komunitas.nama_komunitas, tb_user.alamat, tb_user.email, tb_user.id_role, tb_user.is_active, tb_user.data_created');
		$this->db->from('tb_user');
		$this->db->join('tb_komunitas' , 'tb_komunitas.id_komunitas = tb_user.id_komunitas');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function CariDataPengguna()
	{
		$cari = $this->input->post('cari', true);
		$this->db->select('tb_user.id, tb_user.nama, tb_komunitas.nama_komunitas, tb_user.alamat, tb_user.email, tb_user.id_role, tb_user.is_active, tb_user.data_created');
		$this->db->from('tb_user');
		$this->db->join('tb_komunitas' , 'tb_komunitas.id_komunitas = tb_user.id_komunitas');
		$query = $this->db->get();
		return $query->result_array();
		$this->db->like('nama', $cari);
		$this->db->or_like('nama_komunitas', $cari);
		return $this->db->get()->result_array();
	}

	public function CariDataMemberKommunitas()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('nama', $cari);
		$this->db->or_like('id', $cari);
		return $this->db->get_where('tb_user' , array('nama_komunitas'))->result_array();
	}

	public function HapusDataPengguna($id)
	{
		$this->db->delete('tb_user', ['id' => $id]);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data User", "Hapus Data", $id, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}
}	