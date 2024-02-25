//Fungsi Hide/Show Password di ganti password
$(document).ready(function () {
    var tampilPass = document.querySelector('#tampilPass');
    var password_lama = document.querySelector('#password_lama');
        var password1 = document.querySelector('#new_password1');
        var password2 = document.querySelector('#new_password2');
        tampilPass.addEventListener('click', function (e) {
         // toggle the type attribute
         var type = password_lama.getAttribute('type') === 'password' ? 'text' : 'password';
          password_lama.setAttribute('type', type);
          var type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
          password1.setAttribute('type', type);
          var type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
          password2.setAttribute('type', type);
    });
});

//menu aktif
"use strict";

var path = location.pathname.split('/')
var url = location.origin + '/' + path[1] + '/' + path[2]
$('ul.accordion-menu li a').each(function(){
    if($(this).attr('href').indexOf(url) !== -1){
     $(this).parent().addClass('active').parent().parent('li').addClass('open active').parent().parent('li').addClass('active')
    }
})


//Data-tables
$(function() {
    $('#datatables').dataTable({
    "iDisplayLength": 10,
    "responsive": true,
    "ordering" : false,
    "lengthChange" : true,
    "info" : true,
    "autoWidth": true
    });         
});

//Select 2
$(function () {
    $('.selectpicker').selectpicker();
});

//Full Summernote Editor
$('#summernote-text').summernote({
addclass: {
            debug: false,
            classTags: [{title:"Button","value":"btn btn-success"},"jumbotron", "lead","img-rounded","img-circle", "img-responsive","btn", "btn btn-success","btn btn-danger","text-muted", "text-primary", "text-warning", "text-danger", "text-success", "table-bordered", "table-responsive", "alert", "alert alert-success", "alert alert-info", "alert alert-warning", "alert alert-danger", "visible-sm", "hidden-xs", "hidden-md", "hidden-lg", "hidden-print"]
          },
            height: 150,
            toolbar: [
// [groupName, [list of button]]
['para_style', ['style']],
['style', ['bold', 'italic', 'underline', 'clear']],
['font', ['strikethrough', 'superscript', 'subscript']],
['fontsize', ['fontname', 'fontsize', 'height']],
['color', ['color']],
['para', ['ul', 'ol', 'paragraph', 'hr']],
['table', ['table']],
['insert', ['link', 'picture', 'video']],
['do', ['undo', 'redo']],
['misc', ['fullscreen', 'codeview', 'help']]
         
    ]
}); 
         
//Tags
$('#bs-tagsinput-primary').tagsinput({ tagClass: 'badge badge-primary' });     

//Datetimepicker boostrap
 $(function() {
    $('#dtp-date').bootstrapMaterialDatePicker({
      weekStart: 0,
      time: false,
      clearButton: false,
      format : 'DD MMMM YYYY'
    });

    $('#dtp-time').bootstrapMaterialDatePicker({
      date: false,
      shortTime: false,
      format: 'HH:mm'
    });

    $('#dtp-datetime').bootstrapMaterialDatePicker({
      weekStart: 1,
      format : 'dddd DD MMMM YYYY - HH:mm',
      shortTime: true,
      nowButton : true,
      minDate : new Date()
    });
  });

//Buat fungsi typed js
var typed = new Typed('#search-input', {
    strings: ['Masukkan judul buku', 'Nama penulis buku', 'Nama pengarang buku'],
    backSpeed: 50,
    typeSpeed: 50,
    attr: 'placeholder',
    bindInputFocusEvents: false,
    loop: true
});

//fungsi loading pada tombol
 $(function() {
    // Bind normal buttons
    Ladda.bind( '.button-demo button', { timeout: 2000 } );

    // Bind progress buttons and simulate loading progress
    Ladda.bind( '.progress-demo button', {
      callback: function( instance ) {
        var progress = 0;
        var interval = setInterval( function() {
          progress = Math.min( progress + Math.random() * 0.1, 1 );
          instance.setProgress( progress );

          if( progress === 1 ) {
            instance.stop();
            clearInterval( interval );
          }
        }, 200 );
      }
    } );
  });


//Fungsi Baca Buku
//Konek api book google
$(document).ready(function() {
  var item, tile, author, publisher, bookLink, bookImg;
  var outputList = document.getElementById("list-output");
  var bookUrl = "https://www.googleapis.com/books/v1/volumes?q=";
  var apiKey21 = "key=AIzaSyDtXC7kb6a7xKJdm_Le6_BYoY5biz6s8Lw";
  var apiKey = "key=AIzaSyAhAud0hWOJUHQcufduViFpRW_uT45yWhA";
  var placeHldr = '<img src="https://via.placeholder.com/110">';
  var searchData;

  //listener for search button
  $("#search-book").click(function() {
    outputList.innerHTML = ""; //empty html output
    document.body.style.backgroundImage = "url('')";
     searchData = $("#search-input").val();
     //handling empty search input field
     if(searchData === "" || searchData === null) {
       displayError();
     }
    else {
       // console.log(searchData);
       // $.get("https://www.googleapis.com/books/v1/volumes?q="+searchData, getBookData()});
       $.ajax({
          url: bookUrl + searchData,
          dataType: "json",
          success: function(response) {
            console.log(response)
            var total = response.totalItems;
            if (response.totalItems === 0) {
                $('#hasil').html(`<h2 class="text-center tx-gray-500 tx-18">Hasil Pencarian</h2>`);
                $('#list-output').html(`<center><h5>Data buku tidak ditemukan</h5></center>`);
            }
            else {
                $('#result-response').html(`
                    <span class="tx-gray-500 tx-16 mg-b-30 d-block">
                        Pencarian untuk <strong>`+ searchData +`</strong>
                        <small class="tx-italic tx-gray-500"> __About `+ total +` hasil</small>
                    </span>
                `);
                $('#hasil').html(`<h2 class="text-center tx-gray-500 tx-18">Hasil Pencarian</h2>`);
                $("#title").animate({'margin-top': '5px'}, 1000); //search box animation
                $(".book-list").css("visibility", "visible");
                displayResults(response);
            }
          },
          error: function () {
           // alert("Masukan jika tidak ada internet !")
               var alert =`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error! </strong>&nbsp; pastikan anda terhubung ke internet !
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ti-close tx-16"></i></span>
                  </button>
                </div>`;

            $('.no-connection').html(alert); /* alert container class ".alert-container" */
            setTimeout(function(){ /* show the alert for 3sec and then reload the page. */
              location.reload();
            },2000);
          }
        });
      }
      $("#search-input").val(""); //clearn search box
   });

   /*
   * function to display result in index.html
   * @param response
   */
   function displayResults(response) {
      for (var i = 0; i < response.items.length; i+=2) {
        item = response.items[i];
        title1 = item.volumeInfo.title;
        author1 = item.volumeInfo.authors;
        publisher1 = item.volumeInfo.publisher;
        description1 = item.volumeInfo.description;
        bookLink1 = item.volumeInfo.previewLink;
        bookIsbn = item.volumeInfo.industryIdentifiers[1].identifier
        bookImg1 = (item.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail : placeHldr ;

        item2 = response.items[i+1];
        title2 = item2.volumeInfo.title;
        author2 = item2.volumeInfo.authors;
        publisher2 = item2.volumeInfo.publisher;
        description2 = item2.volumeInfo.description;
        bookLink2 = item2.volumeInfo.previewLink;
        bookIsbn2 = item2.volumeInfo.industryIdentifiers[1].identifier
        bookImg2 = (item2.volumeInfo.imageLinks) ? item2.volumeInfo.imageLinks.thumbnail : placeHldr ;

        // in production code, item.text should have the HTML entities escaped.
        outputList.innerHTML += '<div class="row mt-4">' +
                                formatOutput(bookImg1, title1, author1, publisher1, description1, bookLink1, bookIsbn) +
                                formatOutput(bookImg2, title2, author2, publisher2, description2, bookLink2, bookIsbn2) +
                                '</div>';

        console.log(outputList);
      }
   }

   /*
   * card element formatter using es6 backticks and templates (indivial card)
   * @param bookImg title author publisher bookLink
   * @return htmlCard
   */

   function formatOutput(bookImg, title, author, publisher, description, bookLink, bookIsbn) {
   var viewUrl = './assets/detail_buku.html?isbn='+bookIsbn;
   var htmlCard = `
      <div class="col-12">
            <div class="box-custom mg-b-30">
                <div class="card-body">
                    <div class="media align-items-center">
                         <div class="d-flex flex-column justify-content-center align-items-center">
                             <img src="${bookImg}" class="img-fluid" alt="cover-book">
                        </div>
                        <div class="media-body ml-4 mt-10 mb-10">
                        <a href="${viewUrl}" class="tx-20 tx-semibold">${title}</a>
                        <div class="my-2">
                            
                        </div>
                        <div class="tx-13 mg-b-10">
                            <a href="#" class="tx-gray-500 small"><i class="fa fa-book align-middle mr-1"></i>${publisher}</a>
                            <a href="#" class="tx-gray-500 ml-3 small"><i class="fa fa-user-circle-o align-middle mr-1"></i>${author}</a>
                        </div>
                          <a target="_blank" href="${viewUrl}" class="btn btn-secondary">Baca Buku</a>
                    </div>
                </div>
            </div>
        </div>
    </div>`
return htmlCard;
}

   //handling error for empty search box
   function displayError() {
     // alert("Masukan jika nama pencarian kosong !")
       var alert =`<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Masukkan </strong> nama pencarian !
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ti-close tx-16"></i></span>
          </button>
        </div>`;

    $('.alert-gagal').html(alert); /* alert container class ".alert-container" */
    setTimeout(function(){ /* show the alert for 3sec and then reload the page. */
      location.reload();
    },2000);

   }

});

//Fungsi Preview Gambar Saat Upload
function previewGmb() {
    var sampul = document.querySelector("#image");
    var sampulLabel = document.querySelector(".custom-file-input");
    var imgPreview = document.querySelector(".img-preview");

    sampulLabel.textContent = sampul.files[0].name;

    var fileSampul = new FileReader();
    fileSampul.readAsDataURL(sampul.files[0]);

    fileSampul.onload = function (e) {
        imgPreview.src = e.target.result;
    };
}

// Input / Browse file

$('.custom-file-input').on('change', function () {
    var fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});