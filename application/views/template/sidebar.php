 <?php foreach($sekolah as $sklh) : ?>
<div class="page-container">
       <div class="page-sidebar">
            <div class="logo">
              <a class="logo-img" href="">    
               <img class="desktop-logo" src="<?= base_url('assets/images/logo/') . $sklh['logo']; ?>" alt="" style="width: 30px;">
               <?php 
                  $query = "SELECT `nama_sistem` FROM `tb_pengaturan`";
                  $tampil = $this->db->query($query)->result_array();
               ?>
               <?php foreach($tampil as $t) : ?>
                  <span class="brand-name tx-uppercase" style="white-space: normal;"><?= $t['nama_sistem']; ?></span>
               <?php endforeach; ?>
               <img class="small-logo" src="<?= base_url('assets/images/logo/') . $sklh['logo']; ?>" alt="">
               </a>     
               <a id="sidebar-toggle-button-close"><i class="wd-20" data-feather="x"></i> </a>
            </div>
            <div class="page-sidebar-inner">
               <div class="page-sidebar-menu">
                  <ul class="accordion-menu">
                     <li class="mg-l-20-force mg-t-25-force menu-navigation"></li>
                     <li>
                        <a href="<?= base_url('dashboard'); ?>"><i data-feather="home" class="wd-15"></i>
                        <span>Dashboard</span></a>
                     </li>
                     <li>
                        <a href="<?= base_url('profile'); ?>"><i data-feather="user" class="wd-15"></i>
                        <span>Profil</span></i></a>
                     </li>

                     <?php if($user['id_akses'] == 1) : ?>
                      <li>
                        <a href="<?= base_url('pengaturan'); ?>"><i data-feather="settings" class="wd-15"></i>
                        <span>Pengaturan</span></a>
                     </li>
                     <?php endif; ?>

                     <li class="mg-l-20-force mg-t-25-force menu-elements">Menu</li>
                     <?php if($user['id_akses'] == 1) : ?>
                      <li>
                        <a href=""><i data-feather="users" class="wd-15"></i>
                        <span>Data Users</span><i class="accordion-icon fa fa-angle-left"></i></a>
                        <ul class="sub-menu" style="display: block;">
                           <!-- Active Page -->
                           <li><a href="<?= base_url('anggota'); ?>">Siswa</a></li>
                           <li><a href="<?= base_url('petugas'); ?>">Petugas</a></li>
                        </ul>
                     </li>
                     <?php endif; ?>
                     <li>
                        <a href="<?= base_url('baca_buku') ?>"><i data-feather="monitor" class="wd-15"></i>
                        <span>E-book</span></a>
                     </li>
                     <li>
                        <a href="<?= base_url('sekolah') ?>"><i data-feather="grid" class="wd-15"></i>
                        <span>Data Sekolah</span></a>
                     </li>

                     <!-- user 3 boleh akses data siswa -->
                     <?php if($user['id_akses'] == 3) : ?>
                     <li>
                        <a href="<?= base_url('anggota'); ?>"><i data-feather="users" class="wd-15"></i>
                        <span>Data Siswa</span></i></a>
                     </li>
                     <?php endif; ?>


                     <?php if($user['id_akses'] == 1) : ?>
                     <li>
                        <a href=""><i data-feather="tag" class="wd-15"></i>
                        <span>Katalog Buku</span><i class="accordion-icon fa fa-angle-left"></i></a>
                        <ul class="sub-menu" style="display: block;">
                           <!-- Active Page -->
                           <li><a href="<?= base_url('buku') ?>">Buku</a></li>
                           <li><a href="<?= base_url('kategori_buku') ?>">Kategori</a></li>
                           <li><a href="<?= base_url('pengarang') ?>">Pengarang</a></li>
                           <li><a href="<?= base_url('penerbit') ?>">Penerbit</a></li>
                        </ul>
                     </li>
                     <?php endif; ?>
                     <?php if($user['id_akses'] != 3) : ?>
                     <li>
                        <a href=""><i data-feather="shopping-cart" class="wd-15"></i>
                        <span>Transaksi</span><i class="accordion-icon fa fa-angle-left"></i></a>
                        <ul class="sub-menu" style="display: block;">
                           <!-- Active Page -->
                           <li><a href="<?= base_url('transaksi') ?>">Peminjaman</a></li>
                           <li><a href="<?= base_url('riwayat_transaksi') ?>">Riwayat Peminjaman</a></li>
                        </ul>
                     </li>
                     <?php endif; ?>
                     <li class="mg-l-20-force mg-t-25-force menu-elements">Others</li>
                     <?php if($user['id_akses'] != 2) : ?>
                     <li>
                        <a href="<?= base_url('pengunguman') ?>"><i data-feather="clipboard" class="wd-15"></i>
                        <span>Pengumuman</span></a>
                     </li>
                     <li>
                        <a href="<?= base_url('laporan') ?>"><i data-feather="printer" class="wd-15"></i>
                        <span>Laporan</span></a>
                     </li>
                     <?php endif; ?>
                     
                     <li>
                        <a href="<?= base_url('masuk/keluar') ?>"><i data-feather="power" class="wd-15"></i>
                        <span>Keluar</span></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
<?php endforeach; ?>