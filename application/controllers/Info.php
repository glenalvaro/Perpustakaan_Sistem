<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek apakah ada session, kalo tidak redirect halaman masuk
		cek_masuk();
		$this->load->model('Info_model', 'info');
		$this->load->model('Sekolah_model', 'sekolah');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['info_list'] = $this->info->getDataInfo();

		$data['title'] = 'Info | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('info/list_info', $data);
		$this->load->view('template/footer', $data);
	}

	public function detail_info($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();

		$data['title'] = 'Lihat Info | Perpustakaan';
		$where = array('id' => $id);
		$data['detail_Info'] = $this->info->detail_InfoById($where, 'tb_info')->result();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('info/detail_info', $data);
		$this->load->view('template/footer', $data);
	}

	public function tambah_info()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['title'] = 'Tambah Info | Perpustakaan';

		$this->form_validation->set_rules('judul_info', 'Judul Info', 'required|trim',[
			'required' => 'Kolom ini harus di isi !'
		]);

		$this->form_validation->set_rules('deskripsi', 'Deskripsi Info', 'required|trim',[
			'required' => 'Kolom ini harus di isi !'
		]);

		if($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('info/tambah_info', $data);
			$this->load->view('template/footer', $data);
		} else {
			$this->info->createInfo();
			$this->session->set_flashdata('flash', 'Data Berhasil Ditambahkan');
			redirect('info');
		}
	}

	public function edit_info($id = 0)
    {
    	$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();
		
        $data['title'] = 'Edit Info | Perpustakaan';

        $data['sekolah'] = $this->sekolah->getDataSekolah();
        $data['info'] = $this->info->getInfoById($id);

        $this->form_validation->set_rules('judul_info', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('info/edit_info', $data);
			$this->load->view('template/footer');
        } else {
            $this->info->editInfo($id);
            $this->session->set_flashdata('flash', 'Data Berhasil Diupdate!');
            redirect('info');
        }
    }

	public function hapus_info($id)
    {
        $id = [
            'id' => $id
        ];

        $this->info->hapusInfoById($id);
        $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        redirect('info');
    }
}