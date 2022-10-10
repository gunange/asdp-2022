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
	
}