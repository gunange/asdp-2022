<?php
session_start(); 

// set zona waktu
// date_default_timezone_set('Asia/Jakarta');
// echo date_default_timezone_get();


require_once 'core/const.php';
spl_autoload_register(function($file){
  $file = 'apps/app/' . $file . ".php" ;
  if (file_exists($file)):
    require_once $file;
  endif;
});
spl_autoload_register(function($file){
  $file = 'apps/traits/' . $file . ".php" ;
  if (file_exists($file)):
    require_once $file;
  endif;
});
spl_autoload_register(function($file){
  $file = 'apps/components/' . $file . ".php" ;
  if (file_exists($file)):
    require_once $file;
  endif;
});
require_once 'core/App.php';
require_once 'core/Controler.php';