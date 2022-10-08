<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="#">

	<link rel="stylesheet" href="<?= BaseAssets ?>/css/colors.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>/css/animated.css">

	<link rel="stylesheet" href="<?= BaseAssets ?>/plugin/bootstrap/icon/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>/plugin/bootstrap/css/bootstrap.min.css">
	

	<link rel="stylesheet" href="<?= BaseAssets ?>/css/dashboard.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>/css/resposnive-dashboard.css">
	
	<!-- databales -->
	<link rel="stylesheet" href="<?= BaseAssets ?>/plugin/dataTables/css/dataTables.bootstrap5.min.css">

	<!-- data-select2 -->
	<link rel="stylesheet" href="<?= BaseAssets ?>/plugin/dataSelect2/css/select2.min.css">

	<!-- costume -->
	<link rel="stylesheet" href="<?= BaseAssets ?>/css/costume-bootstrap.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>/css/costume-style.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>/css/costume-dashboard.css">
	<link rel="stylesheet" href="<?= BaseAssets ?>/css/costume-data-tables.css">

	<title>Wellcome</title>
</head>
<body>
	<?php require_once $this->dirTemplates . 'modal/main-modal.php'; ?>

	<script type="text/javascript" src="<?= BaseAssets ?>plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>js/dashboard.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>js/sweetalert.min.js"></script>
	<!-- data-tables -->
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataTables/js/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataTables/js/data-tables.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataTables/js/dataTables.bootstrap5.min.js"></script>
	<!-- data-select2 -->
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/dataSelect2/js/select2.min.js"></script>
	<!-- jsPDF -->
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/jsPDF/jspdf.min.js"></script>

	
	<!-- export-xcel-pdf-csv -->
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/export-csv-excel-pdf/export-csv.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/export-csv-excel-pdf/export-excel.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/export-csv-excel-pdf/export-pdf.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/export-csv-excel-pdf/html2canvas.min.js"></script>

	<!-- chart js -->
	<script type="text/javascript" src="<?= BaseAssets ?>js/chart.min.js"></script>

	<script type="text/javascript" src="<?= BaseAssets ?>js/app.js"></script>

	<div id="preloader" class="loader">
        <div id="status">
            <div class="status-mes">Loading ..</div>
        </div>
    </div>

	<div class="wrapper" id="wrapper">
		<!-- sidebar-wrapper -->