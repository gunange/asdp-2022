<?php

trait MasterData {
	public function sGetJenisKelamin($data=""){
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_jenis_kelamin';
		$set['query']	= $data;

		return database::select($set);
	}
	public function sGetJenisTanki($data=""){
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_jenis_tanki';
		$set['query']	= $data;

		return database::select($set);
	}
	public function sGetKapal($data=""){
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_kapal';
		$set['query']	= $data;

		return database::select($set);
	}
	
}