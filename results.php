<!-- <?php

// $conn = mysqli_connect(HOST, USER, PASS, DB);


// if (!$conn){
	// $success=false;
// }
// else{
	// $success=true;

	function getThumbnail(){

		$resultSet = $conn -> query("SELECT *
								FROM listing
								INNER JOIN watch on listing.watch_id = watch.watch_id;");

		$rows = $resultSet -> fetch_assoc();

		$brand = $rows['watch_brand'];
		$model = $rows['watch_model'];
		$ref = $rows['listing_reference_number'];
		$retail  = $rows['listing_retail'];
		$material = $rows['listing_material'];
		$condition = $rows['listing_condition'];
		$notes = $rows['listing_notes'];
		$sku = $rows['listing_SKU'];

		echo '

			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="thumbnail">
							<p class="text-center padding-top-1em">$brand</p>
							<hr>
							<img src="img/watches/audemars-piguet-royal-oak.jpg" alt="Audemars Piguet">
							<hr>
							<div id="details" class="padding-left-1em">
								<p><b>Brand:</b> $brand</p>
								<p><b>Model:</b> $model</p>
								<p><b>Ref #:</b> $ref</p>
								<p><b>Retail:</b> $retail</p>
								<p><b>Material:</b> $material</p>
								<p><b>Condition: </b> $condition</p>
								<p><b>Notes:</b> $notes</p>
								<p><b>Sku #:</b> $sku</p>
							</div>
							<hr>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<p class="text-center text-success">Available</p>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<p class="text-center"><b>$6,325</b></p>
								</div>
							</div>
						</div>
					</div>

		';
	}
// }
?> -->