<!DOCTYPE html>
<html>
	<head>
		<?php getHead('New item'); ?>
	</head>

	<body>

		<?php getNavbar(); ?>
		
		<div class="container add-listing-form-container">

			<?php include('parts/debug.part.php');?>
			<?php include('parts/error.part.php');?>

			<div class="main-content">
				<div class="panel panel-default">
					<div class="panel-heading">
						<!-- <h2 class="text-center">Add new listing</h2> -->
						<h4 class="text-center">Is this the watch you want to list?</h4>
					</div>
				
					<div class="panel-body">

						<ul>
							<!-- <b><?php echo $brand . ' ' . $model; ?></b> -->
							<h4>Rolex Submariner Date</h4>
							<p>Reference: 16610</p>
							<p>Material: Ceramic</p>
							<p>Retail: $6000</p>
							
						</ul>

					</div>

					<div class="panel-footer">
						<div class="form-group form-inline text-center">
							<a href="add/<?php echo $ref; ?>" class="btn btn-success">YES</a>
							<a href="add" class="btn btn-danger">NO</a>
						</div>
					</div>

				</div>
			</div>
			
		</div>
	</body>
</html>