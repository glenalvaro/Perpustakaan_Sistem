<div class="page-inner pd-0-force">
	<div class="row clearfix mg-x-5-force mg-t-20 tx-rubik">
      <div class="col">
      	<div class="card mg-b-20">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="tx-14 mg-b-0">Export Laporan Perpustakaan</h6>
               </div>
            <div class="card-body pd-25 mg-b-30">  
            	<h4 class="tx-16 mg-b-10">Export Data Buku</h4>
            	<p>Export semua data buku sistem informasi perpustakaan</p>
            	 <a href="<?= base_url('buku/export_buku') ?>"><button type="button" class="btn btn-primary">
            	 	<i class="fa fa-file-excel-o"></i>&nbsp; Export Buku Excel
            	 </button></a>
            	 <hr>
            	 <h4 class="tx-16 mg-b-10">Export Data Anggota</h4>
            	 <p>Export semua anggota perpustakaan</p>
            	 <a href="<?= base_url('anggota/export_anggota') ?>"><button type="button" class="btn btn-info">
            	 	<i class="fa fa-file-excel-o"></i>&nbsp; Export Anggota Excel
            	 </button></a>
            	 <hr>
            	 <h4 class="tx-16 mg-b-10">Export Data Peminjaman</h4>
            	 <p>Export semua data peminjaman buku perpustakaan</p>
            	 <a href="<?= base_url('transaksi/export_peminjaman') ?>"><button type="button" class="btn btn-success">
                <i class="fa fa-file-excel-o"></i>&nbsp; Export Data Peminjaman
               </button></a>
            </div>
        </div>
       </div>
     </div>
     <div class="hidden-lg mg-b-80"></div>
 </div>