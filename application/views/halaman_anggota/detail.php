<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Detail Anggota Perpustakaan</h6>
               </div>
               <?php foreach($detail_Anggota as $key) : ?>
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
                           <h6 class="my-3">Personal</h6>
                           <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">Nama Lengkap</div>
                              <div class="col-md-9"><?= $key->nama; ?></div>
                           </div>
                           <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">NISN</div>
                              <div class="col-md-9"><?= $key->nisn; ?></div>
                           </div>
                           <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">Jenis Kelamin</div>
                              <div class="col-md-9"><?= $key->jenis_kelamin; ?></div>
                           </div>
                           <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">Tanggal Lahir</div>
                              <div class="col-md-9"><?= $key->tgl_lahir; ?></div>
                           </div>
                           <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">Kelas</div>
                              <div class="col-md-9"><?= $key->kelas; ?></div>
                           </div>
                           <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">Jurusan</div>
                              <div class="col-md-9">
                                 <?= $key->jurusan; ?>
                              </div>
                           </div>
                           <h6 class="my-3">Contacts</h6>
                           <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">Email</div>
                              <div class="col-md-9"><?= $key->email; ?></div>
                           </div>
                           <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">Phone</div>
                              <div class="col-md-9"><?= $key->no_hp; ?></div>
                           </div>
                            <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">Alamat</div>
                              <div class="col-md-9"><?= $key->alamat; ?></div>
                           </div>
                           <h6 class="my-3">Akses</h6>
                           	 <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">Aktif</div>
                              <div class="col-md-9">
                              	 <?php 
	                               if($key->active == 1){
	                                 echo "Aktif";
	                               } else {
	                                 echo "Tidak Aktif";
	                               }
	                             ?>
                              </div>
                           </div>
                            <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">Akses Sebagai</div>
                              <div class="col-md-9">
                              	<?php 
		                             if ($key->id_akses == 1) {
		                                 echo 'Administrator';
		                             } else if($key->id_akses == 2) {
		                                echo 'Siswa';
		                             } else {
		                                echo 'Kepala Sekolah';
		                             }
	                             ?>
                              </div>
                           </div>
                            <div class="row mb-2">
                              <div class="col-md-3 tx-gray-500">Tgl terdaftar</div>
                              <div class="col-md-9"><?= date('d F Y', $key->tgl_terdaftar); ?></div>
                           </div>
                        </div>
                     </div>
                 </div>

                 <div class="col-md-4">
                     <!-- Foto -->
                     <div class="card">
                        <div class="card-header tx-12">Foto Anggota</div>
                        <div class="card-body">
                        	<div class="row justify-content-center">
                        		<img src="<?= base_url('assets/images/profil/') . $key->foto; ?>" class="img-thumbnail" width="150" height="150">
                        	</div>
                        </div>
                     </div>
                  </div>
                </div>
              </div>
       		<?php endforeach; ?>
       		<div class="card-footer tx-right mg-b-10">
       			<a href="<?= base_url('anggota'); ?>"><button class="btn btn-outline-info">Kembali</button></a>
       		</div>
          </div>
       </div>
    </div>
     <div class="hidden-lg mg-b-100"></div>
</div>