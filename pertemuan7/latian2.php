<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Kontak</title>
</head>
<body>
  <ul>
    <li><img src="img/<?= $_GET["gambar"]; ?>" alt=""></li>
    <li><?= $_GET["nama"]; ?> </li>
    <li><?= $_GET["alamat"]; ?> </li>
    <li><?= $_GET["noHP"]; ?> </li>
    <li><?= $_GET["email"]; ?> </li>
  </ul>
</body>
</html>