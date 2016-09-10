<!-- inside of watch.part.php! -->

<div class="modal fade" id="foundWatchModal" role="dialog">
	<div class="vertical-alignment-helper">
		<div class="modal-dialog vertical-align-center">
			<div class="modal-content">
				
				<div class="modal-header">
					<h4 class="modal-title text-center">Is this the watch you want to list?</h4>
				</div>

				<div class="modal-body">
					<ul>
						<h4><?php echo $brand . ' ' . $model; ?></h4>
						<p>Reference: <?php echo $ref; ?></p>
						<p>Material: <?php echo $material; ?></p>
						<p>Case size: <?php echo $caseSize . 'mm'; ?></p>
					</ul>
				</div>

				<div class="modal-footer">
					<div class="form-group form-inline text-center">
						<button class="btn btn-success" type="button" data-dismiss="modal" onclick="getListingForm(
						'<?php echo $ref ?>',
						'<?php echo $brand ?>',
						'<?php echo $model ?>',
						'<?php echo $material ?>',
						'<?php echo $caseSize ?>'); goToPanel2();">YES</button>

						<button class="btn btn-danger margin-left-2em" type="button" data-dismiss="modal" onclick="incrementRef(); goToPanel2();">NO</button>
						<!-- <a href="add" class="btn btn-danger margin-left-2em" data-dismiss="modal" onclick="incrementRef()">NO</a> -->
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>