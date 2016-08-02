<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'root');
define('DB', 'main');

function DB()
{
	$db = mysqli_connect(HOST, USER, PASS, DB);
	return $db;
}

?>