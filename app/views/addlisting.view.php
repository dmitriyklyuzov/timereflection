<!DOCTYPE html>
<html>
	<head>
		<?php getHead('New item'); ?>
		<script type="text/javascript" src="public/js/checkWatch.js"></script>
		<script type="text/javascript" src="public/js/getListingForm.js"></script>
		<script type="text/javascript" src="public/js/incrementRef.js"></script>
		<script type="text/javascript" src="public/js/modal.js"></script>
		<script type="text/javascript" src="public/js/uploadImg.js"></script>

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
		<script>
			function getFileName(){
				$('#filename').text($('#fileToUpload').val());
			}
		</script>
		<script>
			$('#fileToUpload').change(getFileName());
		</script>
		<script>
			function successClass(){
				$('#clickBtn').toggleClass('btn-info btn-success');
			}
		</script>
	</head>

	<body>

		<?php getNavbar(); ?>
		
		<div class="container details-container background-white">

			<!-- IMAGE -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-top-2em background-white">
				<div class="row">
					<div class="col-lg-12 padding-top-1em background-white clearfix">
						<div class="well" style="">
							<form class="text-center" action="test" method="POST" enctype="multipart/form-data">
								<!-- <input type="file" class="input-md" name="fileToUpload" id="fileToUpload" style="display:none"> -->
								<input type="file" onchange="uploadImg()" name="fileToUpload" id="fileToUpload" style="display: none;">
							</form>
							<div class="text-center">
								<button class="btn btn-md btn-info" id="clickBtn" onclick="clickUpload();">Upload an image <span class="glyphicon glyphicon-camera"></span></button>
								<br>
								<br>
								<br>
								<button class="btn btn-md btn-warning" id="clickBtn1" onclick="successClass();">Get filename <span class="glyphicon glyphicon-user"></span></button>
								<p id="filename"></p>
							</div>
						</div>
						<!-- <img src="public/img/watches/rolex-daytona-2.jpg" class="img-responsive" alt="IWC"> -->
					</div>	
				</div> <!-- row -->
			</div>

			
			<!-- DETAILS -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
				<div class="background-white clearfix">
					<div class="padding-top-1em">
						<h3 class="text-center">New listing</h3>

						<table class="table">
							<thead></thead>
							<tbody>
								<tr>
									<td><b>REFERENCE</b></td>
									<td>
										<form id="referenceForm" action="add" method="GET" style="background-color: white;" onsubmit="event.preventDefault(); checkWatch();">
											<div class="input-group">
												<input name="ref" class="form-control input-md" id="ref" type="text" placeholder="Reference #" autofocus autocomplete="off">
												<span class="input-group-btn">
													<input type="submit" name="submit" class="btn btn-success btn-md" value="Check">
												</span>
											</div>

										</form>
									</td>
								</tr>

								<form id="listing-details" action="add" method="POST" style="background-color: white;">

								<tr>
									<td><b>BRAND</b></td>
									<td>
										<input name="brand" id="brand-input" class="form-control" type="text">
									</td>
								</tr>
								<tr>
									<td><b>MODEL</b></td>
									<td><input name="model" id="model-input" class="form-control" type="text"></td>
								</tr>
								<tr>
									<td><b>SKU</b></td>
									<td><input name="sku" class="form-control" type="text"></td>
								</tr>
								<tr>
									<td><b>MATERIAL</b></td>
									<td><input name="material" id="material-input" class="form-control" type="text"></td>
								</tr>
								<tr>
									<td><b>DIAL</b></td>
									<td><input name="dial" id="dial-input" class="form-control" type="text"></td>
								</tr>
								<tr>
									<td><b>BOX</b></td>
									<td>
										<div class="form-group text-center" style="padding: 0em; margin-bottom: 0em">
											<label class="radio-inline">
												<input type="radio" name="box" value="1" >Yes
											</label>
											<label class="radio-inline">
												<input type="radio" name="box" value="2" checked>No
											</label>
										</div>
									</td>
								</tr>
								<tr>
									<td><b>PAPERS</b></td>
									<td>
										<div class="form-group text-center" style="padding: 0em; margin-bottom: 0em">
											<label class="radio-inline">
												<input type="radio" name="papers" value="1" >Yes
											</label>
											<label class="radio-inline">
												<input type="radio" name="papers" value="2" checked>No
											</label>
										</div>
									</td>
								</tr>
								<tr>
									<td><b>NEW / USED</b></td>
									<td>
										<div class="form-group text-center" style="padding: 0em; margin-bottom: 0em">
											<label class="radio-inline">
												<input type="radio" name="new_used" value="1" >New
											</label>
											<label class="radio-inline">
												<input type="radio" name="new_used" value="2" checked>Used
											</label>
										</div>
									</td>
								</tr>
								<tr>
									<td><b>CONDITION</b></td>
									<td>
										<div class="input-group">
											<input name="condition" class="form-control" type="number">
											<div class="input-group-addon">/10</div>
										</div>
									</td>
								</tr>
								<tr>
									<td><b>OUR COST</b></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input name="cost" class="form-control" type="text">
										</div>
									</td>
								</tr>
								<tr>
									<td><b>RETAIL PRICE</b></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input name="retail" id="retail-input" value="" class="form-control" type="text">
											<!-- <input name="material" id="material-input" value="" class="form-control" type="text"> -->
										</div>
									</td>
								</tr>
								<tr>
									<td><b>MY PRICE</b></td>
									<td>
										<div class="input-group">
											<div class="input-group-addon">$</div>
											<input name="price" value="" class="form-control" type="text">
											<!-- <input name="material" id="material-input" value="" class="form-control" type="text"> -->
										</div>
									</td>
								</tr>
								<tr>
									<td><b>NOTES</b></td>
									<td><textarea name="notes" class="form-control" cols="30" rows="2" form="listing-details"></textarea></td>
								</tr>
								<tr>
									<td><b>STATUS</b></td>
									<td>
										<div class="form-group text-center" style="padding: 0em; margin-bottom: 0em">					
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
									</td>
								</tr>
							</tbody>

						</table>
								<div class="form-group text-center">
									<input name="ref" id="ref-input" class="form-control" type="text" style="display: none;">
									<input type="submit" name="submit" class="btn btn-success" value="Add listing">
								</div>

								</form>

					</div>
					
				</div>
			</div>
		</div>

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