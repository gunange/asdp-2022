<div class="row mt-4">
    <div class="col-12 col-md-12">
        <!-- Page Header -->
        <div class="page-header mt-4 mb-5">
            <div class="card card-small shadow-sm bx-shadow">
                <div class="card-body">
                    <h5 class="text-secondary"> Invoice Sandar</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> Invoice</li>
                            <li class="breadcrumb-item"><a href="<?= $this->gLink ?>InvoiceDataSandar"> Sandar</a></li>
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
                        <i class="bi bi-box text-yellow-500 me-2"></i> Data Invoice Sandar
                    </h6>
                    <div class="btn-toolbar mb-2 mb-md-0 btn-group">
                        <button class="btn btn-sm bg-teal text-white" 
                            title="Tambah data!" 
                            onclick="openModalShow('#modal', '<?= $this->gLink ?>SetInvoiceSandar/filter-print', ()=>{injectJsDashboardPrimary();} )">
                            <i class="bi bi-printer-fill"></i> Print Doc.
                        </button>
                    </div>
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
                                <th>Akumulasi</th>
                                <th>Tanggal</th>
                                <th>Shift</th>
                                <th>Nama Kapal</th>
                                <th>Dermaga</th>
                                <th>Waktu Sandar</th>
                                <th>Lama Sandar</th>
                                <th>Tagihan Sandar</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->model->GetDataSandar() as $k => $d) : ?>
                                <tr>
                                    <td><?= $k + 1 ?></td>
                                    <td><?= $d['waktu_awal'] . ' - ' . $d['waktu_akhir'] ?></td>
                                    <td><?= $d['akumulasi_menit'] ?></td>
                                    <td><?= $d['tgl'] ?></td>
                                    <td><?= $d['shift'] ?></td>
                                    <td><?= $d['nama_kapal'] ?></td>
                                    <td><?= $d['dermaga'] ?></td>
                                    <td><?= $d['waktu_awal'] ?></td>
                                    <td><?= $d['lama_sandar'] ?></td>
                                    <td>Rp. <?= tools::rupiah($d['total_sandar']) ?></td>
                                    <td>
                                        <button class="btn btn-sm bg-purple text-white" title="Lunas !" onclick="openModalShow('#modal-center-lg', '<?= $this->gLink ?>SetSandar/Lunas/<?= $d['id'] ?>', ()=>{injectJsDashboardPrimary();} )">
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