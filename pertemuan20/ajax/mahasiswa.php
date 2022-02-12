<?php 
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM kontak WHERE 
nama LIKE '%$keyword%' OR 
noHP LIKE '%$keyword%' OR 
email LIKE '%$keyword%' OR 
alamat LIKE '%$keyword%'";

$kontak = query($query);
?>

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