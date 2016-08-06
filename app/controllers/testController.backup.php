<?php

	// session_start();
	// include_once('../../lib/dependencies.php');
	// include_once('../models/listing.php');
	// include_once('../models/watch.php');

	// $listing = new Listing();
	// $listing -> getListingByReference('57a4da0e7563757a4da0e75644');

	// $watch = new Watch();
	// $watch -> getWatchByReference($listing -> getListingReference());

	// // echo $listing -> getPrice();
	// // echo '<br>';

	// $img = 'rolex-daytona-2.jpg';

	// $listing -> setListingImg($img);
	// $listing -> updateListingImg();

	// // echo $watch -> getBrand();

	// $name = $watch -> getWatchBrand() . ' ' . $watch -> getWatchModel();

	// // $name = 'Name';

	// // echo $listing -> getListingImg();


?>

<!-- <img src="public/img/watches/<?php echo $listing -> getListingImg(); ?>" alt="<?php echo $name; ?>"> -->

<!DOCTYPE html>
<html>
	<body>
		<form action="test" method="POST" enctype="multipart/form-data">
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" name="submit">
		</form>
	</body>
</html>

<?php ?>