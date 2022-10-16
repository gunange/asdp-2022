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
	public function GetJsonTanggal($bulan=null, $tahun=null)
	{
		if (!is_null($tahun) && !is_null($bulan)):
			
			$countTgl = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
		else:
			$countTgl = date('d');
		endif;
		$ret = [];
		for ($i = 1; $i <= $countTgl; $i++) :
			$ret[] = "day " . $i;
		endfor;

		return json_encode($ret);
	}


	public function GetHistoryDayTank($id_kapal)
	{
		$set 	= $this->HistoryDayTank();
		$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id=1 ORDER BY DATE( tgl) ASC, waktu ASC";

		return database::join($set);
	}
	public function GetHistoryByTahunAndByIdKapal($id_kapal, $tahun, $bulan)
	{
		$set 	= $this->HistoryDayTank();
		$set['query']	= "WHERE MONTH(tgl)='{$bulan}' AND YEAR(tgl)='{$tahun}' AND tk.id='{$id_kapal}' AND tjt.id=1 ORDER BY DATE( tgl) ASC, waktu ASC";

		return database::join($set);
	}
	public function GetKapalById($id)
	{
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_kapal';
		$set['query']	= "WHERE id = '{$id}'";
		$set['loop'] 	= "no_loop" ;

		return database::select($set);
	}
	public function GetDelayAirTawar()
	{
		$set = $this->AirTawarJoin();
		$set['query'] = "WHERE UPPER(status)!='LUNAS' ORDER BY waktu DESC, tgl DESC";

		return database::join($set);
	}
	public function GetDelayDataSandar()
	{
		$set = $this->DataSandarJoin();
		$set['query'] = "WHERE UPPER(status)!='LUNAS' ORDER BY waktu_awal DESC, tgl DESC";

		return database::join($set);
	}
}
