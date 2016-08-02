<?php

	session_start();
	// $errorMsg='';
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');
	include_once('../models/watch.php');
	include_once('../models/listing.php');

	$user = new User();

	$watch = new Watch();

	// REDIRECT TO LOGIN IF NOT LOGGED IN
	if(!isLoggedIn()){
		$errorMsg = 'Please log in first.';
		include ('../views/login.view.php');
		exit();
	}

	// LOOKUP
	if(isset($_GET['reference']) && isset($_GET['action'])){

		$action = $_GET['action'];
		$action = sanitize($action);

		$ref = $_GET['reference'];
		$ref = sanitize($ref);

		$watch -> setWatchReference($ref);

		if($action == 'lookup'){
			$result = $watch -> findWatch($ref);

			if($row = $result -> fetch_assoc()){
				$brand = $row['watch_brand'];
				$model = $row['watch_model'];
				$material = $row['watch_material'];
				$dial = 'Not available';
				$retail = $row['watch_retail'];

				$watch -> setWatchBrand($brand);
				$watch -> setWatchModel($model);
				$watch -> setWatchMaterial($material);
				$watch -> setWatchRetail($retail);

				include ('../views/parts/foundWatch.part.php');
			}
			else echo '0';
		}
		exit();
	}

	if(isset($_POST['submit'])){

		debugMsg('OK: submit was pressed.');

		if(isset($_POST['ref'])){

			debugMsg('OK: POST ref is set.');

			$listing = new Listing();
			$watch = new Watch();

			$ref = sanitize($_POST['ref']);	

			if($ref && $ref!=''){

				$listing -> setListingReference($ref);
				$watch -> setWatchReference($ref);

				debugMsg('OK: Variable exists and != ""');
				debugMsg('OUTPUT: ref: '. $listing -> getListingReference());

				$result = $watch -> findWatch($ref);

				if($row = $result -> fetch_assoc()){

					debugMsg('This watch exists');
					echo "watch exists<br>";

					// $dial = 'Not available';
				}
				else{

					// Need to create a new watch
					debugMsg('Watch does not exist');
					echo "watch does not exist<br>";

					if(isset($_POST['brand'])){
						debugMsg('OK: brand is set');
						$brand = sanitize($_POST['brand']);
						$watch -> setWatchBrand($brand);
					}

					if(isset($_POST['model'])){
						debugMsg('OK: model is set');
						$model = sanitize($_POST['model']);
						$watch -> setWatchModel($model);
					}

					if(isset($_POST['material'])){
						debugMsg('OK: material is set');
						$material = sanitize($_POST['material']);
						$watch -> setWatchMaterial($material);
					}

					if(isset($_POST['retail'])){
						debugMsg('OK: retail is set');
						$retail = sanitize($_POST['retail']);
						$watch -> setWatchRetail($retail);
					}

					$watch -> generateWatchId();

					$watch -> createWatch($user -> getEmail());

					echo 'Watch created!<br>';
					echo 'Watch Id is ' . $watch -> getWatchId();

				}
				
				if(isset($_POST['new_used'])){
					debugMsg('OK: new_used is set');
					$new_used = sanitize($_POST['new_used']);
					$listing -> setNewUsed($new_used);
				}

				if(isset($_POST['condition'])){
					debugMsg('OK: condition is set');
					$condition = sanitize($_POST['condition']);
					$listing -> setCondition($condition);
				}

				if(isset($_POST['sku'])){
					debugMsg('OK: sku is set');
					$sku = sanitize($_POST['sku']);
					$listing -> setSKU($sku);
				}

				if(isset($_POST['cost'])){
					debugMsg('OK: cost is set');
					$cost = sanitize($_POST['cost']);
					$listing -> setCost($cost);
				}

				if(isset($_POST['price'])){
					debugMsg('OK: price is set');
					$price = sanitize($_POST['price']);
					$listing -> setPrice($price);
				}

				if(isset($_POST['notes'])){
					debugMsg('OK: notes is set');
					$notes = sanitize($_POST['notes']);
					$listing -> setNotes($notes);
				}

				if(isset($_POST['availability'])){
					debugMsg('OK: availability is set');
					$availability = sanitize($_POST['availability']);
					$listing -> setAvailability($availability);
				}

				$listing -> generateListingId();

				echo $listing -> getListingReference() . '<br>';
				echo $listing -> getNewUsed(). '<br>';
				echo $listing -> getCondition(). '<br>';
				echo $listing -> getSKU(). '<br>';
				echo $listing -> getCost(). '<br>';
				echo $listing -> getPrice(). '<br>';
				echo $listing -> getNotes(). '<br>';
				echo $listing -> getAvailability(). '<br>';

				$listing -> createListing($user -> getEmail());

				echo 'Listing created!';
				echo 'Listing Id is ' . $listing -> getListingId();

			}
			else{
				$errorMsg = 'Please fill in all required fields and try again.';
				debugMsg('WARNING: Variables do not exist or == ""');
				include ('../views/addlisting.view.php');
			}
		}
		else{
			$errorMsg = 'Something went wrong. Please try again.';
			debugMsg('WARNING: One of the variables is not set!');
			include ('../views/addlisting.view.php');
		}
	}

	else include ('../views/addlisting.view.php');
?>