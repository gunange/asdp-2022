<link rel="shortcut icon" href="#">

<body>
	<?php



	$dataPdf = [
		[
			1,
			'Josep Kids',
			'Laki-laki'
		],
		[
			2,
			'Josep Junior',
			'Laki-laki'
		],
		[
			3,
			'Josep Senior',
			'Perempuan'
		],
		[
			3,
			'Josep Legend',
			'Laki-laki'
		],
	];

	?>

	<iframe id="output" width="100%" height="100%" frameborder="0"></iframe>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/jsPDF/jspdf.min.js"></script>
	<script type="text/javascript" src="<?= BaseAssets ?>plugin/jsPDF/jspdf.autotable.js"></script>

	<script>
		var doc = new jsPDF({
			orientation: 'p',
			unit: 'mm',
			format: [210, 330]
		});
		doc.setFontSize(12);
		doc.text(90, 20, "Logo asdp harusnya");
		doc.autoTable({

			margin: {
				top: 30
			},

			head: [
				[{
						content: 'No',
						styles: {
							cellWidth: 15
						}
					},
					'Nama',
					'Jenis Kelamin',
				]
			],
			body: <?= json_encode($dataPdf) ?>,
			theme: 'grid',
			headStyles: {
				fillColor: [124, 95, 240]
			},

		});
		doc.setFontSize(10);
		doc.text(180, 150, "Ternate, <?= tools::indoTime(date('d-m-Y')) ?>", null, null, 'center');
		doc.text(180, 180, "Nama Penulis", null, null, 'center');

		document.getElementById('output').src = doc.output('datauristring');
	</script>
</body>