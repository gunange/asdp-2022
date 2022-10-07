<?php
define('BASEURL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' 
	? "https" 
	: "http") 
	. "://$_SERVER[HTTP_HOST]" . dirname($_SERVER['SCRIPT_NAME']) 
	. (!str_ends_with(dirname($_SERVER['SCRIPT_NAME']), "/") ? "/" : "" )  );
define('BaseAssets', BASEURL . 'public/assets/');


/*HOME BASE*/
define('BaseAdmin', BASEURL . 'DashAdmin/');
define('BaseWellcome', BASEURL . 'Wellcome/');