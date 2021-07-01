<?php

function HitungTotalSimpanan($NoRekening){
	$sqlTotalSimpanan=mysqli_query($GLOBALS['koneksi'],"SELECT SUM(Jumlah) as JmlSimpanan FROM dataSimpanan WHERE NoRekening='$NoRekening' AND MutasiSimpanan='Simpan'");
	$TotalSimpanan=mysqli_fetch_array($sqlTotalSimpanan,MYSQLI_ASSOC);
	return 'Rp. '.number_format($TotalSimpanan['JmlSimpanan'],0,',','.');
	
}


function HitungTotalPenarikan($NoRekening){

	$sqlTotalPenarikan=mysqli_query($GLOBALS['koneksi'],"SELECT SUM(Jumlah) as JmlPenarikan FROM dataSimpanan WHERE NoRekening='$NoRekening' AND MutasiSimpanan='Tarik'");
	$TotalPenarikan=mysqli_fetch_array($sqlTotalPenarikan,MYSQLI_ASSOC);
	return 'Rp. '.number_format($TotalPenarikan['JmlPenarikan'],0,',','.');
	
}


function HitungSaldoRekening($NoRekening){
	
	$sqlSaldoAkhir=mysqli_query($GLOBALS['koneksi'],"SELECT NoRekening,MutasiSimpanan,sum(Jumlah) as jml FROM `dataSimpanan` WHERE NoRekening='$NoRekening' GROUP BY NoRekening,MutasiSimpanan");
	$saldo=null;
	while($SaldoAkhir=mysqli_fetch_array($sqlSaldoAkhir,MYSQLI_ASSOC)){
		 if($saldo==null){
			$saldo=	$SaldoAkhir['jml'];
			} else{ 
			$saldo=$saldo-$SaldoAkhir['jml'];
		 }
	}
	
	
	return 'Rp. '.number_format($saldo,0,',','.');
	
}

?>
