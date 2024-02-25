<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_buku extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek apakah ada session, kalo tidak redirect halaman masuk
		cek_masuk();
		$this->load->model('Identitasbuku_model', 'identitas');
		$this->load->model('Sekolah_model', 'sekolah');
	}

	public function index()
	{
		//buat nomor kategori otomatis
 			$KodeKategori = $this->db->query('SELECT max(kode_kategori) as maxKode FROM tb_kategori_buku')->result();
               foreach ($KodeKategori as $kode) {
                     $kode_selanjutnya=$kode->maxKode;
                     $kode_selanjutnya++;
               $data = array(
              'kode_kategori' => set_value('kode_kategori',$kode_selanjutnya),
           );
        }

		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['kategori'] = $this->identitas->getKategoriBuku();
		$data['sekolah'] = $this->sekolah->getDataSekolah();

		$this->form_validation->set_rules('kode_kategori', 'Kode', 'required|trim',[
			'required' => 'Kolom wajib di isi !'
		]);

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim',[
			'required' => 'Kolom wajib di isi !'
		]);

		
		$data['title'] = 'Kategori Buku Perpustakaan | Perpustakaan';
		if($this->form_validation->run() == false) {
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('identitas_buku/kategori_buku', $data);
		$this->load->view('template/footer', $data);
		} else {
			$this->identitas->tambahKategori();
			$this->session->set_flashdata('flash', 'Kategori Buku Ditambahkan');
			redirect('kategori_buku');
		}
	}

	public function edit_kategoriBuku($id)
	{
		 $this->identitas->editKategoriBukuById($id);
       $this->session->set_flashdata('flash', 'Data Kategori Diupdate!');
       redirect('kategori_buku');
	}

	public function hapus_kategori($id)
	{
		$id = [
            'id' => $id
        ];

        $this->identitas->hapusKategoriBukuById($id);
        $this->session->set_flashdata('flash', 'Data Kategori Dihapus');
        redirect('kategori_buku');
	}

}