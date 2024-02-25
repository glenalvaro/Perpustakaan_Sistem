<div class="page-inner pd-0-force">
    <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="lead mb-0 tx-14">Import data pengarang buku dari file excel, pastikan data yang di import sesuai dengan format yang ada.</p>
                    </div>
                </div>
            </div>
    </div>
          <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
               <div class="col">
                <?= form_open_multipart('pengarang/import_pengarang') ?>
                   <div class="card mg-b-30">
                          <div class="card-header d-flex align-items-center justify-content-between">
                              <h6 class="tx-14 mg-b-0">Import Data Pengarang</h6>
                          </div>
                        <div class="card-body">
                            <div class="col-md-12">
                            <div class="input-group">
                                <label class="input-group-btn file-data">
                                <span class="btn btn-info">
                                    Browse&hellip; <input id="input_data" name="file_pengarang" type="file" style="display: none;" multiple>
                                </span>
                                </label>
                                <input type="text" id="lihat_data" name="file_pengarang" class="form-control" readonly>
                            </div>
                            <ul class="parsley-errors-list filled">
                                            <li class="parsley-required mg-l-5 mg-t-3"> <?= form_error('file_pengarang'); ?></li>
                                         </ul>
                                <span class="help-block">
                                    Download format <a href="<?= base_url('assets/upload/file/format_data_pengarang.xlsx') ?>" style="color: skyblue;" download>format_data_pengarang.xlsx</a>, file yang di izinkan hanya type <span class="tx-danger">.xls</span> dan <span class="tx-danger">.xlsx</span>
                                </span>

                                <br>
                                <br>
                            <small><span> <?= $this->session->flashdata('error_data'); ?></span></small>
                        </div> 
                        </div>
                        <div class="card-footer tx-right">
                            <button type="submit" class="btn btn-outline-primary btn-xs mr-2">Import File</button>
                            <a href="<?= base_url('pengarang'); ?>"><button type="button" class="btn btn-outline-primary btn-xs">Kembali</button></a>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
        </div>
</div>