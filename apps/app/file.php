<?php
/*
Upload File
----------------------------------------------
USE class file

file::$post_file  	= $_FILES['img'];			//Post files (Harus diset)
file::$lokasi  		= 'files/menu_kantin';		//Lokasi root penyimpanan (Harus diset)
file::$dir  		= 'example';				//Direktori yang akan dibuat untuk menyimpan file didalamnya (default 'example')
file::$limit  		= 2;						//Batas ukuran file (default 2MB)
file::$allow  		= ['jpg', 'jpeg', 'png'];	//File yang diijinkan (default jpg, jpeg, png)
file::$old_file 	= '';						//(harus diset) jika digunakan untuk update file, data yang diisi adalah file dari database atau nama file lama
file::$nama 		= 'unknow';					//nama file sesuai keinginan anda (default unknow)
file::$nama_uniq 	= true; 					//jika false maka nama file tidak akan ditambahkan dengan karakter uniq dan date (default true)
file::Upload();
echo file::$file;								//nama file yang akan anda simpan
echo file::$err;								//jika terdapat erorr, maka pesan akan disampaikan melalui property ini




Delete File
----------------------------------------------
USE class file
file::$lokasi  		= 'public/files/upload';	
file::$dir  		= 'nama_dir';
file::$old_file 	= $_POST['old_file'];

file::Delete();

*/
class file {

	public static 
			$post_file,
			$old_file,
			$limit = 2,
			$lokasi, 
			$err, 
			$file,
			$dir 	= "example", 
			$nama 	= "unknow", 
			$nama_uniq 	= true, 
			$add 		= true, 
			$allow 	= ['jpg', 'jpeg', 'png'] 
		;
	private static $Out = false;

	public static function Upload()
	{
		/*konfigurasi*/
		if (!str_ends_with(self::$lokasi, "/")):
			self::$lokasi .= "/";
		endif;
		if(!isset(self::$post_file['name']) && !isset(self::$post_file['size']) && !isset(self::$post_file['error']) && !isset(self::$post_file['tmp_name']) ):
			self::$err = "Anda tidak set type FILES, lakukan set pada property file";
		elseif(!is_dir(self::$lokasi)):
			self::$err = "lokasi penyimpanan root file tidak diset atau tidak ditemukan, lakukan set pada property lokasi";
		else:
			/*lolos konfigurasi*/

			$limit 	= self::$limit . "000000";
			$dir 	= self::$lokasi . self::$dir . "/";

			$nama   = self::$post_file['name'];
			$size   = self::$post_file['size'];
			$error  = self::$post_file['error'];
			$tmp    = self::$post_file['tmp_name'];

			if ($error == 4) :
				self::$file = self::$old_file;
				self::$Out 	= true;
			else:
				$extension = explode(".", $nama);
				$extension = strtolower(end($extension));

				if (!in_array($extension, self::$allow)) :
					self::$err 	= "file tidak sesuai dengan format [" . implode(", ", self::$allow) . "]";
				elseif ($size > $limit) :
					self::$err 	= "ukuran file leih besar dari ".self::$limit."MB" ;
				else:
					/*lolos seleksi*/
					if (!is_dir($dir)) :
						mkdir($dir, 0755, true);
					endif;
					if (strpos(self::$nama, " ") == true) :
						$nama_file = explode(" ", self::$nama);
						$nama_file = implode("_", $nama_file);
					else :
						$nama_file = self::$nama;
					endif;

					self::$file = $nama_file . 
									"_" . 
									date("d_m_Y") . 
									"_" . 
									date("h-i-a") . 
									"-" . 
									uniqid() . 
									"." . 
									$extension;

					if (!self::$nama_uniq):
						self::$file = $nama_file . "." .$extension ;
					endif;

					self::$Out 	= true;
					$tmp_file 	= $dir . self::$file ;
					$old_file 	= $dir . self::$old_file;

					if (move_uploaded_file($tmp, $tmp_file)) :
						@unlink($old_file);
					endif;

				endif;

			endif;
		endif;

		return self::$Out ;
	}

	public static function Delete()
	{
		if (!str_ends_with(self::$lokasi, "/")):
			self::$lokasi .= "/";
		endif;
		$dir 		= self::$lokasi . self::$dir . "/";
		$old_file 	= $dir . self::$old_file;
		
		$files = glob($old_file);
		foreach($files as $file){
		  if(is_file($file)) {
		    @unlink($file);
		  }
		}

	}

}