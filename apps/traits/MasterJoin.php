<?php

trait MasterJoin {

	public function userJoin(){
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

		return $set ;
	}
	
	
}