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
	public function upAccount(){
		$gh = $this->model('ModelUser');
		$gh->isUser();
		$gh->upAccount();
		$gh->ResponseApi();
	}

}