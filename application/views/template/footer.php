<footer class="page-footer mt-4 hidden-sm hidden-xs hidden-md">
    <div class="pd-t-4 pd-b-0 pd-x-20">
       <div class="tx-gray-500 tx-spacing-1 tx-rubik">
          <p class="pd-y-10 mb-0">SIstem Informasi Perpustakaan &copy; <?= date('Y') ?> |  Created By  <a href="https://rongko13.blogspot.com" target="_blank">GLENDY RONGKO</a></p>
        </div>
    </div>
   </footer>
 </div>
</div>
 
<!-- Scroll To Top Start-->
<!--================================-->	
<a href="" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
<!--/ Scroll To Top End -->
<!-- Setting System -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.js"></script>
 <!-- Dashboard Script -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/popper/popper.js"></script>
<script src="<?= base_url() ?>assets/plugins/feather/feather.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/typeahead/typeahead.js"></script>
<script src="<?= base_url() ?>assets/plugins/typeahead/typeahead-active.js"></script>
<script src="<?= base_url() ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/highlight/highlight.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url() ?>assets/plugins/datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- Script Online -->
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script src="<?= base_url() ?>assets/slick/slick.js?v2022"></script>
<script src="<?= base_url() ?>assets/plugins/ui-item/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/plugins/formatter/jquery.formatter.min.js"></script>
<!-- Chartjs chart Script -->
<script src="<?= base_url() ?>assets/plugins/chartjs/chartjs.js"></script>
<script src="<?= base_url() ?>assets/plugins/chartist/chartist.js"></script>
<script src="<?= base_url() ?>assets/plugins/apex-chart/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/flot/sampledata.js"></script>
<script src="<?= base_url() ?>assets/plugins/ladda/spin.js"></script>
<script src="<?= base_url() ?>assets/plugins/ladda/ladda.js"></script>
<!-- Articles Script -->   
<script src="<?= base_url() ?>assets/plugins/summernote/summernote.min.js"></script>   
<script src="<?= base_url() ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> 
<!-- sweet alert -->
<script src="<?= base_url() ?>assets/js/sweet-alert/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/js/sweet-alert/script.js"></script>
<!-- skeleton loader Script -->
<script src="<?= base_url() ?>assets/plugins/semantic/semantic.min.js"></script> 
<script src="<?= base_url() ?>assets/plugins/prism/prism.js"></script> 
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!--Youtube APi-->
<script src="https://apis.google.com/js/platform.js"></script>
<!-- Required Script -->
<script src="<?= base_url() ?>assets/js/page.js"></script>
<script src="<?= base_url() ?>assets/js/fitur.js"></script>
<script src="<?= base_url() ?>assets/js/customizer.js"></script>
<script src="<?= base_url() ?>assets/js/perpus.js"></script>
<script>
// Menampilkan Data tables server side di table penerbit
 $(document).ready(function () {
    $('#table1').DataTable({
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 10,
        "responsive": true,
        "ordering" : false,
        "lengthChange" : true,
        "info" : true,
        "autoWidth": false,
        "ajax": {
            "url": "<?= site_url('penerbit/get_ajax');  ?>",
            "type": "POST"
        }, 
        "columnDefs": [
            {
                "targets":[0],
                "className": 'text-center'
            }
        ]
    });
});

// Menampilkan Data tables server side di table pengarang
 $(document).ready(function () {
    $('#table2').DataTable({
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 10,
        "responsive": true,
        "ordering" : false,
        "lengthChange" : true,
        "info" : true,
        "autoWidth": false,
        "ajax": {
            "url": "<?= site_url('pengarang/get_server_processing');  ?>",
            "type": "POST"
        }, 
        "columnDefs": [
            {
                "targets":[0],
                "className": 'text-center'
            }
        ]
    });
});

// Menampilkan Data tables server side di table buku
 $(document).ready(function () {
    $('#table-buku').DataTable({
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 10,
        "responsive": true,
        "ordering" : false,
        "lengthChange" : true,
        "info" : true,
        "autoWidth": false,
        "ajax": {
            "url": "<?= site_url('buku/get_data_buku');  ?>",
            "type": "POST"
        }, 
        "columnDefs": [
            {
                "targets":[0, 1, 4, 5, 6],
                "className": 'text-center'
            }
        ],
        "columnDefs" : [
            {
                "targets":[0,2,3,4,5,6,7],
                "className": 'tx-11',
            }

        ]
    });
});

// Menampilkan Data tables server side di table riwayat peminjaman
 $(document).ready(function () {
    $('#table-transaksi').DataTable({
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 10,
        "responsive": true,
        "ordering" : false,
        "lengthChange" : true,
        "info" : true,
        "autoWidth": false,
        "ajax": {
            "url": "<?= site_url('riwayat_transaksi/get_data_peminjaman');  ?>",
            "type": "POST"
        }, 
        "columnDefs": [
            {
                "targets":[0],
                "className": 'text-center'
            }
        ]
    });
});


// Menampilkan Data tables server side di modal pengarang
 $(document).ready(function () {
    $('#modal-pengarang').DataTable({
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 5,
        "responsive": true,
        "ordering" : false,
        "lengthChange" : true,
        "info" : true,
        "autoWidth": false,
        "ajax": {
            "url": "<?= site_url('buku/get_data_pengarang_ajax');  ?>",
            "type": "POST"
        }, 
        "columnDefs": [
            {
                "targets":[0],
                "className": 'text-center'
            }
        ]
    });
});

// Menampilkan Data tables server side di modal penerbit
 $(document).ready(function () {
    $('#modal-penerbit').DataTable({
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 5,
        "responsive": true,
        "ordering" : false,
        "lengthChange" : true,
        "info" : true,
        "autoWidth": false,
        "ajax": {
            "url": "<?= site_url('buku/get_data_penerbit_ajax');  ?>",
            "type": "POST"
        }, 
        "columnDefs": [
            {
                "targets":[0],
                "className": 'text-center'
            }
        ]
    });
});

// Menampilkan Data tables server side di modal siswa
 $(document).ready(function () {
    $('#modal-siswa').DataTable({
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 5,
        "responsive": true,
        "ordering" : false,
        "lengthChange" : true,
        "info" : true,
        "autoWidth": false,
        "ajax": {
            "url": "<?= base_url('riwayat_transaksi/get_siswa_ajax');  ?>",
            "type": "POST"
        }, 
        "columnDefs": [
            {
                "targets":[0],
                "className": 'text-center'
            }
        ]
    });
});

//fungsi memilih siswa
$(document).ready(function() {
$(document).on('click', '#select-siswa', function() {
    document.getElementsByName('nomor_anggota')[0].value = $(this).attr("data-nisn");

      var name = $(this).data('name');
      $('#nama_peminjam').val(name);

      var email = $(this).data('email');
      $('#email_pinjam').val(email);

      $("#Msiswa").removeClass("in");
      $(".modal-backdrop").remove();
      $('body').removeClass('modal-open');
      $('body').css('padding-right', '');
      $("#Msiswa").hide();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('riwayat_transaksi/result_siswa');?>",
            data:'kode_anggota='+$(this).attr("data-nisn"),
            beforeSend: function(){
                $("#result").html("");
                $("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html){
                $("#result").html(html);
                $("#result_tunggu").html('');
            }
        });
     });
});

// fungsi mencari data siswa di data base tambah data peminjaman
$(document).ready(function(){
    $("#search-box").keyup(function(){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('riwayat_transaksi/result_siswa');?>",
            data:'kode_anggota='+$(this).val(),
            beforeSend: function(){
                $("#result").html("");
                $("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html){
                $("#result").html(html);
                $("#result_tunggu").html('');
            }
        });
    });
});


// //Fungsi untuk memilih siswa di tambah transaksi peminjaman
// $(document).ready(function() {
//  $(document).on('click', '#select-siswa', function() {
//     var name = $(this).data('name');
//     $('#nama_peminjam').val(name);

//     var nomor = $(this).data('nisn');
//     $('#nomor_anggota').val(nomor);

//     var email = $(this).data('email');
//     $('#email_pinjam').val(email);
//     // kalau sudah dipilih hilangkan modal
//       $("#Msiswa").removeClass("in");
//       $(".modal-backdrop").remove();
//       $('body').removeClass('modal-open');
//       $('body').css('padding-right', '');
//       $("#Msiswa").hide();
//   });
// });


// Menampilkan Data tables server side di modal judul buku
 $(document).ready(function () {
    $('#modal-judulbuku').DataTable({
        "processing": true,
        "serverSide": true,
        "iDisplayLength": 5,
        "responsive": true,
        "ordering" : false,
        "lengthChange" : true,
        "info" : true,
        "autoWidth": false,
        "ajax": {
            "url": "<?= base_url('riwayat_transaksi/get_buku_ajax');  ?>",
            "type": "POST"
        }, 
        "columnDefs": [
            {
                "targets":[0],
                "className": 'text-center'
            }
        ]
    });
});

//fungsi pilih buku di tambah peminjaman
$(document).ready(function() {
$(document).on('click', '#select-buku', function() {
        document.getElementsByName('isbn')[0].value = $(this).attr("data-kode");

        var name = $(this).data('name');
        $('#judul_buku').val(name);

          $("#Mjudul").removeClass("in");
          $(".modal-backdrop").remove();
          $('body').removeClass('modal-open');
          $('body').css('padding-right', '');
          $("#Mjudul").hide();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('riwayat_transaksi/result_buku');?>",
            data:'kode_buku='+$(this).attr("data-kode"),
            beforeSend: function(){
                $("#result_buku").html("");
                $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html){
                $("#result_buku").html(html);
                $("#result_tunggu_buku").html('');
            }
       });
   });
});

// fungsi cari buku di tambah data peminjaman
    $(document).ready(function(){
        $("#buku-search1").keyup(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('riwayat_transaksi/result_buku');?>",
                data:'kode_buku='+$(this).val(),
                beforeSend: function(){
                    $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
                },
                success: function(html){
                    $("#result_buku").html(html);
                    $("#result_tunggu_buku").html('');
                }
            });
        });
    });

//  //Fungsi untuk memilih buku di tambah transaksi peminjaman
// $(document).ready(function() {
//  $(document).on('click', '#select-buku', function() {
//     var name = $(this).data('name');
//     $('#judul_buku').val(name);

//     var kode = $(this).data('kode');
//     $('#kode_buku').val(kode);
//     // kalau sudah dipilih hilangkan modal
//       $("#Mjudul").removeClass("in");
//       $(".modal-backdrop").remove();
//       $('body').removeClass('modal-open');
//       $('body').css('padding-right', '');
//       $("#Mjudul").hide();
//   });
// });


//Fungsi Format Number
$('#phone-input').formatter({
    'pattern': '+62 {{999}}-{{9999}}-{{9999}}',
    'persistent': true
});

//Fungsi Format NISN Siswa
$('#nisn-input').formatter({
    'pattern': '{{999}}{{999}}{{9999}}',
    'persistent': true
});

//Fungsi Format NIP
$('#nip-input').formatter({
    'pattern': '{{9999}}{{9999}}{{9999}}{{9999}}{{9999}}',
    'persistent': true
});

//Fungsi Format ISBN Buku
$('#isbn-input').formatter({
    'pattern': '{{999}}{{999}}{{9999}}{{999}}',
    'persistent': true
});


// Hapus Data Ceklis di tble anggota
$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
  $("#check-all").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox dengan class "check-item"
    });

//fungsi disabled & enabled tombol
$("input[type=checkbox]").on( "change", function(evt) {
var data = $('input[id=hapus_anggota]:checked');
if(data.length == 0){
  $("button[name=delete]").prop("disabled", true);
    }else{
      $("button[name=delete]").prop("disabled", false);
    }
  });
});


// Hapus Data Ceklis di tble buku
$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
  $("#check-book").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-buku").prop("checked", true); // ceklis semua checkbox dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-buku").prop("checked", false); // un-ceklis semua checkbox dengan class "check-item"
    });

//fungsi disabled & enabled tombol
$("input[type=checkbox]").on( "change", function(evt) {
var data1 = $('input[id=book_data]:checked');
if(data1.length == 0){
  $("button[name=hapus-buku]").prop("disabled", true);
    }else{
      $("button[name=hapus-buku]").prop("disabled", false);
    }
  });
});


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
             // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
             // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
             }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();


//Fungsi untuk memilih pengarang di tambah data buku
$(document).ready(function() {
 $(document).on('click', '#select-pengarang', function() {
    var name = $(this).data('name');
    $('#pengarang_nama').val(name);
    // kalau sudah dipilih hilangkan modal
      $("#Mpengarang").removeClass("in");
      $(".modal-backdrop").remove();
      $('body').removeClass('modal-open');
      $('body').css('padding-right', '');
      $("#Mpengarang").hide();
  });
});


//Fungsi untuk memilih penerbit di tambah data buku
$(document).ready(function() {
 $(document).on('click', '#select-penerbit', function() {
    var name = $(this).data('name');
    $('#penerbit_nama').val(name);
    // kalau sudah dipilih hilangkan modal
      $("#Mpenerbit").removeClass("in");
      $(".modal-backdrop").remove();
      $('body').removeClass('modal-open');
      $('body').css('padding-right', '');
      $("#Mpenerbit").hide();
  });
});

//Fungsi untuk memilih data pengarang input sendiri oleh user
$(document).ready(function() {
 $(document).on('click', '#input-manual', function() {
      $("#Mpengarang").hide();
      $("#input-pengarang").show();
  });

 $('#btnClose').click(function() {
      $("#input-pengarang").removeClass("in");
      $(".modal-backdrop").remove();
      $('body').removeClass('modal-open');
      $('body').css('padding-right', '');
      $("#input-pengarang").hide();
   });
});

//Fungsi untuk memilih data pengarang input otomatis oleh user 
$(document).ready(function() {
 $(document).on('click', '#input-otomatis', function() {
      $("#Mpengarang").show();
      $("#input-pengarang").hide();
  });
});

//jika user menginput manual data pengarang, simpan data tersebut di input
$(document).ready(function(){
    $('#simpan').click(function(){
        var nama = $('#save').val();
        if(nama == ''){
            alert('Data pengarang tidak boleh kosong');
        }else{
        $('#pengarang_nama').val(nama);
        $('#save').val('');
        $("#input-pengarang").removeClass("in");
        $(".modal-backdrop").remove();
        $('body').removeClass('modal-open');
        $('body').css('padding-right', '');
        $("#input-pengarang").hide();
    }
  });
});

//Fungsi untuk memilih data penerbit input sendiri oleh user
$(document).ready(function() {
 $(document).on('click', '#input-manualPenerbit', function() {
      $("#Mpenerbit").hide();
      $("#input-penerbit").show();
  });

 $('#btnClosePenerbit').click(function() {
      $("#input-penerbit").removeClass("in");
      $(".modal-backdrop").remove();
      $('body').removeClass('modal-open');
      $('body').css('padding-right', '');
      $("#input-penerbit").hide();
   });
});


//Fungsi untuk memilih data penerbit input otomatis oleh user 
$(document).ready(function() {
 $(document).on('click', '#input-otomatisPenerbit', function() {
      $("#Mpenerbit").show();
      $("#input-penerbit").hide();
  });
});

//jika user menginput manual data penerbit, simpan data tersebut di input
$(document).ready(function(){
    $('#simpanData').click(function(){
        var nama = $('#savePenerbit').val();
        if(nama == ''){
            alert('Data penerbit tidak boleh kosong')
        }else{
        $('#penerbit_nama').val(nama);
        $('#savePenerbit').val('');
        $("#input-penerbit").removeClass("in");
        $(".modal-backdrop").remove();
        $('body').removeClass('modal-open');
        $('body').css('padding-right', '');
        $("#input-penerbit").hide();
     }
  });
});


//Membaca valu inputan file
$(function() {
  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', '#input_data', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $('#input_data').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});

//Buat fungsi typed js
var typed = new Typed('#search-buku', {
    strings: ['Masukkan judul buku', 'Nama pengarang buku', 'Nama penerbit buku'],
    backSpeed: 50,
    typeSpeed: 50,
    attr: 'placeholder',
    bindInputFocusEvents: false,
    loop: true
});

//slider list buku di transaksi
$(document).ready(function(){
  $(".items").slick({
    infinite: true,
    speed : 300,
    centerMode: false,
    variableWidth: true
   });
});

$(document).ready(function(){
    $('#search-buku').autocomplete({
        source: "<?php echo site_url('transaksi/get_autocomplete');?>",
        delay: 100,
        minLength: 2,
      
    select: function (event, ui) {
        $(this).val(ui.item.label);
        $("#form_search").submit(); 
    }
  });
  $("#search-buku").val(""); //clearn search box
});
</script>


<script type="text/javascript">
    function tampil_button_notif() {
           $.ajax({
                url:"<?= base_url('riwayat_transaksi/untuk_buttonnya') ?>",
                method: 'post',
                dataType: 'json',
                success: function(data)
                {
                    if (data.jumlah_total==0) {
                    $("#button_notif").css("display","none");
                } else if (data.jumlah_total==9) {
                    $("#button_notif").val(data.jumlah_total);
                    console.log(data.jumlah_total)
                    $("#button_notif").fadeIn("fast");
                } else if (data.jumlah_total<9) {
                    $("#button_notif").val(data.jumlah_total);
                    console.log(data.jumlah_total)
                    $("#button_notif").fadeIn("fast");
                } else if (data.jumlah_total>9) {
                     $("#button_notif").val('9+');
                    console.log('9+')
                    $("#button_notif").fadeIn("fast");
                }
            }
            });
          }  
    function load_more(){
    $("#loading").fadeIn("fast");
    $("#loading").fadeOut("fast");
    $("#button_isi").css("display","none");
    tampil_isi_notif();
  }
          function tampil_isi_notif() {
            $("#button_notif").css("display","none");
            $.ajax({
            url:"<?= base_url("riwayat_transaksi/untuk_isinya") ?>",
            success: function(html)
            { 
            $("#button_isi").fadeIn("fast");
            $('#button_isi').html(html);
            }
            });
          }    
          function hilang_badges() {
           $.ajax({
                url:"<?= base_url("riwayat_transaksi/hilangkan_badges") ?>",
                success: function(html)
                {

                }
            });
          }    
</script>

<!-- AMBIL DATA DARI TABLE DATA USER -->
<?php
    //Query SQL
    $query = "select jurusan,COUNT(*) as 'total_user' from tb_user where `id_akses` = 2 GROUP by jurusan";
    $hasil = $this->db->query($query);
    $jurusan= "";
    $jumlah_user=null;

    foreach($hasil->result_array() as $data1) {
        //Mengambil nilai jurusan dari database
        $jr=$data1['jurusan'];
        $jurusan .= "'$jr'". ", ";
        //Mengambil nilai total dari database
        $jml=$data1['total_user'];
        $jumlah_user .= "$jml". ", ";
    }
?> 

<script>
    //grafik anggota perpustakaan berdasarkan jurusan
    var nama_jurusan = [<?= $jurusan; ?>];
    var jumlah_user = [<?= $jumlah_user; ?>];

    var ctx2 = document.getElementById('anggotaChart').getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: nama_jurusan,
            datasets: [{
                data: jumlah_user,
                backgroundColor: ['#EC86AE', '#5D78FF', '#C9D5FA', '#FABA66', '#EE8CE5','#29B0D0', '#CE85CE', '#F07124', '#CE85CE', '#CFF2BC','##63CF72', '#A997CE']
            }]
        },
        options: {
            legend: {
                display: false,
                labels: {
                    display: true,
                }
            },
            title: {
              display: true,
              text: "Grafik Anggota Perpustakaan Berdasarkan Jurusan"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontSize: 10,
                        max: 50
                    }
                }],
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontSize: 10
                    }
                }]
            }
        }
    });
</script>

<!-- AMBIL DATA DARI TABLE PEMINJAMAN -->
<?php
    //Query SQL
    $sql ="select status,COUNT(*) as 'total' from tb_peminjaman GROUP by status order by `id` asc";
    $result = $this->db->query($sql);
    //set variabel
    $jumlah=null;

    foreach($result->result_array() as $data) {
    //Mengambil nilai total dari database
    $jum=$data['total'];
    $jumlah .= "$jum". ", ";
    }
?> 
<script>
    //grafik transaksi peminjaman
     var total_transaksi = [<?= $jumlah; ?>];
     var donut1 = new Chartist.Pie('#transaksiPeminjaman', {
      series: total_transaksi
   }, {
      donut: true,
      donutWidth: 20,
      donutSolid: true,
      startAngle: 20,
      showLabel: true
   });
</script>

<!-- AMBIL DATA DARI TABLE USER BERDASARKAN KELAS -->
<?php
    //Query SQL
    $hsl ="select kelas,COUNT(*) as 'total_kelas' from tb_user where `id_akses` = 2 GROUP by kelas";
    $tampil = $this->db->query($hsl);
    //set variabel
    $jumlah_kelas=null;

    foreach($tampil->result_array() as $row) {
    //Mengambil nilai total masing masing kelas dari database
    $jmlh=$row['total_kelas'];
    $jumlah_kelas .= "$jmlh". ", ";
    }
?> 
<script>
    //grafik user berdasarkan kelas
     var total_kelas = [<?= $jumlah_kelas; ?>];
     var donut2 = new Chartist.Pie('#kelasChart', {
      series: total_kelas
   }, {
      donut: true,
      donutWidth: 20,
      donutSolid: false,
      startAngle: 20,
      showLabel: true
   });
</script>

 <script>
         $(function(){
           'use strict'
         
           $('#datepicker1').datepicker();
         
           $('#datepicker2').datepicker({
             showOtherMonths: true,
             selectOtherMonths: true
           });
         
           $('#datepicker3').datepicker({
             showOtherMonths: true,
             selectOtherMonths: true,
             changeMonth: true,
             changeYear: true
           });
         
           $('#datepicker4').datepicker();
         
           $('#datepicker5').datepicker({
             showButtonPanel: true
           });
         
           $('#datepicker6').datepicker({
             numberOfMonths: 2
           });
         
           var dateFormat = 'mm/dd/yy',
           from = $('#dateFrom')
           .datepicker({
             defaultDate: '+1w',
             numberOfMonths: 2
           })
           .on('change', function() {
             to.datepicker('option','minDate', getDate( this ) );
           }),
           to = $('#dateTo').datepicker({
             defaultDate: '+1w',
             numberOfMonths: 2
           })
           .on('change', function() {
             from.datepicker('option','maxDate', getDate( this ) );
           });
         
           function getDate( element ) {
             var date;
             try {
               date = $.datepicker.parseDate( dateFormat, element.value );
             } catch( error ) {
               date = null;
             }
         
             return date;
           }
         });
</script>