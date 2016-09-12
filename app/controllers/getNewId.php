<?php
	include_once('../../lib/dependencies.php');
	include_once('../models/watch.php');

	$watch = new Watch();

	$watch -> generateWatchId();

	echo $watch -> getWatchId();
?>