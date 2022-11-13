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
	public function SetDelaySandar($page = null, $key = null)
	{
		$this->setPage = $page;
		if (!is_null($key)) :
			$this->data  =  $this->model->GetDelayDataSandar()[$key];
		endif;
		$this->viewDash('settings/delayedsandar');
	}
	public function SetAirTawar($page = null, $id = null, $key= null)
	{
		$this->setPage = $page;
		$this->id = $id;
		$this->key = $key;

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

	public function SetSandar($page = null, $id = null)
	{
		$this->setPage = $page;
		$this->id = $id;

		if ($page == "postForm") :
			$this->model->AddSandar();
		elseif ($page == "postDelaySandar") :
			$this->model->PaySandar();
		else :
			$this->id = $id;
			$this->viewDash('settings/sandar');
		endif;
	}
	public function PdfSandar($page = null, $id = null)
	{
		$this->id = $id;
		$this->setPage = $page;

		$this->viewDash('pdf/sandar');
	}
	public function PostShit()
	{
		$_SESSION['shiftPetugas'] = $_POST['post_shift'];
		$this->model->response['response'] = "OK";
		$this->model->response['msg'] = "Sukses anda telah memilih shift, Tekan OK Untuk menyimpan";
		$this->model->response['href'] = BasePetugas . "Main";

		$this->model->ResponseApi();
	}
	public function SetInvoiceSandar($page = null, $id_kapal=null, $id_dermaga= null, $tanggal_awal = null, $tanggal_akhir = null)
	{
		$this->setPage = $page;
		$this->isData = false ;
		if ($page == "postPdf"):
			
			$this->model->response['response'] = "noSwall" ;
			$this->model->response['tutupModal'] = true ;
			$this->model->response['function'] = [
				"openModalShow('#modal-center-xl', '". BasePetugas ."SetInvoiceSandar/pdf/". $_POST['id_kapal'] ."/". $_POST['id_dermaga'] ."/". $_POST['tanggal_awal'] ."/". $_POST['tanggal_akhir'] . "/ ' )"
			];
			$this->model->ResponseApi();
		else:
			if ($page == "pdf"):
				$this->isData = true ;
				$this->id_kapal = $id_kapal;
				$this->id_dermaga = $id_dermaga;
				$this->tanggal_awal = $tanggal_awal;
				$this->tanggal_akhir = $tanggal_akhir;
			endif;
			$this->viewDash('settings/invoice-sandar');
		endif;
	}
	public function PdfInvoiceSandar($page=null, $id_kapal=null, $id_dermaga= null, $tanggal_awal = null, $tanggal_akhir = null)
	{
		$this->setPage = $page;

		$this->data = $this->model->GetDocDelaySandar($id_kapal, $id_dermaga, $tanggal_awal, $tanggal_akhir) ;

		$this->viewDash('pdf/sandar');
	}
	public function SetInvoiceAirTawar($page = null, $id_kapal=null, $id_dermaga= null, $tanggal_awal = null, $tanggal_akhir = null)
	{
		$this->setPage = $page;
		$this->isData = false ;
		if ($page == "postPdf"):
			
			$this->model->response['response'] = "noSwall" ;
			$this->model->response['tutupModal'] = true ;
			$this->model->response['function'] = [
				"openModalShow('#modal-center-xl', '". BasePetugas ."SetInvoiceAirTawar/pdf/". $_POST['id_kapal'] ."/". $_POST['id_dermaga'] ."/". $_POST['tanggal_awal'] ."/". $_POST['tanggal_akhir'] . "/ ' )"
			];
			$this->model->ResponseApi();
		else:
			if ($page == "pdf"):
				$this->isData = true ;
				$this->id_kapal = $id_kapal;
				$this->id_dermaga = $id_dermaga;
				$this->tanggal_awal = $tanggal_awal;
				$this->tanggal_akhir = $tanggal_akhir;
			endif;
			$this->viewDash('settings/invoice-air-tawar');
		endif;
	}
	public function PdfInvoiceAirTawar($page=null, $id_kapal=null, $id_dermaga= null, $tanggal_awal = null, $tanggal_akhir = null)
	{
		$this->setPage = $page;

		$this->data = $this->model->GetDocDelayAirTawar($id_kapal, $id_dermaga, $tanggal_awal, $tanggal_akhir) ;

		$this->viewDash('pdf/air-tawar');
	}
	public function SetDokumen($page = null, $idKapal = null, $idJenisDokumen = null, $expire=null)
	{
		$this->setPage = $page;
		$this->idKapal = $idKapal;
		$this->idJenisDokumen = $idJenisDokumen;
		$this->expire = $expire;
		if ($page == "confirmDokumen") :
			$this->data = $this->model->GetDataKonfirmDokumen($idKapal, $idJenisDokumen, $expire );
		elseif($page == "getDataDokumen"):
			$this->data = $this->model->GetDokumenByIdKapal($idKapal) ;
		endif;
		$this->viewDash('settings/dokumen');
	}
}
