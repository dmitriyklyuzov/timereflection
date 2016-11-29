<div class="col-md-3 col-sm-4" id="navbox-div">
	<div class="panel panel-default" id="navbox-left">
		<div class="panel-body">
			<ul class="padding-left-0em">
				<h4 class="text-center padding-bottom-1em padding-top-1em text-danger">WATCH BRANDS</h4>
				<?php $r = Watch::getBrandList(); ?>
				<?php while($row = $r -> fetch_assoc()): 
						$brand_name = str_replace(" ", "_", $row['watch_brand']);
						$brand_name_underscore = str_replace(" ", "_", $row['watch_brand']); ?>
					
					<li style="cursor: pointer;">

						<!-- GLYPHICON -->
						<span id="<?php echo $brand_name?>_glyphicon" class="glyphicon glyphicon-triangle-right padding-left-1em noselect" onclick="expandList('<?php echo $brand_name_underscore ?>_models', '<?php echo $brand_name_underscore ?>_glyphicon');"></span>

						<!-- BRAND NAME -->
						<h4 class="watch_brand noselect" onclick="expandList('<?php echo $brand_name_underscore ?>_models', '<?php echo $brand_name_underscore ?>_glyphicon');">
							<?php echo ucwords(strtolower($row['watch_brand'])); ?>
						</h4>
						
						<!-- MODEL LIST -->
						<ul style="display: none;" class="<?php echo $brand_name_underscore ?>_models">

							<?php 
							// Get count of all listings for this brand
							$count = Listing::getListingCount($row['watch_brand'], '0'); ?>

							<!-- VIEW ALL LINK -->
							<p style="size: 1em;" class="padding-left-1em">
								<a href="/brands/<?php echo $brand_name; ?>">
									<!-- <b>VIEW ALL</b> -->
									<b>VIEW ALL (<?php echo $count; ?>)</b>
								</a>
							</p>
						
							<!-- UNWORN -->
							<?php $r2 = Watch::getModelList($row['watch_brand'], '1');

							// If the resultset is not 0, show the UNWORN results
							if($r2 -> num_rows !== 0):

								$count = Listing::getListingCount($row['watch_brand'], '1'); ?>

								<p style="size: 1em;" class="noselect padding-left-1em">
									<b>UNWORN (<?php echo $count; ?>)</b>
								</p>

								<!-- UNWORN MODEL LIST -->
								<ul class="padding-left-2em">

									<?php while($row2 = $r2 -> fetch_assoc()):

										$watch_model = str_replace(' ', '_', $row2['watch_model']); ?>
										
										<!-- MODEL LINK -->
										<a class="watch_model" href="/brands/<?php echo $brand_name; ?>/model/<?php echo $watch_model; ?>">
											<p class="model">
												<b><?php echo strtoupper($row2['watch_model']); ?></b>
											</p>
										</a>

									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						
						
							<!-- PRE-OWNED -->
							<?php $r2 = Watch::getModelList($row['watch_brand'], '2');

							// If the resultset is not 0, show the PRE-OWNED results
							if($r2 -> num_rows !== 0): 

								$count = Listing::getListingCount($row['watch_brand'], '2'); ?>

								<p style="size: 1em;" class="noselect padding-left-1em">
									<b>PRE-OWNED (<?php echo $count; ?>)</b>
								</p>

								<!-- PRE-OWNED MODEL LIST -->
								<ul class="padding-left-2em">
								
									<?php while($row2 = $r2 -> fetch_assoc()):

										$watch_model = str_replace(' ', '_', $row2['watch_model']);?>

										<!-- MODEL LINK -->
										<a class="watch_model" href="/brands/<?php echo $brand_name; ?>/model/<?php echo $watch_model; ?>">
											<p class="model">
												<b><?php echo strtoupper($row2['watch_model']); ?></b>
											</p>
										</a>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</ul>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>