<?php

trait MasterJoin
{

	public function userJoin()
	{
		$set['set'] 	= '
			lvl.*, 
			jk.*,
			lg.*,
			user.*
		';
		$set['join'] = [

			'induk' =>
			[
				'type'   	=> 'left_join',
				'table' 	=> 'tbl_login',
				'key'   	=> 'lg'
			],

			'join' => [

				[
					'table' => 'tbl_user',
					'key'   => 'user',
					'id'    => 'user.id_login',
					'in'    => 'lg.id'
				],

				[
					'table' => 'tbl_jenis_kelamin',
					'key'   => 'jk',
					'id'    => 'jk.id',
					'in'    => 'user.id_jenis_kelamin'
				],
				[
					'table' => 'tbl_level',
					'key'   => 'lvl',
					'id'    => 'lvl.id',
					'in'    => 'lg.id_level'
				],

			]
		];

		return $set;
	}

	public function PetugasJoin()
	{
		$set['set'] 	= '
			lvl.*, 
			jk.*,
			lg.*,
			user.*,
			petugas.*
		';
		$set['join'] = [

			'induk' =>
			[
				'type'   	=> 'left_join',
				'table' 	=> 'tbl_petugas',
				'key'   	=> 'petugas'
			],

			'join' => [

				[
					'table' => 'tbl_user',
					'key'   => 'user',
					'id'    => 'user.id',
					'in'    => 'petugas.id_user'
				],
				[
					'table' => 'tbl_login',
					'key'   => 'lg',
					'id'    => 'lg.id',
					'in'    => 'user.id_login'
				],

				[
					'table' => 'tbl_jenis_kelamin',
					'key'   => 'jk',
					'id'    => 'jk.id',
					'in'    => 'user.id_jenis_kelamin'
				],
				[
					'table' => 'tbl_level',
					'key'   => 'lvl',
					'id'    => 'lvl.id',
					'in'    => 'lg.id_level'
				],

			]
		];

		return $set;
	}
	public function KabidJoin()
	{
		$set['set'] 	= '
			lvl.*, 
			jk.*,
			lg.*,
			user.*,
			kabid.*
		';
		$set['join'] = [

			'induk' =>
			[
				'type'   	=> 'left_join',
				'table' 	=> 'tbl_kabid',
				'key'   	=> 'kabid'
			],

			'join' => [

				[
					'table' => 'tbl_user',
					'key'   => 'user',
					'id'    => 'user.id',
					'in'    => 'kabid.id_user'
				],
				[
					'table' => 'tbl_login',
					'key'   => 'lg',
					'id'    => 'lg.id',
					'in'    => 'user.id_login'
				],

				[
					'table' => 'tbl_jenis_kelamin',
					'key'   => 'jk',
					'id'    => 'jk.id',
					'in'    => 'user.id_jenis_kelamin'
				],
				[
					'table' => 'tbl_level',
					'key'   => 'lvl',
					'id'    => 'lvl.id',
					'in'    => 'lg.id_level'
				],

			]
		];

		return $set;
	}

	public function TankiKapalJoin()
	{
		$set['set'] 	= '
			jns_tanki.*, 
			kapal.*, 
			tanki.*
		';
		$set['join'] = [

			'induk' =>
			[
				'type'   	=> 'left_join',
				'table' 	=> 'tbl_tanki',
				'key'   	=> 'tanki'
			],

			'join' => [

				[
					'table' => 'tbl_kapal',
					'key'   => 'kapal',
					'id'    => 'kapal.id',
					'in'    => 'tanki.id_kapal'
				],
				[
					'table' => 'tbl_jenis_tanki',
					'key'   => 'jns_tanki',
					'id'    => 'jns_tanki.id',
					'in'    => 'tanki.id_jenis_tanki'
				],

			]
		];

		return $set;
	}
	public function AirTawarJoin()
	{
		$set['set'] 	= '
			tat.id id,
			waktu,
			IF(DAYNAME(tgl) = "Monday", "Senin", IF(DAYNAME(tgl) = "Tuesday", "Selasa", IF(DAYNAME(tgl) = "Wednesday", "Rabu", IF(DAYNAME(tgl) = "Thursday", "Kamis", IF(DAYNAME(tgl) = "Friday", "Jumat", IF(DAYNAME(tgl) = "Saturday", "Sabtu", IF(DAYNAME(tgl) = "Sunday", "Minggu", "Nothing"))))))) hari,
			tgl,
			shift,
			nama_kapal,
			dermaga,
			debit_air,
			FORMAT(total_air_tawar, 0) total_air_tawar,
			status,
			tu.nama nama_admin,
			tu.regu regu,
			shift
		';
		$set['join'] = [

			'induk' =>
			[
				'type'   	=> 'left_join',
				'table' 	=> 'tbl_air_tawar',
				'key'   	=> 'tat'
			], 'join' => [

				[
					'table' => 'tbl_kapal',
					'key'   => 'tk',
					'id'    => 'tk.id',
					'in'    => 'tat.id_kapal'
				],
				[
					'table' => 'tbl_dermaga ',
					'key'   => 'td',
					'id'    => 'td.id',
					'in'    => 'tat.id_dermaga'
				],
				[
					'table' => 'tbl_user ',
					'key'   => 'tu',
					'id'    => 'tu.id',
					'in'    => 'tat.id_user'
				],

			]
		];

		return $set;
	}


	public function DataSandarJoin()
	{
		$set['set'] 	= '
			user.*,
			ts.id id,
			tgl,
			shift,
			nama_kapal,
			dermaga,
			waktu_awal,
			waktu_akhir,
			(waktu_akhir - waktu_awal) lama_sandar,
			total_sandar,
			akumulasi_menit,
			status,
			total_call

		';
		$set['join'] = [

			'induk' =>
			[
				'type'   	=> 'left_join',
				'table' 	=> 'tbl_sandar',
				'key'   	=> 'ts'
			], 'join' => [

				[
					'table' => 'tbl_kapal',
					'key'   => 'tk',
					'id'    => 'tk.id',
					'in'    => 'ts.id_kapal'
				],
				[
					'table' => 'tbl_dermaga ',
					'key'   => 'td',
					'id'    => 'td.id',
					'in'    => 'ts.id_dermaga'
				],
				[
					'table' => 'tbl_user ',
					'key'   => 'user',
					'id'    => 'user.id',
					'in'    => 'ts.id_user'
				],

			]
		];

		return $set;
	}
	public function StoryTankiJoin()
	{
		$set['set'] 	= '
			tjt.*,
			tt.*,
			tk.*,
			tht.*
		';
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

		return $set;
	}


	public function HistoryDayTank()
	{
		$set['set'] 	= '
			MONTH(tgl) AS bulan, 
			YEAR(tgl) AS tahun, 
			DAY(tgl) tanggal,
			waktu, 
			tgl, 
			tht.liter AS liter, 
			tinggi_bbm, 
			tinggi_maksimum, 
			tjt.id AS id_jenis_tanki, 
			jenis_tanki, 
			nama_kapal,
			nama,
			id_kapal
		';
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
					'table' => 'tbl_jenis_tanki',
					'key'   => 'tjt',
					'id'    => 'tjt.id',
					'in'    => 'tt.id_jenis_tanki'
				],
				[
					'table' => 'tbl_kapal ',
					'key'   => 'tk',
					'id'    => 'tk.id',
					'in'    => 'tt.id_kapal'
				],
				[
					'table' => 'tbl_user ',
					'key'   => 'user',
					'id'    => 'user.id',
					'in'    => 'tht.id_user'
				],

			]
		];

		return $set;
	}
	public function JoinStoryTangki($id)
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
                  JOIN tbl_kapal ON tbl_tanki.id_kapal = tbl_kapal.id
            WHERE
                id_jenis_tanki=tt.id_jenis_tanki AND tbl_kapal.id= '{$id}'
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
                  JOIN tbl_kapal ON tbl_tanki.id_kapal = tbl_kapal.id
            WHERE
                id_jenis_tanki=tt.id_jenis_tanki AND tbl_kapal.id= '{$id}'
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

		return $set;
	}


	public function SandarJoin()
	{
		$set['set'] 	= '
			ts.id id,
			waktu_awal,
			waktu_akhir,
			IF(DAYNAME(tgl) = "Monday", "Senin", IF(DAYNAME(tgl) = "Tuesday", "Selasa", IF(DAYNAME(tgl) = "Wednesday", "Rabu", IF(DAYNAME(tgl) = "Thursday", "Kamis", IF(DAYNAME(tgl) = "Friday", "Jumat", IF(DAYNAME(tgl) = "Saturday", "Sabtu", IF(DAYNAME(tgl) = "Sunday", "Minggu", "Nothing"))))))) hari,
			tgl,
			shift,
			nama_kapal,
			dermaga,
			akumulasi_menit,
			FORMAT(total_sandar, 0) total_sandar,
			status,
			total_call,
			FORMAT((total_sandar * 2 / 100),0) pph,
			FORMAT(total_sandar - (total_sandar * 2 / 100),0) dpp,
			tu.nama nama_admin,
			tu.regu regu,
			shift
		';
		$set['join'] = [

			'induk' =>
			[
				'type'   	=> 'left_join',
				'table' 	=> 'tbl_sandar',
				'key'   	=> 'ts'
			], 'join' => [

				[
					'table' => 'tbl_kapal',
					'key'   => 'tk',
					'id'    => 'tk.id',
					'in'    => 'ts.id_kapal'
				],
				[
					'table' => 'tbl_dermaga ',
					'key'   => 'td',
					'id'    => 'td.id',
					'in'    => 'ts.id_dermaga'
				],
				[
					'table' => 'tbl_user ',
					'key'   => 'tu',
					'id'    => 'tu.id',
					'in'    => 'ts.id_user'
				],

			]
		];

		return $set;
	}

	public function DokumenJoinBy()
	{
		$set['set'] 	= '
			tu.*,
			tk.*,
			tjd.*,
			td.*
		';
		$set['join'] = [

			'induk' =>
			[
				'type'   	=> 'left_join',
				'table' 	=> 'tbl_jenis_dokumen',
				'key'   	=> 'tjd'
			], 'join' => [

				[
					'table' => 'tbl_dokumen',
					'key'   => 'td',
					'id'    => 'td.id_jenis_dokumen',
					'in'    => 'tjd.id'
				],
				[
					'table' => 'tbl_kapal ',
					'key'   => 'tk',
					'id'    => 'tk.id',
					'in'    => 'td.id_kapal'
				],
				[
					'table' => 'tbl_user ',
					'key'   => 'tu',
					'id'    => 'tu.id',
					'in'    => 'td.id_user'
				],

			]
		];

		return $set;
	}
	public function DokumenJoinNotif()
	{
		$set['set'] 	= '
			tu.*,
			tk.*,
			tjd.*,
			td.*
		';
		$set['join'] = [

			'induk' =>
			[
				'type'   	=> 'join',
				'table' 	=> 'tbl_jenis_dokumen',
				'key'   	=> 'tjd'
			], 'join' => [

				[
					'table' => 'tbl_dokumen',
					'key'   => 'td',
					'id'    => 'td.id_jenis_dokumen',
					'in'    => 'tjd.id'
				],
				[
					'table' => 'tbl_kapal ',
					'key'   => 'tk',
					'id'    => 'tk.id',
					'in'    => 'td.id_kapal'
				],
				[
					'table' => 'tbl_user ',
					'key'   => 'tu',
					'id'    => 'tu.id',
					'in'    => 'td.id_user'
				],

			]
		];

		return $set;
	}



	public function KapalJoinTanki()
	{
		$set['set'] 	= '
			tt.id_kapal, 
			nama_kapal, 
			tt.id_jenis_tanki id_jenis_tanki, 
			tjt.jenis_tanki
		';
		$set['join'] = [

			'induk' =>
			[
				'type'   	=> 'left_join',
				'table' 	=> 'tbl_kapal ',
				'key'   	=> 'tk'
			], 'join' => [

				[
					'table' => 'tbl_tanki ',
					'key'   => 'tt',
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

		return $set;
	}
}
