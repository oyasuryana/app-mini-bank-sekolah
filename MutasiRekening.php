<?php
// memproteksi halaman web akses langusng ke file
if(! defined('_PROTEKSI')) { 	
	header("Location:login.php");
	exit; 
	}
?>
<h1>Mutasi Rekening</h1>
<p>Untuk menampilkan mutasi rekening, silahkan pilih nasabah yang akan ditampilkan datanya !</p>
<form method="POST">
	<div class="form-group row">
		<label class="col-md-2 font-weight-bold">Nomor Rekening</label>
		<div class="col-md-8">
			<select class="form-control" name="noRekening">
				<option>:: Pilih Nasabah ::</option>
				<?php
				$sqlNasabah=mysqli_query($koneksi,"SELECT * FROM dataNasabah");
				while($dataNasabah=mysqli_fetch_array($sqlNasabah,MYSQLI_ASSOC)){
					$_POST['noRekening']==$dataNasabah['NoRekening'] ? $pilih='selected' : $pilih=null;
					echo '<option '.$pilih.' value="'.$dataNasabah['NoRekening'].'">'.$dataNasabah['NoRekening'].' - '.$dataNasabah['NamaNasabah'].'</option>';
				}
				?>
			</select>
		</div>
		<div class="col-md-2">
			<button class="btn btn-success btn-block" type="submit" name="tombolTampil">Tampilkan !</button>
		</div>
</div>	
</form>


<?php
if(isset($_POST['tombolTampil'])){
		$nomorRekening=$_POST['noRekening'];
		$sqlDataSimpanan=mysqli_query($koneksi,"SELECT dataNasabah.NoRekening,dataNasabah.NamaNasabah,
		dataSimpanan.WaktuTransaksi,dataSimpanan.MutasiSimpanan,dataSimpanan.Jumlah
		FROM dataNasabah
		JOIN dataSimpanan ON dataSimpanan.NoRekening=dataNasabah.NoRekening 
		WHERE dataNasabah.NoRekening ='$nomorRekening' ORDER BY WaktuTransaksi ASC");

?>
	<table class="table table-bordered table-hovered">
	<thead class="bg-info text-center">
	<tr>
		<th width=2%>No.</th>
		<th>Tanggal</th>
		<th>Jenis Mutasi</th>
		<th>Debet</th>
		<th>Kredit</th>
		<th >saldo</th>
		</tr>
	</thead>
	<tbody>
	<?php 	
		$no=null;
		$saldo=null;
		while($DataSimpanan=mysqli_fetch_array($sqlDataSimpanan,MYSQLI_ASSOC)){
		//membuat nomor urut
		$no++;
		// menyimpan data berdasarkan jenis mutas
		if($DataSimpanan['MutasiSimpanan']=='Simpan'){
			$debet=null;$kredit=$DataSimpanan['Jumlah'];
		} else {
			$kredit=null;$debet=$DataSimpanan['Jumlah'];			
		}	
		
		// hitung saldo
		if ($debet==0) { $saldo=$saldo+$kredit-$debet ;} else
			{$saldo=$saldo-$debet;}

		echo '<tr>
			<td>'.$no.'.</td>
			<td>'.$DataSimpanan['WaktuTransaksi'].'</td>
			<td>'.$DataSimpanan['MutasiSimpanan'].'</td>
			<td align="right">'.number_format($debet,0,',','.').'</td>
			<td align="right">'.number_format($kredit,0,',','.').'</td>
			<td align="right">'.number_format($saldo,0,',','.').'</td>
		</tr>';
		}	
	?>
	</tbody>
</table>	






<?php
} // end isset
?>
