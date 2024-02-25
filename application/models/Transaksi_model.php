<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	// start datatables
    var $column_order = array(null, 'nama_peminjam', 'nomor_anggota', 'buku_pinjam', 'isbn', 'tgl_pinjam', 'tgl_kembali', 'status'); //set column field database for datatable orderable
    var $column_search = array('nama_peminjam', 'nomor_anggota', 'buku_pinjam', 'isbn', 'tgl_pinjam', 'tgl_kembali','status'); //set column field database for datatable searchable
    var $order = array('id' => 'desc'); // default order 
 
    private function _get_datatables_pinjam() {
        if($this->session->userdata('id_akses') == 1){
        	$this->db->select('*');
        	$this->db->from('tb_peminjaman');
        	$this->db->order_by('id', 'DESC');
        } else {
        	$id = $this->session->userdata('nisn');
        	$this->db->select('*');
        	$this->db->from('tb_peminjaman');
        	$this->db->where('nomor_anggota', $id);
        	$this->db->order_by('id', 'DESC');
        }
        $i = 0;
        foreach ($this->column_search as $pinjam) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($pinjam, $_POST['search']['value']);
                } else {
                    $this->db->or_like($pinjam, $_POST['search']['value']);
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
    public function getDataPeminjaman() {
        $this->_get_datatables_pinjam();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_peminjaman() {
        $this->_get_datatables_pinjam();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_peminjaman() {
        $this->db->from('tb_peminjaman');
        return $this->db->count_all_results();
    }
    // end datatables

	public function tambahPeminjaman()
	{
       $data = [
			'nama_peminjam' => $this->input->post('nama_peminjam'),
			'email_peminjam' => $this->input->post('email_peminjam'),
			'nomor_anggota' => $this->input->post('nomor_anggota'),
			'buku_pinjam' => $this->input->post('buku_pinjam'),
			'isbn' => $this->input->post('isbn'),
			'tgl_pinjam' => $this->input->post('tgl_pinjam'),
			'tgl_kembali' => $this->input->post('tgl_kembali'),
			'denda' => 0,
			'status' => 'Sedang Dipinjam'
		];
		$this->db->insert('tb_peminjaman', $data);
		$this->session->set_flashdata('flash', 'Buku Berhasil di Pinjam');
	}

	public function perpanjangBukuById($id)
	{
        helper_log("delete", "Perpanjang peminjaman buku");

		$data = $this->db->get('tb_pengaturan')->result_array();

		foreach($data as $q){
			$tgl_sekarang = date('Y-m-d');
           //set tgl kembali + tgl sekarang
            $tgl_perpanjang = date('Y-m-d', strtotime("+".$q['tambahan_waktu_pinjam']." days"));
		}

		$this->db->set('tgl_kembali', $tgl_perpanjang);
		$this->db->where('id', $id);
		$this->db->update('tb_peminjaman');
		foreach($data as $t){
			$this->session->set_flashdata('flash', 'Peminjaman berhasil di perpanjang selama' .$t['tambahan_waktu_pinjam'].  'hari!');
		}
	}

	public function hapusPeminjamanById($id)
    {
        helper_log("delete", "Menghapus data transaksi peminjaman");

        $this->db->where($id);
        return $this->db->delete('tb_peminjaman');
    }

    public function getDataTransaksi()
	{
		$query = "SELECT * FROM `tb_peminjaman`";
		return $this->db->query($query)->result_array();
	}

	public function kembalikanBukuById($id)
	{
		$tgl_pengembalian = $this->input->post('tgl_pengembalian');
		$denda = $this->input->post('denda');

		$data = [
			'tgl_pengembalian' => $tgl_pengembalian,
			'denda' => $denda,
			'status' => 'Sudah Dikembalikan'
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tb_peminjaman', $data);
	}


	//Kirim data transaksi yang sudah selesai ke controller transaksi
	public function getDataTransaksiSelesai()
	{
		$id = $this->session->userdata('nisn');
        $query = "SELECT * FROM `tb_peminjaman` WHERE `nomor_anggota` = '$id' and status = 'Sudah Dikembalikan' ORDER BY `id` DESC";
        return $this->db->query($query)->result_array();
	}

	//hitung data transaksi kirim di controller
	public function getTransaksi()
	{
		$id = $this->session->userdata('nisn');
     	$query = $this->db->query("SELECT * FROM `tb_peminjaman` WHERE `nomor_anggota` = '$id' and status = 'Sudah Dikembalikan' ORDER BY `id` DESC");
     	return $query->num_rows();
	}

	//hitung maksimal peminjaman buku
	public function HitungBukuPeminjaman()
	{
		$e = $this->session->userdata('nisn');
     	$query = $this->db->query("SELECT * FROM `tb_peminjaman` WHERE `nomor_anggota` = '$e' and status = 'Sedang Dipinjam' ORDER BY `id` DESC");
     	return $query->num_rows();
	}

	public function getKategoriBukuPinjam()
	{
		$query = "SELECT * FROM `tb_kategori_buku` ORDER BY `id` DESC";
        return $this->db->query($query)->result_array();
	}

	public function kategoriBuku($kode_kategori)
	{
		$this->db->like('kategori', $kode_kategori, 'both');
        $this->db->order_by('kategori', 'DESC');
        // $this->db->limit(10);
        return $this->db->get('tb_buku')->result();
	}

	public function getKategoriDetailKlik($kode_kategori)
	{               
       $queryKat = "SELECT `tb_buku`.`id`,`nama_kategori`, `judul_buku` FROM `tb_kategori_buku` INNER JOIN `tb_buku` WHERE `tb_kategori_buku`.`kode_kategori`=`tb_buku`.`kategori` and `tb_buku`.`kategori` = $kode_kategori";
       return $this->db->query($queryKat)->row_array();
	}

     //data tables server side di modal siswa di transaksi peminjaman admin
      // start datatables
    var $order_coulumn_siswa = array(null, 'nama','kelas','jurusan'); //set column field database for datatable orderable
    var $search_column_all_siswa = array('nama','kelas','jurusan'); //set column field database for datatable searchable
    var $order_siswa_by_id = array('id' => 'asc'); // default order 
 
    private function _get_query_data_siswa() {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('id_akses', 2);
        $i = 0;
        foreach ($this->search_column_all_siswa as $siswa_column) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($siswa_column, $_POST['search']['value']);
                } else {
                    $this->db->or_like($siswa_column, $_POST['search']['value']);
                }
                if(count($this->search_column_all_siswa) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->order_coulumn_siswa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order_siswa_by_id = $this->order;
            $this->db->order_by(key($order_siswa_by_id), $order_siswa_by_id[key($order_siswa_by_id)]);
        }
    }
    public function get_dataSiswa() {
        $this->_get_query_data_siswa();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_dataSiswa() {
        $this->_get_query_data_siswa();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_dataSiswa() {
        $this->db->from('tb_user');
        return $this->db->count_all_results();
    }
    // end datatables


     //data tables server side di modal judul buku di transaksi peminjaman admin
      // start datatables
    var $order_buku = array(null, 'judul_buku','penerbit','pengarang'); //set column field database for datatable orderable
    var $search_buku = array('judul_buku','penerbit','pengarang'); //set column field database for datatable searchable
    var $order_buku_id = array('id' => 'asc'); // default order 
 
    private function _get_query_buku() {
        $this->db->select('*');
        $this->db->from('tb_buku');
        $this->db->where('keterangan', 'Tersedia');
        $i = 0;
        foreach ($this->search_buku as $buku) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($buku, $_POST['search']['value']);
                } else {
                    $this->db->or_like($buku, $_POST['search']['value']);
                }
                if(count($this->search_buku) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->order_buku[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order_buku_id = $this->order;
            $this->db->order_by(key($order_buku_id), $order_buku_id[key($order_buku_id)]);
        }
    }
    public function get_buku() {
        $this->_get_query_buku();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_buku() {
        $this->_get_query_buku();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_buku() {
        $this->db->from('tb_buku');
        return $this->db->count_all_results();
    }
    // end datatables
    public function simpanPeminjaman()
    {
       helper_log("add", "Menambah data peminjaman buku");
       $data = [
            'nama_peminjam' => $this->input->post('nama_peminjam'),
            'email_peminjam' => $this->input->post('email_peminjam'),
            'nomor_anggota' => $this->input->post('nomor_anggota'),
            'buku_pinjam' => $this->input->post('buku_pinjam'),
            'isbn' => $this->input->post('isbn'),
            'tgl_pinjam' => $this->input->post('tgl_pinjam'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
            'denda' => 0,
            'status' => 'Sedang Dipinjam'
        ];
        $this->db->insert('tb_peminjaman', $data);
        $this->session->set_flashdata('flash', 'Data Buku Berhasil di Pinjam');
    }

   public function get_siswaid($table_name,$where,$id)
   {
     $this->db->where($where,$id);
     $edit = $this->db->get($table_name);
     return $edit->row();
   }

   public function get_bookid($table_name,$where,$id)
   {
    $this->db->where($where,$id);
    $edit = $this->db->get($table_name);
    return $edit->row();
   }

}