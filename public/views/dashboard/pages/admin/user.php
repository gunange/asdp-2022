

<div class="row mt-4">
  <div class="col-12 col-md-12">
    <!-- Page Header -->
    <div class="page-header mt-4 mb-5">
      <div class="card card-small shadow-sm bx-shadow">
        <div class="card-body">
          <h5 class="text-secondary">Dashboard Settings</h5>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-fill"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Library</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li>
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
						<i class="bi bi-box text-yellow-500 me-2"></i> Settings User
					</h6>
					<div class="btn-toolbar mb-2 mb-md-0 btn-group">
						<button class="btn btn-sm bg-purple text-white" 
							title="Tambah data!" 
							onclick="openModalShow('#modal', '<?= $this->gLink ?>SetCrud', ()=>{injectJsDashboardPrimary();} )">
							<i class="bi bi-clipboard-plus"></i> Tambah
						</button>
						<button class="btn btn-sm bg-pink text-white" 
							title="Tambah data!" 
							onclick="openModalShow('#modal-center-xl', '<?= $this->gLink ?>SetCrud/Pdf', ()=>{injectJsDashboardPrimary();} )">
							<i class="bi bi-printer-fill"></i> PDF to Print
						</button>
						<button class="btn btn-sm bg-green text-white" 
							title="Tambah data!" 
							onclick="exportExcel('#DataTable', 'Export Excel');">
							<i class="bi bi-file-earmark-spreadsheet-fill"></i> Export Excel
						</button>
						<button class="btn btn-sm bg-teal text-white" 
							title="Tambah data!" 
							onclick="exportCsv('#DataTable', 'Export CSV');">
							<i class="bi bi-file-earmark-spreadsheet-fill"></i> Export CSV
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
								<th>Field Pertama</th>
								<th>Field Kedua</th>
								<th width="70px">Arsip</th>
								<th class="text-center text-white"><i class="bi bi-gear-fill"></i></th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td>1</td>
								<td>Lorem, ipsum.</td>
								<td>Lorem, ipsum.</td>
								<td>Lorem, ipsum.</td>
								<td class="text-center" width="120px">
									<div class="btn-group" role="group">
										<button type="button" class="btn btn-sm bg-purple text-white" title="Update Data" 
											onclick="openModalShow('#modal-center', '<?= $this->gLink ?>SetCrud/', 
											()=>{injectJsDashboardPrimary();})">
											<i class="bi bi-pencil-fill"></i>
										</button>
										<button type="button" class="btn btn-sm bg-red text-white" title="Hapus" 
											onclick="openModalShow('#modal-center', '<?= $this->gLink ?>SetCrud/')">
											<i class="bi bi-trash-fill"></i>
										</button>
									</div>
								</td>
								
							</tr>
							
						</tbody>

					</table><!-- table -->
				</div><!-- table-responsive -->

			</div><!-- card-body -->
		</div>
	</div>
</div>
