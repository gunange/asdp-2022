<?php

trait ComponentKabid{

	public function SetDashboard($page=null, $key=null, $id=null){
		$this->setPage = $page ;
		if(!is_null($key) ):
			if ($page == "showTangkiKapal"):
				$this->data  =  $this->model->GetStoryTangkiByIdKapal($id);
			endif;
		endif;
		$this->viewDash('settings/dashboard');
	}
}