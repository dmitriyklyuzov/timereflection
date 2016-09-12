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
	if(!User::isLoggedIn()){
		$errorMsg = 'Please log in first.';
		include ('../views/login.view.php');
		exit();
	}

	
	if(isset($_FILES['img']['name'])){
		
		// directory where the files will be uploaded
		$target_dir = '../../public/img/watches/';

		$fileCount = count($_FILES['img']['name']);

		// echo $fileCount;
		
		for($i=0; $i<$fileCount; $i++){

			if(isset($_SESSION['listing_id'])){
				$newListingId = $_SESSION['listing_id'];
			}

			// $newListingId = '57b25af658fe257b25af658fec';

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
					// Check if file doesn't exist
					if(!file_exists($target_file)){
						// fileName - file name without the path
						$fileName = basename($_FILES['img']['name'][$i]);
						// echo 'Filename: ' . $fileName . '<br>';
						// echo 'Listing Id: ' . $newListingId . '<br>';

						if(move_uploaded_file($_FILES['img']['tmp_name'][$i], $target_file)){

							$conn = DB();
							$conn -> query("INSERT INTO listing_img (listing_id, img_name, date_added) VALUES ('" . $newListingId . "', '" . $fileName . "', NOW());");
							$conn -> close();
							// echo 'File inserted';

							if(!Listing::hasMainImage($newListingId)){
								$conn = DB();
								$conn -> query("UPDATE listing_img SET main_img = 1 WHERE img_name = '" . $fileName . "';");
								$conn -> close();
							}

							// echo 'File ' . basename($_FILES['img']['name']) . ' has been uploaded!<br>';

							header('Location: details/'. $newListingId);
						}
						else echo 'Sorry, something went wrong.';
					}
					else{
						echo 'Sorry, this file already exists!';
					}
				}
				else{
					echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
				}
			}
			else{
				echo 'Sorry, file is not an image.';
			}
		} // END FOR / FOREACH
		exit();
	} // END IF

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
					header('Location: http://localhost:8888/timereflection/');
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
					$material = sanitize($_POST['material']);
					$watch -> setWatchMaterial($material);
				}

				if(isset($_POST['caseSize'])){
					debugMsg('OK: caseSize is set');
					$material = sanitize($_POST['caseSize']);
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