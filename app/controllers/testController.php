<?php
	
	session_start();
	include_once('../../lib/dependencies.php');

	// check if the image is an actual image
	if(isset($_POST['submit'])){

		// directory where the files will be uploaded
		$target_dir = '../../public/img/watches/';

		// path of the file to be uploaded
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

		// 
		$uploadOK = 1;

		// Holds the file extension of the file
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		$check = getimagesize($_FILES['fileToUpload']['tmp_name']);

		if($check !== false){
			echo 'File is an image - ' . $check['mime'] . '.<br>';
			$uploadOK = 1;
		}
		else{
			echo 'File is not an image.<br>';
			$uploadOK = 0;
		}

		// Allow jpg or jpeg or gif
		if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif'){
			echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>';
		    $uploadOk = 0;
		}

		if($uploadOK == 0){
			echo 'Sorry, something went wrong and the image has not been uploaded.<br>';
		}
		else{
			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
				include_once('../../lib/dependencies.php');
				include_once('../models/listing.php');
				$listing = new Listing();
				$listing -> getListingByReference('57981a7718ff157981a7719000');
				$listing -> setListingImg(basename($_FILES['fileToUpload']['name']));
				$listing -> updateListingImg();
				echo 'File ' . basename($_FILES['fileToUpload']['name']) . ' has been uploaded!<br>';
				?>
					<img src="public/img/watches/<?php echo $listing -> getListingImg(); ?>" style="max-width: 300px">
				<?php
			}
			else echo 'Sorry, something went wrong.<br>';
		}

		exit();
	}




?>

<!DOCTYPE html>
<html>
	<head>
		<?php getHead('Test');?>
	</head>
	<body>
		<form action="test" method="POST" enctype="multipart/form-data">
			<label for="fileToUpload">Upload an image</label>
			<input type="file" class="input-md" name="fileToUpload" id="fileToUpload">
			<input type="submit" name="submit">
		</form>
	</body>
</html>

