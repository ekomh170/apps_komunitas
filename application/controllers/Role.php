<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('Role_model');
		$this->load->library('form_validation');
	}

	public function index()
	{	
		$data['judul'] = 'Role Menu User';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->Role_model->GetDataRole();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Role/index', $data);
		$this->load->view('templates/footer');
	}

	public function roleAccess($id)
	{	
		$data['judul'] = 'Role Akses';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('tb_user_role', ['id' => $id])->row_array();
		// $this->db->where('id !=', 1);
		// $this->db->where('id !=', 4);
		$data['menu'] = $this->db->get('tb_user_sub_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);	
		$this->load->view('templates/topbar', $data);
		$this->load->view('Role/roleAccess', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess()
	{
		$id_role = $this->input->post('roleId');
		$id_menu = $this->input->post('menuId');

		$data = [
			'id_role' => $id_role,
			'id_menu' => $id_menu
		];

		//cek data di database tb user akses menu
		$result = $this->db->get_where('tb_user_akses_menu', $data);

		if($result->num_rows() < 1) {
			//ini Insert data database tb user akses menu
			$this->db->insert('tb_user_akses_menu', $data);
		} else {
			//ini delete data database tb user akses menu
			$this->db->delete('tb_user_akses_menu', $data);
		}
	}

	public function tambah()	
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		if($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Role/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Role_model->TambahDataRole();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Role');
		}
	}

	public function hapus($id)
	{
		$this->Role_model->HapusDataRole($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Role');
	}

	public function ubah($id){
		$data['judul'] = 'Form Ubah Data';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user_role'] = $this->Role_model->IdentitasDataRole($id);
		
		$this->form_validation->set_rules('role', 'Nama', 'required');
		
		if($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Role/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Role_model->UbahDataRole();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Role');
		}
	}
}	
