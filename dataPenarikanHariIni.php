<?php
$TglHariIni=date('Y-m-d');
$sqlDataPenarikanHariIni=mysqli_query($koneksi,"SELECT dataNasabah.NoRekening,dataNasabah.NamaNasabah,
dataSimpanan.WaktuTransaksi,dataSimpanan.MutasiSimpanan,dataSimpanan.Jumlah
FROM dataNasabah
JOIN dataSimpanan ON dataSimpanan.NoRekening=dataNasabah.NoRekening 
WHERE WaktuTransaksi LIKE '$TglHariIni%' AND dataSimpanan.MutasiSimpanan='Tarik'
ORDER BY WaktuTransaksi DESC") or die(mysqli_error($koneksi));


?>
<p>Data Transaksi Penarikan Hari Ini Tanggal <?=date('d-m-Y');?></p>

<table class="table table-bordered table-hovered">
	<thead class="bg-info text-center">
		<tr>
			<th>No.</th>
			<th>Tanggal</th>
			<th>No. Rekening</th>
			<th>Nama Nasabah</th>
			<th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$noUrut=null;
			$JumlahPenarikan=null;
			while($dataSimpanan=mysqli_fetch_array($sqlDataPenarikanHariIni,MYSQLI_ASSOC)){
			$noUrut++;
			$JumlahPenarikan=$JumlahPenarikan+$dataSimpanan['Jumlah'];
			echo '
			<tr>
				<td align="center">'.$noUrut.'</td>
				<td align="center">'.$dataSimpanan['WaktuTransaksi'].'</td>
				<td align="center">'.$dataSimpanan['NoRekening'].'</td>
				<td>'.$dataSimpanan['NamaNasabah'].'</td>
				<td align="right">Rp. '.number_format($dataSimpanan['Jumlah'],0,',','.').'</td>		
			</tr>';
			}
		?>
		<tr>
			<td colspan="4"><strong>Jumlah Penarikan Hari Ini</strong></td>
			<td align="right"><strong>Rp. <?php echo number_format($JumlahPenarikan,0,',','.');?></strong></td>
		</tr>
	</tbody>

</table>
