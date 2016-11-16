<?php 

	include_once('../../lib/dependencies.php');
	session_start();
	include_once('../models/user.php');

	if($_SERVER['REQUEST_URI'] == '/about'){
		include('../views/about.view.php');
		exit();
	}

	if($_SERVER['REQUEST_URI'] == '/contact'){
		include('../views/contact.view.php');
		exit();
	}	


?>