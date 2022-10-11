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
	public function Kapal(){
		$this->viewDashboard ('kapal');
	}
	public function Dermaga(){
		$this->viewDashboard ('dermaga');
	}
	public function TangkiKapal($key=null){
		$this->id = $key ;
		if(!is_null($key) && is_array(@$this->model->GetKapal()[$this->id])):
			$this->data = $this->model->GetKapal()[$this->id];
		else:
			$this->notFound = true ;
		endif;
		$this->viewDashboard ('tangki-kapal');
		
	}
	
}