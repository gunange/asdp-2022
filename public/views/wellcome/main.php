<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link rel="shortcut icon" href="#">
	<!-- <link rel="shortcut icon" href="" sizes="96x96"> -->

	<link rel="stylesheet" href="<?= BaseAssets ?>font/font-local.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>css/costume-bootstrap.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>css/costume-style.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>css/colors.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>css/animated.css">

	<link rel="stylesheet" href="<?= BaseAssets ?>plugin/bootstrap/icon/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>plugin/bootstrap/css/bootstrap.min.css">
	<!-- data-select2 -->
	<link rel="stylesheet" href="<?= BaseAssets ?>/plugin/dataSelect2/css/select2.min.css">

	<link rel="stylesheet" href="<?= BaseAssets ?>css/responsif-wellcome.css">

	<link rel="stylesheet" href="<?= BaseAssets ?>plugin/aos/aos.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>plugin/magnific/magnific-popup.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>css/wellcome.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>css/costume-data-tables.css">
	<title>Document</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
		<div class="container">
			<a class="navbar-brand fw-bold img-obj-cover" href="#">
				<!-- For logo -->
				<!-- <img src="" alt="" width="100%" height="40" style="object-fit: contain;"> -->
			</a>

			<div class="d-flex justify-content-center align-items-center">
				<button class="navbar-toggler btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false">
					<i class="bi bi-toggles"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarScroll" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false">
					<ul class="navbar-nav ms-auto my-2 my-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#" data-scroll-nav="0">Beranda</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" data-scroll-nav="1">Profil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" data-scroll-nav="2">Tentang</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" data-scroll-nav="3">Fitur</a>
						</li>
					</ul>
				</div>
				<button class="btn btn-sm btn-green ms-3" type="button" onclick="openModalShow('#modal-center-lg', '<?= BASEURL ?>Wellcome/ModalTest')">Modal</button>
				
			</div>
		</div>
	</nav>

	<section class="hero bg-purple" style="width:100%; height: 100vh"></section>
	<section class="hero bg-red" style="width:100%; height: 100vh"></section>


	<?php require_once "public/templates/modal/main-modal.php" ?>

	<script type="text/javascript" src="<?= BaseAssets ?>plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataTables/js/jquery-3.5.1.js"></script>
	<!-- data-select2 -->
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataSelect2/js/select2.min.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/aos/aos.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>js/scrollIt.min.js"></script>
	
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataTables/js/data-tables.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataTables/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>js/app.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>js/wellcome.js"></script>

</body>
</html>