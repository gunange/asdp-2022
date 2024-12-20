<div class="row mt-4">
    <div class="col-12 col-md-12">
        <!-- Page Header -->
        <div class="page-header mt-4 mb-5">
            <div class="card card-small shadow-sm bx-shadow">
                <div class="card-body">
                    <h5 class="text-secondary"> <i class="bi bi-download text-blue-500 me-1"></i> Kapal Sandar</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-fill"></i> Pengolahan</a></li>
                            <li class="breadcrumb-item"><a href="#">Input Kapal Sandar</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- row breadcumb -->
    </div>
</div>

<div class="row mt-4">
    <?php foreach ($this->model->GetDermaga() as $k => $dermaga) : ?>

        <div class="col-6 col-md-6" id="dermaga<?= $k ?>">
            <div class="card card-small shadow bx-shadow">
                <form class="data-form" method="POST" action="<?= $this->gLink ?>SetSandar/postForm">

                    <div class="card-header border-bottom bg-white">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3">
                            <h6 class="m-0">
                                <i class="bi bi-bricks   me-2"></i>
                                Sandar <?= $dermaga['dermaga'] ?>
                            </h6>
                            <h6 class="mb-0" id="start<?= $k ?>"></h6>

                        </div>
                    </div><!-- card-header -->


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3 border-dark">

                                <input type="hidden" name="id_dermaga" value="<?= $dermaga['id'] ?>">

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Pilih Kapal</label>
                                    <select name="data_id_gt" id="data_id_gt<?= $k ?>" required class="form-select form-select-sm sel-all set-default<?= $k ?>">
                                        <option value=""></option>
                                        <?php foreach ($this->model->GetKapal() as $opsi) : ?>
                                            <option value="<?= $opsi['id'] . '-' . $opsi['gt'] ?>"><?= $opsi['nama_kapal'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <input type="hidden" name="gt" id="gt<?= $k ?>">
                                <input type="hidden" name="id_kapal" id="id_kapal<?= $k ?>">
                                <input type="hidden" id="tarif_dermaga<?= $k ?>" value="<?= $dermaga['tarif'] ?>">
                                <input type="hidden" id="key_sandar<?= $k ?>" name="key_sandar" value="<?= $k ?>">
                                <input type="hidden" id="akumulasi_menit<?= $k ?>" value="" name="akumulasi_menit">
                                <input type="hidden" id="total_call<?= $k ?>" value="" name="total_call">

                                <div class="col-12 mb-3">
                                    <label class="form-label">Start</label>
                                    <div class="input-group input-group-sm">
                                        <input name="waktu_awal" id="live<?= $k ?>" id="" type="text" class="form-control form-control-sm" placeholder="00:00:00" required autocomplete="off" readonly>
                                        <div class="input-group-text input-group-sm"><i class="bi bi-clock-history"></i></div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Stop</label>
                                    <div class="input-group input-group-sm">
                                        <input name="waktu_akhir" id="stop<?= $k ?>" type="text" class="form-control form-control-sm" placeholder="00:00:00" required autocomplete="off" readonly>
                                        <div class="input-group-text input-group-sm"><i class="bi bi-clock-history"></i></div>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Tarif</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-text input-group-sm">Rp.</div>
                                        <input name="total_sandar" id="total_sandar<?= $k ?>" type="text" class="form-control form-control-sm" placeholder="0" required autocomplete="off" readonly>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="status_debit_air<?= $k ?>" required class="form-select form-select-sm sel-all set-default<?= $k ?>">
                                        <option value=""></option>

                                        <option value="Belum Bayar" class="text-danger">Belum Bayar</option>
                                        <option value="Lunas" class="text-success">Lunas</option>
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div><!-- card-body -->

                    <div class="btn-toolbar mb-2 mb-md-0 btn-group">
                        <div id="tombol-waktu<?= $k ?>">
                            <button class="btn btn-sm bg-teal text-white" type="button" title="Start" onclick="startTime('<?= $k ?>');">
                                <i class="bi bi-play-fill"></i> Start
                            </button>
                        </div>

                        <button class="btn btn-sm primary-bg text-white" title="Simpan" name="add" disabled id="tombol-simpan<?= $k ?>">
                            <i class="bi bi-clipboard-plus"></i> Simpan
                        </button>


                    </div>
                </form>

            </div>

        </div>

    <?php endforeach; ?>

</div>

<script>
    function setTime(id = "", on = 0) {

        if (document.getElementById('dermaga' + id).classList.contains('active')) {

            var date = new Date();
            var h = date.getHours();
            var m = date.getMinutes();
            var s = date.getSeconds();

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

            var time = h + ":" + m + ":" + s;

            document.getElementById('live' + id).value = time;


            if (on == 0) {

                document.getElementById('tombol-waktu' + id).innerHTML =
                    `<button class="btn btn-sm bg-red text-white" type="button" title="Stop" onclick="stopTime('${id}', '${date.getTime()}');">
                        <i class="bi bi-stop-fill"></i> Stop
                    </button>`;
                document.getElementById('start' + id).innerHTML = time;
            }


            setTimeout(() => {
                setTime(id, 1)
            }, 1000)
        }

    }

    function startTime(id = "") {

        document.getElementById('dermaga' + id).classList.add('active');
        var dataKapal = document.getElementById('data_id_gt' + id ).value ;
        if (dataKapal !== ""){
            ex = dataKapal.split("-");
            
            document.getElementById('id_kapal' + id).value = ex[0];
            document.getElementById('gt' + id).value = ex[1];

            setTime(id);
        }

    }

    function stopTime(id = "", waktuLama, ) {
        var nTime = Math.floor((new Date().getTime() - waktuLama) / 1000);
        var lamaWaktu = HitungRangeWaktu(nTime);
        var call = HitungCall(nTime);

        HitungTarifSandar(call, id)

        document.getElementById('tombol-simpan' + id).disabled = false ;

        document.getElementById('dermaga' + id).classList.remove('active');
        document.getElementById('tombol-waktu' + id).innerHTML =
            `<button class="btn btn-sm bg-yellow text-white" type="button" title="Resset" onclick="ressetTime('${id}');">
                        <i class="bi bi-arrow-clockwise"></i> Resset
                    </button>`;
        document.getElementById('stop' + id).value = document.getElementById('live' + id).value;
        document.getElementById('live' + id).value = document.getElementById('start' + id).innerText;

        document.getElementById('start' + id).innerText = "Jumlah call : " + call + ` ( ${lamaWaktu} )`;
        document.getElementById('akumulasi_menit' + id).value = lamaWaktu ;
        document.getElementById('total_call' + id).value = call ;

    }

    function ressetTime(id = "") {
        document.getElementById('tombol-waktu' + id).innerHTML = `
                    <button class="btn btn-sm bg-teal text-white" type="button" title="Start" onclick="startTime('${id}');">
                        <i class="bi bi-play-fill"></i> Start
                    </button>`;
        document.getElementById('tombol-simpan' + id).disabled = true ;
        document.getElementById('live' + id).value = "";
        document.getElementById('stop' + id).value = "";
        document.getElementById('id_kapal' + id).value = "";
        document.getElementById('total_sandar' + id).value = "" ;
        document.getElementById('akumulasi_menit' + id).value = "" ;
        document.getElementById('start' + id).innerHTML = "";

        $('#data_id_gt' + id).val('').trigger('change');
        $('#status_debit_air' + id).val('').trigger('change');


    }
</script>

<script>
    function HitungTarifSandar(call, id) {
 
        var tarifDermaga =  document.getElementById('tarif_dermaga' + id).value
        var gt = document.getElementById('gt' + id).value ;
        var tarif = (tarifDermaga * call * gt ) - ((tarifDermaga * call * gt ) * 2 / 100) ;

        document.getElementById('total_sandar' + id).value = tarif;
    }

    function HitungRangeWaktu(n) {
        var h = 0;
        var j = 0;
        var m = 0;
        var d = 0;

        while (n >= 86400) {
            h++;
            n = n - 86400;

        }

        while (n >= 3600) {
            j++;
            n = n - 3600;

        }

        while (n >= 60) {
            m++;
            n = n - 60;

        }

        d = n;

        j = (j < 10) ? "0" + j : j;
        m = (m < 10) ? "0" + m : m;
        d = (d < 10) ? "0" + d : d;

        return j + ":" + m + ":" + d;
    }

    function HitungCall(n) {
        n = Math.floor(n / 60);
        call = 1;

        while (n > 50) {
            call++;
            n = Math.floor(n - 50);
        }

        return call;

    }
</script>

<script>
    setForm()
</script>