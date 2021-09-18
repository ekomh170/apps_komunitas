<?php

class PostHistory extends CI_Controller {

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
			redirect(base_url('Post'), 'refersh');
		}else{	
			$data['judul'] = 'History Post';
			$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			$this->db->order_by('id_post', 'desc');
			$data['data_post'] =  $this->db->select('tb_post.id_post, tb_post.nama_pengirim, tb_komunitas.nama_komunitas, tb_post.judul_post, tb_post.image, tb_post.date_created, tb_post.tanggal_hapus, tb_user.id')
		 								->from('tb_post')
		 								// harus punya primary key dari setiap table , contoh : primary key dari tb komunitas = id_komunitas tb pertanyaan = id_komunitas
										->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_post.id_komunitas')
										->join('tb_user', 'tb_user.id = tb_post.id_user')
										->where(array('tb_post.id_user' => $title))
										->get()->result();
	
				$this->load->view('templates/tb_header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('post/history', $data);
				$this->load->view('templates/tb_footer');
		}		
	}

}
