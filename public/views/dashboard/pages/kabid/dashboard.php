
<!-- row breadcumb -->
<div class="row mt-5">
  <div class="col-12">
   <div class="card card-small shadow-sm bx-shadow">
    <div class="card-body">
     <h1 class="mt-4">Selamat Datang, <?= $this->user->nama ?></h1>
     <p class="fs-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. A distinctio at recusandae dolorum voluptas fugiat ea, maxime odit vitae suscipit assumenda atque ex officiis veritatis voluptates illo laudantium quas asperiores est eos placeat, exercitationem. Ratione sed commodi omnis dolores vitae ea eum! Quam nemo, porro laboriosam quas. Fugit repellat, qui?.</p>
  </div>
</div>
</div>
</div><!-- row breadcumb -->

<div class="row mt-3 dash-row small">
  <div class="col-lg-3 col-sm-6 mt-3">
    <div class="card card-small shadow-sm bx-shadow px-3 bg-blue-400 text-white">
      <div class="d-flex px-4">
        <div class="item-1">
          <i class="bi bi-calendar2-event-fill"></i>
        </div>
        <div class="item-2 ps-3 py-4">
          <h1>0</h1>
          <p class="">Lorem.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 mt-3">
    <div class="card card-small shadow-sm bx-shadow px-3 bg-green-400 text-white">
      <div class="d-flex px-4">
        <div class="item-1">
          <i class="bi bi-hourglass-split"></i>
        </div>
        <div class="item-2 ps-3 py-4">
          <h1>0</h1>
          <p class="">Pelayanan Kapal</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 mt-3">
    <div class="card card-small shadow-sm bx-shadow px-3 bg-purple text-white">
      <div class="d-flex px-4">
        <div class="item-1">
          <i class="bi bi-people-fill"></i>
        </div>
        <div class="item-2 ps-3 py-4">
          <h1>0</h1>
          <p class="">User Pelayanan</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 mt-3">
    <div class="card card-small shadow-sm bx-shadow px-3 bg-yellow-600 text-white">
      <div class="d-flex px-4">
        <div class="item-1">
          <i class="bi bi-file-earmark-text-fill"></i>
        </div>
        <div class="item-2 ps-3 py-4">
          <h1>0</h1>
          <p class="">Data Kapal</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-12 col-md-12">
    <div class="card card-small shadow bx-shadow">
      <div class="card-header border-bottom bg-white">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3">
          <h6 class="m-0">
            <i class="bi bi-box text-yellow-500 me-2"></i> Data Kapal Per-Bulan
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
