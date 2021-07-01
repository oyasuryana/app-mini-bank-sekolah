<?php
$NoRekening=$_POST['TxtNoRekening'];
$NamaNasabah=$_POST['TxtNamaNasabah'];
$TempatLahir=$_POST['TxtTempatLahir'];
$TanggalLahir=$_POST['TxtTanggalLahir'];
$JenisKelamin=$_POST['TxtJenisKelamin'];
$NoHandphone=$_POST['TxtNoHandphone'];
$AlamatNasabah=$_POST['TxtAlamat'];

$sqlSimpan=mysqli_query($koneksi,"UPDATE dataNasabah SET 
NamaNasabah='$NamaNasabah',
TempatLahir='$TempatLahir',
TanggalLahir='$TanggalLahir',
JenisKelamin='$JenisKelamin',
NoHandphone='$NoHandphone',
AlamatNasabah ='$AlamatNasabah'
WHERE NoRekening='$NoRekening'") or die(mysqli_error($koneksi));

echo '<meta http-equiv="refresh" content="0;url=index.php?modul=NasabahTampil"/>';
?>
