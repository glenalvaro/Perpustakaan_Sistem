<!-- Sweet Alert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
   <?php if ($this->session->flashdata('flash')) : ?>
   <?php endif; ?>

<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2">Petunjuk Sistem</h6>
               </div>
               <div class="card-body">
                 <a href="<?= base_url('info/tambah_info') ?>" class="btn btn-social btn-flat btn-info mg-b-20 btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                      <i data-feather="plus" class="wd-16 mr-2"></i>&nbsp; Tambah Petunjuk
                  </a>

                   <?php foreach($info_list as $ptl) : ?>
                   <?php 
                        $kalimat = $ptl['deskripsi'];
                        $jumlahkarakter = 160; 
                        $cetak = substr($kalimat, 0, $jumlahkarakter);
                    ?>
                  <div class="card mg-b-30">
                    <div class="card-body">
                       <div class="media align-items-center">
                        <div class="media-body ml-4">
                            <a href="<?= base_url('info/detail_info/').$ptl['id'] ?>" class="tx-20 tx-semibold"><?= $ptl['judul_info']; ?></a>
                            <div class="my-2">
                                <?= $cetak; ?>...
                            </div>
                            <div class="tx-11">
                                <a href="<?= base_url('info/edit_info/').$ptl['id']; ?>" class="tx-gray-500 small"><i data-feather="edit" class="wd-15 align-middle mr-1"></i>Edit</a>
                                <a href="<?= base_url('info/hapus_info/'); ?><?= $ptl['id']; ?>" class="tombol-hapus tx-gray-500 ml-3 small"><i data-feather="trash-2" class="wd-15 align-middle mr-1"></i>Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php endforeach; ?>   
        </div>
    </div>
</div>
</div>
<div class="hidden-lg mg-b-100"></div>
</div>