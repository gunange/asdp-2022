<?php

trait MasterData
{
	public function sGetJenisKelamin($data = "")
	{
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_jenis_kelamin';
		$set['query']	= $data;

		return database::select($set);
	}
	public function sGetJenisTanki($data = "")
	{
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_jenis_tanki';
		$set['query']	= $data;

		return database::select($set);
	}
	public function sGetKapal($data = "")
	{
		$set['set'] 	= '*';
		$set['tbl'] 	= 'tbl_kapal';
		$set['query']	= $data;

		return database::select($set);
	}
	public function GetPendapatanAir()
	{
		$set['set'] 	= 'IF( SUM(total_air_tawar) IS NULL,  "0", SUM(total_air_tawar)) AS pendapatan_air_tawar';
		$set['tbl'] 	= 'tbl_air_tawar';
		$set['query']	= "WHERE status='Lunas' AND MONTH(tgl)=MONTH(SYSDATE())";
		$set['loop'] 	= "no_loop";

		return database::select($set);
	}

	public function GetPendatapanSandar()
	{
		$set['set'] 	= 'IF( SUM(total_sandar) IS NULL,  "0", SUM(total_sandar)) AS pendapatan_sandar ';
		$set['tbl'] 	= 'tbl_sandar';
		$set['query']	= "WHERE status='Lunas' AND MONTH(tgl)=MONTH(SYSDATE())";
		$set['loop'] 	= "no_loop";

		return database::select($set);
	}

	public function GetDelayedSandar()
	{
		$set['set'] 	= 'COUNT(*) AS delay';
		$set['tbl'] 	= 'tbl_sandar';
		$set['query']	= "WHERE status!='Lunas'";
		$set['loop'] 	= "no_loop";

		return database::select($set);
	}

	public function GetDelayedAirTawar()
	{
		$set['set'] 	= 'COUNT(*) AS delay';
		$set['tbl'] 	= 'tbl_air_tawar';
		$set['query']	= "WHERE status!='Lunas'";
		$set['loop'] 	= "no_loop";

		return database::select($set);
	}
}
