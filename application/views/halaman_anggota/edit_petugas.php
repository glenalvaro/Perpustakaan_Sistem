<style>
.frame {
  position: relative;
  width: 200px;
  height: 145px;
  max-height: 500px;
  overflow: hidden;
  background: #f4f7fe;
  display: flex;
  justify-content: center;
  align-items: center;
}

.image {
  position: relative;
  width: 100%;
  object-fit: cover;
}
</style>
<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
         <form method="POST" action="<?= base_url('petugas/edit_petugas/'); ?><?= $petugas['id']; ?>" enctype="multipart/form-data">
          <div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Edit Petugas Perpustakaan</h6>
               </div>
               <div class="card-body">
               	<div class="row">
               	<div class="col-md-8">
                     <!-- Info -->
                     <div class="card mg-b-30">
                        <div class="card-header d-flex align-items-center justify-content-between">
                           <h6 class="tx-12 mg-b-0">Personal Information</h6>
                        </div>
                        <!-- card-header -->
                        <div class="card-body">
                            <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="">Nama Lengkap</label>
                                  <input type="hidden" name="id" value="<?= $petugas['id']; ?>">
                                  <input type="hidden" name="id_akses" class="form-control" value="<?= $petugas['id_akses']; ?>">
                                  <input type="text" name="nama" class="form-control" value="<?= $petugas['nama']; ?>">
                                  <ul class="parsley-errors-list filled">
                                    <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('nama'); ?></li>
                                 </ul>
                              </div>

                              <div class="col-md-12 mb-3">
                                 <label for="">ALamat E-mail</label>
                                 <input type="text" name="email" class="form-control" id="email" value="<?= $petugas['email']; ?>">
                                 <ul class="parsley-errors-list filled">
                                    <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('email'); ?></li>
                                 </ul>
                              </div>

                               <div class="col-md-6 mb-3">
                                 <label for="">Jenis Kelamin</label>
                                  <select name="jenis_kelamin" class="selectpicker form-control" data-style="btn-default" data-live-search="true">
                                    <option value="<?= $petugas['jenis_kelamin']; ?>">
                                      <?= $petugas['jenis_kelamin']; ?>
                                   </option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                 </select>
                              </div>

                               <div class="col-md-6 mb-3">
                                 <label for="">Tanggal Lahir</label>
                                 <input type="text" id="dtp-date" name="tgl_lahir" class="form-control" value="<?= $petugas['tgl_lahir']; ?>">
                                 <ul class="parsley-errors-list filled">
                                    <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('tgl_lahir'); ?></li>
                                 </ul>
                              </div>

                              <div class="col-md-12 mb-3">
                                 <label for="">Phone</label>
                                 <input type="text" name="no_hp" class="form-control" id="phone-input" value="<?= $petugas['no_hp']; ?>">
                                 <ul class="parsley-errors-list filled">
                                    <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('no_hp'); ?></li>
                                 </ul>
                              </div>

                              <div class="col-md-12 mb-3">
                                 <label for="">Alamat</label>
                                 <input type="text" name="alamat" class="form-control" value="<?= $petugas['alamat']; ?>">
                                 <ul class="parsley-errors-list filled">
                                    <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('alamat'); ?></li>
                                 </ul>
                              </div>

                            <!-- hilangkan edit akses pada id default 1  -->
                            <?php if($petugas['id'] != 1 ) : ?>
                             <div class="col mb-3">
                                 <label for="">Akses User</label>
                                 <br>
                                 <select name="id_akses" class="selectpicker form-control" data-style="btn-default" data-live-search="true">
                                    <option value="<?= $petugas['id_akses']; ?>">
                                      <?php 
                                         if($petugas['id_akses'] == 1 ){
                                           echo "Administrator";
                                         } else if($petugas['id_akses'] == 2) {
                                           echo "Siswa";
                                         } else{
                                           echo "Kepala Sekolah";
                                         }
                                       ?>
                                   </option>
                                    <option value="1">Administrator</option>
                                    <option value="3">Kepala Sekolah</option>
                                 </select>
                              </div>    
                            <?php endif; ?>
                        </div>
                     </div>
                     </div>
                 </div>

                 <div class="col-md-4">
                     <!-- Foto -->
                     <div class="card mg-b-30">
                        <div class="card-header tx-12">Foto Anggota</div>
                        <div class="card-body">
                        	<div class="row justify-content-center">
                        		<img src="<?= base_url('assets/images/profil/') . $petugas['foto']; ?>" class="img-thumbnail img-preview" width="150" height="150">
                        	</div>
                            <div class="input-group mg-t-10">
                            <div class="custom-file" title="Klik untuk memilih foto">
                                <input type="file" class="custom-file-input" id="image" name="image" onchange="previewGmb()">
                                <label class="custom-file-label">Pilih Foto</label>
                            </div>
                        </div>
                        </div>
                     </div>

                     <div class="card">
                        <div class="card-header tx-12">Member</div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-12 mg-b-20">
                                 <label for="">NIP</label>
                                 <input type="text" class="form-control" value="<?= $petugas['nisn']; ?>" readonly>
                              </div>
                              <div class="col-md-12 mb-3">
                                 <label for="">Tanggal Terdaftar</label>
                                 <input type="text" class="form-control" value="<?= date('d F Y', $petugas['tgl_terdaftar']); ?>" readonly>
                              </div>
                           </div> 
                        </div>
                     </div>
                  </div>
                </div>
              </div>
       		<div class="card-footer tx-right mg-b-10">
               <button type="submit" class="btn btn-outline-info">Update Data</button>
       			<a href="<?= base_url('petugas') ?>"><button type="button" class="btn btn-outline-info">Kembali</button></a>
       		</div>
          </div>
       </form>
       </div>
    </div>
     <div class="hidden-lg mg-b-100"></div>
</div>