<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller 
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

		$data['penerbit'] = $this->identitas->getPenerbit();
		$data['sekolah'] = $this->sekolah->getDataSekolah();

		$this->form_validation->set_rules('nama_penerbit', 'Nama Penerbit', 'required|trim',[
			'required' => 'Kolom wajib di isi !'
		]);

		$data['title'] = 'Penerbit | Perpustakaan';
		if($this->form_validation->run() == false) {
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('identitas_buku/penerbit', $data);
		$this->load->view('template/footer', $data);
		} else {
			$this->identitas->tambahPenerbit();
			$this->session->set_flashdata('flash', 'Data Penerbit Ditambahkan');
			redirect('penerbit');
		}
	}

	public function edit_penerbit($id)
	{
		 $this->identitas->editPenerbitById($id);
         $this->session->set_flashdata('flash', 'Data Penerbit Diupdate!');
         redirect('penerbit');
	}

	public function hapus_penerbit($id)
	{
		$id = [
            'id' => $id
        ];

        $this->identitas->hapusPenerbitById($id);
        $this->session->set_flashdata('flash', 'Data Penerbit Dihapus');
        redirect('penerbit');
	}

	//Implemetasi Data Tables Server Side

	public function get_ajax() 
	{
        $list = $this->identitas->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->nama_penerbit;
            $row[] = '<a href="#" data-toggle="modal" data-target="#editPenerbit'.$item->id.'" class="btn btn-info btn-flat btn-xs"><i class="fa fa-edit" title="Edit Penerbit"></i></a>

                <a class="btn btn-sm btn-danger btn-flat btn-xs" href="javascript:void(0)" title="Hapus Penerbit" onclick="delete_penerbit('."'".$item->id."'".')"><i class="fa fa-times"></i></a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->identitas->count_all(),
                    "recordsFiltered" => $this->identitas->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
    
}