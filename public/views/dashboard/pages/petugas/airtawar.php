<div class="row mt-4">
    <div class="col-12 col-md-12">
        <!-- Page Header -->
        <div class="page-header mt-4 mb-5">
            <div class="card card-small shadow-sm bx-shadow">
                <div class="card-body">
                    <h5 class="text-secondary"> Air Tawar</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Pengolahan</li>
                            <li class="breadcrumb-item"><a href="<?= $this->gLink ?>AirTawar">Air Tawar</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- row breadcumb -->
    </div>
</div>

<div class="row mt-4">
    <?php foreach ($this->model->GetDermaga() as $k => $dermaga) : ?>

        <div class="col-6 col-md-6 mb-4">
            <div class="card card-small shadow bx-shadow">
                <form class="data-form" method="POST" action="<?= $this->gLink ?>SetAirTawar/postForm">

                    <div class="card-header border-bottom bg-white">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3">
                            <h6 class="m-0">
                                <i class="bi bi-bricks   me-2"></i>
                                <?= $dermaga['dermaga'] ?>
                            </h6>

                        </div>
                    </div><!-- card-header -->


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3 border-dark">

                                <input type="hidden" name="id_dermaga" value="<?= $dermaga['id'] ?>">

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Kapal</label>
                                    <select name="id_kapal" id="namakapal<?= $dermaga['id'] ?>" required class="form-select form-select-sm sel-all set-default<?= $dermaga['id'] ?>">
                                        <option value=""></option>
                                        <?php foreach ($this->model->GetKapal() as $opsi) : ?>
                                            <option value="<?= $opsi['id'] ?>"><?= $opsi['nama_kapal'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Debit Air</label>
                                    <div class="input-group input-group-sm">
                                        <input name="debit_air" onkeyup="getLiter('<?= $dermaga['id'] ?>', <?= $dermaga['tarif'] ?>)" id="debitair<?= $dermaga['id'] ?>" type="number" class="form-control form-control-sm" placeholder="0" required autocomplete="off">
                                        <div class="input-group-text input-group-sm">Liter</div>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Tarif</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-text input-group-sm">Rp.</div>

                                        <input name="tarif_air" id="tarif_air<?= $dermaga['id'] ?>" type="number" class="form-control form-control-sm d-none" placeholder="0" readonly value="<?= $dermaga['tarif'] ?>" >
                                        <input name="total_air_tawar" id="totaltarifair<?= $dermaga['id'] ?>" type="number" class="form-control form-control-sm" placeholder="0" required autocomplete="off" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="statusdebitair<?= $dermaga['id'] ?>" required class="form-select form-select-sm sel-all set-default<?= $dermaga['id'] ?>">
                                        <option value=""></option>

                                        <option value="Belum Bayar" class="text-danger">Belum Bayar</option>
                                        <option value="Lunas" class="text-success">Lunas</option>
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div><!-- card-body -->

                    <div class="btn-toolbar mb-2 mb-md-0 btn-group">

                        <button class="btn btn-sm bg-yellow text-white" title="Reset" type="button" onclick="resetdebitair('<?= $dermaga['id'] ?>')">
                            <i class="bi bi-printer-fill"></i> Reset
                        </button>
                        <button class="btn btn-sm primary-bg text-white" title="Simpan" name="add" type="submit">
                            <i class="bi bi-clipboard-plus"></i> Simpan
                        </button>

                    </div>
                </form>

            </div>

        </div>

    <?php endforeach; ?>

</div>

<script>
    setForm();
</script>