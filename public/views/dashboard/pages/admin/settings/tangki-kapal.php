<?php if ($this->setPage == "add") : ?>
	<!-- UP -->
	<form class="modal-content" method="POST">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-node-plus-fill"></i> Add</pre>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Jenis Tanki</label>
					<select class="form-select form-select-sm sel-all" name="id_jenis_tanki">
						<option value=""></option>
						<?php foreach ($this->model->sGetJenisTanki() as $opsi) : ?>
							<option value="<?= $opsi['id'] ?>"><?= $opsi['jenis_tanki'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-12 mt-3">
					<label class="form-label">Ukuran Tanki</label>
				</div>
				<div class="col-6 mb-3">
					<!-- <label class="form-label">Tinggi</label> -->
					<div class="input-group input-group-sm">
						<input type="number" min="1" class="form-control form-control-sm" placeholder="Tinggi" name="tinggi" required autocomplete="off">
						<div class="input-group-text input-group-sm">cm</div>
					</div>
				</div>

				<div class="col-6 mb-3">
					<!-- <label class="form-label">Liter</label> -->
					<div class="input-group input-group-sm">
						<input type="number" class="form-control form-control-sm" placeholder="Liter" name="liter" required autocomplete="off">
						<div class="input-group-text input-group-sm">liter</div>
					</div>
				</div>


				<input type="hidden" value="<?= $this->idKapal ?>" name="id_kapal">

			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-sm bg-purple text-white" name="add">Submit</button>
		</div>
	</form>
<?php elseif ($this->setPage == "up") : ?>
	<!-- UP -->
	<form class="modal-content" method="POST">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-vector-pen"></i> Update</pre>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Jenis Tanki</label>
					<select class="form-select form-select-sm sel-all" name="id_jenis_tanki">
						<option value="<?= $this->data['id_jenis_tanki'] ?>"><?= $this->data['jenis_tanki'] ?></option>
						<?php foreach ($this->model->sGetJenisTanki("WHERE id != '{$this->data['id_jenis_tanki']}' ") as $opsi) : ?>
							<option value="<?= $opsi['id'] ?>"><?= $opsi['jenis_tanki'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="col-12 mt-3">
					<label class="form-label">Ukuran Tanki</label>
				</div>

				<div class="col-6 mb-3">
					<!-- <label class="form-label">Tinggi</label> -->
					<div class="input-group input-group-sm">
						<input type="number" min="1" class="form-control form-control-sm" placeholder="Tinggi" name="tinggi" required autocomplete="off" value="<?= $this->data['tinggi'] ?>">
						<div class="input-group-text input-group-sm">cm</div>
					</div>
				</div>

				<div class="col-6 mb-3">
					<!-- <label class="form-label">Liter</label> -->
					<div class="input-group input-group-sm">
						<input type="number" class="form-control form-control-sm" placeholder="Liter" name="liter" required autocomplete="off" value="<?= $this->data['liter'] ?>">
						<div class="input-group-text input-group-sm">liter</div>
					</div>
				</div>


			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-sm bg-purple text-white" name="up" value="<?= $this->data['id'] ?>">Update</button>
		</div>
	</form>

<?php elseif ($this->setPage == "del") : ?>
	<!-- DEL -->
	<form class="modal-content" method="POST">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-red"><i class="bi bi-trash-fill"></i> Delete</pre>
		</div>
		<div class="modal-body">
			<p class="fs-6">Apakah anda akan menghapus data Tangki <span class="text-red-400"><?= $this->data['nama_kapal'] ?></span> ?</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-sm btn-primary" name="del" value="<?= $this->data['id'] ?>">Hapus</button>
		</div>
	</form>


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