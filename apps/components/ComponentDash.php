<?php

trait ComponentDash{

	public function logOut(){
		$gh = $this->model('ModelUser');
		$gh->logOut();
	}
	public function AccountSetting($data){
		$this->data['url'] = $data ;
		$this->viewTemplate('dashboard-components/akun');
	}
	public function AccountAndProfilSet($data){
		$this->data['url'] = $data ;
		$this->viewTemplate('dashboard-components/akun-profil');
	}
	public function upAccount(){
		$gh = $this->model('ModelUser');
		$gh->isUser();
		$gh->upAccount();
		$gh->ResponseApi();
	}
	public function upProfil(){
		$this->model->upProfil();
	}
	public function GetNotif()
	{
		$this->viewTemplate('dashboard-components/notif');
	}

}