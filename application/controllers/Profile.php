<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cek apakah ada session, kalo tidak redirect halaman masuk
		cek_masuk();
		$this->load->model('User_model','user');
		$this->load->model('Sekolah_model', 'sekolah');
		$this->load->model('Transaksi_model', 'transaksi');
		$this->load->model('Pengaturan_model', 'pengaturan');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();

		//hitung data transaksi jika kosong tampilkan notif
		$data['total_transaksi'] = $this->transaksi->getTransaksi();

		//ambil data transaksi yang sudah dikembalikan
		$data['transaksiDetail'] = $this->transaksi->getDataTransaksiSelesai();

		$data['title'] = 'Profil | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar');
		$this->load->view('halaman_profil/index', $data);
		$this->load->view('template/footer');
	}

	public function ganti_password()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();

		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim',[
			'required' => 'Kolom ini harus di isi !'
		]);
		$this->form_validation->set_rules('new_password1', 'Password1','required|trim|matches[new_password2]|min_length[8]',
			['required' => 'Kolom ini harus di isi !',
			'min_length' => 'Password harus minimal 8 karakter, kombinasi huruf besar, kecil dan angka !',
			'matches' => 'Password harus sama !'
		]);
		$this->form_validation->set_rules('new_password2', 'Password2','required|trim|matches[new_password1]',[
			'required' => 'Kolom ini harus di isi !',
			'matches' => 'Ulangi Password harus sama dengan Password yang telah kamu buat.'
		]);

		if($this->form_validation->run() == false){
			$data['title'] = 'Ganti Password | Perpustakaan';
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('halaman_profil/ganti_password', $data);
			$this->load->view('template/footer');
		} else{
			$password_lama = $this->input->post('password_lama');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($password_lama, $data['user']['password'])) {
                	$this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="../assets/images/icon/icon-danger.svg" alt="icon">Password lama salah !</div>');
                	redirect('profile/ganti_password');
            } else {
                if ($password_lama == $new_password) {
                    $this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="../assets/images/icon/icon-danger.svg" alt="icon">Password baru tidak bole sama dengan sebelumnya !</div>');
					redirect('profile/ganti_password');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('nisn', $this->session->userdata('nisn'));
                    $this->db->update('tb_user');

                   	$this->session->set_flashdata('flash', 'Password Berhasil Diubah');
	    			redirect('profile');
                }
            }
		}
	}

	public function kartu_anggota($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['pengaturan'] = $this->pengaturan->getDataPengaturan();

		$data['title'] = 'Kartu Anggota | Perpustakaan';
		$where = array('id' => $id);
		$data['detail'] = $this->user->detail_Anggota($where, 'tb_user')->result();
		$this->load->view('halaman_profil/kartu_anggota', $data);
	}

}