<?php

/*
* database
* type 		: static method
* Athor 	: gunange
* version 	: v2.1
*/

class database
{
	private static
		$host = "localhost",
		$user = "root",
		$pass = "",
		$db = "project_2022_asdp_ternate_1_1";

	private static function con()
	{
		$host 	= self::$host;
		$db 	= self::$db;
		try {
			$con = new PDO("mysql:host=$host;dbname=$db", self::$user, self::$pass);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $con;
		} catch (PDOException $e) {
			exit("Koneksi ke database gagal | error msg: " . $e->getMessage());
		}
	}

	public static function __host($host)
	{
		self::$host = $host;
	}
	public static function __user($user)
	{
		self::$user = $user;
	}
	public static function __pass($pass)
	{
		self::$pass = $pass;
	}
	public static function __db($db)
	{
		self::$db = $db;
	}

	public static function filter_str($data)
	{
		$data 	= str_replace(array('\'', '"', ',', ';', '<', '+', '--', '>'), '', $data);
		$filter = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
		return $filter;
	}

	private static function filter_val_dbug($data)
	{

		if (gettype($data) == 'NULL' || $data == '' || $data == "") :
			$data = "null";
		elseif (is_numeric($data)) :
			$data = $data;
		else :
			$data = "'" . str_replace("'", "\'", self::filter_str($data)) . "'";
		endif;

		return $data;
	}

	private static function sqlArray($set)
	{
		$x = [];
		$y = [];
		$z = [];
		$w = [];
		foreach ($set as $k => $v) :
			$x[] = self::filter_str($v);
			$y[] = "?";
		endforeach;
		foreach ($set as $k => $v) :
			$z[] = $k . "=?";
			$w[] = $k . "='" . $v . "'";
		endforeach;

		$key 	= implode(',', array_keys($set));
		$val 	= implode(',', $x);

		$valPDO 	= implode(',', $y);

		$data['pdo'] = [
			'key' => $key,
			'val' => $valPDO,
			'exc' => $x,
			'set' => implode(',', array_values($z)),
		];
		$data['psd'] = [
			'key' => $key,
			'val' => $val,
			'set' => implode(',', array_values($w)),
		];

		return $data;
	}

	public static function getField($set)
	{
		if (is_array($set) && isset($set['tbl'])) :
			$b = (isset($set['type']) ? $set['type'] : 'def');

			$sql = self::con()->prepare("DESCRIBE {$set['tbl']}");
			$sql->execute();

			$show = "";

			if ($sql->rowCount() > 0) :
				$data = $sql->fetchAll(PDO::FETCH_COLUMN);

				$length = count($data);

				foreach ($data as $k => $d) :
					$koma = ($k == $length - 1 ? "  " : ",");
					if ($b == 'def') :
						$show .= "'" . $d . "' => _POST[\"data_set\"]" . $koma . "  <br>";

					elseif ($b == 'row') :
						$show .= $d . $koma . " <br>";
					else :
						$show .= $d . $koma . " ";
					endif;
				endforeach;
			endif;
		else :
			$show = 'not set';
		endif;

		print_r($show);
	}

	public static function getNextId($set = [])
	{
		/*
			HOW TO USE
			----------------------------------
			$set['tbl'] = "nama_table";
			$id_user  	= database::getNextId($set);
		*/
		$db 	= self::$db;
		if (isset($set['tbl'])) :
			$sql = self::con()->prepare(
				"
				SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES 
					WHERE TABLE_SCHEMA = '{$db}' 
					AND TABLE_NAME = '{$set['tbl']}'"
			);
			$sql->execute();
			$data = $sql->fetch(PDO::FETCH_ASSOC)['AUTO_INCREMENT'];
		else :
			$data = "table_no_set";
		endif;
		return $data;
	}

	public static function insert($set, $action = true)
	{
		/*
			HOW TO USE
			----------------------------------
			$set['set'] = [
				"key_tb_field" => $_POST['key_tb_field'],
			];
			$set['tbl'] 	= "tbl_database";
			database::insert($set);
		*/
		$data = self::sqlArray($set['set']);
		$pdo = $data['pdo'];
		$psd = $data['psd'];

		if ($action) :
			$query = self::con()->prepare(
				"
				INSERT INTO {$set['tbl']} 
				({$pdo['key']}) 
					VALUES ({$pdo['val']})"
			);

			$query->execute($pdo['exc']);

			$cekQuery = $query->rowCount();

			if ($cekQuery > 0) :
				$data = 'sukses';
			elseif ($cekQuery == 0) :
				$data = 'no_action';
			elseif ($cekQuery < 0) :
				$data = 'gagal';
			endif;

		else :
			$psd_val = explode(",", $psd['val']);
			foreach ($psd_val as $k => $d) :
				$psd_val[$k] = self::filter_val_dbug($d);
			endforeach;
			$psd_val = implode(",", $psd_val);

			$data = "INSERT INTO {$set['tbl']} ({$psd['key']}) VALUES ({$psd_val})";
		endif;
		return $data;
	}
	public static function select($set, $action = true)
	{
		/*
			HOW TO USE
			----------------------------------
			$set['set'] 	= 'nama_field1, nama_field2';
			$set['tbl'] 	= 'nama_table';
			$set['query']	= "";
			$set['loop']	= 'no_loop'; // Gunakan ini jika hanya tampilkan 1 data

			return database::select($set);

		*/
		if ($action) :
			$query = (isset($set['query']) ? ($set['query']) : '');
			$sql = self::con()->prepare("SELECT {$set['set']} FROM {$set['tbl']}  {$query} ");
			$sql->execute();
			$data = (isset($set['loop']) &&
				$set['loop'] == "no_loop"
				?
				$sql->fetch(PDO::FETCH_ASSOC)
				:
				$sql->fetchAll(PDO::FETCH_ASSOC));

		else :
			$data = "SELECT {$set['set']} FROM {$set['tbl']}  {$set['query']}";
		endif;

		return $data;
	}
	public static function update($set, $action = true)
	{
		/*
			HOW TO USE
			----------------------------------
			$set['tbl']	= "nama_table" ;
			$set['key']	= "id" ;
			$set['val']	= $_POST['update'] ;
			
			$set['set'] = [
				"name_post" 		=> $_POST['name_post'],
			];
			
			database::update($set);
		*/

		$sqlArray	= self::sqlArray($set['set']);
		$pdo 		= $sqlArray['pdo'];
		$psd 		= $sqlArray['psd'];

		$msg = "";
		if ($action) :
			$sql = self::con()->prepare("UPDATE {$set['tbl']} SET {$pdo['set']} WHERE {$set['key']} = {$set['val']}");
			$sql->execute($pdo['exc']);
			$cekQuery = $sql->rowCount();

			if ($cekQuery > 0) :
				$msg = 'sukses';
			elseif ($cekQuery == 0) :
				$msg = 'no_action';
			elseif ($cekQuery < 0) :
				$msg = 'gagal';
			endif;
		else :
			$msg = "";
			$msg .= "UPDATE {$set['tbl']} SET {$psd['set']} WHERE {$set['key']} = {$set['val']}";
		endif;

		return $msg;
	}
	public static function delete($set, $action = true)
	{
		/*
			HOW TO USE
			----------------------------------
			$set['tbl']		= "nama_table";
			$set['key']		= "id_table";
			$set['val']		= $_POST['id'];
		
			database::delete($set);

			----------------------------------
			$set['tbl']		= "nama_table";
		
			$set['query']	= "id in ({$data}) " ; // Jika tidak ingin menggunakan query maka ini tidak bolseh d set, jangan gunakan WHERE
			database::delete($set);
		*/

		$msg = "";
		$query = (isset($set['query']) ? $set['query'] : " {$set['key']} = {$set['val']} ");
		if ($action) :
			$sql = self::con()->prepare("DELETE FROM {$set['tbl']} WHERE {$query} ");
			$sql->execute();
			$cekQuery = $sql->rowCount();

			if ($cekQuery > 0) :
				$msg = 'sukses';
			elseif ($cekQuery == 0) :
				$msg = 'no_action';
			elseif ($cekQuery < 0) :
				$msg = 'gagal';
			endif;
		else :
			$msg = "DELETE FROM {$set['tbl']} WHERE {$query} ";
		endif;

		return $msg;
	}

	public static function join($set, $action = true)
	{
		/*
			HOW TO USE
			----------------------------------
			$set['set'] 	= 'fileld1, fileld1, dst..';
			$set['join'] = [

				'induk' =>
				[
				  'type'   	=> 'left_join',
				  'table' 	=> 'tbl_user',
				  'key'   	=> 'a'
				],

			'join' => [

					[
					'table' => 'table1',
					'key'   => 'b',
					'id'    => 'b.id_table_b',
					'in'    => 'a.id_table_a'
					],
					[
					'table' => 'table2',
					'key'   => 'c',
					'id'    => 'c.id_table_c',
					'in'    => 'b.id_table_b'
					],
				
				]
			];

			$set['query']	= "WHERE"; //Gunakan jika ada kondisi
			$set['loop'] 	= 'no_loop' ;  // Gunakan ini jika hanya tampilkan 1 data

			return database::join($set, false); //Output
		*/

		$get 	= $set['set'];
		$join	= $set['join'];
		$query	= $set['query'];

		if (isset($join['induk']['type']) && $join['induk']['type'] == "left_join") :
			$type = " LEFT ";
		else :
			$type = " ";
		endif;

		if ($action) :

			$data = "SELECT {$get} ";
			$data .= "FROM {$join['induk']['table']} {$join['induk']['key']} ";
			foreach ($join['join'] as $d) :
				$data .= "{$type} JOIN {$d['table']} {$d['key']} ON {$d['id']} = {$d['in']} ";
			endforeach;
			$data .= $query;
			$sql = self::con()->prepare("$data");
			$sql->execute();

			$dataBase = (isset($set['loop']) &&
				$set['loop'] == "no_loop"
				?
				$sql->fetch(PDO::FETCH_ASSOC)
				:
				$sql->fetchAll(PDO::FETCH_ASSOC));

		else :
			$data = "SELECT {$get} ";
			$data .= "FROM {$join['induk']['table']} {$join['induk']['key']} ";
			foreach ($join['join'] as $d) :
				$data .= "{$type} JOIN {$d['table']} {$d['key']} ON {$d['id']} = {$d['in']} ";
			endforeach;
			$data .= $query;

			$dataBase = $data;

		endif;


		return $dataBase;
	}
}
