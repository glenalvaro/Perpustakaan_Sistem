// Sweet Alert
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal({
        title: 'Sukses',
        text: flashData,
        type: 'success'
    });
}

// Sweet Alert
const flashGagal = $('.flash-data-gagal').data('flashdata');

if (flashGagal) {
    Swal({
        title: 'Gagal',
        text:  flashGagal,
        type: 'error'
    });
}



// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "Data ini akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

// tombol-hapus terpilih di data anggota
$('#hapus-terpilih').on('click', function (e) {

    e.preventDefault();

    Swal({
        title: 'Hapus data yang diceklis ?',
        text: "Data ini akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
             $("#form-delete").submit();
        }
    })

});


//Hapus data penerbit by id dari table penerbit

function delete_penerbit(id)
{
    const href = "penerbit/hapus_penerbit/"+id

    Swal({
        title: 'Apakah anda yakin',
        text: "Data ini akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
              document.location.href = href;
        }
    })
}


//Hapus data penerbit by id dari table pengarang

function delete_pengarang(id)
{
    const href = "pengarang/hapus_pengarang/"+id

    Swal({
        title: 'Apakah anda yakin',
        text: "Data ini akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
              document.location.href = href;
        }
    })
}

//Hapus data buku by id dari table buku

function delete_buku(id)
{
    const href = "buku/hapus_buku/"+id

    Swal({
        title: 'Apakah anda yakin',
        text: "Data ini akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
              document.location.href = href;
        }
    })
}


// tombol-hapus terpilih di data buku
$('#Delete_terpilih').on('click', function (e) {

    e.preventDefault();

    Swal({
        title: 'Hapus data yang diceklis ?',
        text: "Data ini akan dihapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
             $("#delete_all").submit();
        }
    })

});

//konfirmasi perpanjang transakasi

function perpanjang_transaksi(id)
{
    const href = "riwayat_transaksi/perpanjang_pinjam/"+id

    Swal({
        title: 'Yakin perpanjang ?',
        text: "Perpanjang peminjaman buku, terhitung dari hari sekarang!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Oke'
    }).then((result) => {
        if (result.value) {
              document.location.href = href;
        }
    })
}

//konfirmasi hapus transaksi

function hapus_transaksi(id)
{
    const href = "riwayat_transaksi/hapus_transaksipeminjaman/"+id

    Swal({
        title: 'Hapus data yang ini ?',
        text: "Data transaksi peminjaman akan di hapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'hapus'
    }).then((result) => {
        if (result.value) {
              document.location.href = href;
        }
    })
}