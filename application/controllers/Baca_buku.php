<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baca_buku extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek apakah ada session, kalo tidak redirect halaman masuk
		cek_masuk();
		$this->load->model('Sekolah_model', 'sekolah');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();

		$data['title'] = 'Baca Buku | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('halaman_bacabuku/index', $data);
		$this->load->view('template/footer', $data);
	}
}