<link rel="stylesheet" href="<?= BaseAssets ?>/css/colors.css">
<link rel="stylesheet" href="<?= BaseAssets ?>/css/animated.css">

<link rel="stylesheet" href="<?= BaseAssets ?>/plugin/bootstrap/icon/bootstrap-icons.css">
<link rel="stylesheet" href="<?= BaseAssets ?>/plugin/bootstrap/css/bootstrap.min.css">

<!-- data-select2 -->
	<link rel="stylesheet" href="<?= BaseAssets ?>/plugin/dataSelect2/css/select2.min.css">
<!-- costume -->
<link rel="stylesheet" href="<?= BaseAssets ?>/css/costume-bootstrap.css">
<link rel="stylesheet" href="<?= BaseAssets ?>/css/costume-style.css">
<link rel="stylesheet" href="<?= BaseAssets ?>/css/costume-dashboard.css">


<script type="text/javascript" src="<?= BaseAssets ?>plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataTables/js/jquery-3.5.1.js"></script>
<!-- data-select2 -->
<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataSelect2/js/select2.min.js"></script>
<script type="text/javascript" src="<?= BaseAssets ?>js/app.js"></script>

<?php require_once $this->dirTemplates . 'modal/main-modal.php'; ?>
<script>
		openModalShow('#modal-static', `<?= $this->gLink ?>SetBbmKapal/OpsiShift/` );
	
</script>