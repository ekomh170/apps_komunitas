<?php
class Jawaban extends CI_Controller{

	function _remap($params){
		$this->_index($params);
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jawaban_model');
		$this->load->library('form_validation');
	}

	public function _index($title){

		if ($title == 'index') {
			redirect(base_url('saran'), 'refersh');
		}else{
			$data['judul'] = 'Halaman Jawaban';
			$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			
			$data['data'] =  $this->db->select('tb_pertanyaan.id_pertanyaan, tb_komunitas.nama_komunitas, tb_pertanyaan.nama_pengirim, tb_pertanyaan.nama_pertanyaan, tb_pertanyaan.data_created, tb_pertanyaan.isi_pertanyaan')
		 								->from('tb_pertanyaan')
										->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_pertanyaan.id_komunitas')
										->where(array('tb_pertanyaan.id_pertanyaan' => $title))
										->get()->result();


			$this->db->order_by('id_jawaban', 'desc');
			$data['jawaban'] =  $this->db->select('tb_jawaban.id_jawaban, tb_komunitas.nama_komunitas, tb_jawaban.nama_pengirim, tb_jawaban.id_pertanyaan, tb_jawaban.data_created, tb_jawaban.isi_jawaban')
		 								->from('tb_jawaban')
										->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_jawaban.id_komunitas')
										->join('tb_pertanyaan', 'tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan')
										->where(array('tb_jawaban.id_pertanyaan' => $title))
										->get()->result();

										// var_dump($data['jawaban']);
										// die();
				
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('jawaban/index', $data);
			$this->load->view('templates/footer');
		}
	} 
}