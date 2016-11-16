<?php

	include_once('../../lib/dependencies.php');

	$conn = DB();
	// $result = $conn -> query("DELETE FROM listing_img;");
	$conn -> close();

	echo 'Deleted';

?>