<?php
$NoRekening=$_POST['TxtNoRekening'];
$JumlahSimpanan=$_POST['TxtNominalSimpanan'];

$sqlSimpan=mysqli_query($koneksi,"INSERT INTO dataSimpanan (WaktuTransaksi,MutasiSimpanan,NoRekening,Jumlah)
VALUES (now(),'Simpan','$NoRekening',$JumlahSimpanan)") or die(mysqli_error($koneksi));

echo '<meta http-equiv="refresh" content="0;url=index.php?modul=SimpananTambah"/>';


?>
