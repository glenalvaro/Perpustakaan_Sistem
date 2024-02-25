<!-- Sweet Alert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
   <?php if ($this->session->flashdata('flash')) : ?>
   <?php endif; ?>

<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Data Petugas Perpustakaan</h6>
               </div>
               <div class="card-body">
                        <a href="<?= base_url('petugas/tambah_petugas'); ?>" class="btn btn-social btn-flat btn-info mg-b-20 btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                        <i data-feather="plus" class="wd-12 mr-2"></i>&nbsp; Tambah Petugas
                        </a>

                        <a href="" class="btn btn-social btn-flat btn-secondary mg-b-20 btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hidden-md hidden-sm hidden-xs">
                        <i data-feather="refresh-cw" class="wd-12 mr-2"></i>&nbsp; Perbarui
                        </a>
                     <table id="datatables" class="table table-striped" width="100%">
                      <thead>
                        <tr>
                           <th style="color: black;" class="text-center">No</th>
                           <th style="color: black;" class="text-center">Aksi</th>
                           <th style="color: black;" class="text-center">Foto</th>
                           <th style="color: black;" class="text-center">NIP</th>
                           <th style="color: black;" class="text-center">Nama</th>
                           <th style="color: black;" class="text-center">Level</th>
                           <th style="color: black;" class="text-center">Tgl Terdaftar</th>
                           <th style="color: black;" class="text-center">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                           <?php $no = 1; 
                           foreach($petugas as $main) : ?>
                        <tr>
                           <td width="5%" class="text-center"><?= $no++; ?></td>
                            <td width="10%" class="text-center">
                             <div class="btn-group">
                                <button type="button" class="btn btn-info btn-flat btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Pilih Aksi
                                </button>
                                <div class="dropdown-menu">
                                 <!-- Hilangkan aksi untuk admin -->
                                   <?php if($main['id'] != 1 ) : ?>
                                   <?php if($main['active'] == '0') : ?>
                                   <a href="<?=site_url('petugas/user_unlock/'.$main['id'])?>" class="dropdown-item tx-10"><i data-feather="lock" class="wd-16 mr-2"></i>Aktifkan Petugas</a>

                                   <?php elseif($main['active'] == '1') : ?>
                                   <a href="<?=site_url('petugas/user_lock/'.$main['id'])?>" class="dropdown-item tx-10"><i data-feather="unlock" class="wd-16 mr-2"></i>Non Aktifkan Petugas</a>
                                   <?php endif; ?>
                                   <?php endif; ?>

                                   <a href="<?= base_url('petugas/edit_petugas/').$main['id'] ?>" class="dropdown-item tx-10"><i data-feather="edit" class="wd-16 mr-2"></i>Edit Petugas</a>


                                   <!-- Hilangkan aksi untuk admin -->
                                   <?php if($main['id'] != 1 ) : ?>
                                   <a href="<?= base_url('petugas/update_password_petugas/').$main['id'] ?>" class="dropdown-item tx-10"><i data-feather="key" class="wd-16 mr-2"></i>Update Password</a>

                                   <a href="<?= base_url('petugas/hapus_petugas/').$main['id'] ?>" class="dropdown-item tombol-hapus"><i data-feather="trash" class="wd-16 mr-2"></i>Hapus Petugas</a>
                                   <?php endif; ?>
                                </div>
                              </div>
                           </td>
                           <td class="text-center">
                               <img src="<?= base_url('assets/images/profil/') . $main['foto']; ?>" class="img-thumbnail" width="48" height="43">
                           </td>
                           <td style="font-size: 11px;"><a style=" color: #007bff9c; text-decoration: none; background-color: transparent;" href="" data-toggle="modal" data-target="#detailPetugas<?= $main['id']; ?>"><?= $main['nisn']; ?></a></td>
                           <td style="font-size: 11px;"><?= $main['nama']; ?></td>
                           <td style="font-size: 11px;">
                              <?php 
                                   if ($main['id_akses'] == 1) {
                                       echo 'Administrator';
                                   } else {
                                      echo 'Kepala Sekolah';
                                   }
                                ?>
                           </td>
                           <td style="font-size: 11px;"><?= date('d F Y', $main['tgl_terdaftar']); ?></td>
                           <td style="font-size: 11px;">
                                 <?php 
                                  if($main['active'] == 1){
                                    echo "<span class='tx-12 badge badge-success'>Aktif</span>";
                                  } else {
                                    echo "<span class='tx-12 badge badge-danger'>Tidak Aktif</span>";
                                  }
                                ?>
                           </td>
                        </tr>
                           <?php endforeach; ?>
                     </tbody>
                  </table>
         </div>
      </div>
       <div class="hidden-lg mg-b-100"></div>
   </div>
</div>


<?php $no = 0;
foreach($petugas as $p) : $no++; ?>
<!-- Modal detail data petugas-->
<div class="modal fade" id="detailPetugas<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalComponents" aria-hidden="true">
  <div class="modal-dialog tx-rubik" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title tx-14" id="ModalComponents">Detail Data Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label style="margin-left: 22px;">Nama Petugas</label>
            <input type="text" class="form-control" value="<?= $p['nama']; ?>">
        </div>
        <div class="form-group">
            <label style="margin-left: 22px;">NIP</label>
            <input type="text" class="form-control" value="<?= $p['nisn']; ?>">
        </div>
        <div class="form-group">
            <label style="margin-left: 22px;">Alamat E-mail</label>
            <input type="text" class="form-control" value="<?= $p['email']; ?>">
        </div> 
        <div class="form-group">
            <label style="margin-left: 22px;">Gender</label>
            <input type="text" class="form-control" value="<?= $p['jenis_kelamin']; ?>">
        </div> 
        <div class="form-group">
            <label style="margin-left: 22px;">Tgl Lahir</label>
            <input type="text" class="form-control" value="<?= $p['tgl_lahir']; ?>">
        </div>  
        <div class="form-group">
            <label style="margin-left: 22px;">Alamat</label>
            <input type="text" class="form-control" value="<?= $p['alamat']; ?>">
        </div>  
        <div class="form-group">
            <label style="margin-left: 22px;">No Handphone</label>
            <input type="text" class="form-control" value="<?= $p['no_hp']; ?>">
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>