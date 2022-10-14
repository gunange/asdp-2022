<?php

if (isset($_POST['add'])) :
	$this->model->AddPetugas();
endif;


if (isset($_POST['upAkun'])) :
	$this->model->UpAkunUser();
endif;


if (isset($_POST['up'])) :
	$this->model->upPetugas();
endif;

if (isset($_POST['del'])) :
	$this->model->DelPetugas();
endif;
?>

<div class="row mt-4">
	<div class="col-12 col-md-12">
		<!-- Page Header -->
		<div class="page-header mt-4 mb-5">
			<div class="card card-small shadow-sm bx-shadow">
				<div class="card-body">
					<h5 class="text-secondary">Petugas</h5>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"> Users</li>
							<li class="breadcrumb-item"><a href="<?= $this->gLink ?>Petugas">Petugas</a></li>
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
						<i class="bi bi-box text-yellow-500 me-2"></i> Data Petugas
					</h6>
					<div class="btn-toolbar mb-2 mb-md-0 btn-group">
						<button class="btn btn-sm bg-purple text-white" title="Tambah data!" onclick="openModalShow('#modal', '<?= $this->gLink ?>SetPetugas/add', ()=>{injectJsDashboardPrimary();} )">
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
								<th>Nama</th>
								<th>Username</th>
								<th>Jenis Kelamin</th>
								<th class="text-center text-white"><i class="bi bi-gear-fill"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($this->model->GetPetugas() as $k => $d) : ?>
								<tr>
									<td><?= $k + 1 ?></td>
									<td><?= $d['nama'] ?></td>
									<td><?= $d['username'] ?></td>
									<td><?= $d['jenis_kelamin'] ?></td>
									<td class="text-center" width="120px">
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-sm bg-teal text-white" title="Update Akun" onclick="openModalShow('#modal-center', '<?= $this->gLink ?>SetPetugas/upAkun/<?= $k ?>')">
												<i class="bi bi-person-bounding-box"></i>
											</button>
											<button type="button" class="btn btn-sm bg-purple text-white" title="Update Data" onclick="openModalShow('#modal-center', '<?= $this->gLink ?>SetPetugas/up/<?= $k ?>', 
											()=>{injectJsDashboardPrimary();})">
												<i class="bi bi-pencil-fill"></i>
											</button>
											<button type="button" class="btn btn-sm bg-red text-white" title="Hapus" onclick="openModalShow('#modal-center', '<?= $this->gLink ?>SetPetugas/del/<?= $k ?>')">
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