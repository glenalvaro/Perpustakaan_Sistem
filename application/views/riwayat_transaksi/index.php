<!-- Sweet Alert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
   <?php if ($this->session->flashdata('flash')) : ?>
   <?php endif; ?>

<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Riwayat Peminjaman</h6>
               </div>
               <div class="card-body">
                <?php if($user['id_akses'] == 1) : ?>
                 <a href="<?= base_url('riwayat_transaksi/tambah_pinjam') ?>" class="btn btn-social btn-flat btn-info mg-b-20 btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                      <i data-feather="database" class="wd-16 mr-2"></i>&nbsp; Tambah Peminjaman
                  </a>
                   <?php endif; ?>
                  <table id="table-transaksi" class="table table-striped" width="100%">
                     <thead>
                         <tr>
                           <th style="color: black;" class="text-center">No</th>
                           <th style="color: black;" class="text-center">Nomor Anggota/NISN</th>
                           <th style="color: black;" class="text-center">Nama Peminjam</th>
                           <th style="color: black;" class="text-center">Judul Buku</th>
                           <th style="color: black;" class="text-center">Tanggal Pinjam</th>
                           <th style="color: black;" class="text-center">Tanggal Jatuh Tempo</th>
                           <th style="color: black;" class="text-center">Status</th>
                           <th style="color: black;" class="text-center">Opsi</th>
                        </tr>
                     </thead>
                     <tbody>
                       
                     </tbody>
                  </table>
               </div>
          </div>
      </div>
   </div>
   <div class="hidden-lg mg-b-100"></div>
</div>


<?php $no = 0;
foreach($transaksi as $tr) : $no++; ?>
<!-- Modal Edit Data-->
<div class="modal fade" id="kembalikanBuku<?= $tr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered tx-rubik" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Pengembalian Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <?php 
            date_default_timezone_set('Asia/Ujung_pandang');
          ?>
      <form action="<?= base_url('riwayat_transaksi/pengembalian_buku/'); ?><?= $tr['id']; ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
           <div class="form-group">
                 <input type="hidden" name="id" value="<?= $tr['id']; ?>">
                <label style="margin-left: 22px;">Judul Buku</label>
                <input type="text" class="form-control" value="<?= $tr['buku_pinjam']; ?>" readonly>
           </div>

            <div class="form-group">
                <label style="margin-left: 22px;">Tgl Peminjaman</label>
                <input type="text" class="form-control" value="<?= $tr['tgl_pinjam']; ?>" readonly>
           </div> 

           <div class="form-group">
                <label style="margin-left: 22px;">Tgl Pengembalian</label>
                <input type="text" name="tgl_pengembalian" class="form-control" value="<?php echo date('d F, Y'); ?>" readonly>
           </div> 

           <?php foreach($pengaturan as $pt) : ?>
           <?php 

            $timesekarang = date('Y-m-d');
               if($timesekarang > $tr['tgl_kembali']){
                  $denda = $pt['denda'];
               } else{
                  $denda = '0';
               }

            ?>
            <?php endforeach; ?>

             <div class="form-group">
                <label style="margin-left: 22px;">Denda</label>
                <input type="text" name="denda" class="form-control" value="<?= $denda; ?>" readonly>
           </div>                       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary btn-sm">Kembalikan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>