<?php 
// $_GET
$contacts = [
  [
    "nama" => "Fardan", 
    "alamat" => "Surabaya", 
    "email"=> "fardan@gmail.com", 
    "noHP" => "081229292",
    "gambar" => "cucak-ijo.jpg"
  ], 
  [
    "nama" => "Nozami", 
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
  <ul>
  <?php foreach($contacts as $contact) : ?>
    <li><a href="latian2.php?nama=<?= $contact["nama"]; ?>&noHP=<?= $contact["noHP"]; ?>&gambar=<?= $contact["gambar"]; ?>&alamat=<?= $contact["alamat"]; ?>&email=<?= $contact["email"]; ?>"><?= $contact["nama"]; ?></a></li>
  <?php endforeach; ?>
  </ul>
</body>
</html>