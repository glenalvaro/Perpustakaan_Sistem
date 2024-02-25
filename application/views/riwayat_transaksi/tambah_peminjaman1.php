<div class="page-inner pd-0-force">
	<div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
      	<div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0">Tambah Transaksi Peminjaman</h6>
               </div>
            <div class="card-body pd-25">  
            <form action="<?= base_url('riwayat_transaksi/tambah_pinjam') ?>" method="post" class="form-horizontal"> 
                 <div class="media d-block d-flex">
                     <div class="media-body">
                        <div class="form-group">
                           <label>Nama Siswa</label>
                        	<div class="input-group">
                              <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" readonly>
                              <div class="input-group-append">
                                 <button type="button" data-toggle="modal" data-target="#Msiswa" class="btn btn-custom-primary btn-sm"> <i class="fa fa-search mg-r-5"></i></button>
                              </div>
                           </div>
                           <ul class="parsley-errors-list filled">
                  				<li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('nama_peminjam'); ?></li>
               				</ul>
                        </div>
                         <div class="form-group">
                           <label>Judul Buku</label>
                           <div class="input-group">
                              <input type="text" name="buku_pinjam" id="judul_buku" class="form-control" readonly>
                              <div class="input-group-append">
                                 <button type="button" data-toggle="modal" data-target="#Mjudul" class="btn btn-custom-primary btn-sm"> <i class="fa fa-search mg-r-5"></i></button>
                              </div>
                           </div>
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-2"><?= form_error('buku_pinjam'); ?></li>
                           </ul>
                        </div>
                        <div class="form-group">
                           <label>Kode Buku</label>
                        	<input type="text" name="isbn" id="kode_buku" class="form-control" readonly>
                        	<ul class="parsley-errors-list filled">
                  				<li class="parsley-required mg-l-5 mg-t-2"> </li>
               				</ul>
                        </div>
                        <div class="form-group">
                           <label>Nomor Anggota</label>
                            <input type="hidden" name="email_peminjam" id="email_pinjam">
                           <input type="text" name="nomor_anggota" id="nomor_anggota" class=" form-control" readonly>
                        </div>
                        <div class="form-group">
                           <label>Tanggal Peminjaman</label>
                           <input type="text" name="tgl_pinjam" class="form-control" value="<?php echo date('d F, Y'); ?>" readonly>
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-2"> </li>
                           </ul>
                        </div>
                        <!-- Buat proses tgl kembali -->
                        <?php foreach($pengaturan as $ptr) : ?>
                        <?php 

                        $tgl_sekarang = date('Y-m-d');
                           //set tgl kembali + tgl sekarang
                           $tgl_kembali_buku = date('Y-m-d', strtotime("+".$ptr['lama_peminjaman']." days"));
                        ?>
                        <?php endforeach; ?>
                        <div class="form-group">
                           <label>Tanggal Kembali Buku</label>
                           <input type="text" name="tgl_kembali" class="form-control" value="<?= $tgl_kembali_buku; ?>" readonly>
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-2"> </li>
                           </ul>
                        </div>
                        <hr>
                     </div>
                  </div>
                <div class="footer-button btn-toolbar form-group mb-0">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">
                            <span>Simpan Data</span> <i class="ti-location-arrow ml-2"></i>
                        </button> 
                        <a href="<?= base_url('riwayat_transaksi') ?>">
                            <button type="button" class="btn btn-info">
                                <span>Batal</span><i class="ti-arrow-left ml-2"></i>
                            </button> 
                        </a>
                    </div>
                </div>
         	</form> 
            </div>
         </div>
      </div>
  </div>
  <div class="hidden-lg mg-b-70"></div>
</div>



<!-- Modal data siswa tampil data dari data base-->
<div class="modal fade" id="Msiswa" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content tx-rubik">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        <table id="modal-siswa" class="table table-bordered">
            <thead class="bg-twitter">
                <tr>
                   <th style="color: white;" class="text-center">No</th>
                   <th style="color: white;" class="text-center">Nama Siswa</th>
                   <th style="color: white;" class="text-center">Kelas</th>
                   <th style="color: white;" class="text-center">Jurusan</th>
                   <th style="color: white;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
  <div class="hidden-lg mg-b-100"></div>
</div>



<!-- Modal data siswa tampil data dari data base-->
<div class="modal fade" id="Mjudul" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content tx-rubik">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="modal-judulbuku" class="table table-bordered">
            <thead class="bg-twitter">
                <tr>
                   <th style="color: white;" class="text-center">No</th>
                   <th style="color: white;" class="text-center">Judul Buku</th>
                   <th style="color: white;" class="text-center">Penerbit</th>
                   <th style="color: white;" class="text-center">Pengarang</th>
                   <th style="color: white;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="hidden-lg mg-b-100"></div>
</div>