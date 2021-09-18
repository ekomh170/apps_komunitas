<?php

class Jawaban_model extends CI_Model {
	public function getSaranData2($limit,$offset,$title)
	{
		$this->db->select('tb_pertanyaan.id_pertanyaan, tb_komunitas.nama_komunitas, tb_pertanyaan.nama_pengirim, tb_pertanyaan.nama_pertanyaan, tb_pertanyaan.data_created, tb_pertanyaan.isi_pertanyaan');
		$this->db->from('tb_pertanyaan');
		$this->db->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_pertanyaan.id_komunitas');
		$this->db->where(array('tb_pertanyaan.id_pertanyaan' => $title));
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}		

	public function getJawabanData($limit,$offset,$title)
	{
		$this->db->select('tb_jawaban.id_jawaban, tb_komunitas.nama_komunitas, tb_jawaban.nama_pengirim, tb_jawaban.id_pertanyaan, tb_jawaban.data_created, tb_jawaban.isi_jawaban');
		$this->db->from('tb_jawaban');
		$this->db->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_jawaban.id_komunitas');
		$this->db->join('tb_pertanyaan', 'tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan');
		$this->db->where(array('tb_jawaban.id_pertanyaan' => $title));
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}		
}