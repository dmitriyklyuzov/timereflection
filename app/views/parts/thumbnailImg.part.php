<div id="carouselItem" class="item <?php echo $active; ?>" style=" padding-top: 2em; padding-bottom: 2em">
	<img id="item-image" class="img-responsive text-center" src="/public/img/watches/<?php echo $img;?>" style="margin-left: auto; margin-right: auto;">

		<?php if(User::isLoggedIn()): ?>

		<!-- IMAGE CONTROLS -->

		<script type="text/javascript" src="/public/js/saveToDB.js"></script>
		<script type="text/javascript" src="/public/js/makeMain.js"></script>
		<script type="text/javascript" src="/public/js/deleteImg.js"></script>

		<span id="image-controls" class="col-xs-12 padding-top-2em padding-bottom-1em">
			<div class="col-xs-4 text-center">
				<button class="btn btn-info btn-sm transition-ease makeMainBtn" onclick="makeMainImg(<? echo "'".$this->listing_id."','".$img."'";?>);"><span class="glyphicon glyphicon-star"></span> Make main</button>
			</div>
			<div class="col-xs-4 text-center">
				<button class="btn btn-danger btn-sm transition-ease deleteBtn" onclick="deleteImg(<? echo "'".$this->listing_id."','".$img."'";?>);"><span class="glyphicon glyphicon-remove"></span> Delete img</button>
			</div>
			<div class="col-xs-4 text-center">
				<button class="btn btn-warning btn-sm transition-ease addBtn" onclick="addImg();"><span class="glyphicon glyphicon-plus"></span> Add image</button>
			</div>
		</span>

		<?php endif; ?>
</div>