<div class="row mt-4">
    <div class="col-12 col-md-12">
        <!-- Page Header -->
        <div class="page-header mt-4 mb-5">
            <div class="card card-small shadow-sm bx-shadow">
                <div class="card-body">
                    <h5 class="text-secondary"> Invoice Air Tawar</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Invoice</li>
                            <li class="breadcrumb-item"><a href="<?= $this->gLink ?>InvoiceAirTawar">Air Tawar</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- row breadcumb -->
    </div>
</div>

<div class="row mt-4">
    <div class="col-12 col-md-12">
        <div class="card card-small shadow bx-shadow">
            <div class="card-header border-bottom bg-white">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3">
                    <h6 class="m-0">
                        <i class="bi bi-box text-yellow-500 me-2"></i> Data Invoice Air Tawar
                    </h6>

                </div>
            </div><!-- card-header -->
            <div class="card-body">
                <div class="table-responsive">

                    <!-- table -->
                    <table id="DataTable" class="table">
                        <thead>
                            <tr>
                                <th width="50px">#</th>
                                <th>Waktu</th>
                                <th>Tanggal</th>
                                <th>Shift</th>
                                <th>Nama Kapal</th>
                                <th>Dermaga</th>
                                <th>Debit Air</th>
                                <th>Tagihan Air Tawar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->model->GetAirTawar() as $k => $d) : ?>
                                <tr>
                                    <td><?= $k + 1 ?></td>
                                    <td><?= $d['waktu'] ?></td>
                                    <td><?= $d['tgl'] ?></td>
                                    <td><?= $d['shift'] ?></td>
                                    <td><?= $d['nama_kapal'] ?></td>
                                    <td><?= $d['dermaga'] ?></td>
                                    <td><?= $d['debit_air'] ?> Liter</td>
                                    <td>Rp. <?= $d['total_air_tawar'] ?></td>
                                    <td>
                                        <button class="btn btn-sm bg-purple text-white" 
                                            title="Lunas !" 
                                            onclick="openModalShow('#modal', '<?= $this->gLink ?>SetAirTawar/Lunas/<?= $k ?>', ()=>{injectJsDashboardPrimary();} )">
                                            <i class="bi bi-check-lg"></i> <?= $d['status'] ?>
                                        </button>
                                    </td>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table><!-- table -->
                </div><!-- table-responsive -->

            </div><!-- card-body -->
        </div>
    </div>

</div>