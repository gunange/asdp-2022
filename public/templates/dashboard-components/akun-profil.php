
<form class="modal-content data-form" action="<?= $this->gLink ?>upProfil">
  <div class="modal-header">
    <pre class="modal-title text-purple fs-6"><i class="bi bi-person-bounding-box"></i> Profil</pre>
  </div>
  <div class="modal-body">
    <div class="row">
      <input type="hidden" name="url" value="<?= $this->gLink . $this->data['url'] ?>">
      <div class="col-md-12 mb-3">
        <label>Nama</label>
        <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama Anda" value="<?= $this->user->nama ?>" autocomplete="off">
      </div>
      <div class="col-md-12 mb-3">
        <label>Jenis Kelamin</label>
        <select class="form-select form-select-sm sel-all" name="id_jenis_kelamin">
            <option value="<?= $this->user->id_jenis_kelamin ?>"><?= $this->user->jenis_kelamin ?></option>
            <?php foreach ($this->model->sGetJenisKelamin("WHERE id != '{$this->user->id_jenis_kelamin}'") as $opsi) : ?>
              <option value="<?= $opsi['id'] ?>"><?= $opsi['jenis_kelamin'] ?></option>
            <?php endforeach; ?>
          </select>
      </div>
      
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-sm bg-purple text-white" data-bs-dismiss="modal">Perbahrui</button>
  </div>
</form>