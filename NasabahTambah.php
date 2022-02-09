<h1>Tambah Nasabah</h1>
<p>Masukan data nasabah pada form dibawah ini</p>
<form method="POST" action="index.php?modul=NasabahSimpan">

	<div class="form-group">
		<label>Nomor Rekening</label>
		<input type="text" class="form-control" name="TxtNoRekening" placeholder="Masukan nomor rekening" autocomplete="off" required autofocus/>
	</div>

	<div class="form-group">
		<label>	Nama Nasabah</label>
		<input type="text" class="form-control" name="TxtNamaNasabah" placeholder="Masukan nama lengkap nasabah" autocomplete="off" required/>
	</div>

	<div class="form-group">
		<label>Tempat Lahir	</label>
		<input type="text" class="form-control" name="TxtTempatLahir" placeholder="Masukan tempat lahir nasabah" autocomplete="off" required/>
	</div>

	<div class="form-group">
		<label>	Tanggal Lahir</label>
		<input type="date" class="form-control" name="TxtTanggalLahir">
	</div>

	<div class="form-group">
		<label>Jenis Kelamin</label>
		<div>
			<input type="radio" value="L" name="TxtJenisKelamin"> Laki-laki
			<input type="radio" value="P" name="TxtJenisKelamin"> Perempuan
		</div>
	</div>

	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control" name="TxtAlamat" placeholder="Masukan alamat lengkap nasabah" autocomplete="off" required></textarea>
	</div>

	<div class="form-group">
		<label>	No. Handphone</label>
		<input type="text" class="form-control"  name="TxtNoHandphone" placeholder="Masukan nomor handphone aktif" autocomplete="off" required>
	</div>

	<div class="form-group">
			<button type="submit" class="btn btn-danger">Simpan</button>
	</div>
</form>
