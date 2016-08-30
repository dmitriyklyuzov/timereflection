<?php 

	session_start();
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');
	include_once('../models/watch.php');
	include_once('../models/listing.php');

	if(isset($_GET['s'])){
		$search = $_GET['s'];
		echo $_GET['s'];
		unset($_GET['s']);
		sanitize($search);
		$search = str_replace("%20", " ", $search);

		if($search == ''){
			echo 'Search is empty<br>';
		}

		$result = Listing::findListinsByKeyword($search);

		function getThumbnails($result){

			while($row = $result -> fetch_assoc()){
			
				$listing_id = $row['listing_id'];
				$brand = $row['watch_brand'];
				$model = $row['watch_model'];
				$retail = $row['watch_retail'];
				$material = $row['watch_material'];
				$condition = $row['listing_condition'];
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
					$imgSrc = 'http://localhost:8888/timereflection/public/img/watches/' . $img;
				}

				include('../views/parts/thumbnail.part.php');
			}
		}
	}
	else{
		echo 's is not set!<br>';
		// header('Location: /');
	}

	include('../views/results.view.php');
?>