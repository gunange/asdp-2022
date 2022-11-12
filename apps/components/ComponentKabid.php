<?php

trait ComponentKabid
{

	public function SetDashboard($page = null, $key = null, $id = null)
	{
		$this->setPage = $page;
		$this->id = $id ;
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
	public function SetDashboardByFilter($page = null, $bulan=null, $tahun=null)
	{
		$this->setPage = $page ;
		$this->bulan = $bulan ;
		$this->tahun = $tahun ;
		$this->viewDash('settings/dashboard');
	}
	public function SetBbmKapalHistoryByFilter($id = null)
	{

		$this->data = [30, 10, 20, 60, 40, 16, 30];
		$this->bulan = tools::OptBulan($_POST['bulan']) ;
		$this->tahun = $_POST['tahun'] ;

		$this->model->response['response'] = "noSwall" ;
		$this->model->response['tutupModal'] = true ;
		
		// $this->model->response['function'] = [
		// 	"openModalShow('#modal-center-xl', '". BaseKabid ."SetDashboardByFilter/showDataPemakaianMinyakByFilter/" . $this->bulan ."/". $this->tahun ." ', ()=>{setChart(". json_encode($this->data) . ") ; } )"
		// ];
		$this->model->ResponseApi();
	}
}
