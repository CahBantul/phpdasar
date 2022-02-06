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
?>