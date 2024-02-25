<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_transaksi extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek apakah ada session, kalo tidak redirect halaman masuk
		cek_masuk();
		$this->load->model('Sekolah_model', 'sekolah');
		$this->load->model('Transaksi_model', 'transaksi');
		$this->load->model('Pengaturan_model', 'pengaturan');
		$this->load->library('pagination');
        $this->load->model('Log_model', 'histori');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['nisn' => 
        $this->session->userdata('nisn')])->row_array();

		//ambil data sekolah dari model
		$data['sekolah'] = $this->sekolah->getDataSekolah();

		//ambil data transaksi dari model
		$data['transaksi'] = $this->transaksi->getDataTransaksi();
		$data['pengaturan'] = $this->pengaturan->getDataPengaturan();

		$data['title'] = 'Riwayat Peminjaman | Perpustakaan';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar');
		$this->load->view('riwayat_transaksi/index', $data);
		$this->load->view('template/footer');
	}

	public function get_data_peminjaman() 
	{
        $peminjaman = $this->transaksi->getDataPeminjaman();
        $data = array();
        $no = @$_POST['start'];
        foreach ($peminjaman as $pj) {

        	$timesek = date('Y-m-d');
        	if($timesek > $pj->tgl_kembali){
				$status_pinjam = '<h5 class="tx-12"><span class="badge badge-danger">Melebihi batas waktu</span></h5>';
			} else{
				$status_pinjam = '<h5 class="tx-12"><span class="badge badge-primary">Sedang Dipinjam</span></h5>';
			}

			if($pj->status == "Sudah Dikembalikan"){
				$status_pinjam = "<h5 class='tx-12'><span class='badge badge-success'>Sudah Dikembalikan</span></h5>";
			}

			if($this->session->userdata('id_akses') == 1){
               $menu = '<a href="javascript:void(0)" title="Perpanjang Peminjaman" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" onclick="perpanjang_transaksi('."'".$pj->id."'".')">
                    <i class="fa fa-repeat"></i>
                </a>

                <a href="javascript:void(0)" title="Kembalikan Buku" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#kembalikanBuku'.$pj->id.'">
                    <i class="fa fa-check"></i>
                </a>

                <a href="javascript:void(0)" class="hapus-transaksi btn btn-danger btn-flat btn-xs" onclick="hapus_transaksi('."'".$pj->id."'".')">
                	<i class="fa fa-trash-o"></i></a>';
			} else {
				 $menu = '-';
			}


			if($this->session->userdata('id_akses') == 1 and $pj->status == "Sudah Dikembalikan"){
				 $menu ='<a href="javascript:void(0)" class="hapus-transaksi btn btn-danger btn-flat btn-xs" onclick="hapus_transaksi('."'".$pj->id."'".')">
                	<i class="fa fa-trash-o"></i></a>';
			} elseif($this->session->userdata('id_akses') == 2 and $pj->status == "Sudah Dikembalikan"){
				$menu ='-';
			}


            $no++;
            $row = array();
            $row[] = '<p class="tx-11 tx-center">'.$no.'</p>';
            $row[] = '<a href="#"><p class="tx-11">'.$pj->nomor_anggota .'</p></a>';
            $row[] = '<p class="tx-11">'.$pj->nama_peminjam.'</p>';
            $row[] = '<p class="tx-11">'.$pj->buku_pinjam.'</p>';
            $row[] = '<p class="tx-11">'.$pj->tgl_pinjam.'</p>';
            $row[] = '<p class="tx-11">'.$pj->tgl_kembali.'</p>';
            $row[] = '<p class="tx-11">'.$status_pinjam.'</p>';
            $row[] = $menu;
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->transaksi->count_all_peminjaman(),
                    "recordsFiltered" => $this->transaksi->count_filtered_peminjaman(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    public function perpanjang_pinjam($id)
    {
        $this->transaksi->perpanjangBukuById($id);
        redirect('riwayat_transaksi');
    }

    public function hapus_transaksipeminjaman($id)
    {
        $id = [
            'id' => $id
        ];

        $this->transaksi->hapusPeminjamanById($id);
        $this->session->set_flashdata('flash', 'Data Peminjaman Dihapus');
        redirect('riwayat_transaksi');
    }

    public function pengembalian_buku($id)
    {
    	$this->transaksi->kembalikanBukuById($id);
    	$this->session->set_flashdata('flash', 'Pengembalian Buku Berhasil');
        redirect('riwayat_transaksi');
    }


    public function untuk_buttonnya()
    {
        $tgl = date('Y-m-d');
        $nisn = $this->session->userdata('nisn');
        $s = "SELECT COUNT(id) AS jumlah_total FROM tb_peminjaman WHERE nomor_anggota = '$nisn' AND status='Sedang Dipinjam' 
            AND status_read='0' AND (tgl_kembali < '$tgl' OR tgl_kembali = '$tgl' OR DATEDIFF(tgl_kembali,'$tgl') = 3
            OR DATEDIFF(tgl_kembali,'$tgl') = 2 OR DATEDIFF(tgl_kembali,'$tgl') = 1)";
    	$res = $this->db->query($s)->row_array();
    	echo json_encode($res);
	}

	public function untuk_isinya()
	{
        $tgl = date('Y-m-d');
        $jam = date("H:i");
        $nisn = $this->session->userdata('nisn');
        $periksa = $this->db->query("SELECT nama_peminjam, buku_pinjam, isbn, DATEDIFF(tgl_kembali, '$tgl') AS interval_tgl FROM tb_peminjaman WHERE nomor_anggota ='$nisn' AND status ='Sedang Dipinjam'");
        $no=1;
        foreach($periksa->result() as $buku) {
            $nama_peminjam = $buku->nama_peminjam;
            $judul_buku = $buku->buku_pinjam;
            $no_isbn = $buku->isbn;
            if($buku->interval_tgl==1){ 
                            echo "<div class='wd-100p p-2'>
                                     <div class='d-flex justify-content-between'>
                                        <h3 class='tx-13 mb-2'>Hi, ". $nama_peminjam."</h3>
                                        <span class='small tx-gray-500 ft-right'>".$tgl.", ".$jam."</span>
                                      </div>
                                      <div class='tx-gray-700'>Besok adalah batas pengembalian Buku <strong>". $judul_buku."</strong> ISBN ". $no_isbn." .</div>
                                   </div>
                                   <hr>";

                        } elseif ($buku->interval_tgl==2) {
                             echo "<div class='wd-100p p-2'>
                                     <div class='d-flex justify-content-between'>
                                        <h3 class='tx-13 mb-2'>Hi, ". $nama_peminjam."</h3>
                                        <span class='small tx-gray-500 ft-right'>".$tgl.", ".$jam."</span>
                                      </div>
                                      <div class='tx-gray-700'>Batas pengembalian Buku <strong>". $judul_buku."</strong> ISBN ". $no_isbn." tinggal 2 hari, pastikan buku dikembalikan tepat waktu agar tidak dikenakan denda.</div>
                                   </div>
                                   <hr>";

                        } elseif ($buku->interval_tgl==3) {
                             echo "<div class='wd-100p p-2'>
                                     <div class='d-flex justify-content-between'>
                                        <h3 class='tx-13 mb-2'>Hi, ". $nama_peminjam."</h3>
                                        <span class='small tx-gray-500 ft-right'>".$tgl.", ".$jam."</span>
                                      </div>
                                      <div class='tx-gray-700'>Batas pengembalian Buku <strong>". $judul_buku."</strong> ISBN ". $no_isbn."  tinggal 3 hari lagi.</div>
                                   </div>
                                   <hr>";

                        } elseif ($buku->interval_tgl==0) {
                             echo "<div class='wd-100p p-2'>
                                     <div class='d-flex justify-content-between'>
                                        <h3 class='tx-13 mb-2'>Hi, ". $nama_peminjam."</h3>
                                        <span class='small tx-gray-500 ft-right'>".$tgl.", ".$jam."</span>
                                      </div>
                                      <div class='tx-gray-700'>Buku <strong>". $judul_buku."</strong> ISBN ". $no_isbn.", Hari ini adalah batas pengembalian.</div>
                                   </div>
                                   <hr>";
 
                        } elseif ($buku->interval_tgl<0) {
                             echo "<div class='wd-100p p-2'>
                                     <div class='d-flex justify-content-between'>
                                        <h3 class='tx-13 mb-2'>Hi, ". $nama_peminjam."</h3>
                                        <span class='small tx-gray-500 ft-right'>".$tgl.", ".$jam."</span>
                                      </div>
                                      <div class='tx-gray-700'>Buku <strong>". $judul_buku."</strong> ISBN ". $no_isbn." Telah melewati batas pengembalian buku dan akan dikenakan denda.</div>
                                   </div>
                                   <hr>";
  
                        } else {
                           
                        }   
                 $no++;      
    	}
	}

	public function hilangkan_badges()
	{
        $nisn = $this->session->userdata('nisn');
	    $update_status_r ="UPDATE tb_peminjaman SET status_read='1' WHERE nomor_anggota ='$nisn'";
	    $this->db->query($update_status_r);
	}

  //Menampilkan server side table di modal datasiswa di transaksi peminjaman admin
  public function get_siswa_ajax() 
  {
        $get = $this->transaksi->get_dataSiswa();
        $data = array();
        $no = @$_POST['start'];
        foreach ($get as $am) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $am->nisn;
            $row[] = $am->nama;
            $row[] = $am->kelas;
            $row[] = $am->jurusan;
            $row[] = '<button class="btn btn-info btn-flat btn-xs" id="select-siswa"
                            data-id="'.$am->id.'"
                            data-name="'.$am->nama.'"
                            data-nisn="'.$am->nisn.'"
                            data-email="'.$am->email.'">
                            <i class="fa fa-check"></i>&nbsp; Pilih
                        </button>';
            // $row[] = '<button class="btn btn-info btn-flat btn-xs" id="select-siswa" 
            //                 data-id="'.$am->nisn.'">
            //                 <i class="fa fa-check"></i> Pilih
            //           </button>';
            $data[] = $row;
        }
        $hasil = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->transaksi->count_all_dataSiswa(),
                    "recordsFiltered" => $this->transaksi->count_filtered_dataSiswa(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($hasil);
    }


     //Menampilkan server side table di modal datasiswa di transaksi peminjaman admin
  public function get_buku_ajax() 
  {
        $ambil = $this->transaksi->get_buku();
        $data = array();
        $no = @$_POST['start'];
        foreach ($ambil as $al) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $al->judul_buku;
            $row[] = $al->penerbit;
            $row[] = $al->pengarang;
            $row[] = '<button class="btn btn-info btn-flat btn-xs" id="select-buku"
                            data-id="'.$al->id.'"
                            data-name="'.$al->judul_buku.'"
                            data-kode="'.$al->kode_isbn.'">
                            <i class="fa fa-check"></i>&nbsp; Pilih
                        </button>';
            $data[] = $row;
        }
        $hasil_book = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->transaksi->count_all_buku(),
                    "recordsFiltered" => $this->transaksi->count_filtered_buku(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($hasil_book);
    }


  public function tambah_pinjam()
  {
    $data['user'] = $this->db->get_where('tb_user', ['nisn' => 
    $this->session->userdata('nisn')])->row_array();

    //ambil data sekolah dari model
    $data['sekolah'] = $this->sekolah->getDataSekolah();
    $data['pengaturan'] = $this->pengaturan->getDataPengaturan();

    $data['title'] = 'Tambah Peminjaman | Perpustakaan';

    $this->form_validation->set_rules('nomor_anggota', 'Nomor anggota', 'required|trim',[
      'required' => 'Kolom ini harus di isi !'
    ]);

    $this->form_validation->set_rules('buku_pinjam', 'Buku Pinjam', 'required|trim',[
      'required' => 'Kolom ini harus di isi !'
    ]);

    $data['jumlah_buku'] = $this->histori->totalBuku();
    $data['jumlah_anggota'] = $this->histori->totalAnggota();
    $data['jumlah_kategori'] = $this->histori->totalKategori();

    if($this->form_validation->run() == false){
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/navbar');
      $this->load->view('riwayat_transaksi/tambah_peminjaman', $data);
      $this->load->view('template/footer');
    } else {
      $this->transaksi->simpanPeminjaman();
      $this->session->set_flashdata('flash', 'Data Buku Berhasil di Pinjam');
      redirect('riwayat_transaksi');
    }
  }

  public function result_siswa()
  {   
        $user = $this->transaksi->get_siswaid('tb_user','nisn',$this->input->post('kode_anggota'));
        error_reporting(0);
        if($user->nama != null)
        {
            echo '<table class="table table-striped">
                        <tr>
                            <td>Nama Anggota</td>
                            <td>:</td>
                            <td>'.$user->nama.'</td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td>'.$user->nisn.'</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>'.$user->jenis_kelamin.'</td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>:</td>
                            <td>'.$user->email.'</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>'.$user->alamat.'</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>'.$user->kelas.'</td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td>'.$user->jurusan.'</td>
                        </tr>
                        <tr>
                            <td>Kontak</td>
                            <td>:</td>
                            <td>'.$user->no_hp.'</td>
                        </tr>
                    </table>';
        }else{
            echo 'Anggota Tidak Ditemukan !';
        }
        
    }

    public function result_buku()
    {
        $book = $this->transaksi->get_bookid('tb_buku','kode_isbn',$this->input->post('kode_buku'));
        error_reporting(0);
        if($book->judul_buku != null)
        {
            echo '<table class="table table-striped">
                        <tr>
                            <td></td>
                            <td><center><img src="'.base_url('assets/images/cover/'.$book->cover_buku).'" class="img-thumbnail" width="78" height="73"></center></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>ISBN</td>
                            <td>:</td>
                            <td>'.$book->kode_isbn.'</td>
                        </tr>
                        <tr>
                            <td>Judul Buku</td>
                            <td>:</td>
                            <td>'.$book->judul_buku.'</td>
                        </tr>
                        <tr>
                            <td>Pengarang</td>
                            <td>:</td>
                            <td>'.$book->pengarang.'</td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td>:</td>
                            <td>'.$book->penerbit.'</td>
                        </tr>
                        <tr>
                            <td>Tahun Terbit</td>
                            <td>:</td>
                            <td>'.$book->tahun_terbit.'</td>
                        </tr>
                        <tr>
                            <td>Jumlah Halaman</td>
                            <td>:</td>
                            <td>'.$book->jumlah_halaman.'</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>'.$book->keterangan.'</td>
                        </tr>
                    </table>';
        }else{
            echo 'Buku Tidak Ditemukan !';
        }
    }

}
