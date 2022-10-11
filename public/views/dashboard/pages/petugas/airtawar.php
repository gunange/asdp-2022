<?php

?>

<div class="row mt-4">
    <div class="col-12 col-md-12">
        <!-- Page Header -->
        <div class="page-header mt-4 mb-5">
            <div class="card card-small shadow-sm bx-shadow">
                <div class="card-body">
                    <h5 class="text-secondary">Air Tawar</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-fill"></i> Pengolahan</a></li>
                            <li class="breadcrumb-item"><a href="#">Air Tawar</a></li>
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
                        <i class="bi bi-box text-yellow-500 me-2"></i> Input Air Tawar
                    </h6>
                    <div class="btn-toolbar mb-2 mb-md-0 btn-group">
                        <button class="btn btn-sm bg-purple text-white" title="Tambah data!" onclick="openModalShow('#modal', '<?= $this->gLink ?>SetKapal/add', ()=>{injectJsDashboardPrimary();} )">
                            <i class="bi bi-clipboard-plus"></i> Tambah
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
                                <th>Kapal</th>
                                <th>Perusahaan</th>
                                <th>GT</th>
                                <th>Pajak</th>
                                <th class="text-center text-white"><i class="bi bi-gear-fill"></i></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table><!-- table -->
                </div><!-- table-responsive -->

            </div><!-- card-body -->
        </div>
    </div>
</div>