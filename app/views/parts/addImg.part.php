<!-- inside of details.view.php! -->

<div class="modal fade" id="addImgModal" role="dialog">
	<div class="vertical-alignment-helper">
		<div class="modal-dialog vertical-align-center">
			<div class="modal-content">
				
				<div class="modal-header">
					<h3 class="modal-title text-center">Add images</h3>
					<!-- <span class="glyphicon glyphicon-remove pull-right"></span> -->
				</div>

				<div class="modal-body">
					<form action="/add" method="POST" enctype="multipart/form-data">
						<label class="control-label">Choose files to upload</label>
						<input type="file" multiple id="img" name="img[]" class="file">
						<input style="display: none" type="text" name="listing_id" value="<?php echo $listingId; ?>">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>