<?php

trait ComponentAdmin{

	public function SetPetugas($page=null, $key=null){
		$this->setPage = $page ;
		if(!is_null($key) ):
			$this->data  =  $this->model->GetPetugas()[$key];
		endif;
		$this->viewDash('settings/petugas');
	}
	public function SetKabid($page=null, $key=null){
		$this->setPage = $page ;
		if(!is_null($key) ):
			$this->data  =  $this->model->GetKabid()[$key];
		endif;
		$this->viewDash('settings/kabid');
	}
	public function SetKapal($page=null, $key=null){
		$this->setPage = $page ;
		if(!is_null($key) ):
			$this->data  =  $this->model->GetKapal()[$key];
		endif;
		$this->viewDash('settings/kapal');
	}
	public function SetDermaga($page=null, $key=null){
		$this->setPage = $page ;
		if(!is_null($key) ):
			$this->data  =  $this->model->GetDermaga()[$key];
		endif;
		$this->viewDash('settings/dermaga');
	}
	public function SetTangkiKapal($page=null, $key=null, $idKapal=null){
		$this->setPage = $page ;
		if(!is_null($key) ):
			$this->data  =  $this->model->GetTangkiKapalById($idKapal)[$key];
			$this->key = $key ;
		endif;
		$this->idKapal = $idKapal ;
		$this->viewDash('settings/tangki-kapal');
	}
	public function SetJenisTanki($page=null, $key=null){
		$this->setPage = $page ;
		if(!is_null($key) ):
			$this->data  =  $this->model->sGetJenisTanki()[$key];
		endif;
		$this->viewDash('settings/jenis-tanki');
	}
}