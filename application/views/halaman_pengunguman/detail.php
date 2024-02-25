<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="box-custom mg-b-20">
            <?php foreach($detail as $d) : ?>
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2"><?= $d->judul_pengunguman; ?></h6>
               </div>
               <div class="card-body">
                    <div class="media-body ml-2" style="height: 380px;">
                        <div class="my-2">
                            <?= $d->isi_pengunguman; ?>
                        </div>
                        <div class="tx-13">
                        <a href="" class="tx-gray-500 small"><i data-feather="user" class="wd-15 align-middle mr-1"></i>
                        <?php
                            if($d->nama_pembuat == 1){
                                echo "Administrator";
                            } else if($d->nama_pembuat == 3){
                                echo "Kepala Sekolah";
                            }
                        ?>
                        </a>
                        <a href="" class="tx-gray-500 ml-3 small"><i data-feather="calendar" class="wd-15 align-middle mr-1"></i><?= $d->tgl_pengunguman; ?></a>
                        <a href="" class="tx-gray-500 ml-3 small"><i data-feather="clock" class="wd-15 align-middle mr-1"></i><?= $d->jam; ?></a>
                        </div>
                    </div>
               </div>
            <?php endforeach; ?>
                <div class="card-footer" style="height: 70px;">
                    <div class="tx-left tx-13 mg-t-15">
                        <a href="<?= base_url('pengunguman'); ?>" class="tx-twitter"><span data-feather="chevrons-left"></span> Semua Pengunguman</a>
                    </div>
                </div>
          </div>
      </div>
   </div>
   <div class="hidden-lg mg-b-100"></div>
</div>