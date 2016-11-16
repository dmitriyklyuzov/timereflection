<?php

	// session_save_path("/home1/timerefl/sessions_here");
	
	// $errorMsg='';
	include_once('../../lib/dependencies.php');
	session_start();
	include_once('../models/user.php');
	include_once('../models/watch.php');
	include_once('../models/listing.php');

	// REDIRECT TO LOGIN IF NOT LOGGED IN
	if(!User::isLoggedIn()){
		$errorMsg = 'Please log in first.';
		include ('../views/login.view.php');
		exit();
	}

	// UPDATE
	if(isset($_POST['action']) && isset($_POST['id']) && isset($_POST['field']) && isset($_POST['value'])){

		$action = sanitize($_POST['action']);
		$id = sanitize($_POST['id']);
		$field = sanitize($_POST['field']);

		if($field == 'watch_material' || $field == 'listing_notes'){
			$value = $_POST['value'];
		}
		else $value = sanitize($_POST['value']);

		if(Listing::exists($id)){

			if($field == 'listing_retail' || $field == 'listing_price' || $field == 'listing_our_cost'){
				$value = currencyToNumber($value);
			}

			$conn = DB();
			$conn -> query('UPDATE listing SET ' . $field . ' = "' . $value . '" WHERE listing_id = "' . $id . '";');
			$conn -> close();

			echo 'true';
		}

		else if(Watch::refExists($id)){

			if($field == 'watch_case_size_xs'){
				$field == 'watch_case_size';
			}

			if($field == 'watch_case_size'){
				$value = str_replace(' ', '', $value);
				$value = str_replace('m', '', $value);
				$value = str_replace('M', '', $value);
			}

			$conn = DB();
			$conn -> query('UPDATE watch SET ' . $field . ' = "' . $value . '" WHERE watch_reference = "' . $id . '";');
			$conn -> close();

			echo 'true';
		}
		else echo 'false';
		
		exit();
	}

	// UPDATE IMAGE & DELETE IMAGE
	if(isset($_POST['action']) && isset($_POST['listing_id']) && isset($_POST['img'])){
		$action = sanitize($_POST['action']);
		$listing_id = sanitize($_POST['listing_id']);
		$img = sanitize($_POST['img']);

		if($action=='updateMainImg'){
			
			// unset main img if has one already
			if(Listing::hasMainImage($listing_id)){
				Listing::unsetMainImage($listing_id);
			}

			// set new main img
			Listing::setMainImage($listing_id, $img);

			echo 'true';
		}

		if($action=='deleteImg'){

			// delete the image + link to it
			Listing::deleteImg($listing_id, $img);

			// if there is no main image after deletion, set the first occurence to be main
			if(!Listing::hasMainImage($listing_id)){
				$conn = DB();
				$conn -> query("UPDATE listing_img SET main_img = 1 WHERE listing_id = '" . $listing_id . "' LIMIT 1;");
				$conn -> close();
			}

			echo '1';

			exit();
		}

		exit();
	}

	$user = new User();
	$watch = new Watch();

	// UPLOAD IMAGE
	if(isset($_FILES['img']['name'])){
		
		// directory where the files will be uploaded
		$target_dir = '../../public/img/watches/';

		$fileCount = count($_FILES['img']['name']);

		// echo $fileCount;
		
		for($i=0; $i<$fileCount; $i++){

			if(isset($_SESSION['listing_id'])){
				$newListingId = $_SESSION['listing_id'];
			}

			if(isset($_POST['listing_id'])){
				$newListingId = $_POST['listing_id'];	
			}

			// $newListingId = '58181cca3abe158181cca3abf6';

			// path of the file to be uploaded with the filename
			$target_file = $target_dir . basename($_FILES["img"]["name"][$i]);

			// Holds the file extension of the file
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			$check = getimagesize($_FILES['img']['tmp_name'][$i]);

			// Check if a file is an image
			if($check !== false){
				// echo 'File is an image - ' . $check['mime'] . '.<br>';
				// Allow jpg or jpeg or gif
				if($imageFileType == 'jpg' || $imageFileType == 'jpeg' || $imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'gif'){

					// fileName - file name without the path
					$fileName = basename($_FILES['img']['name'][$i]);

					// Check if file doesn't exist
					if(!file_exists($target_file)){
						
						// move the file
						if(!move_uploaded_file($_FILES['img']['tmp_name'][$i], $target_file)){
							echo 'Sorry, something went wrong.';
						}
					}

					$conn = DB();
					
					$conn -> query("INSERT INTO listing_img (listing_id, img_name, date_added) VALUES ('" . $newListingId . "', '" . $fileName . "', NOW());");
					$conn -> close();
					// echo 'File inserted';

					if(!Listing::hasMainImage($newListingId)){
						$conn = DB();
						$conn -> query("UPDATE listing_img SET main_img = 1 WHERE img_name = '" . $fileName . "';");
						$conn -> close();
					}

					header('Location: details/'. $newListingId);
				}
				else{
					echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
				}
			}
			else{
				echo 'Sorry, file is not an image.';
			}
		} // END FOR / FOREACH

		unset($_SESSION['listing_id']);
		// This session variable is used so that once you listed a listing the server would be able to know to which listings to attach the images to. Once done uploading the images, we need to unset the session variable

		exit();
	} // END IF

	// LOOKUP & DELETE
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
				$caseSize = $row['watch_case_size'];

				$watch -> setWatchBrand($brand);
				$watch -> setWatchModel($model);
				$watch -> setWatchMaterial($material);
				$watch -> setWatchCaseSize($caseSize);

				include ('../views/parts/foundWatch.part.php');
			}
			else echo '0';
		}

		if($action == 'delete'){

			if(Listing::exists($ref)){
				Listing::deleteImages($ref);
				Listing::delete($ref);
				if(Listing::exists($ref)){
					// listing not deleted
					echo 'Listing still exists :(<br>';
				}
				else{
					// listing deleted
					header('Location: /');
				}
			}
			else echo "listing you're trying to delete does not exist.<br>";
		}
		exit();
	}

	// LIST
	if(isset($_POST['ref'])){

		debugMsg('OK: POST ref is set.');

		$listing = new Listing();
		$watch = new Watch();

		$ref = sanitize($_POST['ref']);	

		if($ref && $ref!=''){

			$listing -> setListingReference($ref);
			$watch -> setWatchReference($ref);

			$result = $watch -> findWatch($ref);

			if($row = $result -> fetch_assoc()){

				debugMsg('This watch exists');

			}
			else{

				// PLS remember that POST variables are only set if they are transfered via listWatch.js ajax!!!

				// Need to create a new watch

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
					// $material = sanitize($_POST['material']);
					$material = $_POST['material'];
					$watch -> setWatchMaterial($material);
				}

				if(isset($_POST['case'])){
					debugMsg('OK: case is set');
					$caseSize = sanitize($_POST['case']);
					$watch -> setWatchCaseSize($caseSize);
				}

				$watch -> generateWatchId();

				$watch -> createWatch($user -> getEmail());

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

			if(isset($_POST['box'])){
				debugMsg('OK: box is set');
				$box = sanitize($_POST['box']);
				$listing -> setBox($box);
			}

			if(isset($_POST['papers'])){
				debugMsg('OK: papers is set');
				$papers = sanitize($_POST['papers']);
				$listing -> setPapers($papers);
			}

			if(isset($_POST['retail'])){
				debugMsg('OK: retail is set');
				$retail = sanitize($_POST['retail']);
				$listing -> setRetail($retail);
			}

			if(isset($_POST['dial'])){
				debugMsg('OK: dial is set');
				$dial = sanitize($_POST['dial']);
				$listing -> setDial($dial);
			}

			if(isset($_POST['serial'])){
				$serial = sanitize($_POST['serial']);
				$listing -> setSerial($serial);
			}

			$listing -> generateListingId();

			$listing -> createListing($user -> getEmail());

			echo '1'; // SUCCESS

			$_SESSION['listing_id'] = $listing -> getListingId();

		}
		else{
			echo 'Please fill in all required fields and try again.';
			debugMsg('WARNING: Variables do not exist or == ""');
			include ('../views/addlisting.view.php');
		}
	}

	else include ('../views/addlisting.view.php');

?>