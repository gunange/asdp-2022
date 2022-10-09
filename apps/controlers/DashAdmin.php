<?php

class DashAdmin extends Controler {
	protected 
		$dPage = "pages/admin/",
		$fMenu = "dashboard/menu/admin.php",
		
		$gLink = BaseAdmin,
		$srcBerkas;
		
	protected $model, $user, $setPage ;
	public 
		$id, 
		$data=[];

	use ComponentDash,  ComponentAdmin ;

	public function __construct(){
		$this->model = $this->model('ModelAdmin');
		$this->user = $this->model->user;

	}
	
	public function Main(){
		$this->viewDashboard ('dashboard');
	}
	public function Petugas(){
		$this->viewDashboard ('petugas');
	}
	public function Kabid(){
		$this->viewDashboard ('kabid');
	}
	
}