<?php 

	session_start();
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');
	include_once('../models/watch.php');
	include_once('../models/listing.php');

	// if(isset($_GET['s']) && isset($_GET['m']) ){
	// 	echo 'BRAND: ' . $_GET['s'] . '<br>';
	// 	echo 'MODEL: ' . $_GET['m'] . '<br>';

	// 	exit();
	// }

	if(isset($_GET['s'])){
		$search = $_GET['s'];
		// echo $_GET['s'];
		unset($_GET['s']);
		sanitize($search);
		// $search = str_replace("%20", " ", $search);
		$search = str_replace("_", " ", $search);

		if($search == ''){
			// echo 'Search is empty<br>';
			header("Location: /");
		}

		if(isset($_GET['m'])){
			$model = $_GET['m'];
			unset($_GET['m']);
			sanitize($model);
			$model = str_replace('_', ' ', $model);
			$search = $search . ' ' . $model;
		}

		$result = Listing::findListingsByKeyword($search);

		function getThumbnails($result){

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
				$price = $row['listing_price'];
				$available = '';
				$text = '';
				$new_used = ($row['listing_new_used'] == '1') ? 'New' : 'Pre-owned';

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

				$imgSrc = 'http://placehold.it/300?text=IMAGE+NOT+AVAILABLE';

				if($img = Listing::getMainImage($listing_id)){
					$imgSrc = '/public/img/watches/' . $img;
				}

				include('../views/parts/thumbnail.part.php');
			}
		}
	}
	else{
		// echo 's is not set!<br>';
		header('Location: /');
	}

	include('../views/results.view.php');
?>