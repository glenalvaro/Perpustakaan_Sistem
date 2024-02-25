<div class="page-inner pd-0-force">
    <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="lead mb-0 tx-14">Import data buku perpustakaan dari file excel, pastikan data yang di import sesuai dengan format yang ada.</p>
                    </div>
                </div>
            </div>
    </div>
          <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
               <div class="col">
                <?= form_open_multipart('buku/import_buku') ?>
                   <div class="card mg-b-30">
                          <div class="card-header d-flex align-items-center justify-content-between">
                              <h6 class="tx-14 mg-b-0">Import Buku Perpustakaan</h6>
                          </div>
                        <div class="card-body">
                            <div class="col-md-12">
                            <div class="input-group">
                                <label class="input-group-btn file-data">
                                <span class="btn btn-primary">
                                    Browse&hellip; <input id="input_data" name="file_excel" type="file" style="display: none;" multiple>
                                </span>
                                </label>
                                <input type="text" id="lihat_data" name="file_excel" class="form-control" readonly>
                            </div>
                            <ul class="parsley-errors-list filled">
                                            <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('file_excel'); ?></li>
                                         </ul>
                                <span class="help-block">
                                    Download format <a href="<?= base_url('assets/upload/file/format_data_buku.xlsx') ?>" style="color: skyblue;" download>format_data_buku.xlsx</a>, file yang di izinkan hanya type <span class="tx-danger">.xls</span> dan <span class="tx-danger">.xlsx</span>
                                </span>

                                <br>
                                <br>
                            <small><span> <?= $this->session->flashdata('error_file'); ?></span></small>
                        </div> 
                        </div>
                         <div class="card-footer tx-right mg-b-10 mg-t-10">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">
                                    <span>Import Buku</span> <i class="ti-import ml-2"></i>
                                </button> 
                                <a href="<?= base_url('buku') ?>">
                                    <button type="button" class="btn btn-info">
                                        <span>Batal</span><i class="ti-arrow-left ml-2"></i>
                                    </button> 
                                </a>
                            </div>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
        </div>
</div>