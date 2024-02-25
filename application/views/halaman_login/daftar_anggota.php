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
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
  		<div class="card-header bg-white">
    		<h4 class="tx-14">Pendaftaran Anggota Perpustakaan <?= $m['nama_sekolah'] ?></h4>
  		</div>
		  <div class="card-body">
		    <h5 class="card-title tx-14">Petunjuk Pengisian Formulir</h5>
		    <ul class="tx-12 mg-b-30">
		    	<li>Pastikan data yang Anda masukkan benar dan sesuai</li>
		    	<li>Silahkan hubungi bagian layanan Perpustakaan Umum Sekolah, jika Anda pernah mendaftarkan  sebelumnya tetapi akun Anda tidak aktif.</li>
		    	<li>Jika pendaftaran gagal silahkan hubungi bagian operator perpustakaan</li>
		    	<li>Jika sudah memiliki akun klik tombol login untuk dialihkan ke halaman login</li>
		    </ul>
		    <hr>
		    <h5 class="card-title tx-14">Disiplin</h5>
		    <ul class="tx-12">
		    	<li>Kartu anggota wajib dibawa setiap kali berkunjung ke perpustakaan</li>
		    	<li>Kartu anggota tidak dapat dipinjamkan ke orang lain</li>
		    	<li>Peminjaman buku tidak dapat diwakilkan</li>
		    	<li>Jika kartu anggota hilang, wajib membawa surat keterangan dari pihak wewenang untuk menggantinya</li>
		    </ul>
		    <a href="<?= base_url('masuk/form_pendaftaran') ?>" class="btn btn-primary btn-sm">Lanjutkan Pendaftaran</a>
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