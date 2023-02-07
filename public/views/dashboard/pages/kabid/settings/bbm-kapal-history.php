<?php if ($this->setPage == "formFilter") : ?>
	<!-- UP -->
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-node-plus-fill"></i> Filter Pencarian <?= $this->data['nama_kapal'] ?></pre>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Pilih Tahun</label>
					<select class="form-select form-select-sm sel-all" id="id_tahun">
						<option value=""></option>
						<?php foreach ($this->model->GetTahunRange(2022) as $opsi) : ?>
							<option value="<?= $opsi ?>"><?= $opsi ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="col-md-12 mb-3">
					<label class="form-label">Pilih Bulan</label>
					<select class="form-select form-select-sm sel-all" id="id_bulan">
						<option value=""></option>
						<?php foreach (tools::OptBulan() as $opsiVal => $opsi) : ?>
							<option value="<?= $opsiVal ?>"><?= $opsi ?></option>
						<?php endforeach; ?>
					</select>
				</div>


			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="button" class="btn btn-sm bg-purple text-white" onclick="getElementFormFilterBBmKapalHistory('<?= $this->gLink ?>BbmKapalPerhari/<?= $this->id ?>', '#id_tahun', '#id_bulan') ">Cari</button>
		</div>
	</div>
<?php elseif ($this->setPage == "formFilterPdf") : ?>
	<!-- UP -->
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-node-plus-fill"></i> Filter Pencarian <?= $this->data['nama_kapal'] ?></pre>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Pilih Tahun</label>
					<select class="form-select form-select-sm sel-all" id="id_tahun">
						<option value=""></option>
						<?php foreach ($this->model->GetTahunRange(2022) as $opsi) : ?>
							<option value="<?= $opsi ?>"><?= $opsi ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="col-md-12 mb-3">
					<label class="form-label">Pilih Bulan</label>
					<select class="form-select form-select-sm sel-all" id="id_bulan">
						<option value=""></option>
						<?php foreach (tools::OptBulan() as $opsiVal => $opsi) : ?>
							<option value="<?= $opsiVal ?>"><?= $opsi ?></option>
						<?php endforeach; ?>
					</select>
				</div>


			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="button" class="btn btn-sm bg-purple text-white" onclick="getElementFormFilterBBmKapalHistory('<?= $this->gLink ?>BbmKapalPerhari/<?= $this->id ?>', '#id_tahun', '#id_bulan') ">Cari</button>
		</div>
	</div>

<?php else : ?>
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-red-400"><i class="bi bi-exclamation-square-fill"></i> Oops</pre>
		</div>
		<div class="modal-body text-center text-red-300 fs-6">
			<p>Anda tidak dapat mengakses halaman ini</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
		</div>
	</div>
<?php endif; ?>