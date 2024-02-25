<style>
.link a{
   color: #007bff;
   text-decoration: none;
   background-color: transparent;
}
.link a:hover{
   color: #007bff;
   text-decoration: underline;
   background-color: transparent;
}
.thumbnail-desktop{
   background: #fff;
   border: 1px solid #eaedf3;
   box-shadow: 0 1px 3px rgb(0 0 0 / 4%);
   border-radius: 4px;
   margin: 15px 0;
   cursor: pointer;
   width: 245px;
}
.thumbnail-image-desktop {
    height: 135px;
    border-radius: 4px 4px 0 0;
    overflow: hidden;
}
.thumbnail-image-desktop img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}
.thumbnail-content-desktop {
    padding: 15px;
    min-height: 195px;
}
.thumbnail-content-desktop a:hover {
   text-decoration: underline;
   color: #142b72;
}
.thumbnail-title-desktop {
    font-size: 16px;
    font-weight: 500;
    line-height: 24px;
    color: #142b72;
    height: 72px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
.thumbnail-keterangan-desktop {
    color: #ff7d2a;
    font-size: 14px;
    margin-bottom: 15px;
}

.thumbnail-phone{
    display: flex;
    flex-direction: row;
    background: #fff;
    border: 1px solid #a8c6df;
    box-sizing: border-box;
    border-radius: 4px;
    box-shadow: 0 1px 3px rgb(0 0 0 / 4%);
    border-radius: 10px;
    margin: 0;
    padding: 20px;
    cursor: pointer;
    position: relative;
    transition: all .3s ease-in-out 0s;
}
.thumbnail-content-phone{
   padding: 0 20px;
    width: 100%;
    min-height: auto;
}
.thumbnail-image-phone{
    width: 100px;
    height: 100px;
    border-radius: 4px;
    overflow: hidden;    
}

.thumbnail-image-phone img{
   object-fit: cover;
   width: 100%;
   height: 100%;
}
.thumbnail-title-phone{
   height: auto;
   margin-bottom: 0;
   font-size: 16px;
   color: #142b72;
}
.thumbnail-content-phone a:hover{
   text-decoration: underline;
   color: #142b72;
}

.slider {
   width: 100%;
   background-color: #fafafa!important;
}

.slider .slick-prev {
    background-image: url(./assets/images/icon/btn-prev-slide.svg);
    left: -20px;
}

.slider .slick-next {
    background-image: url(./assets/images/icon/btn-next-slide.svg);
    right: -20px;
}

.slick-next, .slick-prev {
    font-size: 0;
    line-height: 0;
    position: absolute;
    top: 50%;
    display: block;
    width: 20px;
    height: 20px;
    padding: 0;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    cursor: pointer;
    border: none;
}

.slider .slick-next, .slick-prev {
    width: 30px;
    height: 30px;
    background-size: contain;
    z-index: 2;
}

.slick-list, .slick-slider {
    position: relative;
    display: block;
}
.slider .slick-slide {
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
.slick-initialized .slick-slide {
    display: block;
}

.ui-menu-item .ui-menu-item-wrapper{
   font-family: Rubik;
   font-weight: 500;
}

.header-text h4 {
    font-size: 14px;
    line-height: 22px;
    color: #4f8fda;
    font-weight: 500;
    margin-bottom: 8;
}

.badge-custom {
    border-radius: 100px;
    padding: 1px 10px;
    font-weight: 500;
    font-size: 12px;
    display: inline-block;
    text-align: center;
}

.badge-custom.success {
    background: rgba(66,190,101,.3);
    color: #42be65;
}

.btn-primary {
    background-color: #4f8fda;
    border-color: #4f8fda;
    color: #fff;
}

.section-kategori{
    cursor: pointer;
    background: hsla(0,0%,100%,.85);
    border: 1px solid #98b3ca;
    box-sizing: border-box;
    border-radius: 30px;
    color: #98b3ca;
    font-weight: 400;
}

.section-kategori h2{
    color: #98b3ca;
}

.section-kategori .media{
    -webkit-appearance: none;
    appearance: none;
    border-radius: 30px;
    min-width: 150px;
    height: 42px;
    font-family: rubik,sans-serif;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: .2px;
    transition: all .3s ease;
    padding-left: 15px;
    padding-right: 15px;
}

.section-kategori .media-phone{
    -webkit-appearance: none;
    appearance: none;
    border-radius: 30px;
    min-width: 150px;
    height: 42px;
    font-family: rubik,sans-serif;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: .2px;
    transition: all .3s ease;
    padding-left: 15px;
    padding-right: 15px;
}

.section-kategori a:hover .media{
    background-color: #e9ecef;
}

.section-kategori a h2:hover{
    color: black;
}

.bg-book{
   background: url(<?= base_url('assets/images/bg-login/book-bg.png') ?>) no-repeat 50%; 
   background-size: cover;
}

@media (min-width: 768px) {
.cover-responsive.alt {
    height: 400px;
}
}

</style>

<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>
<?php if ($this->session->flashdata('flash-error')) : ?>
<?php endif; ?>

<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
         <div class="card mg-b-20 bg-book cover-responsive">
            <div class="card-body" style="color: #fff;">
              <div class="row">
                 <div class="col-md-7">
                     <h5 style="color: #ffffff; margin-bottom: 20px;">Peminjaman Buku</h5>
                     <p style="margin-bottom: 20px; font-weight: 400;" class="lead mb-0 tx-15">Silahkan memilih buku yang akan di pinjam di bawah, Pastikan peminjam mengecek apakah buku yang di pinjam sudah sesuai. apabila masa peminjaman telah melewati batas peminjaman, maka akan dikenakan denda peminjaman.</p>
                     <hr style="background-color: #fff;" class="hidden-lg">
                     <br>
                      <div class="d-flex justify-content-between mb-3">
                        <p class="tx-12">Maksimal Peminjaman Buku</p>
                            <?php foreach($pengaturan as $png) : ?>
                              <p class="tx-14">
                                  <span class="badge badge-danger"><?= $png['maksimal_peminjaman']; ?>  Buku</span>
                              </p>
                            <?php endforeach; ?>
                     </div>
                 </div>
                 <div class="col-md-5">
                  <div class="row justify-content-center hidden-xs">
                       <img src="<?= base_url() ?>assets/images/icon/peminjaman.png" class="img-fluid" width="190">
                  </div>
                 </div>
              </div>
             </div>
         </div>
      </div>
   </div>
   
   <div class="col">
      <div class="card-body tx-rubik">
         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
           <li class="nav-item tx-14">
             <a class="nav-link active" id="pills-peminjaman-tab" data-toggle="pill" href="#pills-peminjaman" role="tab" aria-controls="pills-peminjaman" aria-selected="true">Peminjaman Baru</a>
           </li>
           <li class="nav-item tx-14">
             <a class="nav-link" id="pills-riwayat-tab" data-toggle="pill" href="#pills-riwayat" role="tab" aria-controls="pills-riwayat" aria-selected="false">Riwayat Transaksi</a>
           </li>
         </ul>
      <hr style="background-color: #dee2e6;">
      <div class="tab-content" id="pills-tabContent">
           <div class="tab-pane fade show active" id="pills-peminjaman" role="tabpanel" aria-labelledby="pills-peminjaman-tab">
            <!-- Cari Buku -->
            <form id="form_search" class="ui-autocomplete-input form-horizontal needs-validation" action="<?php echo site_url('transaksi/search');?>" method="GET" novalidate>
               <div class="input-group pd-y-20 mx-auto p-2">
                     <input id="search-buku" name="title" type="text" class="form-control form-control-lg" required>
                     <div class="row button-demo">
                        <div class="col">
                           <button type="submit" style="height: 41px;" id="search-book" class="btn btn-primary btn-sm" data-style="zoom-in"><i class="fa fa-search mg-r-5"></i></button>
                        </div>
                     </div>
                      <div class="invalid-feedback tx-14">
                          Masukkan nama pencarian !
                      </div>
               </div>
            </form>

                <div class="d-flex justify-content-between">
                   <div class="p-2">
                       <h5 style="color: #142b72;" class="tx-15">Buku Terbaru</h5>
                   </div>
                   <div class="p-2 link hidden-sm hidden-xs hidden-md">
                     <a href="<?= base_url('transaksi/lihat_semua') ?>">Lihat Semua ></a>
                   </div>
                 </div>

                 <!-- Tampilkan list ini pada halaman layar desktop -->
               <div class="items slider hidden-md hidden-sm hidden-xs">
                  <?php foreach($databuku as $db) : ?>
                  <div>
                     <div class="w-100 slick-slide p-2" tabindex="-1" style="width: 245px; outline: none;">
                       <div class="thumbnail-desktop">
                          <div class="thumbnail-image-desktop">
                           <img src="<?= base_url('assets/images/cover/') . $db['cover_buku']; ?>" alt="<?= $db['judul_buku']; ?>">
                          </div>
                          <div class="thumbnail-content-desktop">
                             <a href="<?=site_url('transaksi/detail_peminjaman/'.$db['id'])?>"><div class="thumbnail-title-desktop"><?= $db['judul_buku']; ?></div></a>
                             <p class="tx-11 tx-semibold tx-gray-500"><?= $db['kode_isbn']; ?></p>
                              <div class="product-rating d-inline-block">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <small class="tx-gray-500 tx-12">5.0</small>
                                 </div>
                                 <div>
                                    <?php if($db['keterangan'] == 'Tersedia') {
                                      echo "<p class='tx-14 tx-semibold'>Tersedia<span class='ml-2 tx-12 tx-gray-500'><del>Tidak Tersedia</del></span></p>";
                                    } else {
                                        echo "<p class='tx-14 tx-semibold'>Tidak Tersedia<span class='ml-2 tx-12 tx-gray-500'><del>Tersedia</del></span></p>";
                                    }
                                   ?>
                                 </div>
                          </div>
                       </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
               </div>


                   <!-- Tampilkan list ini pada halaman layar phone -->
                  <div class="row clearfix hidden-lg">
                     <?php foreach($databuku as $book) : ?>
                         <div class="w-100 p-2">
                           <div class="thumbnail-phone">
                           <div class="thumbnail-image-phone">
                              <img src="<?= base_url('assets/images/cover/') . $book['cover_buku']; ?>" alt="<?= $book['judul_buku']; ?>">
                           </div>
                           <div class="thumbnail-content-phone">
                              <a href="<?=site_url('transaksi/detail_peminjaman/'.$book['id'])?>"><div class="thumbnail-title-phone"><?= $book['judul_buku']; ?></div></a>
                              <div class="thumbnail-ket"><p class="tx-12" style="margin-top: 10px;">ISBN : <?= $book['kode_isbn']; ?></p></div>
                               <div class="thumbnail-ket"><p class="tx-12">Keterangan : <?= $book['keterangan']; ?></p></div>
                           </div>
                        </div>
                     </div>
                     <?php endforeach; ?>
                  </div>
                  <br>

                  <center>
                     <a href="<?= base_url('transaksi/lihat_semua') ?>" class="tx-gray-500 hidden-lg" style="font-weight: 500; font-size: 16px; margin: 0;color: #4f8fda; margin-bottom: 20px;">Lihat Selengkapnya</a>
                  </center>
                  <br>
               <h5 style="color: #142b72;" class="tx-15 ml-2">Kategori Buku</h5>
               <br>

               <!-- Kategori tampil di desktop -->
                <div class="row justify-content-between hidden-xs hidden-md hidden-sm">
                <div class="col-lg-12 col-xl-12">
                    <div class="row row-xs">
                    <?php foreach($kategori_buku as $kat) : ?>
                        <div class="section-kategori mg-b-10 ml-3">
                            <a href="<?=site_url('transaksi/detail_kategori/'.$kat['kode_kategori'])?>">
                                 <div class="media d-inline-flex">                   
                                       <h2 style="font-size: 10px; margin-top: auto; margin-bottom: auto; margin-left: auto; margin-right: auto;" class="tx-uppercase"><span class="counter"><?= $kat['nama_kategori']; ?></span></h2>
                                 </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- kategori tampil diphone -->
            <div class="row justify-content-between hidden-lg mg-x-1-force">
                <div class="col-lg-12 col-xl-12">
                    <div class="row row-xs">
                    <?php foreach($kategori_buku as $kat) : ?>
                        <div class="col-sm-4 section-kategori mg-b-10">
                            <a href="<?=site_url('transaksi/detail_kategori/'.$kat['kode_kategori'])?>">
                                 <div class="media-phone d-inline-flex">                   
                                       <h2 style="font-size: 10px; margin-top: auto; margin-bottom: auto; " class="tx-uppercase"><span class="counter"><?= $kat['nama_kategori']; ?></span></h2>
                                 </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Histori View -->
             <h5 style="color: #142b72;" class="tx-15 ml-2 mg-t-20">Buku Terlama</h5>
            <br>
             <!-- Tampilkan list ini pada halaman layar desktop -->
               <div class="items slider">
                  <?php foreach($databukulama as $book) : ?>
                  <div>
                     <div class="w-100 slick-slide p-2" tabindex="-1" style="width: 245px; outline: none;">
                       <div class="thumbnail-desktop">
                          <div class="thumbnail-image-desktop">
                           <img src="<?= base_url('assets/images/cover/') . $book['cover_buku']; ?>" alt="<?= $book['judul_buku']; ?>">
                          </div>
                          <div class="thumbnail-content-desktop">
                             <a href="<?=site_url('transaksi/detail_peminjaman/'.$book['id'])?>"><div class="thumbnail-title-desktop"><?= $book['judul_buku']; ?></div></a>
                             <p class="tx-11 tx-semibold tx-gray-500"><?= $book['kode_isbn']; ?></p>
                              <div class="product-rating d-inline-block">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <small class="tx-gray-500 tx-12">5.0</small>
                                 </div>
                                 <div>
                                    <?php if($book['keterangan'] == 'Tersedia') {
                                      echo "<p class='tx-14 tx-semibold'>Tersedia<span class='ml-2 tx-12 tx-gray-500'><del>Tidak Tersedia</del></span></p>";
                                    } else {
                                        echo "<p class='tx-14 tx-semibold'>Tidak Tersedia<span class='ml-2 tx-12 tx-gray-500'><del>Tersedia</del></span></p>";
                                    }
                                   ?>
                                 </div>
                          </div>
                       </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
               </div>
            </div>
           <div class="tab-pane fade" id="pills-riwayat" role="tabpanel" aria-labelledby="pills-riwayat-tab">

            <?php foreach($transaksiSelesai as $row) : ?>
            <?php if($row['tgl_pengembalian'] != 'Null') : ?>
            <div class="box-custom mg-t-15">
               <div class="card-body">
                  <div class="media-body ml-2 header-text">
                       <div class="d-flex justify-content-between">
                           <div class="header-text">
                                  <div class="d-flex mb-3">
                                       <img src="<?= base_url() ?>assets/images/icon/pengembalian.png" class="align-middle mr-2 hidden-xs" width="25" height="25">
                                       <h4 class="hidden-xs hidden-md hidden-sm">Pengembalian Buku Perpustakaan</h4>
                                       <h4 class="hidden-lg">Pengembalian Buku</h4>
                                  </div>
                           </div>
                           <div class="conten mb-3">
                              <div class="badge-custom success">Berhasil</div>
                           </div>
                      </div>
                       <div class="d-flex">
                          <div class="tx-gray-500 tx-13">
                             Tanggal Pengembalian :&nbsp;
                          </div>
                          <div class="tx-13 tx-semibold">
                              <?= $row['tgl_pengembalian']; ?>
                           </div>
                          <div class="ml-auto hidden-md hidden-sm hidden-xs">
                            <p class="tx-gray-500 tx-13">Denda &nbsp;<span style="color: #142b72; font-size: 14px; font-weight: bold;">Rp <?= $row['denda']; ?></span></p>
                          </div>
                       </div>
                       <hr style="background-color: #fff;">
                      <div class="d-flex hidden-md hidden-sm hidden-xs">
                        <p class="tx-gray-500 tx-13">Judul Buku &nbsp;</p>
                        <p style="color: #142b72;" class="tx-13"><?= $row['buku_pinjam']; ?></p>
                        <p class="tx-gray-500 tx-13 ml-3">ISBN &nbsp;</p>
                        <p style="color: #142b72;" class="tx-13"><?= $row['isbn']; ?></p>
                     </div>
                      <div class="d-flex justify-content-between hidden-lg">  
                           <p class="tx-gray-500 tx-13">Denda &nbsp;
                              <span style="color: #142b72; font-size: 14px; font-weight: bold;">Rp <?= $row['denda']; ?></span>
                           </p>
                          <button type="button" class="btn btn-primary rounded-pill btn-sm" data-toggle="modal" data-target="#detailRiwayat<?= $row['id']; ?>">Lihat Detail</button>
                       </div>
                  </div>
               </div>
            </div>
      <?php endif; ?>
      <?php endforeach; ?>

     <?php if($total_transaksi == 0) : ?>
        <!-- Jika total transaksi kosong tampilkan notif -->
         <div class="box-custom mg-t-15">
                <div class="row clearfix d-flex justify-content-between">
                     <div class="card-body">
                           <center><img class="mg-b-25" src="<?= base_url() ?>assets/images/icon/warning.svg">
                           <p style="font-size: 13px; line-height: 20px; color: #142b72; margin-bottom: 6px; font-weight: 500;">Riwayat Peminjaman Tidak Ditemukan</p>
                           <p class="tx-12">Untuk keterangan lebih lanjut, silakan hubungi petugas perpustakaan.</p>
                        </center>
                     </div>
               </div>
            </div>  
        <?php endif; ?>    
           </div>
      </div>
      </div>
   </div>
   <div class="hidden-lg mg-b-80"></div>
</div>




<!-- Modal Detail Riwayat Transaksi-->
<?php $no = 0;
foreach($transaksiSelesai as $key) : $no++; ?>
<div class="modal fade" id="detailRiwayat<?= $key['id']; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content tx-rubik">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Detail Transaksi</h5>
       <div class="badge-custom success"><?= $row['status']; ?></div>
      </div>
      <div class="modal-body">
            <label class="tx-gray-500 tx-12">Judul Buku</label>
            <p class="tx-14" style="color: #142b72;"><?= $key['buku_pinjam']; ?></p>

            <label class="tx-gray-500 tx-12">ISBN</label>
            <p class="tx-14" style="color: #142b72;"><?= $key['isbn']; ?></p>

            <label class="tx-gray-500 tx-12">Tanggal Peminjaman</label>
            <p class="tx-14" style="color: #142b72;"><?= $key['tgl_pinjam']; ?></p>

            <label class="tx-gray-500 tx-12">Tanggal Pengembalian</label>
            <p class="tx-14" style="color: #142b72;"><?= $key['tgl_pengembalian']; ?></p>

            <label class="tx-gray-500 tx-12">Denda</label>
            <p class="tx-14 tx-semibold" style="color: #142b72;">Rp <?= $key['denda']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>