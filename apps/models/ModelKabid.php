<?php

class ModelKabid extends Controler{

	private $modelUser ;
	public $user;
	
	use MasterData, MasterJoin, ComponentModelDash ;

	public function __construct(){
		$this->modelUser = $this->model('ModelUser');
		$this->modelUser->userAllow = [2];
		if($this->modelUser->isUser()):
			$this->setUser($this->modelUser->dataUser);
		endif;
	}


}