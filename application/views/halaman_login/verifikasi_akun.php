<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php foreach($sekolah as $s) : ?>

	<title><?= $title; ?> <?= $s['nama_sekolah']; ?></title>

	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&amp;display=swap" rel="stylesheet" />
    <link rel="icon" href="<?= base_url('assets/images/logo/') . $s['logo']; ?>">
</head>
<style>
	.card{
		border-radius: 10px;
	}

	.colom{
		margin-top: 10px;
		
	}

	.card-title{
		color: #007bff9c;
    	text-decoration: none;
	}

	.card-text{
		color: #142b72;
		font-size: 14px;
		text-align: center;
	}

	.btn-log{
		margin-top: 30px;
		margin-bottom: 30px;
		padding: 8px;
		text-align: center;
		font-size: 16px;
		font-weight: 500;
		border-radius: 20px;
	}

	.img-fluid{
		width: 200px;
		display: block;
		margin-left: auto;
		margin-right: auto;
	}

	.text-top{
		color: #fff;
		float: left;
	}

	.text-top h4{
		font-size: 15px;
	}
</style>
<body style="background-color: #f2f3f8;" class="tx-rubik">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary mg-b-40">
	<div class="container">
     <a class="text-top navbar-brand" href="<?= base_url() ?>">
	    <h4 class="tx-gray-300">Perpustakaan <br> <?= $s['nama_sekolah'] ?></h4>
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
		<div class="col-md-5">
			<div class="card">
			  <div class="card-body mg-x-10-force">
			  	<img class="img-fluid" src="<?= base_url() ?>assets/images/bg-login/verifikasi_akun.webp">
			    <h5 class="card-title text-center tx-gray-600">Cek E-mail Kamu</h5>
			    <p class="card-text">Link verifikasi telah di kirimkan ke e-mail <br> kamu. Segera cek folder inbox/spam e-mail dan klik tombol "Verifikasi Sekarang" agar bisa melanjutkan ke proses login.</p>
			    <a href="<?= base_url('masuk') ?>" class="btn-log btn btn-primary btn-block tx-gray-500">Kembali ke Login</a>
			  </div>
			</div>
		</div>
	</div>
</div>
</body>
<?php endforeach; ?>
</html>