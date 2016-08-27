<!DOCTYPE html>
<html>
	<head>
		<?php getHead($brand . ' ' . $model); ?>
		<script type="text/javascript" src="public/js/login.js"></script>
	</head>

	<body>
		<?php getNavbar(); ?>

		<div class="container details-container">


			<!-- IMAGE -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 background-gray">
				<div class="row">
					<div class="col-lg-12 padding-top-1em background-white clearfix">
						<img src="http://localhost:8888/timereflection/public/img/watches/rolex-daytona-2.jpg" class="img-responsive" alt="IWC">
					</div>	
				</div>
				
				<!-- <div class="row margin-top-1em">
					<div class="col-lg-12 padding-top-1em background-white clearfix">
						<p class="text-center">Modify / Delete</p>
					</div>	
				</div> -->
			</div>

			
			<!-- DETAILS -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
				<div class="col-lg-12 background-white clearfix">
					<div class="padding-top-1em">
						<h3 class="text-center"><?php echo $brand . ' ' . $model; ?></h3>
						<div class="col-lg-6">
							<s><i><h2 contenteditable="true" class="text-muted text-center">$<?php echo $retail;?></h2></i></s>
						</div>
						<div class="col-lg-6">
							<i><h2 contenteditable="true" class="text-primary text-center">$<?php echo $price;?></h2></i>	
						</div>
						<!-- <h3 class="text-center">DETAILS</h3> -->
						<br>
						<table class="table">
						<thead></thead>
							<tbody>
								<tr>
									<td><b>STATUS</b></td>
									<td contenteditable="true" class="<?php echo $text; ?>"><?php echo strtoupper($available); ?></td>
								</tr>
								<tr>
									<td><b>BRAND</b></td>
									<td><?php echo $brand; ?></td>
								</tr>
								<tr>
									<td><b>MODEL</b></td>
									<td><?php echo $model; ?></td>
								</tr>
								<tr>
									<td><b>REFERENCE</b></td>
									<td><?php echo $reference; ?></td>
								</tr>
								<tr>
									<td><b>SKU</b></td>
									<td><?php echo $sku; ?></td>
								</tr>
								<tr>
									<td><b>RETAIL</b></td>
									<td>$<?php echo $retail; ?></td>
								</tr>
								<tr>
									<td><b>MATERIAL</b></td>
									<td><?php echo $material; ?></td>
								</tr>
								<tr>
									<td><b>DIAL</b></td>
									<td><?php echo 'CHAMP STICK'; ?></td>
								</tr>
								<tr>
									<td><b>CONDITION</b></td>
									<td><?php echo $condition.'/10 ('.$new_used.')'; ?></td>
								</tr>
								<tr>
									<td><b>BOX</b></td>
									<td><?php echo 'NO'; ?></td>
								</tr>
								<tr>
									<td><b>PAPERS</b></td>
									<td><?php echo 'NO'; ?></td>
								</tr>
								<tr>
									<td><b>NOTES</b></td>
									<td><?php echo $notes; ?></td>
								</tr>
							</tbody>
						</table>

					</div>
					
				</div>
			</div>
		</div>
		
	</body>
</html>