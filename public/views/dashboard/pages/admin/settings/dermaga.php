<?php if ($this->setPage == "add") : ?>
	<!-- UP -->
	<form class="modal-content" method="POST">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-node-plus-fill"></i> Add</pre>
		</div>
		<div class="modal-body">
			<div class="row">

				<div class="col-md-12 mb-3">
					<label class="form-label">Dermaga</label>
					<input class="form-control form-control-sm" type="text" placeholder="Nama Dermaga" name="dermaga" required autocomplete="off">
				</div>

				<div class="col-md-12 mb-3">
					<label class="form-label">Tarif</label>
					<input class="form-control form-control-sm" min="1" type="number" placeholder="Rp. ..." name="tarif" required autocomplete="off">
				</div>

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
					<label class="form-label">Dermaga</label>
					<input class="form-control form-control-sm" type="text" placeholder="Nama Dermaga" name=dermaga required autocomplete="off" value="<?= $this->data['dermaga'] ?>">
				</div>

				<div class="col-md-12 mb-3">
					<label class="form-label">Tarif</label>
					<input class="form-control form-control-sm" min="1" type="number" placeholder="Rp. ..." name="tarif" required autocomplete="off" value="<?= $this->data['tarif'] ?>">
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
			<p class="fs-6">Apakah anda akan menghapus data Dermaga <span class="text-red-400"><?= $this->data['dermaga'] ?></span> ?</p>

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