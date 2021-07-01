<?php
// memproteksi halaman web akses langusng ke file
if(! defined('_PROTEKSI')) { 	
	header("Location:login.php");
	exit; 
	}
?>
<h1>Laporan</h1>
<p>Untuk menampilkan laporan, silahkan pilih tentukan tanggal dan jenis laporan terlebih dahulu !</p>
<form method="POST">
	<div class="form-group row">
		<label class="col-md-2 font-weight-bold">Tanggal Laporan</label>
		<div class="col-md-10">
			<input type="date" class="form-control">
		</div>
	</div>
	<div class="form-grup row">
		<label class="col-md-2 font-weight-bold">Jenis Laporan</label>
		<div class="col-md-10">
			<select class="form-control">
					<option value="terima">Penerimaan</option>
					<option value="tarik">Pengambilan</option>
			 </select>
		</div>	
	</div>	
	
</form>

