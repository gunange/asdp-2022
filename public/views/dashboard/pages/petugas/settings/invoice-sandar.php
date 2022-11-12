<?php if ($this->setPage == "filter-print") : ?>
	
	<form class="modal-content data-form" method="POST" action="<?= $this->gLink ?>SetInvoiceSandar/postPdf">
		<div class="modal-header">
			<pre class="modal-title fs-7 text-purple"><i class="bi bi-filetype-pdf"></i> Set Data</pre>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Kapal</label>
					<select name="id_kapal" required class="form-select form-select-sm sel-all">
						<option value=""></option>
						<?php foreach ($this->model->GetKapal() as $opsi) : ?>
							<option value="<?= $opsi['id'] ?>"><?= $opsi['nama_kapal'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-md-12 mb-3">
					<label class="form-label">Dermaga</label>
					<select name="id_dermaga" class="form-select form-select-sm sel-all">
						<option value=""></option>
						<?php foreach ($this->model->GetDermaga() as $opsi) : ?>
							<option value="<?= $opsi['id'] ?>"><?= $opsi['dermaga'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-md-12 mb-3">
					<label class="form-label">Tanggal awal</label>
                    <div class="input-group input-group-sm">
                        <input type="date" class="form-control form-control-sm" placeholder="0" required autocomplete="off" name="tanggal_awal">
                        <div class="input-group-text input-group-sm"><i class="bi bi-calendar3 text-purple"></i></div>
                    </div>
				</div>
				<div class="col-md-12 mb-3">
					<label class="form-label">Tanggal akhir</label>
                    <div class="input-group input-group-sm">
                        <input type="date" class="form-control form-control-sm" placeholder="0" required autocomplete="off" name="tanggal_akhir">
                        <div class="input-group-text input-group-sm"><i class="bi bi-calendar3 text-purple"></i></div>
                    </div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-sm btn-primary">Get PDF</button>
		</div>
	</form>
<?php elseif ($this->setPage == "pdf" && $this->isData) : ?>
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-7 text-purple"><i class="bi bi-filetype-pdf"></i> Set Data</pre>
		</div>
		<div class="modal-body p-0">
			<div class="row">
				<div class="col-md-12 p-0">
					<iframe width="100%" height="500px" frameborder="0" src="<?= $this->gLink ?>PdfInvoiceSandar/Recap/<?= $this->id_kapal ?>/<?= $this->id_dermaga ?>/<?= $this->tanggal_awal ?>/<?= $this->tanggal_akhir ?>"></iframe>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
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