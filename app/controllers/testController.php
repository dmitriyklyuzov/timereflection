<?php
	
	session_start();
	include_once('../../lib/dependencies.php');
	include_once('../models/listing.php');


	$listing = new Listing();
	$listing -> generateListingId();
	$newListingId = $listing -> getListingId();

	$newListingId = '57981a7718ff157981a7719000';

	// check if the image is an actual image
	if(isset($_FILES['fileToUpload']['name'])){

		// directory where the files will be uploaded
		$target_dir = '../../public/img/watches/';

		// path of the file to be uploaded with the filename
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

		// echo 'target_file: ' . $target_file . '<br>';

		// Holds the file extension of the file
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		$check = getimagesize($_FILES['fileToUpload']['tmp_name']);

		// Check if a file is an image
		if($check !== false){
			// echo 'File is an image - ' . $check['mime'] . '.<br>';
			// Allow jpg or jpeg or gif
			if($imageFileType == 'jpg' || $imageFileType == 'jpeg' || $imageFileType == 'jpg' || $imageFileType == 'png' || $imageFileType == 'gif'){
				// Check if file doesn't exist
				if(!file_exists($target_file)){
					// fileName - file name without the path
					$fileName = basename($_FILES['fileToUpload']['name']);
					// echo 'Filename: ' . $fileName . '<br>';
					// echo 'Listing Id: ' . $newListingId . '<br>';

					if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){

						$conn = DB();
						$conn -> query("INSERT INTO listing_img (listing_id, img_name, date_added) VALUES ('" . $newListingId . "', '" . $fileName . "', NOW());");
						$conn -> close();

						$conn = DB();
						$result = $conn -> query("SELECT img_name FROM listing_img WHERE listing_id = '" . $newListingId . "';");
						$conn -> close();

						if($row = $result -> fetch_assoc()){
							echo $row['img_name'];
						}

						// echo 'File ' . basename($_FILES['fileToUpload']['name']) . ' has been uploaded!<br>';
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

		// $newListingId = '57a6b1fd015e057a6b1fd015f1';
	}

	else {




?>

<!DOCTYPE html>
<html>
	<head>
		<?php getHead('Test');?>
		<script type="text/javascript" src="public/js/uploadImg.js"></script>
	</head>
	<body>

		<br>
		<br>

		<div class="margin-top-4em"></div>

		<img class="img-responsive" id="img-1" style="max-width: 400px; " src="">

		<p><?php echo $newListingId; ?></p>

		<button class="btn btn-md btn-info" id="clickBtn" onclick="clickUpload();">Upload an image <span class="glyphicon glyphicon-camera"></span></button>

		<br>
		<br>

		<form action="test" method="POST" enctype="multipart/form-data">
			<!-- <label for="fileToUpload">Upload an image</label> -->
			<input type="file" onchange="uploadImg()" class="input-md" name="fileToUpload" id="fileToUpload" style="display: none;">
			<!-- <input type="submit" name="submit"> -->
		</form>

		Filename: <span id="filename"></span>
		<script>
			function clickUpload(){
				$('#fileToUpload').click();
				// $('#clickBtn').addClass('btn-success');
				// $('#filename').text($('#fileToUpload').val());
				// $('#fileToUpload').on('change', click2())


			}

			function click2(){
				// alert($('#fileToUpload').val());
				// $('#filename').text('click2 worked!');
				$('#filename').text($('#fileToUpload').val());
			}

			// function upload(){}
		</script>
	</body>
</html><?php ;}?>
