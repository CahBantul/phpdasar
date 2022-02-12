// ambil element
const keyword = document.querySelector('#keyword');
const tombolCari = document.querySelector('#tombol-cari');
const container = document.querySelector('#container');

// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', () => {
  // buat object AJAX
  const xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  // eksekusi ajax
  xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
  xhr.send();
});
