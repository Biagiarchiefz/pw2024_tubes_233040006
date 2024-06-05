

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
