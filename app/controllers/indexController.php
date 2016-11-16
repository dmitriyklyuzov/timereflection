<?php

	
	$errorMsg='';
	include_once('../../lib/dependencies.php');
	session_start();
	include_once('../models/watch.php');
	include_once('../models/listing.php');
	include_once('../models/user.php');

	$q = "SELECT *
			FROM listing
			INNER JOIN watch on listing.watch_reference = watch.watch_reference;";

	function getThumbnails($start, $limit){

		$conn = DB();

		$result = $conn -> query("SELECT *
			FROM listing
			INNER JOIN watch on listing.watch_reference = watch.watch_reference
			ORDER BY listing_created DESC
			LIMIT $start, $limit ;");
		
		$conn -> close();

		while($row = $result -> fetch_assoc()){

			$listing_id = $row['listing_id'];

			$brand = $row['watch_brand'];
			$model = $row['watch_model'];
			$ref = $row['watch_reference'];
			$sku = $row['listing_SKU'];
			$retail  = '';
			if($row['listing_retail']!=''){
				$retail = number_format($row['listing_retail']);
			}
			$material = $row['watch_material'];
			$dial = $row['listing_dial'];
			$caseSize = $row['watch_case_size'];
			$condition = $row['listing_condition'];
			$box = ($row['listing_box'] == '1') ? 'YES' : 'NO';
			$papers = ($row['listing_papers'] == '1') ? 'YES' : 'NO';
			$notes = $row['listing_notes'];
			$price = '';
			if($row['listing_price']!=''){
				$price = number_format($row['listing_price']);
			}
			$available = '';
			$text = '';
			
			$new_used = ($row['listing_new_used'] == '1') ? 'Unworn' : 'Pre-owned';
			
			if ($row['listing_available']=='1') {
				$available = 'Available';
				$text = 'text-success';
			}
			else if ($row['listing_available']=='2'){
				$available = 'On hold';
				$text = 'text-warning';
			}
			else {
				$available = 'Sold';
				$text = 'text-danger';
			}

			// Availability
			// 1 - Available
			// 2 - On hold
			// 3 - Sold

			// New / Used
			// 1 - New
			// 2 - Used

			$imgSrc = 'http://placehold.it/300?text=IMAGE+NOT+AVAILABLE';

			if($img = Listing::getMainImage($listing_id)){
				$imgSrc = '/public/img/watches/' . $img;
			}

			include ('../views/parts/thumbnail.part.php');
		}
	}

	if(isset($_GET['start'])){
		// $start = sanitize($_GET['start']);
		$start = $_GET['start'];
		// $limit = $start + 4;

		getThumbnails($start, '12');

		// echo 'start: ' . $start . '</br>';
	}

	else include ('../views/index.view.php');

?>