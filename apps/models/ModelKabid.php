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


	public function HistoryDayTangkiKapalDinamic($id_kapal, $id_jenis_tanki, $month = null, $year = null)
	{
		if ($month == null && $year == null) {
			$set 	= $this->HistoryDayTank();
			$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id='{$id_jenis_tanki}' ORDER BY DATE( tgl) ASC, waktu DESC";
		} else {
			$set 	= $this->HistoryDayTank();
			$set['query']	= "WHERE MONTH(tgl)='$month' AND YEAR(tgl)='$year' AND tk.id='{$id_kapal}' AND tjt.id='{$id_jenis_tanki}' ORDER BY DATE( tgl) ASC, waktu DESC";
		}

		return database::join($set);
	}


	public function GetHistoryDayTankKanan($id_kapal, $month = null, $year = null)
	{
		if ($month == null && $year == null) {
			$set 	= $this->HistoryDayTank();
			$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id=1 ORDER BY DATE( tgl) ASC, waktu DESC";
		} else {
			$set 	= $this->HistoryDayTank();
			$set['query']	= "WHERE MONTH(tgl)='$month' AND YEAR(tgl)='$year' AND tk.id='{$id_kapal}' AND tjt.id=1 ORDER BY DATE( tgl) ASC, waktu DESC";
		}

		return database::join($set);
	}
	public function GetHistoryDayTankKiri($id_kapal, $month = null, $year = null)
	{
		if ($month == null && $year == null) {
			$set 	= $this->HistoryDayTank();
			$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id=2 ORDER BY DATE( tgl) ASC, waktu DESC";
		} else {
			$set 	= $this->HistoryDayTank();
			$set['query']	= "WHERE MONTH(tgl)='$month' AND YEAR(tgl)='$year' AND tk.id='{$id_kapal}' AND tjt.id=2 ORDER BY DATE( tgl) ASC, waktu DESC";
		}
		return database::join($set);
	}
	public function GetHistoryIndukTankKanan($id_kapal, $month = null, $year = null)
	{
		if ($month == null && $year == null) {
			$set 	= $this->HistoryDayTank();
			$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id=3 ORDER BY DATE( tgl) ASC, waktu DESC";
		} else {
			$set 	= $this->HistoryDayTank();
			$set['query']	= "WHERE MONTH(tgl)='$month' AND YEAR(tgl)='$year' AND tk.id='{$id_kapal}' AND tjt.id=3 ORDER BY DATE( tgl) ASC, waktu DESC";
		}
		return database::join($set);
	}
	public function GetHistoryIndukTankKiri($id_kapal, $month = null, $year = null)
	{
		if ($month == null && $year == null) {
			$set 	= $this->HistoryDayTank();
			$set['query']	= "WHERE MONTH(tgl)=MONTH(SYSDATE()) AND YEAR(tgl)=YEAR(SYSDATE()) AND tk.id='{$id_kapal}' AND tjt.id=4 ORDER BY DATE( tgl) ASC, waktu DESC";
		} else {
			$set 	= $this->HistoryDayTank();
			$set['query']	= "WHERE MONTH(tgl)='$month' AND YEAR(tgl)='$year' AND tk.id='{$id_kapal}' AND tjt.id=4 ORDER BY DATE( tgl) ASC, waktu DESC";
		}
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
		$set['query'] = "WHERE UPPER(status)='LUNAS' AND tgl=(
		SELECT tgl FROM tbl_air_tawar ORDER BY tgl DESC LIMIT 0,1
	) ORDER BY waktu DESC, tgl DESC";

		return database::join($set);
	}
	public function GetDataSandar()
	{
		$set = $this->DataSandarJoin();
		$set['query'] = "WHERE UPPER(status)='LUNAS' AND tgl=(
		SELECT tgl FROM tbl_sandar ORDER BY tgl DESC LIMIT 0,1
	) ORDER BY waktu_awal DESC, tgl DESC";

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


	public function GetDataGrafikSaldoTotalTerbaryDay($dataHistory)
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
	public function GetDataGrafikSaldoTotalByTahunBulan($dataHistory, $length = 0)
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

		endforeach;

		$nDay = $length;

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

	public function HistoryTangkiKapalDinamic($id_kapal, $id_jenis_tanki)
	{
		$set 			 = $this->HistoryDayTank();

		$set['query']	= "WHERE id_kapal='{$id_kapal}' AND tgl = DATE(SYSDATE())  AND id_jenis_tanki='{$id_jenis_tanki}' AND tgl=DATE(SYSDATE()) ORDER BY waktu ASC";


		return database::join($set);
	}

	public function GetJenisTankiByKapal($id_kapal)
	{
		$set 			 = $this->KapalJoinTanki();

		$set['query']	= "WHERE id_kapal='{$id_kapal}' ";


		return database::join($set);
	}

	public function HistoryTangkiKananKapalDay($id)
	{
		$set 			 = $this->HistoryDayTank();

		$set['query']	= "WHERE id_kapal='{$id}' AND tgl = DATE(SYSDATE())  AND id_jenis_tanki=1 AND tgl=DATE(SYSDATE()) ORDER BY waktu ASC";


		return database::join($set);
	}

	public function HistoryTangkiKiriKapalDay($id)
	{
		$set 			 = $this->HistoryDayTank();

		$set['query']	= "WHERE id_kapal='{$id}' AND tgl = DATE(SYSDATE())  AND id_jenis_tanki=2 AND tgl=DATE(SYSDATE()) ORDER BY waktu ASC";


		return database::join($set);
	}

	public function HistoryTangkiKananKapalInduk($id)
	{
		$set 			 = $this->HistoryDayTank();

		$set['query']	= "WHERE id_kapal='{$id}' AND tgl = DATE(SYSDATE())  AND id_jenis_tanki=3 AND tgl=DATE(SYSDATE()) ORDER BY waktu ASC";


		return database::join($set);
	}

	public function HistoryTangkiKiriKapalInduk($id)
	{
		$set 			 = $this->HistoryDayTank();

		$set['query']	= "WHERE id_kapal='{$id}' AND tgl = DATE(SYSDATE())  AND id_jenis_tanki=4 AND tgl=DATE(SYSDATE()) ORDER BY waktu ASC";


		return database::join($set);
	}
	public function GetBbmKapalByFilter($id)
	{
		$countTgl = cal_days_in_month(CAL_GREGORIAN, $_POST['bulan'], $_POST['tahun']);

		$dataCekArrayTank = [];
		$dataJenisTanki = $this->GetJenisTankiByKapal($id);

		foreach ($dataJenisTanki as $key => $djt) {
			$dataCekArrayTank[$key] =  $this->GetDataGrafikSaldoTotalByTahunBulan($this->HistoryDayTangkiKapalDinamic($id, $djt['id_jenis_tanki'], $_POST['bulan'], $_POST['tahun']), $countTgl);
		}

		// $dataCekArrayTank[0] = $this->GetDataGrafikSaldoTotalByTahunBulan($this->GetHistoryDayTankKanan($id, $_POST['bulan'], $_POST['tahun']), $countTgl);
		// $dataCekArrayTank[1] = $this->GetDataGrafikSaldoTotalByTahunBulan($this->GetHistoryDayTankKiri($id, $_POST['bulan'], $_POST['tahun']), $countTgl);
		// $dataCekArrayTank[2] = $this->GetDataGrafikSaldoTotalByTahunBulan($this->GetHistoryIndukTankKanan($id, $_POST['bulan'], $_POST['tahun']), $countTgl);
		// $dataCekArrayTank[3] = $this->GetDataGrafikSaldoTotalByTahunBulan($this->GetHistoryIndukTankKiri($id, $_POST['bulan'], $_POST['tahun']), $countTgl);

		// proses mendapatkan dataTankTotal
		$dataSaldo = [];

		$tempArrayTank = 0;
		foreach ($dataCekArrayTank as $k => $val) {
			if (count(json_decode($val)) !== 0) {
				if ($tempArrayTank !== 0) {
					foreach (json_decode($dataCekArrayTank[$k], true) as $index => $datakanan) {
						$dataSaldo[$index] = $datakanan + $tempArrayTank[$index];
					}
					$tempArrayTank = $dataSaldo;
					$dataSaldo = $dataSaldo;
				} else {
					$tempArrayTank = json_decode($dataCekArrayTank[$k]);
					$dataSaldo = $tempArrayTank;
				}
			}
		}

		$nilaiAkhir = 0;
		foreach ($dataSaldo as $k => $d) :

			$dataSaldo[$k] = ($d != 0 ? intval($d) : $nilaiAkhir);
			if ($d != 0) :
				$nilaiAkhir = intval($d);
			endif;
		endforeach;

		return $dataSaldo;
	}
}
