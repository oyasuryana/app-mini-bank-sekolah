<?php

function TotalNasabah(){
	$sqlTotalNasabah=mysqli_query($GLOBALS['koneksi'],"SELECT COUNT(NoRekening) as JmlNasabah FROM dataNasabah");
	$TotalNasabah=mysqli_fetch_array($sqlTotalNasabah,MYSQLI_ASSOC);
	return $TotalNasabah['JmlNasabah'];
	
}

function TotalNasabahNonAktif(){
	$sqlTotalNasabahNA=mysqli_query($GLOBALS['koneksi'],"SELECT COUNT(NoRekening) as JmlNasabah FROM dataNasabah where NoRekening NOT IN (SELECT NoRekening From dataSimpanan)");
	$TotalNasabahNA=mysqli_fetch_array($sqlTotalNasabahNA,MYSQLI_ASSOC);
	return $TotalNasabahNA['JmlNasabah'];
	
}
function HitungPenerimaanHarian($tanggalPenerimaan){
	$sqlTotalSimpanan=mysqli_query($GLOBALS['koneksi'],"SELECT SUM(Jumlah) as JmlSimpanan FROM dataSimpanan WHERE WaktuTransaksi like '$tanggalPenerimaan%' AND MutasiSimpanan='Simpan'");
	$TotalSimpanan=mysqli_fetch_array($sqlTotalSimpanan,MYSQLI_ASSOC);
	return $TotalSimpanan['JmlSimpanan'];
	
}

function HitungPenarikanHarian($tanggalPenerimaan){

	$sqlTotalPenarikan=mysqli_query($GLOBALS['koneksi'],"SELECT SUM(Jumlah) as JmlPenarikan FROM dataSimpanan WHERE WaktuTransaksi like '$tanggalPenerimaan%'  AND MutasiSimpanan='Tarik'");
	$TotalPenarikan=mysqli_fetch_array($sqlTotalPenarikan,MYSQLI_ASSOC);
	return $TotalPenarikan['JmlPenarikan'];
	
}

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
