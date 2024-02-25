<!-- Sweet Alert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('flash')) : ?>
<?php endif; ?>

<div class="page-inner pd-0-force">
          <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
               <div class="col">
                   <div class="card mg-b-30">
                          <div class="card-header d-flex align-items-center justify-content-between">
                              <h6 class="tx-14 mg-b-0">Data Buku Perpustakaan</h6>
                          </div>
                        <div class="card-body">
                            <div class="tx-left mg-b-20">
                              <a href="<?= base_url('buku/tambah_buku') ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                              <i data-feather="book-open" class="wd-12 mr-2"></i>&nbsp; Tambah Buku
                              </a>

                              <div class="btn-group hidden-md hidden-sm hidden-xs">
                                <button type="button" class="btn btn-success btn-flat btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i data-feather="upload" class="wd-12 mr-2"></i>&nbsp; Import/Export Buku
                                </button>
                                <div class="dropdown-menu">
                                   <a href="<?= base_url('buku/import_buku') ?>" class="dropdown-item tx-10"><i data-feather="file-text" class="wd-16 mr-2"></i>Import Buku Excel</a>

                                  <a href="<?= base_url('buku/export_buku') ?>" class="dropdown-item tx-10"><i data-feather="database" class="wd-16 mr-2"></i>Export Buku Excel</a>
                                </div>
                              </div>

                              <a href="" class="btn btn-social btn-flat btn-secondary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hidden-md hidden-sm hidden-xs">
                              <i data-feather="refresh-cw" class="wd-12 mr-2"></i>&nbsp; Perbarui
                              </a>
                              
                              <button type="submit" name="hapus-buku" id="Delete_terpilih" class="btn btn-social btn-flat btn-danger btn-sm btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Ceklis pada data buku yang akan di hapus" disabled="">
                                <i data-feather="trash-2" class="wd-12 mr-2"></i>&nbsp; Hapus Semua Data Terpilih
                            </button>

                            </div>
                            <form method="post" action="<?= base_url('buku/hapus_semuaBuku') ?>" id="delete_all">
                          <table id="table-buku" class="table table-striped" width="100%">
                              <thead>
                                  <tr>
                                      <th>
                                        <input type="checkbox" id="check-book">
                                      </th>
                                      <th style="color: black;" class="text-center">No</th>
                                      <th style="color: black;" class="text-center">Cover Buku</th>
                                      <th style="color: black;" class="text-center">Kode ISBN</th>
                                      <th style="color: black;" class="text-center">Judul Buku</th>
                                      <th style="color: black;" class="text-center">Kategori</th>
                                      <th style="color: black;" class="text-center">Pengarang</th>
                                      <th style="color: black;" class="text-center">Penerbit</th>
                                      <!-- <th style="color: black;" class="text-center">Keterangan</th> -->
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
    <div class="hidden-lg mg-b-100"></div>
</div>