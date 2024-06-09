

const tombolCari = document.querySelector('.tombol');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.data');


// event ketika kita menulis keyword

keyword.addEventListener('keyup', function (){
  
  // jalankan ajax here
  // ajak cara lama xmlhttprequest

  // cara lama
  // const xhr = new XMLHttpRequest();

  // xhr.onreadystatechange = function () {
  //   if (xhr.readyState == 4 && xhr.status == 200) {
  //     container.innerHTML = xhr.responseText;
  //   }

  // };

  // xhr.open('get', 'ajax/ajax_cari.php?keyword=' + keyword.value);
  // xhr.send();

  // cara baruu
  // fetch()
  fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
  .then((response) => response.text())
  .then((response) => (container.innerHTML = response));



});


// priview image untuk tambah data dan update
function previewImage () {
  const gambar = document.querySelector('.album');
  const imgPreview = document.querySelector('.img-preview');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };

}


// function previewImage(event) {
//   const fileInput = event.target;
//   const modalContent = fileInput.closest('.modal-content');
//   const imgPreview = modalContent.querySelector('.img-preview');

//   const oFReader = new FileReader();
//   oFReader.readAsDataURL(fileInput.files[0]);

//   oFReader.onload = function(oFREvent) {
//     imgPreview.src = oFREvent.target.result;
//   };
// }

// document.addEventListener('change', function(event) {
//   if (event.target.matches('.album')) {
//     previewImage(event);
//   }
// });

