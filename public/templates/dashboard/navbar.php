<div id="page-wrapper">
	<!-- navbar wrapper -->
	<nav class="navbar navbar-dark second-bg shadow-sm py-2">
		<div class="container-fluid">
			<div class="text-white ps-3 d-flex align-items-center">
				<!-- <i class="bi bi-geo-fill fs-2 me-2"></i> -->
				<h6 class="mt-2 ms-2">Your Name Aplication</h6>
			</div>
			<a href="#" class="me-4 ms-auto position-relative">
				<i class="bi bi-bell fs-5 text-white"></i>
				<span class="position-absolute top-1 translate-middle p-1 bg-white rounded-circle"></span>
			</a>

			<div class="dropdown border-start ps-3">
				<a class="navbar-brand fs-7 dropdown-toggle" href="#" role="button" id="navUser" data-bs-toggle="dropdown" aria-expanded="false">
					<img src="<?= BaseAssets ?>/icon/user-man.png" class="rounded-circle overflow-hidden me-2" alt="" width="30px" height="30px">
					<span class="col-lg-12 "><?= $this->user->nama ?></span>
				</a>

				<ul class="dropdown-menu dropdown-menu-end shadow animated flipInX fs-7" aria-labelledby="navUser">
					<i class="bi bi-triangle-fill text-white art"></i>
					<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#MyAkun"><i class="bi bi-person-circle me-3"></i> My Account</a></li>
					<li><a class="dropdown-item" href="<?= BASEURL ?>"><i class="bi bi-house-fill me-3"></i> Home</a></li>
					<li class="border-top"></li>
					<li><a class="dropdown-item text-red" href="<?= $this->gLink ?>LogOut"><i class="bi bi-power me-3"></i>Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- body-content -->
	<div class="body-content">
		<button class="btn text-white togle-btn-left" data-bs-toggle="tooltip" onclick="toogleSidebar()" data-bs-placement="right" title="Open Sidebar">
			<i class="bi bi-layout-sidebar-inset"></i>
		</button>
		<!-- content -->
		<button class="btn text-white togle-btn-btm-right" data-bs-toggle="tooltip" onclick="toogleSidebar()" data-bs-placement="left" title="Sidebar">
			<i class="bi bi-layout-sidebar-inset"></i>
		</button>

		<!-- content -->
		<div class="content">
			
			<div class="container-xxl">
							<!-- row breadcumb -->