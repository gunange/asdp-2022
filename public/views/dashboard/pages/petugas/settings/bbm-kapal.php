<?php if ($this->setPage == "confirmBbbmTangki") : ?>
	<!-- UP -->
	<form class="modal-content data-form" method="POST" action="<?= $this->gLink ?>PostFormTangkiBbmKapal">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-fuel-pump-diesel-fill"></i> Konfirmasi</pre>
		</div>
		<div class="modal-body">
			<?php if ($this->data->action) : ?>
				<?php if ($this->data->liter <= $this->data->maxLiter) : ?>
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
								<p class="mb-0">Litter yang akan disimpan <?= round($this->data->liter, 1) ?> (litter) - <?= round($this->data->tinggiMinyak, 1) ?> cm</p>
								<p class="mb-0">Max tangki <?= round($this->data->maxLiter, 1) ?> (litter)</p>
								<p class="mb-0">Max tangki <?= round($this->data->dataTangki->tinggi_maksimum, 1) ?> (cm)</p>
							</div>
						</section>
					</div>
					<input type="hidden" name="id_tanki" value="<?= $this->data->dataTangki->id ?>">
					<input type="hidden" name="waktu" value="<?= $this->data->waktu ?>">
					<input type="hidden" name="tgl" value="<?= $this->data->tanggal ?>">
					<input type="hidden" name="liter" value="<?= $this->data->liter ?>">
					<input type="hidden" name="tinggi_bbm" value="<?= $this->data->tinggiMinyak ?>">
				<?php else : ?>
					<h6 class="text-pink-400 text-center">Data tinggi minyak melebihi <?= $this->data->dataTangki->jenis_tanki ?> pada kapal <?= $this->data->dataTangki->nama_kapal ?> tinggi minyak tangki adalah <?= $this->data->dataTangki->tinggi ?>cm</h6>
				<?php endif; ?>

			<?php else : ?>
				<h6 class="text-pink-400 text-center">Anda harus mengisi form lebih dulu</h6>
			<?php endif; ?>
		</div>

		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<?php if ($this->data->action && $this->data->liter <= $this->data->maxLiter) : ?>
				<button type="submit" class="btn btn-sm bg-purple text-white" data-bs-dismiss="modal" onclick="ressetInputan()">Submit</button>
			<?php endif; ?>
		</div>
	</form>
<?php elseif ($this->setPage == "getGrafikKapal") : ?>
	<?php $data = $this->model->GetStoryTangkiByIdKapal($this->id); ?>

	<?php
	$saldoKanan = 0;
	$saldoKiri = 0;

	$dataSaldoHarianKanan =  $this->model->GetDataSaldo($this->model->HistoryTangkiKananKapalDay($this->id));
	$dataSaldoHarianKiri =  $this->model->GetDataSaldo($this->model->HistoryTangkiKiriKapalDay($this->id));
	$dataSaldoIndukKanan =  $this->model->GetDataSaldo($this->model->HistoryTangkiKananKapalInduk($this->id));
	$dataSaldoIndukKiri =  $this->model->GetDataSaldo($this->model->HistoryTangkiKiriKapalInduk($this->id));

	print_r($dataSaldoHarianKanan);
	echo "<br>";
	print_r($dataSaldoIndukKanan);

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

	<?php if (!empty($data)) : ?>
		<?php $litter = 0; ?>

		<?php foreach ($data as $k => $d) : ?>

			<?php
			$tinggiMax = $this->model->HitungVolume($d['liter_tanki'], $d['tinggi'], $d['tinggi_maksimum']);


			?>
			<div class="col-md-6 mt-3 mb-4">
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
						<h5 class="mb-0"><?= round($d['liter'], 1) ?> <span> (litter)</span></h5>
						<h6><?= round($d['tinggi_bbm'], 1) ?> <span> (cm)</span></h6>
						<p class="mt-2 mb-1"><?= $d['jenis_tanki'] ?></p>
						<p class="mb-0"><i class="bi bi-clock-history"></i> <?= tools::indoTime($d['tgl']) ?> (<?= $d['waktu'] ?>)</p>
						<p class="mb-0">Maximal <?= round($tinggiMax, 1) ?> (litter)</p>
						<p class="mb-1">Maximal <?= round($d['tinggi_maksimum'], 1) ?> (cm)</p>
					</div>

				</section>
			</div>
			<?php $litter += $d['liter'] ?>
		<?php endforeach; ?>

		<div class="border-top pt-2">
			<h5>Saldo Terbaru = <?= round($litter, 1) ?> -liter</h5>


			<h4>Total Saldo Harian = <?= $saldoKanan + $saldoKiri + $saldoIndukKanan + $saldoIndukKiri ?> -liter</h4>
		</div>

	<?php else : ?>
		<h5 class="text-center mt-3">Kapal yang anda pilih belum ada history nya</h5>
	<?php endif; ?>

<?php elseif ($this->setPage == "getOption") : ?>

	<?php foreach ($this->model->GetTangkiKapalById($this->id) as $k => $d) : ?>
		<option value="<?= $d['id'] ?>"><?= $d['jenis_tanki'] ?></option>
	<?php endforeach; ?>
<?php elseif ($this->setPage == "getCctvKapal") : ?>
	<video width="100%" height="240" autoplay controls>
		<source src="%StreamURL%" type="video/mp4">
		<object width="320" height="240" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
			<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" />
			<param name="flashvars" value='config={"clip": {"url": "%StreamURL%", "autoPlay":true, "autoBuffering":true}}' />
			<p><a href="%StreamURL%">view with external app</a></p>
		</object>
	</video>
<?php elseif ($this->setPage == "OpsiShift") : ?>
	<form class="modal-content data-form" method="POST" action="<?= $this->gLink ?>PostShit">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-cyan"><i class="bi bi-person-bounding-box"></i> Pilih</pre>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12 mb-3">
					<label class="form-label">Pilih Shift</label>
					<select class="form-select form-select-sm sel-all" name="post_shift">
						<option value="1">Shift Satu</option>
						<option value="2">Shift Dua</option>
					</select>
				</div>

			</div>

		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-sm btn-primary">OK</button>
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