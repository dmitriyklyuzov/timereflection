<?php 

	session_start();
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');
	include_once('../models/watch.php');
	include_once('../models/listing.php');

?>

<!DOCTYPE html>
<html>
	<head>
		<?php getHead('Admin'); ?>
	</head>
	<body>
		<?php getNavbar(); ?>
		<div class="container margin-top-2em">
			<div class="col-lg-2">
			</div>
			<div class="col-lg-10">
				<div class="row">
					<div class="col-lg-3 col-md-3">
						<div class="thumbnail background-primary">
							<div class="caption clearfix">
								<div class="col-lg-4">
									<h1 style="color: #fff;" class="text-center">#</h1>
								</div>
								<div class="col-lg-8">
									<h4 style="color: #fff; text-align: right"><?php echo Listing::getTotalCount(); ?></h4>
									<b><p style="color: #fff; text-align: right">LISTINGS</p></b>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3">
						<div class="thumbnail background-success">
							<div class="caption clearfix">
								<div class="col-lg-4">
									<h1 style="color: #fff;" class="text-center">
										<span class="glyphicon glyphicon-thumbs-up"></span>
									</h1>
								</div>
								<div class="col-lg-8">
									<h4 style="color: #fff; text-align: right">$<?php echo number_format(Listing::getProfit()); ?></h4>
									<b><p style="color: #fff; text-align: right">PROFIT</p></b>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3">
						<div class="thumbnail background-warning">
							<div class="caption clearfix">
								<div class="col-lg-4">
									<h1 style="color: #fff;" class="text-center">
										<span class="glyphicon glyphicon-shopping-cart"></span>
									</h1>
								</div>
								<div class="col-lg-8">
									<h4 style="color: #fff; text-align: right">$<?php echo number_format(Listing::getTotalPrice()); ?></h4>
									<b><p style="color: #fff; text-align: right">TOTAL PRICE</p></b>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3">
						<div class="thumbnail background-danger">
							<div class="caption clearfix">
								<div class="col-lg-4">
									<h1 style="color: #fff;" class="text-center">
										<span class="fa fa-dollar"></span>
									</h1>
								</div>
								<div class="col-lg-8">
									<h4 style="color: #fff; text-align: right">$<?php echo number_format(Listing::getTotalCost());?></h4>
									<b><p style="color: #fff; text-align: right">TOTAL COST</p></b>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>