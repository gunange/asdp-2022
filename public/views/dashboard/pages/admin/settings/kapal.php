<?php if ($this->setPage == "add"): ?>
	<!-- UP -->
	<form class="modal-content" method="POST">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-node-plus-fill"></i> Add</pre>
		</div>
		<div class="modal-body">
			<div class="row">

				<div class="col-md-12 mb-3">
					<label class="form-label">Kapal</label>
					<input class="form-control form-control-sm" type="text" placeholder="Nama Kapal" name="nama_kapal" required autocomplete="off">
				</div>
				
				
				<div class="col-md-12 mb-3">
					<label class="form-label">Perusahaan</label>
					<input class="form-control form-control-sm" type="text" placeholder="Nama Perusahaan" name="perusahaan" required autocomplete="off">
				</div>
				
				<div class="col-md-12 mb-3">
					<label class="form-label">GT</label>
					<input class="form-control form-control-sm" type="number" placeholder="GT" name="gt" required autocomplete="off">
				</div>
				
				<div class="col-md-12 mb-3">
					<label class="form-label">Pajak</label>
					<input class="form-control form-control-sm" type="text" placeholder="Pajak" name="pajak" required autocomplete="off">
				</div>
				
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-sm bg-purple text-white" name="add">Submit</button>
		</div>
	</form>
<?php elseif ($this->setPage == "up"): ?>
	<!-- UP -->
	<form class="modal-content" method="POST">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-vector-pen"></i> Update</pre>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Kapal</label>
					<input class="form-control form-control-sm" type="text" placeholder="Nama Kapal" name="nama_kapal" required autocomplete="off" value="<?= $this->data['nama_kapal'] ?>">
				</div>
				
				
				<div class="col-md-12 mb-3">
					<label class="form-label">Perusahaan</label>
					<input class="form-control form-control-sm" type="text" placeholder="Nama Perusahaan" name="perusahaan" required autocomplete="off" value="<?= $this->data['perusahaan'] ?>">
				</div>
				
				<div class="col-md-12 mb-3">
					<label class="form-label">GT</label>
					<input class="form-control form-control-sm" type="number" placeholder="GT" name="gt" required autocomplete="off" value="<?= $this->data['gt'] ?>">
				</div>
				
				<div class="col-md-12 mb-3">
					<label class="form-label">Pajak</label>
					<input class="form-control form-control-sm" type="text" placeholder="Pajak" name="pajak" required autocomplete="off" value="<?= $this->data['pajak'] ?>">
				</div>
				
				
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-sm bg-purple text-white" name="up" value="<?= $this->data['id'] ?>">Update</button>
		</div>
	</form>

<?php elseif ($this->setPage == "del"): ?>
	<!-- DEL -->
	<form class="modal-content" method="POST">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-red"><i class="bi bi-trash-fill"></i> Delete</pre>
		</div>
		<div class="modal-body">
			<p class="fs-6">Apakah anda akan menghapus data Kapal <span class="text-red-400"><?= $this->data['nama_kapal'] ?></span> ?</p>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-sm btn-primary" name="del" value="<?= $this->data['id'] ?>" >Hapus</button>
		</div>
	</form>

<?php else: ?>
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