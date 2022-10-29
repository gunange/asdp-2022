<?php

trait ComponentModelDash{
	protected function setUser($data){
		$data = json_encode($data, JSON_NUMERIC_CHECK);
		$this->user = json_decode($data);
	}
	
	public function getLink(){
		$data =  explode('/', $_GET['url']);
		$data = end($data) ;
		$data = (strlen($data) > 2 ? $data  : 'Main' );
		return $data ;
	}

	public function HitungVolume($liter=0, $tinggi=0, $tinggiBbm=0)
	{
		
		$volume = ($liter / $tinggi ) * $tinggiBbm ;
		return $volume ;
	}
	public function GetTahunRange($tahun=0000)
	{
		$tahunNow = date('Y');

		$data = [];
		while ($tahunNow >= $tahun) :
			$data[] = $tahunNow ;
			$tahunNow-- ;
		endwhile;

		return $data ;
	}

	public function GetDataGrafik($dataHistory)
	{
		$dataTank = (array) null;
		$temp = 0;
		$tgl = 0;
		$ihis = -1;
		foreach ($dataHistory as $k => $datahist) :
			if ($tgl < $datahist['tanggal']) {
				$tgl =  $datahist['tanggal'];
				$temp = $datahist['liter'];
				$history[$datahist['tanggal']] = 0;
				$ihis += 1;
			}
			if ($temp > $datahist['liter']) {
				$history[$datahist['tanggal']] = $history[$datahist['tanggal']] + ($temp - $datahist['liter']);
				$dataTank[$ihis]['data'] = $history[$datahist['tanggal']];
				$dataTank[$ihis]['tanggal'] = $datahist['tanggal'];
				$temp = $datahist['liter'];
			} elseif ($temp < $datahist['liter']) {
				$temp = $datahist['liter'];
			}
		endforeach;

		$nDay = date('d');

		$newDataTank = [];
		
		foreach ($dataTank as $k => $d ):
			for ($tgl = 1; $tgl <= $nDay; $tgl++):
				if ($d['tanggal'] == $tgl):
					$newDataTank[] = $d['data'];
				else:
					$newDataTank[] = 0;
				endif;
			endfor;
		endforeach;


		return json_encode($newDataTank) ;
	}
}