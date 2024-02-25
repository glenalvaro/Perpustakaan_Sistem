<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cek apakah ada session, kalo tidak redirect halaman masuk
		cek_masuk();
		$this->load->helper('text');
		$this->load->model('Pengunguman_model','pengunguman');
		$this->load->model('Sekolah_model', 'sekolah');
		$this->load->model('Pengaturan_model', 'pengaturan');
		$this->load->model('Log_model', 'histori');
		$this->load->model('Info_model', 'info');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['history'] = $this->histori->getDataAktivitas();
		$data['pengunguman_view'] = $this->pengunguman->getPengungumanDashboard();
		$data['pengaturan_list'] = $this->pengaturan->getDataPengaturan();
		$data['list_info'] = $this->info->getDataInfo();

		//hitung jumlah data
		$data['jumlah_buku'] = $this->histori->totalBuku();
		$data['jumlah_anggota'] = $this->histori->totalAnggota();
		$data['jumlah_kategori'] = $this->histori->totalKategori();
		$data['jumlah_peminjaman'] = $this->histori->totalPeminjaman();

		$data['title'] = 'Dashboard | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function log_activity()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['pengaturan_list'] = $this->pengaturan->getDataPengaturan();
		$data['log'] = $this->db->get('tb_log')->result_array();
	
		$data['title'] = 'Riwayat Aktivitas | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('dashboard/log_data', $data);
		$this->load->view('template/footer', $data);
	}
}