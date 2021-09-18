<?php

class Saran_model extends CI_Model {
	public function GetDataSaran()
	{
		$query = $this->db->get('tb_pertanyaan')->result();
		return $query;
	}

	public function HapusDataSaran($id_pertanyaan)
	{
		$this->db->delete('tb_pertanyaan', ['id_pertanyaan' => $id_pertanyaan]);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Pengguna", "Hapus Data", $id_pertanyaan, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}

	public function getSaranData($limit,$offset)
	{
		$this->db->select('tb_pertanyaan.id_pertanyaan, tb_pertanyaan.jumlah_jawaban, tb_komunitas.nama_komunitas, tb_pertanyaan.nama_pengirim, tb_pertanyaan.nama_pertanyaan, tb_pertanyaan.data_created, tb_pertanyaan.isi_pertanyaan');
		$this->db->from('tb_pertanyaan');
		$this->db->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_pertanyaan.id_komunitas');	
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function getSaranDataHistory($limit,$offset,$title)
	{
		$this->db->select('tb_pertanyaan.id_pertanyaan, tb_pertanyaan.jumlah_jawaban, tb_komunitas.nama_komunitas, tb_pertanyaan.nama_pengirim, tb_pertanyaan.nama_pertanyaan, tb_pertanyaan.data_created, tb_pertanyaan.isi_pertanyaan, tb_user.id');
		$this->db->from('tb_pertanyaan');
		$this->db->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_pertanyaan.id_komunitas');
		$this->db->join('tb_user', 'tb_user.id = tb_pertanyaan.id_user');
		$this->db->where(array('tb_pertanyaan.id_pertanyaan' => $title));
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}		
}	