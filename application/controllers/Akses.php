<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Akses_model');
		$this->load->library('form_validation');
	}

	public function index()
	{	
		$data['judul'] = 'Akses Menu User';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['akses'] = $this->Akses_model->getDataAkses();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Akses/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		//$this->form_validation->set_rules('id_jurusan', 'ID', 'required|is_unique[tb_jurusan.id_jurusan]');
		$this->form_validation->set_rules('id_role', 'ID Role', 'required');
		$this->form_validation->set_rules('id_menu', 'ID Menu', 'required');
		
		
		if($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Akses/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Akses_model->TambahDataAkses();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Akses');
		}
	}

	public function hapus($id)
	{
		$this->Akses_model->HapusDataAkses($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Akses');
	}

	public function ubah($id){
		$data['judul'] = 'Form Ubah Data';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user_menu_akses'] = $this->Akses_model->IdentitasDataAkses($id);
		
		//$this->form_validation->set_rules('id', 'Nama', 'required');
		$this->form_validation->set_rules('id_role','ID Role', 'required');
		$this->form_validation->set_rules('id_menu', 'ID Menu', 'required');
		
		if($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Akses/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Akses_model->UbahDataAkses();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Akses');
		}
	}
}	
