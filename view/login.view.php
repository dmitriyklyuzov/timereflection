<!DOCTYPE html>
<html>
	<head>
		<?php getHead('Log in'); ?>	
	</head>

	<body>

		<?php getNavbar(); ?>

		<div class="container login-form-container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="text-center">Log in</h2>
				</div>
				<div class="panel-body">
					<form  action="login.php" method="POST" style="background-color: white;">

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
							<input type="submit" name="submit" class="btn btn-success" value="LOG IN">
							<a href="register.php" class="btn btn-primary margin-left-2em">SIGN UP</a>
						</div>

					</form>
				</div>
			</div>
		</div>
	</body>
</html>