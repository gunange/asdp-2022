<div class="row mt-4">
	<div class="col-12 col-md-12">
		<!-- Page Header -->
		<div class="page-header mt-4 mb-5">
			<div class="card card-small shadow-sm bx-shadow">
				<div class="card-body">
					<h5 class="text-secondary">Dashboard Settings</h5>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="bi bi-house-fill"></i> Home</a></li>
							<li class="breadcrumb-item"><a href="<?= $this->gLink ?>/BbmKapalHistory/<?= $this->tahun ?>">List Data Per-Bulan</a></li>
							<li class="breadcrumb-item active" aria-current="page">Data</li>
						</ol>
					</nav>
				</div>
			</div>
		</div><!-- row breadcumb -->
	</div>
</div>

<div class="row mt-4">
	<div class="col-12 col-md-12">
		<div class="card card-small shadow bx-shadow">
			<div class="card-header border-bottom bg-white">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3">
					<h6 class="m-0">
						<i class="bi bi-box text-yellow-500 me-2"></i> History BBM Kapal
					</h6>

				</div>
			</div><!-- card-header -->

			<div class="card-body">
				<div class="col-12 col-md-12">
					<section class="">
						<canvas id="dataMinyak" width="230px" height="230px"></canvas>
					</section>
				</div>
			</div><!-- table-responsive -->

		</div><!-- card-body -->
	</div>
</div>
</div>



<script type="text/javascript">
	function setChart(namaKapal = "Nama Kapal", dataStatic = []) {
		data = {
			labels: <?= $this->model->GetJsonTanggal($this->bulan, $this->tahun) ?>,
			datasets: [{
				label: namaKapal,
				data: dataStatic,
				backgroundColor: [
					'rgb(75, 192, 192)',
				],
				borderColor: 'rgb(75, 192, 192)',
				hoverOffset: 10,
				fill: false,
				tension: 0.1
			}, ]
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

	setChart('<?= $this->dataKapal['nama_kapal'] ?>', <?= $this->dataGrafik ?>)
</script>