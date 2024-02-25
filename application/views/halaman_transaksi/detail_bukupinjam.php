 <style>
.thumbnail-detail{
	display: block;
	width: 200px;
	height: 300px;
}
.thumbnail-detail img {
  object-fit: contain;
  height: 100%;
  width: 100%;
}
.line {
   border-top: 2px solid #e5eef5;
   margin-top: -25px;
}
.box-pinjam {
    background: #fff;
    border: 1px solid #a8c6df;
    box-sizing: border-box;
    border-radius: 4px;
    padding: 20px;
    display: block;
    width: 100%;
    position: -webkit-sticky;
    position: sticky;
    top: 100px;
}
@media screen and (max-width: 601px){
.box-pinjam {
    position: fixed;
    left: 0;
    bottom: 0;
    top: inherit;
    box-shadow: -4px -1px 20px rgb(0 0 0 / 10%);
    border-radius: 4px 4px 0 0;
    z-index: 999999;
    border: none;
}
}
.btn-pinjam{
	background-color: #005da6 !important;
   border-color: #005da6 !important;
   color: #fff;
   height: auto;
}
.btn-pinjam:active, .btn-pinjam:focus, .btn-pinjam:hover {
    background-color: #72a5e1;
    border-color: #72a5e1;
}
.tombol-pinjam {
    -webkit-appearance: none;
    appearance: none;
    border-radius: 30px;
    min-width: 168px;
    height: 42px;
    font-family: rubik,sans-serif;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: .2px;
    transition: all .3s ease;
    padding-left: 20px;
    padding-right: 20px;
}
.badge-custom {
   -webkit-appearance: none;
    appearance: none;
    border-radius: 30px;
    min-width: 168px;
    height: 42px;
    font-family: rubik,sans-serif;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: .2px;
    transition: all .3s ease;
    padding-left: 20px;
    padding-right: 20px;
}

.badge-custom.success {
    background: rgba(66,190,101,.3);
    color: #42be65;
}
 </style>

 <div class="page-inner tx-rubik">
               <div id="main-wrapper">
                  <div class="pageheader pd-t-25 pd-b-10">
                     <div class="d-flex justify-content-between">
                        <div class="clearfix">
                           <div class="pd-t-5 pd-b-5">
                              <h1 class="pd-0 mg-l-15 tx-20">Buku</h1>
                           </div>
                           <div class="breadcrumb pd-0 mg-0">
                              <a class="breadcrumb-item" href="<?= base_url('transaksi'); ?>"><i class="icon ion-ios-home-outline"></i> Data Transaksi</a>
                              <a class="breadcrumb-item" href="<?= base_url('transaksi'); ?>">Peminjaman</a>
                              <span class="breadcrumb-item active">Detail</span>
                           </div>
                        </div>
                     </div>
                  </div>
             <?php foreach($detail_book as $main) : ?>	
             <?php 
				     $id = $main->id;
				     $queryKat = "SELECT `tb_buku`.`id`,`nama_kategori`, `judul_buku` FROM `tb_kategori_buku` INNER JOIN `tb_buku` WHERE `tb_kategori_buku`.`kode_kategori`=`tb_buku`.`kategori` and `tb_buku`.`id` = $id";
				     $kategori_det = $this->db->query($queryKat)->row_array();

				  ?>	
				 <div class="flex-grow-1 mg-b-30">
					<div class="row mt-4 clearfix mg-x-5-force">
						  <div class="col-md-4 col-xs-12 mg-b-5 hidden-lg">
							  <div class="media align-items-center mg-t-0 mg-b-30">
								 <div class="media-body lh-2 thumbnail-detail">
									 <img src="<?= base_url('assets/images/cover/') . $main->cover_buku; ?>" class="img-fluid" alt="detail-buku">
								 </div>
							  </div>
					 		</div>
					   <div class="col-md-8 col-xs-12 mg-b-30"> 
							<h2 style="color: #142b72;"><?= $main->judul_buku; ?></h2>
							  <div class="product-rating d-inline-block mg-b-15">
                           <i class="fa fa-fw fa-star"></i>
                           <i class="fa fa-fw fa-star"></i>
                           <i class="fa fa-fw fa-star"></i>
                           <i class="fa fa-fw fa-star"></i>
                           <i class="fa fa-fw fa-star"></i>
                           <small class="tx-gray-500 tx-12">5.0</small>
                       </div>	
                       <ul class="box-custom list-group tx-gray-500">
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    Nomor ISBN
								    <span><?= $main->kode_isbn; ?></span>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								   Kategori Buku
								     <span><?php echo $kategori_det['nama_kategori'] ?></span> 
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    Pengarang buku
								    <span><?= $main->pengarang; ?></span>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    Penerbit buku
								    <span><?= $main->penerbit; ?></span>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    Tahun Terbit
								    <span><?= $main->tahun_terbit; ?></span>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    Jumlah Halaman
								    <span><?= $main->jumlah_halaman; ?></span>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
								    Keterangan Buku
								    <?php if($main->keterangan == 'Tersedia') {
								    	echo "<span class='badge badge-primary badge-pill'>Tersedia</span>";
								    } else {
								 		echo "<span class='badge badge-danger badge-pill'>Tidak Tersedia</span>";
								    } ?>
								  </li>
								</ul> 
					   </div>
					   <div class="col-md-4 col-xs-12 mg-b-30 hidden-sm hidden-xs hidden-md">
						  <div class="media align-items-center mg-t-0 mg-b-30">
							 <div class="media-body lh-2 thumbnail-detail">
								 <img src="<?= base_url('assets/images/cover/') . $main->cover_buku; ?>" class="img-fluid" alt="detail-buku">
							 </div>
						  </div>
					 </div>
					</div>
				</div>	
			<?php endforeach; ?>	
			<div class="line"></div>
				<div class="row mg-x-5-force">
					<div class="col-md-8 col-xs-12">
						<h4 class="mt-4 mb-4 tx-15" style="color: #4f8fda;">Catatan Peminjaman</h4>
						<div class="html-desc tx-14 justify-content-between">
							<p>Apabila pengguna yang meminjam bahan pustaka melakukan pelanggaran, perpustakaan dapat memberikan sanksi kepada peminjam antara lain :</p>
							<ul>
								<li>Terlambat pengembalikan bahan pustaka yang dipinjam.</li>
								<li>Merusak bahan pustaka yang dipinjam.</li>
								<li>Membawa pulang bahan pustaka tampa mengikuti tata cara yang ditetapkan.</li>
								<li>Menghilangkan bahan pustaka.</li>
								<li>Melanggar tata tertib perpustakaan</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						<div class="box-pinjam mt-4">
								<?php foreach($detail_book as $key) : ?>		
									<h5 class="hidden-md hidden-sm hidden-xs" style="color: #142b72;"><?= $key->judul_buku; ?></h5>
								<div class="product-rating d-inline-block mg-b-5 hidden-md hidden-sm hidden-xs">
                           <i class="fa fa-fw fa-star"></i>
                           <i class="fa fa-fw fa-star"></i>
                           <i class="fa fa-fw fa-star"></i>
                           <i class="fa fa-fw fa-star"></i>
                           <i class="fa fa-fw fa-star"></i>
                           <small class="tx-gray-500 tx-12">5.0</small>
                       </div>
                       <div class="product-rating mg-b-15 hidden-md hidden-sm hidden-xs">
                          <b><p class="tx-15"><?php echo $kategori_det['nama_kategori'] ?></p></b>
                       </div>

                 <?php foreach($detail_book as $val) : ?> 

                  <?php if($val->keterangan == 'Tersedia') : ?>
                      <a href="<?= base_url('transaksi/proses_pinjam/').$key->id; ?>"><button type="button" class="btn btn-pinjam tombol-pinjam rounded-pill btn-block">Pinjam Buku Ini</button></a>
                  <?php elseif($val->keterangan == 'Tidak Tersedia'): ?>
                      <button type="button" class="btn btn-pinjam tombol-pinjam rounded-pill btn-block disabled">Buku Tidak Tersedia</button>
                  <?php endif; ?>

                <?php endforeach; ?>
							 <?php endforeach; ?>
						</div>
					</div>
				</div>
      </div>
      <div class="mg-b-100 hidden-lg"></div>
</div>