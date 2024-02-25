<div class="page-inner pd-0-force">
          <div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
               <div class="col">
                <?php foreach($detail_buku as $main) : ?>
                     <?php 
                     $id = $main->id;
                     $query = "SELECT `tb_buku`.`id`,`nama_kategori`, `judul_buku` FROM `tb_kategori_buku` INNER JOIN `tb_buku` WHERE `tb_kategori_buku`.`kode_kategori`=`tb_buku`.`kategori` and `tb_buku`.`id` = $id";
                     $det_kategori = $this->db->query($query)->row_array();

                  ?>
                   <div class="box-custom mg-b-30">
                          <div class="card-header d-flex align-items-center justify-content-between">
                              <h6 class="tx-14 mg-b-0">Detail Buku <?= $main->judul_buku; ?></h6>
                          </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group ml-2">
                                        <label>Judul Buku</label>
                                        <input type="text" class="form-control" value="<?= $main->judul_buku; ?>" readonly>
                                    </div>

                                     <div class="form-group ml-2">
                                        <label>Penerbit</label>
                                        <input type="text" class="form-control" value="<?= $main->penerbit; ?>" readonly>
                                    </div>
                                    
                                    <div class="form-group ml-2">
                                        <label>Kategori</label>
                                        <input type="text" class="form-control" value="<?= $det_kategori['nama_kategori']; ?>" readonly>
                                    </div>

                                    <div class="form-group ml-2">
                                        <label>Tahun Terbit</label>
                                        <input type="text" class="form-control" value="<?= $main->tahun_terbit; ?>" readonly>
                                    </div>

                                    <div class="form-group ml-2">
                                        <label>Jumlah Halaman Buku</label>
                                        <input type="text" class="form-control" value="<?= $main->jumlah_halaman; ?>" readonly>
                                    </div>

                                    <div class="form-group ml-2">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" value="<?= $main->keterangan; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row justify-content-center">
                                        <img src="<?= base_url('assets/images/cover/') . $main->cover_buku; ?>" class="img-thumbnail" width="150" height="150">
                                    </div>

                                    <div class="form-group mg-t-10 ml-2">
                                        <label>Kode ISBN</label>
                                        <input type="text" class="form-control" value="<?= $main->kode_isbn; ?>" readonly>
                                    </div>

                                     <div class="form-group ml-2">
                                        <label>Pengarang</label>
                                        <input type="text" class="form-control" value="<?= $main->pengarang; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer tx-right">
                            <a href="<?= base_url('buku') ?>"><button class="btn btn-outline-primary">Kembali</button></a>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
     <div class="hidden-lg mg-b-100"></div>
</div>