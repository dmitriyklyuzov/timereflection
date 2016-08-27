<!DOCTYPE html>
<html>
	<head>
		<?php getHead($search . ' - results'); ?>
	</head>
	<body>
		<?php getNavbar(); ?>

		<div class="container padding-top-2em">
			<div class="col-lg-3 col-md-3">
				<div class="panel panel-default hidden-sm hidden-xs" id="navbox-left">
					<div class="panel-body">
						<ul class="padding-left-0em">
							<?php $r = Watch::getBrandList(); ?>
							<?php while($row = $r -> fetch_assoc()): ?>
								<li>
									<a href="http://localhost:8888/timereflection/brands/<?php echo $row['watch_brand']; ?>">
										<?php echo ucwords(strtolower($row['watch_brand'])); ?>
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-body">
								
								
								Showing results for "<?php echo $search; ?>"
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
				<div class="row multi-columns-row">
					<?php getThumbnails($result); ?>
				</div>
			</div>
		</div>
	</body>
</html>