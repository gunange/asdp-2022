<?php

class ModelPetugas extends Controler
{

	private $modelUser;
	public $user;

	use MasterData, MasterJoin, ComponentModelDash;

	public function __construct()
	{
		$this->modelUser = $this->model('ModelUser');
		$this->modelUser->userAllow = [3];
		if ($this->modelUser->isUser()) :
			$this->setUser($this->modelUser->dataUser);
		endif;
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
			"regu"				=> '0',
			"shift"				=> '0',
			"tgl"				=> date("Y-m-d"),
			"waktu"				=> date("h:i:s"),
			"debit_air"			=> $_POST['debit_air'],
			"total_air_tawar"	=> $_POST['total_air_tawar'],
			"status"      		=> $_POST['status'],
		];
		$set['tbl'] 	= "tbl_air_tawar";
		database::insert($set);

		msg::$msg = "Data berhasil ditambahkan";
		msg::success();
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
}
