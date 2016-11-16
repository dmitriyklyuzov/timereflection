<!DOCTYPE html>
<html>
	<head>
		<?php getHead($brand . ' ' . $model); ?>

		<meta property="og:image" content="http://timereflectioninc.com/public/img/watches/<?php echo Listing::getMainImage($listingId); ?>" />
		<meta property="og:description" content=""/>
		<meta property="og:url" content="http://timereflectioninc.com/details/<?php echo $listingId; ?>"/>
		<meta property="og:title" content="<?php echo $brand . ' ' . $model ?>"/>
		
		<script type="text/javascript" src="/public/js/centerChildDiv.js"></script>
		<script type="text/javascript" src="/public/js/fileinput.js"></script>
		<link rel="stylesheet" type="text/css" href="/public/css/fileinput.css">
		
		<?php if($isLoggedIn): ?>

		<script>
			function addImg(){
				$('#addImgModal').modal({backdrop:true});
			}
		</script>
		<script>
			function replaceRadio(id){

				if(id=='listing_box' || id=='listing_papers'){
					var radio = 
					'<label class="radio-inline"><input type="radio" name="'+id+'" value="1"><span class="text-success">Yes</span></label><label class="radio-inline"><input type="radio" name="'+id+'" value="2"><span class="text-warning">No</span></label>';
				}

				if(id=="listing_available"){
					var radio = '<label class="radio-inline"><input type="radio" name="listing_available" value="1"><span class="text-success">Available</span></label><label class="radio-inline"><input type="radio" name="listing_available" value="2"><span class="text-warning">On hold</span></label><label class="radio-inline"><input type="radio" name="listing_available" value="3"><span class="text-danger">Sold</span></label>';
				}

				if($("#"+id).html() !== radio){
					$("#"+id).html(radio);
				}
				else{
					// alert($('input[name="'+id+'"]:checked').val());
					var value = $('input[name="'+id+'"]:checked').val();
					saveToDB('<?php echo $listing -> getListingId(); ?>', id, value);
					
					if(id=='listing_box' || id=='listing_papers'){
						var text = 'YES';
						if(value=='2'){
							text = 'NO';
						}
					}
					else{
						var text = 'Available';
						if(value=='2'){
							text = 'On hold';
						}
						if(value=='3'){
							text = 'Sold';
						}
					}

					$("#"+id).html(text);
				};
			}
		</script>
		<?php endif; ?>
	</head>

	<body style="">

		<?php include_once("../../lib/analyticsTracking.php"); ?>
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

						if($isLoggedIn){ ?>
						<span id="image-controls" class="col-xs-12 padding-top-2em padding-bottom-1em">
							<div class="col-xs-4 text-center">
								<button class="btn btn-warning btn-sm transition-ease addBtn" onclick="addImg();"><span class="glyphicon glyphicon-plus"></span> Add image</button>
							</div>
						</span>
						<?php
						}
					} ?>
					
			</div>
			
			<!-- DETAILS -->
			<div class="col-sm-7 col-xs-12 clearfix" id="rightDiv">
				<h3 class="text-center"><?php echo $brand . ' ' . $model; ?></h3>
				<p class="text-center text-muted">
					<?php echo $condition.'/10 ('.$new_used.')'; ?>
				</p>
				<h4 class="text-center">
					<span class="text-muted">Price: </span>
					<span class="" <?php if($isLoggedIn): ?> id="listing_price" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);" <?php endif; ?>>$<?php echo $price;?></span>
				</h4>
				<h4 id="listing_available" class="text-center <?php echo $text;?>" onclick="replaceRadio(this.id);"><?php echo $available;?></h4>
				<div class="text-center">
					<button class="btn btn-dark-blue no-rounded-corners transition-ease">
						<a href="mailto:irina@timereflectioninc.com?
						subject=Inquiry for <?php echo $brand . ' ' . $model; ?>&amp;
						body=Hi, %0D%0A%0D%0AI am interested in this listing. Please contact me with more information.
						%0D%0A%0D%0A
						http://timereflectioninc.com<?php echo $_SERVER['REQUEST_URI']; ?>
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
							<td <?php if($isLoggedIn): ?> id="watch_brand" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingReference(); ?>', this.id, this.innerHTML);" <?php endif; ?>><?php echo $brand; ?></td>
						</tr>
						<tr>
							<td><b>MODEL</b></td>
							<td <?php if($isLoggedIn): ?> id="watch_model" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingReference(); ?>', this.id, this.innerHTML);" <?php endif; ?>><?php echo $model; ?></td>
						</tr>
						<tr>
							<td><b>REFERENCE</b></td>
							<td><?php echo $reference; ?></td>
						</tr>
						<tr>
							<td><b>SKU</b></td>
							<td <?php if($isLoggedIn): ?> id="listing_sku" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);" <?php endif; ?>><?php echo $sku; ?></td>
						</tr>
						<tr>
							<td><b>RETAIL</b></td>
							<td <?php if($isLoggedIn): ?> id="listing_retail" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);" <?php endif; ?>>$<?php echo $retail; ?></td>
						</tr>
						<tr>
							<td><b>MATERIAL</b></td>
							<td <?php if($isLoggedIn): ?> id="watch_material" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingReference(); ?>', this.id, this.innerHTML);" <?php endif; ?>><?php echo $material; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>DIAL</b></td>
							<td <?php if($isLoggedIn): ?> id="listing_dial_xs" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);" <?php endif; ?>><?php echo $dial; ?></td>
						</tr>
						<tr class="visible-xs">
							<td><b>CONDITION</b></td>
							<td <?php if($isLoggedIn): ?> id="listing_condition_xs" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingReference(); ?>', this.id, this.innerHTML);" <?php endif; ?>>
								<span><?php echo $condition;?></span>
								<?php echo '/10 ('.$new_used.')'; ?>
							</td>
						</tr>
						<tr class="visible-xs">
							<td><b>CASE SIZE</b></td>
							<td <?php if($isLoggedIn): ?> id="watch_case_size_xs" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingReference(); ?>', this.id, this.innerHTML);" <?php endif; ?>><?php echo $caseSize.'mm'; ?></td>
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
							<td <?php if($isLoggedIn): ?> id="listing_notes_xs" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);" <?php endif; ?>><?php echo $notes; ?></td>
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
							<td <?php if($isLoggedIn): ?> id="listing_dial" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);" <?php endif; ?>><?php echo $dial; ?></td>
						</tr>
						<tr>
							<td><b>CONDITION</b></td>
							<td id="listing_condition">
								<span <?php if($isLoggedIn): ?> class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', 'listing_condition', this.innerHTML);" <?php endif; ?>><?php echo $condition;?></span>/10
								(<span <?php if($isLoggedIn): ?> class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', 'listing_new_used', this.innerHTML);" <?php endif; ?>><?php echo $new_used; ?></span>)
							</td>
						</tr>
						<tr>
							<td><b>CASE SIZE</b></td>
							<td <?php if($isLoggedIn): ?> id="watch_case_size" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingReference(); ?>', this.id, this.innerHTML);" <?php endif; ?>><?php echo $caseSize.'mm'; ?></td>
						</tr>

						<tr>
							<td><b>BOX</b></td>
							<td id="listing_box" class="transition-ease" onclick="replaceRadio(this.id);"><?php echo $box; ?></td>
						</tr>
						<tr>
							<td><b>PAPERS</b></td>
							<td id="listing_papers" class="transition-ease" onclick="replaceRadio(this.id);"><?php echo $papers; ?></td>
						</tr>
						<tr>
							<td><b>NOTES</b></td>
							<td <?php if($isLoggedIn): ?> id="listing_notes" class="transition-ease" contenteditable="true" onBlur="saveToDB('<?php echo $listing -> getListingId(); ?>', this.id, this.innerHTML);" <?php endif; ?>><?php echo $notes; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<? if($isLoggedIn): ?>

		<!-- Admin-only info -->
		<div class="container background-white margin-top-2em margin-bottom-2em padding-top-1em padding-bottom-1em">
			<div class="col-sm-6 col-xs-12 background-white">
				<h3 class="">ADDITIONAL DETAILS</h3>
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
				<a href="/delete/<?php echo $listing->getListingId(); ?>">Delete</a>
			</div>
		</div>

		<?php endif; ?>
		
	</body>
	<?php include ('../views/parts/addImg.part.php'); ?>
</html>