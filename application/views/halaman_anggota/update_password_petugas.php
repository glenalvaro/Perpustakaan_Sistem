<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
         <form method="POST" action="<?= base_url('petugas/update_password_petugas/'); ?><?= $Update['id']; ?>" enctype="multipart/form-data">
           <div class="card mg-b-30">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Update Password Petugas <?= $Update['nama'] ?></h6>
               </div>
               <div class="card-body">
               	<div class="row">
                     <div class="col-md-12 mb-3">
                        <label for="">Email</label>
                        <input type="hidden" name="id" value="<?= $Update['id']; ?>">
                        <input type="text" class="form-control" value="<?= $Update['email'] ?>" readonly>
                     </div>

                     <div class="col-md-12 mb-3">
                        <label for="">Password</label>
                        <input type="password" name="pass_1" id="pass_1" class="form-control" placeholder="Kosongkan jika tidak mengganti password">
                        <ul class="parsley-errors-list filled">
                           <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('pass_1'); ?></li>
                        </ul>
                     </div>

                     <div class="col-md-12 mb-3">
                        <label for="">Ulangi Password</label>
                        <input type="password" name="pass_2" id="pass_2" class="form-control" placeholder="Kosongkan jika tidak mengganti password">
                        <ul class="parsley-errors-list filled">
                           <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('pass_2'); ?></li>
                        </ul>
                     </div>
               </div>
           </div>
           <div class="card-footer tx-right">
              <button type="submit" class="btn btn-outline-info">Update Password</button>
           </div>
        </form>
      </div>
   </div>
   <div class="hidden-lg mg-b-100"></div>
</div>