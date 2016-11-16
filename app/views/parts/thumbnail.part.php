<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
	<div class="thumbnail no-rounded-corners myThumb">
		<p style="padding-left: 0.5em; padding-right: 0.5em"class="text-center padding-top-1em"><?php echo strtoupper($model); ?></p>
		<!-- <?php echo $break; ?> -->
		<hr>
		<a href="/details/<?php echo $listing_id; ?>">
			<img src="<?php echo $imgSrc; ?>">
		</a>
		<!-- <hr> -->
		<br>
		<div id="details" class="padding-left-1em">
			<p><b>Brand:</b> <?php echo $brand; ?></p>
			<p><b>Model:</b> <?php echo $model; ?></p>
			<p><b>Ref #:</b> <?php echo $ref; ?></p>
			<!-- <p class="text-center"><?php echo $new_used ?>&nbsp(<?php echo $condition . '/10'; ?>)</p> -->
			<!-- <br> -->
			<p><b>SKU #:</b> <?php echo $sku; ?></p>
			<p><b>Retail:</b> $<?php echo $retail; ?></p>
			<p><b>Material:</b> <?php echo $material; ?></p>
			<p><b>Dial:</b> <?php echo $dial; ?></p>
			<p><b>Case size:</b> <?php echo $caseSize . 'mm'; ?></p>
			<p><b>Condition:</b> <?php echo $condition.'/10 ('.$new_used.')'; ?></p>
			<p><b>Box: </b> <?php echo $box; ?></p>
			<p><b>Papers: </b> <?php echo $papers; ?></p>
			<p><b>Notes:</b> <?php echo $notes; ?></p>
			<!-- <p class="text-center"><span class="text-muted">Retail: </span><b>$<?php echo $retail; ?></b></p> -->
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<p class="text-center <?php echo $text; ?> "><?php echo $available; ?></p>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<p class="text-center"><b>$<?php echo $price; ?></b></p>
			</div>
		</div>
	</div>
</div>