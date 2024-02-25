<?php

header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<h3>Laporan Buku Perpustakaan : <?= date('d F Y'); ?></h3>
<table border="1" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>ISBN</th>
			<th>Judul Buku</th>
			<th>Kategori</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tahun Terbit</th>
			<th>Jumlah Halaman</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		 <?php $no = 1;
		 foreach($semuaBuku as $sb) : ?>
		 	<tr>
		 		<td><?= $no++; ?></td>
		 		<td><center><?= $sb['kode_isbn']; ?></center></td>
		 		<td><center><?= $sb['judul_buku']; ?></center></td>
		 		<td><?= $sb['kategori']; ?></td>
		 		<td><?= $sb['pengarang']; ?></td>
		 		<td><?= $sb['penerbit']; ?></td>
		 		<td><?= $sb['tahun_terbit']; ?></td>
		 		<td><?= $sb['jumlah_halaman']; ?></td>
		 		<td><?= $sb['keterangan']; ?></td>
		 	</tr>
		 <?php endforeach; ?>
	</tbody>
</table>