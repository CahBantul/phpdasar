<?php 
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require "functions.php";

if(isset($_POST["submit"])){

  //cek apakah data berhasil ditambahkan atau tidak
  if(tambah($_POST)>0) {
    echo "
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = 'index.php'
        </script>
    ";
  } else {
    echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href = 'index.php'
        </script>
    ";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Kontak</title>
</head>
<body>
  <h1>Tambah Kontak</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
       <label for="nama">Nama :</label>
       <input type="text" name="nama" id="nama" required>
      </li>
      <li>
        <label for="noHP">No HP :</label>
        <input type="text" name="noHP" id="noHP" required>
      </li>
      <li>
        <label for="alamat">Alamat :</label>
        <input type="text" name="alamat" id="alamat">
      </li>
      <li>
        <label for="email">Email :</label>
        <input type="text" name="email" id="email">
      </li>
      <li>
        <label for="gambar">Gambar :</label>
        <input type="file" name="gambar" id="gambar">
      </li>
      <li>
        <button type="submit" name="submit">Tambah Kontak</button>
      </li>
    </ul>
  </form>
</body>
</html>