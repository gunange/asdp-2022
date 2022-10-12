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
			tgl,
			shift,
			nama_kapal,
			dermaga,
			debit_air,
			FORMAT(total_air_tawar, 0) total_air_tawar,
			status
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

			]
		];

		return $set;
	}


	public function DataSandarJoin()
	{
		$set['set'] 	= '
			ts.id id,
			tgl,
			shift,
			nama_kapal,
			dermaga,
			waktu_awal,
			(waktu_akhir - waktu_awal) lama_sandar,
			total_sandar,
			status
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
}
