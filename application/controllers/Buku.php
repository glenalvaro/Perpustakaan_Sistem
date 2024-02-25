<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek apakah ada session, kalo tidak redirect halaman masuk
		cek_masuk();
		$this->load->model('Identitasbuku_model','identitas');
        $this->load->model('Sekolah_model', 'sekolah');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
        $this->session->userdata('nisn')])->row_array();

        $data['sekolah'] = $this->sekolah->getDataSekolah();
        $data['list_kategori'] = $this->identitas->getKategoriBuku();

		$data['title'] = 'Data Buku | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('identitas_buku/data_buku', $data);
		$this->load->view('template/footer', $data);
	}

	//Implemetasi Data Tables Server Side

	public function get_data_buku() 
	{
        $list = $this->identitas->get_data_book();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $book) {
            $no++;
            $row = array();
            $row[] = '<input id="book_data" type="checkbox" class="check-buku" name="id[]" value="'.$book->id.'">';
            $row[] = '<p class="tx-11 tx-center">'.$no.'</p>';
            $row[] = '<center><img src="'.base_url('assets/images/cover/'.$book->cover_buku).'" class="img-thumbnail" width="48" height="43"></center>';
            $row[] = '<a href="'.site_url('buku/detail_buku/'.$book->id).'"><p class="tx-11">'.$book->kode_isbn .'</p></a>';
            $row[] = '<p class="tx-11">'.$book->judul_buku.'</p>';
            $row[] = '<p class="tx-11">'.$book->kategori_nama.'</p>';
            $row[] = '<p class="tx-11">'.$book->pengarang.'</p>';
            $row[] = '<p class="tx-11">'.$book->penerbit.'</p>';
            // $row[] = '<span class="badge badge-primary">'.$book->keterangan.'</span>';
            $row[] = 
               '<div class="btn-group">
                    <button type="button" class="btn btn-info btn-flat btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pilih Aksi
                     </button>
                 <div class="dropdown-menu">               
                     <a href="'.site_url('buku/detail_buku/'.$book->id).'" class="dropdown-item tx-10">Lihat Detail</a>

                     <a href="'.site_url('buku/edit_buku/'.$book->id).'" class="dropdown-item tx-10">Edit Buku</a>

                      <a class="dropdown-item tx-10" href="javascript:void(0)" title="Hapus Buku" onclick="delete_buku('."'".$book->id."'".')">Hapus Buku</a>
                </div>
            </div>';
            $data[] = $row;
        }
        $tampil = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->identitas->count_all_book(),
                    "recordsFiltered" => $this->identitas->count_filtered_book(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($tampil);
    }

    public function tambah_buku()
    {
    	$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
        $this->session->userdata('nisn')])->row_array();

		$data['get_kategori'] = $this->identitas->getKategoriBuku();

        $this->form_validation->set_rules('kode_isbn', 'Kode Isbn', 'required|trim|is_unique[tb_buku.kode_isbn]',[
            'required' => 'Kolom kode isbn wajib di isi !',
            'is_unique' => 'Kode ISBN ini sudah terdaftar !'
        ]);

        $this->form_validation->set_rules('judul_buku', 'Judul', 'required|trim',[
            'required' => 'Kolom judul buku wajib di isi !'
        ]);

        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required|trim',[
            'required' => 'Kolom pengarang wajib di isi !'
        ]);

        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim',[
            'required' => 'Kolom kategori wajib di isi !'
        ]);

        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim',[
            'required' => 'Kolom penerbit wajib di isi !'
        ]);

        $this->form_validation->set_rules('tahun_terbit', 'Tahun', 'required|trim',[
            'required' => 'Kolom tahun terbit wajib di isi !'
        ]);

        $this->form_validation->set_rules('jumlah_halaman', 'Jumlah Halaman', 'required|trim',[
            'required' => 'Kolom jumlah halaman wajib di isi !'
        ]);

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim',[
            'required' => 'Kolom keterangan buku wajib di isi !'
        ]);

        $data['sekolah'] = $this->sekolah->getDataSekolah();
		$data['title'] = 'Tambah Buku | Perpustakaan';
		if($this->form_validation->run() == false) {
        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('identitas_buku/tambah_buku', $data);
		$this->load->view('template/footer', $data);
        } else {
            $this->identitas->tambahBuku();
            $this->session->set_flashdata('flash', 'Data Buku Ditambahkan!');
            redirect('buku');
       }
    }

    public function detail_buku($id)
    {
        $data['user'] = $this->db->get_where('tb_user', ['nisn' => 
        $this->session->userdata('nisn')])->row_array();

        $data['sekolah'] = $this->sekolah->getDataSekolah();

        $data['title'] = 'Lihat Data Buku | Perpustakaan';
        $where = array('id' => $id);
        $data['detail_buku'] = $this->identitas->detail_BukuById($where, 'tb_buku')->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('identitas_buku/detail_buku', $data);
        $this->load->view('template/footer', $data);
    }


    public function edit_buku($id)
    {
        $data['user'] = $this->db->get_where('tb_user', ['nisn' => 
        $this->session->userdata('nisn')])->row_array();

        $data['sekolah'] = $this->sekolah->getDataSekolah();
        
        $data['title'] = 'Edit Data Buku | Perpustakaan';

        //ambil data buku yang akan di edit sesuai id
        $data['buku'] = $this->identitas->getBukuById($id);
        $data['get_kategori_list'] = $this->identitas->getKategoriBuku();

        $this->form_validation->set_rules('kode_isbn', 'Kode Isbn', 'trim|required');
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun terbit', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar');
            $this->load->view('identitas_buku/edit_buku', $data);
            $this->load->view('template/footer');
        } else {
            $this->identitas->editBukuById($id);
            $this->session->set_flashdata('flash', 'Data Buku Diupdate!');
            redirect('buku');
        }
    }

    public function hapus_buku($id)
    {
        $id = [
            'id' => $id
        ];

        $this->identitas->hapusBukuById($id);
        $this->session->set_flashdata('flash', 'Data Buku Dihapus');
        redirect('buku');
    }

    public function hapus_semuaBuku()
    {
        $id = $_POST['id']; // Ambil data ID yang dikirim oleh view melalui form submit
        $this->identitas->hapus_SemuaBuku($id); // Panggil fungsi delete dari model
        $this->session->set_flashdata('flash','Data buku yang dipilih terhapus');
        redirect('buku');
    }

    //Menampilkan server side table di modal pengarang
    public function get_data_pengarang_ajax() 
	{
        $get = $this->identitas->get_pengarang();
        $data = array();
        $no = @$_POST['start'];
        foreach ($get as $g) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $g->nama_pengarang;
            $row[] = '<button class="btn btn-info btn-flat btn-xs" id="select-pengarang"
                            data-id="'.$g->id.'"
                            data-name="'.$g->nama_pengarang.'">
                            <i class="fa fa-check"></i>&nbsp; Pilih
                        </button>';
            $data[] = $row;
        }
        $hasil_json = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->identitas->count_all_dataPengarang(),
                    "recordsFiltered" => $this->identitas->count_filtered_dataPengarang(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($hasil_json);
    }


    //Menampilkan server side table di modal penerbit
    public function get_data_penerbit_ajax() 
	{
        $getdata = $this->identitas->get_penerbit();
        $data = array();
        $no = @$_POST['start'];
        foreach ($getdata as $gd) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $gd->nama_penerbit;
            $row[] = '<button class="btn btn-info btn-flat btn-xs" id="select-penerbit"
                            data-id="'.$gd->id.'"
                            data-name="'.$gd->nama_penerbit.'">
                            <i class="fa fa-check"></i>&nbsp; Pilih
                        </button>';
            $data[] = $row;
        }
        $hasil_j = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->identitas->count_all_dataPenerbit(),
                    "recordsFiltered" => $this->identitas->count_filtered_dataPenerbit(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($hasil_j);
    }

    public function import_buku()
    {
        $data['user'] = $this->db->get_where('tb_user', ['nisn' => 
        $this->session->userdata('nisn')])->row_array();

        $data['sekolah'] = $this->sekolah->getDataSekolah();

        $this->form_validation->set_rules('file_excel', 'Import Buku', 'trim|required',[
         'required' => 'Tidak ada file yang di pilih !'
        ]);

        $data['title'] = 'Import Buku | Perpustakaan';
        if ($this->form_validation->run() == false){
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('identitas_buku/import_buku', $data);
        $this->load->view('template/footer', $data);
        } else {
            $this->identitas->importBuku();
            $this->session->set_flashdata('flash','Data buku Diimport');
            redirect('buku');
        }
    }

    public function export_buku()
    {
        $data['title'] = 'Laporan Buku Excel Perpustakaan SMK Negeri 3 Tondano';
        $data['semuaBuku'] = $this->identitas->getDataBuku();
        $this->load->view('identitas_buku/export_excel', $data);
    }
}