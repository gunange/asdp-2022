<?php

class ModelKabid extends Controler
{

	private $modelUser;
	public $user;

	use MasterData, MasterJoin, ComponentModelDash, ApiResponse;

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
	public function GetJsonTanggal($bulan = null, $tahun = null)
	{
		if (!is_null($tahun) && !is_null($bulan)) :

			$countTgl = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
		else :
			$countTgl = date('d');
		endif;
		$ret = [];
		for ($i = 1; $i <= $countTgl; $i++) :
			$ret[] = "tgl " . $i;
		endfor;

		return json_encode($ret);
	}


	public function GetHistoryDayTankKanan($id_kapal)
	{
		$set 	= $this->HistoryDayTank();
		$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id=1 ORDER BY DATE( tgl) ASC, waktu ASC";

		return database::join($set);
	}
	public function GetHistoryDayTankKiri($id_kapal)
	{
		$set 	= $this->HistoryDayTank();
		$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id=2 ORDER BY DATE( tgl) ASC, waktu ASC";

		return database::join($set);
	}
	public function GetHistoryIndukTankKanan($id_kapal)
	{
		$set 	= $this->HistoryDayTank();
		$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id=3 ORDER BY DATE( tgl) ASC, waktu ASC";

		return database::join($set);
	}
	public function GetHistoryIndukTankKiri($id_kapal)
	{
		$set 	= $this->HistoryDayTank();
		$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id=4 ORDER BY DATE( tgl) ASC, waktu ASC";

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
		$set['loop'] 	= "no_loop";

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
	public function GetAirTawar()
	{
		$set = $this->AirTawarJoin();
		$set['query'] = "WHERE UPPER(status)='LUNAS' ORDER BY waktu DESC, tgl DESC";

		return database::join($set);
	}
	public function GetDataSandar()
	{
		$set = $this->DataSandarJoin();
		$set['query'] = "WHERE UPPER(status)='LUNAS' ORDER BY waktu_awal DESC, tgl DESC";

		return database::join($set);
	}
	public function GetStoryTangkiByIdKapal($id)
	{
		$set 			 = $this->JoinStoryTangki($id);

		$set['query']	= "WHERE tk.id = '{$id}' GROUP BY id_jenis_tanki ORDER BY tht.id DESC ";


		return database::join($set);
	}
	public function GetDataGrafikForMonitor($dataHistory)
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

		foreach ($dataTank as $k => $d) :
			for ($tgl = 1; $tgl <= $nDay; $tgl++) :
				if ($d['tanggal'] == $tgl) :
					$newDataTank[] = $d['data'];
				else :
					$newDataTank[] = 0;
				endif;
			endfor;
		endforeach;


		return json_encode($newDataTank);
	}


	public function GetDataGrafikSaldoTotalDays($dataHistory)
	{
		$dataTank = (array) null;
		$temp = 0;
		$tgl = 0;
		$ihis = -1;
		foreach ($dataHistory as $k => $datahist) :
			if ($tgl < $datahist['tanggal']) {
				$tgl =  $datahist['tanggal'];
				$temp = $datahist['liter'];
				$history[$datahist['tanggal']] = $datahist['liter'];
				$ihis += 1;

				$dataTank[$ihis]['data'] = $datahist['liter'];
				$dataTank[$ihis]['tanggal'] = $datahist['tanggal'];
			}
			if ($temp < $datahist['liter']) {
				$history[$datahist['tanggal']] = $history[$datahist['tanggal']] + ($datahist['liter'] - $temp);

				$dataTank[$ihis]['data'] = $history[$datahist['tanggal']];
				$dataTank[$ihis]['tanggal'] = $datahist['tanggal'];
				$temp = $datahist['liter'];
			} elseif ($temp > $datahist['liter']) {
				$temp = $datahist['liter'];
			}
		endforeach;

		$nDay = date('d');

		$newDataTank = [];
		for ($tgl = 0; $tgl < $nDay; $tgl++) :
			foreach ($dataTank as $k => $d) :
				if (($d['tanggal'] - 1) == $tgl) :
					$newDataTank[$tgl] = $d['data'];
					break;
				else :
					$newDataTank[$tgl] = 0;
				endif;
			endforeach;
		endfor;

		// tools::console($newDataTank);


		return json_encode($newDataTank);
	}
}
