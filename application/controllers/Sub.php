<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Sub_model');
		$this->load->library('form_validation');
	}

	public function index()
	{	
		$data['judul'] = 'Sub Menu User';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['Sub'] = $this->Sub_model->getDataSub();

		if( $this->input->post('cari') ){ 
			$data['Sub'] = $this->Sub_model->CariDataSub();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Sub/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		//$this->form_validation->set_rules('id_jurusan', 'ID', 'required|is_unique[tb_jurusan.id_jurusan]');
		//$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_rules('id_menu', 'ID Menu', 'required');
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');	
		//$this->form_validation->set_rules('icon', 'Icon', 'required');
		$this->form_validation->set_rules('is_active', 'Active', 'required');

		if($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Sub/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Sub_model->TambahDataSub();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Sub');
		}
	}

	public function hapus($id)
	{
		$this->Sub_model->HapusDataSub($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Sub');
	}

	public function ubah($id){
		$data['judul'] = 'Form Ubah Data';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user_sub_menu'] = $this->Sub_model->IdentitasDataSub($id);
		
		$this->form_validation->set_rules('id_menu', 'ID MENU', 'required');
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('url', 'URL','required');
		$this->form_validation->set_rules('icon', 'Icon','required');
		$this->form_validation->set_rules('is_active', 'Active','required');
		
		if($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Sub/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Sub_model->UbahDataSub();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Sub');
		}
	}
}		
