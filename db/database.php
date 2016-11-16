<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'root');
define('DB', 'main');

function DB(){
	$db = mysqli_connect(HOST, USER, PASS, DB);
	return $db;
}

function DB2(){
	$db = mysqli_connect(HOST, 'reg_user', PASS, DB);
	return $db;
}

?>