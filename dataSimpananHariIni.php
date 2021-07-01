<?php
$TglHariIni=date('Y-m-d');
$sqlDataSimpananHariIni=mysqli_query($koneksi,"SELECT dataNasabah.NoRekening,dataNasabah.NamaNasabah,
dataSimpanan.WaktuTransaksi,dataSimpanan.MutasiSimpanan,dataSimpanan.Jumlah
FROM dataNasabah
JOIN dataSimpanan ON dataSimpanan.NoRekening=dataNasabah.NoRekening 
WHERE WaktuTransaksi LIKE '$TglHariIni%' AND dataSimpanan.MutasiSimpanan='Simpan'
ORDER BY WaktuTransaksi DESC");


?>
<p>Data penerimaan transaksi simpanan tanggal <?php echo date('d-m-Y');?></p>

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
			$JumlahPenerimaan=null;
			while($dataSimpanan=mysqli_fetch_array($sqlDataSimpananHariIni,MYSQLI_ASSOC)){
			$noUrut++;
			$JumlahPenerimaan=$JumlahPenerimaan+$dataSimpanan['Jumlah'];
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
			<td colspan="4"><strong>Jumlah Penerimaan Hari Ini</strong></td>
			<td align="right"><strong>Rp. <?php echo number_format($JumlahPenerimaan,0,',','.');?></strong></td>
		</tr>
	</tbody>

</table>
