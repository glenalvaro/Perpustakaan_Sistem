<div class="page-inner pd-0-force">
	<div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
		 <?php 
               date_default_timezone_set('Asia/Ujung_pandang');
            ?>
		  <div class="col">
                 <div class="card mg-b-30">
                   <div class="card-header d-flex align-items-center justify-content-between">
                       <h6 class="tx-14 mg-b-0">Data Anggota</h6>
                   </div>
                   <div class="card-body">
                   	<form action="<?= base_url('riwayat_transaksi/tambah_pinjam') ?>" method="post" class="form-horizontal" enctype="multipart/form-data"> 
                    <div class="media d-block d-flex">
                     <div class="media-body">
                     	 <div class="form-group">
	                           <label>Pengguna</label>
	                           <input type="text" class="form-control" value="<?= $user['nama']; ?>" readonly>
	                           <ul class="parsley-errors-list filled">
	                              <li class="parsley-required mg-l-5 mg-t-2"> </li>
	                           </ul>
                         </div>

                        <div class="form-group">
                           <label>Cari Anggota</label>
                           <div class="input-group">
							<input type="text" class="form-control" autocomplete="off" name="nomor_anggota" id="search-box" placeholder="Contoh ID Anggota : 18208040" type="text" value="" readonly>
							   <div class="input-group-append">
                                 <button type="button" data-toggle="modal" data-target="#Msiswa" class="btn btn-custom-primary btn-sm"> <i class="fa fa-search mg-r-5"></i></button>
                              </div>
							</div>
                           <ul class="parsley-errors-list filled">
                  				<li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('nomor_anggota'); ?></li>
               				</ul>
                        </div>
 
                         <div class="form-group">
                           <label>Biodata Anggota Perpustakaan</label>
                             <div id="result_tunggu"> <p style="color:red">* Belum Ada Hasil</p></div>
							 <div id="result"></div>
                        </div>

                     </div>
                  </div>
                        </div>
                        <div class="card-footer text-center p-0">
                           <div class="row no-gutters row-bordered row-border-light">
                              <a href="" class="d-flex col flex-column  py-3">
                                 <div class="font-weight-bold"><?= $jumlah_buku; ?></div>
                                 <div class="text-muted small">Jumlah Buku</div>
                              </a>
                              <a href="" class="d-flex col flex-column  py-3 bd-l bd-r">
                                 <div class="font-weight-bold"><?= $jumlah_anggota; ?></div>
                                 <div class="text-muted small">Jumlah Anggota</div>
                              </a>
                              <a href="" class="d-flex col flex-column  py-3">
                                 <div class="font-weight-bold"><?= $jumlah_kategori; ?></div>
                                 <div class="text-muted small">Jumlah Kategori</div>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6">
                     <!-- Skills -->
                     <div class="card mg-b-30">
                        <div class="card-header">
                        	 <h6 class="tx-14 mg-b-0">Data Buku</h6>
                        </div>
                        <div class="card-body">
                        	<div class="form-group">
                        	<label>Cari Buku</label>
                          	<div class="input-group">
									<input type="text" class="form-control" autocomplete="off" name="isbn" id="buku-search1" placeholder="Contoh ISBN Buku : 9789792947823" type="text" value="" readonly>
								<div class="input-group-append">
	                                 <button type="button" data-toggle="modal" data-target="#Mjudul" class="btn btn-custom-primary btn-sm"> <i class="fa fa-search mg-r-5"></i></button>
	                            </div>
							</div>
							 <ul class="parsley-errors-list filled">
                  				<li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('buku_pinjam'); ?></li>
               				</ul>
						    </div>

							<div class="form-group">
								<label>Data Buku</label>
								<div id="result_tunggu_buku"> <p style="color:red">* Belum Ada Hasil</p></div>
								<div id="result_buku"></div>
							</div>
                        </div>
                        <a href="#" class="card-footer d-block text-center  small tx-semibold">SHOW ALL</a>
                     </div>
                   
                     <div class="card">
                        <div class="card-header with-elements d-flex justify-content-between">
                           <span class="tx-14">Data Peminjaman</span>
                           <div><p class="text-body small tx-semibold tx-uppercase">Show All</p></div>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                           <label>Nama Peminjam</label>
                           <input type="hidden" name="email_peminjam" id="email_pinjam" class="form-control" readonly>
                        	<input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Judul Buku</label>
                        	<input type="text" name="buku_pinjam" id="judul_buku" class="form-control" readonly>
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
                        <div class="footer-button btn-toolbar form-group mb-0">
		                    <div class="pull-right">
		                        <button type="submit" class="btn btn-primary">
		                            <span>Simpan</span> <i class="ti-location-arrow ml-2"></i>
		                        </button> 
		                        <a href="<?= base_url('riwayat_transaksi') ?>">
		                            <button type="button" class="btn btn-info">
		                                <span>Batal</span><i class="ti-arrow-left ml-2"></i>
		                            </button> 
		                        </a>
		                    </div>
                		</div>
                      </div>
                    </div>                   
                  </div>
              </form>
	</div>
	<div class="hidden-lg mg-b-100"></div>
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
      <div id="modal-body" class="modal-body fileSelection1">
        <table id="modal-siswa" class="table table-bordered">
            <thead class="bg-twitter">
                <tr>
                   <th style="color: white;" class="text-center">No</th>
                   <th style="color: white;" class="text-center">NISN</th>
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
      <div id="modal-body" class="modal-body fileSelection1">
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


