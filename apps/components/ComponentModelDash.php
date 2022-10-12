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

	public function HitungVolume($panjang=0, $lebar=0, $tinggi=0)
	{
		$panjang = $panjang / 100 ;
		$lebar = $lebar / 100 ;
		$tinggi = $tinggi / 100 ;
		$volume = $panjang * $lebar * $tinggi ;
		return $volume * 1000 ;
	}
}