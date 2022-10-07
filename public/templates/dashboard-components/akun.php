<form class="modal-content data-form" action="<?= $this->gLink ?>upAccount">
  <div class="modal-header">
    <pre class="modal-title text-purple fs-6"><i class="bi bi-person-bounding-box"></i> Account</pre>
  </div>
  <div class="modal-body">
    <div class="row">
      <input type="hidden" name="url" value="<?= $this->gLink . $this->data['url'] ?>">
      <div class="col-md-12 mb-3">
        <label>Username</label>
        <input type="text" class="form-control form-control-sm" name="username" placeholder="Username Anda" value="<?= $this->user->username ?>" autocomplete="off">
      </div>
      <div class="col-md-12 mb-3">
        <div class="form-check form-switch">
          <input class="form-check-input cursor-pointer" type="checkbox" id="enable_password" onclick="enablePassword(this,'password');">
          <label class="form-check-label cursor-pointer" for="enable_password">Ganti Password?</label>
        </div>
        <input type="password" class="form-control form-control-sm" id="password" placeholder="Password" name="password" required disabled autocomplete="off">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-sm bg-purple text-white" data-bs-dismiss="modal">Perbahrui</button>
  </div>
</form>