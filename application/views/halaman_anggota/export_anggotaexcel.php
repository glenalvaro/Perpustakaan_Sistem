<?php

header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<h3>Laporan Anggota Perpustakaan : <?= date('d F Y'); ?></h3>
<table border="1" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>NISN</th>
			<th>Nama Siswa</th>
			<th>Email</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Jenis Kelamin</th>
			<th>No Handphone</th>
			<th>Alamat</th>
		</tr>
	</thead>
	<tbody>
		 <?php $no = 1;
		 foreach($semuaAnggota as $sa) : ?>
		 	<tr>
		 		<td><?= $no++; ?></td>
		 		<td><center><?= $sa['nisn']; ?></center></td>
		 		<td><center><?= $sa['nama']; ?></center></td>
		 		<td><?= $sa['email']; ?></td>
		 		<td><?= $sa['kelas']; ?></td>
		 		<td><?= $sa['jurusan']; ?></td>
		 		<td><?= $sa['jenis_kelamin']; ?></td>
		 		<td><?= $sa['no_hp']; ?></td>
		 		<td><?= $sa['alamat']; ?></td>
		 	</tr>
		 <?php endforeach; ?>
	</tbody>
</table>