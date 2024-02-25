<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengarang extends CI_Controller 
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
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

		$data['pengarang'] = $this->identitas->getPengarang();
		$data['sekolah'] = $this->sekolah->getDataSekolah();

		$this->form_validation->set_rules('nama_pengarang', 'Nama Pengarang', 'required|trim',[
			'required' => 'Kolom wajib di isi !'
		]);

		$data['title'] = 'Pengarang | Perpustakaan';
		
		if($this->form_validation->run() == false){
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('identitas_buku/pengarang', $data);
		$this->load->view('template/footer', $data);
		} else{
			$this->identitas->tambahPengarang();
			$this->session->set_flashdata('flash', 'Data Pengarang Ditambahkan');
			redirect('pengarang');
		}
	}

	public function edit_pengarang($id)
	{
		 $this->identitas->editPengarangById($id);
         $this->session->set_flashdata('flash', 'Data Pengarang Diupdate!');
         redirect('pengarang');
	}

	public function hapus_pengarang($id)
	{
		$id = [
            'id' => $id
        ];

        $this->identitas->hapusPengarangById($id);
        $this->session->set_flashdata('flash', 'Data Pengarang Dihapus');
        redirect('pengarang');
	}

	//Implemetasi Data Tables Server Side

	public function get_server_processing() 
	{
        $get = $this->identitas->get_database_tables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($get as $dt) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $dt->nama_pengarang;
            $row[] = '<a href="#" data-toggle="modal" data-target="#editPengarang'.$dt->id.'" class="btn btn-info btn-flat btn-xs"><i class="fa fa-edit" title="Edit Pengarang"></i></a>

                <a class="btn btn-sm btn-danger btn-flat btn-xs" href="javascript:void(0)" title="Hapus Pengarang" onclick="delete_pengarang('."'".$dt->id."'".')"><i class="fa fa-times"></i></a>';
            $data[] = $row;
        }
        $hasil = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->identitas->count_all_datatable(),
                    "recordsFiltered" => $this->identitas->count_filtered_datatable(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($hasil);
    }

    public function import_pengarang()
    {
    	$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
		$this->session->userdata('nisn')])->row_array();

        $data['sekolah'] = $this->sekolah->getDataSekolah();

        $this->form_validation->set_rules('file_pengarang', 'File', 'trim|required');

        $data['title'] = 'Import Pengarang | Perpustakaan';
        if ($this->form_validation->run() == false){
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('identitas_buku/import_pengarang', $data);
        $this->load->view('template/footer', $data);
        } else {
            $this->identitas->importPengarang();
            $this->session->set_flashdata('flash','Data pengarang Diimport');
            redirect('pengarang');
        }
    }
}