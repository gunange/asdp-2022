<?php

class ModelPetugas extends Controler
{

	private $modelUser;
	public $user;

	use MasterData, MasterJoin, ComponentModelDash, ApiResponse;

	public function __construct()
	{
		$this->modelUser = $this->model('ModelUser');
		$this->modelUser->userAllow = [3];
		if ($this->modelUser->isUser()) :
			$this->setUser($this->modelUser->dataUser);
		endif;
	}

	private function GetDataUser()
	{
		$set 			= $this->PetugasJoin();

		$set['query']	= "WHERE lg.token = '{$_SESSION[$this->tokenName]}' ";
		$set['loop'] 	= 'no_loop';

		return database::join($set);
	}

	public function GetDermaga()
	{
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_dermaga';
		$set['query']	= "";

		return database::select($set);
	}

	public function GetKapal()
	{
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_kapal';
		$set['query']	= "";

		return database::select($set);
	}

	public function AddAirTawar()
	{
		$set['set'] = [
			"id_user" 			=> $this->user->id,
			"id_kapal" 			=> $_POST['id_kapal'],
			"id_dermaga" 		=> $_POST['id_dermaga'],
			"shift"				=> $_SESSION['shiftPetugas'],
			"tgl"				=> date("Y-m-d"),
			"waktu"				=> date("h:i:s"),
			"debit_air"			=> $_POST['debit_air'],
			"total_air_tawar"	=> $_POST['total_air_tawar'],
			"status"      		=> $_POST['status'],
		];
		$set['tbl'] 	= "tbl_air_tawar";

		$idAirTawar  	= database::getNextId($set);
		$idDermaga 		= $_POST['id_dermaga'];
		database::insert($set);

		$this->response["response"] = "OK";
		$this->response["msg"] = "Data berhasil ditambahkan, kini data tersebut masuk dalam menu delayed";


		if ($_POST['status'] == "Lunas") :
			$this->response["msg"] = "Data anda berhasil ditambahkan, tekan ok untuk melihat data spesifik dan anda bisa melakukan print !";
			$this->response['modal'] = [
				"#modal-center-lg-static",
				BasePetugas . "SetAirTawar/Pengolahan/" . $idAirTawar . "/" . $idDermaga
			];
		else :
			$this->response["function"] = [
				'resetdebitair("' . $idDermaga . '")',
			];
		endif;


		$this->ResponseApi();
	}

	public function GetAirTawar()
	{
		$set = $this->AirTawarJoin();
		$set['query'] = "WHERE UPPER(status)='LUNAS' ORDER BY waktu DESC, tgl DESC";

		return database::join($set);
	}



	public function GetDelayAirTawar()
	{
		$set = $this->AirTawarJoin();
		$set['query'] = "WHERE UPPER(status)!='LUNAS' ORDER BY waktu DESC, tgl DESC";

		return database::join($set);
	}



	public function GetDataSandar()
	{
		$set = $this->DataSandarJoin();
		$set['query'] = "WHERE UPPER(status)='LUNAS' ORDER BY waktu_awal DESC, tgl DESC";

		return database::join($set);
	}
	public function GetDelayDataSandar()
	{
		$set = $this->DataSandarJoin();
		$set['query'] = "WHERE UPPER(status)!='LUNAS' ORDER BY waktu_awal DESC, tgl DESC";

		return database::join($set);
	}


	public function GetTangkiKapalById($id = null)
	{
		$set 	= $this->TankiKapalJoin();
		$set['query']	= "WHERE tanki.id_kapal = '{$id}'";

		return database::join($set);
	}
	public function GetOnlyTangkiKapalByIdTangki($id = null)
	{
		$set 	= $this->TankiKapalJoin();
		$set['query']	= "WHERE tanki.id = '{$id}'";
		$set['loop']	= "no_loop";

		return database::join($set);
	}


	public function GetDataKonfirmBbmKapal($idTangki = null, $tinggiMinyak = null)
	{
		$msg = new stdClass();

		$msg->action = false;

		if (!empty($idTangki) && !empty($tinggiMinyak)) :
			$msg->action = true;
			$msg->dataTangki = (object)$this->GetOnlyTangkiKapalByIdTangki($idTangki);
			$msg->liter = $this->HitungVolume($msg->dataTangki->liter, $msg->dataTangki->tinggi, $tinggiMinyak);
			$msg->maxLiter = $this->HitungVolume($msg->dataTangki->liter, $msg->dataTangki->tinggi, $msg->dataTangki->tinggi_maksimum);
			$msg->tinggiMinyak = $tinggiMinyak;
			$msg->persentage = intval(($msg->liter * 100) / $msg->maxLiter);
			$msg->tanggal = date("Y-m-d");
			$msg->waktu = date("h:i:s");
		endif;

		return $msg;
	}
	public function AddBbmTangki()
	{
		$set['set'] = [
			"id_user" => $this->user->id,
			"id_tanki" => $_POST['id_tanki'],
			"waktu" => $_POST['waktu'],
			"tgl" => $_POST['tgl'],
			"liter" => $_POST['liter'],
			"tinggi_bbm" => $_POST['tinggi_bbm'],
		];
		$set['tbl'] 	= "tbl_history_tanki";
		database::insert($set);

		$this->response['response'] = "OK";
		$this->response['msg'] = "Data BBM Tangki Berhasil Di Input";
		$this->ResponseApi();
	}

	public function PayAirTawar()
	{
		$set['tbl']	= "tbl_air_tawar";
		$set['key']	= "id";
		$set['val']	= $_POST['id_air_tawar'];

		$set['set'] = [
			"status" => "Lunas",
		];

		database::update($set);

		$idAirTawar = $_POST['id_air_tawar'];
		$this->response["response"] = "OK";
		$this->response["msg"] = "Data anda berhasil ditambahkan, tekan ok untuk melihat data spesifik dan anda bisa melakukan print !";
		$this->response['modal'] = [
			"#modal-center-lg-static",
			BasePetugas . "SetAirTawar/Bayar/" . $idAirTawar
		];


		$this->ResponseApi();
	}
	public function PaySandar()
	{
		$set['tbl']	= "tbl_sandar";
		$set['key']	= "id";
		$set['val']	= $_POST['id_sandar'];

		$set['set'] = [
			"status" => "Lunas",
		];

		database::update($set);

		$idSandar = $_POST['id_sandar'];
		$this->response["response"] = "OK";
		$this->response["msg"] = "Data anda berhasil ditambahkan, tekan ok untuk melihat data spesifik dan anda bisa melakukan print !";
		$this->response['modal'] = [
			"#modal-center-lg-static",
			BasePetugas . "SetSandar/Bayar/" . $idSandar
		];


		$this->ResponseApi();
	}

	public function GetAirTawarById($id)
	{
		$set = $this->AirTawarJoin();
		$set['query'] = "WHERE tat.id='{$id}'";

		return database::join($set);
	}

	public function GetSandarById($id)
	{
		$set = $this->SandarJoin();
		$set['query'] = "WHERE ts.id='{$id}'";

		return database::join($set);
	}

	public function AddSandar()
	{
		$set['set'] = [
			"id_user" 			=> $this->user->id,
			"id_kapal" 			=> $_POST['id_kapal'],
			"id_dermaga" 		=> $_POST['id_dermaga'],
			"tgl" 				=> date("Y-m-d"),
			"waktu_awal" 		=> $_POST['waktu_awal'],
			"waktu_akhir" 		=> $_POST['waktu_akhir'],
			"akumulasi_menit" 	=> $_POST['akumulasi_menit'],
			"total_call" 		=> $_POST['total_call'],
			"total_sandar" 		=> $_POST['total_sandar'],
			"shift" 			=> $_SESSION['shiftPetugas'],
			"status" 			=> $_POST['status'],
		];
		$set['tbl'] 	= "tbl_sandar";

		$idSandar  	= database::getNextId($set);
		$keySandar = $_POST['key_sandar'] ;
		database::insert($set);

		$this->response["response"] = "OK";
		$this->response["msg"] = "Data berhasil ditambahkan, kini data tersebut masuk dalam menu delayed";


		if ($_POST['status'] == "Lunas") :
			$this->response["msg"] = "Data anda berhasil ditambahkan, tekan ok untuk melihat data spesifik dan anda bisa melakukan print !";
			$this->response['modal'] = [
				"#modal-center-lg",
				BasePetugas . "SetSandar/Pengolahan/" . $idSandar
			];
		endif;

		$this->response["function"] = [
				'ressetTime("' . $keySandar . '")',
			];


		$this->ResponseApi();
	}


	public function HistoryTangkiKapalDay($id)
	{
		$set 			 = $this->HistoryDayTank();

		$set['query']	= "WHERE id_kapal='{$id}' AND tgl = DATE(SYSDATE())  AND id_jenis_tanki=1 AND tgl=DATE(SYSDATE()) ORDER BY waktu ASC";


		return database::join($set);
	}
	public function GetStoryTangkiByIdKapal($id)
	{
		$set 			 = $this->JoinStoryTangki($id);

		$set['query']	= "WHERE tk.id = '{$id}' GROUP BY id_jenis_tanki ORDER BY tht.id DESC ";


		return database::join($set);
	}
	public function Testing($id)
	{
		$set 			 = $this->JoinStoryTangki();

		$set['query']	= "WHERE tk.id = '{$id}' GROUP BY id_jenis_tanki ORDER BY tht.id DESC ";


		return database::join($set ,false);
	}
}
