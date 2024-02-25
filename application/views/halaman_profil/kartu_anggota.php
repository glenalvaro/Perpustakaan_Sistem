<?php
error_reporting(0);
    if(!empty($_GET['download'] == 'doc')){
        header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("content-disposition: attachment;filename=".date('d-m-Y')."_laporan_rekam_medis.doc");
    }
    if(!empty($_GET['download'] == 'xls')){
        header("Content-Type: application/force-download");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: 0");
        header("content-disposition: attachment;filename=".date('d-m-Y')."_laporan_rekam_medis.xls");
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap-copy.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cetak_kartu.css">
		<?php foreach($pengaturan as $pg) : ?>
		<?php foreach($sekolah as $shl) : ?>
		<link rel="icon" href="<?= base_url('assets/images/logo/') . $shl['logo']; ?>" type="image/x-icon">
		<title>Cetak Kartu Anggota</title>
	</head>
	<body>
		<?php
    		date_default_timezone_set("Asia/Makassar");
  		?>
        <div class="container">
            <br/> 
            <div class="pull-left">
                Perpustakaan - <?= $shl['nama_sekolah'] ?> [ size paper A4 ]
            </div>
            <div class="pull-right"> 
            <button type="button" class="btn btn-primary btn-md btn-sm" onclick="printDiv('printableArea')">
                <i class="fa fa-print"> </i> Cetak Kartu
            </button>
            </div>
        </div>
        <br/>
        <div id="printableArea">
            <page size="A4">
				 <div class="kartu-peserta-seleksi-wrapper">
        <div class="kartu-peserta-seleksi">
            <div class="head-wrapper">
                <div class="sec"><img class="img-thumbnail" src="<?= base_url('assets/images/logo/') . $shl['logo']; ?>" alt="logo sekolah"></div>
                <div class="sec">
                    <p style="font-size: 14px;">KARTU ANGGOTA PERPUSTAKAAN</p>
                    <p style="font-size: 12px;"><?= $shl['nama_sekolah'] ?></p>
                    <p style="font-size: 8px;"><?= $shl['alamat'] ?>, Kodepos <?= $shl['kode_pos'] ?>, Telp. <?= $pg['no_telpon'] ?></p>
                </div>
            </div>
            <div class="row">
            	<?php foreach($detail as $key) : ?>
                <div class="col-sm-3">
                    <div class="kartu-foto">
                        <img src="<?= base_url('assets/images/profil/') . $key->foto; ?>"/>
                    </div>
                </div>
                <div class="col-sm-8">
                <div class="content-wrapper">
                <table class="detail-anggota">
                    <tbody>
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td><strong><?= $key->nisn; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><strong><?= $key->nama;?></strong></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><strong><?= $key->kelas;?></strong></td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td><strong><?= $key->jurusan;?></strong></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $key->alamat;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            <?php endforeach; ?>
            </div>
            <div class="footer-wrapper">
                <p>Tondano, <?php echo date("d F Y"); ?></p>
                <p>Kepala Sekolah</p>
                <img class="cap-tandatangan" src="<?= base_url('assets/images/scan/cap_stempel/') . $pg['scan_cap']; ?>"/>
                <img class="scan-tandatangan" src="<?= base_url('assets/images/scan/tanda_tangan/') . $pg['scan_ttd']; ?>"/>
                <p class="pegawai"> <?= $shl['nama_kepsek'] ?></p>
                <p class="nip-pegawai">NIP. <?= $shl['nip_kepsek'] ?></p>
            </div>
            <div class="tgl-terdaftar">
                <p>*Berlaku selama menjadi siswa</p>        
            </div>
        </div>
    	</div>
        </page>
        </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
  </body>
  <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
  </script>
</html>
