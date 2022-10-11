<?php

trait ComponentPetugas{

	public function SetPetugas($page=null, $key=null){
		$this->setPage = $page ;
		if(!is_null($key) ):
			$this->data  =  $this->model->GetPetugas()[$key];
		endif;
		$this->viewDash('settings/petugas');
	}
	public function SetOption()
	{
		echo  '<option>Fucek</option>';
	}
}