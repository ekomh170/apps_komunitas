<?php

class Komunitas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Komunitas_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Data Komunitas';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_komunitas'] = $this->Komunitas_model->GetDataKomunitas();
		$data['member_komunitas'] = $this->db->count_all('tb_user', 'nama_komunitas');
	
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Komunitas/index', $data);
			$this->load->view('templates/tb_footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('nama_komunitas', 'Nama', 'required|is_unique[tb_komunitas.nama_komunitas]');
		
		if($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Komunitas/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Komunitas_model->TambahDataKomunitas();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Komunitas');
		}
	}

	public function hapus($id_komunitas)
	{
		$this->Komunitas_model->HapusDataKomunitas($id_komunitas);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Komunitas');
	}
	//form sama proses nya di pisah
	public function edit($id_komunitas){
		$data['judul'] = 'Form Ubah Data';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_komunitas'] = $this->Komunitas_model->IdentitasDataKomunitas($id_komunitas);

		$this->form_validation->set_rules('nama_komunitas', 'Nama Komunitas', 'required');
		
		if($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Komunitas/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->ubah();
		}
	}

	public function ubah()
	{
		$this->Komunitas_model->UbahDataKomunitas();
		$this->session->set_flashdata('berhasil', 'DiUbah');
		redirect('Komunitas');
	}

	public function joinkomunitas($id_komunitas){
		$data_kms = $this->db->get_where('tb_komunitas', ['id_komunitas' => $id_komunitas])->row_array();
		$user = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		// var_dump($data_kms);
		// die();

		$data = array(
			'id_komunitas' => $data_kms['id_komunitas'],
		);
		// var_dump($data);
		// die();

		$this->db->where(array('id' =>  $this->session->userdata('id')));	
		$this->db->update('tb_user', $data);
		redirect(base_url('Komunitas'));
	}

}
