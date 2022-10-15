<?php

trait ComponentPetugas
{

	public function SetBbmKapal($page = null, $id = null, $val = null)
	{
		$this->setPage = $page;
		$this->id = $id;
		$this->val = $val;
		if ($page == "confirmBbbmTangki") :
			$this->data = $this->model->GetDataKonfirmBbmKapal($id, $val);
		endif;
		$this->viewDash('settings/bbm-kapal');
	}

	public function SetDelayAirTawar($page = null, $key = null)
	{
		$this->setPage = $page;
		if (!is_null($key)) :
			$this->data  =  $this->model->GetDelayAirTawar()[$key];
		endif;
		$this->viewDash('settings/delayedairtawar');
	}
}
