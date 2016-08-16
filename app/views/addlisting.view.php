<!DOCTYPE html>
<html>
	<head>
		<?php getHead('New item'); ?>
		<script type="text/javascript" src="public/js/goToPanel2.js"></script>
		<script type="text/javascript" src="public/js/checkWatch.js"></script>
		<script type="text/javascript" src="public/js/getListingForm.js"></script>
		<script type="text/javascript" src="public/js/incrementRef.js"></script>
		<script type="text/javascript" src="public/js/modal.js"></script>
		<script type="text/javascript" src="public/js/uploadImg.js"></script>
		<script type="text/javascript" src="public/js/listWatch.js"></script>
		<script type="text/javascript" src="public/js/fileinput.js"></script>
		<link rel="stylesheet" type="text/css" href="public/css/fileinput.css">
		<script>
			function showModal(){
				$('#foundWatchModal').modal({backdrop:true});
			}
		</script>
		<script>
			function clickUpload(){
				$('#fileToUpload').click();
			}
		</script>
	</head>

	<body>

		<?php getNavbar(); ?>

		<div class="container add-listing-form-container">

			<!-- = -->
			
			<div class="panel panel-default animated" id="panel1">
				<div class="panel-heading">
					<h3 class="text-center">First, enter the reference #</h3>
				</div>
				<div class="panel-body">
					<form id="referenceForm" action="add" method="GET" style="background-color: white;" onsubmit="event.preventDefault(); checkWatch();">
						<div class="input-group">
							<input name="ref" class="form-control input-lg" id="ref" type="text" placeholder="Reference #" autofocus autocomplete="off">
							<span class="input-group-btn">
								<input type="submit" name="submit" class="btn btn-success btn-lg" value="Next">
							</span>
						</div>

					</form>
				</div>
			</div>

			<div class="panel panel-default animated" id="panel2" style="display: none">
				<div class="panel-heading">
					<h3 class="text-center">Now, fill out the rest</h3>
				</div>

				<div class="panel-body">

					<form id="listing-details" action="add" method="POST" style="background-color: white;" onsubmit="event.preventDefault(); listWatch();">

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
						<div class="form-group" style="display: none">
							<label for="ref">Reference #</label>
							<input name="ref" id="ref-input" class="form-control" type="text">
						</div>

						<!-- SKU -->
						<div class="form-group">
							<label for="sku">SKU</label>
							<input name="sku" id="sku-input" class="form-control" type="text" value="">
						</div>

						<!-- Material -->
						<div class="form-group">
							<label for="material">Material</label>
							<input name="material" id="material-input" class="form-control" type="text">
						</div>


						<!-- Dial -->
						<div class="form-group">
							<label for="dial">Dial</label>
							<input name="dial" id="dial-input" class="form-control" type="text">
						</div>

						<!-- Condition -->
						<div class="form-group">
							<label for="condition">Condition</label>
							<div class="input-group">
								<input name="condition" id="condition-input" class="form-control" type="number">
								<div class="input-group-addon">/10</div>
							</div>
						</div>

						<!-- Our cost -->
						<div class="form-group">
							<label for="cost">Our cost</label>
							<div class="input-group">
								<div class="input-group-addon">$</div>
								<input name="cost" id="cost-input" class="form-control" type="text">
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
								<input name="price" id="price-input" class="form-control" type="text">
							</div>
						</div>

						<!-- Notes -->
						<div class="form-group">
							<label for="notes">Notes</label>
							<textarea name="notes" id="notes-input" class="form-control" cols="30" rows="2" form="listing-details"></textarea>
						</div>

						<!-- New/Used -->
						<div class="form-group text-center">
							<label class="radio-inline">
								<input type="radio" name="new_used" value="1" ><span class="text-success">New</span>
							</label>
							<label class="radio-inline">
								<input type="radio" name="new_used" value="2" checked><span class="text-warning">Used</span>
							</label>
						</div>

						<!-- Box -->
						<div class="form-group text-center">
							<label class="radio-inline">
								<input type="radio" name="box" value="1" ><span class="text-success">Box</span>
							</label>
							<label class="radio-inline">
								<input type="radio" name="box" value="2" checked><span class="text-warning">No box</span>
							</label>
						</div>

						<!-- Papers -->
						<div class="form-group text-center">
							<label class="radio-inline">
								<input type="radio" name="papers" value="1" ><span class="text-success">Papers</span>
							</label>
							<label class="radio-inline">
								<input type="radio" name="papers" value="2" checked><span class="text-warning">No papers</span>
							</label>
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
							<input type="submit" name="submit" class="btn btn-success" value="Next">
						</div>

					</form>

				</div> <!-- panel-body -->
			
			</div> <!-- panel-default -->

			<div class="panel panel-default animated" id="panel3" style="display: none">
				<div class="panel-heading">
					<h3 class="text-center">Lastly, upload some images</h3>
				</div>
				<div class="panel-body">
					<form action="add" method="POST" enctype="multipart/form-data">
						<label class="control-label">Choose files to upload</label>
						<input type="file" multiple id="img" name="img[]" class="file">
					</form>
				</div>
			</div>

		</div> <!-- add-listing-form-container -->


		<div class="listing-confirmation">

			<div class="modal fade" id="myModal" role="dialog">
				<div class="vertical-alignment-helper">
					<div class="modal-dialog vertical-align-center">
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
		</div> <!-- listing confirmation -->

		<div id="content">

		</div>

	</body>
</html>