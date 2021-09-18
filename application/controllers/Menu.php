<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Menu_model');
		$this->load->library('form_validation');
	}

	public function index()
	{	
		$data['judul'] = 'Menu User';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->Menu_model->GetDataMenu();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Menu/index', $data);
		$this->load->view('templates/footer');
	}	

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('menu', 'Nama', 'required');

		if($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Menu/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Menu_model->TambahDataMenu();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Menu');
		}
	}

	public function hapus($id)
	{
		$this->Menu_model->HapusDataMenu($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Menu');
	}

	public function ubah($id){
		$data['judul'] = 'Form Ubah Data';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user_menu'] = $this->Menu_model->IdentitasDataMenu($id);
		
		$this->form_validation->set_rules('menu', 'Nama', 'required');
		
		if($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Menu/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Menu_model->UbahDataMenu();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Menu');
		}
	}
}	
