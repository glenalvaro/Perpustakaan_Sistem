<?php

header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<h3>Laporan Peminjaman Perpustakaan : <?= date('d F Y'); ?></h3>
<table border="1" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>NISN</th>
			<th>Nama Peminjam</th>
			<th>Judul Buku</th>
			<th>Kode Buku</th>
			<th>Tgl Peminjaman</th>
			<th>Tgl Pengembalian</th>
			<th>Denda</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		 <?php $no = 1;
		 foreach($semuaTransaksi as $sa) : ?>
		 	<tr>
		 		<td><?= $no++; ?></td>
		 		<td><center><?= $sa['nomor_anggota']; ?></center></td>
		 		<td><center><?= $sa['nama_peminjam']; ?></center></td>
		 		<td><?= $sa['buku_pinjam']; ?></td>
		 		<td><?= $sa['isbn']; ?></td>
		 		<td><?= $sa['tgl_pinjam']; ?></td>
		 		<td><?= $sa['tgl_kembali']; ?></td>
		 		<td><?= $sa['denda']; ?></td>
		 		<td><?= $sa['status']; ?></td>
		 	</tr>
		 <?php endforeach; ?>
	</tbody>
</table>