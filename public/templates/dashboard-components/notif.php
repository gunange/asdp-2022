<?php foreach($this->model->GetDataDokumenExpire() as $d): ?>
	<div id="liveToast" class="toast animated me-4 mb-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" >
		<div class="toast-header">
			<i class="bi bi-lightning-charge-fill bg-pink text-white rounded-pill" style="padding: .15rem .30rem"></i>
			<strong class="ms-1 me-auto"><?= $d['nama_kapal'] ?></strong>
			<small class="text-pink"><?= $d['expire'] ?> hari lagi</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">
			Mohon untuk memperpanjang <?= $d['jenis_dokumen'] ?>
		</div>
	</div>	
	<?php endforeach; ?>