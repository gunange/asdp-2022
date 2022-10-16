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

			var doc = new jsPDF({
				orientation: 'p',
				unit: 'mm',
				format: 'a4' // Ukurran (lebar x tinggi)
				//format: [500, 900] // Ukurran (lebar x tinggi)
			});


			doc.setFontSize(11).setFont(undefined, 'bold');

			let img = new Image();
			img.src = "<?= BaseFiles ?>images/logo-asdp.png";

			doc.addImage(img, 'jpeg', 23, 5, 50, 20);
			doc.text(23, 30, "PT. ASDP Indonesia Ferry (Persero)");
			doc.text(36, 35, "Cabang Ternate");
			doc.setFontSize(12);

			doc.text(40, 40, "AIR TAWAR").setFont(undefined, 'bold');


			doc.setFontSize(10);
			doc.text(20, 50, "Tanggal").setFont(undefined, 'normal');
			doc.text(40, 50, ": " + dataPDF['hari'] + " , " + dataPDF['tgl'] + " , " + dataPDF['waktu']).setFont(undefined, 'bold');
			doc.text(20, 55, "Operator").setFont(undefined, 'normal');
			doc.text(40, 55, ": " + dataPDF['nama_admin']).setFont(undefined, 'bold');
			doc.text(20, 60, "Regu").setFont(undefined, 'normal');
			doc.text(40, 60, ": " + dataPDF['regu']).setFont(undefined, 'normal');


			doc.text(20, 75, dataPDF['nama_kapal']).setFont(undefined, 'bold');
			doc.text(20, 80, "Dermaga").setFont(undefined, 'normal');
			doc.text(60, 80, ": " + dataPDF['dermaga']).setFont(undefined, 'bold');
			doc.text(20, 85, "Debit Air").setFont(undefined, 'normal');
			doc.text(60, 85, ": " + dataPDF['debit_air']).setFont(undefined, 'bold');
			doc.text(20, 90, "Tarif").setFont(undefined, 'normal');
			doc.text(60, 90, ": Rp. 50,/Liter").setFont(undefined, 'bold');


			doc.text(20, 100, "Tagihan Air Tawar").setFont(undefined, 'bold');
			doc.text(60, 100, ": Rp. " + dataPDF['total_air_tawar']).setFont(undefined, 'bold');
			doc.text(20, 95, "______________________________________").setFont(undefined, 'bold');



			document.getElementById('output').src = doc.output('datauristring');
		</script>
	</body>

<?php elseif ($this->setPage == "Lunas") : ?>


	<body>
		<?php
		foreach ($this->model->GetAirTawarById($this->id) as $k => $dermaga) :
			$dataPdf = $dermaga;
		endforeach;


		?>

		<iframe id="output" width="100%" height="100%" frameborder="0"></iframe>


		<script>
			var dataPDF = <?= json_encode($dataPdf) ?>

			var doc = new jsPDF({
				orientation: 'p',
				unit: 'mm',
				format: 'a4' // Ukurran (lebar x tinggi)
				//format: [500, 900] // Ukurran (lebar x tinggi)
			});


			doc.setFontSize(11).setFont(undefined, 'bold');

			let img = new Image();
			img.src = "<?= BaseFiles ?>images/logo-asdp.png";

			doc.addImage(img, 'jpeg', 23, 5, 50, 20);
			doc.text(23, 30, "PT. ASDP Indonesia Ferry (Persero)");
			doc.text(36, 35, "Cabang Ternate");
			doc.setFontSize(12);

			doc.text(40, 40, "AIR TAWAR").setFont(undefined, 'bold');


			doc.setFontSize(10);
			doc.text(20, 50, "Tanggal").setFont(undefined, 'normal');
			doc.text(40, 50, ": " + dataPDF['hari'] + " , " + dataPDF['tgl'] + " , " + dataPDF['waktu']).setFont(undefined, 'bold');
			doc.text(20, 55, "Operator").setFont(undefined, 'normal');
			doc.text(40, 55, ": " + dataPDF['nama_admin']).setFont(undefined, 'bold');
			doc.text(20, 60, "Regu").setFont(undefined, 'normal');
			doc.text(40, 60, ": " + dataPDF['regu']).setFont(undefined, 'normal');


			doc.text(20, 75, dataPDF['nama_kapal']).setFont(undefined, 'bold');
			doc.text(20, 80, "Dermaga").setFont(undefined, 'normal');
			doc.text(60, 80, ": " + dataPDF['dermaga']).setFont(undefined, 'bold');
			doc.text(20, 85, "Debit Air").setFont(undefined, 'normal');
			doc.text(60, 85, ": " + dataPDF['debit_air']).setFont(undefined, 'bold');
			doc.text(20, 90, "Tarif").setFont(undefined, 'normal');
			doc.text(60, 90, ": Rp. 50,/Liter").setFont(undefined, 'bold');


			doc.text(20, 100, "Tagihan Air Tawar").setFont(undefined, 'bold');
			doc.text(60, 100, ": Rp. " + dataPDF['total_air_tawar']).setFont(undefined, 'bold');
			doc.text(20, 95, "______________________________________").setFont(undefined, 'bold');



			document.getElementById('output').src = doc.output('datauristring');
		</script>
	</body>

<?php endif; ?>