<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek apakah ada session, kalo tidak redirect halaman masuk
		cek_masuk();
		$this->load->model('Identitasbuku_model', 'identitas');
		$this->load->model('Sekolah_model', 'sekolah');
		$this->load->model('Pengaturan_model', 'pengaturan');
		$this->load->model('Transaksi_model', 'transaksi');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		//ambil data sekolah dari model
		$data['sekolah'] = $this->sekolah->getDataSekolah();

		//ambil data semua buku dan tampilkan di views transaksi
		$data['databuku'] = $this->identitas->getDataBukuLimit();

		//ambil data semua buku terlama dan tampilkan di views transaksi
		$data['databukulama'] = $this->identitas->getDataBukuLamaLimit();

		//hitung data transaksi jika kosong tampilkan notif
		$data['total_transaksi'] = $this->transaksi->getTransaksi();

		//ambil data transaksi yang sudah dikembalikan
		$data['transaksiSelesai'] = $this->transaksi->getDataTransaksiSelesai();

		$data['pengaturan'] = $this->pengaturan->getDataPengaturan();

		$data['kategori_buku'] = $this->transaksi->getKategoriBukuPinjam();

		$data['title'] = 'Peminjaman | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar');
		$this->load->view('halaman_transaksi/peminjaman', $data);
		$this->load->view('template/footer');
	}

	public function lihat_semua()
	{
		 //konfigurasi pagination
        $config['base_url'] = site_url('transaksi/lihat_semua'); //site url
        $config['total_rows'] = $this->db->count_all('tb_buku'); //total row
        $config['per_page'] = 100;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get halaman buku yang ada pada model identitas buku. 
        $data['listbuku'] = $this->identitas->get_hal_buku($config["per_page"], $data['page']);           
 		
 		//kirim data ini di view
        $data['halaman'] = $this->pagination->create_links();

		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		//ambil data sekolah dari model
		$data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['pengaturan'] = $this->pengaturan->getDataPengaturan();

		$data['title'] = 'List Buku | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar');
		$this->load->view('halaman_transaksi/list_semuabuku', $data);
		$this->load->view('template/footer');
	}

	public function get_autocomplete(){
		if (isset($_GET['term'])) {
		  	$result = $this->identitas->search_book($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					'label'	=> $row->judul_buku,
				);
		     	echo json_encode($arr_result);
		   	}
		}
	}

	public function search()
	{
		$title = $this->input->get('title');
		$data['data'] = $this->identitas->search_book($title);

		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		//ambil data sekolah dari model
		$data['sekolah'] = $this->sekolah->getDataSekolah();

		$data['title'] = 'Hasil Pencarian | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar');
		$this->load->view('halaman_transaksi/list_pencarian', $data);
		$this->load->view('template/footer');
	}

	public function detail_peminjaman($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		//Fungsi untuk set maksimal peminjaman buku

		$data['title'] = 'Detail Buku Peminjaman | Perpustakaan';
		$where = array('id' => $id);
		$data['detail_book'] = $this->identitas->detail_BookById($where, 'tb_buku')->result();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('halaman_transaksi/detail_bukupinjam', $data);
		$this->load->view('template/footer', $data);
	}

	public function proses_pinjam($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['pengaturan'] = $this->pengaturan->getDataPengaturan();

		//cek apakah user melewati batas peminjaman buku
		$count_peminjaman = $this->transaksi->HitungBukuPeminjaman();
		$aturan = $this->db->get('tb_pengaturan')->result_array();

		foreach($aturan as $t){
			$maks_pinjam = $t['maksimal_peminjaman'];
		}

		//Buat kondisi jika peminjaman buku melebihi batas maka tampil notifikasi
		if($maks_pinjam < $count_peminjaman){
			$this->session->set_flashdata('flash-error','Jumlah Peminjaman Buku sudah mencapai maksimal!');
			 redirect('transaksi');
		}
		elseif($maks_pinjam == $count_peminjaman){
			$this->session->set_flashdata('flash-error','Jumlah Peminjaman Buku sudah mencapai maksimal!');
			 redirect('transaksi');
		 }
		else {
			$data['title'] = 'Proses Buku Peminjaman | Perpustakaan';
			$where = array('id' => $id);
			$data['detail_book'] = $this->identitas->detail_BookById($where, 'tb_buku')->result();
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('halaman_transaksi/proses_peminjaman', $data);
			$this->load->view('template/footer', $data);
		}
	}

	public function simpan_datapeminjaman()
	{
		$this->transaksi->tambahPeminjaman();
		$this->session->set_flashdata('flash', 'Buku Berhasil di Pinjam');
		redirect('riwayat_transaksi');
	}

	public function detail_kategori($kode_kategori)
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['detail'] = $this->transaksi->getKategoriDetailKlik($kode_kategori);

		$data['kategori_list']=$this->transaksi->kategoriBuku($kode_kategori);

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['pengaturan'] = $this->pengaturan->getDataPengaturan();

		$data['title'] = 'Kategori Buku Peminjaman | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('halaman_transaksi/detail_kategori', $data);
		$this->load->view('template/footer', $data);
	}

	 public function export_peminjaman()
    {
        $data['title'] = 'Laporan Data Peminjaman Perpustakaan SMK Negeri 3 Tondano';
        $data['semuaTransaksi'] = $this->transaksi->getDataTransaksi();
        $this->load->view('halaman_transaksi/export_peminjaman', $data);
    }
}
