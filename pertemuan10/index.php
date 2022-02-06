<?php 
require "functions.php";
$kontak = query("SELECT * FROM kontak");

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
  <h1>Daftar Kontak</h1>
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
      <a href="">ubah</a> |
      <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?');">hapus</a>
    </td>
    <td>
      <img src="<?= $row["gambar"];?>" width="45" alt="">
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