
<!-- row breadcumb -->
<div class="row mt-4">
  <div class="col-12">
   <div class="card card-small shadow-sm bx-shadow">
    <div class="card-body">
     <h1 class="mt-4">Selamat Datang, <?= $this->user->nama ?></h1>
      <p class="fs-5">Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Atque tempora officia unde corporis ut, voluptatibus, dolor, provident facere quam nihil alias ipsa, laboriosam consectetur natus a vero voluptatem cum molestiae.</p>
  </div>
</div>
</div>
</div><!-- row breadcumb -->

<?php 
  $iconV = "<i class=\"bi bi-check-circle-fill\"></i>";
  $iconX = "<i class=\"bi bi-x-circle-fill text-white \"></i>";
 ?>

<div class="row mt-3 dash-row">
  <div class="col-lg-6 col-sm-6 mt-3">
    <div class="card card-small shadow-sm bx-shadow px-3 bg-blue-400 text-white">
      <div class="d-flex px-4">
        <div class="item-1">
          <i class="bi bi-person-lines-fill"></i>
        </div>
        <div class="item-2 ps-3 py-4">
          <h2>
            <?= $iconV ?>
          </h2>
          <p class="mt-2 fs-6">Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-sm-6 mt-3">
    <div class="card card-small shadow-sm bx-shadow px-3 bg-purple text-white">
      <div class="d-flex px-4">
        <div class="item-1">
          <i class="bi bi-diagram-3"></i>
        </div>
        <div class="item-2 ps-3 py-4">
          <h2>
            <?= $iconX ?>
          </h2>
          <p class="mt-2 fs-6">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>
      </div>
    </div>
  </div>
  
</div>