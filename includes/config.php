<?php
ob_start();
session_start();

//database credentials
define('DB_HOST','localhost');
define('DB_USER','username');
define('DB_PASSWD','password');
define('DB_NAME','database name');

$db = Database::getInstance();;



//set timezone
date_default_timezone_set('Europe/London');

//load classes as needed
function __autoload($class) {
   
   $class = strtolower($class);

   //if call from within assets adjust the path
   $classpath = dirname(__FILE__) . '/classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }  
   
   //if call from within admin adjust the path
   $classpath = INAPP . '/classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }
   
   //if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }     
    
}

$user = new User($db); 

include('functions.php');
?>