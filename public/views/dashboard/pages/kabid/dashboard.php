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

											$dataCekArrayTank = [];
											$dataJenisTanki = $this->model->GetJenisTankiByKapal($d['id']);
											foreach ($dataJenisTanki as $key => $djt) {
												$dataCekArrayTank[$key] =  $this->model->GetDataGrafikSaldoTotalTerbaryDay($this->model->HistoryDayTangkiKapalDinamic($d['id'], $djt['id_jenis_tanki']));
											}


											// $dataCekArrayTank[0] = $this->model->GetDataGrafikSaldoTotalTerbaryDay($this->model->GetHistoryDayTankKanan($d['id']));
											// $dataCekArrayTank[1] = $this->model->GetDataGrafikSaldoTotalTerbaryDay($this->model->GetHistoryDayTankKiri($d['id']));
											// $dataCekArrayTank[2] = $this->model->GetDataGrafikSaldoTotalTerbaryDay($this->model->GetHistoryIndukTankKanan($d['id']));
											// $dataCekArrayTank[3] = $this->model->GetDataGrafikSaldoTotalTerbaryDay($this->model->GetHistoryIndukTankKiri($d['id']));

											// proses mendapatkan dataTankTotal
											$dataSaldo = json_encode([]);
											$nilaiAkhir = 0;
											$tempArrayTank = 0;
											foreach ($dataCekArrayTank as $k => $val) {
												if (count(json_decode($val)) !== 0) {
													if ($tempArrayTank !== 0) {
														$dataSaldo = json_decode($dataSaldo);
														foreach (json_decode($dataCekArrayTank[$k], true) as $index => $datakanan) {
															$dataSaldo[$index] = $datakanan + $tempArrayTank[$index];
														}
														$tempArrayTank = $dataSaldo;
														$dataSaldo = json_encode($dataSaldo);
													} else {
														$tempArrayTank = json_decode($dataCekArrayTank[$k]);
														$dataSaldo = json_encode($tempArrayTank);
													}
												}
											}

											$newDataSaldo = json_decode($dataSaldo, true);
											foreach ($newDataSaldo as $kk => $dd) :
												$newDataSaldo[$kk] = ($dd != 0 ? intval($dd) : $nilaiAkhir);
												if ($dd != 0) :
													$nilaiAkhir = intval($dd);
												endif;
											endforeach;

											$newDataSaldo = json_encode($newDataSaldo);
											?>
											<button type="button" class="btn btn-sm primary-bg text-white" title="Grafik" onclick="openModalShow('#modal-center-xl', '<?= $this->gLink ?>SetDashboard/showDataPemakaianMinyak/', 
											()=>{

													setChart( <?= $newDataSaldo ?>) ;
												}
											)">
												<i class="bi bi-bar-chart-line-fill"></i>
											</button>
											<button type="button" class="btn btn-sm bg-purple text-white" title="Grafik Filter" onclick="openModalShow('#modal', '<?= $this->gLink ?>SetDashboard/form-filter/null/<?= $d['id'] ?>', 
											()=>{injectJsDashboardPrimary();})">
												<i class="bi bi-calendar3"></i>
											</button>
											<button type="button" class="btn btn-sm bg-pink text-white" title="PDF Filter" onclick="openModalShow('#modal', '<?= $this->gLink ?>SetDashboard/form-filter-pdf/null/<?= $d['id'] ?>', 
											()=>{injectJsDashboardPrimary();})">
												<i class="bi bi-filetype-pdf"></i>
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
	function getLabelTgl(bulan = null, tahun = null) {
		var countTgl = getJumlahHari(bulan, tahun);
		var ret = [];

		for (tgl = 1; tgl <= countTgl; tgl++) {
			ret.push(`tgl ${tgl}`)
		}
		return ret;
	}

	function getJumlahHari(bulan = null, tahun = null) {

		if (bulan !== null && tahun !== null) {
			today = new Date(`${tahun}-${bulan}-01`);

			var currentMonth = today.getMonth();
			var currentYear = today.getFullYear();
			var lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);

			tglTerakhir = lastDayOfMonth.getDate();
		} else {
			var today = new Date();
			tglTerakhir = today.getDate();
		}

		return tglTerakhir;
	}

	function setChart(total = [], bulan = null, tahun = null) {

		data = {
			labels: getLabelTgl(bulan, tahun),
			datasets: [{
					label: "Saldo Harian",
					data: total,
					backgroundColor: [
						'rgb(55, 146, 55)',
					],
					borderColor: 'rgb(55, 146, 55)',
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
				height: 353,
				responsive: true,
				scales: {

				}
			},

		});
	}
</script>