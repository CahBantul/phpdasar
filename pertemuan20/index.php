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
  <style>
    .loader {
      width: 25px;
      position: absolute;
      left: 270px;
      top: 140px;
      display: none;
    }
  </style>
</head>
<body>
  <a href="logout.php">logout</a>
  <h1>Daftar Kontak</h1>
  <a href="tambah.php">tambah kontak</a>
  <br><br>

  <form action="" method="post">
    <input type="text" name="keyword" size="30" placeholder="masukkan keyword pencarian..." autocomplete="off" autofocus id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>

    <img src="img/loader.gif" class="loader">
  </form>
  <br>
  <div id="container">
      <table border="1" cellpadding="10" cellspacing="0">
        <tr>
          <th>No</th>
          <th>Aksi</th>
          <th>Foto</th>
          <th>Nama</th>
          <th>No HP</th>
          <th>Alamat</th>
          <th>Email</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach ($kontak as $row) :?>
          
        <tr>
          <td><?= $i; ?></td>
          <td>
            <a href="ubah.php?id=<?= $row["id"];?>">ubah</a> |
            <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?');">hapus</a>
          </td>
          <td>
            <img src="img/<?= $row["gambar"];?>" width="60" >
          </td>
          <td><?= $row["nama"]; ?></td>
          <td><?= $row["noHP"]; ?></td>
          <td><?= $row["alamat"]; ?></td>
          <td><?= $row["email"]; ?></td>
          <?php $i++; ?>
        </tr>
        <?php endforeach; ?>

      </table>
  </div>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>