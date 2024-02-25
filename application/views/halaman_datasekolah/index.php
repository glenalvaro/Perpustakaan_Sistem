

<?php foreach($pengaturan as $psg) : ?>

<?php

// CURL API Request Setup Youtube Data
function get_CURL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id='.$psg['channel_id_youtube'].'&key='.$psg['api_key_youtube'].'');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];
$videoCount = $result['items'][0]['statistics']['videoCount'];

// Get Latest Video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key='.$psg['api_key_youtube'].'&channelId='.$psg['channel_id_youtube'].'&maxResults=3&order=date&part=snippet';

$result = get_CURL($urlLatestVideo);
$latestVideoId1 = $result['items'][0]['id']['videoId'];
$latestVideoId2 = $result['items'][1]['id']['videoId'];
$latestVideoId3 = $result['items'][2]['id']['videoId'];

?>

<!-- Sweet Alert -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
   <?php if ($this->session->flashdata('flash')) : ?>
   <?php endif; ?>

<div class="page-inner">
   <div id="main-wrapper">
      <?php foreach($sekolah as $key) : ?>
      <div class="box-custom bg-white mg-b-20 mg-t-30 tx-rubik">
            <div class="media col-md-10 col-lg-8 col-xl-7 pd-30 mx-auto">
                <img src="<?= $youtubeProfilePic; ?>" class="img-thumbnail img-preview d-block rounded-circle hidden-xs" width="100" height="100">
                    <div class="media-body ml-0 ml-md-5">
                        <h4 class="tx-semibold"><?= $channelName; ?></h4>
                        <p class="tx-gray-500">Redhead, Innovator, Saviour of Mankind, Hopeless Romantic, Attractive 20-something Yogurt Enthusiast... <a href="#">Read more</a>
                        </p>
                    <div class="d-flex mg-b-25">
                        <div class="g-ytsubscribe" data-channelid="<?= $psg['channel_id_youtube'] ?>" data-layout="default" data-count="hidden"></div>
                    </div>
                        <a href="#" class="d-inline-block ">
                        <strong><?= $subscriber; ?></strong>
                        <span >Subscriber</span>
                        </a>
                        <a href="#" class="d-inline-block  ml-3">
                        <strong><?= $videoCount; ?></strong>
                        <span >Video</span>
                        </a>
                    </div>
             </div>
                <hr class="m-0">
                    <!--Video Youtube-->
                <div class="row mx-auto clearfix pd-10">
                     <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mg-t-10">
                        <div class="product-thumbnail">
                           <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId1; ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mg-t-10">
                        <div class="product-thumbnail">
                           <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId2; ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                     </div>
                     
                     <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mg-t-10">
                        <div class="product-thumbnail">
                           <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId3; ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                     </div>
                    </div>
               </div>
               
      <div class="flex-grow-1 mg-b-30 tx-rubik">
         <div class="row mt-4 clearfix">
               <div class="col-lg-4 col-xl-3">
                <div class="box-custom mg-b-20">
                     <div class="card-body">
                        <p class="tx-12"><?= $key['nama_sekolah']; ?> adalah salah satu satuan pendidikan dengan jenjang SMK di Rinegetan, Kec. Tondano Barat, Kab. Minahasa, Sulawesi Utara. Dalam menjalankan kegiatannya, <?= $key['nama_sekolah']; ?> berada di bawah naungan Kementerian Pendidikan dan Kebudayaan.</p>
                     </div>
                  </div>
                  
                     <div class="box-custom mg-b-20">
                        <div class="card-header bg-soft-success d-flex align-items-center justify-content-between">
                           <h6 class="tx-12 mg-b-0 ml-2">Detail Sekolah</h6>
                        </div>
                      <a href="javascript:void(0)" class="media align-items-center p-3">
                        <div class="text-center"><span data-feather="airplay"></span></div>
                        <div class="media-body ml-3 tx-medium letter-spacing-1">
                           Akreditasi
                           <div class="tx-gray-500 small"><?= $key['akreditasi']; ?></div>
                        </div>
                      </a>
                      <a href="javascript:void(0)" class="media align-items-center p-3">
                        <div class="text-center"><span data-feather="user"></span></div>
                        <div class="media-body ml-3 tx-medium letter-spacing-1">
                           Kepala Sekolah
                           <div class="tx-gray-500 small"><?= $key['nama_kepsek']; ?></div>
                           <div class="tx-gray-500 small">NIP. &nbsp;<?= $key['nip_kepsek']; ?></div>
                        </div>
                      </a>
                      <a href="javascript:void(0)" class="media align-items-center p-3">
                        <div class="text-center"><span data-feather="user"></span></div>
                        <div class="media-body ml-3 tx-medium letter-spacing-1">
                           Operator
                           <div class="tx-gray-500 small"><?= $key['nama_operator']; ?></div>
                        </div>
                      </a>
                 </div>

                 <div class="box-custom mg-b-20">
                  <div class="card-body pd-15">
                     <h5 class="mg-t-20">Logo Sekolah</h5>
                     <p class="text-muted font-13 mg-b-30"></p>
                     <div class="row justify-content-center">
                        <img src="<?= base_url('assets/images/logo/') . $key['logo']; ?>" class="img-thumbnail img-preview" width="150" height="150">
                     </div>
                     <br>
                  </div>
                  </div>                       
               </div>

<div class="col-lg-8 col-xl-9">
   <div class="box-custom mg-b-20">
         <div class="card-body">
            <div class="media align-items-center mg-t-0 mg-b-20">
                  <div class="media-body lh-2">
                     <span class="tx-18 tx-medium">Informasi Sekolah</span>
                     <p class="tx-gray-500 tx-12 mb-0">School Information</p>
                  </div>  
                  <?php if($user['id_akses'] == 3) : ?>          
                     <div class="text-right">
                        <a href="<?= base_url('sekolah/edit/').$key['id']; ?>" class="dropdown-item"><span data-feather="edit" class="wd-16 mr-2 mb-1"></span>Edit Data</a>
                     </div>
                  <?php endif; ?>

                  <?php if($user['id_akses'] == 1) : ?>          
                     <div class="text-right">
                        <a href="<?= base_url('sekolah/edit/').$key['id']; ?>" class="dropdown-item"><span data-feather="edit" class="wd-16 mr-2 mb-1"></span>Edit Data</a>
                     </div>
                  <?php endif; ?>
            </div>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                  Nama Sekolah
                <span><?= $key['nama_sekolah']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                NPSN
                <span><?= $key['npsn']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Status
                <span><?= $key['status']; ?></span>
              </li>
               <li class="list-group-item d-flex justify-content-between align-items-center">
                Alamat
                <span><?= $key['alamat']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Kelurahan
                <span><?= $key['kelurahan']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Kecamatan
                <span><?= $key['kecamatan']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Kabupaten
                <span><?= $key['kabupaten']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Provinsi
                <span><?= $key['provinsi']; ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Kode Pos
                <span><?= $key['kode_pos']; ?></span>
              </li>
            </ul>
         </div>
      </div>
                    
<div class="box-custom mg-b-20">
   <div class="card-body">
         <div class="media align-items-center mg-t-0 mg-b-20">
            <div class="media-body lh-2">
               <span class="tx-18 tx-medium">Lokasi Sekolah</span>
               <p class="tx-gray-500 tx-12 mb-0">School Location</p>
            </div>
         </div>
         <div id="map-sekolah" style="height: 300px;"></div>
      </div>
</div>
</div>
</div>
</div>
<?php endforeach; ?>
<?php endforeach; ?>
</div>
<div class="hidden-lg mg-b-100"></div>
</div>



<script>
 <?php foreach($sekolah as $sl) : ?>
   const map = L.map('map-sekolah').setView([<?= $sl['latitude']; ?>, <?= $sl['longitude']; ?>], 17);
<?php endforeach; ?>

   const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
   }).addTo(map);

    <?php foreach($sekolah as $j) : ?>
       const marker = L.marker([<?= $j['latitude']; ?>,<?= $j['longitude']; ?>]).addTo(map)
         .bindPopup("<b>Nama Sekolah :  <?= $j['nama_sekolah']; ?></b><br />"+"Alamat : <?= $j['alamat']; ?><br>"+"Akreditasi : <?= $j['akreditasi']; ?>").openPopup();
    <?php endforeach; ?>
    
   map.on('click', onMapClick);

</script>

