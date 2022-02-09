<h1 class="font-weight-bold mt-3">Customer Service Panel</h1>
<p>Berikut adalah keadaan data Nasabah pada Mini Bank Sekolah</p>
<div class="row mt-2">
	<div class="col-md-4 mt-2">
		<div class="card">
			<div class="card-header text-center font-weight-bold">Total Nasabah</div>
			<div class="card-body text-center bg-success">
				<h3><?=TotalNasabah();?> Orang</h3>
			</div><!--card-body-->
		</div>	<!--card-->
	</div> <!--col-md-4-->
	
	
	<div class="col-md-4 mt-2">
		<div class="card">
			<div class="card-header text-center font-weight-bold">Nasabah Aktif</div>
			<div class="card-body text-center bg-primary">
				<h3><?=TotalNasabah()-TotalNasabahNonAktif();?> Orang</h3>
			</div><!--card-body-->
		</div>	<!--card-->
	</div> <!--col-md-4-->
	
	<div class="col-md-4 mt-2">
		<div class="card">
			<div class="card-header text-center font-weight-bold">Nasabah Non Aktif</div>
			<div class="card-body text-center bg-danger">
				<h3><?=TotalNasabahNonAktif();?> Orang</h3>
			</div><!--card-body-->
		</div>	<!--card-->
	</div> <!--col-md-4-->

</div> <!--row-->



