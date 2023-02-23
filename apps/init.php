<?php
session_start(); 

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