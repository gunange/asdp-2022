<?php

class DashKabid extends Controler {
	protected 
		$dPage = "pages/kabid/",
		$fMenu = "dashboard/menu/kabid.php",
		
		$gLink = BaseKabid,
		$srcBerkas;
		
	protected $model, $user, $setPage ;
	public 
		$id, 
		$data=[];

	use ComponentDash,  ComponentKabid ;

	public function __construct(){
		$this->model = $this->model('ModelKabid');
		$this->user = $this->model->user;

	}
	
	public function Main(){
		$this->viewDashboard ('dashboard');
	}
	public function BbmKapalHistory(){
		$this->viewDashboard ('bbm-kapal-history');
	}
	public function BbmKapalPerhari($id=null, $tahun=null, $bulan=null){
		$this->id = $id ;
		$this->tahun = $tahun ;
		$this->bulan = $bulan ;

		if (!is_null($id) && !is_null($tahun) &&  !is_null($bulan) ):
			$this->dataKapal = $this->model->GetKapalById($id);

			$this->data = $this->model->GetHistoryByTahunAndByIdKapal($id, $tahun, $bulan);
			$this->dataGrafik = $this->model->GetDataGrafik($this->data);



			if (!is_array($this->dataKapal)):
				$this->notFound = true ;
			endif;
		else:
			$this->notFound = true ;
		endif ;
		$this->viewDashboard ('bbm-kapal-per-hari');
	}
	public function DelayedAirTawar(){
		$this->viewDashboard ('delayed-air-tawar');
	}
	public function DelayedSandarKapal(){
		$this->viewDashboard ('delayed-sandar');
	}
	public function InvoiceAirTawar(){
		$this->viewDashboard ('invoice-air-tawar');
	}
	public function InvoiceSandarKapal(){
		$this->viewDashboard ('invoice-sandar');
	}
	
}