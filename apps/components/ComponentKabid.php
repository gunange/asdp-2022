<?php

trait ComponentKabid
{

	public function SetDashboard($page = null, $key = null, $id = null)
	{
		$this->setPage = $page;
		$this->id = $id;
		if (!is_null($key)) :
			if ($page == "showTangkiKapal") :
				$this->data  =  $this->model->GetStoryTangkiByIdKapal($id);
			endif;
		endif;
		$this->viewDash('settings/dashboard');
	}
	public function SetBbmKapalHistory($page = null, $key = null, $id = null)
	{
		$this->setPage = $page;
		if (!is_null($key)) :
			if ($page == "formFilter") :
				$this->id = $id;
				$this->data = $this->model->sGetKapal()[$key];
			endif;
		endif;
		$this->viewDash('settings/bbm-kapal-history');
	}
	public function SetDashboardByFilter($page = null, $bulan = null, $tahun = null)
	{
		$this->setPage = $page;
		$this->bulan = $bulan;
		$this->tahun = $tahun;
		$this->viewDash('settings/dashboard');
	}
	public function SetBbmKapalHistoryByFilter($id = null)
	{

		$dataCekArrayTank[0] = $this->model->GetDataGrafikSaldoTotalTerbaryDay($this->model->GetHistoryDayTankKanan($id, $_POST['bulan'], $_POST['tahun']));
		$dataCekArrayTank[1] = $this->model->GetDataGrafikSaldoTotalTerbaryDay($this->model->GetHistoryDayTankKiri($id, $_POST['bulan'], $_POST['tahun']));
		$dataCekArrayTank[2] = $this->model->GetDataGrafikSaldoTotalTerbaryDay($this->model->GetHistoryIndukTankKanan($id, $_POST['bulan'], $_POST['tahun']));
		$dataCekArrayTank[3] = $this->model->GetDataGrafikSaldoTotalTerbaryDay($this->model->GetHistoryIndukTankKiri($id, $_POST['bulan'], $_POST['tahun']));

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


		$this->data = $dataSaldo;
		$this->bulan = tools::OptBulan($_POST['bulan']);
		$this->tahun = $_POST['tahun'];

		$this->model->response['response'] = "noSwall";
		$this->model->response['tutupModal'] = true;

		$this->model->response['function'] = [
			"openModalShow('#modal-center-xl', '" . BaseKabid . "SetDashboardByFilter/showDataPemakaianMinyakByFilter/" . $this->bulan . "/" . $this->tahun . " ', ()=>{setChart(" . json_encode($this->data) . ") ; } )"
		];
		$this->model->ResponseApi();
	}
}
