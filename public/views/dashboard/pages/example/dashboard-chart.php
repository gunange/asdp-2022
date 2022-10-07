<div class="row mt-4">
	<div class="col-12">
		<div class="card card-small shadow-sm bx-shadow">
			<div class="card-body">
				<h1 class="mt-4">Selamat Datang, <?= $this->user->nama ?></h1>
				<p class="fs-6">Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Atque tempora officia unde corporis ut, voluptatibus, dolor, provident facere quam nihil alias ipsa, laboriosam consectetur natus a vero voluptatem cum molestiae.</p>
			</div>
		</div>
	</div>
</div>

<div class="row mt-5">
	<div class="col-12 col-md-12">
		<div class="card card-small shadow bx-shadow">
			<div class="card-header border-bottom bg-white">
				<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center my-3">
					<h6 class="m-0">
						<i class="bi bi-box text-yellow-500 me-2"></i> Dasboard Statistik
					</h6>
				</div>
			</div><!-- card-header -->

			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="row dash-chart h-100">
							<div class="item shadow-sm col-md-12 d-flex justify-content-center align-items-center flex-column">
								<i class="bi bi-server text-idigo-300"></i>
								<h2>6</h2>
								<h5>Lorem, ipsum, dolor.</h5>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12 h-100 d-inline-block">
								<div class="dash-chart">

									<div class="item shadow-sm">
										<h5 class="text-center pt-5">Data Pendidikan</h5>
										<section>
											<canvas id="data_pendidikan" width="230px" height="230px"></canvas>
										</section>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="row dash-chart h-100">
							<div class="item shadow-sm col-md-12 d-flex justify-content-center align-items-center flex-column">
								<i class="bi bi-people-fill text-yellow-500"></i>
								<h2>10</h2>
								<h5>Lorem, ipsum.</h5>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12 h-100 d-inline-block">
								<div class="dash-chart">

									<div class="item shadow-sm">
										<h5 class="text-center pt-5">Data Jenis Kelamin</h5>
										<section class="px-5">
											<canvas id="data_jenis_kelamin" width="230px" height="230px"></canvas>
										</section>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div><!-- card-body -->
		</div>
	</div>
</div>

<script type="text/javascript">
	var data_pendidikan = document.getElementById('data_pendidikan');

	data = {
		labels: [
		'SD',
		'SMP',
		'SMA',
		'Tingkat Lanjut',
		],
		datasets: [{
			label: 'My First Dataset',
			data: [
			10,
			12,
			14,
			5
			],
			backgroundColor: [
			'rgb(255, 99, 132)',
			'rgb(54, 162, 235)',
			'rgb(131, 134, 219)',
			'rgb(180,223,0)'
			],
			hoverOffset: 4
		}]
	};

	new Chart(data_pendidikan, {
		type: 'doughnut',
		data: data,
		options: {
			maintainAspectRatio: false,
			scales: {

			}
		},

	});


	var data_jenis_kelamin = document.getElementById('data_jenis_kelamin');

	data = {
		labels: [
		'Jenis Kelamin',
		],
		datasets: [
		{
			label: 'Laki-laki',
			data: [
			10,
			],
			backgroundColor: [
			'rgb(54, 162, 235)',
			],
			hoverOffset: 5
		},
		{
			label: 'Perempuan',
			data: [
			4,
			],
			backgroundColor: [
			'rgb(255, 99, 132)',
			],
			hoverOffset: 5
		},
		]
	};

	new Chart(data_jenis_kelamin, {
		type: 'bar',
		data: data,
		options: {
			maintainAspectRatio: false,
			scales: {

			}
		},

	});


</script>