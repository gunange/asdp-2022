<?php if ($this->setPage == "pay") : ?>
    <!-- PAY -->
    <form class="modal-content data-form" method="POST" action="<?= $this->gLink ?>SetAirTawar/postDelayAirTawar">
        <div class="modal-header">
            <pre class="modal-title fs-6 text-warning"><i class="bi bi-cash"></i> Bayar</pre>
        </div>
        <div class="modal-body">
            <p class="fs-6">Apakah anda akan mengkonfirmasi pembayaran <span class="text-red-400"><?= $this->data['nama_kapal'] ?></span> di <span class="text-red-400"><?= $this->data['dermaga'] ?></span> pada tanggal <span class="text-red-400"><?= $this->data['tgl'] ?></span>?</p>
            <input type="hidden" value="<?= $this->data['id'] ?>" name="id_air_tawar">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Bayar</button>
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