<?php
$sqlNasabah=mysqli_query($koneksi,"SELECT * FROM dataNasabah");
?>
<h1>Data Nasabah</h1>
<p>Berikut ini data nasabah Mini bank SMK Nusantara. </p>

<?=$_SESSION['level']!='manager' ? '<p><a href="index.php?modul=NasabahTambah" class="btn btn-primary">Tambah</a></p>' : null;?>

<table class="table table-bordered table-hovered">
	<thead class="bg-info text-center">
		<tr>
			<th>No</th>
			<th>No. Anggota</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Tempat, Tanggal Lahir</th>
			<th>No. Handphone</th>
			<th>Alamat Lengkap</h>
			<th>Aksi</h>
		</tr>
	</thead>
	<tbody>
		<?php
			$noUrut=null;
			while($dataNasabah=mysqli_fetch_array($sqlNasabah,MYSQLI_ASSOC)){
				$noUrut++;
				echo '
				<tr>
					<td>'.$noUrut.'</td>
					<td align="center">'.$dataNasabah['NoRekening'].'</td>
					<td>'.$dataNasabah['NamaNasabah'].'</td>
					<td align="center">'.$dataNasabah['JenisKelamin'].'</td>
					<td>'.$dataNasabah['TempatLahir'].', '.$dataNasabah['TanggalLahir'].'</td>
					<td>'.$dataNasabah['NoHandphone'].'</td>
					<td>'.$dataNasabah['AlamatNasabah'].'</td>
					<td>';
					
					if($_SESSION['level']!='manager'){
						echo '	<a href="index.php?modul=NasabahEdit&NoRekening='.$dataNasabah['NoRekening'].'" class="btn btn-info btn-sm">Edit</a>
						&nbsp; 
						<a href="index.php?modul=NasabahHapus&NoRekening='.$dataNasabah['NoRekening'].'" class="btn btn-danger btn-sm">Hapus</a>';
					} else{
						echo '<a href="index.php?modul=NasabahDetail&NoRekening='.$dataNasabah['NoRekening'].'" class="btn btn-info btn-sm btn-block">Detail</a>';	
					}
						
					
				echo '</td></tr>';
			}
		?>	
				<tr>
		
		</tr>
	</tbody>
</table>
