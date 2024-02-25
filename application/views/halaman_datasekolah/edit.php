<div class="page-inner">
   <div id="main-wrapper">
       <form method="POST" action="<?= base_url('sekolah/edit/'); ?><?= $sekolah_edit['id']; ?>" enctype="multipart/form-data">
      <div class="flex-grow-1 mg-b-30 tx-rubik">
         <div class="row mt-4 clearfix">
               <div class="col-lg-4 col-xl-3">
                     <div class="card mg-b-20">
                        <div class="card-header bg-soft-success d-flex align-items-center justify-content-between">
                           <h6 class="tx-12 mg-b-0 ml-2">Kordinat Sekolah</h6>
                        </div>
                         <div class="form-group mt-4">
                              <label class="col-sm-12 control-label">Latitude :</label>
                          <div class="col-sm-12">
                            <input type="text" id="Lat" name="latitude" value="<?= $sekolah_edit['latitude']; ?>" class="form-control input-sm" readonly>
                          </div>
                        </div>

                        <div class="form-group mg-b-20">
                              <label class="col-sm-12 control-label">Longitude :</label>
                          <div class="col-sm-12">
                            <input type="text" id="Long" name="longitude" value="<?= $sekolah_edit['longitude']; ?>" class="form-control input-sm" readonly>
                              <p style="font-size:10px; margin-top: 10px; font-style: italic;" class="tx-danger">* Terisi otomatis, bila menggeser icon pada peta</p>
                          </div>
                        </div>
                     </div>

                  <div class="card mg-b-20 bg-primary">
                     <div class="card-body">
                        <p class="lead mb-0 tx-12 tx-white">Ubah data sekolah <?= $sekolah_edit['nama_sekolah']; ?></p>
                     </div>
                  </div>

                 <div class="card mg-b-20">
                  <div class="card-body pd-15">
                     <h5 class="mg-t-20">Logo</h5>
                     <p class="text-muted font-13 mg-b-30">Tambahkan logo sekolah</p>
                     <div class="row justify-content-center">
                        <img src="<?= base_url('assets/images/logo/') . $sekolah_edit['logo']; ?>" class="img-thumbnail img-preview" width="150" height="150">
                     </div>
                     <div class="input-group mg-t-20 mg-b-20">
                           <div class="custom-file" title="Klik untuk memilih foto">
                              <input type="file" class="custom-file-input" id="image" name="image" onchange="previewGmb()">
                              <label class="custom-file-label">Pilih Logo</label>
                           </div>
                     </div>
                     <p class="tx-10 text-center">Ukuran Maks 1048 kb, type jpg | png | jpeg</p>
                  </div>
                  </div>                       
               </div>

<div class="col-lg-8 col-xl-9">
   <div class="card mg-b-20">
         <div class="card-body">
            <div class="media align-items-center mg-t-0 mg-b-20">
                  <div class="media-body lh-2">
                     <span class="tx-18 tx-medium">Lokasi Sekolah</span>
                     <p class="tx-gray-500 tx-12 mb-0">School Location</p>
                  </div>
            </div>
               <div id="map-sekolahDrag" style="height: 300px;"></div>
               <p style="font-size:10px; margin-top: 10px; font-style: italic;" class="tx-danger">* Geser icon lokasi pada peta.</p>
         </div>
      </div>
                    
<div class="card mg-b-20">
   <div id="app" class="card-body">
         <div class="media align-items-center mg-t-0 mg-b-20">
            <div class="media-body lh-2">
               <span class="tx-18 tx-medium">Informasi Sekolah</span>
               <p class="tx-gray-500 tx-12 mb-0">School Information</p>
            </div>
         </div>
            <div class="form-group mt-2">
               <h3 class="tx-14 ml-3">Data</h3>
               <input type="hidden" name="id" value="<?= $sekolah_edit['id']; ?>">
               <label class="col-sm-12 control-label">Nama Sekolah :</label>
               <div class="col-sm-12">
                  <input type="text" id="nama_sekolah" name="nama_sekolah" value="<?= $sekolah_edit['nama_sekolah']; ?>" class="form-control input-sm">
                     <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('nama_sekolah'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-12 control-label">NPSN :</label>
               <div class="col-sm-12">
                  <input type="text" id="npsn" name="npsn" value="<?= $sekolah_edit['npsn']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('npsn'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-12 control-label">Status :</label>
               <div class="col-sm-12">
                  <input type="text" id="status" name="status" value="<?= $sekolah_edit['status']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('status'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-12 control-label">Akreditas :</label>
               <div class="col-sm-12">
                  <input type="text" id="akreditasi" name="akreditasi" value="<?= $sekolah_edit['akreditasi']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('akreditasi'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-12 control-label">Nama Kepala Sekolah :</label>
               <div class="col-sm-12">
                  <input type="text" id="nama_kepsek" name="nama_kepsek" value="<?= $sekolah_edit['nama_kepsek']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('nama_kepsek'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-12 control-label">NIP Kepala Sekolah :</label>
               <div class="col-sm-12">
                  <input type="text" id="nip-input" name="nip_kepsek" value="<?= $sekolah_edit['nip_kepsek']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('nip_kepsek'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-12 control-label">Operator Sekolah :</label>
               <div class="col-sm-12">
                  <input type="text" id="nama_operator" name="nama_operator" value="<?= $sekolah_edit['nama_operator']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('nama_operator'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <h3 class="tx-14 ml-3">Alamat</h3>
               <label class="col-sm-12 control-label">Alamat Sekolah :</label>
               <div class="col-sm-12">
                  <input type="text" id="alamat" name="alamat" value="<?= $sekolah_edit['alamat']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('alamat'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-12 control-label">Desa / Kelurahan :</label>
               <div class="col-sm-12">
                  <input type="text" id="kelurahan" name="kelurahan" value="<?= $sekolah_edit['kelurahan']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('kelurahan'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-12 control-label">Kecamatan :</label>
               <div class="col-sm-12">
                  <input type="text" id="kecamatan" name="kecamatan" value="<?= $sekolah_edit['kecamatan']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('kecamatan'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-12 control-label">Kabupaten :</label>
               <div class="col-sm-12">
                  <input type="text" id="kabupaten" name="kabupaten" value="<?= $sekolah_edit['kabupaten']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('kabupaten'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-12 control-label">Provinsi :</label>
               <div class="col-sm-12">
                  <input type="text" id="provinsi" name="provinsi" value="<?= $sekolah_edit['provinsi']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('provinsi'); ?></li>
                     </ul>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-12 control-label">Kode Pos :</label>
               <div class="col-sm-12">
                  <input type="text" id="kode_pos" name="kode_pos" value="<?= $sekolah_edit['kode_pos']; ?>" class="form-control input-sm">
                  <ul class="parsley-errors-list filled">
                        <li class="parsley-required mg-l-3 mg-t-2"> <?= form_error('kode_pos'); ?></li>
                     </ul>
               </div>
            </div>
      </div>
       <div class="card-footer tx-right mg-b-10 mg-t-10">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">
                            <span>Simpan Perubahan</span> <i class="ti-location-arrow ml-2"></i>
                        </button> 
                        <a href="<?= base_url('sekolah') ?>">
                            <button type="button" class="btn btn-info">
                                <span>Batal</span><i class="ti-arrow-left ml-2"></i>
                            </button> 
                        </a>
                    </div>
       </div>
</div>
</div>
</div>
</div>
</div>
</form>
<div class="hidden-lg mg-b-100"></div>
</div>

<!-- Load jquery untuk peta -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.js"></script>

<!-- load peta di form edit-->
<script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
  curLocation =[<?= $sekolah_edit['latitude']; ?>, <?= $sekolah_edit['longitude']; ?>]; 
}

var edit_map = L.map('map-sekolahDrag').setView([<?= $sekolah_edit['latitude']; ?>, <?= $sekolah_edit['longitude']; ?>], 17);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>,' +
      'Sistem Perpustakaan © <a href="https://www.mapbox.com/">Mapbox</a>'
}).addTo(edit_map);

edit_map.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
  draggable:'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
  draggable : 'true'
  }).bindPopup(position).update();
  $("#Lat").val(position.lat);
  $("#Long").val(position.lng).keyup();
});

$("#Lat, #Long").change(function(){
  var position =[parseInt($("#Lat").val()), parseInt($("#Long").val())];
  marker.setLatLng(position, {
  draggable : 'true'
  }).bindPopup(position).update();
  edit_map.panTo(position);
});
edit_map.addLayer(marker);

</script>