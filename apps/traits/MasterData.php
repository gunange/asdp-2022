<?php

trait MasterData {
	public function sGetJenisKelamin($data=""){
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_jenis_kelamin';
		$set['query']	= $data;

		return database::select($set);
	}
	
}