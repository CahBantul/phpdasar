<?php 
    // date
    // untuk menampilkan tanggal dengan format tertentu
    // echo date("l, d-M-Y");

    // Time
    // UNIX timestamp / EPOCH Time
    // detik yang sudah berlalu sejak 1 Januari 1970
    // echo time();

    // echo date("l", time()-(60*60*24*100))

    // mk time
    // membuat sendiri detik
    // mktime(0,0,0,0,0,0)
    // mktime(jam,menit,detik,bulan,tanggal,tahun)
    echo date("l", mktime(0,0,0,3,31,1992));
    
    // strtotime
    echo date("l", strtotime("31 March 1992"));
?>