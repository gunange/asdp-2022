<?php if ($this->setPage == "confirmBbbmTangki"): ?>
	<!-- UP -->
	<form class="modal-content data-form" method="POST" action="<?= $this->gLink ?>PostFormTangkiBbmKapal">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-fuel-pump-diesel-fill"></i> Konfirmasi</pre>
		</div>
		<div class="modal-body">
			<?php if ($this->data->action): ?>
				<?php if ($this->data->liter <= $this->data->maxLiter ) : ?>
					<div class="col-md-12 mt-3 mb-4">
						<section>
							<div class="container-tangki mx-auto">
								<div class="isi-tangki">
									<div class="value-tengki" style="height: <?= $this->data->persentage ?>%;">
										<div class="transisi-tengki"></div>
									</div>
								</div>
								<div class="text-tangki text-center">
								</div>
							</div>
							<div class="text-center">
								<h6 class="mt-2 mb-0 fs-7"><?= $this->data->dataTangki->nama_kapal ?></h6>
								<h6 class="mb-1 fs-7"><?= $this->data->dataTangki->jenis_tanki ?></h6>
								<p class="mb-0"><i class="bi bi-clock-history"></i> <?= tools::indoTime($this->data->tanggal) ?> (<?= $this->data->waktu ?>)</p>
								<p class="mb-0">Litter yang akan disimpan <?= $this->data->liter ?> (litter)</p>
								<p class="mb-0">Max litter tangki <?= $this->data->maxLiter ?> (litter)</p>
								
							</div>
						</section>
					</div>
					<input type="hidden" name="id_tanki" value="<?= $this->data->dataTangki->id ?>">
					<input type="hidden" name="waktu" value="<?= $this->data->waktu ?>">
					<input type="hidden" name="tgl" value="<?= $this->data->tanggal ?>">
					<input type="hidden" name="liter" value="<?= $this->data->liter ?>">
					<input type="hidden" name="tinggi_bbm" value="<?= $this->data->tinggiMinyak ?>">
				<?php else: ?>
					<h6 class="text-pink-400 text-center">Data tinggi minyak melebihi <?= $this->data->dataTangki->jenis_tanki ?> pada kapal <?= $this->data->dataTangki->nama_kapal ?> tinggi minyak tangki adalah <?= $this->data->dataTangki->tinggi ?>cm</h6>
				<?php endif; ?>
			
			<?php else: ?>
				<h6 class="text-pink-400 text-center">Anda harus mengisi form lebih dulu</h6>
			<?php endif; ?>
		</div>

		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<?php if ($this->data->action && $this->data->liter <= $this->data->maxLiter ) : ?>
				<button type="submit" class="btn btn-sm bg-purple text-white" data-bs-dismiss="modal" onclick="ressetInputan()">Submit</button>
			<?php endif; ?>
		</div>
	</form>
<?php elseif ($this->setPage == "getGrafikKapal"): ?>
	<?php $data = $this->model->GetStoryTangkiByIdKapal($this->id)  ;?>

	<?php if (!empty($data)) : ?>

	<?php foreach ($data as $k => $d ): ?>
		<?php 
			$tinggiMax = $this->model->HitungVolume($d['liter_tanki'], $d['tinggi'], $d['tinggi_maksimum']);

		 ?>
	<div class="col-md-6 mt-3 mb-4">
		<section>
			
			<div class="container-tangki mx-auto">
				<div class="isi-tangki">
					<div class="value-tengki" style="height: <?= round(($d['liter'] * 100 ) / $tinggiMax ) ?>%;">
						<div class="transisi-tengki"></div>
					</div>
				</div>
				<div class="text-tangki text-center"></div>
			</div>
			<div class="text-center">
				<h5><?= $d['liter'] ?> <span> (litter)</span></h5>
				<p class="mt-2 mb-1"><?= $d['jenis_tanki'] ?></p>
				<p class="mb-0"><i class="bi bi-clock-history"></i> <?= tools::indoTime($d['tgl']) ?> (<?= $d['waktu'] ?>)</p>
				<p class="mb-1">Maxiimal <?= $tinggiMax ?> (litter)</p>
			</div>
		</section>
	</div>
	<?php endforeach; ?>

<?php else: ?>
	<h5 class="text-center mt-3">Kapal yang anda pilih belum ada history nya</h5>
<?php endif; ?>

<?php elseif ($this->setPage == "getOption"): ?>
	
	<?php foreach ($this->model->GetTangkiKapalById($this->id) as $k => $d): ?>
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