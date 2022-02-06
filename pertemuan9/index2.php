<?php 
// koneksi ke database
$db = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel kontak / query data kontak
$result = mysqli_query($db, "SELECT * FROM kontak");

// ambil data (fetch) kontak dari object result
// msqli_fetch_row() // mengembalikan array numerik
// $kontak = mysqli_fetch_row($result);
// var_dump($kontak[2]);

// msqli_fetch_assoc() // mengembalikan array associative
// $kontak = mysqli_fetch_assoc($result);
// var_dump($kontak["noHP"]);

// msqli_fetch_array() // mengembalikan array numerik dan associative
// $kontak = mysqli_fetch_array($result);
// var_dump($kontak["noHP"]);

// msqli_fetch_object() // mengembalikan object
// $kontak = mysqli_fetch_object($result);
// var_dump($kontak->nama);

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
  <?php while($row = mysqli_fetch_assoc($result)) :?>
    
  <tr>
    <td><?= $i; ?></td>
    <td>
      <a href="">ubah</a> |
      <a href="">hapus</a>
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
  <?php endwhile; ?>

</table>
</body>
</html>