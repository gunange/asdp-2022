<?php

class ModelAdmin extends Controler{

	private $modelUser ;
	public $user;
	
	use MasterData, MasterJoin, ComponentModelDash ;

	public function __construct(){
		$this->modelUser = $this->model('ModelUser');
		$this->modelUser->userAllow = [1];
		if($this->modelUser->isUser()):
			$this->setUser($this->modelUser->dataUser);
		endif;
	}

	public function UpAkunUser()
	{
		try{
			$set['tbl'] = "tbl_login";
			$set['key']	= "id" ;
			$set['val']	= $_POST['upAkun'] ;

			$set['set'] = [
				"username" 		=> $_POST['username'],
			];
			if(isset($_POST['password'])):
				$set['set']['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
			endif;

			database::update($set);

			msg::$msg = "Akun berhasil diperbahrui ";
			msg::success();

		} catch(PDOException $e){
			msg::$msg = "Username yang anda gunakan sudah terdaftar, mohon gunankan username yang lain ";
			msg::error();
		}
	}
	public function GetPetugas()
	{
		$set 			= $this->PetugasJoin();
		$set['query']	= "";


		return database::join($set);
	}
	public function AddPetugas()
	{
		try{
			$set['set'] = [
				"username" => $_POST['username'],
				"password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
				"id_level" => 3,
				"token" =>  $this->modelUser->generateToken($_POST['username']),
			];
			$set['tbl'] 	= "tbl_login";
			$id_login = database::getNextId($set);
			database::insert($set);

			$set = NULL;
			$set['set'] = [
				"nama" => $_POST['nama'],
				"id_jenis_kelamin" => $_POST['id_jenis_kelamin'],
				
				"id_login" => $id_login,
			];
			$set['tbl'] 	= "tbl_user";
			$id_user = database::getNextId($set);
			database::insert($set);

			$set = NULL;
			$set['set'] = [
				"id_user" => $id_user,
			];
			$set['tbl'] 	= "tbl_petugas";

			database::insert($set);

			msg::$msg = "Data berhasil ditambahkan";
			msg::success();
		}catch(PDOException){
			msg::$msg = "Username yang anda gunakan sudah terdaftar, mohon gunankan username yang lain ";
			msg::error();
		}
		
	}
	
	public function upPetugas()
	{
		$set['tbl']	= "tbl_user" ;
		$set['key']	= "id" ;
		$set['val']	= $_POST['id_user'] ;
		
		$set['set'] = [
			"nama"             => $_POST['nama'],
			"id_jenis_kelamin" => $_POST['id_jenis_kelamin'],
		];
		
		database::update($set);

		msg::$msg = "Data berhasil diperbahrui ";
		msg::success();
	}

	public function DelPetugas()
	{
		try{

			$set['tbl']		= "tbl_login";
			$set['key']		= "id";
			$set['val']		= $_POST['del'];
		
			database::delete($set);
			msg::$msg = "Data berhasil dihapus ";
			msg::success();
		}catch(PDOException){
			msg::$msg = "Anda tidak dapat menghapus data ini karena data telah terhubung dengan data yang lain ";
			msg::error();
		}
	}
	public function GetKabid()
	{
		$set 			= $this->KabidJoin();
		$set['query']	= "";
		return database::join($set);
	}
	public function AddKabid()
	{
		try{
			$set['set'] = [
				"username" => $_POST['username'],
				"password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
				"id_level" => 2,
				"token" =>  $this->modelUser->generateToken($_POST['username']),
			];
			$set['tbl'] 	= "tbl_login";
			$id_login = database::getNextId($set);
			database::insert($set);

			$set = NULL;
			$set['set'] = [
				"nama" => $_POST['nama'],
				"id_jenis_kelamin" => $_POST['id_jenis_kelamin'],
				
				"id_login" => $id_login,
			];
			$set['tbl'] 	= "tbl_user";
			$id_user = database::getNextId($set);
			database::insert($set);

			$set = NULL;
			$set['set'] = [
				"id_user" => $id_user,
			];
			$set['tbl'] 	= "tbl_kabid";

			database::insert($set);

			msg::$msg = "Data berhasil ditambahkan";
			msg::success();
		}catch(PDOException){
			msg::$msg = "Username yang anda gunakan sudah terdaftar, mohon gunankan username yang lain ";
			msg::error();
		}
		
	}
	public function upKabid()
	{
		$set['tbl']	= "tbl_user" ;
		$set['key']	= "id" ;
		$set['val']	= $_POST['id_user'] ;
		
		$set['set'] = [
			"nama"             => $_POST['nama'],
			"id_jenis_kelamin" => $_POST['id_jenis_kelamin'],
		];
		
		database::update($set);

		msg::$msg = "Data berhasil diperbahrui ";
		msg::success();
	}
	public function DelKabid()
	{
		try {
			$set['tbl']		= "tbl_login";
			$set['key']		= "id";
			$set['val']		= $_POST['del'];
		
			database::delete($set);
			msg::$msg = "Data berhasil dihapus ";
			msg::success();
		}catch(PDOException){
			msg::$msg = "Anda tidak dapat menghapus data ini karena data telah terhubung dengan data yang lain ";
			msg::error();
		}
		
	}
	public function GetKapal()
	{
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_kapal';
		$set['query']	= "";

		return database::select($set);
	}
	public function AddKapal()
	{
		$set['set'] = [
			"nama_kapal" => $_POST['nama_kapal'],
			"perusahaan" => $_POST['perusahaan'],
			"gt"         => $_POST['gt'],
			"pajak"      => $_POST['pajak'],
		];
		$set['tbl'] 	= "tbl_kapal";
		database::insert($set);

		msg::$msg = "Data berhasil ditambahkan";
		msg::success();
	}

	public function UpKapal()
	{
		$set['tbl']	= "tbl_kapal" ;
		$set['key']	= "id" ;
		$set['val']	= $_POST['up'] ;
		
		$set['set'] = [
			"nama_kapal" => $_POST['nama_kapal'],
			"perusahaan" => $_POST['perusahaan'],
			"gt"         => $_POST['gt'],
			"pajak"      => $_POST['pajak'],
		];
		
		database::update($set);

		msg::$msg = "Data berhasil diperbahrui ";
		msg::success();
	}

	public function DelKapal()
	{
		try{
			$set['tbl']		= "tbl_kapal";
			$set['key']		= "id";
			$set['val']		= $_POST['del'];
		
			database::delete($set);
			msg::$msg = "Data berhasil dihapus ";
			msg::success();
		}
		catch(PDOException){
			msg::$msg = "Anda tidak dapat menghapus data ini karena data telah terhubung dengan data yang lain ";
			msg::error();
		}
	}
	public function GetDermaga()
	{
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_dermaga';
		$set['query']	= "";

		return database::select($set);
	}
	public function AddDermaga()
	{
		$set['set'] = [
			"dermaga" => $_POST['dermaga'],
		];
		$set['tbl'] 	= "tbl_dermaga";
		database::insert($set);

		msg::$msg = "Data berhasil ditambahkan";
		msg::success();
	}

	public function UpDermaga()
	{
		$set['tbl']	= "tbl_dermaga" ;
		$set['key']	= "id" ;
		$set['val']	= $_POST['up'] ;
		
		$set['set'] = [
			"dermaga" => $_POST['dermaga'],
		];
		
		database::update($set);

		msg::$msg = "Data berhasil diperbahrui ";
		msg::success();
	}

	public function DelDermaga()
	{
		try{
			$set['tbl']		= "tbl_dermaga";
			$set['key']		= "id";
			$set['val']		= $_POST['del'];
		
			database::delete($set);
			msg::$msg = "Data berhasil dihapus ";
			msg::success();
		}
		catch(PDOException){
			msg::$msg = "Anda tidak dapat menghapus data ini karena data telah terhubung dengan data yang lain ";
			msg::error();
		}
	}
	public function AddJenisTanki()
	{
		$set['set'] = [
			"jenis_tanki" => $_POST['jenis_tanki'],
		];
		$set['tbl'] 	= "tbl_jenis_tanki";
		database::insert($set);

		msg::$msg = "Data berhasil ditambahkan";
		msg::success();
	}
	public function UpJenisTanki()
	{
		$set['tbl']	= "tbl_jenis_tanki" ;
		$set['key']	= "id" ;
		$set['val']	= $_POST['up'] ;
		
		$set['set'] = [
			"jenis_tanki" => $_POST['jenis_tanki'],
		];
		
		database::update($set);

		msg::$msg = "Data berhasil diperbahrui ";
		msg::success();
	}

	public function DelJenisTanki()
	{
		try{
			$set['tbl']		= "tbl_jenis_tanki";
			$set['key']		= "id";
			$set['val']		= $_POST['del'];
		
			database::delete($set);
			msg::$msg = "Data berhasil dihapus ";
			msg::success();
		}
		catch(PDOException){
			msg::$msg = "Anda tidak dapat menghapus data ini karena data telah terhubung dengan data yang lain ";
			msg::error();
		}
	}
	public function GetTangkiKapalById($id=null)
	{
		$set 	= $this->TankiKapalJoin();
		$set['query']	= "WHERE tanki.id_kapal = '{$id}'";

		return database::join($set);
	}

	public function AddTangkiKapal()
	{
		$set['set'] = [
			"id_kapal" => $_POST['id_kapal'],
			"id_jenis_tanki" => $_POST['id_jenis_tanki'],
			"panjang" => $_POST['panjang'],
			"lebar" => $_POST['lebar'],
			"tinggi" => $_POST['tinggi'],
		];
		$set['tbl'] 	= "tbl_tanki";
		database::insert($set);

		msg::$msg = "Data berhasil ditambahkan";
		msg::success();
	}
	public function UpTankiKapal()
	{
		$set['tbl']	= "tbl_tanki" ;
		$set['key']	= "id" ;
		$set['val']	= $_POST['up'] ;
		
		$set['set'] = [
			"id_jenis_tanki" => $_POST['id_jenis_tanki'],
			"panjang" => $_POST['panjang'],
			"lebar" => $_POST['lebar'],
			"tinggi" => $_POST['tinggi'],
		];
		
		database::update($set);

		msg::$msg = "Data berhasil diperbahrui ";
		msg::success();
	}
	public function DelTankiKapal()
	{
		try{
			$set['tbl']		= "tbl_tanki";
			$set['key']		= "id";
			$set['val']		= $_POST['del'];
		
			database::delete($set);
			msg::$msg = "Data berhasil dihapus ";
			msg::success();
		}
		catch(PDOException){
			msg::$msg = "Anda tidak dapat menghapus data ini karena data telah terhubung dengan data yang lain ";
			msg::error();
		}
	}
}