<?php

trait ComponentAdmin{

	public function SetCrud($page=null, $key=null){
		$this->setPage = $page ;
		if(!is_null($key) ):
			$this->data  =  [];
		endif;
		$this->viewDash('settings/crud');
	}
	public function PdfExample()
	{
		$this->viewDash('settings/pdf-table');
	}
}