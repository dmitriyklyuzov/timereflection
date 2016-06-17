<?php

	include_once 'setting.php';
	include_once 'view/parts/head.part.php';
	include_once 'view/parts/navbar.part.php';

	function getThumbnails(){

		$conn = mysqli_connect(HOST, USER, PASS, DB);

		$resultSet = $conn -> query("SELECT *
							FROM listing
							INNER JOIN watch on listing.watch_id = watch.watch_id;");
		
		mysqli_close($conn);

		while($rows = $resultSet -> fetch_assoc()){

			$brand = $rows['watch_brand'];
			$model = $rows['watch_model'];
			$ref = $rows['listing_reference_number'];
			$retail  = $rows['watch_retail'];
			$material = $rows['watch_material'];
			$condition = $rows['listing_condition'];
			$notes = $rows['listing_notes'];
			$sku = $rows['listing_SKU'];
			$price = $rows['listing_price'];
			$available = '';
			$text = '';
			$new_used = ($rows['listing_new_used'] == '1') ? 'New' : 'Used';
			
			if ($rows['listing_available']=='1') {
				$available = 'Available';
				$text = 'text-success';
			}
			else if ($rows['listing_available']=='2'){
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

			include ('view/parts/thumbnail.part.php');
		}		
	}

	include ('view/index.view.php');
?>