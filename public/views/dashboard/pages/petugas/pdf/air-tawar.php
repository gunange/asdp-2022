<link rel="shortcut icon" href="#">
<script type="text/javascript" src="<?= BaseAssets ?>plugin/jsPDF/jspdf.min.js"></script>
<script type="text/javascript" src="<?= BaseAssets ?>plugin/jsPDF/jspdf.autotable.js"></script>

<?php if ($this->setPage == "Pengolahan") : ?>

	<body>
		<?php

		foreach ($this->model->GetAirTawarById($this->id) as $k => $dermaga) :
			$dataPdf = $dermaga;
		endforeach;



		?>
		<iframe id="output" width="100%" height="100%" frameborder="0"></iframe>


		<script>
			var dataPDF = <?= json_encode($dataPdf) ?>
			// console.log(dataPDF)
			var doc = new jsPDF({
				orientation: 'p',
				unit: 'mm',
				format: [210, 330]
			});


			doc.setFontSize(11).setFont(undefined, 'bold');
			doc.text(23, 20, "PT. ASDP Indonesia Ferry (Persero)");
			doc.text(36, 25, "Cabang Ternate");
			doc.setFontSize(12);

			doc.text(40, 30, "AIR TAWAR").setFont(undefined, 'bold');


			doc.setFontSize(10);
			doc.text(20, 40, "Tanggal").setFont(undefined, 'normal');
			doc.text(40, 40, ": " + dataPDF['hari'] + " , " + dataPDF['tgl'] + " , " + dataPDF['waktu']).setFont(undefined, 'bold');
			doc.text(20, 45, "Operator").setFont(undefined, 'normal');
			doc.text(40, 45, ": " + dataPDF['nama_admin']).setFont(undefined, 'bold');
			doc.text(20, 50, "Regu").setFont(undefined, 'normal');
			doc.text(40, 50, ": " + dataPDF['tgl']).setFont(undefined, 'normal');


			doc.text(20, 65, dataPDF['nama_kapal']).setFont(undefined, 'bold');
			doc.text(20, 70, "Dermaga").setFont(undefined, 'normal');
			doc.text(60, 70, ": " + dataPDF['dermaga']).setFont(undefined, 'bold');
			doc.text(20, 75, "Debit Air").setFont(undefined, 'normal');
			doc.text(60, 75, ": " + dataPDF['debit_air']).setFont(undefined, 'bold');
			doc.text(20, 80, "Tarif").setFont(undefined, 'normal');
			doc.text(60, 80, ": Rp. 50,/Liter").setFont(undefined, 'bold');


			doc.text(20, 90, "Tagihan Air Tawar").setFont(undefined, 'bold');
			doc.text(60, 90, ": Rp. " + dataPDF['total_air_tawar']).setFont(undefined, 'bold');
			doc.text(20, 95, "______________________________________").setFont(undefined, 'bold');



			document.getElementById('output').src = doc.output('datauristring');
		</script>
	</body>

<?php elseif ($this->setPage == "Lunas") : ?>


	<body>
		<?php

		print_r($this->data);

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


		<script>
			var doc = new jsPDF({
				orientation: 'p',
				unit: 'mm',
				format: [210, 330]
			});
			doc.setFontSize(12);
			doc.text(90, 20, "Data Title For Table PDF");

			doc.setFontSize(10);
			doc.text(180, 150, "Ternate, <?= tools::indoTime(date('d-m-Y')) ?>", null, null, 'center');
			doc.text(180, 180, "Nama Penulis", null, null, 'center');

			document.getElementById('output').src = doc.output('datauristring');
		</script>
	</body>

<?php endif; ?>