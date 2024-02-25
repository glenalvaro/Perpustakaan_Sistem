<div class="page-inner pd-0-force">
	<div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
      	<div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0">Ganti Password</h6>
               </div>
            <div class="card-body pd-25"> 
            <small><span><?= $this->session->flashdata('pesan'); ?></span></small>  
            <form action="<?= base_url('profile/ganti_password') ?>" method="post" class="form-horizontal"> 
                 <div class="media d-block d-flex">
                     <div class="media-body">
                     	<div class="form-group">
                        	<input type="password" name="password_lama" id="password_lama" class="custom-form form-control" placeholder="Masukkan Password Lama" value="<?= set_value('password_lama') ?>">
                        	<ul class="parsley-errors-list filled">
                  				<li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('password_lama'); ?></li>
               				</ul>
                        </div>
                        <div class="form-group">
                        	<input type="password" name="new_password1" id="new_password1" class="custom-form form-control" placeholder="Masukkan Password Baru" value="<?= set_value('new_password1') ?>">
                        	<ul class="parsley-errors-list filled">
                  				<li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('new_password1'); ?></li>
               				</ul>
                        </div>
                        <div class="form-group">
                        	<input type="password" name="new_password2" id="new_password2" class="custom-form form-control" placeholder="Ulangi Password Baru" value="<?= set_value('new_password2') ?>">
                        	<ul class="parsley-errors-list filled">
                  				<li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('new_password2'); ?></li>
               				</ul>
                        </div>
                        <hr>
                     </div>
                  </div>
                 <div class="custom-control custom-checkbox">
	                <input type="checkbox" class="form-check-input" id="tampilPass">
	                <label class="label tx-gray-500" for="tampilPass">&nbsp; Tampilkan Kata Sandi</label>
         		</div>
         		<div class="footer-button">
         			<button type="submit" class="btn btn-primary btn-sm">Ganti Password</button> 
         			<a href="<?= base_url('profile') ?>"><button type="button" class="btn btn-outline-primary btn-sm">Batal</button></a>
         		</div>
         	</form> 
            </div>
         </div>
      </div>
  </div>
</div>