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
			$price = '';
			if($listing -> getPrice()!=''){
				$price = number_format($listing -> getPrice());
			}
			$reference = $listing -> getListingReference();
			$notes = $listing -> getNotes();
			$box = $listing -> getBox();
			$papers = $listing -> getPapers();
			$dial = $listing -> getDial();
			$serial = $listing -> getSerial();
			$listedOn = $listing -> getDate();
			$listedBy = User::getFirstName($listing -> getEmail());
			
			$cost = '';
			if($listing -> getCost()!=''){
				$cost = number_format($listing -> getCost());
			}

			$retail = '';
			if($listing -> getRetail()!=''){
				$retail = number_format($listing -> getRetail());
			}

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
			$material = $watch -> getWatchMaterial();
			$caseSize = $watch -> getWatchCaseSize();

			include('../views/details.view.php');
		}

		else{
			header('Location: http://localhost:8888/timereflection/');
		}
	}
?>