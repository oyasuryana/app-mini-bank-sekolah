<?php

// SET Koneksi ke MySQL Server
$user='user_sql';
$pass='123';
$host='localhost';
$db='apl_tabungan';
$koneksi=mysqli_connect($host,$user,$pass,$db);

// SET Global Variabel
GLOBAL $koneksi;

// Set Proteksi Halaman Web
define('_PROTEKSI',true);
?>
