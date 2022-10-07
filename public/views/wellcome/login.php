<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link rel="shortcut icon" href="#">
	<!-- <link rel="shortcut icon" href="" sizes="96x96"> -->

	<link rel="stylesheet" href="<?= BaseAssets ?>font/font-local.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>css/costume-style.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>css/colors.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>css/animated.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>css/costume-bootstrap.css">

	<link rel="stylesheet" href="<?= BaseAssets ?>plugin/bootstrap/icon/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>plugin/bootstrap/css/bootstrap.min.css">


	<link rel="stylesheet" href="<?= BaseAssets ?>plugin/aos/aos.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>plugin/magnific/magnific-popup.css">
	<!-- data-select2 -->
	<link rel="stylesheet" href="<?= BaseAssets ?>/plugin/dataSelect2/css/select2.min.css">
	
	<link rel="stylesheet" href="<?= BaseAssets ?>css/login.css">
	
	<title>Login</title>
</head>
<body>

	<section class="login d-flex justify-content-center align-items-center">
		<div class="container row" data-aos="zoom-in" data-aos-delay="500" data-aos-easing="ease-out-cubic">
			<div class="col-md-6 ms-auto me-auto">
				<div class="login-content text-center p-4">
					<div class="login-title pt-4">
						<p class="mb-0">Silahkan Login agar anda dapat mengakses halaman dashboard</p>
						<p>
							Jika belum punya akun, Anda dapat mendaftar melalui tombol dibawah ini
						</p>
					</div>
					<div class="login-body mt-5">
						<form action="<?= BaseWellcome ?>LogIn" class="w-75 ms-auto me-auto data-form" method="POST">
								<input class="form-control form-control-sm" type="text" placeholder="Username" name="username" autocomplete="off" required>
								<input class="form-control form-control-sm" type="text" placeholder="Password" name="password" autocomplete="off" required>
								<button class="btn mt-4" type="submit">Login</button>
						</form>
						
						<button class="btn bg-cyan text-white mt-3" type="button" onclick="openModalShow('#modal', '<?= BaseWellcome ?>FormDaftar', () => {injectJsWellcomePrimary()} );" >Daftar</button>
					</div>
				</div>
			</div>
		</div>
		
	</section>

	<?php require_once 'public/templates/modal/main-modal.php'; ?>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataTables/js/jquery-3.5.1.js"></script>
	<!-- data-select2 -->
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataSelect2/js/select2.min.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/aos/aos.js"></script>
		
	<script type="text/javascript" src="<?= BaseAssets ?>js/app.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>js/login.js"></script>
	
</body>
</html>