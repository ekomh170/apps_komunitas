<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{	
		$data['judul'] = 'My Profile';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('profile/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{	
		$data['judul'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Profile/edit', $data);
			$this->load->view('templates/footer');
		}else{
			$email = $this->input->post('email');
			$nama = $this->input->post('nama');
			$id_komunitas = $this->input->post('nama_komunitas');
			$alamat = $this->input->post('alamat');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$image = $_FILES['image'];
				if ($image=''){}else{
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['overwrite'] = true;
				$config['max_filename'] = 255;
				$config['max_size'] = 25600;
				$config['width']  = '100';
				$config['height'] = '100';


				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('image')){
					echo "Upload Gagal";
				}else{
					$image=$this->upload->data('file_name');
				}
			}

			$this->db->set('image', $image);	
			$this->db->set('nama', $nama);
			$this->db->set('alamat', $alamat);	
			$this->db->set('tgl_lahir', $tgl_lahir);		
			$this->db->where('email', $email);
			$this->db->update('tb_user');
			redirect('Profile');
		}	
	}	
}	