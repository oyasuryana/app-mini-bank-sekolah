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
		<label class="col-md-2 font-weight-bold">Periode Laporan</label>
		<div class="col-md-10">
			<input type="date" class="form-control" name="waktu_transaksi" value="<?=isset($_POST['waktu_transaksi']) ? $_POST['waktu_transaksi'] : null;?>">
		</div>
	</div>
	<div class="form-grup row">
		<label class="col-md-2 font-weight-bold">Jenis Laporan</label>
		<div class="col-md-10">
			<select class="form-control" name="jenisLaporan">
					<option value="simpan" <?=$_POST!=null && $_POST['jenisLaporan']=='simpan' ? 'selected':null;?>>Penerimaan</option>
					<option value="tarik" <?=$_POST!=null && $_POST['jenisLaporan']=='tarik' ? 'selected':null;?>>Pengambilan</option>
			 </select>
		</div>	
	</div>	
	
	<div class="form-group row">
		<div class="col-md-2">
			<button class="btn btn-success btn-block" type="submit" name="tombolTampil">Tampilkan !</button>
		</div>

	</div>
	 
</form>



<?php
if(isset($_POST['tombolTampil'])){
		$tanggal=explode("-",$_POST['waktu_transaksi']);
		$_POST['jenisLaporan']  == 'simpan' ? $jenis='Simpan' : $jenis='Tarik';  
		
		$sqlDataSimpanan=mysqli_query($koneksi,"SELECT dataNasabah.NoRekening,dataNasabah.NamaNasabah,
		dataSimpanan.WaktuTransaksi,dataSimpanan.MutasiSimpanan,dataSimpanan.Jumlah
		FROM dataNasabah
		JOIN dataSimpanan ON dataSimpanan.NoRekening=dataNasabah.NoRekening 
		WHERE dataSimpanan.MutasiSimpanan ='$jenis' 
		AND YEAR(dataSimpanan.WaktuTransaksi) = '".$tanggal[0]."' AND MONTH(dataSimpanan.WaktuTransaksi)='".$tanggal[1]."' 
		ORDER BY WaktuTransaksi DESC") or die(mysqli_error($koneksi));

?>
	<table class="table table-bordered table-hovered">
	<thead class="bg-info text-center">
	<tr>
		<th width=2%>No.</th>
		<th>Waktu </th>
		<th>No Rekening</th>
		<th>Nama Nasabah</th>
		<th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
	<?php 	
		$no=null;
		$saldo=null;
		while($DataSimpanan=mysqli_fetch_array($sqlDataSimpanan,MYSQLI_ASSOC)){
		//membuat nomor urut
		$no++;

		echo '<tr>
			<td>'.$no.'.</td>
			<td>'.$DataSimpanan['WaktuTransaksi'].'</td>
			<td>'.$DataSimpanan['NoRekening'].'</td>
			<td>'.$DataSimpanan['NamaNasabah'].'</td>
			<td align="right">'.number_format($DataSimpanan['Jumlah'],0,',','.').'</td>
		</tr>';
		}	
	?>
	</tbody>
</table>	






<?php
} // end isset
?>
