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

			<div class="panel panel-default">
				<div class="panel-heading"><h2 class="text-center">Add new listing</h2></div>
			
			
				<div class="panel-body">
					<form  action="add" method="POST" style="background-color: white;">

						<!-- Brand -->
						<div class="form-group">
							<label for="brand">Brand</label>
							<input name="brand" class="form-control" type="text" autofocus>
						</div>

						<!-- Model -->
						<div class="form-group">
							<label for="model">Model</label>
							<input name="model" class="form-control" type="text">
						</div>

						<!-- Ref # -->
						<div class="form-group">
							<label for="ref">Reference #</label>
							<input name="ref" class="form-control" type="text">
						</div>

						<!-- Material -->
						<div class="form-group">
							<label for="material">Material</label>
							<input name="material" class="form-control" type="text">
						</div>

						<!-- Condition -->
						<div class="form-group">
							<label for="condition">Condition</label>
							<div class="input-group">
								<input name="condition" class="form-control" type="number">
								<div class="input-group-addon">/10</div>
							</div>
						</div>

						<!-- New/Used -->
						<div class="form-group">
							<label for="new_used">New/Used</label>
							<select name="new_used" class="form-control">
								<option value="1">New</option>
								<option value="2">Used</option>
							</select>
						</div>

						<!-- Notes -->
						<div class="form-group">
							<label for="notes">Notes</label>
							<input name="notes" class="form-control" type="textarea">
						</div>

						<!-- SKU -->
						<div class="form-group">
							<label for="sku">SKU</label>
							<input name="sku" class="form-control" type="text">
						</div>
						
						<!-- Retail -->
						<div class="form-group">
							<label for="retail">Retail price</label>
							<div class="input-group">
								<div class="input-group-addon">$</div>
								<input name="retail" class="form-control" type="number">
							</div>
						</div>

						<!-- Price -->
						<div class="form-group">
							<label for="price">My price</label>
							<div class="input-group">
								<div class="input-group-addon">$</div>
								<input name="price" class="form-control" type="number">
							</div>
						</div>

						<!-- Available -->
						<div class="form-group text-center">					
							<label class="radio-inline">
								<input type="radio" name="availability" value="1" checked ><span class="text-success">Available</span>
							</label>
							<label class="radio-inline">
								<input type="radio" name="availability" value="2"><span class="text-warning">On hold</span>
							</label>
							<label class="radio-inline">
								<input type="radio" name="availability" value="3"><span class="text-danger">Sold</span>
							</label>
						</div>

						<div class="form-group text-center">
							<input type="submit" name="submit" class="btn btn-success" value="Add listing">
						</div>

					</form>	
				</div>

			</div>
			
		</div>
	</body>
</html>