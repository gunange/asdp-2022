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
	public function GetOnlyTangkiKapalByIdTangki($id = null)
	{
		$set 	= $this->TankiKapalJoin();
		$set['query']	= "WHERE tanki.id = '{$id}'";
		$set['loop']	= "no_loop";

		return database::join($set);
	}

	public function GetStoryTangkiByIdKapal($id = null)
	{
		$set['set'] 	= "
		(
        SELECT
            CAST(CONCAT(tgl, ' ', waktu) AS datetime)
        FROM
            tbl_history_tanki
            JOIN tbl_tanki ON tbl_tanki.id = tbl_history_tanki.id_tanki
        WHERE
            id_jenis_tanki = tt.id_jenis_tanki
        ORDER BY
            tbl_history_tanki.id DESC
        LIMIT
            0, 1
    ) dates, (
        SELECT
            tgl
        FROM
            tbl_history_tanki
            JOIN tbl_tanki ON tbl_tanki.id = tbl_history_tanki.id_tanki
        WHERE
            id_jenis_tanki = tt.id_jenis_tanki
        ORDER BY
            tbl_history_tanki.id DESC
        LIMIT
            0, 1
    ) AS tgl, (
        SELECT
            waktu
        FROM
            tbl_history_tanki
            JOIN tbl_tanki ON tbl_tanki.id = tbl_history_tanki.id_tanki
        WHERE
            id_jenis_tanki = tt.id_jenis_tanki
        ORDER BY
            tbl_history_tanki.id DESC
        LIMIT
            0, 1
    ) AS waktu,
    (
        SELECT
            tbl_history_tanki.liter
        FROM
            tbl_history_tanki
            JOIN tbl_tanki ON tbl_tanki.id = tbl_history_tanki.id_tanki
        WHERE
            id_jenis_tanki = tt.id_jenis_tanki
        ORDER BY
            tbl_history_tanki.id DESC
        LIMIT
            0, 1
    ) AS liter,
    (
        SELECT
            tinggi_bbm waktu
        FROM
            tbl_history_tanki
            JOIN tbl_tanki ON tbl_tanki.id = tbl_history_tanki.id_tanki
        WHERE
            id_jenis_tanki = tt.id_jenis_tanki
        ORDER BY
            tbl_history_tanki.id DESC
        LIMIT
            0, 1
    ) AS tinggi_bbm,
    id_jenis_tanki,
    tinggi,
    tt.liter AS liter_tanki,
    tinggi_maksimum,
    nama_kapal,
    jenis_tanki
		";
		$set['join'] = [

			'induk' =>
			[
				'type'   	=> 'left_join',
				'table' 	=> 'tbl_history_tanki',
				'key'   	=> 'tht'
			], 'join' => [

				[
					'table' => 'tbl_tanki',
					'key'   => 'tt',
					'id'    => 'tt.id',
					'in'    => 'tht.id_tanki'
				],
				[
					'table' => 'tbl_kapal ',
					'key'   => 'tk',
					'id'    => 'tk.id',
					'in'    => 'tt.id_kapal'
				],
				[
					'table' => 'tbl_jenis_tanki ',
					'key'   => 'tjt',
					'id'    => 'tjt.id',
					'in'    => 'tt.id_jenis_tanki'
				],

			]
		];

		$set['query']	= "WHERE tk.id = '{$id}' GROUP BY id_jenis_tanki ORDER BY tht.id DESC ";

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
}
