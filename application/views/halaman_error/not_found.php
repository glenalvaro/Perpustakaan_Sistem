<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php foreach($sekolah as $ski) : ?>
	<title><?= $title; ?> <?= $ski['nama_sekolah']; ?></title>

  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/plugins/prism/prism-vs.css"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&amp;display=swap" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style-error.css">
    <link rel="icon" href="<?= base_url('assets/images/logo/') . $ski['logo']; ?>">
</head>
<style>
	.text-top{
		color: #fff;
		float: left;
	}
</style>
<body class="tx-rubik">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container">
     <a class="text-top navbar-brand" href="<?= base_url() ?>">
	    <h4 class="tx-gray-300 tx-13">Perpustakaan <br> <?= $ski['nama_sekolah'] ?></h4>
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

<div id="notfound">
	<div class="notfound">
		<div class="notfound-404">
			<br>
			<br>
			<img src="<?= base_url() ?>assets/images/icon/error-404.png" width="67%" class="img-fluid mg-r-35">
		</div>
			<h2 class="mg-l-28">Halaman tidak ditemukan</h2>
			<p class="mg-l-28">Pastikan halaman yang kamu tuju sudah benar</p>
			<a class="mg-l-28" href="<?= base_url() ?>">Kembali ke Dashboard</a>
	</div>
</div>
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
<?php endforeach; ?>
</html>