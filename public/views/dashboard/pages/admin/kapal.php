<?php

if (isset($_POST['add'])) :
	$this->model->AddKapal();
endif;

if (isset($_POST['up'])) :
	$this->model->UpKapal();
endif;

if (isset($_POST['del'])) :
	$this->model->DelKapal();
endif;
?>

<div class="row mt-4">
	<div class="col-12 col-md-12">
		<!-- Page Header -->
		<div class="page-header mt-4 mb-5">
			<div class="card card-small shadow-sm bx-shadow">
				<div class="card-body">
					<h5 class="text-secondary">Kapal</h5>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"> Management</li>
							<li class="breadcrumb-item active" aria-current="page"><a href="<?= $this->gLink ?>Kapal">Kapal</a></li>
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
						<i class="bi bi-box text-yellow-500 me-2"></i> Data Kapal
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
							<?php foreach ($this->model->GetKapal() as $k => $d) : ?>
								<tr>
									<td><?= $k + 1 ?></td>
									<td><?= $d['nama_kapal'] ?></td>
									<td><?= $d['perusahaan'] ?></td>
									<td><?= $d['gt'] ?></td>
									<td><?= $d['pajak'] ?></td>
									<td class="text-center" width="120px">
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-sm bg-teal text-white" title="Tangki Kapal" onclick="window.location.href='<?= $this->gLink ?>TangkiKapal/<?= $k ?>'">
												<i class="bi bi-clipboard2-x-fill"></i>
											</button>
											<button type="button" class="btn btn-sm bg-purple text-white" title="Update Data" onclick="openModalShow('#modal-center', '<?= $this->gLink ?>SetKapal/up/<?= $k ?>', 
											()=>{injectJsDashboardPrimary();})">
												<i class="bi bi-pencil-fill"></i>
											</button>
											<button type="button" class="btn btn-sm bg-red text-white" title="Hapus" onclick="openModalShow('#modal-center', '<?= $this->gLink ?>SetKapal/del/<?= $k ?>')">
												<i class="bi bi-trash-fill"></i>
											</button>
										</div>
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