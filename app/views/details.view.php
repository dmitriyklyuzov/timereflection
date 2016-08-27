<!DOCTYPE html>
<html>
	<head>
		<?php getHead($brand . ' ' . $model); ?>
		<script type="text/javascript" src="public/js/centerChildDiv.js"></script>
	</head>

	<body style="">
		<?php getNavbar(); ?>

		<!-- <p class="visible-lg" id="debugP">LG</p>
		<p class="visible-md" id="debugP">MD</p>
		<p class="visible-sm" id="debugP">SM</p>
		<p class="visible-xs" id="debugP">XS</p> -->

		<div class="container details-container background-white clearfix">

			<!-- IMAGE -->
			<div class="col-sm-5 col-xs-12 clearfix" id="imageDiv">
				<?php 
					if($listing -> hasImages($listing->getListingId())){ ?>
						<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox" id="detailsImageCarousel">
										<?php $listing -> getImages(); ?>
								<!-- <div id="carouselItem" class="item active" style=" padding-top: 2em; padding-bottom: 2em">
									<img id="item-image" class="img-responsive text-center" src="public/img/watches/patek-philippe-grand-complications.jpg" style="margin-left: auto; margin-right: auto;">
								</div>
								<div id="carouselItem" class="item" style=" padding-top: 2em; padding-bottom: 2em">
									<img id="item-image" class="img-responsive text-center" src="public/img/watches/patek-philippe-grand-complications.jpg" style="margin-left: auto; margin-right: auto;">
								</div> -->
							</div>

							<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="background-image: none;">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="background-image: none;">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					<?php 
					}
					else{
						?>
						<img id="item-image" class="img-responsive text-center" src="http://placehold.it/900?text=IMAGE+NOT+AVAILABLE" style="margin-left: auto; margin-right: auto;">
					<?php 
					}?>
			</div>
			
			<!-- DETAILS -->
			<div class="col-sm-7 col-xs-12 clearfix" id="rightDiv">
				<h3 class="text-center"><?php echo $brand . ' ' . $model; ?></h3>
				<p class="text-center text-muted">
					<?php echo $stars; ?>&nbsp(<?php echo $new_used; ?>)
				</p>
				<h4 class="text-center">
					<span class="text-muted">Price: </span>
					<span class="text-danger">$<?php echo $price;?></span>
				</h4>
				<p class="text-center <?php echo $text;?>"><?php echo $available;?></p>
				<div class="text-center">
					<button class="btn btn-dark-blue no-rounded-corners transition-ease"><h4 class="color-white">CONTACT ME</h4></button>
				</div>
			</div>
		</div>

		<div class="container background-white margin-top-2em">
			<div class="col-sm-6 col-xs-12 background-white">
			<h3 class="">DETAILS</h3>
			<br>
				<table class="table">
					<tbody>
						<tr>
							<td><b>BRAND</b></td>
							<td contenteditable="true"><?php echo $brand; ?></td>
						</tr>
						<tr>
							<td><b>MODEL</b></td>
							<td><?php echo $model; ?></td>
						</tr>
						<tr>
							<td><b>REFERENCE</b></td>
							<td><?php echo $reference; ?></td>
						</tr>
						<tr>
							<td><b>SKU</b></td>
							<td><?php echo $sku; ?></td>
						</tr>
						<tr>
							<td><b>RETAIL</b></td>
							<td>$<?php echo $retail; ?></td>
						</tr>
						<tr>
							<td><b>MATERIAL</b></td>
							<td><?php echo $material; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>DIAL</b></td>
							<td><?php echo 'CHAMP STICK'; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>CONDITION</b></td>
							<td><?php echo $condition.'/10 ('.$new_used.')'; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>BOX</b></td>
							<td><?php echo 'NO'; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>PAPERS</b></td>
							<td><?php echo 'NO'; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>NOTES</b></td>
							<td contenteditable="true"><?php echo $notes; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-sm-6 col-xs-12 background-white hidden-xs">
			<h3 class="text-center">&nbsp</h3>
			<br>
				<table class="table">
					<tbody>
						<tr>
							<td><b>DIAL</b></td>
							<td><?php echo $dial; ?></td>
						</tr>
						<tr>
							<td><b>CONDITION</b></td>
							<td><?php echo $condition.'/10 ('.$new_used.')'; ?></td>
						</tr>
						<tr>
							<td><b>BOX</b></td>
							<td><?php echo $box; ?></td>
						</tr>
						<tr>
							<td><b>PAPERS</b></td>
							<td><?php echo $papers; ?></td>
						</tr>
						<tr>
							<td><b>NOTES</b></td>
							<td contenteditable="true"><?php echo $notes; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<? if(User::isLoggedIn()): ?>
		<div class="container background-white margin-top-2em margin-bottom-2em padding-top-1em padding-bottom-1em">
			<div class="col-sm-6 col-xs-12 background-white">
				<a href="http://localhost:8888/timereflection/delete/<?php echo $listing->getListingId(); ?>">Delete</a>
			</div>
		</div>
		<?php endif; ?>

		<script>
			// window.onload = centerChildDiv('#imageDiv', '#rightDiv');
			// window.onresize = centerChildDiv('#imageDiv', '#rightDiv');
		</script>
		
	</body>
</html>