<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Tambah Pengunguman</h6>
               </div>
               <div class="card-body pd-y-20">
               <form action="<?= base_url('pengunguman/tambah_pengunguman') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                   <div class="row">
                     <input type="hidden" name="nama_pembuat" value="<?= $user['id_akses'] ?>">
                     <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span>Judul:</label>
                           <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                                 <input type="text" name="judul_pengunguman" class="form-control" placeholder="Masukkan judul pengunguman">
                                 <ul class="parsley-errors-list filled">
                                    <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('judul_pengunguman'); ?></li>
                                 </ul>
                           </div>
                  </div>
                  <div class="row mg-t-20">
                     <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span>Tanggal Pengunguman</label>
                           <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                                 <input type="date" name="tgl_pengunguman" class="form-control" placeholder="Tgl pengunguman">
                                  <ul class="parsley-errors-list filled">
                                    <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('tgl_pengunguman'); ?></li>
                                 </ul>
                           </div>
                  </div>
                  <div class="row mg-t-20">
                     <label class="col-sm-2 form-control-label"><span class="tx-danger">*</span> Isi Pengunguman:</label>
                        <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                           <textarea id="summernote-text" name="isi_pengunguman"></textarea>
                            <ul class="parsley-errors-list filled">
                                    <li class="parsley-required mg-l-5 mg-t-2"> <?= form_error('isi_pengunguman'); ?></li>
                                 </ul>
                        </div>
                  </div>
               </div>
               <div class="card-footer tx-right mg-b-10 mg-t-10">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">
                            <span>Simpan</span> <i class="ti-location-arrow ml-2"></i>
                        </button> 
                        <a href="<?= base_url('pengunguman') ?>">
                            <button type="button" class="btn btn-info">
                                <span>Batal</span><i class="ti-arrow-left ml-2"></i>
                            </button> 
                        </a>
                    </div>
                </div>
             </form>
         </div>
         <div class="hidden-lg mg-b-100"></div>
      </div>
   </div>
</div>