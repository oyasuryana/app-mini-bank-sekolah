<?php
$NomorRekening=$_GET['NoRekening'];

$sqlHapusNasabah=mysqli_query($koneksi,"DELETE FROM dataNasabah WHERE NoRekening='$NomorRekening'") or die(mysqli_error($koneksi));

echo '<meta http-equiv="refresh" content="0;url=index.php?modul=NasabahTampil">';
?>

