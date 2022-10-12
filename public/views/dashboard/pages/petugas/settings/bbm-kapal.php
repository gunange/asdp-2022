<?php if ($this->setPage == "add"): ?>
	<!-- UP -->
	<form class="modal-content" method="POST">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-node-plus-fill"></i> Add</pre>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Nama User</label>
					<input class="form-control form-control-sm" type="text" placeholder="Nama Lengkap" name="nama" required autocomplete="off">
				</div>
				<div class="col-md-12 mb-3">
					<label class="form-label">Jenis Kelamin</label>
					<select class="form-select form-select-sm sel-all" name="id_jenis_kelamin">
						<option value=""></option>
						<?php foreach ($this->model->sGetJenisKelamin() as $opsi) : ?>
							<option value="<?= $opsi['id'] ?>"><?= $opsi['jenis_kelamin'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<section class="py-3">
					<div class="bg-purple text-white py-2 px-3">
						<i>Account</i>
					</div>
				</section>
				<div class="col-md-12 mb-3">
					<label class="form-label">Username</label>
					<input class="form-control form-control-sm" type="text" placeholder="Username" name="username" required autocomplete="off">
				</div>
				<div class="col-md-12 mb-3">
					<label class="form-label">Password</label>
					<input class="form-control form-control-sm" type="text" placeholder="Password" name="password" required autocomplete="off">
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
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-sm bg-purple text-white" name="up" value="<?= $this->data['id'] ?>">Update</button>
		</div>
	</form>

<?php elseif ($this->setPage == "getGrafikKapal"): ?>
	<?php $data = $this->model->GetStoryTangkiByIdKapal($this->idKapal)  ;?>
	<?php if (!empty($data)) : ?>
	<div class="col-md-6 mt-3 mb-4">
		<section>
			<div class="container-tangki mx-auto">
				<div class="isi-tangki">
					<div class="value-tengki" style="height: 80%;">
						<div class="transisi-tengki"></div>
					</div>
				</div>
				<div class="text-tangki text-center">
					<h3>80%</h3>
					<h2>0 <span> (litter)</span></h2>
				</div>
			</div>
			<div class="text-center">
				<p class="mt-2 mb-1">Tangki Utama</p>
				<p><i class="bi bi-clock-history"></i> 20 Agustus 2022 (20:00)</p>
			</div>
		</section>
	</div>

<?php else: ?>
	<h5 class="text-center mt-3">Kapal yang anda pilih belum ada history nya</h5>
<?php endif; ?>

<?php elseif ($this->setPage == "getOption"): ?>
	
	<?php foreach ($this->model->GetTangkiKapalById($this->idKapal) as $k => $d): ?>
		<option value="<?= $d['id'] ?>"><?= $d['jenis_tanki'] ?></option>
	<?php endforeach; ?>
<?php elseif ($this->setPage == "upAkun"): ?>
	<!-- UPDATE AKUN -->
	<form class="modal-content" method="POST">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-cyan"><i class="bi bi-person-bounding-box"></i> Akun</pre>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label>Username</label>
					<input type="text" class="form-control form-control-sm" name="username" placeholder="Username Anda" value="<?= $this->data['username'] ?>" autocomplete="off">
				</div>
				<div class="col-md-12 mb-3">
					<div class="form-check form-switch">
						<input class="form-check-input cursor-pointer" type="checkbox" id="enable_password" onclick="enablePassword(this,'password');">
						<label class="form-check-label cursor-pointer" for="enable_password">Ganti Password?</label>
					</div>
					<input type="password" class="form-control form-control-sm" id="password" placeholder="Password" name="password" required disabled autocomplete="off">
				</div>
			</div>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-sm btn-primary" name="upAkun" value="<?= $this->data['id_login'] ?>" >Update</button>
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