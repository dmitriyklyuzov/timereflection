<div class="col-md-3 col-sm-4" id="navbox-div">
	<div class="panel panel-default" id="navbox-left">
		<div class="panel-body">
			<ul class="padding-left-0em">
				<h4 class="text-center">Watch brands</h4>
				<?php $r = Watch::getBrandList(); ?>
				<?php while($row = $r -> fetch_assoc()): 
						// $brand_name = str_replace(" ", "%20", $row['watch_brand']);
						$brand_name = str_replace(" ", "_", $row['watch_brand']);
						$brand_name_underscore = str_replace(" ", "_", $row['watch_brand']); ?>
					<li>
						<a style="display: inline-block; padding-right: 1em;" href="/brands/<?php echo $brand_name; ?>">
							<h4 class="hidden-md hidden-sm">
								<?php echo ucwords(strtolower($row['watch_brand'])); ?>
							</h4>
							<p class="hidden-lg hidden-xs">
								<?php echo ucwords(strtolower($row['watch_brand'])); ?>
							</p>
						</a>
						<span class="glyphicon glyphicon-triangle-bottom" onclick="expandList('<?php echo $brand_name_underscore ?>_models');"></span>
						<ul style="display: none;" class="<?php echo $brand_name_underscore ?>_models">
							<?php $r2 = Watch::getModelList($row['watch_brand']); ?>
							<?php while($row2 = $r2 -> fetch_assoc()){
								$watch_model = str_replace(' ', '_', $row2['watch_model']);?>
								<a href="/brands/<?php echo $brand_name; ?>/model/<?php echo $watch_model; ?>">
									<p class="model"><?php echo ($row2['watch_model']); ?></p>
								</a>
							<?php } ?>
						</ul>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>

<script>
	function expandList(brandName){
		$('.'+brandName).toggle();
		// $('.'+brandName+'_glyphicon').removeClass('glyphicon-triangle-bottom').addClass('glyphicon-triangle-right');
		// $('.'+brandName+'_glyphicon').addClass('glyphicon-triangle-right');
	}
</script>