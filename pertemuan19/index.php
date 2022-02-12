<?php 
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "functions.php";
$kontak = query("SELECT * FROM kontak");

// tombol cari di klik
if(isset($_POST["cari"])) {
  $kontak = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
</head>
<body>
  <a href="logout.php">logout</a>
  <h1>Daftar Kontak</h1>
  <a href="tambah.php">tambah kontak</a>
  <br><br>

  <form action="" method="post">
    <input type="text" name="keyword" size="30" placeholder="masukkan keyword pencarian..." autocomplete="off" autofocus id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>
  </form>
  <br>
  <div id="container">
</div>
<script src="js/script.js"></script>
</body>
</html>