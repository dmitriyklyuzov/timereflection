<!DOCTYPE html>
<html>
	<head>
		<?php getHead('New item'); ?>
		<script type="text/javascript" src="public/js/checkWatch.js"></script>
		<script type="text/javascript" src="public/js/getListingForm.js"></script>
		<script type="text/javascript" src="public/js/modal.js"></script>
	</head>

	<body>

		<?php getNavbar(); ?>
		
		<div class="container add-listing-form-container">

			<?php include('parts/debug.part.php');?>
			<?php include('parts/error.part.php');?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<!-- <h2 class="text-center">Add new listing</h2> -->
					<h4 class="text-center">First, enter watch reference number</h4>
				</div>
						
				<div class="panel-body">
					<form action="add" method="GET" style="background-color: white;" onsubmit="event.preventDefault(); checkWatch()">

						<div class="input-group">
							<input name="ref" class="form-control input-lg" id="ref" type="text" placeholder="Reference #" autofocus autocomplete="off">
							<span class="input-group-btn">
								<input type="submit" name="submit" class="btn btn-success btn-lg" value="Check">
								<!-- <button class="btn btn-success btn-lg" type="button" onclick="checkWatch()">Check</button> -->
							</span>
						</div>

					</form>
				</div>

			</div>

			<!-- <button type="button" class="btn btn-lg btn-success" onclick="modal()">Modal</button> -->

			<div id="content">
			</div>

			<div class="panel panel-default" id="listing-details-panel">
				<div class="panel-heading">
					<h4 class="text-center">Please fill out the rest</h4>
				</div>

				<div class="panel-body">
					<span id="listing-details-form">
								
						<form id="listing-details" action="add" method="POST" style="background-color: white;">

							<!-- New/Used -->
							<div class="form-group text-center">
								<label class="radio-inline">
									<input type="radio" name="new_used" value="1" ><span class="text-success">New</span>
								</label>
								<label class="radio-inline">
									<input type="radio" name="new_used" value="2" checked><span class="text-warning">Used</span>
								</label>
							</div>

							<!-- Brand -->
							<div class="form-group">
								<label for="brand">Brand</label>
								<input name="brand" id="brand-input" class="form-control" type="text">
							</div>

							<!-- Model -->
							<div class="form-group">
								<label for="model">Model</label>
								<input name="model" id="model-input" class="form-control" type="text">
							</div>

							<!-- Ref # -->
							<div class="form-group" style="display: block">
								<label for="ref">Reference #</label>
								<input name="ref" id="ref-input" class="form-control" type="text">
							</div>

							<!-- SKU -->
							<div class="form-group">
								<label for="sku">SKU</label>
								<input name="sku" class="form-control" type="text">
							</div>

							<!-- Material -->
							<div class="form-group">
								<label for="material">Material</label>
								<input name="material" id="material-input" class="form-control" type="text">
							</div>

							<!-- Condition -->
							<div class="form-group">
								<label for="condition">Condition</label>
								<div class="input-group">
									<input name="condition" class="form-control" type="number">
									<div class="input-group-addon">/10</div>
								</div>
							</div>

							<!-- Our cost -->
							<div class="form-group">
								<label for="cost">Our cost</label>
								<div class="input-group">
									<div class="input-group-addon">$</div>
									<input name="cost" class="form-control" type="text">
								</div>
							</div>

							<!-- Retail -->
							<div class="form-group">
								<label for="retail">Retail price</label>
								<div class="input-group">
									<div class="input-group-addon">$</div>
									<input name="retail" id="retail-input" value="" class="form-control" type="text">
									<!-- <input name="material" id="material-input" value="" class="form-control" type="text"> -->
								</div>
							</div>

							<!-- Price -->
							<div class="form-group">
								<label for="price">My price</label>
								<div class="input-group">
									<div class="input-group-addon">$</div>
									<input name="price" class="form-control" type="text">
								</div>
							</div>

							<!-- Notes -->
							<div class="form-group">
								<label for="notes">Notes</label>
								<textarea name="notes" class="form-control" cols="30" rows="2" form="listing-details"></textarea>
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

						
					</span>
				</div>

				<div class="panel-footer">
					<div class="form-group text-center">
						<input type="submit" name="submit" class="btn btn-success" value="Add listing">
					</div>
				</div>

				</form>
			</div>
			
		</div>

			<div class="listing-confirmation">

				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							
							<div class="modal-header">
								<h1 class="modal-title text-center">Great!</h1>
							</div>

							<div class="modal-body">
								<h1 class="text-center"><span class="glyphicon glyphicon-ok text-success"></span></h1>
								<br>
								<p class="text-center">You listed a watch!</p>
							</div>

							<div class="modal-footer">
								<span class="text-center"><button type="button" class="btn btn-success">See the listing</button></span>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>