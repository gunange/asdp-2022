<?php

trait ComponentKabid{

	public function SetPetugas($page=null, $key=null){
		$this->setPage = $page ;
		if(!is_null($key) ):
			$this->data  =  $this->model->GetPetugas()[$key];
		endif;
		$this->viewDash('settings/petugas');
	}
}