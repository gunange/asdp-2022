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
}