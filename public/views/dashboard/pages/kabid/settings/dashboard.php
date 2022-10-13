<?php if ($this->setPage == "showTangkiKapal"): ?>
	<!-- UP -->
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-clipboard2-x-fill"></i> Detail Tangki</pre>
		</div>
		<div class="modal-body">
			<?php if (!empty($this->data)): ?>
			<div class="row pt-5">
				<?php foreach ($this->data as $k => $d ): ?>
				<div class="col-md-4 col-sm-4 mb-4">
					<section>
						<div class="container-tangki mx-auto">
							<div class="isi-tangki">
								<div class="value-tengki" style="height: 100%;">
									<div class="transisi-tengki"></div>
								</div>
							</div>
							<div class="text-tangki text-center">
								<h2><?= $this->model->HitungVolume($d['panjang'], $d['lebar'], $d['tinggi'] ) ?><span> (litter)</span></h2>
							</div>
						</div>
						<div class="text-center">
							<p class="mt-2 mb-1"><?= $d['jenis_tanki'] ?></p>
							<p>Panjang <?= $d['panjang'] ?>cm, Lebar <?= $d['lebar'] ?>cm, Tinggi <?= $d['tinggi'] ?>cm,</p>
						</div>
					</section>
				</div>
				<?php endforeach; ?>
			</div>
			<?php else: ?>
				<div class="modal-body text-center text-red-300 fs-6">
					<p>Admin Belum menambahakan detail tangki pada kapal ini</p>
				</div>
			<?php endif; ?>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
		</div>
	</div>

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