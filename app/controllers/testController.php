<?php

	session_start();
	// $errorMsg='';
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');
	include_once('../models/watch.php');
	include_once('../models/listing.php');

	if(isset($_GET['s']) && isset($_GET['m']) ){
		echo 'BRAND: ' . $_GET['s'] . '<br>';
		echo 'MODEL: ' . $_GET['m'] . '<br>';
	}
	else echo 'vars not set';
?>