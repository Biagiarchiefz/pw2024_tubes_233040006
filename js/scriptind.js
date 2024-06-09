

const tombolCarius = document.querySelector('.tombolus');
const keywordus = document.querySelector('.keywordus');
const containerus = document.querySelector('.dataus');

keywordus.addEventListener('keyup', function (){

  fetch('ajax/ajax_cari_index1.php?keyword=' + keywordus.value)
  .then((response) => response.text())
  .then((response) => (containerus.innerHTML = response));


});



