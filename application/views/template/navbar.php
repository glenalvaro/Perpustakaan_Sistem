 <?php foreach($sekolah as $skl) : ?>

<div class="page-content">
      <div class="page-header">
               <div class="search-form">
                  <form action="#" method="GET">
                     <div class="input-group">
                        <input class="form-control search-input typeahead" name="search" placeholder="Type something..." type="text"/>
                        <span class="input-group-btn"><span id="close-search"><i data-feather="x" class="wd-16"></i></span></span>
                     </div>
                  </form>
               </div>
               <nav class="navbar navbar-default">
                  <div class="navbar-header tx-roboto">
                     <div class="navbar-brand">
                        <ul class="list-inline tx-16" style="color: #fff; font-weight: 400;">
                           <!-- Mobile Toggle and Logo -->
                           <li class="list-inline-item"><a class="hidden-md hidden-lg hidden-sm hidden-xs" href="#" id="sidebar-toggle-button"><i data-feather="menu" class="wd-20"></i></a></li>
                           <!-- PC Toggle and Logo -->
                           <!-- <li class="list-inline-item"><a class="hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i data-feather="chevrons-left" class="wd-20"></i></a></li> -->

                           <li class="list-inline-item tx-rubik hidden-md hidden-lg">
                              <a href="<?= base_url('dashboard') ?>" class="text-top navbar-brand d-flex">
                                 <p class="tx-gray-500 tx-12" style="color: #fff;">Perpustakaan <br>
                                 <?= $skl['nama_sekolah'] ?></p>
                              </a>
                           </li>
                           <?php
                            if($title == 'Dashboard | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5'><span class='badge hidden-xs hidden-sm'>Dashboard</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Profil | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5'><span class='badge hidden-xs hidden-sm'>Profile</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Ganti Password | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Profil</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li><li class='list-inline-item pd-5'><span class='badge hidden-xs hidden-sm'>Ganti Password</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Pengunguman | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Others</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li><li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Pengunguman</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Tambah Pengunguman | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Others</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li><li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Buat Pengunguman</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Edit Pengunguman | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Others</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li><li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Edit Pengunguman</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Data Sekolah | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li><li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Data Sekolah</span></li>";
                            } else {
                            }
                           ?>

                          <?php
                            if($title == 'Edit Sekolah | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li><li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Edit Data Sekolah</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Baca Buku | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li><li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Baca Buku</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Data Anggota Perpustakaan | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Siswa</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Data Siswa</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Tambah Anggota Perpustakaan | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Siswa</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Tambah Siswa</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Edit Data Anggota | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Siswa</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Edit Siswa</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Lihat Data Anggota | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Siswa</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>View Siswa</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Update Password Anggota | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Siswa</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Update Password Siswa</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Data Petugas Perpustakaan | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Petugas</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Data Petugas</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Tambah Petugas Perpustakaan | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Petugas</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Tambah Petugas</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Edit Data Petugas | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Petugas</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Edit Data Petugas</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Update Password Petugas | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Petugas</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Update Password Petugas</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Penerbit | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Katalog Buku</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Penerbit</span></li>";
                            } else {
                            }
                           ?>
                          
                          <?php
                            if($title == 'Pengarang | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Katalog Buku</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Pengarang</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Kategori Buku Perpustakaan | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                              <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Katalog Buku</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                              <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Kategori Buku</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Data Buku | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                                    <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Katalog Buku</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                                    <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Data Buku</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Tambah Buku | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                                    <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Katalog Buku</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                                    <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Tambah Buku</span></li>";
                            } else {
                            }
                           ?>

                        <?php
                            if($title == 'Lihat Data Buku | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                                    <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Katalog Buku</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                                    <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Detail Buku</span></li>";
                            } else {
                            }
                           ?>

                          <?php
                            if($title == 'Edit Data Buku | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                                    <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Katalog Buku</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                                    <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Edit Buku</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Import Buku | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                                    <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Katalog Buku</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                                    <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Import Buku</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Pengaturan | Perpustakaan'){
                              echo "<li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Pengaturan</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Peminjaman | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Transaksi</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Peminjaman</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Detail Buku Peminjaman | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Transaksi</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Detail Buku Peminjaman</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Proses Buku Peminjaman | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Transaksi</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Proses Peminjaman</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Riwayat Peminjaman | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Transaksi</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Riwayat Peminjaman</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Tambah Peminjaman | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Transaksi</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                               <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Tambah Transaksi Peminjaman</span></li>";
                            } else {
                            }
                           ?>

                           <?php
                            if($title == 'Laporan | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Others</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li><li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Laporan</span></li>";
                            } else {
                            }
                           ?>

                            <?php
                            if($title == 'Hasil Pencarian | Perpustakaan'){
                              echo "<li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Menu</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                              <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Transaksi</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                              <li class='list-inline-item pd-5 hidden-xs hidden-sm'><small>Peminjaman</small>&nbsp;&nbsp;<i data-feather='chevron-right' class='wd-20'></i></li>
                              <li class='list-inline-item'><span class='badge hidden-xs hidden-sm'>Hasil Pencarian</span></li>";
                            } else {
                            }
                           ?>
                        </ul>
                     </div>
                  </div>


                  <div class="header-right pull-right mb-2">
                     <ul class="list-inline justify-content-end">
                        <li class="list-inline-item dropdown">
                           <!-- Notifikasi peminjaman -->
                           <?php 
                       $tgl = date("Y-m-d");
                       $nisn = $this->session->userdata('nisn');
                       $count_id = $this->db->query("SELECT COUNT(id) AS jumlah_total FROM tb_peminjaman WHERE status ='Sedang Dipinjam' AND nomor_anggota = '$nisn'
                              AND status_read ='0' AND (tgl_kembali < '$tgl' OR tgl_kembali ='$tgl' OR DATEDIFF(tgl_kembali,'$tgl') = 3
                              OR DATEDIFF(tgl_kembali,'$tgl') = 2 OR DATEDIFF(tgl_kembali,'$tgl') = 1)");
                          foreach($count_id->result() as $brp_id) {
                          if ($brp_id->jumlah_total == 0) {
                             echo "
                                <button title='Notifikasi' onclick='hilang_badges(); load_more();' class='btn btn-link btn-xs' style='color: #fff;' id='dropdownMenuButton' data-toggle='dropdown'><i class='fa fa-bell-o fa-lg'><input onclick='hilang_badges(); load_more();' id='button_notif' style='background: #3c78c2; width: 15px; height: 15px; border-radius: 100px; padding: 1px 4px; text-align: center; color: #fff; font-size: 11px; right: -0px; top:-8px; position: relative;' value='' readonly hidden />
                                    </i></button>"; 
                          } else if ($brp_id->jumlah_total == 9) {
                             echo "
                                <button title='Notifikasi' onclick='hilang_badges(); load_more();' class='btn btn-link btn-xs' style='color: #fff;' id='dropdownMenuButton' data-toggle='dropdown'><i class='fa fa-bell-o fa-lg'><input onclick='hilang_badges(); load_more();' id='button_notif' style='background: #3c78c2; width: 15px; height: 15px; border-radius: 100px; padding: 1px 4px; text-align: center; color: #fff; font-size: 11px; right: -0px; top:-8px; position: relative;' value='$brp_id->jumlah_total' readonly />
                                    </i></button>"; 

                          } else if ($brp_id->jumlah_total < 9){
                              echo "
                                <button title='Notifikasi' onclick='hilang_badges(); load_more();' class='btn btn-link btn-xs' style='color: #fff;' id='dropdownMenuButton' data-toggle='dropdown'><i class='fa fa-bell-o fa-lg'><input onclick='hilang_badges(); load_more();' id='button_notif' style='background: #3c78c2; width: 15px; height: 15px; border-radius: 100px; padding: 1px 4px; text-align: center; color: #fff; font-size: 11px; right: -0px; top:-8px; position: relative;' value='$brp_id->jumlah_total' readonly />
                                    </i></button>"; 
                             
                          } else if ($brp_id->jumlah_total > 9) {
                               echo "<button title='Notifikasi' onclick='hilang_badges(); load_more();' class='btn btn-link btn-xs' style='color: #fff;' id='dropdownMenuButton' data-toggle='dropdown'><i class='fa fa-bell-o fa-lg'><input onclick='hilang_badges(); load_more();' id='button_notif' style='background: #3c78c2; width: 15px; height: 15px; border-radius: 100px; padding: 1px 4px; text-align: center; color: #fff; font-size: 11px; right: -0px; top:-8px; position: relative;' value='9+' readonly /></i></button>";

                          } else {

                          } 
                        }?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                 <div class="top-notifications-area">
                                 <div class="notifications-heading">
                                    <div class="heading-title">
                                       <h6>Pemberitahuan</h6>
                                    </div>
                                 </div>
                                 <div class="notifications-box tx-rubik" id="notificationsBox">
                                     <table cellpadding="5" cellspacing="5" width="100%">
                                         
                                          <tr><td><center><button id="loading" class="btn btn-link" style="display:none; color: red;">Tunggu sebentar...<i class="fa fa-spinner" aria-hidden="true"></center></td></tr>
                                          <td id="button_isi"></td>

                                      </table>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="list-inline-item dropdown hidden-xs hidden-sm">
                             <span class="mr-3 tx-rubik" style="color: #fff; font-weight: 400;"><?= $user['nama']; ?></span>
                           <a  href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <img src="<?= base_url('assets/images/profil/') . $user['foto']; ?>" class="img-fluid wd-30 ht-30 rounded-circle img-thumbnail" alt="">
                           </a>
                           <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                              <div class="user-profile-area">
                                 <div class="user-profile-heading">
                                    <div class="profile-thumbnail">
                                       <img src="<?= base_url('assets/images/profil/') . $user['foto']; ?>" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                                    </div>
                                    <div class="profile-text">
                                       <h6><?= $user['nama']; ?></h6>
                                       <span><?= $user['email']; ?></span>
                                    </div>
                                 </div>
                                 <a href="<?= base_url('profile') ?>" class="dropdown-item"><i data-feather="user" class="wd-16 mr-2"></i> My profile</a>
                                 <a href="" class="dropdown-item"><i data-feather="message-square" class="wd-16 mr-2"></i> Info</a>
                                 <a href="" class="dropdown-item"><i data-feather="settings" class="wd-16 mr-2"></i> Settings</a>
                                 <a href="<?= base_url('masuk/keluar') ?>" class="dropdown-item"><i data-feather="power" class="wd-16 mr-2"></i> Keluar</a>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>


<?php endforeach; ?>