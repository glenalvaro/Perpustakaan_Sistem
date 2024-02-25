<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageNotFound extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Sekolah_model', 'sekolah');
	}

	public function index()
	{
		$data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['title'] = "Perpustakaan";
		$this->load->view('halaman_error/not_found', $data);
	}
}