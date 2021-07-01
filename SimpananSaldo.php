<?php
$sql_DataNasabah=mysqli_query($koneksi,"SELECT * FROM dataNasabah");
?>

<h4>Saldo Simpanan Nasabah</h4>
<p>Berikut ini saldo simpanan seluruh nasabah</p>
<table class="table table-bordered table-hovered">
	<thead class="bg-info text-center">
		<tr>
			<th>No.</th>
			<th>No. Rekening</th>
			<th>Nama Nasabah</th>
			<th>Total Simpanan</th>
			<th>Total Penarikan</th>
			<th>Saldo Akhir</th>
		</tr>
	</thead>
	<tbody>	
		<?php
		$noUrut=null;
		while($DataNasabah=mysqli_fetch_array($sql_DataNasabah,MYSQLI_ASSOC)){
		$noUrut++;
		echo '<tr>
				<td align="center">'.$noUrut.'</td>
				<td align="center">'.$DataNasabah['NoRekening'].'</td>
				<td>'.$DataNasabah['NamaNasabah'].'</td>
				<td align="right">'.HitungTotalSimpanan($DataNasabah['NoRekening']).'</td>
				<td align="right">'.HitungTotalPenarikan($DataNasabah['NoRekening']).'</td>
				<td align="right">'.HitungSaldoRekening($DataNasabah['NoRekening']).'</td>
				
		</tr>';
		}
		?>
		</tr>
	</tbody>
</table>
