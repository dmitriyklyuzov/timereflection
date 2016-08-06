<?php

	session_start();
	$errorMsg='';
	include_once('../../lib/dependencies.php');

	function getThumbnails(){

		$conn = DB();

		$resultSet = $conn -> query("SELECT *
							FROM listing
							INNER JOIN watch on listing.watch_reference = watch.watch_reference;");
		
		$conn -> close();

		// if($resultSet -> fetch_assoc()){

		// 	echo 'Fetched!';

			while($rows = $resultSet -> fetch_assoc()){

				$listing_id = $rows['listing_id'];
				$brand = $rows['watch_brand'];
				$model = $rows['watch_model'];
				// $ref = $rows['listing_reference_number'];
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

				include ('../views/parts/thumbnail.part.php');
			}	
		// }
	}

	include ('../views/index.view.php');

?>