// ambil element yangdibutuhkan

var keyword = document.getElementById("keyword");
// var cari = document.getElementById("cari");
var container = document.getElementById("container");

// tambahkan event ketika keyword di tulis

keyword.addEventListener("keyup", function () {
  // buat object ajax
  var xhr = new XMLHttpRequest();

  // cek ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };
  // eksekusi ajax
  xhr.open("GET", "../ajax/product.php?keyword=" + keyword.value, true);
  xhr.send();
});
