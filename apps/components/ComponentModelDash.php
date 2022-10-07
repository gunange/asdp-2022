<?php

trait ComponentModelDash{
	protected function setUser($data){
		$data = json_encode($data, JSON_NUMERIC_CHECK);
		$this->user = json_decode($data);
	}
	
	public function getLink(){
		$data =  explode('/', $_GET['url']);
		$data = end($data) ;
		$data = (strlen($data) > 2 ? $data  : 'Main' );
		return $data ;
	}
}