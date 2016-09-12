<!DOCTYPE html>
<html>
	<head>
		<?php getHead(toCamelCase($brand . ' ' . $model)); ?>
		<script type="text/javascript" src="public/js/centerChildDiv.js"></script>
		<!-- <script type="text/javascript" src="public/js/contentEdit.js"></script> -->
		<script type="text/javascript">
			function saveToDB(id, field, value){
				$.ajax({
					url: "http://localhost:8888/timereflection/app/controllers/testController.php",
					type: "POST",
					data: 'action=update&id='+id+'&field='+field+'&value='+value,
					success: function(result){
						if(result=='true'){
							$('#'+field).css("background", "#2ecc71");
							$('#'+field).css("color", "#FFF");

							setTimeout(
								function(){

									$('#'+field).css("background", "#FFF");
									$('#'+field).css("color", "#000");

								}, 1000
							)
						}
						else{
							// alert('No success this time :(');
							$('#'+field).css("background", "#e74c3c");
							$('#'+field).css("color", "#FFF");

							setTimeout(
								function(){

									$('#'+field).css("background", "#FFF");
									$('#'+field).css("color", "#000");

								}, 1000
							)
						}
					}
				});
			}
		</script>
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
				<h3 class="text-center"><?php echo toCamelCase($brand . ' ' . $model); ?></h3>
				<p class="text-center text-muted">
					<?php echo $condition.'/10 ('.$new_used.')'; ?>
				</p>
				<h4 class="text-center">
					<span class="text-muted">Price: </span>
					<span class="text-danger" id="listing_price" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);">$<?php echo $price;?></span>
				</h4>
				<p class="text-center <?php echo $text;?>"><?php echo $available;?></p>
				<div class="text-center">
					<button class="btn btn-dark-blue no-rounded-corners transition-ease">
						<a href="mailto:irina@timereflectioninc.com?
						subject=Inquiry for <?php echo toCamelCase($brand . ' ' . $model); ?>&amp;
						body=Hi, %0D%0A%0D%0AI am interested in this listing. Please contact me with more information.
						%0D%0A%0D%0A
						http://localhost:8888<?php echo $_SERVER['REQUEST_URI']; ?>
						%0D%0A%0D%0A
						Best,
						%0D%0A" style="text-decoration: none;">
							<h4 class='color-white'>CLICK TO INQUIRE</h4>
						</a>
					</button>

					<!-- <button class="btn btn-dark-blue no-rounded-corners transition-ease"><h4 class="color-white">CLICK TO INQUIRE</h4></button> -->

				</div>
			</div>
		</div>

		<div class="container background-white margin-top-2em margin-bottom-2em">
			<div class="col-sm-6 col-xs-12 background-white">
			<h3 class="">DETAILS</h3>
			<br>
				<table class="table">
					<tbody>
						<tr>
							<td><b>BRAND</b></td>
							<td id="watch_brand" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingReference(); ?>', this.id, this.innerHTML);"><?php echo $brand; ?></td>
						</tr>
						<tr>
							<td><b>MODEL</b></td>
							<td id="watch_model" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingReference(); ?>', this.id, this.innerHTML);"><?php echo $model; ?></td>
						</tr>
						<tr>
							<td><b>REFERENCE</b></td>
							<td><?php echo $reference; ?></td>
						</tr>
						<tr>
							<td><b>SKU</b></td>
							<td id="listing_sku" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);"><?php echo $sku; ?></td>
						</tr>
						<tr>
							<td><b>RETAIL</b></td>
							<td id="listing_retail" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);">$<?php echo $retail; ?></td>
						</tr>
						<tr>
							<td><b>MATERIAL</b></td>
							<td id="watch_material" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingReference(); ?>', this.id, this.innerHTML);"><?php echo $material; ?></td>
						</tr>
						<tr class="visible-xs">
							<td id="dial"><b>DIAL</b></td>
							<td id="listing_dial" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);"><?php echo $dial; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>CONDITION</b></td>
							<td><?php echo $condition.'/10 ('.$new_used.')'; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>CASE SIZE</b></td>
							<td id="watch_case_size" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingReference(); ?>', this.id, this.innerHTML);"><?php echo $caseSize.'mm'; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>BOX</b></td>
							<td><?php echo $box; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>PAPERS</b></td>
							<td><?php echo $papers; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>NOTES</b></td>
							<td id="listing_notes" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);"><?php echo $notes; ?></td>
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
							<td id="listing_dial" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);"><?php echo $dial; ?></td>
						</tr>
						<tr>
							<td><b>CONDITION</b></td>
							<td><?php echo $condition.'/10 ('.$new_used.')'; ?></td>
						</tr>
						<tr>
							<td><b>CASE SIZE</b></td>
							<td id="watch_case_size" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingReference(); ?>', this.id, this.innerHTML);"><?php echo $caseSize.'mm'; ?></td>
						</tr>

						<tr>
							<td><b>BOX</b></td>
							<td ><?php echo $box; ?></td>
						</tr>
						<tr>
							<td><b>PAPERS</b></td>
							<td><?php echo $papers; ?></td>
						</tr>
						<tr>
							<td><b>NOTES</b></td>
							<td id="listing_notes" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);"><?php echo $notes; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<? if(User::isLoggedIn()): ?>

		<!-- Admin-only info -->
		<div class="container background-white margin-top-2em margin-bottom-2em padding-top-1em padding-bottom-1em">
			<div class="col-sm-6 col-xs-12 background-white">
				<h3 class="">DETAILS</h3>
				<br>
				<table class="table">
					<tbody>
						<tr>
							<td><b>SERIAL</b></td>
							<td id="listing_serial" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);"><?php echo $serial; ?></td>
						</tr>
						<tr>
							<td><b>OUR COST</b></td>
							<td id="listing_our_cost" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);">$<?php echo $cost; ?></td>
						</tr>
						<tr>
							<td><b>LISTED ON</b></td>
							<td><?php echo $listedOn; ?></td>
						</tr>
						<tr>
							<td><b>LISTED BY</b></td>
							<td><?php echo $listedBy; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<!-- Controls -->
		<div class="container background-white margin-top-2em margin-bottom-2em padding-top-1em padding-bottom-1em">
			<div class="col-sm-6 col-xs-12 background-white">
				<a href="http://localhost:8888/timereflection/delete/<?php echo $listing->getListingId(); ?>">Delete</a>
			</div>
		</div>
		<?php endif; ?>
		
	</body>
</html>