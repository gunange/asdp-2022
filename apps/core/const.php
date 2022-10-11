<?php
define('BASEURL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'
	? "https"
	: "http")
	. "://$_SERVER[HTTP_HOST]" . dirname($_SERVER['SCRIPT_NAME'])
	. (!str_ends_with(dirname($_SERVER['SCRIPT_NAME']), "/") ? "/" : ""));


/*BASE Files & Assets*/
define('BaseAssets', BASEURL . 'public/assets/');
define('BaseFiles', BASEURL . 'public/files/');


/*HOME BASE*/
define('BaseAdmin', BASEURL . 'DashAdmin/');
define('BaseKabid', BASEURL . 'DashKabid/');
define('BasePetugas', BASEURL . 'DashPetugas/');
define('BaseWellcome', BASEURL . 'Wellcome/');
