<!DOCTYPE html>
<html>
	<head>
		<?php getHead($search . ' - results'); ?>
	</head>
	<body>
		
		<?php include_once("../../lib/analyticsTracking.php"); ?>
		<?php getNavbar(); ?>

		<div class="container padding-top-2em">
			
			<?php  include ('../views/parts/brandsAndModels.part.php'); ?>

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