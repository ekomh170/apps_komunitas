<?php

class Pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Pengguna_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Data Pengguna';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data'] = $this->Pengguna_model->getDataKomunitas();
		if ($this->input->post('cari')) {
			$data['data_user'] = $this->Pengguna_model->CariDataPengguna();
		}
		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Pengguna/index', $data);
		$this->load->view('templates/tb_footer');
	}

	public function hapus($id)
	{
		$this->Pengguna_model->HapusDataPengguna($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Pengguna');
	}

	public function nonaktif($id)
	{
		//$data_user = $this->db->get_where('tb_user', ['id' => $id])->row_array();

		$data = array(
			'id_role' => '3',
			'is_active' => '0'
		);
		$this->db->where(array('id' => $id));
		$this->db->update('tb_user', $data);
		$this->session->set_flashdata('berhasil', 'Data Dinonaktifkan');
		redirect(base_url('Pengguna'));
	}

	public function aktif($id)
	{
		//$data_user = $this->db->get_where('tb_user', ['id' => $id])->row_array();

		$data = array(
			'id_role' => '2',
			'is_active' => '1'
		);
		$this->db->where(array('id' => $id));
		$this->db->update('tb_user', $data);
		($data);
		$this->session->set_flashdata('berhasil', 'Data Diaktifkan');
		redirect(base_url('Pengguna'));
	}

	public function nonaktifmember($id)
	{
		//$data_user = $this->db->get_where('tb_user', ['id' => $id])->row_array();
		$data = array(
			'is_active' => '0'
		);
		$this->db->where(array('id' => $id));
		$this->db->update('tb_user', $data);
		$this->session->set_flashdata('berhasil', 'Data Dinonaktifkan');
		redirect(base_url('MemberKomunitas/index/'));
	}

	public function aktifmember($id)
	{
		//$data_user = $this->db->get_where('tb_user', ['id' => $id])->row_array();

		$data = array(
			'is_active' => '1'
		);
		$this->db->where(array('id' => $id));
		$this->db->update('tb_user', $data);
		($data);
		$this->session->set_flashdata('berhasil', 'Data Diaktifkan');
		redirect(base_url('MemberKomunitas'));
	}

	public function hapusmember($id)
	{
		//$data_user = $this->db->get_where('tb_user', ['id' => $id])->row_array();
		$data = array(
			'id_role' => '4',
			'id_komunitas' => ''
		);
		$this->db->where(array('id' => $id));
		$this->db->update('tb_user', $data);
		$this->session->set_flashdata('berhasil', 'Data Dinonaktifkan');
		redirect(base_url('MemberKomunitas/index/'));
	}

	public function invitemember($id_komunitas)
	{
		// $data_user = $this->db->get_where('tb_user', ['id' => $id])->row_array();
		$data_kms = $this->db->get_where('tb_komunitas', ['id_komunitas' => $id_komunitas])->row_array();

		$data = array(
			'id_role' => '2',
			'id_komunitas' => $data_kms['id_komunitas'],
		);

		$this->db->where(array('id' =>  $this->session->userdata('id')));
		$this->db->update('tb_user', $data);
		$this->session->set_flashdata('berhasil', 'Data Dinonaktifkan');
		redirect(base_url('MemberKomunitas/index/'));
	}
}