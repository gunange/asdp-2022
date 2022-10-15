

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
              <li class="breadcrumb-item"><a href="<?= $this->gLink ?>BbmKapalListTahun">Data Per-Tahun</a></li>
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
						<i class="bi bi-box text-yellow-500 me-2"></i> BBM Kapal List Bulan
					</h6>
					
				</div>
			</div><!-- card-header -->

			<div class="card-body">
				<div class="table-responsive">

					<!-- table -->
					<table id="DataTable" class="table table-hover">
						<thead>
							<tr>
								<th width="50px">#</th>
								<th>Tahun</th>
								<th class="text-center text-white"><i class="bi bi-gear-fill"></i></th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td>1</td>
								<td>Oktober</td>
								<td class="text-center" width="120px">
									<div class="btn-group" role="group">
										
										<button type="button" class="btn btn-sm primary-bg text-white" title="Goo .." 
											onclick="window.location.href='<?= $this->gLink ?>BbmKapalListHari/<?= $this->tahun ?>/10'">
											<i class="bi bi-capslock-fill"></i>
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
