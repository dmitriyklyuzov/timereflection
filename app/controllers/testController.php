<?php
	
	session_start();

	// $_SESSION['debug']=true;
	// $_SESSION['debug']=false;

	include_once '../../lib/dependencies.php';
	include_once('../models/watch.php');
	// include_once('../models/listing.php');

	$watch = new Watch();

	$watch -> generateWatchId();

	echo 'Generated id<br>';

	$watch -> setWatchBrand('Test Brand');
	$watch -> setWatchModel('Test Model');
	$watch -> setWatchMaterial('Titanium');
	$watch -> setWatchRetail('100500');
	$watch -> setWatchReference('1231234');

	echo 'Set everything<br>';

	$email = 'Email';

	$watch -> createWatch($email);

	echo 'Created watch<br>';

	if($watch -> findWatch($watch -> getWatchReference())){
		echo 'Found watch<br>';
	}
	else echo 'Not found watch<br>';

	// include ('../views/addlistingresult.view.php');

?>