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
	public function BbmKapalListTahun(){
		$this->viewDashboard ('bbm-kapal-tahun');
	}
	public function BbmKapalListBulan($tahun=""){
		$this->tahun = $tahun ;
		$this->viewDashboard ('bbm-kapal-bulan');
	}
	public function BbmKapalListHari($tahun="", $bulan=""){
		$this->tahun = $tahun ;
		$this->bulan = $bulan ;
		$this->viewDashboard ('bbm-kapal-hari');
	}
	
}