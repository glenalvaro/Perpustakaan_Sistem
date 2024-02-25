<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Edit Info Sistem</h6>
               </div>
               <div class="card-body pd-y-20">
                  <form method="POST" action="<?= base_url('info/edit_info/'); ?><?= $info['id']; ?>" enctype="multipart/form-data">
                    <div class="row">
                     <input type="hidden" name="id" value="<?= $info['id']; ?>">
                     <label class="col-sm-2 form-control-label">Judul :</label>
                           <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                                 <input type="text" name="judul_info" class="form-control" value="<?= $info['judul_info']; ?>">
                                 <ul class="parsley-errors-list filled">
                                    <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('judul_info'); ?></li>
                                 </ul>
                           </div>
                  </div>
                  <div class="row mg-t-20">
                     <label class="col-sm-2 form-control-label">Deskripsi :</label>
                        <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                           <textarea id="summernote-text" name="deskripsi"><?= $info['deskripsi']; ?></textarea>
                            <ul class="parsley-errors-list filled">
                                    <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('deskripsi'); ?>
                                    </li>
                           </ul>
                        </div>
                  </div>
               </div>
               <div class="card-footer tx-right mg-b-10 mg-t-10">
                  <button type="submit" class="btn btn-outline-success btn-sm">Update</button>
                  <a href="<?= base_url('info') ?>"><button type="button" class="btn btn-outline-success btn-sm">Batal</button></a>
               </div>
            </form>
         </div>
      </div>
   </div>
    <div class="hidden-lg mg-b-100"></div>
</div>