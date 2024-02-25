<style>
.bd-dipinjam{
    border-color: #5d78ff;
}
.bd-kembalikan {
   border-color: #ee8ce5;
}
</style>
<?php foreach($sekolah as $sk) : ?>
<div class="page-inner mt-3">
<div class="row clearfix">
   <div class="col-lg-6">
     <div class="card-body">
      <?php foreach($pengaturan_list as $pl) : ?>
        <div class="row">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
             </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
               <img style="opacity: 0.9;" class="d-block w-100" src="<?= base_url('assets/images/slider/') . $pl['slider_1']; ?>" alt="Sistem Perpustakaan">
                  <div class="carousel-caption">
                     <h5 style="color: #fff;" class="tx-uppercase tx-bold"><?= $pl['nama_sistem'] ?></h5>
                     <p class="tx-uppercase"><?= $sk['nama_sekolah'] ?></p>
                  </div>
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url('assets/images/slider/') . $pl['slider_2']; ?>" alt="Sistem Perpustakaan">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url('assets/images/slider/') . $pl['slider_3']; ?>" alt="Sistem Perpustakaan">
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
             </a>
         </div>
         </div>
      <?php endforeach; ?>
   </div>
</div>

<div class="col-lg-6 tx-roboto">
   <div class="box-custom mt-3 mg-b-20">
      <div class="card-header">
         <div class="d-flex justify-content-between align-items-center">
            <div>
                 <h5 class="card-header-title tx-14 mb-0">Pengumuman</h5>
             </div>
            <div class="text-right tx-12">
                  <a href="<?= base_url('pengunguman'); ?>">Lihat Semua</a>
            </div>
         </div>
      </div>
      <div class="card-body">
        <?php foreach($pengunguman_view as $pv) : ?>
            <h5 class="tx-rubik card-title"><a href="<?= base_url('pengunguman/detail/').$pv['id']; ?>" class="tx-13 lh-2 d-block"><?= $pv['judul_pengunguman']; ?></a></h5>
            <p class="card-text tx-gray-500"><?= word_limiter($pv['isi_pengunguman'], 25); ?></p>
            <p class="tx-11 text-right"><?= $pv['tgl_pengunguman']; ?></p>
       <?php endforeach; ?>
      </div>
   </div>
</div>
</div>

<!-- Jika user yang login adalah admin maka tampilkan data -->
<?php if($user['id_akses'] == 1 ) : ?>
<div class="row clearfix tx-rubik">
   <div class="col-md-6 col-lg-6 col-xl-3">
     <a href="<?= base_url('buku'); ?>">
     <div class="box-custom mg-b-20">
         <div class="card-body">
            <div class="media">
               <div class="wd-40 ht-40 rounded d-flex flex-shrink-0 align-items-center justify-content-center">
                  <i data-feather="book"></i>
            </div>
            <div class="media-body mg-l-10">
               <p class="tx-10 tx-uppercase tx-spacing-1 mg-b-0 tx-medium">Total Data Buku</p>
               <h5 class="tx-normal lh-1 mg-b-5 tx-gray-500"><?= $jumlah_buku; ?></h5>
            </div>
         </div>
         </div>
      </div>
    </a>
   </div>
   <div class="col-md-6 col-lg-6 col-xl-3">
      <a href="<?= base_url('anggota'); ?>">
         <div class="box-custom mg-b-20">
         <div class="card-body">
             <div class="media">
               <div class="wd-40 ht-40 rounded d-flex flex-shrink-0 align-items-center justify-content-center">
                  <i data-feather="users"></i>
            </div>
            <div class="media-body mg-l-10">
               <p class="tx-10 tx-uppercase tx-spacing-1 mg-b-0 tx-medium">Total Anggota</p>
               <h5 class="tx-normal lh-1 mg-b-5 tx-gray-500"><?= $jumlah_anggota; ?></h5>
            </div>
         </div>
         </div>
      </div>
   </a>
   </div>
   <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="box-custom mg-b-20">
           <div class="card-body">
               <div class="media">
                  <div class="wd-40 ht-40 rounded d-flex flex-shrink-0 align-items-center justify-content-center">
                     <i data-feather="tag"></i>
                  </div>
               <div class="media-body mg-l-10">
                  <p class="tx-10 tx-uppercase tx-spacing-1 mg-b-0 tx-medium">Kategori Buku</p>
                  <h5 class="tx-normal lh-1 mg-b-5 tx-gray-500"><?= $jumlah_kategori; ?></h5>
               </div>
            </div>
         </div>
       </div>
    </div>
   <div class="col-md-6 col-lg-6 col-xl-3">
     <a href="<?= base_url('riwayat_transaksi'); ?>">
      <div class="box-custom mg-b-20">
          <div class="card-body">
               <div class="media">
                  <div class="wd-40 ht-40 rounded d-flex flex-shrink-0 align-items-center justify-content-center">
                     <i data-feather="shopping-cart"></i>
               </div>
               <div class="media-body mg-l-10">
                  <p class="tx-10 tx-uppercase tx-spacing-1 mg-b-0 tx-medium">Riwayat Peminjaman</p>
                  <h5 class="tx-normal lh-1 mg-b-5 tx-gray-500"><?= $jumlah_peminjaman; ?></h5>
               </div>
            </div>
         </div>
      </div>
    </a>
   </div>        
</div>

<div class="row tx-rubik">
   <div class="col-md-6">
         <div class="card mg-b-30">
             <div class="card-body">
                  <div class="pd-b-20">
                     <h3 class="tx-11 tx-uppercase tx-spacing mg-b-0">Anggota Perpustakaan</h3>
                        <p class="tx-13 tx-gray-500 mb-0">Grafik total anggota perpustakaan berdasarkan kelas</p>
                  </div>
                  <div class="d-flex align-items-center">
                     <div class="wd-50p ht-100" id="kelasChart"></div>
                  <div>
                  <?php
                  //hitung data dari table peminjaman
                      //Query SQL
                      $queri ="select kelas,COUNT(*) as 'total_kelas' from tb_user GROUP by kelas";
                      $tampil = $this->db->query($queri);
                  ?> 
                  <?php foreach($tampil->result_array() as $k) : ?>
                     <?php if($k['kelas'] == 'X') : ?>
                         <div class="d-flex align-items-center">
                           <div class="wd-12 ht-12 bd bd-3 rounded-circle bd-primary mr-2"></div>
                           <div class="tx-gray-500">Kelas X</div>
                        </div>
                     <?php elseif($k['kelas'] == 'XI') : ?>
                         <div class="d-flex align-items-center">
                           <div class="wd-12 ht-12 bd bd-3 rounded-circle bd-gray-500 mr-2"></div>
                           <div class="tx-gray-500">Kelas XI</div>
                        </div>
                     <?php elseif($k['kelas'] == 'XII') : ?>
                         <div class="d-flex align-items-center">
                           <div class="wd-12 ht-12 bd bd-3 rounded-circle bd-success mr-2"></div>
                           <div class="tx-gray-500">Kelas XII</div>
                        </div>
                     <?php endif; ?>
                  <?php endforeach; ?>
                  </div>
               </div>
            </div>
      </div>
   </div>

   <div class="col-md-6">
         <div class="card mg-b-30">
               <div class="card-body">
                  <div class="pd-b-20">
                     <h3 class="tx-11 tx-uppercase tx-spacing mg-b-0">Grafik Transaksi Peminjaman</h3>
                        <p class="tx-13 tx-gray-500 mb-0">Grafik total transaksi peminjaman buku perpustakaan</p>
                  </div>
                  <div class="d-flex align-items-center">
                     <div class="wd-50p ht-100" id="transaksiPeminjaman"></div>
                  <div>
                  <?php
                  //hitung data dari table peminjaman
                      //Query SQL
                      $sql ="select status,COUNT(*) as 'total' from tb_peminjaman GROUP by status order by `id` desc";
                      $result = $this->db->query($sql);
                  ?> 
                  <?php foreach($result->result_array() as $data) : ?>
                     <?php if($data['status'] == 'Sedang Dipinjam') : ?>
                         <div class="d-flex align-items-center">
                           <div class="wd-12 ht-12 bd bd-3 rounded-circle bd-dipinjam mr-2"></div>
                           <div class="tx-gray-500">Sedang Dipinjam <?= $data['total']; ?></div>
                         </div>
                      <?php elseif($data['status'] == 'Sudah Dikembalikan') : ?>
                        <div class="d-flex align-items-center">
                           <div class="wd-12 ht-12 bd bd-3 rounded-circle bd-kembalikan mr-2"></div>
                           <div class="tx-gray-500">Sudah DiKembalikan <?= $data['total']; ?></div>
                        </div>
                     <?php endif; ?>
                  <?php endforeach; ?>
                  </div>
               </div>
            </div>
   </div>
</div>
</div>

<div class="row clearfix tx-rubik">
   <div class="col-xl-8">
         <div class="card mg-b-20">
            <div class="card-body">
                  <div class="clearfix">
                        <canvas id="anggotaChart" height="150"></canvas>
                  </div>
         </div>
      </div>
</div>

<div class="col-xl-4">
   <div class="card mg-b-20">
      <div class="card-header">
         <div class="d-flex justify-content-between align-items-center">
            <div><h6 class="card-header-title tx-13 mb-0">Riwayat Activity</h6></div>
             <div class="text-right tx-12">
                  <a href="<?= base_url('dashboard/log_activity'); ?>">Lihat Semua</a>
            </div>
         </div>
      </div>
      <div class="card-body pd-0">
         <div class="table-responsive">
            <table class="table table-hover tx-12 mb-0">
                <ul class="list-group">
                  <?php foreach($history as $hs) : ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $hs['log_user']; ?>
                     <span class="tx-gray-500"><?= $hs['log_time']; ?></span>
                  </li>
                 <?php endforeach; ?>
                </ul>
            </table>
           </div>
         </div>
      </div>
    </div>
</div>
<?php endif; ?>


<div class="row clearfix tx-rubik">
    <div class="col-xl-8">
         <div class="box-custom mg-b-20">
              <div class="card-header">
                     <div class="d-flex justify-content-between align-items-center">
                              <h6 class="card-header-title tx-13 mb-0">Info sistem</h6>
                               <?php if($user['id_akses'] == 1) : ?>
                              <div class="text-right">
                                 <div class="d-flex">
                                    <a href="<?= base_url('info') ?>" class="mr-2">Lihat Semua</a>
                                 </div>
                              </div>
                               <?php endif; ?>
                           </div>
                        </div>
            <div class="card-body">
               <div class="row">
                  <div  class="col-xl-12">
                     <ul>
                        <?php foreach($list_info as $pl) : ?>
                           <li><a href="<?= base_url('info/detail_info/').$pl['id'] ?>"><?= $pl['judul_info']; ?> ?</a></li>
                        <?php endforeach; ?>
                     </ul>
                  </div>
               </div>
          </div>
      </div>
</div>
</div>



<div class="hidden-lg mg-b-100"></div>
</div>
<?php endforeach; ?>
