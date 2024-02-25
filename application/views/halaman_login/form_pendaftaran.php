<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

   <?php foreach($sekolah as $t) : ?>
   <title><?= $title; ?> <?= $t['nama_sekolah']; ?></title>

	<link rel="icon" href="<?= base_url('assets/images/logo/') . $t['logo']; ?>">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
   <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&amp;display=swap" rel="stylesheet" />
   <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/plugins/datetimepicker/css/bootstrap-material-datetimepicker.css"/>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!-- Login CSS --> 
   <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/login.css"/>
</head>
<body style="background-color: #f2f3f8;" class="tx-rubik">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary mg-b-40">
	<div class="container">
     <a class="text-top navbar-brand" href="<?= base_url() ?>">
	    <h4 class="tx-gray-300 tx-14">Perpustakaan <br> <?= $t['nama_sekolah'] ?></h4>
	  </a>
    <button class="navbar-toggler hidden-sm hidden-xs hidden-md" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
      </ul>
      <form class="form-inline">
        <button class="btn btn-outline-light btn-sm mr-3"><img src="<?= base_url() ?>assets/images/icon/icon_help.svg"> Bantuan</button>
        <button class="btn btn-outline-light btn-sm"><img src="<?= base_url() ?>assets/images/icon/icon_info.svg"> Hubungi Petugas</button>
      </form>
    </div>
</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="card mg-b-40">
  		<div class="card-header bg-white">
    		<h4 class="tx-14">Pendaftaran Anggota Perpustakaan <?= $t['nama_sekolah'] ?></h4>
  		</div>
		  <div class="card-body mg-x-10-force">
		  	<form class="validasi-syarat" action="<?= base_url('masuk/form_pendaftaran'); ?>" method="post" data-parsley-validate="" novalidate>
		    <h5 class="card-title tx-14 tx-gray-600">Form Pendaftaran</h5>
		    <br>
		    <div class="is-active form-group">   
		    <div class="form-row">
         <div class="col-md-12 mb-3">
               <label class="form-label">Nama Lengkap</label>
               <input type="text" name="nama" id="nama" class="form-control" value="<?= set_value('nama') ?>">
               <!-- Pesan Error -->
               <ul class="parsley-errors-list filled">
                  <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('nama'); ?></li>
               </ul>
         </div>

         <div class="col-md-12 mb-3">
               <label class="form-label">NISN</label>
               <input type="text" name="nisn" id="nisn-input" class="form-control" value="<?= set_value('nisn') ?>">
                <p style="color: #8dabc4; font-size: 11px; margin-left: 5px; font-style: italic;">* Untuk username adalah nisn siswa</p>
               <!-- Pesan Error -->
               <ul class="parsley-errors-list filled">
                  <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('nisn'); ?></li>
               </ul>
         </div>

         <div class="col-md-6 mb-3">
               <label class="form-label">Jenis Kelamin</label>
               <select name="jenis_kelamin" class="form-control select2">
                  <option value="<?= set_value('jenis_kelamin') ?>"><?= set_value('jenis_kelamin') ?></option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
               </select>
               <ul class="parsley-errors-list filled">
                  <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('jenis_kelamin'); ?></li>
               </ul>
         </div>

         <div class="col-md-6 mb-3">
               <label class="form-label">Tanggal Lahir</label>
               <input type="text" id="dtp-hari" name="tgl_lahir" class="form-control" value="<?= set_value('tgl_lahir') ?>">
               <!-- Pesan Error -->
               <ul class="parsley-errors-list filled">
                  <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('tgl_lahir'); ?></li>
               </ul>
         </div>

         <div class="col-md-6 mb-3">
               <label class="form-label">Alamat</label>
               <input type="text" name="alamat" id="alamat" class="form-control" value="<?= set_value('alamat') ?>">
               <!-- Pesan Error -->
               <ul class="parsley-errors-list filled">
                  <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('alamat'); ?></li>
               </ul>
         </div>

         <div class="col-md-6 mb-3">
               <label class="form-label">No Handphone</label>
               <input type="text" name="no_hp" id="phone-input" class="form-control" value="<?= set_value('no_hp') ?>">
               <!-- Pesan Error -->
               <ul class="parsley-errors-list filled">
                  <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('no_hp'); ?></li>
               </ul>
         </div>

         <div class="col-md-6 mb-3">
               <label class="form-label">Pilih Kelas</label>
               <select name="kelas" id="kelas" class="form-control select2">
                  <option value="<?= set_value('kelas') ?>"><?= set_value('kelas') ?></option>
                  <option value="X">KELAS X</option>
                  <option value="XI">KELAS XI</option>
                  <option value="XII">KELAS XII</option>
               </select>
               <!-- Pesan Error -->
               <ul class="parsley-errors-list filled">
                  <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('kelas'); ?></li>
               </ul>
         </div>

         <div class="col-md-6 mb-3">
               <label class="form-label">Pilih Jurusan</label>
               <select name="jurusan" id="jurusan" class="form-control select2">
                  <option value="<?= set_value('jurusan') ?>"><?= set_value('jurusan') ?></option>
                  <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan (TKJ)</option>
                  <option value="Teknik Instalasi Listrik">Teknik Instalasi Listrik (TITL)</option>
                  <option value="Teknik Pengelasan">Teknik Pengelasan (TP)</option>
                  <option value="Tekstil">Tekstil</option>
                  <option value="Bisnis Konstruksi dan Properti">Bisnis Konstruksi dan Properti (BKP)</option>
                  <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif (TKRO)</option>
                  <option value="Kreatif Kriya Kayu dan Rotan">Kreatif Kriya Kayu dan Rotan (KKKR)</option>
                  <option value="Desain komunikasi Visual">Desain Komunikasi Visual (DKV)</option>
               </select>
               <!-- Pesan Error -->
               <ul class="parsley-errors-list filled">
                  <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('jurusan'); ?></li>
               </ul>
         </div>
         
          <div class="col-md-12 mb-3">
                  <label class="form-label">Alamat E-mail</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ?>">
                  <!-- Pesan Error -->
                  <ul class="parsley-errors-list filled">
                     <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('email'); ?></li>
                  </ul>
            </div>

            <div class="col-md-6 mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password1" id="password1" class="form-control">
                  <!-- Pesan Error -->
                  <ul class="parsley-errors-list filled">
                     <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('password1'); ?></li>
                  </ul>
            </div>

            <div class="col-md-6">
                  <label class="form-label">Ulangi Password</label>
                  <input type="password" name="password2" id="password2" class="form-control">
                  <!-- Pesan Error -->
                  <ul class="parsley-errors-list filled">
                     <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('password2'); ?></li>
                  </ul>
            </div>
      </div>
    	</div>


		 <div class="form-group mb-4" style="text-align: center;">
         <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
               <label class="form-check-label" for="invalidCheck">
                  Saya menyetujui syarat dan ketentuan dan kebijakan privasi yang berlaku
               </label>
               <div class="invalid-feedback">
                  Anda harus setuju sebelum mengirimkan.
               </div>
         </div>
      </div>

      <button type="submit" class="btn btn-primary rounded-pill tx-uppercase tx-bold btn-block">Daftar</button>
		</form>

       <div class="btn-login tx-13 mg-t-20 tx-center tx-gray-500">Sudah punya akun? <a href="<?= base_url('masuk') ?>" class="tx-dark tx-semibold">Masuk</a></div>
		</div>
  		<div class="card-footer bg-white">
    		<p class="tx-12">Sistem informasi perpustakaan <?= $t['nama_sekolah'] ?></p>
  		</div>
		</div>
	</div>
  </div>
</div>
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/formatter/jquery.formatter.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="<?= base_url() ?>assets/js/perpus.js"></script>
<script>
	//Fungsi Format Number
$('#phone-input').formatter({
    'pattern': '+62 {{999}}-{{9999}}-{{9999}}',
    'persistent': true
});

//Fungsi Format NISN Siswa
$('#nisn-input').formatter({
    'pattern': '{{999}}{{999}}{{9999}}',
    'persistent': true
});

//Datetimepicker boostrap
 $(function() {
    $('#dtp-hari').bootstrapMaterialDatePicker({
      weekStart: 0,
      time: false,
      clearButton: false,
      format : 'DD MMMM YYYY'
    });
  });


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
   'use strict';
         window.addEventListener('load', function() {
         // Fetch all the forms we want to apply custom Bootstrap validation styles to
         var forms = document.getElementsByClassName('validasi-syarat');
         // Loop over them and prevent submission
         var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                 if (form.checkValidity() === false) {
                   event.preventDefault();
                   event.stopPropagation();
               }
               form.classList.add('was-validated');
            }, false);
            });
       }, false);
   })();
</script>
</body>
<?php endforeach; ?>
</html>