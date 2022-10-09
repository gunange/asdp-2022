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
		$set['tbl']		= "tbl_login";
		$set['key']		= "id";
		$set['val']		= $_POST['del'];
	
		database::delete($set);
		msg::$msg = "Data berhasil dihapus ";
		msg::success();
	}


}