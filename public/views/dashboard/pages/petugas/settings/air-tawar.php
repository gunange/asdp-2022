<?php if ($this->setPage == "Pengolahan") : ?>
	<!-- PDF -->
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-teal"><i class="bi bi-filetype-pdf"></i> PDF</pre>
		</div>
		<div class="modal-body p-0">

			<iframe width="100%" height="600px" frameborder="0" src="<?= $this->gLink ?>PdfAirTawar/Pengolahan/<?= $this->id ?>"></iframe>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
		</div>
	</div>
<?php elseif ($this->setPage == "Bayar") : ?>
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-teal"><i class="bi bi-filetype-pdf"></i> PDF</pre>
		</div>
		<div class="modal-body p-0">

			<iframe width="100%" height="600px" frameborder="0" src="<?= $this->gLink ?>PdfAirTawar/Pengolahan/<?= $this->id ?>"></iframe>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm bg-purple text-white" onclick="window.location.href='<?= $this->gLink ?>DelayedAirTawar'"><i class="bi bi-arrow-clockwise"></i> Reload</button>
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
		</div>
	</div>
<?php elseif ($this->setPage == "Lunas") : ?>
	<!-- PDF -->
	<div class="modal-content">
		<div class="modal-header">
			<pre class="modal-title fs-6 text-teal"><i class="bi bi-filetype-pdf"></i> PDF</pre>
		</div>
		<div class="modal-body p-0">


			<iframe width="100%" height="600px" frameborder="0" src="<?= $this->gLink ?>PdfAirTawar/Lunas/<?= $this->id ?>"></iframe>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
		</div>
	</div>

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