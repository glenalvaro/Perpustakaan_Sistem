<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller 
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

		//ambil data sekolah dari model
		$data['sekolah'] = $this->sekolah->getDataSekolah();

    $data['pengaturan'] = $this->pengaturan->getDataPengaturan();

		$data['title'] = 'Data Sekolah | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar');
		$this->load->view('halaman_datasekolah/index', $data);
		$this->load->view('template/footer');
	}

	public function edit($id = 0)
    {
    	$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
      $this->session->userdata('nisn')])->row_array();
		
      $data['title'] = 'Edit Sekolah | Perpustakaan';

      $data['sekolah'] = $this->sekolah->getDataSekolah();

      //ambil data sekolah yang akan di edit sesuai id
      $data['sekolah_edit'] = $this->sekolah->getSekolahById($id);

        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
         $this->form_validation->set_rules('npsn', 'Npsn Sekolah', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
         $this->form_validation->set_rules('status', 'Status Sekolah', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
         $this->form_validation->set_rules('akreditasi', 'Akreditas Sekolah', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
          $this->form_validation->set_rules('nama_kepsek', 'Kepsek Sekolah', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
           $this->form_validation->set_rules('nip_kepsek', 'NIP Kepsek', 'required|trim',[
          'required' => 'Kolom ini harus di isi'
        ]);
          $this->form_validation->set_rules('nama_operator', 'Operator Sekolah', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
          $this->form_validation->set_rules('alamat', 'Alamat Sekolah', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
          $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
          $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
         $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
         $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
         $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);
       

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
      			$this->load->view('template/sidebar');
      			$this->load->view('template/navbar');
      			$this->load->view('halaman_datasekolah/edit', $data);
      			$this->load->view('template/footer');
        } else {
            $this->sekolah->editSekolah($id);
            $this->session->set_flashdata('flash', 'Data Sekolah Diupdate!');
            redirect('sekolah');
        }
    }
}