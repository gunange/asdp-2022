<?php if ($this->setPage == "showTangkiKapal"): ?>
	<!-- UP -->
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-clipboard2-x-fill"></i> Detail Tangki</pre>
		</div>
		<div class="modal-body">
			<?php if (!empty($this->data)): ?>
				<?php $litter = 0; ?>
			<div class="row pt-5">
				<?php foreach ($this->data as $k => $d ): ?>
				<?php $tinggiMax = $this->model->HitungVolume($d['liter_tanki'], $d['tinggi'], $d['tinggi_maksimum']);?>
				<div class="col-md-4 cols-sm-4 mt-3 mb-4">
					<section>
						<div class="container-tangki mx-auto">
							<div class="isi-tangki">
								<div class="value-tengki" style="height: <?= intval(($d['liter'] * 100 ) / $tinggiMax ) ?>%;">
									<div class="transisi-tengki"></div>
								</div>
							</div>
							<div class="text-tangki text-center"></div>
						</div>
						<div class="text-center">
							<h5><?= tools::rupiah($d['liter']) ?> <span> (litter)</span></h5>
							<p class="mt-2 mb-1"><?= $d['jenis_tanki'] ?></p>
							<p class="mb-0"><i class="bi bi-clock-history"></i> <?= tools::indoTime($d['tgl']) ?> (<?= $d['waktu'] ?>)</p>
							<p class="mb-1">Maxiimal <?= $tinggiMax ?> (litter)</p>
						</div>
					</section>
				</div>
				<?php $litter += $d['liter'] ?>
				<?php endforeach; ?>
			</div>
			<?php else: ?>
				<div class="modal-body text-center text-red-300 fs-6">
					<p>Admin Belum menambahakan detail tangki pada kapal ini</p>
				</div>
			<?php endif; ?>
		</div>
		<div class="modal-footer">
			<?php if (!empty($this->data)): ?>
				<button type="button" class="btn btn-sm bg-teal text-white"><?= tools::rupiah($litter) ?> -litter</button>
			<?php endif; ?>
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
		</div>
	</div>
<?php elseif($this->setPage == "showDataPemakaianMinyak") : ?>
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-bar-chart-line-fill"></i> Data Pemakaian Per-hari Dalam Bulan ini</pre>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-12 col-md-12">
					<section class="">
						<canvas id="dataMinyak" width="230px" height="230px"></canvas>
					</section>
				</div>
			</div>
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