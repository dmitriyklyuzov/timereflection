<!DOCTYPE html>
<html>
	<head>
		<?php getHead($brand . ' ' . $model); ?>
		<!-- <script type="text/javascript" src="public/js/login.js"></script> -->
		<!-- <script type="text/javascript" src="public/js/setMainImg.js"></script> -->
		<!-- <script type="text/javascript" src="public/js/setHeight.js"></script> -->
	</head>

	<body style="">
		<?php getNavbar(); ?>

		<div class="container details-container background-white">


			<!-- IMAGE -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-top-2em background-white">
				<div class="row">
					<div class=" padding-top-1em background-white clearfix">
						<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<?php $listing -> getImages(); ?>
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


					</div>
				</div>
			</div>
			
			<!-- DETAILS -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
				<div class=" background-white clearfix">
					<div class="padding-top-1em">
						<h3 class="text-center"><?php echo $brand . ' ' . $model; ?></h3>
						<hr>
						<div class="row padding-bottom-1em">
							<div class="col-xs-6">
								<h4 class="text-muted text-center text-success"><i>$<?php echo $price;?></h4></i>
							</div>
							<div class="col-xs-6">
								<h4 class="text-muted text-center text-success"><?php echo strtoupper($available);?></h4>
							</div>
						</div>
						
 						<table class="table">
							<tbody>
								<!-- <tr>
									<td><b>STATUS</b></td>
									<td contenteditable="true" class="<?php echo $text; ?>"><?php echo strtoupper($available); ?></td>
								</tr> -->
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
								<tr>
									<td><b>DIAL</b></td>
									<td><?php echo 'CHAMP STICK'; ?></td>
								</tr>
								<tr>
									<td><b>CONDITION</b></td>
									<td><?php echo $condition.'/10 ('.$new_used.')'; ?></td>
								</tr>
								<tr>
									<td><b>BOX</b></td>
									<td><?php echo 'NO'; ?></td>
								</tr>
								<tr>
									<td><b>PAPERS</b></td>
									<td><?php echo 'NO'; ?></td>
								</tr>
								<tr>
									<td><b>NOTES</b></td>
									<td contenteditable="true"><?php echo $notes; ?></td>
								</tr>
							</tbody>
						</table>

					</div>
					
				</div>
			</div>
		</div>
		
	</body>
</html>