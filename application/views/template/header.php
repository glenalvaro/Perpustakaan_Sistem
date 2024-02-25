<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author"  content=""/>
      <!-- Page Title -->
      <?php foreach($sekolah as $sk) : ?>
      <title><?= $title; ?> <?= $sk['nama_sekolah']; ?></title>

      <!-- Favicon -->  
      <link rel="icon" href="<?= base_url('assets/images/logo/') . $sk['logo']; ?>" type="image/x-icon">
      <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/ladda/ladda.css">
      <!-- Bootstrap -->
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
       <!-- Articles CSS -->      
      <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote.min.css">
      <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
       <!-- semantic CSS -->
      <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/plugins/semantic/semantic.min.css"/>
      <!-- prism CSS -->
      <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/plugins/prism/prism-vs.css"/>
      <!-- Datepicket CSS -->
      <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css"/>
      <!-- Datepicker Boostrap -->
      <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/plugins/datetimepicker/css/bootstrap-material-datetimepicker.css"/>
      <!-- Chart CSS -->      
      <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/plugins/chartist/chartist.css">
      <!-- Select 2 -->
      <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.min.css">
      <!-- Data Tables -->
      <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
      <!-- Map CSS --> 
      <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jquery-jvectormap-2.0.2.css">
      <!-- Material Icon -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Main CSS -->	  
      <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/style.css"/>
      <!-- Leaflet Js -->
       <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
      <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
      <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script> -->
      <!-- Slick slider-->
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/slick/slick.css?v2022">
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/slick/slick-theme.css?v2022">
      <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/typeahead/typeahead.css">
      <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/ui-item/jquery-ui.css">
      <!-- Skin Web -->
      <link id="avestaMode" rel="stylesheet" href="<?= base_url() ?>assets/css/skin/skin.light-skin.css">
      <link id="avestaSkin" rel="stylesheet" href="<?= base_url() ?>assets/css/skin/skin.light.css">
   </head>
<body>
 <!-- Menu Mobile -->
   <nav id="menu-bottom" class="nav tx-uppercase">
     <?php if($title == 'Dashboard | Perpustakaan') : ?>
        <a href="<?= base_url('dashboard'); ?>" class="nav__link">
            <i data-feather="home" class="wd-15 tx-gray-500 nav__link--active"></i>
            <span class="nav__text nav__link--active mt-2 tx-gray-500">Home</span>
        </a>

        <?php else : ?>
        <a href="<?= base_url('dashboard'); ?>" class="nav__link">
            <i data-feather="home" class="wd-15 tx-gray-500"></i>
            <span class="nav__text mt-2 tx-gray-500">Home</span>
        </a>
        <?php endif; ?>

       <?php if($title == 'Baca Buku | Perpustakaan') : ?>
        <a href="<?= base_url('baca_buku'); ?>" class="nav__link">
            <i data-feather="book-open" class="wd-15 tx-gray-500 nav__link--active"></i>
            <span class="nav__text nav__link--active mt-2 tx-gray-500">E-book</span>
        </a>

        <?php else : ?>
        <a href="<?= base_url('baca_buku'); ?>" class="nav__link">
            <i data-feather="book-open" class="wd-15 tx-gray-500"></i>
            <span class="nav__text mt-2 tx-gray-500">E-book</span>
        </a>
        <?php endif; ?>

        <!-- jika id akses kepala sekola tampilkan tombol print -->
        <?php if($user['id_akses'] != 3) : ?>
          <?php if($title == 'Peminjaman | Perpustakaan') : ?>
          <a href="<?= base_url('transaksi'); ?>" class="nav__link">
              <i data-feather="grid" class="wd-15 tx-gray-500 nav__link--active"></i>
              <span class="nav__text nav__link--active mt-2 tx-gray-500">Peminjaman</span>
          </a>

          <?php else : ?>
          <a href="<?= base_url('transaksi'); ?>" class="nav__link">
              <i data-feather="grid" class="wd-15 tx-gray-500"></i>
              <span class="nav__text mt-2 tx-gray-500">Peminjaman</span>
          </a>
          <?php endif; ?>
        <?php endif; ?>

        <!-- jika id akses kepala sekola tampilkan tombol print -->
        <?php if($user['id_akses'] == 3) : ?>
          <?php if($title == 'Laporan | Perpustakaan') : ?>
          <a href="<?= base_url('laporan'); ?>" class="nav__link">
              <i data-feather="printer" class="wd-15 tx-gray-500 nav__link--active"></i>
              <span class="nav__text nav__link--active mt-2 tx-gray-500">Laporan</span>
          </a>

          <?php else : ?>
          <a href="<?= base_url('laporan'); ?>" class="nav__link">
              <i data-feather="printer" class="wd-15 tx-gray-500"></i>
              <span class="nav__text mt-2 tx-gray-500">Laporan</span>
          </a>
          <?php endif; ?>
        <?php endif; ?>

        <!-- jika id akses kepala sekola tampilkan tombol print -->
        <?php if($user['id_akses'] == 3) : ?>
          <?php if($title == 'Pengunguman | Perpustakaan') : ?>
          <a href="<?= base_url('pengunguman'); ?>" class="nav__link">
              <i data-feather="clipboard" class="wd-15 tx-gray-500 nav__link--active"></i>
              <span class="nav__text nav__link--active mt-2 tx-gray-500">Pengunguman</span>
          </a>

          <?php else : ?>
          <a href="<?= base_url('pengunguman'); ?>" class="nav__link">
              <i data-feather="clipboard" class="wd-15 tx-gray-500"></i>
              <span class="nav__text mt-2 tx-gray-500">Pengunguman</span>
          </a>
          <?php endif; ?>
        <?php endif; ?>

        <?php if($user['id_akses'] != 3) : ?>
        <?php if($title == 'Riwayat Peminjaman | Perpustakaan') : ?>
        <a href="<?= base_url('riwayat_transaksi'); ?>" class="nav__link">
            <i data-feather="clock" class="wd-15 tx-gray-500 nav__link--active"></i>
            <span class="nav__text nav__link--active mt-2 tx-gray-500">Riwayat</span>
        </a>

        <?php else : ?>
        <a href="<?= base_url('riwayat_transaksi'); ?>" class="nav__link">
            <i data-feather="clock" class="wd-15 tx-gray-500"></i>
            <span class="nav__text mt-2 tx-gray-500">Riwayat</span>
        </a>
        <?php endif; ?>
        <?php endif; ?>

        <?php if($title == 'Profil | Perpustakaan') : ?>
        <a href="<?= base_url('profile'); ?>" class="nav__link mt-1">
          <i data-feather="user" class="wd-15 tx-gray-500 nav__link--active"></i>
            <span class="nav__text nav__link--active mt-2 tx-gray-500">Profil</span>
        </a>

        <?php else : ?>
           <a href="<?= base_url('profile'); ?>" class="nav__link mt-1">
           <i data-feather="user" class="wd-15 tx-gray-500"></i>
            <span class="nav__text mt-2 tx-gray-500">Profil</span>
        </a>
        <?php endif; ?>
  </nav>

<?php endforeach; ?>