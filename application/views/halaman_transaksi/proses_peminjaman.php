<div class="page-inner pd-0-force mg-0-force tx-rubik">
      <div class="row no-gutters pd-b-30 pd-t-30 wd-100p clearfix">
          <div class="card pd-20 wd-90p m-auto">
            <?php 
               date_default_timezone_set('Asia/Ujung_pandang');
            ?>
            <?php foreach($detail_book as $main) : ?>
                <?php 
                //join data di table buku dan kategori kemudian cocokan
                  $id = $main->id;
                  $queryKat = "SELECT `tb_buku`.`id`,`nama_kategori`, `judul_buku` FROM `tb_kategori_buku` INNER JOIN `tb_buku` WHERE `tb_kategori_buku`.`kode_kategori`=`tb_buku`.`kategori` and `tb_buku`.`id` = $id";
                  $kategori_tampil = $this->db->query($queryKat)->row_array();
               ?> 
               <h5 class="card-title bd-b pd-y-20">Proses Buku &nbsp;#<?= $main->kode_isbn; ?></h5>
                  <div class="card-body pd-0 printing-area">
                        <div class="row">
                           <div class="col-md-3">
                              <address>
                                 <?php foreach($sekolah as $r) : ?>
                                 <img src="<?= base_url('assets/images/logo/') . $r['logo']; ?>" class="img-fluid" width="70" alt="logo"><br><br>
                                 <strong><?= $r['nama_sekolah']; ?></strong><br>
                                 <?= $r['npsn']; ?><br>
                                <?= $r['alamat']; ?><br>
                                 <abbr title="Email">E:</abbr> smkn3tondano@sch.com
                                 <br>
                                 <abbr title="Phone">P:</abbr> (123) 456-7890
                                 <?php endforeach; ?>
                              </address>
                           </div>
                           <div class="col-md-3 ml-md-auto text-md-right">
                              <h4 class="text-dark tx-16">Data Peminjam :</h4>
                              <address>
                                 <strong><?= $user['nama']; ?></strong><br>
                                 Kelas : <?= $user['kelas']; ?><br>
                                 Jurusan : <?= $user['jurusan']; ?><br>
                                 <abbr title="Email">E:</abbr> <?= $user['email']; ?>
                                 <br>
                                 <abbr title="Phone">P:</abbr> <?= $user['no_hp']; ?>
                              </address>
                              <br><br>
                              <span><strong>Tanggal Pinjam :</strong> <?php echo date('d F, Y'); ?></span>
                              <br>
                              <!-- Buat proses tgl kembali -->
                              <?php foreach($pengaturan as $pr) : ?>
                              <?php 

                              $tgl_sekarang = date('Y-m-d');
                                 //set tgl kembali + tgl sekarang
                                 $tgl_kembali = date('Y-m-d', strtotime("+".$pr['lama_peminjaman']." days"));
                              ?>
                              <?php endforeach; ?>
                              <span><strong>Tanggal Kembali :</strong> <?= $tgl_kembali; ?></span>
                              <br><br><br><br><br>
                           </div>
                        </div> 
                        <h5 class="mg-b-10">List Buku Peminjaman</h5>
                        <div class="table-responsive">
                           <table class="table table-hover">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Nomor Anggota/Nisn</th>
                                    <th>Kode ISBN</th>
                                    <th>Judul Buku</th>
                                    <th>Kategori</th>
                                    <th>Tahun Terbit</th>
                                    <th>Jumlah Halaman</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                   <td>1</td>
                                   <td><?= $user['nisn'] ?></td>
                                   <td><?= $main->kode_isbn; ?></td>
                                   <td><?= $main->judul_buku; ?></td>
                                   <td><?php echo $kategori_tampil['nama_kategori'] ?></td>
                                   <td><?= $main->tahun_terbit; ?></td>
                                   <td><?= $main->jumlah_halaman; ?></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>                        
                        <hr>
                        <div class="row">
                           <div class="col-md-6">
                              <h5>Catatan</h5>
                              <p>Setelah dipinjam buku harap di simpan dengan baik jangan sampai rusak, bila buku yang dipinjam rusak harap membayar denda sesuai dengan peraturan perpustakaan. Pengembalian buku paling lambat 1 hari setelah masa tanggal kembali habis. Apabila buku melewati batas pengembalian yang ditetapkan maka siswa akan dikenakan denda sesuai aturan perpustakaan</p>
                           </div>
                           <div class="col-md-4 ml-md-auto text-right">
                              <span class="d-inline-block">
                              Sub - Total buku: 0
                              <p class="tx-gray-500 tx-12">VAT (10%): 0</p>                              
                              </span>
                              <br><br>
                              <p class="tx-bold">Total Pinjam : <span class="tx-20 tx-gray-900">1 buku</span></p>
                              <br>
                           </div>
                        </div>
                        <hr>

                        <form method="post" action="<?= base_url('transaksi/simpan_datapeminjaman') ?>">
                           <div class="form-group">
                              <input type="hidden" name="nama_peminjam" value="<?= $user['nama'] ?>">
                              <input type="hidden" name="email_peminjam" value="<?= $user['email'] ?>">
                              <input type="hidden" name="nomor_anggota" value="<?= $user['nisn'] ?>">
                              <input type="hidden" name="buku_pinjam" value="<?= $main->judul_buku; ?>">
                              <input type="hidden" name="isbn" value="<?= $main->kode_isbn; ?>">
                              <input type="hidden" name="tgl_pinjam" value="<?php echo date('d F, Y'); ?>">
                              <input type="hidden" name="tgl_kembali" value="<?= $tgl_kembali; ?>">
                           </div>

                        <div class="text-right mg-y-20">
                           <button type="submit" class="btn btn-primary mg-t-5 mr-2"><i class="fa fa-shopping-cart mr-2"></i> Simpan</button>
                           <a href="<?= base_url('transaksi') ?>"><button type="button" class="btn btn-primary mg-t-5"><i class="fa fa-times mr-2"></i> Batal</button></a>
                        </div>
                        </form>
            </div>
         <?php endforeach; ?>
         </div>         
    </div>
    <div class="mg-b-100 hidden-lg"></div>
</div>
          