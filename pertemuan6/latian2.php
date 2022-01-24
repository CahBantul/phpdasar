<?php 
// $mahasiswa = [["Fardan Nozami", "4110100703", "fardan.nozmai@gmail.com", "teknik Perkapalan"], ["Fardan Nozami", "4110100703", "fardan.nozmai@gmail.com", "teknik Perkapalan"]];

// array associative
$contacts = [
  [
    "nama" => "Fardan Nozami Ajitama", 
    "alamat" => "Surabaya", 
    "email"=> "fardan@gmail.com", 
    "noHP" => "081229292",
    "gambar" => "cucak-ijo.jpg"
  ], 
  [
    "nama" => "Fardan Nozami Ajitama", 
    "alamat" => "Surabaya", 
    "email"=> "fardan@gmail.com", 
    "noHP" => "081229292",
    "gambar" => "murai-batu.jpg"
    ]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Kontak</title>
</head>
<body>
  <h1>Daftar Kontak</h1>

  <?php foreach( $contacts as $contact) : ?>
  <ul>
    <li><img src="img/<?= $contact["gambar"] ?>" ></li>
    <li>Nama : <?= $contact["nama"] ?></li>
    <li>Alamat : <?= $contact["alamat"] ?></li>
    <li>Email : <?= $contact["email"] ?></li>
    <li>No HP : <?= $contact["noHP"] ?></li>
  </ul>
  <?php endforeach; ?>
</body>
</html>