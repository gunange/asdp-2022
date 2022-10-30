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
				$dataTank[$ihis] = $history[$datahist['tanggal']];
				$temp = $datahist['liter'];
			} elseif ($temp < $datahist['liter']) {
				$temp = $datahist['liter'];
			}
		endforeach;

		return json_encode($dataTank) ;
	}

	public function upProfil(){
	
	try{
			$set['tbl'] = "tbl_user";
			$set['key']	= "id" ;
			$set['val']	= $this->user->id ;

			$set['set'] = [
				"nama"             => $_POST['nama'],
				"id_jenis_kelamin" => $_POST['id_jenis_kelamin'],
			];

			database::update($set);

			$this->response["response"] = "OK";
			$this->response["href"]     = $_POST['url'];
			$this->response["msg"]      = "Anda berhasil memperbahrui profil anda !, Tekan OK untuk memperbahrui halaman";

		} catch(PDOException $e){
			$this->response['debug'] = $e;
			$this->response["msg"] = "Hubungi Developer, ada kesalahan sistem";
		}

		$this->ResponseApi();

	}

}