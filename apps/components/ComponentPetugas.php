<?php

trait ComponentPetugas
{

	public function SetBbmKapal($page = null, $id = null, $val = null)
	{
		$this->setPage = $page;
		$this->id = $id;
		$this->val = $val;
		if ($page == "confirmBbbmTangki") :
			$this->data = $this->model->GetDataKonfirmBbmKapal($id, $val);
		endif;
		$this->viewDash('settings/bbm-kapal');
	}

	public function SetDelayAirTawar($page = null, $key = null)
	{
		$this->setPage = $page;
		if (!is_null($key)) :
			$this->data  =  $this->model->GetDelayAirTawar()[$key];
		endif;
		$this->viewDash('settings/delayedairtawar');
	}
	public function SetAirTawar($page = null, $id = null)
	{
		$this->setPage = $page;
		$this->id = $id;

		if ($page == "postForm") :
			$this->model->AddAirTawar();
		elseif ($page == "postDelayAirTawar") :
			$this->model->PayAirTawar();
		else :
			$this->id = $id;
			$this->viewDash('settings/air-tawar');
		endif;
	}
	public function PdfAirTawar($page = null, $id = null)
	{
		$this->id = $id;
		$this->setPage = $page;

		$this->viewDash('pdf/air-tawar');
	}
	public function PostShit()
	{
		$_SESSION['shiftPetugas'] = $_POST['post_shift'];
		$this->model->response['response'] = "OK";
		$this->model->response['msg'] = "Sukses anda telah memilih shift, Tekan OK Untuk menyimpan";
		$this->model->response['href'] = BasePetugas . "Main";

		$this->model->ResponseApi();
	}
}
