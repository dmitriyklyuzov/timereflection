<div class="col-md-3 col-sm-4" id="navbox-div">
	<div class="panel panel-default" id="navbox-left">
		<div class="panel-body">
			<ul class="padding-left-0em">
				<h4 class="text-center padding-bottom-1em padding-top-1em text-danger">WATCH BRANDS</h4>
				<?php $r = Watch::getBrandList(); ?>
				<?php while($row = $r -> fetch_assoc()): 
						// $brand_name = str_replace(" ", "%20", $row['watch_brand']);
						$brand_name = str_replace(" ", "_", $row['watch_brand']);
						$brand_name_underscore = str_replace(" ", "_", $row['watch_brand']); ?>
					<li>
						<!-- <a style="display: inline-block; padding-right: 1em;" href="/brands/<?php echo $brand_name; ?>"> -->
						<span id="<?php echo $brand_name?>_glyphicon" class="glyphicon glyphicon-triangle-right padding-left-1em"></span>
						<a class="watch_brand" style="cursor: pointer;" onclick="event.preventDefault(); expandList('<?php echo $brand_name_underscore ?>_models', '<?php echo $brand_name_underscore ?>_glyphicon');">

							<h4 class="hidden-md hidden-sm noselect">
								<?php echo ucwords(strtolower($row['watch_brand'])); ?>
							</h4>
							<p class="hidden-lg hidden-xs noselect">
								<?php echo ucwords(strtolower($row['watch_brand'])); ?>
							</p>
						</a>

						<?php

						// $r11 = Watch::getModelList('ROLEX', '1');

						// if($r11 -> fetch_assoc()){
						// 	echo 'TRUE';

						// 	while($row22 = $r11 -> fetch_assoc()){
						// 		echo ($row22['watch_model']);
						// 	}
						// }
						// else echo 'FALSE'; ?>

						<ul style="display: ;" class="<?php echo $brand_name_underscore ?>_models">

							<!-- <a style="color: #000" class="watch_model padding-left-1em" href="/brands/<?php echo $brand_name; ?>">
								<p class=""><b>VIEW ALL</b></p>
							</a> -->
							
							<!-- UNWORN -->

							<p style="size: 1em;" class="noselect padding-left-1em"><b>UNWORN</b></p>
							<ul class="padding-left-2em">
								<?php $r2 = Watch::getModelList($row['watch_brand'], '1'); ?>
								<?php while($row2 = $r2 -> fetch_assoc()){
									$watch_model = str_replace(' ', '_', $row2['watch_model']);?>
									<a style="color: #000" class="watch_model" href="/brands/<?php echo $brand_name; ?>/model/<?php echo $watch_model; ?>">
										<p class="model"><b><?php echo ($row2['watch_model']); ?></b></p>
									</a>
								<?php } ?>
							</ul>
							
							<!-- PRE-OWNED -->

							<p style="size: 1em; padding-left: 1em" class="noselect"><b>PRE-OWNED</b></p>
							<ul class="padding-left-2em">
								<?php $r2 = Watch::getModelList($row['watch_brand'], '2'); ?>
								<?php while($row2 = $r2 -> fetch_assoc()){
									$watch_model = str_replace(' ', '_', $row2['watch_model']);?>
									<a style="color: #000" class="watch_model" href="/brands/<?php echo $brand_name; ?>/model/<?php echo $watch_model; ?>">
										<p class="model"><b><?php echo ($row2['watch_model']); ?></b></p>
									</a>
								<?php } ?>
							</ul>

						</ul>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>