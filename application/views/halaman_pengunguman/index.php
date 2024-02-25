<!-- Sweet Alert -->
   <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
   <?php if ($this->session->flashdata('flash')) : ?>
   <?php endif; ?>

<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="box-custom mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Pengumuman</h6>
               </div>
               <div class="card-body">
                <?php if($user['id_akses'] != 2) : ?>
               		<div class="d-flex align-items-center mg-b-20 ml-2">
                          <a href="<?= base_url('pengunguman/tambah_pengunguman') ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                          <i data-feather="clipboard" class="wd-16 mr-2"></i>&nbsp; Buat Pengumuman
                          </a>
                    </div>
                <?php endif; ?>
               	<?php foreach($pengunguman->result() as $p) : ?>
               	   <div class="media align-items-center">
                        <div class="media-body ml-2">
                            <a href="<?= base_url('pengunguman/detail/').$p->id; ?>" class="tx-15 tx-rubik"><?= $p->judul_pengunguman; ?></a>
                                <div class="my-2">
                                	<p class="tx-rubik"><?= word_limiter($p->isi_pengunguman, 30); ?></p>
                                </div>
                            <div class="tx-13">
                             	<a href="#" class="tx-gray-500 small"><i data-feather="user" class="wd-15 align-middle mr-1"></i>
                                 <?php
                                    if($p->nama_pembuat == 1){
                                        echo "Administrator";
                                    } else if($p->nama_pembuat == 3){
                                        echo "Kepala Sekolah";
                                    }
                                ?>
                                </a>
                                <a href="#" class="tx-gray-500 ml-3 small"><i data-feather="calendar" class="wd-15 align-middle mr-1"></i><?= $p->tgl_pengunguman; ?></a>
                                <?php if($user['id_akses'] != 2) : ?>
                                <a href="<?= base_url('pengunguman/edit/').$p->id; ?>" class="hidden-xs tx-gray-500 ml-3 small"><i data-feather="edit" class="wd-15 align-middle mr-1"></i>Edit</a>
                                <a href="<?= base_url('pengunguman/hapus/'); ?><?= $p->id; ?>" class="tombol-hapus hidden-xs tx-gray-500 ml-3 small"><i data-feather="trash-2" class="wd-15 align-middle mr-1"></i>Hapus</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
               </div>
          </div>
          <nav aria-label="Page navigation">
                <ul class="pagination mg-b-30">
                     <?php echo $halaman_page; ?>
                </ul>
          </nav>
      </div>
   </div>
   <div class="hidden-lg mg-b-100"></div>
</div>

