<div class="row mt-4">
	<div class="col-12 col-md-12">
		<!-- Page Header -->
		<div class="page-header mt-4 mb-5">
			<div class="card card-small shadow-sm bx-shadow">
				<div class="card-body">
					<h5 class="text-secondary">Dokumen</h5>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="bi bi-house-fill"></i> Pengolahan</a></li>
							<li class="breadcrumb-item"><a href="#">Dokumen</a></li>
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
						<i class="bi bi-box text-yellow-500 me-2"></i> Input Dokumen
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
							<label class="form-label">Pilih Jenis Dokumen</label>
							<select class="form-select form-select-sm sel-all" id="id_jenis_dokumen">
								<option value=""></option>
								<?php foreach ($this->model->sGetJenisDokumen() as $opsi) : ?>
									<option value="<?= $opsi['id'] ?>"><?= $opsi['jenis_dokumen'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="col-12 mb-3">
							<label class="form-label">Masa Berlaku</label>
							<div class="input-group input-group-sm">
								<input type="date" class="form-control form-control-sm" placeholder="Tanggal Berakhir Dokumen" id="tgl_berlaku" required autocomplete="off">
								<div class="input-group-text input-group-sm"><i class="bi bi-calendar3"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- card-body -->

			<div class="btn-toolbar mb-2 mb-md-0 btn-group">

				<button class="btn btn-sm bg-yellow text-white" title="Resset data!" onclick="ressetInputan()">
					<i class="bi bi-printer-fill"></i> Resset
				</button>
				<button class="btn btn-sm primary-bg text-white" title="Tambah data!" onclick="saveBbmTangki();">
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
						<i class="bi bi-box text-yellow-500 me-2"></i> Data Dokumen
					</h6>

				</div>
			</div><!-- card-header -->

			<div class="card-body" id="outputDokumen">
				<div class="row">
					<h5 class="text-center mt-3">Load data sedang diproses ..</h5>
				</div>
			</div><!-- card-body -->

		</div>

	</div>

</div>



<script>
	function getTangki(idKapal) {
		$('#id_jenis_dokumen').val('').trigger('change');
		replaceHtml('#outputDokumen', '<?= $this->gLink ?>SetDokumen/getDataDokumen/' + idKapal);

	}

	function saveBbmTangki() {
		var idKapal = document.getElementById("id_kapal").value;
		var idJenisDokumen = document.getElementById("id_jenis_dokumen").value;
		var tglBerlaku = document.getElementById("tgl_berlaku").value;

		openModalShow('#modal', `<?= $this->gLink ?>SetDokumen/confirmDokumen/${idKapal}/${idJenisDokumen}/${tglBerlaku}`);
	}

	function ressetInputan() {
		$('#id_jenis_dokumen').val('').trigger('change');

		$('#id_kapal').val('').trigger('change');
		$('#tinggiMinyak').val('');
		document.getElementById('outputDokumen').innerHTML = `<div class="row">
					<h5 class="text-center mt-3">Load data sedang diproses ..</h5>
				</div>`;

	}




</script>

