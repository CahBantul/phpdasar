<?php 
// koneksi ke database
$db = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
  global $db;
  $result = mysqli_query($db, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

// tambah data
function tambah($data){
  global $db;

  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $noHP = htmlspecialchars($data["noHP"]);

  // upload gambar
  $gambar = upload();

  if(!$gambar) {
    return false;
  };

  $query = "INSERT INTO kontak VALUES ('', '$nama', '$alamat', '$email', '$noHP', '$gambar')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// function upload
function upload() {
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek ada atau tidaknya gambar
  if($error===4) {
    echo "
    <script>
      alert('Pilih Gambar terlebih dahulu');
    </script>";

    return false;
  }

  // cek gambar atau bukan
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar)); 

  if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "
    <script>
      alert('upload hanya file .jpg, .png atau .jpeg');
    </script>";

    return false;
  }

  // cek ukuran gambar
  if($ukuranFile>1000000) {
    echo "
    <script>
      alert('ukuran gambar terlalu besar');
    </script>";

    return false;
  }

  // lolos pengecekan gambar siap diupload
  // generate nama gambar
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
 
  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

  return $namaFileBaru;


};

// hapus data
function hapus($id) {
  global $db;
  mysqli_query($db, "DELETE FROM kontak WHERE id=$id");

  return mysqli_affected_rows($db);
}

// ubah kontak
function ubah($data){
  global $db;

  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $noHP = htmlspecialchars($data["noHP"]);

  $gambarLama = htmlspecialchars($data["gambarLama"]);

  // cek apakah user pilih gambar baru atau tidak
  if($_FILES["gambar"]["error"] === 4 ) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }


  $query = "UPDATE kontak SET nama ='$nama', alamat='$alamat', email='$email', noHP='$noHP', gambar='$gambar' WHERE id= $id";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// cari
function cari($keyword) {
  $query = "SELECT * FROM kontak 
                  WHERE 
              nama LIKE '%$keyword%' OR 
              noHP LIKE '%$keyword%' OR 
              email LIKE '%$keyword%' OR 
              alamat LIKE '%$keyword%'";
  return query($query);
}
?>