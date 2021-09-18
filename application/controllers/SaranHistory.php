<?php

class SaranHistory extends CI_Controller {

	function _remap($params){
		$this->_index($params);
	}

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Pengguna_model');
		//$this->load->library('form_validation');
	}

	public function _index($title)
	{
		if ($title == 'index') {
			redirect(base_url('Saran'), 'refersh');
		}else{	
			$data['judul'] = 'Data Anggota Komunitas';
			$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			$this->db->order_by('id_pertanyaan', 'desc');
			$data['data_saran'] =  $this->db->select('tb_pertanyaan.id_pertanyaan, tb_pertanyaan.jumlah_jawaban, tb_komunitas.nama_komunitas, tb_pertanyaan.nama_pengirim, tb_pertanyaan.nama_pertanyaan, tb_pertanyaan.data_created, tb_pertanyaan.isi_pertanyaan, tb_user.id')
		 								->from('tb_pertanyaan')
										->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_pertanyaan.id_komunitas')
										->join('tb_user', 'tb_user.id = tb_pertanyaan.id_user')
										->where(array('tb_pertanyaan.id_user' => $title))
										->get()->result();
	
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Saran/history', $data);
			$this->load->view('templates/tb_footer');
		}		
	}

}
