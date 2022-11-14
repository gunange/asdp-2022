</div><!-- container-xxl -->

</div><!-- content -->

</div><!-- body-content -->
</div><!-- page-content-wrapper -->
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3" id="notif-toast">
	<?php foreach($this->model->GetDataDokumenExpire() as $d): ?>
	<div id="liveToast" class="toast animated" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" >
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
</div>

<script type="text/javascript" src="<?= BaseAssets ?>js/app-dashboard.js"></script>
<script>
	
   function setNotif() {
   		var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
        	toastEl.classList.add('fadeInUp')
        
          return new bootstrap.Toast(toastEl) 
        });
       toastList.forEach(toast => toast.show());
   }
</script>
</body>
</html>