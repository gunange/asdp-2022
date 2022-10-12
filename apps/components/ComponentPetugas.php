<?php

trait ComponentPetugas{

	public function SetBbmKapal($page=null, $id=null, $val=null)
	{
		$this->setPage = $page ;
		$this->id = $id ;
		$this->val = $val ;
		if ($page == "confirmBbbmTangki"):
			$this->data = $this->model->GetDataKonfirmBbmKapal($id, $val);
		endif;
		$this->viewDash('settings/bbm-kapal');
	}
}