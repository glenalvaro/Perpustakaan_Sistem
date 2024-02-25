<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php foreach($sekolah as $m) : ?>
	<title><?= $title; ?> <?= $m['nama_sekolah']; ?></title>

	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&amp;display=swap" rel="stylesheet" />
    <link rel="icon" href="<?= base_url('assets/images/logo/') . $m['logo']; ?>">
</head>
<body style="background-color: #f2f3f8;" class="tx-rubik">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary mg-b-40">
	<div class="container">
     <a class="text-top navbar-brand" href="<?= base_url() ?>">
	    <h4 class="tx-gray-300 tx-14">Perpustakaan <br> <?= $m['nama_sekolah'] ?></h4>
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
	<div class="row align-items-center justify-content-center">
		<div class="col-lg-8">
			<div class="card">
  		<div class="card-header bg-white">
    		<h4 class="tx-14">Buat Kata Sandi Baru</h4>
  		</div>
		  <div class="card-body">
		      <form action="<?= base_url('masuk/changePassword'); ?>" method="post" autocomplete="on">
        <div class="input-group mb-3">
              <input type="password" id="password11" name="password11" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-lock"></span>
            </div>
          </div>
        </div>
          <ul class="parsley-errors-list filled" id="parsley-id-1">
            <li class="parsley-required mg-l-5 mg-t-2 text-left"> <?= form_error('password11'); ?></li>
         </ul>
        <div class="input-group mb-3">
              <input type="password" id="password22" name="password22" class="form-control" placeholder="Ulangi Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-lock"></span>
            </div>
          </div>
        </div>
         <ul class="parsley-errors-list filled" id="parsley-id-1">
            <li class="parsley-required mg-l-5 mg-t-2 text-left"> <?= form_error('password22'); ?></li>
         </ul>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
          </div>
        </div>
      </form>
		  </div>
  			<div class="card-footer bg-white">
    			<p class="tx-12">Sistem informasi perpustakaan <?= $m['nama_sekolah'] ?></p>
  			</div>
			</div>
		</div>
	</div>
</div>

</body>
<?php endforeach; ?>

</html>