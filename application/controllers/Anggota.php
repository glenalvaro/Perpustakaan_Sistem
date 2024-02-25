<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek apakah ada session, kalo tidak redirect halaman masuk
		cek_masuk();
		$this->load->model('User_model', 'user');
		$this->load->model('Sekolah_model', 'sekolah');
	}

	//fungsi menampilkan data siswa di data anggota
	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['anggota'] = $this->user->getDataAnggota();

		$data['title'] = 'Data Anggota Perpustakaan | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('halaman_anggota/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function detail_anggota($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();

		$data['title'] = 'Lihat Data Anggota | Perpustakaan';
		$where = array('id' => $id);
		$data['detail_Anggota'] = $this->user->detail_AnggotaById($where, 'tb_user')->result();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('halaman_anggota/detail', $data);
		$this->load->view('template/footer', $data);
	}

	public function edit_anggota($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		
        $data['title'] = 'Edit Data Anggota | Perpustakaan';

        //ambil data anggota yang akan di edit sesuai id
        $data['anggota'] = $this->user->getAnggotaById($id);

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'Phone', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('halaman_anggota/edit', $data);
			$this->load->view('template/footer');
        } else {
            $this->user->editAnggotaById($id);
            $this->session->set_flashdata('flash', 'Data Anggota Diupdate!');
            redirect('anggota');
        }
	}

	public function update_password($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		
        $data['title'] = 'Update Password Anggota | Perpustakaan';

        //ambil data anggota yang akan di edit sesuai id
        $data['Data'] = $this->user->getAnggotaById($id);

        $this->form_validation->set_rules('pass_1', 'Password','required|trim|matches[pass_2]|min_length[8]',
			['required' => 'Kolom ini harus di isi !',
			'min_length' => 'Password harus minimal 8 karakter, kombinasi huruf besar, kecil dan angka !',
			'matches' => 'Password harus sama !'
		]);
		$this->form_validation->set_rules('pass_2', 'Ulangi Password','required|trim|matches[pass_1]',[
			'required' => 'Kolom ini harus di isi !',
			'matches' => 'Ulangi Password harus sama dengan Password yang telah kamu buat.'
		]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('halaman_anggota/update_password', $data);
			$this->load->view('template/footer');
        } else {
            $this->user->updatePasswordById($id);
            $this->session->set_flashdata('flash', 'Password Anggota diUpdate!');
            redirect('anggota');
        }

	}

	function user_lock($id = '')
	{
		$this->user->user_lock($id, 0);
		$this->session->set_flashdata('flash','Anggota di non-aktifkan');
		redirect("anggota");
	}

	function user_unlock($id = '')
	{
		$this->user->user_lock($id, 1);
		$this->session->set_flashdata('flash','Anggota di aktifkan');
		redirect("anggota");
	}

	public function hapus_anggota($id)
    {
        $id = [
            'id' => $id
        ];

        $this->user->hapusAnggotaById($id);
        $this->session->set_flashdata('flash', 'Data Anggota Dihapus');
        redirect('anggota');
    }

    public function tambah_anggota()
    {
    	$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required',[
			'required' => 'Kolom ini harus di isi!'
		]);
		$this->form_validation->set_rules('nisn', 'Nisn', 'required|trim|is_unique[tb_user.nisn]',[
			'required' => 'Kolom nisn harus di isi !',
			'is_unique' => 'NISN ini sudah terdaftar !'
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required',[
			'required' => 'Kolom ini harus di isi!'
		]);
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'trim|required',[
			'required' => 'Kolom ini harus di isi!'
		]);
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required',[
			'required' => 'Kolom ini harus di isi!'
		]);
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required',[
			'required' => 'Kolom ini harus di isi!'
		]);
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'trim|required',[
			'required' => 'Kolom ini harus di isi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',[
			'required' => 'Kolom ini harus di isi!'
		]);
		$this->form_validation->set_rules('id_akses', 'Akses', 'trim|required',[
			'required' => 'Kolom ini harus di isi!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]',[
			'required' => 'Kolom Email harus di isi !',
			'is_unique' => 'Alamat E-mail ini sudah terdaftar !',
			'valid_email' => 'Alamat E-mail tidak valid !'
		]);

		$this->form_validation->set_rules('password_new', 'Password New', 'required|trim|min_length[8]|matches[confirm_pass]',[
			'matches' => 'Password tidak sama dengan kolom ulangi password',
			'required' => 'Kolom Password harus di isi !',
			'min_length' => 'Password harus berisi 8 karakter !'
		]);

		$this->form_validation->set_rules('confirm_pass', 'Ulangi Password', 'required|trim|matches[password_new]',[
			'matches' => 'Password tidak sama dengan kolom password !',
		]);

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		
        $data['title'] = 'Tambah Anggota Perpustakaan | Perpustakaan';
        if($this->form_validation->run() == false){
        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('halaman_anggota/tambah_anggota', $data);
		$this->load->view('template/footer');
		} else {
			$this->user->tambahAnggota();
			$this->session->set_flashdata('flash', 'Data Anggota Ditambahkan');
            redirect('anggota');
		}
    }

    public function hapus_terpilih()
    {
        $id = $_POST['id']; // Ambil data ID yang dikirim oleh view melalui form submit
        $this->user->hapus_Terpilih($id); // Panggil fungsi delete dari model
        $this->session->set_flashdata('flash','Data yang dipilih dihapus');
        redirect('anggota');
    }

    public function export_anggota()
    {
        $data['title'] = 'Laporan Anggota Excel Perpustakaan SMK Negeri 3 Tondano';
        $data['semuaAnggota'] = $this->user->getDataAnggota();
        $this->load->view('halaman_anggota/export_anggotaexcel', $data);
    }
}