<div class="row mt-4">
	<div class="col-12 col-md-12">
		<!-- Page Header -->
		<div class="page-header mt-4 mb-5">
			<div class="card card-small shadow-sm bx-shadow">
				<div class="card-body">
					<h5 class="text-secondary">BBM Kapal</h5>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="bi bi-house-fill"></i> Pengolahan</a></li>
							<li class="breadcrumb-item"><a href="#">BBM Kapal</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</div><!-- row breadcumb -->
	</div>
</div>

<div class="row mt-3">
	<div class="col-6 col-md-6">
		<div class="card card-small shadow bx-shadow">
			<div class="card-header border-bottom bg-white">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3">
					<h6 class="m-0">
						<i class="bi bi-box text-yellow-500 me-2"></i> Input BBM Kapal
					</h6>

				</div>
			</div><!-- card-header -->


			<div class="card-body">
				<div class="row">
					<div class="col-md-12 mb-3 border-dark">

						<div class="col-md-12 mb-3">
							<label class="form-label">Pilih Kapal</label>
							<select class="form-select form-select-sm sel-all" name="id_kapal" id="id_kapal" onchange="getTangki(this.value)">
								<option value=""></option>
								<?php foreach ($this->model->sGetKapal() as $opsi) : ?>
									<option value="<?= $opsi['id'] ?>"><?= $opsi['nama_kapal'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-12 mb-3">
							<label class="form-label">Pilih Tangki</label>
							<select class="form-select form-select-sm sel-all" id="id_jenis_tanki">
								<option value=""></option>
							</select>
						</div>

						<div class="col-12 mb-3">
							<label class="form-label">Tinggi Minyak</label>
							<div class="input-group input-group-sm">
								<input type="number" class="form-control form-control-sm"  placeholder="Tinggi Minyak Kapal" id="tinggiMinyak" required autocomplete="off">
								<div class="input-group-text input-group-sm">cm</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- card-body -->

			<div class="btn-toolbar mb-2 mb-md-0 btn-group">

				<button class="btn btn-sm bg-yellow text-white" 
					title="Tambah data!" 
					onclick="ressetInputan()">
					<i class="bi bi-printer-fill"></i> Resset
				</button>
				<button class="btn btn-sm primary-bg text-white"
					title="Tambah data!" 
					onclick="saveBbmTangki();">
					<i class="bi bi-clipboard-plus"></i> Simpan
				</button>

			</div>
		</div>
	</div>

	<div class="col-6 col-md-6">
		<div class="card card-small shadow bx-shadow">
			<div class="card-header border-bottom bg-white">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3">
					<h6 class="m-0">
						<i class="bi bi-box text-yellow-500 me-2"></i> Data Grafik
					</h6>

				</div>
			</div><!-- card-header -->

			<div class="card-body">
				<div class="row" id="outputGrafik">
					
					<h5 class="text-center mt-3">Load data sedang diproses ..</h5>
				</div>
			</div><!-- card-body -->

		</div>

	</div>

</div>

<div class="row mt-5">
	<div class="col-6 col-md-12">
		<div class="card card-small shadow bx-shadow">
			<div class="card-header border-bottom bg-white">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3">
					<h6 class="m-0">
						<i class="bi bi-webcam-fill text-teal-500 me-2"></i> CCTV Kapal
					</h6>
				</div>
			</div><!-- card-header -->


			<!-- <div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<video id="video" src="rtsp://admin:IT@5dp23@10.33.4.20:80/cam/realmonitor?channel=1&subtype=0" autoplay="autoplay" width="100%" height="350px"></video>
					</div>
				</div>
			</div> -->
			<!-- card-body -->
		</div>
	</div>

</div>



<script>
	function getTangki(idKapal){
		$('#id_jenis_tanki').val('').trigger('change');
		replaceHtml('#id_jenis_tanki', '<?= $this->gLink ?>SetBbmKapal/getOption/' + idKapal);
		replaceHtml('#outputGrafik', '<?= $this->gLink ?>SetBbmKapal/getGrafikKapal/' + idKapal);
		replaceHtml('#outCctv', '<?= $this->gLink ?>SetBbmKapal/getCctvKapal/' + idKapal);

	}

	function saveBbmTangki(){
		var idTangki = document.getElementById("id_jenis_tanki").value;
		var tinggiMinyak = document.getElementById("tinggiMinyak").value;

		openModalShow('#modal', `<?= $this->gLink ?>SetBbmKapal/confirmBbbmTangki/${idTangki}/${tinggiMinyak}` );
	}
	function ressetInputan() {
		$('#id_jenis_tanki').val('').trigger('change');
		$('#id_kapal').val('').trigger('change');
		$('#tinggiMinyak').val('');
		document.getElementById('outputGrafik').innerHTML = '<h5 class="text-center mt-3">Load data sedang diproses ..</h5>';

	}

</script>
