<!-- row breadcumb -->
<div class="row mt-5">
	<div class="col-12">
		<div class="card card-small shadow-sm bx-shadow">
			<div class="card-body">
				<h1 class="mt-4">Selamat Datang, <?= $this->user->nama ?></h1>
				<p class="fs-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. A distinctio at recusandae dolorum voluptas fugiat ea, maxime odit vitae suscipit assumenda atque ex officiis veritatis voluptates illo laudantium quas asperiores est eos placeat, exercitationem. Ratione sed commodi omnis dolores vitae ea eum! Quam nemo, porro laboriosam quas. Fugit repellat, qui?.</p>
			</div>
		</div>
	</div>
</div><!-- row breadcumb -->

<div class="row">
	<div class="col-12">


	</div>
</div>

<div class="row mt-3 dash-row small">
	<div class="col-lg-6 col-sm-12 mt-3">
		<div class="card card-small shadow-sm bx-shadow px-3 bg-blue-400 text-white">
			<div class="d-flex px-4">
				<div class="item-1">
					<i class="bi bi-currency-exchange"></i>
				</div>
				<div class="item-2 ps-3 py-4 row">
					<h1 class="text-hidden">Rp. <?= tools::rupiah($this->model->GetPendapatanAir()['pendapatan_air_tawar']); ?></h1>
					<p class="text-hidden">Pendapatan Air</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-lg-6 col-sm-12 mt-3">
		<div class="card card-small shadow-sm bx-shadow px-3 bg-purple text-white">
			<div class="d-flex px-4">
				<div class="item-1">
					<i class="bi bi-droplet-half"></i>
				</div>
				<div class="item-2 ps-3 py-4">
					<h1 class="text-hidden"><?= $this->model->GetDelayedAirTawar()['delay']; ?></h1>
					<p class="text-hidden">Delayed Air Tawar</p>
				</div>
			</div>
		</div>
	</div>
	
</div>
