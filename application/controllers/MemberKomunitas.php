<?php

class MemberKomunitas extends CI_Controller {

	function _remap($params){
		$this->_index($params);
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengguna_model');
		//$this->load->library('form_validation');
	}

	public function _index($title)
	{
		if ($title == 'index') {
			redirect(base_url('Dashboard'), 'refersh');
		}else{	
			$data['judul'] = 'Data Anggota Komunitas';
			$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			$data['member_data'] =  $this->db->select('tb_user.id, tb_user.nama, tb_komunitas.nama_komunitas, tb_user.alamat, tb_user.email, tb_user.id_role, tb_user.is_active, tb_user.data_created')
		 								->from('tb_user')
										->join('tb_komunitas' , 'tb_komunitas.id_komunitas = tb_user.id_komunitas')
										->where(array('tb_user.id_komunitas' => $title))
										->get()->result_array();

			if( $this->input->post('cari') ){
				$data['member_data'] = $this->Pengguna_model->CariDataMemberKommunitas();
			}
				$this->load->view('templates/tb_header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('Member_Komunitas/index', $data);
				$this->load->view('templates/tb_footer');
		}		
	}

}
