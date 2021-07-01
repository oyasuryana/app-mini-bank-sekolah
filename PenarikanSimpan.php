<?php
$NoRekening=$_POST['TxtNoRekening'];
$JumlahPenarikan=$_POST['TxtNominalPenarikan'];

$sqlSimpan=mysqli_query($koneksi,"INSERT INTO dataSimpanan (WaktuTransaksi,MutasiSimpanan,NoRekening,Jumlah)
VALUES (now(),'Tarik','$NoRekening',$JumlahPenarikan)") or die(mysqli_error($koneksi));

echo '<meta http-equiv="refresh" content="0;url=index.php?modul=PenarikanTambah"/>';


?>
