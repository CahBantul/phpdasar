<?php 
require "functions.php";

$id = $_GET["id"];
$kontak = query("SELECT * FROM kontak WHERE id= $id")[0];

if(isset($_POST["submit"])){
  //cek apakah data berhasil diubah atau tidak
  if(ubah($_POST)>0) {
    echo "
        <script>
          alert('data berhasil diubah');
          document.location.href = 'index.php';
        </script>
    ";
  } else {
    echo "
        <script>
        alert('data berhasil diubah');
        document.location.href = 'index.php';
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
  <title>Ubah Kontak</title>
</head>
<body>
  <h1>Ubah Kontak</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $kontak["id"];?>">
    <input type="hidden" name="gambarLama" value="<?= $kontak["gambar"];?>">
    <ul>
      <li>
       <label for="nama">Nama :</label>
       <input type="text" name="nama" id="nama" required value="<?= $kontak["nama"];?>">
      </li>
      <li>
        <label for="noHP">No HP :</label>
        <input type="text" name="noHP" id="noHP" required value="<?= $kontak["noHP"];?>">
      </li>
      <li>
        <label for="alamat">Alamat :</label>
        <input type="text" name="alamat" id="alamat" value="<?= $kontak["alamat"];?>">
      </li>
      <li>
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" value="<?= $kontak["email"];?>">
      </li>
      <li>
        <label for="gambar">Gambar :</label> <br>
        <img src="img/<?= $kontak["gambar"]; ?>" alt="" width="40"><br>
        <input type="file" name="gambar" id="gambar">
      </li>
      <li>
        <button type="submit" name="submit">Ubah Kontak</button>
      </li>
    </ul>
  </form>
</body>
</html>