<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <form action="<?= base_url('anggota/tambah_anggota') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
      <div class="col-lg-12">
         <div class="card mg-b-20">
            <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Foto Siswa</h6>
            </div>
            <div class="card-body">
               <div class="row justify-content-center">
                  <img src="<?= base_url() ?>assets/images/profil/default.png" class="img-thumbnail img-preview" width="150" height="150">
               </div>
               <div class="input-group mg-t-10 mg-b-10">
                     <div class="custom-file" title="Klik untuk memilih foto">
                        <input type="file" class="custom-file-input" id="image" name="image" onchange="previewGmb()">
                        <label class="custom-file-label">Pilih Foto</label>
                     </div>
               </div>
               <p class="tx-10 text-center">Ukuran Maks 1048 kb, type jpg | png | jpeg</p>
            </div>
         </div>
      </div>
      <div class="col-lg-12">
          <div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Tambah Anggota Perpustakaan</h6>
               </div>
               <div class="card-body">
                     <div class="form-row mg-x-10-force">
                        <h5 class="card-text tx-14 mg-l-5 mb-3">Data Personal Siswa</h5>
                          <div class="col-md-12 mb-3">
                           <label for="">NISN</label>
                           <input type="number" name="nisn" id="nisn" class="form-control" value="<?= set_value('nisn') ?>">
                           <p style="color: #8dabc4; font-size: 11px; margin-left: 5px; font-style: italic;">* Untuk username login adalah nisn siswa</p>
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('nisn'); ?></li>
                           </ul>
                        </div>

                        <div class="col-md-12 mb-3">
                           <label for="">Nama Lengkap</label>
                            <input type="hidden" name="id_akses" class="form-control" value="2">
                           <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>" placeholder="Nama">
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('nama'); ?></li>
                           </ul>
                        </div>

                         <div class="col-md-6 mb-3">
                           <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control select2">
                              <option value="<?= set_value('jenis_kelamin') ?>"><?= set_value('jenis_kelamin') ?></option>
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                           </select>
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('jenis_kelamin'); ?></li>
                           </ul>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="">Tanggal Lahir</label>
                           <input type="text" name="tgl_lahir" id="dtp-date" class="form-control" value="<?= set_value('tgl_lahir') ?>">
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('tgl_lahir'); ?></li>
                           </ul>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="">Kelas</label>
                           <br>
                           <select name="kelas" class="selectpicker form-control" data-style="btn-default" data-live-search="true">
                                 <option value="<?= set_value('kelas') ?>"><?= set_value('kelas') ?></option>
                                 <option value="X">X</option>
                                 <option value="XI">XI</option>
                                 <option value="XII">XII</option>
                           </select>
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('kelas'); ?></li>
                           </ul>
                        </div>

                        <div class="col-md-6 mb-3">
                           <label for="">Jurusan</label>
                           <br>
                           <select name="jurusan" class="selectpicker form-control" data-style="btn-default" data-live-search="true">
                                 <option value="<?= set_value('jurusan') ?>"><?= set_value('jurusan') ?></option>
                                  <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan (TKJ)</option>
                                 <option value="Teknik Instalasi Listrik">Teknik Instalasi Listrik (TITL)</option>
                                 <option value="Teknik Pengelasan">Teknik Pengelasan (TP)</option>
                                 <option value="Tekstil">Tekstil</option>
                                 <option value="Bisnis Konstruksi dan Properti">Bisnis Konstruksi dan Properti (BKP)</option>
                                 <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif (TKRO)</option>
                                 <option value="Kreatif Kriya Kayu dan Rotan">Kreatif Kriya Kayu dan Rotan (KKKR)</option>
                                 <option value="Desain komunikasi Visual">Desain Komunikasi Visual (DKV)</option>
                           </select>
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('jurusan'); ?></li>
                           </ul>
                        </div>

                        
                        <div class="col-md-12 mb-3">
                           <label for="">No Handphone</label>
                           <input type="text" name="no_hp" id="phone-input" class="form-control" value="<?= set_value('no_hp') ?>">
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('no_hp'); ?></li>
                           </ul>
                        </div>

                        <div class="col-md-12 mb-3">
                           <label for="">Alamat</label>
                           <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat') ?>" placeholder="Alamat Lengkap">
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('alamat'); ?></li>
                           </ul>
                        </div>

                        <div class="col-md-12 mb-3">
                           <label for="">E-Mail</label>
                           <input type="text" name="email" class="form-control" value="<?= set_value('email') ?>" placeholder="Alamat E-mail">
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('email'); ?></li>
                           </ul>
                       </div>

                      
                        <div class="col-md-6 mb-3">
                           <label for="">Password</label>
                           <input type="password" name="password_new" id="password_new" class="form-control" placeholder="Password Baru">
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('password_new'); ?></li>
                           </ul>
                       </div>

                        <div class="col-md-6 mb-3">
                           <label for="">Ulangi Password</label>
                           <input type="password" name="confirm_pass" id="confirm_pass" class="form-control" placeholder="Ulangi Password">
                           <ul class="parsley-errors-list filled">
                              <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('confirm_pass'); ?></li>
                           </ul>
                       </div>

                       <p style="color: red; font-size: 11px; margin-left: 5px; font-style: italic;">* Password harus terdiri dari 8 karakter atau lebih</p>
                  </div>
               </div>
               <div class="card-footer mb-0 tx-right">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">
                            <span>Simpan Data</span> <i class="ti-location-arrow ml-2"></i>
                        </button> 
                        <a href="<?= base_url('anggota'); ?>">
                            <button type="button" class="btn btn-info">
                                <span>Batal</span><i class="ti-arrow-left ml-2"></i>
                            </button> 
                        </a>
                    </div>
                </div>
         </div>
      </div>
   </form>
   </div>
    <div class="hidden-lg mg-b-100"></div>
</div>



