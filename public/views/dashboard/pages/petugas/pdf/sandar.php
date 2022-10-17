<link rel="shortcut icon" href="#">
<script type="text/javascript" src="<?= BaseAssets ?>plugin/jsPDF/jspdf.min.js"></script>
<script type="text/javascript" src="<?= BaseAssets ?>plugin/jsPDF/jspdf.autotable.js"></script>

<?php if ($this->setPage == "Pengolahan") : ?>

	<body>
		<?php

		foreach ($this->model->GetSandarById($this->id) as $k => $dermaga) :
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

			doc.addImage(img, 'jpeg', 20, 5, 30, 10);
			doc.text(5, 25, "PT. ASDP Indonesia Ferry (Persero)");
			doc.text(21, 30, "Cabang Ternate");
			doc.setFontSize(9);

			doc.text(23, 35, "JASA SANDAR").setFont(undefined, 'bold');


			doc.setFontSize(8);
			doc.text(5, 45, "Tanggal").setFont(undefined, 'normal');
			doc.text(25, 45, ": " + dataPDF['hari'] + " , " + dataPDF['tgl'] + " , " + dataPDF['waktu_awal']).setFont(undefined, 'bold');
			doc.text(5, 50, "Operator").setFont(undefined, 'normal');
			doc.text(25, 50, ": " + dataPDF['nama_admin']).setFont(undefined, 'bold');
			doc.text(5, 55, "Regu").setFont(undefined, 'normal');
			doc.text(25, 55, ": " + dataPDF['regu'] + "/Shift " + dataPDF['shift']).setFont(undefined, 'normal');


			doc.text(5, 60, dataPDF['nama_kapal']).setFont(undefined, 'bold');
			doc.text(5, 70, "Dermaga").setFont(undefined, 'normal');
			doc.text(25, 70, ": " + dataPDF['dermaga']).setFont(undefined, 'bold');
			doc.text(5, 75, "Start").setFont(undefined, 'normal');
			doc.text(25, 75, ": " + dataPDF['waktu_awal']).setFont(undefined, 'bold');

			doc.text(50, 75, "Menit").setFont(undefined, 'normal');
			doc.text(60, 75, ": " + dataPDF['akumulasi_menit']).setFont(undefined, 'bold');

			doc.text(5, 80, "Stop").setFont(undefined, 'normal');
			doc.text(25, 80, ": " + dataPDF['waktu_akhir']).setFont(undefined, 'bold');

			doc.text(50, 80, "Call").setFont(undefined, 'total_call');
			doc.text(60, 80, ": " + dataPDF['total_call']).setFont(undefined, 'normal');

			doc.text(5, 85, "_______________________________________________").setFont(undefined, 'bold');


			doc.text(5, 95, "DPP").setFont(undefined, 'normal');
			doc.text(55, 95, ": Rp. " + dataPDF['dpp']).setFont(undefined, 'bold');
			doc.text(5, 100, "PPN(10%)").setFont(undefined, 'normal');
			doc.text(55, 100, ": Rp. 0,-").setFont(undefined, 'bold');
			doc.text(5, 105, "PPH23(2%)").setFont(undefined, 'normal');
			doc.text(55, 105, ": Rp. " + dataPDF['pph']).setFont(undefined, 'bold');
			doc.text(5, 110, "______________________________________________").setFont(undefined, 'bold');

			doc.text(5, 120, "Tagihan Sandar").setFont(undefined, 'bold');
			doc.text(55, 120, ": Rp. " + dataPDF['total_sandar']).setFont(undefined, 'bold');
			doc.text(5, 125, "______________________________________________").setFont(undefined, 'bold');



			document.getElementById('output').src = doc.output('datauristring');
		</script>
	</body>

<?php elseif ($this->setPage == "Lunas") : ?>


	<body>
		<?php
		foreach ($this->model->GetSandarById($this->id) as $k => $dermaga) :
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


			doc.addImage(img, 'jpeg', 20, 5, 30, 10);
			doc.text(5, 25, "PT. ASDP Indonesia Ferry (Persero)");
			doc.text(21, 30, "Cabang Ternate");
			doc.setFontSize(9);

			doc.text(23, 35, "JASA SANDAR").setFont(undefined, 'bold');


			doc.setFontSize(8);
			doc.text(5, 45, "Tanggal").setFont(undefined, 'normal');
			doc.text(25, 45, ": " + dataPDF['hari'] + " , " + dataPDF['tgl'] + " , " + dataPDF['waktu_awal']).setFont(undefined, 'bold');
			doc.text(5, 50, "Operator").setFont(undefined, 'normal');
			doc.text(25, 50, ": " + dataPDF['nama_admin']).setFont(undefined, 'bold');
			doc.text(5, 55, "Regu").setFont(undefined, 'normal');
			doc.text(25, 55, ": " + dataPDF['regu'] + "/Shift " + dataPDF['shift']).setFont(undefined, 'normal');


			doc.text(5, 60, dataPDF['nama_kapal']).setFont(undefined, 'bold');
			doc.text(5, 70, "Dermaga").setFont(undefined, 'normal');
			doc.text(25, 70, ": " + dataPDF['dermaga']).setFont(undefined, 'bold');
			doc.text(5, 75, "Start").setFont(undefined, 'normal');
			doc.text(25, 75, ": " + dataPDF['waktu_awal']).setFont(undefined, 'bold');

			doc.text(50, 75, "Menit").setFont(undefined, 'normal');
			doc.text(60, 75, ": " + dataPDF['akumulasi_menit']).setFont(undefined, 'bold');

			doc.text(5, 80, "Stop").setFont(undefined, 'normal');
			doc.text(25, 80, ": " + dataPDF['waktu_akhir']).setFont(undefined, 'bold');

			doc.text(50, 80, "Call").setFont(undefined, 'total_call');
			doc.text(60, 80, ": " + dataPDF['total_call']).setFont(undefined, 'normal');

			doc.text(5, 85, "_______________________________________________").setFont(undefined, 'bold');


			doc.text(5, 95, "DPP").setFont(undefined, 'normal');
			doc.text(55, 95, ": Rp. " + dataPDF['dpp']).setFont(undefined, 'bold');
			doc.text(5, 100, "PPN(10%)").setFont(undefined, 'normal');
			doc.text(55, 100, ": Rp. 0,-").setFont(undefined, 'bold');
			doc.text(5, 105, "PPH23(2%)").setFont(undefined, 'normal');
			doc.text(55, 105, ": Rp. " + dataPDF['pph']).setFont(undefined, 'bold');
			doc.text(5, 110, "______________________________________________").setFont(undefined, 'bold');

			doc.text(5, 120, "Tagihan Sandar").setFont(undefined, 'bold');
			doc.text(55, 120, ": Rp. " + dataPDF['total_sandar']).setFont(undefined, 'bold');
			doc.text(5, 125, "______________________________________________").setFont(undefined, 'bold');



			document.getElementById('output').src = doc.output('datauristring');
		</script>
	</body>

<?php endif; ?>