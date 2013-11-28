<?php
/*
*
* Veritabanı bağlantısı için
* gerekli bağlantı bilgilerinin
* bulunduğu ayar dosyası.
*
*/

/////////////////////    OPENSHİFT MYSQL İÇİN        //////////////////

//~ header('Content-Type: text/html; Charset=UTF-8');
//~ date_default_timezone_set('Europe/Istanbul');
//~ 
//~ define('MYSQL_HOST',	'mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/');
//~ define('MYSQL_DB',		'Blood');
//~ define('MYSQL_USER',	'admincLvw1Rc');
//~ define('MYSQL_PASS',	'XFCNG16wZwtn');

//~ require_once 'db.php';
//~ 
	//~ $dsn = "mysql:host=mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/;dbname=Blood";
	//~ $dbuser = "admincLvw1Rc";
	//~ $dbpassword = "12345";

/////////////////////////////////////////////////////////////////////////


header('Content-Type: text/html; Charset=UTF-8');
date_default_timezone_set('Europe/Istanbul');

define('MYSQL_HOST',	'localhost');
define('MYSQL_DB',		'Blood');
define('MYSQL_USER',	'root');
define('MYSQL_PASS',	'12345');

	require_once 'db.php';
	
		$dsn = "mysql:host=localhost;dbname=Blood";
		$dbuser = "root";
		$dbpassword = "12345";
?>
