<!DOCTYPE html>
<html>
	
	<head>
		<?php getHead('Time reflection'); ?>
	</head>

	<body>

		<?php getNavbar(); ?>

		<!-- <div id="my-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
			
			<ol class="carousel-indicators">
				<li data-target="#my-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#my-carousel" data-slide-to="1"></li>
				<li data-target="#my-carousel" data-slide-to="2"></li>
				<li data-target="#my-carousel" data-slide-to="3"></li>
			</ol>

			
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

				
				<a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left hidden-xs" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right hidden-xs" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div> 
		</div> -->

		<div class="container padding-top-4em">
			<div class="main-content">
				<div class="row multi-columns-row">

					<?php getThumbnails(); ?>

				</div>
			</div> <!-- main-content -->
	</body>
</html>