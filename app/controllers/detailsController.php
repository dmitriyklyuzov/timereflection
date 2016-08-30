<?php
	session_start();
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');
	include_once('../models/watch.php');
	include_once('../models/listing.php');

	if(isset($_GET['listingId'])){

		$listingId = $_GET['listingId'];

		$listingId = sanitize($listingId);

		if(Listing::exists($listingId)){
			
			$listing = new Listing();

			$listing -> getListingByReference($listingId);

			$sku = $listing -> getSKU();
			$condition = $listing -> getCondition();
			$new_used = $listing -> getNewUsed();
			$available = $listing -> getAvailability();
			$text = 'text-success';
			$price = number_format($listing -> getPrice());
			// $price_formatted
			$reference = $listing -> getListingReference();
			$notes = $listing -> getNotes();
			$box = $listing -> getBox();
			$papers = $listing -> getPapers();

			$new_used = ($new_used == '1') ? 'New / Unworn' : 'Pre-owned';

			if ($available=='1') {
				$available = 'Available';
			}
			else if ($available=='2'){
				$available = 'On hold';
				$text = 'text-warning';
			}
			else {
				$available = 'Sold';
				$text = 'text-danger';
			}

			$watch = new Watch();
			
			$watch -> getWatchByReference($reference);

			$brand = $watch -> getWatchBrand();
			$model = $watch -> getWatchModel();
			$retail = number_format($watch -> getWatchRetail());
			$dial = $watch -> getWatchDial();
			// $retail_formatted = number_format($retail);
			$material = $watch -> getWatchMaterial();

			include('../views/details.view.php');
		}

		else{
			header('Location: http://localhost:8888/timereflection/');
		}
	}
?>