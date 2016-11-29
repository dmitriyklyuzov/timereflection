<?php

	include_once('../../lib/dependencies.php');
	session_start();
	include_once('../models/user.php');
	include_once('../models/watch.php');
	include_once('../models/listing.php');

	// 1 - new
	// 2 - used

	$count = Listing::getListingCount('Rolex', '0');

	echo $count;

	
?>