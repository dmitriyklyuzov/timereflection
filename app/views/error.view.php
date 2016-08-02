<!DOCTYPE html>
<html>
	<head>
		<?php getHead('Log in'); ?>	
	</head>

	<body>

		<?php getNavbar(); ?>

		<div class="container login-form-container">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h5 class="text-center">Error</h5>
				</div>
				<div class="panel-body">
					<?php echo $errorMsg; $errorMsg=''; ?>
				</div>
			</div>
		</div>
	</body>
</html>