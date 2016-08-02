<!DOCTYPE html>
<html>
	<head>
		<?php getHead('Registration'); ?>	
	</head>

	<body>

		<?php getNavbar(); ?>
		
		<div class="container form-container login-form-container panel panel-default">
			
			<h1 class="text-center">New account</h1>

			<form  action="register.php" method="POST" style="background-color: white;">

				<hr>

				<!-- Name -->
				<div class="form-group text-center">
					<label for="f_name">First name</label>
					<input name="f_name" class="form-control input-lg" type="text" required>
				</div>

				<!-- Email -->
				<div class="form-group text-center">
					<label for="email">Email</label>
					<input name="email" class="form-control input-lg" type="email" required>
				</div>

				<!-- Password -->
				<div class="form-group text-center">
					<label for="password">Password</label>
					<input name="password" class="form-control input-lg" type="password" required>
				</div>

				<div class="form-group form-inline text-center">
					<input type="submit" name="submit" class="btn btn-success" value="SIGN UP">
					<a href="login.php" class="btn btn-primary margin-left-2em">LOG IN</a>
				</div>

			</form>
		</div>
	</body>
</html>