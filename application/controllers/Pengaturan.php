<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek apakah ada session, kalo tidak redirect halaman masuk
		cek_masuk();
		$this->load->model('Sekolah_model', 'sekolah');
		$this->load->model('Pengaturan_model', 'pengaturan');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['pengaturan'] = $this->pengaturan->getDataPengaturan();

		$data['title'] = 'Pengaturan | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('pengaturan/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function update_data($id)
	{
		 $this->pengaturan->editPengaturanById($id);
         $this->session->set_flashdata('flash', 'Data Pengaturan Diupdate!');
         redirect('pengaturan');
	}
}