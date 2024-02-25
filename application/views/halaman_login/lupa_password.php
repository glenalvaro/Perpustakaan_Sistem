<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author"  content=""/>
      <!-- Page Title -->
       <?php foreach($sekolah as $s) : ?>

      <title><?= $title; ?> <?= $s['nama_sekolah']; ?></title>

      <!-- Font CSS -->   
      <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&amp;display=swap" rel="stylesheet" />
      <!-- Main CSS --> 
      <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/style.css"/>
      <!-- Login CSS --> 
      <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/login.css"/>
      <!-- Favicon -->  
      <link rel="icon" href="<?= base_url('assets/images/logo/') . $s['logo']; ?>" type="image/x-icon">
   </head>
   <style>
      .bg-login{ 
          background: url(../assets/images/bg-login/bg.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
      }
   </style>
   <body>

   <!-- Sweet Alert -->
   <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
   <?php if ($this->session->flashdata('flash')) : ?>
   <?php endif; ?>

   <form action="<?= base_url('masuk/lupa_password'); ?>" method="post" data-parsley-validate="" novalidate="">
      <div class="ht-100v text-center">
         <div class="row pd-0 mg-0">
            <div class="col-lg-5 bg-login hidden-sm hidden-xs">
               <div class="ht-100v d-flex">
                  <div class="bg-logo-login">
                     <img src="<?= base_url('assets/images/logo/') . $s['logo']; ?>" class="img-fluid" alt="">
                  </div>
                  <div class="align-self-center">
                     <?php 
                        $query = "SELECT `nama_sistem` FROM `tb_pengaturan`";
                        $hasil = $this->db->query($query)->result_array();
                     ?>
                     <?php foreach($hasil as $row) : ?>
                        <h3 class="tx-20 tx-semibold tx-uppercase tx-gray-100 pd-t-10 pd-md-x-30 tx-left">Sistem Informasi <?= $row['nama_sistem']; ?></h3>
                     <?php endforeach; ?>
                     <h3 class="tx-20 tx-semibold tx-gray-100 pd-md-x-30 tx-left"><?= $s['nama_sekolah'] ?></h3>
                     <p class="pd-y-15 pd-x-10 pd-md-x-30 tx-gray-200 tx-left">Sistem Informasi Perpustakaan adalah sistem yang dibuat untuk memudahkan petugas perpustakaan dalam mengelola suatu perpustakaan. Semua di proses secara komputerisasi yaitu digunakannya suatu software tertentu seperti software pengolah database.</p>
                  </div>
                  <div class="bg-footer-login">
                     <ul>
                       <li class="tx-gray-400">&copy; <?= date('Y') ?> Perpustakaan Digital</li>
                    </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-7 bg-light pd-md-x-30">
                  <div class="ht-100v d-flex align-items-center justify-content-center">
                     <div class="ht-100v">
                     <br><br><br><br>
                     <img src="<?= base_url() ?>/assets/images/icon/logo-eperpus.png" alt="icon" class="img-fluid hidden-lg" style="width: 170px; margin-bottom: 30px; margin-top: -20px;">
                     <h3 class="tx-dark mg-b-5 tx-left tx-22">Lupa Password</h3>
                     <p class="tx-gray-500 tx-14 mg-b-35 tx-left">Dengan mengirimkan permintaan reset kata sandi, Anda akan menerima email yang berisi konfirmasi. Pastikan data email akun Anda sudah dimasukkan terlebih dahulu ke dalam sistem.</p>
                     <form>
                        <div class="form-group" id="mail-forgot">
                           <?php
                              if(form_error('email')){
                              echo '<img src="../assets/images/icon/icon-danger.svg" class="form-icon" alt="icon">';
                              }
                           ?>
                           <label class="form-label">Alamat E-mail</label>
                           <input type="text" name="email" id="email" class="form-control" value="<?= set_value('email') ?>">

                           <!-- Pesan Validation Email -->
                           <ul class="parsley-errors-list filled" id="parsley-id-1">
                              <li class="parsley-required mg-l-5 mg-t-2 text-left"> <?= form_error('email'); ?></li>
                           </ul>
                        </div>

                     </form>
                     <br>
                     <!-- Pesan Error -->
                     <small><span> <?= $this->session->flashdata('pesan'); ?></span></small>

                     <button type="submit" class="btn btn-primary rounded-pill tx-uppercase tx-bold btn-block">Kirim</button>
                     <hr>
                     <div class="btn-login tx-13 mg-t-20 tx-center tx-gray-500">Sudah punya akun? <a href="<?= base_url('masuk') ?>" class="tx-dark tx-semibold">Masuk</a></div>
                  </div>
               </div>
                <ul class="hidden-lg hidden-md" style="margin-top: -40px; margin-right: 16px;">
                     <li class="tx-gray-400 tx-center">&copy; <?= date("Y"); ?> Perpustakaan Digital</li>
                  </ul>
            </div>
         </div>
      </div>
   </form>
      <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
      <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="<?= base_url() ?>assets/js/sweet-alert/sweetalert2.all.min.js"></script>
      <script src="<?= base_url() ?>assets/js/sweet-alert/script.js"></script>
      <script>
         document.getElementById("mail-forgot").addEventListener("click", addFunction);
            function addFunction() {
               document.getElementById("mail-forgot").classList.add('is-active');
            }

            var add = document.getElementById("mail-forgot");
                if('<?= form_error('email') ?>'){
                    add.classList.add('is-active');
                }

            var addC = document.getElementById("mail-forgot");
                if('<?= form_error('password') ?>'){
                    addC.classList.add('is-active');
                }

            var email = document.getElementById("email");
                if('<?= form_error('email') ?>'){
                  email.classList.add('is-error');
                }
      </script>
   </body>

<?php endforeach; ?>

</html>

