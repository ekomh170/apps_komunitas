<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model');
		$this->load->model('LogLogin_model');
		//$this->load->library('form_validation');
	}
	
	public function Log()
	{
		$data['judul'] = 'Data Aktifitas';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_log'] = $this->Log_model->GetDataLog();

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Log/log_aktifitas', $data);
		$this->load->view('templates/tb_footer');
	}

	public function AllDelete()
	{
		$this->Log_model->DeleteAllData();
		redirect('Log/Log');
	}
//AKTIFITAS Kegiatan
	/*public function delete($id_log)
	{
		$this->Log_model->DeleteData($id_log);
		redirect('Log/Log');
	}

	// public function delete_multiple() 
	// {
	// 	$this->load->model('tb_log');
	// 	$this->Log_model->remove_checked_siswa();
	// 	redirect('Log/Log');
	// }*/

	public function LogLogin()
	{
		$data['judul'] = 'Data Aktifitas';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_log_login'] = $this->LogLogin_model->GetDataLogLogin();

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Log/login_log', $data);
		$this->load->view('templates/tb_footer');
	}

	public function AllDeleteLogin()
	{
		$this->LogLogin_model->DeleteAllLogin();
		redirect('Log/LogLogin');
	}

	// //AKTIFITAS LOGIN
	// public function deletelogin($id_log)
	// {
	// 	$this->LogLogin_model->DeleteDataLogin($id_log);
	// 	redirect('Log/LogLogin');	
	// }	
}