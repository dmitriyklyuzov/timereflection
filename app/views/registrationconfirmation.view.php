<!DOCTYPE html>
<html>
	<?php getHead('Registration'); ?>	

	<body>

		<?php getNavbar(); ?>
		
		<div class="container confirmation text-center login-form-container">
			
			<h1><?php echo $msg; ?></h1>
			<hr>
			
			<h1><span class="<?php echo $glyphicon; ?>"></span></h1>

			<br>

			<?php echo $text; ?>

			<br>
			<div class="form-group form-inline text-center">
				<a href="<?php echo $link; ?>" class="btn btn-success"><?php echo $btn; ?></a>
			</div>


		</div>
	</body>
</html>