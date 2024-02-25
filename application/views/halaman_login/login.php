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
          background: url(./assets/images/bg-login/bg.jpg) no-repeat center center fixed; 
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

   <form action="<?= base_url('masuk'); ?>" method="post" data-parsley-validate="" novalidate="">
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
                     <li class="tx-gray-400">&copy; <?= date("Y"); ?> Perpustakaan Digital</li>
                    </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-7 bg-light">
                  <div class="ht-100v d-flex align-items-center justify-content-center">
                     <div class="ht-100v">
                     <br><br><br><br>
                     <img src="<?= base_url('assets/images/logo/') . $s['logo']; ?>" alt="icon" class="img-fluid hidden-lg" style="width: 100px; margin-bottom: 30px; margin-top: -20px;">
                     <h3 class="tx-dark mg-b-5 tx-left tx-22">Masuk Akun</h3>
                     <p class="tx-gray-500 tx-14 mg-b-35 tx-left">Buat kamu yang sudah terdaftar, silakan masuk ke akunmu.</p>
                     <form>
                        <div class="form-group" id="mail">
                           <?php
                              if(form_error('nisn')){
                              echo '<img src="assets/images/icon/icon-danger.svg" class="form-icon" alt="icon">';
                              }
                           ?>
                           <label class="form-label">Username</label>
                           <input type="text" name="nisn" id="nisn" class="form-control" value="<?= set_value('nisn') ?>">

                           <!-- Pesan Validation Email -->
                           <ul class="parsley-errors-list filled" id="parsley-id-1">
                              <li class="parsley-required mg-l-5 mg-t-2 text-left"> <?= form_error('nisn'); ?></li>
                           </ul>
                        </div>

                        <div class="form-group" id="pass">
                           <label class="form-label">Password</label>
                           <input type="password" name="password" id="password" class="form-control" value="">

                            <!-- Pesan Validation Email -->
                           <ul class="parsley-errors-list filled" id="parsley-id-1">
                              <li class="parsley-required mg-l-5 mg-t-2 text-left"> <?= form_error('password'); ?></li>
                           </ul>
                        </div>
                     </form>
                     <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="form-check-input" id="showPass">
                           <label class="label tx-gray-500" for="showPass">Tampilkan Kata Sandi</label>
                     </div>
                     <br>
                     <!-- Pesan Error -->
                     <small><span> <?= $this->session->flashdata('pesan'); ?></span></small>

                     <button type="submit" class="btn btn-primary rounded-pill tx-uppercase tx-bold btn-block">Masuk</button>

                     <div class="btn-login form-group">
                        <div class="d-flex justify-content-between pd-y-20 custom-control custom-checkbox">
                           <input type="checkbox" class="form-check-input" id="customCheck1">
                           <label class="label tx-gray-500 checked" for="customCheck1">Ingat saya</label>
                           <a href="<?= base_url('masuk/lupa_password') ?>" class="tx-13 mg-b-0 tx-semibold">Lupa Password ?</a>
                           </div>
                     </div>
                     <hr>
                     <div class="btn-login tx-13 mg-t-20 tx-center tx-gray-500">Belum punya akun? <a href="<?= base_url('masuk/daftar_anggota') ?>" class="tx-dark tx-semibold">Buat Akun</a></div>
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
         $(document).ready(function () {
             var showPass = document.querySelector('#showPass');
                 var password = document.querySelector('#password');
                 showPass.addEventListener('click', function (e) {
                  // toggle the type attribute
                   var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                   password.setAttribute('type', type);
             });
         });

         document.getElementById("mail").addEventListener("click", addFunction);
            function addFunction() {
               document.getElementById("mail").classList.add('is-active');
            }

            document.getElementById("pass").addEventListener("click", myFunction);
            function myFunction() {
                document.getElementById("pass").classList.add('is-active')
            }

            var add = document.getElementById("mail");
                if('<?= form_error('email') ?>'){
                    add.classList.add('is-active');
                }

            var addC = document.getElementById("mail");
                if('<?= form_error('password') ?>'){
                    addC.classList.add('is-active');
                }

            var email = document.getElementById("email");
                if('<?= form_error('email') ?>'){
                  email.classList.add('is-error');
                }

             var password = document.getElementById("password");
                if('<?= form_error('password') ?>'){
                   password.classList.add('is-error');
                }
      </script>
   </body>

<?php endforeach; ?>

</html>

