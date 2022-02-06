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
  $gambar = htmlspecialchars($data["gambar"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $noHP = htmlspecialchars($data["noHP"]);

  $query = "INSERT INTO kontak VALUES ('', '$nama', '$alamat', '$email', '$noHP', '$gambar')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

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
  $gambar = htmlspecialchars($data["gambar"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $noHP = htmlspecialchars($data["noHP"]);
  echo($gambar);

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