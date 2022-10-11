<?php

trait ComponentPetugas{

	public function SetBbmKapal($page=null, $key=null, $idKapal=null)
	{
		$this->setPage = $page ;
		if(!is_null($key) ):
			$this->data  =  $this->model->GetTangkiKapalById($idKapal);
		endif;
		$this->viewDash('settings/bbm-kapal');
	}
}