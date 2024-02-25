<style>
   .thumbnail-phone{
    display: flex;
    flex-direction: row;
    background: #fff;
    border: 1px solid #eaedf3;
    box-sizing: border-box;
    box-shadow: 0 1px 3px rgb(0 0 0 / 4%);
    border-radius: 10px;
    margin: 0;
    padding: 20px;
    cursor: pointer;
    position: relative;
    transition: all .3s ease-in-out 0s;
}
.thumbnail-content-phone{
   padding: 0 20px;
    width: 100%;
    min-height: auto;
}
.thumbnail-image-phone{
    width: 100px;
    height: 100px;
    border-radius: 4px;
    overflow: hidden;    
}

.thumbnail-image-phone img{
   object-fit: cover;
   width: 100%;
   height: 100%;
}
.thumbnail-title-phone{
   height: auto;
   margin-bottom: 0;
   font-size: 16px;
   color: #142b72;
}
.thumbnail-content-phone a:hover{
   text-decoration: underline;
   color: #142b72;
}
</style>
<div class="page-inner pd-0-force">
   <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
            <h5 style="color: #4f8fda;" class="tx-14 mg-l-10">Hasil Pencarian</h5>
         <div class="card-body mg-x-10-force">
         <div class="row clearfix">
              <?php foreach($data as $row) : ?>
                     <div class="w-100 p-2">
                        <div class="thumbnail-phone">
                        <div class="thumbnail-image-phone">
                           <img src="<?= base_url('assets/images/cover/') . $row->cover_buku; ?>" alt="<?= $row->judul_buku; ?>">
                        </div>
                        <div class="thumbnail-content-phone">
                           <a href="<?=site_url('transaksi/detail_peminjaman/'.$row->id)?>"><div class="thumbnail-title-phone"><?= $row->judul_buku; ?></div></a>
                           <div class="thumbnail-ket"><p class="tx-12" style="margin-top: 10px;">ISBN : <?= $row->kode_isbn; ?></p></div>
                           <div class="thumbnail-ket"><p class="tx-12">Keterangan : <?= $row->keterangan; ?></p></div>
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