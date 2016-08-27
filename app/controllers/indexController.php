<?php

	session_start();
	$errorMsg='';
	include_once('../../lib/dependencies.php');
	include_once('../models/watch.php');
	include_once('../models/listing.php');
	include_once('../models/user.php');

	function getThumbnails(){

		$conn = DB();

		$result = $conn -> query("SELECT *
							FROM listing
							INNER JOIN watch on listing.watch_reference = watch.watch_reference;");
		
		$conn -> close();

		while($row = $result -> fetch_assoc()){

			$listing_id = $row['listing_id'];
			$brand = $row['watch_brand'];
			$model = $row['watch_model'];
			// $ref = $row['listing_reference_number'];
			$retail  = $row['watch_retail'];
			$material = $row['watch_material'];
			$condition = $row['listing_condition'];
			$notes = $row['listing_notes'];
			$sku = $row['listing_SKU'];
			$price = $row['listing_price'];
			$available = '';
			$text = '';
			$new_used = ($row['listing_new_used'] == '1') ? 'New' : 'Used';
			
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

			$stars = '';

			for($i=1; $i<=$condition/2; $i++){
				$stars = $stars . '<i class="fa fa-star"></i>';
			}
			if($condition%2==1){
				$stars = $stars . '<i class="fa fa-star-half-o"></i>';
			}
			if(10-$condition!=0){
				for($i=1; $i<=(10-$condition)/2; $i++){
					$stars = $stars . '<i class="fa fa-star-o"></i>';
				}
			}

			$imgSrc = 'http://placehold.it/300?text=IMAGE+NOT+AVAILABLE';

			if($img = Listing::getMainImage($listing_id)){
				$imgSrc = 'public/img/watches/' . $img;
			}

			include ('../views/parts/thumbnail.part.php');
		}
	}

	include ('../views/index.view.php');

?>