<!DOCTYPE html>
<html>
	
	<head>
		<?php getHead('Time reflection'); ?>
	</head>

	<body>

		<?php getNavbar(); ?>

	 <div id="my-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
			
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
							<a href="http://localhost:8888/timereflection/brands/IWC" class="transition-ease">BROWSE IWC</a>
						</div>
					</div>
				</div>

				<div class="item" id="item-2">
					<div class="carousel-caption">
						<div class="shop-button">
							<a href="http://localhost:8888/timereflection/brands/ROLEX" class="transition-ease">BROWSE ROLEX</a>
						</div>
					</div>
				</div>

				<div class="item" id="item-3">
					<div class="carousel-caption">
						<div class="shop-button">
							<a href="http://localhost:8888/timereflection/brands/AP" class="transition-ease">BROWSE AUDEMARS PIGUET</a>
						</div>
					</div>
				</div>

				<div class="item" id="item-4">
					<div class="carousel-caption">
						<div class="shop-button">
							<a href="Patek" class="transition-ease">BROWSE PATEK PHILIPPE</a>
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
		</div>

		<div class="container padding-top-4em">
			<div class="col-sm-3">
				<div class="panel panel-default" id="navbox-left">
					<div class="panel-body">
						<ul class="padding-left-0em">
							<?php $r = Watch::getBrandList(); ?>
							<?php while($row = $r -> fetch_assoc()): 
									$brand_name = str_replace(" ", "%20", $row['watch_brand']);?>
								<li>
									<a href="http://localhost:8888/timereflection/brands/<?php echo $brand_name; ?>">
										<?php echo ucwords(strtolower($row['watch_brand'])); ?>
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-sm-9">
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="btn-group" style="float:right">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by <span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li><a href="">Date added</a></li>
										<li><a href="">Price</a></li>
									</ul>
								</div>
								<button class="btn btn-default" style="float:right; margin-right: 1em">
									<span class="glyphicon glyphicon-sort"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="main-content">
					<div class="row multi-columns-row">

						<?php getThumbnails(); ?>

					</div>
				</div> <!-- main-content -->
			</div>
		</div>
	</body>
</html>