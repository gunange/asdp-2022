<?php
/**
 *  tools
 */
class tools
{
	public static function console( $data ){
		if (is_array($data) ):
			$data = json_encode(var_export($data, true));
			echo '<script>console.log('.$data.');</script>';
		elseif(is_object($data)):
			$data = var_export($data, true);
			echo "<script>console.log(`". $data ."`);</script>";
		else:
			$data = trim(preg_replace('/\s\s+/', ' ', $data));
			echo '<script>';
			echo 'console.log(`'. $data .'`)';
			echo '</script>';
		endif;
	}

	public static function SetTime($set)
	{
		echo "<script>setTimeout(function() {
                {$set['func']}
            }, {$set['time']});</script>";
	}
	public static function redirect($set)
	{
		echo "<script type='text/javascript'>
				window.location='" . $set . "'
			</script>";
	}
	public static function redirectNewTab($set)
	{
		echo "<script>
			  window.open('".$set."', '_blank');
			</script>";
	}

	public static function in_sql($data)
	{
		/*
			USE in_sql
			-------------------------
			$set['arr'] = array();
			$set['key'] = 'id_stock';
			$set['out'] = 'array';
			$in 		= tools::in_sql($set);
		*/
		if (count($data['arr']) > 0 ):
			foreach ($data['arr'] as $k => $d ):
				$ret[] = $d[$data['key']] ;
			endforeach;
			if ( isset($data['out']) && @$data['out'] == "array" ) :
				$ret =  $ret;
			else:
				$ret = implode(', ', $ret) ;
			endif;
		else:
			if (isset($data['out']) && $data['out'] == "array" ) :
				$ret = [] ;
			else:
				$ret = "''" ;
			endif;
		endif;
		return $ret ;
	}
	public static function clear_all_sessions()
	{
		$_SESSION = [];
	    session_unset();
	    session_destroy();
	}
	public static function get_number_romawi($set="")
	{
		if ($set == 6):
			$r = "VI";
		elseif ($set == 5):
			$r = "V";
		elseif ($set == 4):
			$r = "IV";
		elseif ($set == 3):
			$r = "III";
		elseif ($set == 2):
			$r = "II";
		else:
			$r = "I";
		endif;
		return $r;
	}
	public static function rupiah($angka){
	
		return number_format($angka,0);
	}

	public static function set_cookie_per_tahun($set=[])
	{
		if (isset($set['key']) && isset($set['val'])):
			$tahun = (isset($set['thn'])? $set['thn'] : 2);
			setcookie(
			  $set['key'],
			  $set['val'],
			  time() + ($tahun * 365 * 24 * 60 * 60)
			);
		endif;
	}
	public static function rm_string_space($data)
	{
		$data = explode(" ", $data);
		return implode("", $data);
	}

	public static function indoTime($data)
	{
		$ex = date_format(date_create($data),"d-n-Y");
		$ex = explode('-', $ex);

		$bulan = [
			1 =>
			'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		];
		return $ex[0] ." " . $bulan[$ex[1]] . " " . $ex[2];

	}
	public static function umur($data)
	{
		$tanggal_lahir 	= new DateTime(date_format(date_create($data),"Y-m-d"));
		$hari_ini 		= new DateTime("today");
		$umur 			= $hari_ini->diff($tanggal_lahir) ;
		
		return $umur->y;

	}
	public static function is_no_empty_post(){
		$v = "";
		return !in_array($v, array_values($_POST));
	}
	public static function showFile($data, $height="550px"){
		$image 		= ['jpg', 'png', 'jpeg', 'gif', 'svg'];
		$extension = explode(".", $data);
		$extension = strtolower(end($extension));

		if (in_array($extension, $image) ):
			$exp = "<img src=\"{$data}\" class=\"img-thumbnail\" width=\"100%\"  height=\"auto\">" ;
		else:
			$exp = "<iframe src=\"{$data}\" width=\"100%\" height=\"{$height}\" frameborder=\"0\"></iframe>" ;
		endif;
		return $exp;
	}
	public static function remove_char($char=[], $data="", $replace=''){
		return str_replace( $char, $replace, $data);
	}
}