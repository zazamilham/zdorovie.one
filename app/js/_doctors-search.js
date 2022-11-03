//поиск по докторам
document.querySelector('#page-doctors__search-input').oninput = function () {
  var val = this.value.trim().toUpperCase();
  // var val = valAll.toLowerCase();
  var doctorName = document.querySelectorAll('.page-doctors__name');
  var doctorSpec = document.querySelectorAll('.page-doctors__spec');


  if (val != '') {
    doctorName.forEach(function (elem) {
      // if (elem.innerText.search(RegExp(val, "gi")) == -1) {
      if (elem.innerText.search(val) == -1) {
        elem.closest('.page-doctors__item').classList.add('page-doctors__item-hide');
        elem.innerHTML = elem.innerText;
      }
      else {
        elem.closest('.page-doctors__item').classList.remove('page-doctors__item-hide');
        let str = elem.innerText;
        elem.innerHTML = insertMark(str, elem.innerText.search(val), val.length);
      }
    });

    doctorSpec.forEach(function (elem) {
      // if (elem.innerText.search(RegExp(val, "gi")) == -1) {
      if (elem.innerText.search(val) == -1) {
        elem.innerHTML = elem.innerText;
      }
      else {
        elem.closest('.page-doctors__item').classList.remove('page-doctors__item-hide');
        let str = elem.innerText;
        elem.innerHTML = insertMark(str, elem.innerText.search(val), val.length);

      }
    });

  }
  else {
    doctorName.forEach(function (elem) {
      elem.closest('.page-doctors__item').classList.remove('page-doctors__item-hide');
      elem.innerHTML = elem.innerText;
    });
    doctorSpec.forEach(function (elem) {
      elem.closest('.page-doctors__item').classList.remove('page-doctors__item-hide');
      elem.innerHTML = elem.innerText;

    });
  }
}

function insertMark(string, pos, len) {
  return string.slice(0, pos) + '<mark>' + string.slice(pos, pos + len) + '</mark>' + string.slice(pos + len);
}