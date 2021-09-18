<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Email{
	private function _sendEmail()
	{
		$config = [
	            'mailtype'  => 'html',
	            'charset'   => 'utf-8',
	            'protocol'  => 'smtp',
	            'smtp_host' => 'smtp.gmail.com',
	            'smtp_user' => 'lifenolife@gmail.com',  // Email gmail
	            'smtp_pass'   => '123456789sd',  // Password gmail
	            'smtp_crypto' => 'ssl',
	            'smtp_port'   => 25,
	            'crlf'    => "\r\n",
	            'newline' => "\r\n"
	        ];

	        // Load library email dan konfigurasinya
	        $this->load->library('email');
	        
	        $this->email->initialize($config);

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
	        if ($this->email->_send_with_smtp()) {
	           return true;
			} else {
				echo $this->email->print_debugger();
			die;
	        }
    }
} 