<!DOCTYPE html>
<html>
	
	<?php getHead('Time reflection'); ?>	

	<body>
		
		<?php

		getNavbar();

		function getResults(){

			// $conn = mysqli_connect(HOST, USER, PASS, DB);
			// $resultSet = $conn -> query("SELECT *
			// 					FROM listing
			// 					INNER JOIN watch on listing.watch_id = watch.watch_id;");
			// $conn -> mysql_close();
		}

		function getThumbnail(){

			$conn = mysqli_connect(HOST, USER, PASS, DB);
			$resultSet = $conn -> query("SELECT *
								FROM listing
								INNER JOIN watch on listing.watch_id = watch.watch_id;");
			mysqli_close($conn);

			while($rows = $resultSet -> fetch_assoc()){

				$brand = $rows['watch_brand'];
				$model = $rows['watch_model'];
				$ref = $rows['listing_reference_number'];
				$retail  = $rows['watch_retail'];
				$material = $rows['watch_material'];
				$condition = $rows['listing_condition'];
				$notes = $rows['listing_notes'];
				$sku = $rows['listing_SKU'];
				$price = $rows['listing_price'];

				echo '

				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
							<div class="thumbnail">
								<p class="text-center padding-top-1em">'.$brand.'</p>
								<hr>
								<img src="img/watches/audemars-piguet-royal-oak.jpg" alt="Audemars Piguet">
								<hr>
								<div id="details" class="padding-left-1em">
									<p><b>Brand:</b> '.$brand.'</p>
									<p><b>Model:</b> '.$model.'</p>
									<p><b>Ref #:</b> '.$ref.'</p>
									<p><b>Retail:</b> '.$retail.'</p>
									<p><b>Material:</b> '.$material.'</p>
									<p><b>Condition: </b> '.$condition.'</p>
									<p><b>Notes:</b> '.$notes.'</p>
									<p><b>Sku #:</b> '.$sku.'</p>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<p class="text-center text-success">Available</p>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<p class="text-center"><b>$'.$price.'</b></p>
									</div>
								</div>
							</div>
						</div>

			';
			}
			
			

		
	}
		?>



		<!-- <div class="container-fluid padding-left-0em padding-right-0em"> -->
			<!-- <div class="jumbotron text-center" id="main-top"> -->
				<!-- <div id="my-button"> -->
					<!-- <a href="#" id="shop-button" class="btn-lg color-white">SHOP IWC</a>	 -->
				<!-- </div> my-button -->
			<!-- </div> jumbotron -->
		<!-- </div> container-fluid -->


		<div id="my-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#my-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#my-carousel" data-slide-to="1"></li>
				<li data-target="#my-carousel" data-slide-to="2"></li>
				<li data-target="#my-carousel" data-slide-to="3"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				
				<div class="item active" id="item-1">
					<div class="carousel-caption">
						<div class="shop-button">
							<a href="#" class="transition-ease">BROWSE IWC</a>
						</div>
					</div>
				</div>

				<div class="item" id="item-2">
					<div class="carousel-caption">
						<div class="shop-button">
							<a href="#" class="transition-ease">BROWSE PANERAI</a>
						</div>
					</div>
				</div>

				<div class="item" id="item-3">
					<div class="carousel-caption">
						<div class="shop-button">
							<a href="#" class="transition-ease">BROWSE AUDEMARS PIGUET</a>
						</div>
					</div>
				</div>

				<div class="item" id="item-4">
					<div class="carousel-caption">
						<div class="shop-button">
							<a href="#" class="transition-ease">BROWSE PATEK PHILIPPE</a>
						</div>
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left hidden-xs" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right hidden-xs" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div> <!-- carousel-inner -->
		</div>

		<div class="container padding-top-4em">
			<div class="main-content">
				<div class="row multi-columns-row">
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="thumbnail">
							<p class="text-center padding-top-1em">RADIOMIR PANERAI</p>
							<hr>
							<img src="img/watches/radiomir-panerai-black-seal-alt.jpg" alt="Radiomir Panerai">
							<hr>
							<div id="details" class="padding-left-1em">
								<p><b>Brand:</b> Panerai</p>
								<p><b>Model:</b> Black Seal Ceramica</p>
								<p><b>Ref #:</b> abc1234</p>
								<p><b>Retail:</b> $10,000</p>
								<p><b>Material:</b> Steel</p>
								<p><b>Condition: </b> 9/10</p>
								<p><b>Notes:</b> </p>
								<p><b>Sku #:</b> 123456</p>
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

					<?php getThumbnail(); ?>

					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="thumbnail">
							<p class="text-center padding-top-1em">ROLEX MILGAUSS</p>
							<hr>
							<img src="img/watches/rolex-milgauss.jpg" alt="Rolex Milgauss">
							<!-- <p class="text-center padding-top-1em">ROLEX MILGAUSS</p> -->
							<hr>
							<!-- <br> -->
							<div id="details" class="padding-left-1em">
								<p><b>Brand:</b> Rolex</p>
								<p><b>Model:</b> Milgauss</p>
								<p><b>Diameter:</b> 40mm</p>
								<p><b>Material:</b> Steel</p>
								<p><b>Reference:</b> 123456</p>
							</div>
							<hr>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<p class="text-center text-danger">Sold</p>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<p class="text-center"><b>$10,000</b></p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="thumbnail">
							<p class="text-center padding-top-1em">PATEK PHILIPPE</p>
							<hr>
							<img src="img/watches/patek-philippe-grand-complications.jpg" alt="Patek Phillippe">
							<hr>
							<div id="details" class="padding-left-1em">
								<p><b>Brand:</b> Patek Phillippe</p>
								<p><b>Model:</b> Grand Complications</p>
								<p><b>Diameter:</b> 44mm</p>
								<p><b>Material:</b> Platinum</p>
								<p><b>Reference:</b> 123456</p>
							</div>
							<hr>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<p class="text-center text-warning">On hold</p>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<p class="text-center"><b>$278,915</b></p>
								</div>
							</div>
						</div>
					</div>

	
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						<div class="thumbnail">
							<p class="text-center padding-top-1em">IWC PORTUGUESE CHRONOGRAPH</p>
							<hr>
							<img src="img/watches/iwc-portuguese-chronograph.jpg" alt="IWC">
							<hr>
							<div id="details" class="padding-left-1em">
								<p><b>Brand:</b> IWC</p>
								<p><b>Model:</b> Portuguese Chronograph</p>
								<p><b>Diameter:</b> 40.1mm</p>
								<p><b>Material:</b> Stainless Steel</p>
								<p><b>Reference:</b> 123456</p>
							</div>
							<hr>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<p class="text-center text-success">Available</p>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<p class="text-center"><b>$5,495</b></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- main-content -->
	</body>
</html>