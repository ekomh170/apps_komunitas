<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Form Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('Auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			//Jika Validasi Berhasil
			$this->login();
		}
	}

	private function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
		$tb_pertanyaan = $this->db->get_where('tb_pertanyaan', ['id_pertanyaan => id_pertanyaan'])->row_array();
		$tb_komunitas = $this->db->get_where('tb_komunitas', ['id_komunitas => id_komunitas'])->row_array();
		// var_dump($user);
		// die();

		// jika usernya ada
		if ($user) {
			//jika user tidak aktif akan di kembalikan ke kontak
			if ($user['is_active'] == 0) {
				redirect('Home');
			}
			// jika usernya ada aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'id' => $user['id'],
						'id_user' => $user['id'],
						'email' => $user['email'],
						'nama' => $user['nama'],
						'image' => $user['image'],
						'id_komunitas' => $user['id_komunitas'],
						'id_role' => $user['id_role'],
						'data_created' => $user['data_created'],
						'id_pertanyaan' => $tb_pertanyaan['id_pertanyaan'],
						'nama_komunitas' => $tb_komunitas['nama_komunitas']
					];
					$this->session->set_userdata($data);
					login_helper("Login", "Login");
					if ($user['id_role'] == 1) {
						redirect('Dashboard');
					}
					if ($user['id_role'] == 2) {
						redirect('Dashboard');
					}
					if ($user['id_role'] == 3) {
						redirect('home');
					}
					if ($user['id_role'] == 4) {
						redirect('Home');
					} else {
						redirect('Dashboard');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Salah Password</div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Aktif!</div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar!</div>');
			redirect('Auth');
		}
	}


	public function register()
	{
		//insert data ke table user
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		//$this->form_validation->set_rules('nama_komunitas', 'Nama Komunitas', 'required|trim|is_unique[tb_user.nama_komunitas]');
		//$this->form_validation->set_rules('id_komunitas', 'ID Komunitas', 'required|trim|is_unique[tb_user.id_komunitas]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Form Register Dan Buat Komunitas';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('Auth/register');
			$this->load->view('templates/auth_footer');
		} else {
			//insert data ke table komunitas
			$id = htmlspecialchars($this->input->post('nama_komunitas', true));
			$email = $this->input->post('email');
			$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
			$data_komunitas = array(
				'nama_komunitas' => htmlspecialchars($this->input->post('nama_komunitas', true)),
				'data_created' => date('Y-m-d H:i:s')
			);

			$this->db->insert('tb_komunitas', $data_komunitas);
			$this->db->order_by('id_komunitas', 'desc');
			$count = $this->db->select('(tb_komunitas.id_komunitas) as hasil')
				->from('tb_komunitas')
				->get()->row_array();

			$jumlah = $count['hasil'];
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'id_komunitas' =>  htmlspecialchars($jumlah, true),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.png',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'id_role' => 3,
				'is_active' => 1,
				'data_created' => date('Y-m-d H:i:s')
			];

			$this->db->insert('tb_user', $data);

			$id = htmlspecialchars($jumlah, true);
			$count = $this->db->select('COUNT(tb_user.id_komunitas) as hasil')
				->from('tb_user')
				->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_user.id_komunitas')
				->where(array('tb_user.id_komunitas' => $id))
				->get()->row_array();
			$jumlah = $count['hasil'];
			$data_update = array(
				'jumlah_member' => $jumlah
			);
			$this->db->where(['id_komunitas' => $id]);
			$this->db->update('tb_komunitas', $data_update);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Anda Berhasil Membuat Akun!.Silahkan Login</div>');
			redirect('Auth');
		}
	}

	public function register2()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nama_komunitas', 'Nama Komunitas', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Form Register Punya Komunitas';
			$this->db->order_by('nama_komunitas', 'asc');
			$data['tb_komunitas'] = $this->db->get('tb_komunitas')->result();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('Auth/register2', $data);
			$this->load->view('templates/auth_footer');
		} else {
			$id = htmlspecialchars($this->input->post('nama_komunitas', true));
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'id_komunitas' => htmlspecialchars($this->input->post('nama_komunitas', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.png',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'id_role' => 3,
				'is_active' => 1,
				'data_created' => date('Y-m-d H:i:s')
			];
			// buat jumlah total member + nambahin 1 setiap member daftar
			$this->db->insert('tb_user', $data);

			$count = $this->db->select('COUNT(tb_user.id_komunitas) as hasil')
				->from('tb_user')
				->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_user.id_komunitas')
				->where(array('tb_user.id_komunitas' => $id))
				->get()->row_array();
			$jumlah = $count['hasil'];
			$data_update = array(
				'jumlah_member' => $jumlah
			);
			$this->db->where(['id_komunitas' => $id]);
			$this->db->update('tb_komunitas', $data_update);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Anda Berhasil Membuat Akun!.Silahkan Login</div>');
			redirect('Auth');
		}
	}

	public function resetpassword()
	{
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim');
		//ngambil data dari view
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Form Reset Password';
			$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('Auth/resetpassword', $data);
			$this->load->view('templates/auth_footer');
		} else {
			//buat input data si lama dana baru
			// $email         = $this->input->post('email');
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			//cek data reset password
			$cek = $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			// var_dump($cek);
			// die();
			if (!password_verify($password_lama, $cek['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Salah Password</div>');
				redirect('Auth/resetpassword');
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru Tidak boleh sama dengan password lama</div>');
					redirect('Auth/resetpassword');
				} else {
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
					$password = $this->db->set('password', $password_hash);
					$this->db->update('tb_user');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Berhasil Melakukan Silahkan Anda Login Kembali <b>Reset Password</b></div>');
					redirect('Dashboard');
				}
			}
		}
	}

	public function lupapassword()
	{
		//validasi
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		//ngambil data dari view
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Form Lupa Password';
			// $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('Auth/lupapassword', $data);
			$this->load->view('templates/auth_footer');
			// var_dump($data['user']);
			// die();
		} else {
			$email = $this->input->post('email');
			$user  = $this->db->get_where('tb_user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar dan Aktif</div>');
				redirect('Auth/lupapassword');
			}
			redirect('Auth/resetpassword');
		}
	}

	private function _sendEmail()
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://stmp.googlemail.com',
			'smtp_user' => 'lifenolife@gmail.com',
			'smtp_pass' => '',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'new_line' => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		// Email dan nama pengirim
		$this->email->from('lifenolife@gmail.com', 'MasRud.com');

		// Email penerima
		$this->email->to('panjangn953@gmail.com'); // Ganti dengan email tujuan

		// Lampiran email, isi dengan url/path file
		$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

		// Subject email
		$this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | MasRud.com');

		// Isi email
		$this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.<br><br> Klik <strong><a href='https://masrud.com/post/kirim-email-dengan-smtp-gmail' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

		// Tampilkan pesan sukses atau error
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function logout()
	{
		login_helper("logout", "logout");
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Logout:) Terima Kasih Telah Login</div>');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_role');
		redirect('home');
	}

	public function blocked()
	{
		$data['judul'] = 'Eror 404';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('Auth/blocked', $data);
	}
}