<style>
   .thumbnail-phone{
    display: flex;
    flex-direction: row;
    background: #fff;
    border: 1px solid #eaedf3;
    box-sizing: border-box;
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
.nav-with-icon a {
    display: block;
    padding: 10px 10px 10px;
    background-color: transparent;
    border: none;
    color: #007bff;
}
.nav-with-icon a:hover{
   text-decoration: underline;
   color: #007bff;
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
<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
         <div class="card mg-b-20 hidden-xs bg-book cover-responsive">
            <div class="card-body" style="color: #fff;">
              <div class="row">
                 <div class="col-md-7">
                     <h5 style="color: #fff; margin-bottom: 20px;">Peminjaman Buku</h5>
                     <p style="margin-bottom: 20px; font-weight: 400;" class="lead mb-0 tx-15">Silahkan memilih buku yang akan di pinjam di bawah, Pastikan peminjam mengecek apakah buku yang di pinjam sudah sesuai. apabila masa peminjaman telah melewati batas peminjaman, maka akan dikenakan denda peminjaman.</p>
                     <hr style="background-color: #fff;" class="hidden-lg">
                     <br>
                      <div class="d-flex justify-content-between mb-3">
                             <p class="tx-12 tx-semibold">Maksimal Peminjaman Buku</p>
                         <?php foreach($pengaturan as $png) : ?>
                              <p class="tx-12">
                                  <?= $png['maksimal_peminjaman']; ?>  Buku
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
       <nav class="nav nav-with-icon tx-14 tx-rubik">
         <a href="<?= base_url('transaksi'); ?>" class="nav-link pd-0"><span data-feather="corner-down-left" class="wd-16"></span>&nbsp; Kembali</a>
      </nav>
       <div class="card-body tx-rubik">
            <h5 style="color: #4f8fda;" class="tx-15 mb-4">List Buku Terbaru</h5>
         <div class="row clearfix">
               <?php foreach($listbuku->result() as $main) : ?>
                     <div class="w-100 p-2">
                        <div class="thumbnail-phone">
                        <div class="thumbnail-image-phone">
                           <img src="<?= base_url('assets/images/cover/') . $main->cover_buku; ?>" alt="<?= $main->judul_buku; ?>">
                        </div>
                        <div class="thumbnail-content-phone">
                           <a href="<?=site_url('transaksi/detail_peminjaman/'.$main->id)?>"><div class="thumbnail-title-phone"><?= $main->judul_buku; ?></div></a>
                           <div class="thumbnail-ket"><p class="tx-12" style="margin-top: 10px;">ISBN : <?= $main->kode_isbn; ?></p></div>
                           <div class="thumbnail-ket"><p class="tx-12">Keterangan : <?= $main->keterangan; ?></p></div>
                        </div>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
       </div>

       <!-- Halaman -->
         <div class="row">
            <div class="col">
               <!--Tampilkan pagination-->
               <?php echo $halaman; ?>
            </div>
         </div>
    </div>

   <div class="hidden-lg mg-b-100"></div>
</div>