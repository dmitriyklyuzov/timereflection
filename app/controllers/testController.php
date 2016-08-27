<?php

	session_start();
	// $errorMsg='';
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');
	include_once('../models/watch.php');
	include_once('../models/listing.php');

	$user = new User();

	$watch = new Watch();

	// REDIRECT TO LOGIN IF NOT LOGGED IN
	if(!User::isLoggedIn()){
		$errorMsg = 'Please log in first.';
		include ('../views/login.view.php');
		exit();
	}

	if(isset($_GET['action']) && isset($_GET['id'])){
		// echo 'ID: ' . $_GET['id'];
		$id = sanitize($_GET['id']);
		// echoBr();

		if(Listing::exists($id)){
			// echo "listing exists.<br>";
			Listing::deleteImages($id);
			Listing::delete($id);
			// echo 'Delete performed.<br>';
			if(Listing::exists($id)){
				echo 'Listing still exists :(<br>';
			}
			else{
				// echo 'Listing deleted!<br>';
				header('Location: http://localhost:8888/timereflection/');
			}
		}
		else echo "listing you're trying to delete does not exist.<br>";
	}
	
?>