<?php
$NomorRekening=$_GET['NoRekening'];
$sqlNasabah=mysqli_query($koneksi,"SELECT * FROM dataNasabah WHERE NoRekening='$NomorRekening'");
$dataNasabah=mysqli_fetch_array($sqlNasabah,MYSQLI_ASSOC);

//autocek jenis kelamin
if($dataNasabah['JenisKelamin']=='L') {$laki='checked'; $perempuan=null;} 
else {$perempuan='checked' ; $laki=null;}


?>
<h1>Update Nasabah</h1>
<p>Masukan data nasabah pada form dibawah ini</p>
<form method="POST" action="index.php?modul=NasabahUpdate">

	<div class="">
		<label class="col-md-2 font-weight-bold">Nomor Rekening</label>
		<label class="col-md-8"><?php echo $dataNasabah['NoRekening'];?></label>
	</div>

	<div class="form-group">
		<label class="col-md-2 font-weight-bold">	Nama Nasabah</label>
		<input type="text" class="form-control" value="<?php echo $dataNasabah['NamaNasabah'];?>"</label>
	</div>

	<div class="form-group">
		<label class="col-md-2 font-weight-bold">Tempat Lahir	</label>
		<label><?=$dataNasabah['TempatLahir'];?></label>
	</div>

	<div class="form-group">
		<label>	Tanggal Lahir</label>
		<input type="date" class="form-control" value="<?php echo $dataNasabah['TanggalLahir'];?>"  name="TxtTanggalLahir"  autocomplete="off" required/>
	</div>

	<div class="form-group">
		<label>Jenis Kelamin</label>
		<div>
			<input type="radio" value="L" <?php echo $laki;?> name="TxtJenisKelamin"> Laki-laki
			<input type="radio" value="P" <?php echo $perempuan;?> name="TxtJenisKelamin"> Perempuan
		</div>
	</div>

	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control" name="TxtAlamat"><?php echo $dataNasabah['AlamatNasabah'];?></textarea>
	</div>

	<div class="form-group">
		<label>	No. Handphone</label>
		<input type="text" class="form-control" value="<?php echo $dataNasabah['NoHandphone'];?>" name="TxtNoHandphone"  autocomplete="off" required/>
	</div>

	<div class="form-group">
			<button type="submit" class="btn btn-danger">Simpan</button>
	</div>
</form>
