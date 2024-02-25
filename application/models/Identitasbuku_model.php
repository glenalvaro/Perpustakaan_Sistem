<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Identitasbuku_model extends CI_Model
{

	 //Implementasi Data Tables Server side Table Penerbit

     // start datatables
    var $column_order = array(null, 'nama_penerbit'); //set column field database for datatable orderable
    var $column_search = array('nama_penerbit'); //set column field database for datatable searchable
    var $order = array('id' => 'desc'); // default order 
 
    private function _get_datatables_query() {
        $this->db->select('id, nama_penerbit');
        $this->db->from('tb_penerbit');
        $i = 0;
        foreach ($this->column_search as $penerbit) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($penerbit, $_POST['search']['value']);
                } else {
                    $this->db->or_like($penerbit, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all() {
        $this->db->from('tb_penerbit');
        return $this->db->count_all_results();
    }
    // end datatables

    //kirim semua buku untuk di tampilkan di data transaksi
    public function getDataBukuLimit()
    {
        $query = "SELECT * FROM `tb_buku` ORDER BY `id` DESC LIMIT 10";
        return $this->db->query($query)->result_array();
    }

    //kirim semua buku untuk di tampilkan di data transaksi
    public function getDataBukuLamaLimit()
    {
        $query = "SELECT * FROM `tb_buku` ORDER BY `id` ASC LIMIT 8";
        return $this->db->query($query)->result_array();
    }

    public function detail_BookById($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function search_book($title){
        $this->db->like('judul_buku', $title, 'both');
        $this->db->order_by('judul_buku', 'DESC');
        $this->db->limit(10);
        return $this->db->get('tb_buku')->result();
    }

    public function get_hal_buku($limit, $start)
    {
      $this->db->order_by('id', 'DESC');
      $query = $this->db->get('tb_buku', $limit, $start);
      return $query;
    }

	public function getPenerbit()
	{
		 return $this->db->get('tb_penerbit')->result_array();
	}

	public function tambahPenerbit()
	{
		$data = [
			'nama_penerbit' => $this->input->post('nama_penerbit')
		];

		$this->db->insert('tb_penerbit', $data);
	}

	public function editPenerbitById($id)
	{
		$nama_penerbit = $this->input->post('nama_penerbit');

		$data = [
			'nama_penerbit' => $nama_penerbit
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_penerbit', $data);
	}

	public function hapusPenerbitById($id)
    {
        $this->db->where($id);
        return $this->db->delete('tb_penerbit');
    }

    //Model Untuk Data Pengarang dibawah ini

    public function getPengarang()
	{
		return $this->db->get('tb_pengarang')->result_array();
	}

    public function tambahPengarang()
	{
		$data = [
			'nama_pengarang' => $this->input->post('nama_pengarang')
		];

		$this->db->insert('tb_pengarang', $data);
	}

	public function editPengarangById($id)
	{
		$nama_pengarang = $this->input->post('nama_pengarang');

		$data = [
			'nama_pengarang' => $nama_pengarang
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_pengarang', $data);
	}

	public function hapusPengarangById($id)
    {
        $this->db->where($id);
        return $this->db->delete('tb_pengarang');
    }


    //Implementasi Data Tables Server side Table Pengarang
    
     // start datatables
    var $order_column = array(null, 'nama_pengarang'); //set column field database for datatable orderable
    var $search_column = array('nama_pengarang'); //set column field database for datatable searchable
    var $order_by = array('id' => 'asc'); // default order 
 
    private function _get_query_datatables() {
        $this->db->select('id, nama_pengarang');
        $this->db->from('tb_pengarang');
        $i = 0;
        foreach ($this->search_column as $pengarang) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($pengarang, $_POST['search']['value']);
                } else {
                    $this->db->or_like($pengarang, $_POST['search']['value']);
                }
                if(count($this->search_column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order_by = $this->order;
            $this->db->order_by(key($order_by), $order_by[key($order_by)]);
        }
    }
    public function get_database_tables() {
        $this->_get_query_datatables();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_datatable() {
        $this->_get_query_datatables();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_datatable() {
        $this->db->from('tb_pengarang');
        return $this->db->count_all_results();
    }
    // end datatables

    //Model Kategori Buku

    public function getKategoriBuku()
    {
        $query = "SELECT * FROM `tb_kategori_buku` ORDER BY `id` DESC";
        return $this->db->query($query)->result_array();
    }

    public function tambahKategori()
    {
        $data = [
            'kode_kategori' => $this->input->post('kode_kategori'),
            'nama_kategori' =>  $this->input->post('nama_kategori')
        ];

        $this->db->insert('tb_kategori_buku',$data);
    }

    public function editKategoriBukuById($id)
    {
        $kode_kategori = $this->input->post('kode_kategori');
        $nama_kategori = $this->input->post('nama_kategori');

        $data = [
            'kode_kategori' => $kode_kategori,
            'nama_kategori' => $nama_kategori
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_kategori_buku', $data);
    }

    public function hapusKategoriBukuById($id)
    {
        $this->db->where($id);
        return $this->db->delete('tb_kategori_buku');
    }



    //Implementasi Data Tables Server side Table Buku

    // start datatables
    var $column_order_book = array(null, 'judul_buku', 'kode_isbn', 'judul_buku', 'kategori', 'pengarang', 'penerbit', 'keterangan'); //set column field database for datatable orderable
    var $column_search_book = array('kode_isbn', 'judul_buku', 'kategori', 'pengarang', 'penerbit', 'keterangan'); //set column field database for datatable searchable
    var $order_book = array('id' => 'desc'); // default order 
 
    private function _get_datatables_query_book() {
        $this->db->select('tb_buku.*, tb_kategori_buku.nama_kategori as kategori_nama');
        $this->db->from('tb_buku');
        $this->db->join('tb_kategori_buku', 'tb_buku.kategori = tb_kategori_buku.kode_kategori');
        $i = 0;
        foreach ($this->column_search_book as $buku) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($buku, $_POST['search']['value']);
                } else {
                    $this->db->or_like($buku, $_POST['search']['value']);
                }
                if(count($this->column_search_book) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_book[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order_book = $this->order;
            $this->db->order_by(key($order_book), $order_book[key($order_book)]);
        }
    }
    public function get_data_book() {
        $this->_get_datatables_query_book();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_book() {
        $this->_get_datatables_query_book();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_book() {
        $this->db->from('tb_buku');
        return $this->db->count_all_results();
    }
    // end datatables


    //data tables server side di modal pengarang
      // start datatables
    var $order_column_all_pengarang = array(null, 'nama_pengarang'); //set column field database for datatable orderable
    var $search_column_all_pengarang = array('nama_pengarang'); //set column field database for datatable searchable
    var $order_by_pengarang_id = array('id' => 'asc'); // default order 
 
    private function _get_query_datatables_data() {
        $this->db->select('id, nama_pengarang');
        $this->db->from('tb_pengarang');
        $i = 0;
        foreach ($this->search_column_all_pengarang as $pengarang_column) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($pengarang_column, $_POST['search']['value']);
                } else {
                    $this->db->or_like($pengarang_column, $_POST['search']['value']);
                }
                if(count($this->search_column_all_pengarang) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->order_column_all_pengarang[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order_by_pengarang_id = $this->order;
            $this->db->order_by(key($order_by_pengarang_id), $order_by_pengarang_id[key($order_by_pengarang_id)]);
        }
    }
    public function get_pengarang() {
        $this->_get_query_datatables_data();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_dataPengarang() {
        $this->_get_query_datatables_data();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_dataPengarang() {
        $this->db->from('tb_pengarang');
        return $this->db->count_all_results();
    }
    // end datatables


     //data tables server side di modal penerbit
      // start datatables
    var $order_column_all_penerbit = array(null, 'nama_penerbit'); //set column field database for datatable orderable
    var $search_column_all_penerbit = array('nama_penerbit'); //set column field database for datatable searchable
    var $order_by_penerbit_id = array('id' => 'asc'); // default order 
 
    private function _get_query_datatables_penerbit() {
        $this->db->select('id, nama_penerbit');
        $this->db->from('tb_penerbit');
        $i = 0;
        foreach ($this->search_column_all_penerbit as $penerbit_column) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($penerbit_column, $_POST['search']['value']);
                } else {
                    $this->db->or_like($penerbit_column, $_POST['search']['value']);
                }
                if(count($this->search_column_all_penerbit) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->order_column_all_penerbit[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order_by_penerbit_id = $this->order;
            $this->db->order_by(key($order_by_penerbit_id), $order_by_penerbit_id[key($order_by_penerbit_id)]);
        }
    }
    public function get_penerbit() {
        $this->_get_query_datatables_penerbit();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_dataPenerbit() {
        $this->_get_query_datatables_penerbit();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_dataPenerbit() {
        $this->db->from('tb_penerbit');
        return $this->db->count_all_results();
    }
    // end datatables

    public function tambahBuku()
    {
        $gambar = $_FILES['image']['name'];

        if ($gambar = '') {
        } else {

            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '1048';
            $config['upload_path'] = './assets/images/cover/';
            $config['file_name'] = $this->input->post('kode_isbn', true); //beri nama nisn pada foto yang diupload

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {

                $no_image = 'default_cover.jpg';

                $data = [
                    'kode_isbn' => $this->input->post('kode_isbn', true),
                    'judul_buku' => $this->input->post('judul_buku', true),
                    'kategori' => $this->input->post('kategori', true),
                    'pengarang' => $this->input->post('pengarang', true),
                    'penerbit' => $this->input->post('penerbit', true),
                    'tahun_terbit' => $this->input->post('tahun_terbit', true),
                    'jumlah_halaman' => $this->input->post('jumlah_halaman', true),
                    'keterangan' => $this->input->post('keterangan', true),
                    'cover_buku' => $no_image
                ];

                $this->db->insert('tb_buku', $data);
                $this->session->set_flashdata('flash', 'Data Buku Ditambahkan');
                redirect('buku');

            } else {

                $gambar = $this->upload->data('file_name', true);

                $data = [
                    'kode_isbn' => $this->input->post('kode_isbn', true),
                    'judul_buku' => $this->input->post('judul_buku', true),
                    'kategori' => $this->input->post('kategori', true),
                    'pengarang' => $this->input->post('pengarang', true),
                    'penerbit' => $this->input->post('penerbit', true),
                    'tahun_terbit' => $this->input->post('tahun_terbit', true),
                    'jumlah_halaman' => $this->input->post('jumlah_halaman', true),
                    'keterangan' => $this->input->post('keterangan', true),
                    'cover_buku' => $gambar
                ];
                
                $this->db->insert('tb_buku', $data);
                $this->session->set_flashdata('flash', 'Data Buku Ditambahkan');
            }
        }
    }

    public function getDataBuku()
    {
        return $this->db->get('tb_buku')->result_array();
    }

    public function detail_BukuById($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function getBukuById($id)
    {
        return $this->db->get_where('tb_buku', ['id' => $id])->row_array();
    }

    public function editBukuById($id)
    {
        $data['buku'] = $this->db->get_where('tb_buku', ['id' => $id])->row_array();

        // cek jika ada gambar yang di upload
        $upload_image = $_FILES['image'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']     = '1048';
            $config['upload_path'] = './assets/images/cover/';
            $config['file_name'] = $data['buku']['kode_isbn']; //beri nama kode isbn pada foto yang diupload

            $this->load->library('upload', $config);

            // upload foto baru
            if ($this->upload->do_upload('image')) {
                $old_image = $data['buku']['cover_buku'];
                $path = './assets/images/cover/';

                // hapus foto lama selain foto default
                if ($old_image != 'default_cover.jpg') {
                    unlink(FCPATH . $path . $old_image);
                }
                // ganti foto lama dengan baru
                $new_image = $this->upload->data('file_name');
                $this->db->set('cover_buku', $new_image);
            } else {

                $data = [
                    'kode_isbn' => $this->input->post('kode_isbn', true),
                    'judul_buku' => $this->input->post('judul_buku', true),
                    'kategori' => $this->input->post('kategori', true),
                    'pengarang' => $this->input->post('pengarang', true),
                    'penerbit' => $this->input->post('penerbit', true),
                    'tahun_terbit' => $this->input->post('tahun_terbit', true),
                    'jumlah_halaman' => $this->input->post('jumlah_halaman', true),
                    'keterangan' => $this->input->post('keterangan', true)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update('tb_buku', $data);

                $this->session->set_flashdata('flash', 'Data Buku Diupdate');
                redirect('buku');
            }
        }

       $data = [

              'kode_isbn' => $this->input->post('kode_isbn', true),
              'judul_buku' => $this->input->post('judul_buku', true),
              'kategori' => $this->input->post('kategori', true),
              'pengarang' => $this->input->post('pengarang', true),
              'penerbit' => $this->input->post('penerbit', true),
              'tahun_terbit' => $this->input->post('tahun_terbit', true),
              'jumlah_halaman' => $this->input->post('jumlah_halaman', true),
              'keterangan' => $this->input->post('keterangan', true)
       ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_buku', $data);
    }

    public function hapusBukuById($id)
    {
        $this->db->where($id);
        return $this->db->delete('tb_buku');
    }

    public function hapus_SemuaBuku($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_buku');
    }

    public function importBuku()
    {
         // cek jika ada gambar yang di upload
        $upload_file = $_FILES['file_excel'];

        if ($upload_file) {
            $config['upload_path'] = './assets/upload/';
            $config['allowed_types'] = 'xlsx|xls';
            $config['file_name'] = time();

            $this->load->library('upload', $config);
            // upload file
            if ($this->upload->do_upload('file_excel')) {
                 $file = $this->upload->data();
                 $reader = ReaderEntityFactory::createXLSXReader();

                 $reader->open('assets/upload/'.$file['file_name']);
                 foreach($reader->getSheetIterator() as $sheet){
                    $numRow = 1;
                    foreach($sheet->getRowIterator() as $row){
                        if($numRow > 1){
                            $databuku = array(
                                'kode_isbn' => $row->getCellAtIndex(1),
                                'judul_buku' => $row->getCellAtIndex(2),
                                'kategori' => $row->getCellAtIndex(3),
                                'pengarang' => $row->getCellAtIndex(4),
                                'penerbit' => $row->getCellAtIndex(5),
                                'tahun_terbit' => $row->getCellAtIndex(6),
                                'jumlah_halaman' => $row->getCellAtIndex(7),
                                'keterangan' => $row->getCellAtIndex(8),
                                'cover_buku' => $row->getCellAtIndex(9)
                            );

                            $jumlah = count($databuku);
                            if($jumlah > 0) {
                                $this->db->replace('tb_buku', $databuku);
                            }
                        }
                         $numRow++;
                    }
                    $reader->close();
                    unlink('assets/upload/'.$file['file_name']);
                    $this->session->set_flashdata('flash','Data buku di import ke database');
                   redirect('buku');
                 }
            } else {
                 $this->session->set_flashdata('error_file', '<div role="alert" class="fade alert alert-danger show"><img src="../assets/images/icon/icon-danger.svg" alt="icon">File yang di upload tidak sesuai dengan type yang di izinkan !</div>');
                    redirect('buku/import_buku');
            }
        }
    }


    public function importPengarang()
    {
         // cek jika ada gambar yang di upload
        $upload_pengarang = $_FILES['file_pengarang'];

        if ($upload_pengarang) {
            $config['upload_path'] = './assets/upload/pengarang/';
            $config['allowed_types'] = 'xlsx|xls';
            $config['file_name'] = time();

            $this->load->library('upload', $config);
            // upload file
            if ($this->upload->do_upload('file_pengarang')) {
                 $file = $this->upload->data();
                 $reader = ReaderEntityFactory::createXLSXReader();

                 $reader->open('assets/upload/pengarang/'.$file['file_name']);
                 foreach($reader->getSheetIterator() as $sh){
                    $numRow = 1;
                    foreach($sh->getRowIterator() as $rw){
                        if($numRow > 1){
                            $datapengarang = array(
                                'nama_pengarang' => $rw->getCellAtIndex(1)
                            );

                            $jumlah = count($datapengarang);
                            if($jumlah > 0) {
                                $this->db->insert('tb_pengarang', $datapengarang);
                            }
                        }
                         $numRow++;
                    }
                    $reader->close();
                    unlink('assets/upload/pengarang/'.$file['file_name']);
                    $this->session->set_flashdata('flash','Data pengarang di import ke database');
                   redirect('pengarang');
                 }
            } else {
                 $this->session->set_flashdata('error_data', '<div role="alert" class="fade alert alert-danger show"><img src="../assets/images/icon/icon-danger.svg" alt="icon">File yang di upload tidak sesuai dengan type yang di izinkan !</div>');
                    redirect('pengarang/import_pengarang');
            }
        }
    }
}