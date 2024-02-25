<!-- Sweet Alert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif; ?>

<div class="page-inner pd-0-force">
      <div class="wrapper">
          <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
               <div class="col">
                   <div class="card mg-b-30">
                          <div class="card-header d-flex align-items-center justify-content-between">
                              <h6 class="tx-14 mg-b-0">Data Kategori Buku</h6>
                          </div>
                        <div class="card-body">
                           <div class="row clearfix">
                                 <div class="col-12">
                                    <div class="card mg-b-20">
                                       <div class="card-body">
                                          <p class="lead mb-0">Pengelompokan koleksi perpustakaan berdasarkan <a href="#" class="tx-semibold">sistem Dewey Decimal Classification (Sistem Desimal Dewey)</a> agar buku dapat dengan mudah dicari. Data Kategori ini tidak dapat dihapus namun bisa diedit.</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                          <a href="" class="btn btn-social btn-flat btn-info mg-b-20 btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#tambahKategori">
                          <i data-feather="tag" class="wd-16 mr-2"></i>&nbsp; Tambah Kategori
                          </a>
                          <table id="datatables" class="table table-striped" width="100%">
                              <thead>
                                   <tr>
                                      <th style="color: black;" class="text-center">No</th>
                                      <th style="color: black;" class="text-center">Kode</th>
                                      <th style="color: black;" class="text-center">Nama Kategori</th>
                                      <th style="color: black;" class="text-center">Aksi</th>
                                   </tr>
                              </thead>
                              <tbody>
                                <?php $no = 1;
                                foreach($kategori as $get) : ?>
                                  <tr>
                                     <td width="3%" class="tx-center"><?= $no++; ?></td>
                                     <td style="font-size: 11px;"><?= $get['kode_kategori']; ?></td>
                                     <td style="font-size: 11px;" class="tx-uppercase"><?= $get['nama_kategori']; ?></td>
                                     <td width="20%" class="text-center">
                                          <a href="" class="btn btn-info btn-flat btn-xs" data-toggle="modal" data-target="#editKategori<?= $get['id']; ?>"><i class="fa fa-edit"></i></a>
                                          
                                          <!-- <a href="<?=site_url('kategori_buku/hapus_kategori/'.$get['id'])?>" class="tombol-hapus btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i></a> -->
                                     </td>
                                  </tr>
                              <?php endforeach; ?>
                              </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="hidden-lg mg-b-100"></div>
</div>



<!-- Modal Tambah Data-->
<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered tx-rubik" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('kategori_buku'); ?>" method="post" class="needs-validation" autocomplete="off" novalidate>
           <div class="form-row">
                <div class="col-lg-12 mb-3">
                    <label style="margin-left: 22px;" for="validationKode">Kode</label>
                      <input type="text" name="kode_kategori" class="form-control" id="validationKode" placeholder="Enter Kode" value="<?php echo $kode_kategori; ?>" readonly>
                </div>

                <div class="col-lg-12 mb-3">
                    <label style="margin-left: 22px;" for="validationNama">Nama Kategori</label>
                      <input type="text" name="nama_kategori" class="form-control" id="validationNama" placeholder="Enter Nama" required>
                      <div style="margin-left: 22px;" class="invalid-feedback">
                        Kolom ini wajib di isi !
                      </div>
                </div>
            </div>                               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>



<?php $no = 0;
foreach($kategori as $k) : $no++; ?>
<!-- Modal Edit Data-->
<div class="modal fade" id="editKategori<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered tx-rubik" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('kategori_buku/edit_kategoriBuku/'); ?><?= $k['id']; ?>" method="post" class="needs-validation" enctype="multipart/form-data" autocomplete="off" novalidate>
           <div class="form-group">
                <label style="margin-left: 22px;" for="validationKode">Kode</label>
                <input type="hidden" name="id" value="<?= $k['id']; ?>">
                <input type="text" class="form-control" name="kode_kategori" id="kode_kategori" value="<?= $k['kode_kategori']; ?>" required>
                 <div style="margin-left: 22px;" class="invalid-feedback">
                      Kolom ini wajib di isi !
                  </div>
           </div> 

            <div class="form-group">
                <label style="margin-left: 22px;" for="validationNama">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="<?= $k['nama_kategori']; ?>" required>
                 <div style="margin-left: 22px;" class="invalid-feedback">
                        Kolom ini wajib di isi !
                  </div>
           </div>                              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

