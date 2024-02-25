<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunguman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cek apakah ada session, kalo tidak redirect halaman masuk
		cek_masuk();
		$this->load->helper('text');
		$this->load->helper('Perpustakaan');
		$this->load->library('pagination');
		$this->load->model('Pengunguman_model','pengunguman');
		$this->load->model('Sekolah_model', 'sekolah');
	}

	public function index()
	{
		 //konfigurasi pagination
        $config['base_url'] = site_url('pengunguman/index'); //site url
        $config['total_rows'] = $this->db->count_all('tb_pengunguman'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Selanjutnya';
        $config['prev_link']        = 'Sebelumnya';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Selanjutnya</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_halaman pengunguman yang ada pada model pengunguman. 
        $data['pengunguman'] = $this->pengunguman->get_hal_pengunguman($config["per_page"], $data['page']);           
 		//kirim data ini di view pengunguman
        $data['halaman_page'] = $this->pagination->create_links();

		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();

		$data['title'] = 'Pengunguman | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('halaman_pengunguman/index', $data);
		$this->load->view('template/footer');
	}

	public function detail($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['sekolah'] = $this->sekolah->getDataSekolah();

		$data['title'] = 'Detail Pengunguman | Perpustakaan';
		$where = array('id' => $id);
		$data['detail'] = $this->pengunguman->detail_Pengunguman($where, 'tb_pengunguman')->result();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('halaman_pengunguman/detail', $data);
		$this->load->view('template/footer');
	}

	public function tambah_pengunguman()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$this->form_validation->set_rules('judul_pengunguman', 'Judul Pengunguman', 'required|trim',[
			'required' => 'Kolom ini harus di isi !'
		]);
		$this->form_validation->set_rules('tgl_pengunguman', 'Tgl Pengunguman', 'required|trim',[
			'required' => 'Kolom ini harus di isi !'
		]);
		$this->form_validation->set_rules('isi_pengunguman', 'Isi Pengunguman', 'required|trim',[
			'required' => 'Kolom ini harus di isi !'
		]);

		$data['sekolah'] = $this->sekolah->getDataSekolah();


		$data['title'] = 'Tambah Pengunguman | Perpustakaan';
		if($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('halaman_pengunguman/tambah_pengunguman', $data);
			$this->load->view('template/footer');
		} else {
			$this->pengunguman->createPengunguman();
			$this->session->set_flashdata('flash', 'Data Pengunguman Ditambahkan');
			redirect('pengunguman');
		}
		
	}

	public function edit($id = 0)
    {
    	$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();
		
        $data['title'] = 'Edit Pengunguman | Perpustakaan';

        //ambil data pengunguman yang akan di edit sesuai id
        $data['sekolah'] = $this->sekolah->getDataSekolah();
        $data['pengunguman'] = $this->pengunguman->getPengungumanById($id);

        $this->form_validation->set_rules('judul_pengunguman', 'Judul Pengunguman', 'required');
        $this->form_validation->set_rules('tgl_pengunguman', 'Tgl Pengunguman', 'required');
        $this->form_validation->set_rules('isi_pengunguman', 'Isi Pengunguman', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('halaman_pengunguman/edit_pengunguman', $data);
			$this->load->view('template/footer');
        } else {
            $this->pengunguman->editPengunguman($id);
            $this->session->set_flashdata('flash', 'Data Pengunguman Diupdate!');
            redirect('pengunguman');
        }
    }

    public function hapus($id)
    {
        $id = [
            'id' => $id
        ];

        $this->pengunguman->hapusPengungumanById($id);
        $this->session->set_flashdata('flash', 'Data Pengunguman Dihapus');
        redirect('pengunguman');
    }
}