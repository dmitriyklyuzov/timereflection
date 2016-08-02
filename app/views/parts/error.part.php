<?php if(isset($errorMsg)){ ?>
	<div class="panel panel-danger">
		<div class="panel-heading">
			<h5 class="text-center">ERROR</h5>
			<p class="text-center"><?php echo $errorMsg; $errorMsg=''; ?></p>
		</div>
	</div>
	<?php }
?>