<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Login_model', 'login');
		$this->load->model('Sekolah_model', 'sekolah');
	}

	public function index()
	{
		$this->form_validation->set_rules('nisn', 'NISN','required|trim',
			['required' => 'Kolom Username harus di isi !'
		]);
		$this->form_validation->set_rules('password', 'Password','required|trim|min_length[8]',
			['required' => 'Kolom Password harus di isi !',
			'min_length' => 'Password harus berisi 8 karakter !'
		]);

		$data['sekolah'] = $this->sekolah->getDataSekolah();

		if($this->form_validation->run() == false){
			$data['title'] = "Perpustakaan";
			$this->load->view('halaman_login/login', $data);
		} else {
			$this->cek_login();
		}
	}

	public function daftar_anggota()
	{
		$data['sekolah'] = $this->sekolah->getDataSekolah();

		$data['title'] = 'Daftar Anggota | Perpustakaan';
		$this->load->view('halaman_login/daftar_anggota', $data);
	}

	public function form_pendaftaran()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
			'required' => 'Kolom nama harus di isi !'
		]);

		$this->form_validation->set_rules('nisn', 'Nisn', 'required|trim|is_unique[tb_user.nisn]',[
			'required' => 'Kolom nisn harus di isi !',
			'is_unique' => 'NISN ini sudah terdaftar !'
		]);

		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
			'required' => 'Kolom alamat harus di isi !'
		]);

		$this->form_validation->set_rules('jenis_kelamin', 'Gender', 'required|trim',[
			'required' => 'Kolom ini harus di isi !'
		]);

		$this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required|trim',[
			'required' => 'Kolom ini harus di isi !'
		]);

		$this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim',[
			'required' => 'Kolom No hp harus di isi !'
		]);

		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim',[
			'required' => 'Kolom kelas harus di isi !'
		]);

		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim',[
			'required' => 'Kolom jurusan harus di isi !'
		]);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]',[
			'required' => 'Kolom Email harus di isi !',
			'is_unique' => 'Alamat E-mail ini sudah terdaftar !',
			'valid_email' => 'Alamat E-mail tidak valid !'
		]);

		$this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[8]|matches[password2]',[
			'matches' => 'Password tidak sama !',
			'required' => 'Kolom Password harus di isi !',
			'min_length' => 'Password harus berisi 8 karakter !'
		]);

		$this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

		$data['sekolah'] = $this->sekolah->getDataSekolah();

		if($this->form_validation->run() == false){
			$data['title'] = 'Form Pendaftaran Anggota | Perpustakaan';
			$this->load->view('halaman_login/form_pendaftaran', $data);
		} else {
			$email = $this->input->post('email', true);
			$data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
				'nisn' => htmlspecialchars($this->input->post('nisn', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password1'), 
                 PASSWORD_DEFAULT),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tgl_terdaftar' => time(),
                'active' => 0,
                'id_akses' => 2,
                'foto' => 'default.png'         
           ];

            //siapkan token
           $token = base64_encode(random_bytes(32));
           $user_token = [
           		'email' => $email,
           		'token' => $token,
           		'date_created' => time()
           ];

           $this->db->insert('tb_user', $data);
           $this->db->insert('user_token', $user_token);

           $this->_sendEmail($token, 'verify');
           redirect('masuk/verifikasi_akun');
		}
	}

	public function verifikasi_akun()
	{
		$data['sekolah'] = $this->sekolah->getDataSekolah();
		
		$data['title'] = 'Verifikasi akun | Perpustakaan';
		$this->load->view('halaman_login/verifikasi_akun', $data);
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' 	=> 'smtp',
			'smtp_host' => 'mail.perpus-smkn3tdo.my.id',
			'smtp_user' => 'info@perpus-smkn3tdo.my.id',
			'smtp_pass' => 'email_perpus',
			'smtp_port' => 465,
			'smtp_crypto' => 'ssl',
			'mailtype' 	=> 'html',
			'charset' 	=> 'utf-8',
			'newline'	=> "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('info@perpus-smkn3tdo.my.id', 'Perpustakaan SMK Negeri 3 Tondano');
		$this->email->to($this->input->post('email'));

		if($type == 'verify') {
			$this->email->subject('Perpustakaan SMK Negeri 3 Tondano - Email Verifikasi');
			$this->email->message('Klik link ini untuk verifikasi akun anda : <a href="' . base_url() . 'masuk/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if($type == 'forgot'){
			$this->email->subject('Pengaturan Ulang Kata Sandi/Password - Perpustakaan SMK Negeri 3 Tondano');
			$this->email->message('Klik link ini untuk reset password anda : <a href="' . base_url() . 'masuk/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}
		
		if($this->email->send()){
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

		if($user){
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if($user_token){
				if(time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('active', 1);
					$this->db->where('email', $email);
					$this->db->update('tb_user');

					$this->db->delete('user_token', ['email' => $email]);

		    		$this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-success show"><img src="../assets/images/icon/logout.svg" alt="icon">'. $email .' Telah di aktivasi! Silakan Login.</div>');
		    		redirect('masuk');
				} else {
					$this->db->delete('tb_user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

		    		$this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="../assets/images/icon/icon-danger.svg" alt="icon">Verifikasi akun gagal! Token Expired!</div>');
		    		redirect('masuk');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="../assets/images/icon/icon-danger.svg" alt="icon">Verifikasi akun gagal! Token Salah!</div>');
		    	redirect('masuk');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="../assets/images/icon/icon-danger.svg" alt="icon">Verifikasi akun gagal! Alamat E-mail Salah!</div>');
		    redirect('masuk');
		}
	}

	private function cek_login()
	{
		$nisn = $this->input->post('nisn');
		$password = $this->input->post('password');

		//cek di database
		$user = $this->db->get_where('tb_user', ['nisn'=> $nisn])->row_array();

		//jika user ada
		if($user){
			//cek jika user tidak aktif
			if($user['active'] == 1){
				//cek password user
				if(password_verify($password, $user['password'])){
					$data = [
						'nisn' => $user['nisn'],
						'id_akses' => $user['id_akses'],
						'nama' => $user['nama']
					];

					$this->session->set_userdata($data);
						if($user['id_akses'] == 1){
							helper_log("login", "Telah masuk sistem");
							redirect('dashboard');
						} else {
							helper_log("login", "Telah masuk sistem");
							redirect('dashboard');
						}
				} else {
					$this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="./assets/images/icon/icon-danger.svg" alt="icon">Password salah. Mohon periksa kembali</div>');
			redirect('masuk');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="./assets/images/icon/icon-danger.svg" alt="icon">Username belum di aktivasi !</div>');
			redirect('masuk');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="./assets/images/icon/icon-danger.svg" alt="icon">Username tidak terdaftar !</div>');
			redirect('masuk');
		}
	}

	public function keluar()
	{
		helper_log("logout", "Telah keluar dari sistem");

		$this->session->unset_userdata('nisn');
	    $this->session->unset_userdata('id_akses');

	    // $this->session->set_flashdata('flash', 'Logout Berhasil');
	    $this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-success show"><img src="./assets/images/icon/logout.svg" alt="icon">Berhasil Keluar !</div>');
	    redirect('masuk');
	}


	public function lupa_password()
	{
		$data['sekolah'] = $this->sekolah->getDataSekolah();
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim',[
			'required' => 'Masukan Alamat E-mail!'
		]);

		if($this->form_validation->run() == false){
			$data['title'] = 'Perpustakaan';
			$this->load->view('halaman_login/lupa_password', $data);
		} else {
			$email = $this->input->post('email');
            $user = $this->db->get_where('tb_user', ['email' => $email, 'active' => 1])->row_array();
			
			if($user){
				$token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-success show"><img src="../assets/images/icon/logout.svg" alt="icon">Kode verivikasi telah dikirim di email anda !</div>');
                redirect('masuk/lupa_password');
			} else{
				$this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="../assets/images/icon/icon-danger.svg" alt="icon">Alamat E-mail tidak terdaftar !</div>');
                redirect('masuk/lupa_password');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="./assets/images/icon/icon-danger.svg" alt="icon">Reset Password Gagal, Token Salah !</div>');
                redirect('masuk');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="./assets/images/icon/icon-danger.svg" alt="icon">Reset Password Gagal, Email Salah !</div>');
            redirect('masuk');
        }
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
            redirect('masuk');
        }

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		
		 $this->form_validation->set_rules('password11', 'Password', 'trim|required|min_length[8]|matches[password22]',[
	    	'required' => 'Kolom ini tidak boleh kosong!',
	    	'matches' => 'Pasword tidak sama dengan ulangi password',
	    	'min_length' => 'Password harus berisi 8 karakter'
	    ]);
        $this->form_validation->set_rules('password22', 'Ulangi Password', 'trim|required|min_length[8]|matches[password11]',[
        	'required' => 'Ulangi password tidak boleh kosong!',
        	'matches' => 'Ulangi password tidak sama dengan password',
        	'min_length' => 'Ulangi Password harus berisi 8 karakter'
        ]);

		if($this->form_validation->run() == false){
			$data['title'] = 'Perpustakaan';
			$this->load->view('halaman_login/ganti_password', $data);
		} else {
			$password = password_hash($this->input->post('password11'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-success show"><img src="./assets/images/icon/logout.svg" alt="icon">Kata sandi telah diubah. Silakan Masuk !</div>');
            redirect('masuk');
		}
	}
	
}
