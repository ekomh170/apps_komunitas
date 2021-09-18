<?php
class Saran extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		//tanggal();
		$this->load->model('Saran_model');
		$this->load->model('Jawaban_model');
		$this->load->library('form_validation');
		$this->load->library('pagination'); 
	}
	public function index($offset = NULL){
		$tgl = date("Y-m-d H:i:s");
		
		$query = $this->db->get_where('tb_pertanyaan' , array('tanggal_hapus' => $tgl))->result();
		foreach ($query as $value) {
			$tgl_data = $value->tanggal_hapus;
			
			
			if ($tgl_data == $tgl) {
				
				$this->db->where(array('tanggal_hapus' => $tgl_data));
				$this->db->delete('tb_pertanyaan');
			}
		}
		
		$data['judul'] = 'Daftar Diskusi';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		//$this->db->order_by('id_pertanyaan', 'desc');
		// $data['data_saran'] =  $this->db->select('tb_pertanyaan.id_pertanyaan, tb_pertanyaan.jumlah_jawaban, tb_komunitas.nama_komunitas, tb_pertanyaan.nama_pengirim, tb_pertanyaan.nama_pertanyaan, tb_pertanyaan.data_created, tb_pertanyaan.isi_pertanyaan')
		//   								->from('tb_pertanyaan')
		//  								->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_pertanyaan.id_komunitas')
		//  								->get()->result();
	 								

			$limit = 2;
			if(!is_null($offset))
			{
				
			}

			//config
			$config['uri_segment'] = 3;
			$config['base_url'] = 'http://localhost/db-komunitas/saran/index/';
			$config['total_rows'] = $this->db->get('tb_pertanyaan')->num_rows();
			$config['per_page'] = $limit;
			$config['num_links'] = 3;

			$this->pagination->initialize($config);

			$data['offset'] = $this->uri->segment(3);
			$this->db->order_by('id_pertanyaan', 'desc');
			$data['data_saran'] = $this->Saran_model->getSaranData($limit, $offset); 


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Saran/index', $data);
		$this->load->view('templates/footer');
	}

	public function add(){
		$data['judul'] = 'Form Tambah Diskusi';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Saran/tambah', $data);
		$this->load->view('templates/footer');
	}
	public function tambah()
	{
		$tgl_now = date('Y-m-d H:i:s');
		$tgl = date('Y-m-d H:i:s', strtotime('+ 30 days', strtotime($tgl_now)));
			
			$id_pertanyaan = $this->input->post('id_pertanyaan', true);
			$nama_pertanyaan = $this->input->post('nama_pertanyaan', true);
			$data_created = $this->input->post('data_created', true);
			$isi_pertanyaan = $this->input->post('isi_pertanyaan', true);
			$data = array(
				'id_pertanyaan' => $id_pertanyaan,
				'id_user' => $this->session->userdata('id'),
				'nama_pengirim' => $this->session->userdata('nama'),
				'id_komunitas' => $this->session->userdata('id_komunitas'),
				'nama_pertanyaan' => $nama_pertanyaan,
				'data_created' => date('Y-m-d H:i:s'),
				'isi_pertanyaan' => $isi_pertanyaan,
				'tanggal_hapus' => $tgl
			);

			$this->db->insert('tb_pertanyaan', $data);
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect(base_url('saran'));
	}


	public function hapus($id_pertanyaan)
	{
		$this->Saran_model->HapusDataSaran($id_pertanyaan);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Saran');
	}

	public function jawaban(){
		$id_pertanyaan = $this->input->post('id_pertanyaan', true);
		$isi_jawaban = $this->input->post('isi_jawaban', true);
		$data = array(
			'id_pertanyaan' => $id_pertanyaan,
			'isi_jawaban' => $isi_jawaban,
			'data_created' => date('Y-m-d H:i:s'),
			'nama_pengirim' => $this->session->userdata('nama'),
			'id_komunitas' => $this->session->userdata('id_komunitas')
		);

		$this->db->insert('tb_jawaban', $data);

		$count = $this->db->select('COUNT(tb_jawaban.id_pertanyaan) as hasil')
					->from('tb_jawaban')
					->join('tb_pertanyaan' , 'tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan')
					->where(array('tb_jawaban.id_pertanyaan' => $id_pertanyaan))
					->get()->row_array();
			$jumlah = $count['hasil'];

			$data_update = array(
				'jumlah_jawaban' => $jumlah 
			);
			$this->db->where(['id_pertanyaan' => $id_pertanyaan]);
			$this->db->update('tb_pertanyaan', $data_update);

		redirect('Jawaban');
	}
}