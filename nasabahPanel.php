<?php
		$nomorRekening=$_SESSION['user'];
		
		// Total Setoran
		$sqlDataSimpanan=mysqli_query($koneksi,"SELECT SUM(Jumlah) as jml
		FROM dataSimpanan
		WHERE NoRekening ='$nomorRekening' AND MutasiSimpanan='Simpan'");
		
		$totalSimpanan=mysqli_fetch_array($sqlDataSimpanan,MYSQLI_ASSOC);

		// Total Penarikan
		$sqlDataPengambilan=mysqli_query($koneksi,"SELECT SUM(Jumlah) as jml
		FROM dataSimpanan
		WHERE NoRekening ='$nomorRekening' AND MutasiSimpanan='Tarik'");
		
		$totalPengambilan=mysqli_fetch_array($sqlDataPengambilan,MYSQLI_ASSOC);

		// Saldo tabungan
		$saldo=$totalSimpanan['jml']-$totalPengambilan['jml'];


		// info terakhir nabung
		$sqlInfoNabung=mysqli_query($koneksi,"SELECT *
		FROM dataSimpanan
		WHERE NoRekening ='$nomorRekening' AND MutasiSimpanan='Simpan' order by WaktuTransaksi DESC");
		$dataInfoNabung=mysqli_fetch_array($sqlInfoNabung,MYSQLI_ASSOC);
		
		
		// info terakhir narik
		$sqlInfoTarik=mysqli_query($koneksi,"SELECT *
		FROM dataSimpanan
		WHERE NoRekening ='$nomorRekening' AND MutasiSimpanan='Tarik' order by WaktuTransaksi DESC");
		$dataInfoTarik=mysqli_fetch_array($sqlInfoTarik,MYSQLI_ASSOC);		

?>
<h1 class="font-weight-bold mt-3">Dashboard</h1>

<div class="row mt-2">
	<div class="col-md-4 mt-2">
		<div class="card" style="min-height:160px">
			<div class="card-header text-center font-weight-bold">Saldo Tabungan</div>
			<div class="card-body text-center bg-success">
				<h3>Rp. <?=number_format($saldo,0,',','.');?></h3>
			</div><!--card-body-->
		</div>	<!--card-->
	</div> <!--col-md-4-->
	
	
	<div class="col-md-4 mt-2">
		<div class="card" style="min-height:160px">
			<div class="card-header text-center font-weight-bold">Terakhir Menabung</div>
			<div class="card-body text-center bg-warning">
				<h4>Tanggal : <?=$dataInfoNabung['WaktuTransaksi'];?>
					<br/>	
					Jumlah : Rp. <?=number_format($dataInfoNabung['Jumlah'],0,',','.');?>
				</h4>
			</div><!--card-body-->
		</div>	<!--card-->
	</div> <!--col-md-4-->
	
	<div class="col-md-4 mt-2">
		<div class="card" style="min-height:160px">
			<div class="card-header text-center font-weight-bold">Terakhir Mengambil</div>
			<div class="card-body text-center bg-info">
				<h4>Tanggal : <?=$dataInfoTarik['WaktuTransaksi'];?>
					<br/>	
					Jumlah : Rp. <?=number_format($dataInfoTarik['Jumlah'],0,',','.');?>
				</h4>
			</div><!--card-body-->
		</div>	<!--card-->
	</div> <!--col-md-4-->

</div> <!--row-->



