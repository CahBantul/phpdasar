<?php 
session_start();

if(!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "functions.php";

// pagination
// konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM kontak"));
$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["p"])) ? $_GET["p"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$kontak = query("SELECT * FROM kontak LIMIT $awalData, $jumlahDataPerHalaman");

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
    <input type="text" name="keyword" size="30" placeholder="masukkan keyword pencarian..." autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari!</button>
  </form>

  <!-- navigasi -->
  <?php if($halamanAktif > 1) : ?>
    <a href="?p=<?= $halamanAktif - 1; ?>">&laquo;</a>
  <?php endif; ?>

  <?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
    <?php if($i == $halamanAktif) : ?>
    <a href="?p=<?=$i?>" style="font-weight: bold; color:red;"><?= $i; ?></a>
    <?php else : ?>
      <a href="?p=<?=$i?>"><?= $i; ?></a>
    <?php endif; ?>
  <?php endfor ?>

  <?php if($halamanAktif < $jumlahHalaman) : ?>
    <a href="?p=<?= $halamanAktif + 1; ?>">&raquo;</a>
  <?php endif; ?>


  <br>
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
</body>
</html>