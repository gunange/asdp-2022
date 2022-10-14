<?php

class ModelKabid extends Controler
{

	private $modelUser;
	public $user;

	use MasterData, MasterJoin, ComponentModelDash;

	public function __construct()
	{
		$this->modelUser = $this->model('ModelUser');
		$this->modelUser->userAllow = [2];
		if ($this->modelUser->isUser()) :
			$this->setUser($this->modelUser->dataUser);
		endif;
	}
	public function GetTangkiKapalById($id = null)
	{
		$set 	= $this->TankiKapalJoin();
		$set['query']	= "WHERE tanki.id_kapal = '{$id}'";

		return database::join($set);
	}
	public function GetJsonTanggal()
	{
		// $countTgl = cal_days_in_month(CAL_GREGORIAN, 10, 2022) ;
		$countTgl = date('d');
		$ret = [];
		for ($i = 1; $i <= $countTgl; $i++) :
			$ret[] = "day " . $i;
		endfor;

		return json_encode($ret);
	}


	// public function GetHistoryDayTank()
	// {
	// 	$set 	= $this->HistoryDayTank();
	// 	// $set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id='{$id_jenis_tanki}' ORDER BY DATE( tgl) ASC, waktu ASC";
	// 	$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tjt.id=1 ORDER BY DATE( tgl) ASC, waktu ASC";

	// 	return database::join($set);
	// }

	public function GetHistoryDayTank($id_kapal)
	{
		$set 	= $this->HistoryDayTank();
		$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id=1 ORDER BY DATE( tgl) ASC, waktu ASC";

		return database::join($set);
	}
}
