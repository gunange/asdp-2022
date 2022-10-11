
<?php

?>

<div class="row mt-4">
    <div class="col-12 col-md-12">
        <!-- Page Header -->
        <div class="page-header mt-4 mb-5">
            <div class="card card-small shadow-sm bx-shadow">
                <div class="card-body">
                    <h5 class="text-secondary">BBM Kapal</h5>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-fill"></i> Pengolahan</a></li>
                            <li class="breadcrumb-item"><a href="#">BBM Kapal</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- row breadcumb -->
    </div>
</div>

<div class="row mt-3">
    <div class="col-6 col-md-6">
        <div class="card card-small shadow bx-shadow">
            <div class="card-header border-bottom bg-white">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3">
                    <h6 class="m-0">
                        <i class="bi bi-box text-yellow-500 me-2"></i> Input BBM Kapal
                    </h6>
                    
                </div>
            </div><!-- card-header -->


            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3 border-dark">
                       
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Pilih Kapal</label>
                            <select class="form-select form-select-sm sel-all" name="id_jenis_kelamin">
                                <option value=""></option>
                                <?php foreach ($this->model->sGetKapal() as $opsi) : ?>
                                    <option value="<?= $opsi['id'] ?>"><?= $opsi['nama_kapal'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Panjang</label>
                            <div class="input-group input-group-sm">
                                <input type="number" class="form-control form-control-sm"  placeholder="Panjang Tangki Kapal" name="panjang" required autocomplete="off">
                                <div class="input-group-text input-group-sm">cm</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- card-body -->

            <div class="btn-toolbar mb-2 mb-md-0 btn-group">

                 <button class="btn btn-sm bg-yellow text-white" 
                            title="Tambah data!" 
                            onclick="openModalShow('#modal-center-xl', '<?= $this->gLink ?>SetCrud/Pdf', ()=>{injectJsDashboardPrimary();} )">
                            <i class="bi bi-printer-fill"></i> Resset
                        </button>
                        <button class="btn btn-sm primary-bg text-white" 
                            title="Tambah data!" 
                            onclick="openModalShow('#modal', '<?= $this->gLink ?>SetCrud', ()=>{injectJsDashboardPrimary();} )">
                            <i class="bi bi-clipboard-plus"></i> Simpan
                        </button>
                       
                       
                    </div>
        </div>

    </div>
    
    <div class="col-6 col-md-6">
        <div class="card card-small shadow bx-shadow">
            <div class="card-header border-bottom bg-white">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3">
                    <h6 class="m-0">
                        <i class="bi bi-box text-yellow-500 me-2"></i> Data Grafik
                    </h6>
                    
                </div>
            </div><!-- card-header -->

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    	<div class="container-tangki">
                    		<div class="isi-tangki"></div>
                    		<div class="text-tangki text-center">
                    			<h3>50%</h3>
                    			<h2>3400773737 <span>litter</span></h2>
                    		</div>
                    	</div>
                    </div>
                    <p>Tangki Utama</p>
                </div>
            </div><!-- card-body -->

        </div>

    </div>
    
</div>