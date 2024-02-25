<!-- Sweet Alert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif; ?>

<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>
<?php if ($this->session->flashdata('flash-error')) : ?>
<?php endif; ?>

<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="card mg-b-30">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Pengaturan sistem perpustakaan</h6>
               </div>
               <div class="card-body mg-b-30">
                  <div class="row justify-content-center">
                  <div class="col-md-4">
                     <div class="box-custom mg-b-30">
                        <div class="card-header">
                           <h6 class="tx-12 mg-b-0 ml-2">Menu</h6>
                        </div>
                        <div class="card-body">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                           <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Utama</a>
                           <a class="nav-link" id="v-pills-slider-tab" data-toggle="pill" href="#v-pills-slider" role="tab" aria-controls="v-pills-slider" aria-selected="false">Web Slider</a>
                           <a class="nav-link" id="v-pills-lainnya-tab" data-toggle="pill" href="#v-pills-lainnya" role="tab" aria-controls="v-pills-lainnya" aria-selected="false">Lainnya</a>
                            <a class="nav-link" id="v-pills-media-social-tab" data-toggle="pill" href="#v-pills-media-social" role="tab" aria-controls="v-pills-media-social" aria-selected="false">Media Social</a>
                         </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="box-custom">
                        <div class="card-header">
                           <h6 class="tx-12 mg-b-0 ml-2">Pengaturan</h6>
                        </div>
                        <div class="card-body">
                           <?php foreach($pengaturan as $pt) : ?>
                          <form action="<?= base_url('pengaturan/update_data/'); ?><?= $pt['id']; ?>" method="post" class="needs-validation" enctype="multipart/form-data" autocomplete="off" novalidate>
                            <div class="tab-content" id="v-pills-tabContent">
                           <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              <div class="form-group">
                                 <label>Nama Sistem</label>
                                  <input type="hidden" name="id" value="<?= $pt['id']; ?>">
                                 <input type="text" name="nama_sistem" value="<?= $pt['nama_sistem']; ?>" class="form-control" required>
                                  <div class="invalid-feedback">
                                    Kolom ini wajib di isi !
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label>Alamat</label>
                                 <input type="text" name="alamat" value="<?= $pt['alamat']; ?>" class="form-control" required>
                                  <div class="invalid-feedback">
                                    Kolom ini wajib di isi !
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label>No Telepon</label>
                                 <input type="text" name="no_telpon" value="<?= $pt['no_telpon']; ?>" class="form-control" required>
                                 <div class="invalid-feedback">
                                    Kolom ini wajib di isi !
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label>Hari Kerja</label>
                                 <input type="text" name="hari_kerja" value="<?= $pt['hari_kerja']; ?>" class="form-control" required>
                                 <div class="invalid-feedback">
                                    Kolom ini wajib di isi !
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label>Jam Kerja</label>
                                 <input type="text" name="jam_kerja" value="<?= $pt['jam_kerja']; ?>" class="form-control" required>
                                 <div class="invalid-feedback">
                                    Kolom ini wajib di isi !
                                 </div>
                              </div>
                           </div>

                           <div class="tab-pane fade" id="v-pills-slider" role="tabpanel" aria-labelledby="v-pills-slider-tab">
                               <div class="form-group">
                                 <label>Slider 1</label>
                                 <br>
                                 <img src="<?= base_url('assets/images/slider/') . $pt['slider_1']; ?>" class="img-thumbnail img-preview mg-b-10" width="150" height="150">
                                 <input type="file" name="slider1" id="slider1" class="form-control"  value="<?= $pt['slider_1']; ?>">
                              </div>


                               <div class="form-group">
                                 <label>Slider 2</label>
                                 <br>
                                 <img src="<?= base_url('assets/images/slider/') . $pt['slider_2']; ?>" class="img-thumbnail img-preview mg-b-10" width="150" height="150">
                                 <input type="file" name="slider2" id="slider2" class="form-control"  value="<?= $pt['slider_2']; ?>">
                              </div>

                               <div class="form-group">
                                 <label>Slider 3</label>
                                 <br>
                                 <img src="<?= base_url('assets/images/slider/') . $pt['slider_3']; ?>" class="img-thumbnail img-preview mg-b-10" width="150" height="150">
                                 <input type="file" name="slider3" id="slider3" class="form-control"  value="<?= $pt['slider_3']; ?>">
                              </div>
                           </div>
                           <div class="tab-pane fade" id="v-pills-lainnya" role="tabpanel" aria-labelledby="v-pills-lainnya-tab">
                              <div class="form-group">
                                 <label>Denda Peminjaman</label>
                                 <input type="text" name="denda" value="<?= $pt['denda']; ?>" class="form-control" required>
                                 <div class="invalid-feedback">
                                    Kolom ini wajib di isi !
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label>Lama Hari Peminjaman</label>
                                 <input type="number" name="lama_peminjaman" value="<?= $pt['lama_peminjaman']; ?>" class="form-control" required>
                                 <div class="invalid-feedback">
                                    Kolom ini wajib di isi !
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="tx-gray-500">Maksimal Buku Pinjam <small>/buku</small></label>
                                  <span class="ml-2">
                                       <a href="#" data-toggle="tooltip" data-placement="right" title="Jumlah buku yang di pinjam masing-masing siswa">
                                           <img src="<?= base_url() ?>assets/images/icon/info.svg" style="widht:15px; height:15px;">
                                       </a>
                                 </span>
                                 <input type="number" name="maksimal_peminjaman" value="<?= $pt['maksimal_peminjaman']; ?>" class="form-control" required>
                                 <div class="invalid-feedback">
                                    Kolom ini wajib di isi !
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="tx-gray-500">Tambahan Waktu Pinjam <small>/hari</small></label>
                                 <span class="ml-2">
                                       <a href="#" data-toggle="tooltip" data-placement="right" title="Perpanjang peminjaman buku">
                                           <img src="<?= base_url() ?>assets/images/icon/info.svg" style="widht:15px; height:15px;">
                                       </a>
                                 </span>
                                 <input type="number" name="tambahan_waktu_pinjam" value="<?= $pt['tambahan_waktu_pinjam']; ?>" class="form-control" required>
                                 <div class="invalid-feedback">
                                    Kolom ini wajib di isi !
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label>Tanda Tangan</label>
                                  <span class="ml-2">
                                       <a href="#" data-toggle="tooltip" data-placement="right" title="Tanda tangan ini digunakan untuk kartu perpustakaan">
                                           <img src="<?= base_url() ?>assets/images/icon/info.svg" style="widht:15px; height:15px;">
                                       </a>
                                 </span>
                                 <br>
                                 <img src="<?= base_url('assets/images/scan/tanda_tangan/') . $pt['scan_ttd']; ?>" class="img-thumbnail img-preview mg-b-10" width="150" height="150">
                                 <input type="file" name="ttd1" id="ttd1" class="form-control"  value="<?= $pt['scan_ttd']; ?>">
                              </div>

                              <div class="form-group">
                                 <label>Stempel Cap</label>
                                 <span class="ml-2">
                                       <a href="#" data-toggle="tooltip" data-placement="right" title="Stempel ini digunakan untuk kartu perpustakaan">
                                           <img src="<?= base_url() ?>assets/images/icon/info.svg" style="widht:15px; height:15px;">
                                       </a>
                                 </span>
                                 <br>
                                 <img src="<?= base_url('assets/images/scan/cap_stempel/') . $pt['scan_cap']; ?>" class="img-thumbnail img-preview mg-b-10" width="150" height="150">
                                 <input type="file" name="stempel1" id="stempel1" class="form-control"  value="<?= $pt['scan_cap']; ?>">
                              </div>
                           </div>
                            <div class="tab-pane fade" id="v-pills-media-social" role="tabpanel" aria-labelledby="v-pills-media-social-tab">
                              <p>Youtube :</p>
                              <div class="form-group">
                                 <label>API Key</label>
                                 <span class="ml-2">
                                       <a href="#" data-toggle="tooltip" data-placement="right" title="Anda dapat mengakses google developer untuk mendapatkan api key youtube">
                                           <img src="<?= base_url() ?>assets/images/icon/info.svg" style="widht:15px; height:15px;">
                                       </a>
                                 </span>
                                 <input type="text" name="api_key_youtube" value="<?= $pt['api_key_youtube']; ?>" class="form-control" readonly>
                                  <div class="invalid-feedback">
                                    Kolom ini wajib di isi !
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label>ID Channel Youtube</label>
                                 <span class="ml-2">
                                       <a href="#" data-toggle="tooltip" data-placement="right" title="ID Channel Youtube terdapat pada halaman pengaturan youtube">
                                           <img src="<?= base_url() ?>assets/images/icon/info.svg" style="widht:15px; height:15px;">
                                       </a>
                                 </span>
                                 <input type="text" name="channel_id_youtube" value="<?= $pt['channel_id_youtube']; ?>" class="form-control">
                                  <div class="invalid-feedback">
                                    Kolom ini wajib di isi !
                                 </div>
                              </div>
                           </div>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                           </div>
                        </form>
                        <?php endforeach; ?>
                        </div>
                     </div>
                  </div>
               </div>
               </div>
         </div>
      </div>
   </div>
   <div class="hidden-lg mg-b-100"></div>
</div>