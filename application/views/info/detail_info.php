<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
          <div class="box-custom mg-b-20">
            <?php foreach($detail_Info as $dp) : ?>
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0 ml-2"><?= $dp->judul_info; ?></h6>
               </div>
               <div class="card-body">
                    <div class="media-body ml-2" style="height: auto;">
                        <div class="my-2">
                            <?= $dp->deskripsi; ?>
                        </div>
                    </div>
               </div>
            <?php endforeach; ?>
                <div class="card-footer" style="height: 70px;">
                    <div class="tx-left tx-13 mg-t-15">
                        <a href="<?= base_url('info'); ?>" class="tx-twitter"><span data-feather="chevrons-left"></span> Semua Info</a>
                    </div>
                </div>
          </div>
      </div>
   </div>
   <div class="hidden-lg mg-b-100"></div>
</div>