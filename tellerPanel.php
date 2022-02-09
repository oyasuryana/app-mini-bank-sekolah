<h1 class="font-weight-bold mt-3">Teller Panel</h1>
<p>Berikut adalah keadaan data Simpanan pada Mini Bank Sekolah</p>

<div class="row mt-2">
	<div class="col-md-4 mt-2">
		<div class="card">
			<div class="card-header text-center font-weight-bold">Penerimaan Hari Ini</div>
			<div class="card-body text-center bg-success">
				<h3><?='Rp. '.number_format(HitungPenerimaanHarian(date('Y-m-d')),0,',','.');?></h3>
			</div><!--card-body-->
		</div>	<!--card-->
	</div> <!--col-md-4-->
	
	
	<div class="col-md-4 mt-2">
		<div class="card">
			<div class="card-header text-center font-weight-bold">Penarikan Hari Ini</div>
			<div class="card-body text-center bg-warning">
				<h3><?='Rp. '.number_format(HitungPenarikanHarian(date('Y-m-d')),0,',','.');?></h3>
			</div><!--card-body-->
		</div>	<!--card-->
	</div> <!--col-md-4-->
	
	<div class="col-md-4 mt-2">
		<div class="card">
			<div class="card-header text-center font-weight-bold">Kas Hari Ini </div>
			<div class="card-body text-center bg-info">
				<h3><?='Rp. '.number_format((HitungPenerimaanHarian(date('Y-m-d'))-HitungPenarikanHarian(date('Y-m-d'))),0,',','.');?></h3>
			</div><!--card-body-->
		</div>	<!--card-->
	</div> <!--col-md-4-->

</div> <!--row-->
