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
	<div class="col-lg-3 col-sm-6 mt-3">
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
	<div class="col-lg-3 col-sm-6 mt-3">
		<div class="card card-small shadow-sm bx-shadow px-3 bg-green-400 text-white">
			<div class="d-flex px-4">
				<div class="item-1">
					<i class="bi bi-currency-exchange"></i>
				</div>
				<div class="item-2 ps-3 py-4">
					<h1 class="text-hidden">Rp. <?= tools::rupiah($this->model->GetPendatapanSandar()['pendapatan_sandar']); ?></h1>
					<p class="text-hidden">Pendapatan Sandar</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6 mt-3">
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
	<div class="col-lg-3 col-sm-6 mt-3">
		<div class="card card-small shadow-sm bx-shadow px-3 bg-yellow-600 text-white">
			<div class="d-flex px-4">
				<div class="item-1">
					<i class="bi bi-life-preserver"></i>
				</div>
				<div class="item-2 ps-3 py-4">
					<h1 class="text-hidden"><?= $this->model->GetDelayedSandar()['delay']; ?></h1>
					<p class="text-hidden">Delayed Sandar</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mt-4">
	<div class="col-12 col-md-12">
		<div class="card card-small shadow bx-shadow">
			<div class="card-header border-bottom bg-white">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3">
					<h6 class="m-0">
						<i class="bi bi-box text-yellow-500 me-2"></i> Data History Penggunaan Solar Kapal
					</h6>

				</div>
			</div><!-- card-header -->

			<div class="card-body">
				<div class="table-responsive">

					<!-- table -->
					<table id="DataTable" class="table">
						<thead>
							<tr>
								<th width="50px">#</th>
								<th>Kapal</th>
								<th>Perusahaan</th>
								<th>GT</th>
								<th>Pajak</th>
								<th class="text-center text-white"><i class="bi bi-gear-fill"></i></th>
							</tr>
						</thead>


						<tbody>
							<?php foreach ($this->model->sGetKapal() as $k => $d) : ?>
								<tr>
									<td><?= $k + 1 ?></td>
									<td><?= $d['nama_kapal'] ?></td>
									<td><?= $d['perusahaan'] ?></td>
									<td><?= $d['gt'] ?></td>
									<td><?= $d['pajak'] ?></td>
									<td class="text-center" width="120px">
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-sm bg-teal text-white" title="Detail Tangki" onclick="openModalShow('#modal-center-xl', '<?= $this->gLink ?>SetDashboard/showTangkiKapal/null/<?= $d['id'] ?>', 
											()=>{injectJsDashboardPrimary();})">
												<i class="bi bi-clipboard2-x-fill"></i>
											</button>
											<?php
											$dataTankKanan = $this->model->GetDataGrafikForMonitor($this->model->GetHistoryDayTankKanan($d['id']));
											$dataTankKiri = $this->model->GetDataGrafikForMonitor($this->model->GetHistoryDayTankKiri($d['id']));

											// proses mendapatkan dataTankTotal
											$dataTankTotal = [];
											$datakiri = json_decode($dataTankKiri, true);
											foreach (json_decode($dataTankKanan, true) as $index => $datakanan) {
												$dataTankTotal[$index] = $datakanan + $datakiri[$index];
											}
											$dataTankTotal = json_encode($dataTankTotal);

											?>
											<button type="button" class="btn btn-sm primary-bg text-white" title="Grafik" onclick="openModalShow('#modal-center-xl', '<?= $this->gLink ?>SetDashboard/showDataPemakaianMinyak/null/', 
											()=>{

													setChart( <?= $dataTankKanan ?>,  <?= $dataTankKiri ?>,  <?= $dataTankTotal ?>) ;
												}
											)">
												<i class="bi bi-bar-chart-line-fill"></i>
											</button>
										</div>
									</td>

								</tr>
								<?php



								?>
							<?php endforeach; ?>

						</tbody>

					</table><!-- table -->
				</div><!-- table-responsive -->

			</div><!-- card-body -->
		</div>
	</div>
</div>



<script type="text/javascript">
	function setChart(tangkiKanan = [], tangkiKiri = [],  total = [], ) {
		data = {
			labels: <?= $this->model->GetJsonTanggal() ?>,
			datasets: [
			{
				label: "Tangki Kanan",
				data: tangkiKanan,
				backgroundColor: [
					'rgb(75, 192, 192)',
				],
				borderColor: 'rgb(75, 192, 192)',
				hoverOffset: 10,
				fill: false,
				tension: 0.1
			}, 
			{
				label: "Tangki Kiri",
				data: tangkiKiri,
				backgroundColor: [
					'rgb(78,103,255)',
				],
				borderColor: 'rgb(78,103,255)',
				hoverOffset: 10,
				fill: false,
				tension: 0.1
			}, 
			{
				label: "Total",
				data: total,
				backgroundColor: [
					'rgb(252,23,45)',
				],
				borderColor: 'rgb(252,23,45)',
				hoverOffset: 10,
				fill: false,
				tension: 0.1
			}, 
			
			]
		};

		new Chart(document.getElementById('dataMinyak'), {
			type: 'line',
			data: data,
			options: {
				maintainAspectRatio: false,
				scales: {

				}
			},

		});
	}
</script>