<?php

trait ComponentPetugas{

	public function SetBbmKapal($page=null, $idKapal=null)
	{
		$this->setPage = $page ;
		$this->idKapal = $idKapal ;
		$this->viewDash('settings/bbm-kapal');
	}
}