
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

<div class="row mt-3 dash-row small">
	<div class="col-lg-3 col-sm-6 mt-3">
		<div class="card card-small shadow-sm bx-shadow px-3 bg-blue-400 text-white">
			<div class="d-flex px-4">
				<div class="item-1">
					<i class="bi bi-calendar2-event-fill"></i>
				</div>
				<div class="item-2 ps-3 py-4">
					<h1>0</h1>
					<p class="">Lorem.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6 mt-3">
		<div class="card card-small shadow-sm bx-shadow px-3 bg-green-400 text-white">
			<div class="d-flex px-4">
				<div class="item-1">
					<i class="bi bi-hourglass-split"></i>
				</div>
				<div class="item-2 ps-3 py-4">
					<h1>0</h1>
					<p class="">Pelayanan Kapal</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6 mt-3">
		<div class="card card-small shadow-sm bx-shadow px-3 bg-purple text-white">
			<div class="d-flex px-4">
				<div class="item-1">
					<i class="bi bi-people-fill"></i>
				</div>
				<div class="item-2 ps-3 py-4">
					<h1>0</h1>
					<p class="">User Pelayanan</p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-6 mt-3">
		<div class="card card-small shadow-sm bx-shadow px-3 bg-yellow-600 text-white">
			<div class="d-flex px-4">
				<div class="item-1">
					<i class="bi bi-file-earmark-text-fill"></i>
				</div>
				<div class="item-2 ps-3 py-4">
					<h1>0</h1>
					<p class="">Data Kapal</p>
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
						<i class="bi bi-box text-yellow-500 me-2"></i> Data Kapal Per-Bulan
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
							<?php foreach($this->model->sGetKapal() as $k => $d) : ?>
								<tr>
									<td><?= $k + 1 ?></td>
									<td><?= $d['nama_kapal'] ?></td>
									<td><?= $d['perusahaan'] ?></td>
									<td><?= $d['gt'] ?></td>
									<td><?= $d['pajak'] ?></td>
									<td class="text-center" width="120px">
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-sm bg-teal text-white" title="Detail Tangki" 
											onclick="openModalShow('#modal-center-xl', '<?= $this->gLink ?>SetDashboard/showTangkiKapal/null/<?= $d['id'] ?>', 
											()=>{injectJsDashboardPrimary();})">
											<i class="bi bi-clipboard2-x-fill"></i>
										</button>
										<button type="button" class="btn btn-sm primary-bg text-white" title="Hapus" 
											onclick="openModalShow('#modal-center-xl', '<?= $this->gLink ?>SetDashboard/showDataPemakaianMinyak/null/', 
											()=>{
													
													setChart('<?= $d['nama_kapal'] ?>', [ 10, 30, 50, 60, 5, 61, 100, 45, ] ) ;
												}
											)">
											<i class="bi bi-bar-chart-line-fill"></i>
										</button>
								</div>
							</td>

						</tr>
					<?php endforeach; ?>

				</tbody>

			</table><!-- table -->
		</div><!-- table-responsive -->

	</div><!-- card-body -->
</div>
</div>
</div>




<script type="text/javascript">
	
	function setChart(namaKapal="Nama Kapal", dataStatic=[] ){
		data = {
			labels: <?= $this->model->GetJsonTanggal() ?>,
			datasets: [
			{
				label: namaKapal,
				data: dataStatic,
				backgroundColor: [
					'rgb(75, 192, 192)',
				],
				borderColor: 'rgb(75, 192, 192)',
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