<h1>Form Simpanan</h1>

<div class="row">
	<div class="col-md-4">
			<form method="post" action="index.php?modul=SimpananSimpan">
			<div class="form-group">
				<label>	Nomor Rekening</label>
					<select name="TxtNoRekening" class="form-control">
						<option> :: Pilih Nasabah :: </option>
						<?php
						$sqlNasabah=mysqli_query($koneksi,"SELECT * FROM dataNasabah");
						while($dataNasabah=mysqli_fetch_array($sqlNasabah,MYSQLI_ASSOC)){
							echo '<option value="'.$dataNasabah['NoRekening'].'">'.$dataNasabah['NoRekening'].' - '.$dataNasabah['NamaNasabah'].'</option>';
						}
						?>
					</select>
			</div>

			<div class="form-group">
				<label>Nominam Simpanan (Rp)</label>
				<input type="text" name="TxtNominalSimpanan" class="form-control" autocomplete="off">
			</div>


			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Simpan</button>
			</div>
			</form>	
	</div> <!--col-md-4-->
	
	<div class="col-md-8">
	<?php
	include('dataSimpananHariIni.php');
	?>
	</div> <!--col-md-8-->
</div> <!--row-->





