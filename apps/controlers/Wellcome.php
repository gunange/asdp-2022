<?php
class Wellcome extends Controler{
	public
			$model,
			$setPage, 
			$id, 
			$data = []
		;

	public function __construct(){
		$this->model = $this->model('ModelUser');
	}
	
	public function Main(){
		$this->view('wellcome/login');
	}

	public function LogIn(){
		if (tools::is_no_empty_post()):
			$this->model->logIn();
		else:
			$this->model->response['msg'] = "Data yang anda Masukan tidak lengkap";
		endif;
		$this->model->ResponseApi();
	}
	

}