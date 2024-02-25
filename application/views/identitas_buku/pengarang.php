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
                              <h6 class="tx-14 mg-b-0">Data Pengarang</h6>
                          </div>
                        <div class="card-body">
                            <a href="" class="btn btn-social btn-flat btn-info mg-b-20 btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#tambahPengarang">
                          <i data-feather="users" class="wd-16 mr-2"></i>&nbsp; Tambah Pengarang
                          </a>

                          <a href="<?= base_url('pengarang/import_pengarang') ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hidden-md hidden-sm hidden-xs mg-b-20">
                          <i data-feather="file" class="wd-12 mr-2"></i>&nbsp; Import Pengarang Excel
                          </a>

                        <table id="table2" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="color: black;" class="text-center">No</th>
                                        <th style="color: black;" class="text-center">Nama Pengarang</th>
                                        <th style="color: black;" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
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
<div class="modal fade" id="tambahPengarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered tx-rubik" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pengarang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('pengarang'); ?>" method="post" class="needs-validation" autocomplete="off" novalidate>
           <div class="form-row">
                <div class="col-lg-12 mb-3">
                    <label style="margin-left: 22px;" for="validationPengarang">Nama Pengarang</label>
                      <input type="text" name="nama_pengarang" class="form-control" id="validationPengarang" placeholder="Enter pengarang" required>
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
foreach($pengarang as $pr) : $no++; ?>
<!-- Modal Edit Data-->
<div class="modal fade" id="editPengarang<?= $pr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered tx-rubik" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Pengarang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('pengarang/edit_pengarang/'); ?><?= $pr['id']; ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
           <div class="form-group">
                <label style="margin-left: 22px;" for="validationPengarang">Nama Pengarang</label>
                <input type="hidden" name="id" value="<?= $pr['id']; ?>">
                <input type="text" class="form-control" name="nama_pengarang" id="nama_pengarang" value="<?= $pr['nama_pengarang']; ?>" required>
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