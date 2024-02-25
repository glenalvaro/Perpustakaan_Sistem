<style>
.lihat-detail{
    float: right;
    cursor: pointer;
}

.lihat-detail:hover{
   border-color: #3f51b5;
   box-shadow: 0 0 8px #2196f3;
   border-radius: 11rem;
}

.detail-profil{
    float: right;
    cursor: pointer;
}

.detail-profil:hover{
   border-color: #3f51b5;
   box-shadow: 0 0 8px #2196f3;
   border-radius: 11rem;
}
.link_mobile a{
    text-decoration: none;
    background-color: transparent;
    font-size: 13px;
    margin-right: auto;
    margin-left: 8px;
}

.link_mobile a:hover{
    text-decoration: underline;
    color: #212529;
}

.data-password .lock-password{
    display: inline-flex;
    margin-top: 8px;
    width: 5px;
    height: 5px;
    background-color: #142b72;
    border-radius: 50%;
    margin-right: 5px;
}

.btn-primary {
    background-color: #005da6 !important;
    border-color: #005da6 !important;
}

.header-text h4 {
    font-size: 14px;
    line-height: 22px;
    color: #4f8fda;
    font-weight: 500;
    margin-bottom: 8;
}

.badge-custom {
    border-radius: 100px;
    padding: 1px 10px;
    font-weight: 500;
    font-size: 12px;
    display: inline-block;
    text-align: center;
}

.badge-custom.success {
    background: rgba(66,190,101,.3);
    color: #42be65;
}

</style>

<!-- Sweet Alert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif; ?>


<div class="page-inner pd-0-force">
   <div class="row clearfix mg-t-20 tx-rubik">
      <div class="col">
        <div class="col-md-12">
            <!-- profil tampilan phone -->
           <div class="box-custom hidden-lg">
                 <div class="row clearfix d-flex justify-content-center">
                        <div class="card-body">
                           <center><img src="<?= base_url('assets/images/profil/') . $user['foto']; ?>" class="img-thumbnail mb-3" width="70">
                           <p style="font-size: 13px; line-height: 20px; color: #142b72; margin-bottom: 6px; font-weight: 500;"><?= $user['nama']; ?></p>
                           <p class="tx-12"><?= $user['nisn']; ?></p>
                           <p class="tx-12 tx-gray-500">
                            <?php 

                             if ($user['id_akses'] == 1) {
                                 echo 'Administrator';
                             } else if($user['id_akses'] == 2) {
                                echo 'Siswa';
                             } else {
                                echo 'Kepala Sekolah';
                             }

                             ?>
                           </p>
                    </center>
                </div>
             </div>
           </div>
        </div>

        <!-- profil tampilan desktop -->
        <div class="col-md-12">
           <div class="box-custom mg-b-20 hidden-md hidden-sm hidden-xs">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0">Akun Saya</h6>
               </div>
            <div class="card-body pd-25">
                  <!-- Lihat Detail -->
                   <img class="lihat-detail" src="./assets/images/icon/detail_icon.png" data-toggle="collapse" data-target="#lihatDetail" aria-expanded="false" aria-controls="lihatDetail">
                  <div class="media d-block d-flex mg-b-30">
                     <div class="wd-60 ht-60 rounded d-flex align-items-center justify-content-center hidden-xs">
                     <span>
                     <img src="<?= base_url('assets/images/profil/') . $user['foto']; ?>" class="img-thumbnail"></span>
                     </div>
                     <div class="media-body pd-l-0 pd-sm-l-20">
                        <h5 class="tx-18 mg-b-5"><?= $user['nama']; ?></h5>
                        <p class="mg-b-3">
                             <?php 

                             if ($user['id_akses'] == 1) {
                                 echo 'Petugas Perpustakaan';
                             } else if($user['id_akses'] == 2) {
                                echo 'Anggota Perpustakaan';
                             } else {
                                echo 'Kepala Perpustakaan';
                             }

                             ?>
                        </p>
                        <span class="d-block tx-13 tx-gray-500">
                            <?php 

                             if ($user['id_akses'] == 1) {
                                 echo 'Administrator';
                             } else if($user['id_akses'] == 2) {
                                echo 'Siswa';
                             } else {
                                echo 'Kepala Sekolah';
                             }

                             ?>
                        </span>
                     </div>
                  </div>
                 <div class="collapse" id="lihatDetail">
                    <small>
                       <a href="<?= base_url('profile/ganti_password') ?>" role="button" aria-pressed="true"><button type="button" class="btn btn-outline-info mr-2 hidden-xs hidden-sm btn-sm">Ganti Password</button></a>
                      <!-- user 1 dan 3 hilangkan kartu anggota -->
                      <?php if($user['id_akses'] == 2) : ?>
                       <a href="<?= base_url('profile/kartu_anggota/').$user['id']; ?>" role="button" aria-pressed="true" target="_blank"><button type="button" class="btn btn-outline-info mr-2 btn-sm">Kartu Anggota</button></a>
                      <?php endif; ?>
                   </small>
                 </div>   
            </div>
         </div> 
        </div>
             
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-selected="true">Data Personal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="riwayat-tab" data-toggle="tab" href="#riwayat" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat Transaksi</a>
              </li>
            </ul>
            <hr style="background-color: #dee2e6;">
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active tx-12" id="profil" role="tabpanel" aria-labelledby="profil-tab">
                <div class="box-custom pd-15">
                 <?php if($user['id_akses'] == '2' ) : ?>
                  <div class="row mb-2">
                      <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="user-check" class="wd-15 mr-2"></i>NISN</div>
                        <div class="col-md-9 tx-uppercase"><?= $user['nisn']; ?>
                        <!-- Detail List Profil -->
                            <img class="detail-profil" src="./assets/images/icon/detail_icon.png" data-toggle="collapse" data-target="#detailProfil" aria-expanded="false" aria-controls="detailProfil">
                        </div>
                  </div>
                 <?php endif; ?>
                 <?php if($user['id_akses'] != '2' ) : ?>
                 <div class="row mb-2">
                      <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="user-check" class="wd-15 mr-2"></i>NIP</div>
                        <div class="col-md-9 tx-uppercase"><?= $user['nisn']; ?>
                        <!-- Detail List Profil -->
                            <img class="detail-profil" src="./assets/images/icon/detail_icon.png" data-toggle="collapse" data-target="#detailProfil" aria-expanded="false" aria-controls="detailProfil">
                        </div>
                  </div>
                <?php endif; ?>
                  <hr>
                  <div class="row mb-2">
                     <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="user" class="wd-15 mr-2"></i>Nama Lengkap</div>
                     <div class="col-md-9 tx-uppercase"><?= $user['nama']; ?></div>
                  </div>
                  <hr>
                   <div class="row mb-2">
                     <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="user" class="wd-15 mr-2"></i>Jenis Kelamin</div>
                     <div class="col-md-9 tx-uppercase"><?= $user['jenis_kelamin']; ?></div>
                  </div>
                  <hr>
                   <div class="row mb-2">
                     <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="calendar" class="wd-15 mr-2"></i>Tanggal Lahir</div>
                     <div class="col-md-9 tx-uppercase"><?= $user['tgl_lahir']; ?></div>
                  </div>
                  <hr>

                <?php if($user['id_akses'] == '2' ) : ?>
                  <div class="row mb-2">
                     <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="server" class="wd-15 mr-2"></i>Kelas</div>
                     <div class="col-md-9 tx-uppercase"><?= $user['kelas']; ?></div>
                  </div>
                  <hr>
                  <div class="row mb-2">
                     <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="layers" class="wd-15 mr-2"></i>Jurusan</div>
                     <div class="col-md-9 tx-uppercase"><?= $user['jurusan']; ?></div>
                  </div>
                  <hr>
                <?php endif; ?>

                  <div class="row mb-2">
                     <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="map-pin" class="wd-15 mr-2"></i>Alamat</div>
                     <div class="col-md-9 tx-uppercase"><?= $user['alamat']; ?></div>
                  </div>
                  
                  <!-- ini akan muncul jika icon plus di klik -->
                  <div class="collapse" id="detailProfil">
                      <hr>
                       <div class="row mb-2">
                           <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="mail" class="wd-15 mr-2"></i>Email</div>
                           <div class="col-md-9"><?= $user['email']; ?></div>
                       </div>

                       <hr>
                        <div class="row mb-2">
                            <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="phone" class="wd-15 mr-2"></i>No Handphone</div>
                            <div class="col-md-9 tx-uppercase"><?= $user['no_hp']; ?></div>
                        </div>
                        <hr>
                        <div class="row mb-2">
                            <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="unlock" class="wd-15 mr-2"></i>Status</div>
                            <div class="col-md-9 tx-uppercase">
                            <?php 
                               if($user['active'] == 1){
                                 echo "Aktif";
                               } else {
                                 echo "Tidak Aktif";
                               }
                             ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-2">
                            <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="calendar" class="wd-15 mr-2"></i>Tanggal Terdaftar</div>
                            <div class="col-md-9 tx-uppercase"><?= date('d F Y', $user['tgl_terdaftar']); ?></div>
                        </div>

                        <hr class="hidden-lg hidden-md hidden-sm">
                        <div class="row mb-2 hidden-lg hidden-md hidden-sm">
                            <div class="col-md-3 tx-gray-500 tx-uppercase"><i data-feather="lock" class="wd-15 mr-2"></i>Password</div>
                            <div class="col-md-9 tx-uppercase data-password">
                                <span class="lock-password"></span>
                                <span class="lock-password"></span>
                                <span class="lock-password"></span>
                                <span class="lock-password"></span>
                                <span class="lock-password"></span>
                                <span class="lock-password"></span>
                                <span class="lock-password"></span>
                                <a href="<?= base_url('profile/ganti_password') ?>"><button style="float: right;" type="button" class="button-link btn btn-link"><span><img src="./assets/images/icon/edit-password.svg" height="12" alt="icon-edit"></span><span> Ubah</span></button></a>
                            </div>
                        </div>
                  </div>   
                </div>



                <!-- Menu -->
                <div class="box-custom mg-b-7 mg-t-20 hidden-lg">
                    <div class="card-header d-flex align-items-center justify-content-between link_mobile">
                        <i data-feather="user" class="wd-15"></i>
                        <a href="<?= base_url('profile/kartu_anggota/').$user['id']; ?>">Kartu Anggota</a>
                        <nav class="nav nav-with-icon tx-13">
                            <span data-feather="chevron-right" class="nav-link pd-0 wd-16"></span>
                        </nav>
                    </div>
                </div>


                 <div class="box-custom mg-b-7 hidden-lg">
                    <div class="card-header d-flex align-items-center justify-content-between link_mobile">
                        <i data-feather="bell" class="wd-15"></i>
                        <a href="<?= base_url('pengunguman'); ?>">Pengunguman</a>
                        <nav class="nav nav-with-icon tx-13">
                            <span data-feather="chevron-right" class="nav-link pd-0 wd-16"></span>
                        </nav>
                    </div>
                </div>

              <div class="box-custom mg-b-7 hidden-lg">
                    <div class="card-header d-flex align-items-center justify-content-between link_mobile">
                        <i data-feather="info" class="wd-15"></i>
                        <a href="<?= base_url('sekolah'); ?>">Informasi Sekolah</a>
                        <nav class="nav nav-with-icon tx-13">
                            <span data-feather="chevron-right" class="nav-link pd-0 wd-16"></span>
                        </nav>
                    </div>
              </div>

              <?php if($user['id_akses'] == 1) : ?>
              <div class="box-custom mg-b-7 hidden-lg">
                    <div class="card-header d-flex align-items-center justify-content-between link_mobile">
                        <i data-feather="settings" class="wd-15"></i>
                        <a href="<?= base_url('pengaturan'); ?>">Pengaturan</a>
                        <nav class="nav nav-with-icon tx-13">
                            <span data-feather="chevron-right" class="nav-link pd-0 wd-16"></span>
                        </nav>
                    </div>
              </div>

              <div class="box-custom mg-b-30 hidden-lg">
                    <div class="card-header d-flex align-items-center justify-content-between link_mobile">
                        <i data-feather="printer" class="wd-15"></i>
                        <a href="<?= base_url('laporan'); ?>">Cetak Laporan</a>
                        <nav class="nav nav-with-icon tx-13">
                            <span data-feather="chevron-right" class="nav-link pd-0 wd-16"></span>
                        </nav>
                    </div>
              </div>
              <?php endif; ?>
              
              <div class="box-custom hidden-lg mg-b-20">
                    <div class="card-header d-flex align-items-center justify-content-between link_mobile">
                        <i data-feather="power" class="wd-15"></i>
                        <a href="<?= base_url('masuk/keluar') ?>">Keluar</a>
                        <nav class="nav nav-with-icon tx-13">
                            <span data-feather="chevron-right" class="nav-link pd-0 wd-16"></span>
                        </nav>
                    </div>
                </div>

                <div class="hidden-sm hidden-xs hidden-md mg-t-20"></div>
                <!-- Search input -->
                  <h5 class="tx-19 ml-1" style="color: #142b72;">Butuh info ebook gratis pdf? Masukkan nama buku kamu di sini</h5>
                  <input type="text" name="book" class="custom-form form-control mg-b-15" placeholder="Cari buku disini">
                  <button type="button" class="btn-hasil btn btn-primary btn-sm rounded-pill btn-block mg-b-10 tx-semibold" disabled>Tampilkan Hasil</button>
                  <center><h6 class="tx-gray-500 hidden-lg mg-b-30">Versi 3.0.2</h6></center>

            </div>
            <div class="tab-pane fade mg-t-20 tx-12" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab">


          <?php foreach($transaksiDetail as $td) : ?>
            <?php if($td['tgl_pengembalian'] != 'Null') : ?>
            <div class="box-custom mg-t-15 mb-2">
               <div class="card-body">
                  <div class="media-body ml-2 header-text">
                       <div class="d-flex justify-content-between">
                           <div class="header-text">
                                  <div class="d-flex mb-3">
                                       <img src="<?= base_url() ?>assets/images/icon/pengembalian.png" class="align-middle mr-2 hidden-xs" width="25" height="25">
                                       <h4>Pengembalian Buku Perpustakaan</h4>
                                  </div>
                           </div>
                           <div class="conten mb-3">
                              <div class="badge-custom success">Berhasil</div>
                           </div>
                      </div>
                       <div class="d-flex">
                          <div class="tx-gray-500 tx-13">
                             Tanggal Pengembalian :&nbsp;
                          </div>
                          <div class="tx-13 tx-semibold">
                              <?= $td['tgl_pengembalian']; ?>
                           </div>
                          <div class="ml-auto hidden-md hidden-sm hidden-xs">
                            <p class="tx-gray-500 tx-13">Denda &nbsp;<span style="color: #142b72; font-size: 14px; font-weight: bold;">Rp <?= $td['denda']; ?></span></p>
                          </div>
                       </div>
                       <hr style="background-color: #fff;">
                      <div class="d-flex hidden-md hidden-sm hidden-xs">
                        <p class="tx-gray-500 tx-13">Judul Buku &nbsp;</p>
                        <p style="color: #142b72;" class="tx-13"><?= $td['buku_pinjam']; ?></p>
                        <p class="tx-gray-500 tx-13 ml-3">ISBN &nbsp;</p>
                        <p style="color: #142b72;" class="tx-13"><?= $td['isbn']; ?></p>
                     </div>
                      <div class="d-flex justify-content-between hidden-lg">  
                           <p class="tx-gray-500 tx-13">Denda &nbsp;
                              <span style="color: #142b72; font-size: 14px; font-weight: bold;">Rp <?= $td['denda']; ?></span>
                           </p>
                          <button type="button" class="btn btn-primary rounded-pill btn-sm" data-toggle="modal" data-target="#detailRiwayatProfil<?= $td['id']; ?>">Lihat Detail</button>
                       </div>
                  </div>
               </div>
            </div>
      <?php endif; ?>
      <?php endforeach; ?>

         <?php if($total_transaksi == 0) : ?>
        <!-- Jika total transaksi kosong tampilkan notif -->
         <div class="box-custom mg-t-15">
                <div class="row clearfix d-flex justify-content-between">
                     <div class="card-body">
                           <center><img class="mg-b-25" src="<?= base_url() ?>assets/images/icon/warning.svg">
                           <p style="font-size: 13px; line-height: 20px; color: #142b72; margin-bottom: 6px; font-weight: 500;">Riwayat Peminjaman Tidak Ditemukan</p>
                           <p class="tx-12">Untuk keterangan lebih lanjut, silakan hubungi petugas perpustakaan.</p>
                        </center>
                     </div>
               </div>
            </div>  
        <?php endif; ?>  
    
            </div>
        </div>
    </div>              
      <div class="hidden-lg mg-b-70"></div>
   </div>
</div>



<!-- Modal Detail Riwayat Transaksi-->
<?php $no = 0;
foreach($transaksiDetail as $key) : $no++; ?>
<div class="modal fade" id="detailRiwayatProfil<?= $key['id']; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content tx-rubik">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Detail Transaksi</h5>
        <div class="badge-custom success"><?= $key['status']; ?></div>
      </div>
      <div class="modal-body">
            <label class="tx-gray-500 tx-12">Judul Buku</label>
            <p class="tx-14" style="color: #142b72;"><?= $key['buku_pinjam']; ?></p>

            <label class="tx-gray-500 tx-12">ISBN</label>
            <p class="tx-14" style="color: #142b72;"><?= $key['isbn']; ?></p>

            <label class="tx-gray-500 tx-12">Tanggal Peminjaman</label>
            <p class="tx-14" style="color: #142b72;"><?= $key['tgl_pinjam']; ?></p>

            <label class="tx-gray-500 tx-12">Tanggal Pengembalian</label>
            <p class="tx-14" style="color: #142b72;"><?= $key['tgl_pengembalian']; ?></p>

            <label class="tx-gray-500 tx-12">Denda</label>
            <p class="tx-14 tx-semibold" style="color: #142b72;">Rp <?= $key['denda']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>