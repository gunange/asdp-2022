<link rel="shortcut icon" href="#">
<script type="text/javascript" src="<?= BaseAssets ?>plugin/jsPDF/jspdf.min.js"></script>
<script type="text/javascript" src="<?= BaseAssets ?>plugin/jsPDF/jspdf.autotable.js"></script>

<?php if ($this->page == "byFilter") : ?>
	<!-- 	<?= $this->id ?>
	<?= $this->bulan ?>
	<?= $this->tahun ?> 
	<?= $this->kapal ?> -->

	<?php

	$countTgl = cal_days_in_month(CAL_GREGORIAN, $this->bulan, $this->tahun);

	$dataCekArrayTank[0] = $this->model->GetDataGrafikSaldoTotalByTahunBulan($this->model->GetHistoryDayTankKanan($this->id), $countTgl);
	$dataCekArrayTank[1] = $this->model->GetDataGrafikSaldoTotalByTahunBulan($this->model->GetHistoryDayTankKiri($this->id), $countTgl);
	$dataCekArrayTank[2] = $this->model->GetDataGrafikSaldoTotalByTahunBulan($this->model->GetHistoryIndukTankKanan($this->id), $countTgl);
	$dataCekArrayTank[3] = $this->model->GetDataGrafikSaldoTotalByTahunBulan($this->model->GetHistoryIndukTankKiri($this->id), $countTgl);

	// proses mendapatkan dataTankTotal
	$dataSaldo = json_encode([]);

	$dataKapal = $this->model->sGetKapal("WHERE id = '{$this->id}'", "no_loop");

	$tempArrayTank = 0;
	foreach ($dataCekArrayTank as $k => $val) {
		if (count(json_decode($val)) !== 0) {
			if ($tempArrayTank !== 0) {
				$dataSaldo = json_decode($dataSaldo);
				foreach (json_decode($dataCekArrayTank[$k], true) as $index => $datakanan) {
					$dataSaldo[$index] = $datakanan + $tempArrayTank[$index];
				}
				$tempArrayTank = $dataSaldo;
				$dataSaldo = json_encode($dataSaldo);
			} else {
				$tempArrayTank = json_decode($dataCekArrayTank[$k]);
				$dataSaldo = json_encode($tempArrayTank);
			}
		}
	}


	$forTable = [];
	$nilaiAkhir = 0 ;
	foreach (json_decode($dataSaldo, true) as $k => $d) :
		
		$forTable[$k] = [
			$k + 1,
			tools::indoTime($this->tahun . "-" . $this->bulan . "-" . $k + 1),
			($d != 0 ? intval($d) : $nilaiAkhir ),
			'Litter',
		];
		if ($d != 0 ):
			$nilaiAkhir = intval($d);
		endif;
	endforeach;

	?>

	<body>
		<iframe id="output" width="100%" height="100%" frameborder="0"></iframe>


		<script>
			var doc = new jsPDF({
				orientation: 'p',
				unit: 'mm',
				format: 'a4' // Ukurran (lebar x tinggi)
				//format: [500, 900] // Ukurran (lebar x tinggi)
			});


			doc.setFontSize(11).setFont(undefined, 'bold');

			img = "data:image/png;base64,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";
			doc.addImage(img, 'jpeg', 85, 5, 30, 15);
			doc.text('Data Rekapan ( <?= tools::OptBulan($this->bulan) . " " . $this->tahun ?> )', 100, 28, 'center');
			doc.text('<?= @$dataKapal["nama_kapal"] ?>', 100, 34, 'center');

			doc.setFontSize(12);
			doc.autoTable({

				margin: {
					top: 40
				},

				head: [
					[{
							content: 'No',
							styles: {
								cellWidth: 15
							}
						},
						'Tanggal',
						'Saldo',
						'Satuan',
					]
				],
				body: <?= json_encode($forTable) ?>,
				theme: 'grid',
				headStyles: {
					fillColor: [124, 95, 240]
				},

			});


			document.getElementById('output').src = doc.output('datauristring');
		</script>
	</body>

<?php endif; ?>