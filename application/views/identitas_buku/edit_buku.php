<div class="page-inner pd-0-force">
      <div class="wrapper">
          <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
               <div class="col">
                 <form action="<?= base_url('buku/edit_buku/') ?><?= $buku['id']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                   <div class="box-custom mg-b-30">
                          <div class="card-header d-flex align-items-center justify-content-between">
                              <h6 class="tx-14 mg-b-0">Edit Buku <?= $buku['judul_buku']; ?></h6>
                          </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                <div class="card mg-b-30">
                                  <div class="card-header">
                                    Data Buku
                                  </div>
                                  <div class="card-body">
                                    <div class="form-group">
                                        <label>Kode ISBN</label>
                                        <input type="hidden" name="id" value="<?= $buku['id']; ?>">
                                        <input type="text" name="kode_isbn" id="isbn-input" class="form-control" value="<?= $buku['kode_isbn']; ?>">
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('kode_isbn'); ?></li>
                                         </ul>
                                    </div>

                                     <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" name="judul_buku" class="form-control" placeholder="Enter..." value="<?= $buku['judul_buku']; ?>">
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('judul_buku'); ?></li>
                                         </ul>
                                    </div>

                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <div class="input-group">
                                           <input type="text" name="pengarang" id="pengarang_nama" class="form-control" value="<?= $buku['pengarang']; ?>" readonly>
                                           <div class="input-group-append">
                                              <button type="button" data-toggle="modal" data-target="#Mpengarang" class="btn btn-custom-primary btn-sm"> <i class="fa fa-search mg-r-5"></i></button>
                                           </div>
                                        </div>
                                         <ul class="parsley-errors-list filled">
                                            <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('pengarang'); ?></li>
                                         </ul>
                                    </div>
                                      <?php 
                                      //query table buku dan kategori lalu cocokan data
                                         $id = $buku['id'];
                                         $query = "SELECT `tb_buku`.`id`,`nama_kategori`,`kode_kategori`, `judul_buku` FROM `tb_kategori_buku` INNER JOIN `tb_buku` WHERE `tb_kategori_buku`.`kode_kategori`=`tb_buku`.`kategori` and `tb_buku`.`id` = $id";
                                         $edit_kat = $this->db->query($query)->row_array();

                                      ?>
                                     <div class="form-group">
                                        <label>Kategori Buku</label>
                                         <select name="kategori" class="selectpicker form-control" data-style="btn-default" data-live-search="true">
                                             <option value="<?= $edit_kat['kode_kategori']; ?>">
                                                <?= $edit_kat['nama_kategori']; ?>
                                            </option>
                                            <?php foreach($get_kategori_list as $gkl) : ?>
                                                <option value="<?= $gkl['kode_kategori']; ?>"><?= $gkl['kode_kategori']; ?>--<?= $gkl['nama_kategori']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                         <ul class="parsley-errors-list filled">
                                            <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('kategori'); ?></li>
                                         </ul>
                                    </div>

                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <div class="input-group">
                                           <input type="text" name="penerbit" id="penerbit_nama" class="form-control" value="<?= $buku['penerbit']; ?>" readonly>
                                           <div class="input-group-append">
                                              <button type="button" class="btn btn-custom-primary btn-sm" data-toggle="modal" data-target="#Mpenerbit"> <i class="fa fa-search mg-r-5"></i></button>
                                           </div>
                                        </div>
                                         <ul class="parsley-errors-list filled">
                                            <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('penerbit'); ?></li>
                                         </ul>
                                    </div>

                                    <div class="form-group">
                                        <label>Tahun Terbit</label>
                                        <select name="tahun_terbit" class="selectpicker form-control" data-style="btn-default" data-live-search="true">
                                            <option value="<?= $buku['tahun_terbit']; ?>">
                                                <?= $buku['tahun_terbit']; ?>
                                            </option>
                                         <?php
                                            $now=date('Y');
                                                for ($a=2000; $a<=$now; $a++)
                                                {
                                                  echo "<option value='$a'>Tahun $a</option>";
                                                }
                                         ?>
                                        </select>
                                         <ul class="parsley-errors-list filled">
                                            <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('tahun_terbit'); ?></li>
                                         </ul>
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah Halaman</label>
                                        <input type="text" name="jumlah_halaman" class="form-control" placeholder="Enter..." value="<?= $buku['jumlah_halaman']; ?>">
                                         <ul class="parsley-errors-list filled">
                                            <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('jumlah_halaman'); ?></li>
                                         </ul>
                                    </div>

                                    <div class="form-group">
                                        <label>Keterangan Buku</label>
                                         <select name="keterangan" class="form-control select2">
                                          <option value="<?= $buku['keterangan']; ?>"><?= $buku['keterangan']; ?></option>
                                          <option value="Tersedia">Tersedia</option>
                                          <option value="Tidak Tersedia">Tidak Tersedia</option>
                                       </select>
                                        <ul class="parsley-errors-list filled">
                                            <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('keterangan'); ?></li>
                                         </ul>
                                    </div>
                                  </div>
                                </div>  
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title tx-14">Cover Buku</h5>
                                    <hr>
                                     <div class="row justify-content-center">
                                      <img src="<?= base_url('assets/images/cover/') . $buku['cover_buku']; ?>" class="img-thumbnail img-preview" width="150" height="150">
                                   </div>
                                   <div class="input-group mg-t-10 mg-b-10">
                                         <div class="custom-file" title="Klik untuk memilih foto">
                                            <input type="file" class="custom-file-input" id="image" name="image" onchange="previewGmb()">
                                            <label class="custom-file-label">Pilih Foto</label>
                                         </div>
                                   </div>
                                  </div>
                                  <div class="card-footer">
                                     <p class="tx-10 text-center">Ukuran Maks 1048 kb, type jpg | png | jpeg</p>
                                  </div>
                                </div>      
                            </div>
                            </div>
                        </div>
                        <div class="card-footer tx-right">
                            <button type="submit" class="btn btn-outline-primary btn-sm mr-2">Simpan</button>
                            <a href="<?= base_url('buku'); ?>"><button type="button" class="btn btn-outline-primary btn-sm">Kembali</button></a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="hidden-lg mg-b-100"></div>
</div>




<!-- Modal Pengarang tampil data dari data base-->
<div class="modal fade" id="Mpengarang">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content tx-rubik">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Pengarang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="modal-pengarang" class="table table-bordered">
            <thead class="bg-twitter">
                <tr>
                   <th style="color: white;" class="text-center">No</th>
                   <th style="color: white;" class="text-center">Nama Pengarang</th>
                   <th style="color: white;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" id="input-manual" class="btn btn-outline-primary btn-sm">Tambah Manual</button>
      </div>
    </div>
  </div>
  <div class="hidden-lg mg-b-100"></div>
</div>



<!-- Modal Pengarang jika user menginput manual-->
<div class="modal" id="input-pengarang">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content tx-rubik">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Input Manual Pengarang</h5>
        <button id="btnClose" type="button" class="close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form autocomplete="off">
           <div class="form-row">
                <div class="col-lg-12 mb-3">
                    <label style="margin-left: 22px;" for="validationPengarang1">Nama Pengarang</label>
                      <input type="text" name="" id="save" class="form-control" placeholder="Enter pengarang" required>
                      <div style="margin-left: 22px;" class="invalid-feedback">
                        Kolom ini wajib di isi !
                      </div>
                </div>
            </div>                               
      </div>
     </form>
      <div class="modal-footer">
        <button type="button" id="input-otomatis" class="btn btn-secondary btn-sm">Kembali</button>
        <button type="button" id="simpan" class="btn btn-primary btn-sm">Simpan</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal Penerbit tampil data dari data base-->
<div class="modal fade" id="Mpenerbit">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content tx-rubik">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Penerbit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="modal-penerbit" class="table table-bordered">
            <thead class="bg-twitter">
                <tr>
                   <th style="color: white;" class="text-center">No</th>
                   <th style="color: white;" class="text-center">Nama Penerbit</th>
                   <th style="color: white;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button id="input-manualPenerbit" type="button" class="btn btn-outline-primary btn-sm">Tambah Manual</button>
      </div>
    </div>
  </div>
  <div class="hidden-lg mg-b-100"></div>
</div>


<!-- Modal Penerbit jika user menginput manual-->
<div class="modal" id="input-penerbit">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content tx-rubik">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Input Manual Penerbit</h5>
        <button id="btnClosePenerbit" type="button" class="close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form autocomplete="off">
           <div class="form-row">
                <div class="col-lg-12 mb-3">
                    <label style="margin-left: 22px;">Nama Penerbit</label>
                      <input type="text" name="" id="savePenerbit" class="form-control" placeholder="Enter penerbit" required>
                      <div style="margin-left: 22px;" class="invalid-feedback">
                        Kolom ini wajib di isi !
                      </div>
                </div>
            </div>                               
      </div>
     </form>
      <div class="modal-footer">
        <button type="button" id="input-otomatisPenerbit" class="btn btn-secondary btn-sm">Kembali</button>
        <button type="button" id="simpanData" class="btn btn-primary btn-sm">Simpan</button>
      </div>
    </div>
  </div>
</div>


