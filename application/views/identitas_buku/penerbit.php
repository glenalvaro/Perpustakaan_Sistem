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
                              <h6 class="tx-14 mg-b-0">Data Penerbit</h6>
                          </div>
                        <div class="card-body">
                          <a href="" class="btn btn-social btn-flat btn-info mg-b-20 btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#tambahPenerbit">
                          <i data-feather="user" class="wd-16 mr-2"></i>&nbsp; Tambah Penerbit
                          </a>
                         <table id="table1" class="table table-striped" width="100%">
                              <thead>
                                   <tr>
                                      <th style="color: black;" class="text-center">No</th>
                                      <th style="color: black;" class="text-center">Nama Penerbit</th>
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
<div class="modal fade" id="tambahPenerbit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered tx-rubik" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Penerbit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('penerbit'); ?>" method="post" class="needs-validation" autocomplete="off" novalidate>
           <div class="form-row">
                <div class="col-lg-12 mb-3">
                    <label style="margin-left: 22px;" for="validationPenerbit">Nama Penerbit</label>
                      <input type="text" name="nama_penerbit" class="form-control" id="validationPenerbit" placeholder="Enter penerbit" required>
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
foreach($penerbit as $p) : $no++; ?>
<!-- Modal Edit Data-->
<div class="modal fade" id="editPenerbit<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered tx-rubik" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Penerbit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('penerbit/edit_penerbit/'); ?><?= $p['id']; ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
           <div class="form-group">
                <label style="margin-left: 22px;" for="validationPenerbit">Nama Penerbit</label>
                <input type="hidden" name="id" value="<?= $p['id']; ?>">
                <input type="text" class="form-control" name="nama_penerbit" id="nama_penerbit" value="<?= $p['nama_penerbit']; ?>" required>
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



