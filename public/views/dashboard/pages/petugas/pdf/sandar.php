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

			doc.addImage(img, 'jpeg', 23, 5, 50, 20);
			doc.text(23, 30, "PT. ASDP Indonesia Ferry (Persero)");
			doc.text(36, 35, "Cabang Ternate");
			doc.setFontSize(12);

			doc.text(40, 40, "AIR TAWAR").setFont(undefined, 'bold');


			doc.setFontSize(10);
			doc.text(20, 50, "Tanggal").setFont(undefined, 'normal');
			doc.text(40, 50, ": " + dataPDF['hari'] + " , " + dataPDF['tgl'] + " , " + dataPDF['waktu_awal']).setFont(undefined, 'bold');
			doc.text(20, 55, "Operator").setFont(undefined, 'normal');
			doc.text(40, 55, ": " + dataPDF['nama_admin']).setFont(undefined, 'bold');
			doc.text(20, 60, "Regu").setFont(undefined, 'normal');
			doc.text(40, 60, ": " + dataPDF['regu'] + "/Shift " + dataPDF['shift']).setFont(undefined, 'normal');


			doc.text(20, 75, dataPDF['nama_kapal']).setFont(undefined, 'bold');
			doc.text(20, 80, "Dermaga").setFont(undefined, 'normal');
			doc.text(40, 80, ": " + dataPDF['dermaga']).setFont(undefined, 'bold');
			doc.text(20, 85, "Start").setFont(undefined, 'normal');
			doc.text(40, 85, ": " + dataPDF['waktu_awal']).setFont(undefined, 'bold');

			doc.text(70, 85, "Menit").setFont(undefined, 'normal');
			doc.text(80, 85, ": " + dataPDF['akumulasi_menit']).setFont(undefined, 'normal');

			doc.text(20, 90, "Stop").setFont(undefined, 'normal');
			doc.text(40, 90, ": " + dataPDF['waktu_akhir']).setFont(undefined, 'bold');

			doc.text(70, 90, "Call").setFont(undefined, 'total_call');
			doc.text(80, 90, ": " + dataPDF['total_call']).setFont(undefined, 'normal');

			doc.text(20, 95, "____________________________________________").setFont(undefined, 'bold');


			doc.text(20, 105, "DPP").setFont(undefined, 'normal');
			doc.text(70, 105, ": Rp. " + dataPDF['dpp']).setFont(undefined, 'bold');
			doc.text(20, 110, "PPN(10%)").setFont(undefined, 'normal');
			doc.text(70, 110, ": Rp. 0,-").setFont(undefined, 'bold');
			doc.text(20, 115, "PPH23(2%)").setFont(undefined, 'normal');
			doc.text(70, 115, ": Rp. " + dataPDF['pph']).setFont(undefined, 'bold');
			doc.text(20, 120, "____________________________________________").setFont(undefined, 'bold');

			doc.text(20, 130, "Tagihan Sandar").setFont(undefined, 'bold');
			doc.text(70, 130, ": Rp. " + dataPDF['total_sandar']).setFont(undefined, 'bold');
			doc.text(20, 135, "____________________________________________").setFont(undefined, 'bold');



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
			doc.text(40, 50, ": " + dataPDF['hari'] + " , " + dataPDF['tgl'] + " , " + dataPDF['waktu_awal']).setFont(undefined, 'bold');
			doc.text(20, 55, "Operator").setFont(undefined, 'normal');
			doc.text(40, 55, ": " + dataPDF['nama_admin']).setFont(undefined, 'bold');
			doc.text(20, 60, "Regu").setFont(undefined, 'normal');
			doc.text(40, 60, ": " + dataPDF['regu'] + "/Shift " + dataPDF['shift']).setFont(undefined, 'normal');


			doc.text(20, 75, dataPDF['nama_kapal']).setFont(undefined, 'bold');
			doc.text(20, 80, "Dermaga").setFont(undefined, 'normal');
			doc.text(40, 80, ": " + dataPDF['dermaga']).setFont(undefined, 'bold');
			doc.text(20, 85, "Start").setFont(undefined, 'normal');
			doc.text(40, 85, ": " + dataPDF['waktu_awal']).setFont(undefined, 'bold');

			doc.text(70, 85, "Menit").setFont(undefined, 'normal');
			doc.text(80, 85, ": " + dataPDF['akumulasi_menit']).setFont(undefined, 'normal');

			doc.text(20, 90, "Stop").setFont(undefined, 'normal');
			doc.text(40, 90, ": " + dataPDF['waktu_akhir']).setFont(undefined, 'bold');

			doc.text(70, 90, "Call").setFont(undefined, 'total_call');
			doc.text(80, 90, ": " + dataPDF['total_call']).setFont(undefined, 'normal');

			doc.text(20, 95, "____________________________________________").setFont(undefined, 'bold');


			doc.text(20, 105, "DPP").setFont(undefined, 'normal');
			doc.text(70, 105, ": Rp. " + dataPDF['dpp']).setFont(undefined, 'bold');
			doc.text(20, 110, "PPN(10%)").setFont(undefined, 'normal');
			doc.text(70, 110, ": Rp. 0,-").setFont(undefined, 'bold');
			doc.text(20, 115, "PPH23(2%)").setFont(undefined, 'normal');
			doc.text(70, 115, ": Rp. " + dataPDF['pph']).setFont(undefined, 'bold');
			doc.text(20, 120, "____________________________________________").setFont(undefined, 'bold');

			doc.text(20, 130, "Tagihan Sandar").setFont(undefined, 'bold');
			doc.text(70, 130, ": Rp. " + dataPDF['total_sandar']).setFont(undefined, 'bold');
			doc.text(20, 135, "____________________________________________").setFont(undefined, 'bold');



			document.getElementById('output').src = doc.output('datauristring');
		</script>
	</body>

<?php endif; ?>