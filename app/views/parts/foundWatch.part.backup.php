<div class="modal fade" id="foundListingModal" role="dialog">
	<div class="vertical-align-helper">
		<div class="modal-dialog vertical-align-center">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="text-center" id="panel-heading-text">Is this the watch you want to list?</h4>
				</div>

				<div class="modal-body">
					<ul>
						<h4><?php echo $brand . ' ' . $model; ?></h4>
						<p>Reference: <?php echo $ref; ?></p>
						<p>Material: <?php echo $material; ?></p>
						<p>Dial: <?php echo $dial; ?></p>
						<p>Retail: $<?php echo $retail; ?></p>
					</ul>
				</div>

				<div class="modal-footer">
					<div class="form-group form-inline text-center">
						<button class="btn btn-success" type="button" data-dismiss="modal" onclick="getListingForm(
						'<?php echo $ref ?>',
						'<?php echo $brand ?>',
						'<?php echo $model ?>',
						'<?php echo $material ?>',
						'<?php echo $dial ?>',
						'<?php echo $retail ?>')">YES</button>
						<a href="add" class="btn btn-danger margin-left-2em" data-dismiss="modal">NO</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>