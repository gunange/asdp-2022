<?php if ($this->setPage == "confirmDokumen") : ?>
	<!-- UP -->
	<form class="modal-content data-form" method="POST" action="<?= $this->gLink ?>PostFormDokumen">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-purple"><i class="bi bi-file-earmark-text"></i> Konfirmasi</pre>
		</div>
		<div class="modal-body">
			
			<?php if ($this->data->action) : ?>
				<div class="row doc-show">
					<div class="col-md-12 mb-4 text-center">
						<h1><i class="bi bi-filetype-doc" style="color: <?= $this->data->dataJenisDokumen->warna ?> !important"></i></h1>
						<h6 class="fs-7"><?= $this->data->dataJenisDokumen->jenis_dokumen ?></h6>
						<?php if ($this->data->selisiWaktu > 0 ): ?>
							<p class="mb-0">Sisa <?= $this->data->selisiWaktu ?> hari lagi</p>
						<?php else: ?>
							<p class="mb-0 text-red">Waktu melewati <?= $this->data->selisiWaktu ?> hari</p>
						<?php endif; ?>
						<p>Expired : <?= tools::indoTime($this->data->expire) ?></p>
					</div>
				</div>
				<input type="hidden" name="id_kapal" value="<?= $this->data->idKapal ?>">
				<input type="hidden" name="id_jenis_dokumen" value="<?= $this->data->jenisDokumen ?>">
				<input type="hidden" name="tgl_berlaku" value="<?= $this->data->expire ?>">
			<?php else : ?>
				<h6 class="text-pink-400 text-center">Anda harus melengkapi form lebih dulu</h6>
			<?php endif; ?>
		</div>

		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
			<?php if ($this->data->action ) : ?>
				<button type="submit" class="btn btn-sm bg-purple text-white">Submit</button>
			<?php endif; ?>
		</div>
	</form>
<?php elseif ($this->setPage == "getNotif") : ?>
	<div id="liveToast" class="toast animated fadeInUp" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" >
		<div class="toast-header">
			<i class="bi bi-lightning-charge-fill bg-pink text-white rounded-pill" style="padding: .15rem .30rem"></i>
			<strong class="ms-1 me-auto">Bootstrap New</strong>
			<small>11 mins ago</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">
			Hello, world! This is a toast message.
		</div>
	</div>
<?php elseif ($this->setPage == "getDataDokumen") : ?>
	
	<?php if (count($this->data) > 0 ): ?>

	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 doc-show">
		<?php foreach ($this->data as $k => $d) : ?>
			<?php 
				$expire = tools::GetSelisiHari(date('Y-m-d'), $d['tgl_berlaku']) ;
			 ?>
			<div class="col-md-6 mb-4 text-center cursor-pointer">
				<h1><i class="bi bi-filetype-doc" style="color: <?= $d['warna'] ?> !important"></i></h1>
				<h6 class="fs-7"><?= $d['jenis_dokumen'] ?></h6>
				<p class="mb-0">Sisa <?= $expire ?> hari lagi</p>
				<p>Expired : <?= tools::indoTime($d['tgl_berlaku']) ?></p>
			</div>
		<?php endforeach; ?>
	</div>
	<?php else: ?>
		<div class="text-center">
			<h6 class="text-red-300">Belum ada data</h6>
		</div>
	<?php endif; ?>

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