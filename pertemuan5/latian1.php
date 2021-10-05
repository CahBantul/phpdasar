<?php 
  // array
  // variable yang dapat memiliki banyak nilai
  
  // mebuat array
  // cara lama
  $hari = array("Senin", "Selasa", "Rabu", "Kamis", "Jum'at");

  // cara baru
  $bulan = ["Januari", "Februari", "Maret"];
  $arr1  = ["halo", 1, false, 2, 4, "okok"];

  // menampilkan array di layar
  // var_dumb() / print_r()
  // var_dump($hari);
  // echo "<br>";
  // print_r($bulan);
  // echo "<br>";

  // menampilkan 1 array di layar
  // echo $hari[0];

  // menambahkan element baru pada array
  // $hari[] = "jum'at";
  // echo "<br>";
  // print_r($hari);
  
  // menampilkan array dengan cara perulangan
  // for / foreach => perulangan khusus array
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>latian 1</title>
  <style>
    .kotak {
      width: 200px;
      height: 50px;
      background-color: salmon;
      text-align: center;
      line-height: 50px;
      margin: 3px;
      margin-top: 30px;
      float: left;
    }
    .clear {
      clear: both;
    }
  </style>
</head>
<body>
  <?php for ( $i=0; $i < count($hari); $i++ ) { ?>
  <div class="kotak"> <?= $hari[$i]; ?></div>
  <?php } ?>
    
  <div class="clear"></div>

  <?php foreach($bulan as $bul) { ?>
    <div class="kotak">
    <?= $bul; ?>
    </div>
  <?php } ?>

  <div class="clear"></div>
  <!-- gaya templating -->
    <?php foreach($arr1 as $arr) : ?>
      <div class="kotak"><?= $arr; ?></div>
    <?php endforeach; ?>
</body>
</html>