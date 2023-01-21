<?php if ($this->setPage == "showTangkiKapal") : ?>

	<?php
	$saldoKanan = 0;
	$saldoKiri = 0;
	$dataSaldoHarianKanan =  $this->model->GetDataSaldo($this->model->HistoryTangkiKananKapalDay($this->id));
	$dataSaldoHarianKiri =  $this->model->GetDataSaldo($this->model->HistoryTangkiKiriKapalDay($this->id));
	$dataSaldoIndukKanan =  $this->model->GetDataSaldo($this->model->HistoryTangkiKananKapalInduk($this->id));
	$dataSaldoIndukKiri =  $this->model->GetDataSaldo($this->model->HistoryTangkiKiriKapalInduk($this->id));



	if (!is_null($dataSaldoHarianKanan)) :
		$saldoKanan = round(@json_decode($dataSaldoHarianKanan)[0], 1);
	endif;


	if (!is_null($dataSaldoHarianKiri)) :
		$saldoKiri = round(@json_decode($dataSaldoHarianKiri)[0], 1);
	endif;

	if (!is_null($dataSaldoIndukKanan)) :
		$saldoIndukKanan = round(@json_decode($dataSaldoIndukKanan)[0], 1);
	endif;

	if (!is_null($dataSaldoIndukKiri)) :
		$saldoIndukKiri = round(@json_decode($dataSaldoIndukKiri)[0], 1);
	endif;
	?>
	<!-- UP -->
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-clipboard2-x-fill"></i> Detail Tangki</pre>
		</div>
		<div class="modal-body">
			<?php if (!empty($this->data)) : ?>
				<?php $litter = 0; ?>
				<div class="row pt-5">
					<?php foreach ($this->data as $k => $d) : ?>
						<?php $tinggiMax = $this->model->HitungVolume($d['liter_tanki'], $d['tinggi'], $d['tinggi_maksimum']); ?>
						<div class="col-md-4 cols-sm-4 mt-3 mb-4">
							<section>
								<div class="container-tangki mx-auto">
									<div class="isi-tangki">
										<div class="value-tengki" style="height: <?= intval(($d['liter'] * 100) / $tinggiMax) ?>%;">
											<div class="transisi-tengki"></div>
										</div>
									</div>
									<div class="text-tangki text-center"></div>
								</div>
								<div class="text-center">
									<h5><?= tools::rupiah($d['liter']) ?> <span> (litter)</span></h5>
									<h5><?= tools::rupiah($d['tinggi_bbm']) ?> <span> (cm)</span></h5>
									<p class="mt-2 mb-1"><?= $d['jenis_tanki'] ?></p>
									<p class="mb-0"><i class="bi bi-clock-history"></i> <?= tools::indoTime($d['tgl']) ?> (<?= $d['waktu'] ?>)</p>
									<p class="mb-1">Maximal <?= $tinggiMax ?> (litter)</p>
									<p class="mb-1">Maximal <?= round($d['tinggi_maksimum'], 1) ?> (cm)</p>
								</div>
							</section>
						</div>
						<?php $litter += $d['liter'] ?>
					<?php endforeach; ?>
				</div>
			<?php else : ?>
				<div class="modal-body text-center text-red-300 fs-6">
					<p>Admin Belum menambahakan detail tangki pada kapal ini</p>
				</div>
			<?php endif; ?>
		</div>
		<div class="modal-footer">

			<?php if (!empty($this->data)) : ?>
				<button type="button" class="btn btn-sm bg-teal text-white">Saldo : <?= round($litter, 1) ?> -litter</button>
			<?php endif; ?>
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
		</div>
	</div>
<?php elseif ($this->setPage == "showDataPemakaianMinyak") : ?>
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-bar-chart-line-fill"></i> Data Saldo Per-hari Dalam Bulan ini</pre>
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
<?php elseif ($this->setPage == "showDataPemakaianMinyakByFilter") : ?>
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-bar-chart-line-fill"></i> Data Saldo Per-hari Pada <?= $this->bulan ?> <?= $this->tahun ?></pre>
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
<?php elseif ($this->setPage == "form-filter") : ?>
	<form class="modal-content data-form" method="POST" action="<?= $this->gLink ?>SetBbmKapalHistoryByFilter/<?= $this->id ?>">
		<div class="modal-header">
			<pre class="modal-title fs-7 text-purple"><i class="bi bi-calendar3"></i> Set Data</pre>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Tahun</label>
					<input class="form-control form-control-sm" type="number" placeholder="Tahun" name="tahun" required autocomplete="off" value="<?= date('Y') ?>">
				</div>
				<div class="col-md-12 mb-3">
					<label class="form-label">Bulan</label>
					<select name="bulan" class="form-select form-select-sm sel-all" required>
						<option value=""></option>
						<?php foreach (tools::OptBulan() as $kOpsi => $opsi) : ?>
							<option value="<?= $kOpsi ?>"><?= $opsi ?></option>
						<?php endforeach; ?>
					</select>
				</div>

			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-sm btn-primary">Get Grafik</button>
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