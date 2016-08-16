<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	<div class="thumbnail">
		<p class="text-center padding-top-1em"><?php echo $brand.' '.$model?></p>
		<hr>
		<a href="details-<?php echo $listing_id; ?>">
			<img src="<?php echo $imgSrc; ?>">
		</a>
		<hr>
		<div id="details" class="padding-left-1em">
			<!-- <p><b>Brand:</b> <?php echo $brand; ?></p> -->
			<!-- <p><b>Model:</b> <?php echo $model; ?></p> -->
			<!-- <p><b>Ref #:</b> <?php echo $ref; ?></p> -->
			<p>Retail: <b>$<?php echo number_format($retail); ?></b></p>
			<!-- <p><b>Material:</b> <?php echo $material; ?></p> -->
			<p>Condition: <b><?php echo $condition.'/10 ('.$new_used.')'; ?></b></p>
			<!-- <p><b>Notes:</b> <?php echo $notes; ?></p> -->
			<!-- <p><b>Sku #:</b> <?php echo $sku; ?></p> -->
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<p class="text-center <?php echo $text; ?> "><?php echo $available; ?></p>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<p class="text-center"><b>$<?php echo number_format($price); ?></b></p>
			</div>
		</div>
	</div>
</div>