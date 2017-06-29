<?php
ini_set('display_errors', TRUE);
//define('USER', 'landingjaveriana');
define('USER', 'dbo688623030');
//define('PASS', 'L@nding123');
define('PASS', '20BrandMedia17@');
//define('HOST', 'landingjaveriana.db.10223098.hostedresource.com');
define('HOST', 'db688623030.db.1and1.com');
define('DBNAME', 'db688623030');
define('APPLICATION_PATH', realpath(dirname(__FILE__)));
define('SENDER_MAIL', 'javeriana@interactivemedia.com.co');
define('SENDER_PASS', '');
define('SENDER_HOST', 'localhost');
define('SENDER_PORT', 25);
//define('SENDER_PORT', 465 );
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/library/'),
    get_include_path(),
)));
include 'doctrine.php';
require ('PHPMailer/PHPMailerAutoload.php');
//require 'Mail/PHPMailerAutoload.php';
$directorio = opendir(APPLICATION_PATH.'/library/Custom/Models/entities');
while ($archivo = readdir($directorio)) {
	if (! is_dir($archivo)) {
		include_once APPLICATION_PATH.'/library/Custom/Models/entities' . '/' . $archivo;
	}
}
$directorio = opendir(APPLICATION_PATH.'/library/Custom/Models/proxies');
while ($archivo = readdir($directorio)) {
	if (! is_dir($archivo)) {
		include_once APPLICATION_PATH.'/library/Custom/Models/proxies' . '/' . $archivo;
	}
}
include APPLICATION_PATH.'/controller/LandingController.php';
