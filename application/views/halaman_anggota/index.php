<!-- Sweet Alert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
   <?php if ($this->session->flashdata('flash')) : ?>
   <?php endif; ?>

<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Data Anggota Perpustakaan</h6>
               </div>
               <div class="card-body">
                        <a href="<?= base_url('anggota/tambah_anggota'); ?>" class="btn btn-social btn-flat btn-info mg-b-20 btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                        <i data-feather="plus" class="wd-12 mr-2"></i>&nbsp; Tambah Siswa
                        </a>
                        
                        <!-- user 3 tidak boleh hapus data siswa -->
                        <?php if($user['id_akses'] == 1) : ?>
                           <button type="submit" name="delete" id="hapus-terpilih" class="btn btn-social btn-flat btn-danger mg-b-20 btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Ceklis pada data anggota yang akan di hapus" disabled="">
                           <i data-feather="trash-2" class="wd-12 mr-2"></i>&nbsp; Hapus Data Terpilih
                           </button>
                        <?php endif; ?>

                        <a href="" class="btn btn-social btn-flat btn-secondary mg-b-20 btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hidden-md hidden-sm hidden-xs">
                        <i data-feather="refresh-cw" class="wd-12 mr-2"></i>&nbsp; Perbarui
                        </a>
                    <form method="post" action="<?= base_url('anggota/hapus_terpilih') ?>" id="form-delete">
                     <table id="datatables" class="table table-striped" width="100%">
                      <thead>
                        <tr>
                           <th>
                              <input type="checkbox" id="check-all">
                           </th>
                           <th style="color: black;" class="text-center">No</th>
                           <th style="color: black;" class="text-center">Aksi</th>
                           <th style="color: black;" class="text-center">Foto</th>
                           <th style="color: black;" class="text-center">NISN</th>
                           <th style="color: black;" class="text-center">Nama</th>
                           <th style="color: black;" class="text-center">Tgl Terdaftar</th>
                           <th style="color: black;" class="text-center">Kelas</th>
                           <th style="color: black;" class="text-center">Jurusan</th>
                           <th style="color: black;" class="text-center">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                           <?php $no = 1; 
                           foreach($anggota as $value) : ?>
                        <tr>
                           <td>
                              <!-- Hilangkan aksi untuk admin -->
                              <?php if($value['id'] != 1 ) : ?>
                                 <input type="checkbox" oninput="validasi()" class="check-item" id="hapus_anggota" name="id[]" value="<?= $value['id'] ?>">
                              <?php endif; ?>
                           </td>
                           <td width="3%" class="text-center"><?= $no++; ?></td>
                            <td width="10%" class="text-center">
                             <div class="btn-group">
                                <button type="button" class="btn btn-info btn-flat btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Pilih Aksi
                                </button>
                                <div class="dropdown-menu">
                                  
                                   <a href="<?= base_url('anggota/detail_anggota/').$value['id'] ?>" class="dropdown-item tx-10"><i data-feather="info" class="wd-16 mr-2"></i>Lihat Details</a>

                                   <a href="<?= base_url('profile/kartu_anggota/').$value['id']; ?>" class="dropdown-item tx-10" target="_blank"><i data-feather="credit-card" class="wd-16 mr-2"></i>Cetak Kartu Anggota</a>
                                  
                                  <!-- user 3 tidak boleh melakukan aksi -->
                                  <?php if($user['id_akses'] == 1) : ?>

                                   <a href="<?= base_url('anggota/edit_anggota/').$value['id'] ?>" class="dropdown-item tx-10"><i data-feather="edit" class="wd-16 mr-2"></i>Edit Siswa</a>

                                    <!-- Hilangkan aksi untuk admin -->
                                   <?php if($value['id'] != 1 ) : ?>
                                   <?php if($value['active'] == '0') : ?>
                                   <a href="<?=site_url('anggota/user_unlock/'.$value['id'])?>" class="dropdown-item tx-10"><i data-feather="lock" class="wd-16 mr-2"></i>Aktifkan Siswa</a>

                                   <?php elseif($value['active'] == '1') : ?>
                                   <a href="<?=site_url('anggota/user_lock/'.$value['id'])?>" class="dropdown-item tx-10"><i data-feather="unlock" class="wd-16 mr-2"></i>Non Aktifkan Siswa</a>
                                   <?php endif; ?>
                                   <?php endif; ?>

                                   <!-- Hilangkan aksi untuk admin -->
                                   <?php if($value['id'] != 1 ) : ?>
                                   <a href="<?= base_url('anggota/update_password/').$value['id'] ?>" class="dropdown-item tx-10"><i data-feather="key" class="wd-16 mr-2"></i>Update Password</a>

                                   <a href="<?= base_url('anggota/hapus_anggota/').$value['id'] ?>" class="dropdown-item tombol-hapus"><i data-feather="trash" class="wd-16 mr-2"></i>Hapus Siswa</a>
                                   <?php endif; ?>
                                   <!-- end aksi -->
                                   <?php endif; ?>
                                </div>
                              </div>
                           </td>
                           <td class="text-center">
                               <img src="<?= base_url('assets/images/profil/') . $value['foto']; ?>" class="img-thumbnail" width="48" height="43">
                           </td>
                           <td style="font-size: 11px;"><a style=" color: #007bff9c; text-decoration: none; background-color: transparent;" href="<?= base_url('anggota/detail_anggota/').$value['id'] ?>"><?= $value['nisn']; ?></a></td>
                           <td style="font-size: 11px;"><?= $value['nama']; ?></td>
                           <td style="font-size: 11px;"><?= date('d F Y', $value['tgl_terdaftar']); ?></td>
                           <td style="font-size: 11px;"><?= $value['kelas']; ?></td>
                           <td style="font-size: 11px;"><?= $value['jurusan']; ?></td>
                           <td style="font-size: 11px;">
                               <?php 
                                  if($value['active'] == 1){
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