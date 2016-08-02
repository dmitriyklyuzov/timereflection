<!DOCTYPE html>
<html>
	<head>
		<?php getHead('Log in'); ?>	
	</head>

	<body>

		<?php getNavbar(); ?>

		<div class="container login-form-container">
			
			<?php include('parts/debug.part.php');?>
			<?php include('parts/error.part.php');?>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="text-center">Log in</h2>
				</div>
				<div class="panel-body">
					<form action="login" method="POST" style="background-color: white;">

						<!-- Email -->
						<div class="form-group text-center">
							<div class="input-group">
								<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
								<input name="email" class="form-control input-lg" type="email" placeholder="Email" required autofocus>
							</div>
						</div>

						<!-- Password -->
						<div class="form-group text-center">
							<div class="input-group">
								<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
								<input name="password" class="form-control input-lg" type="password" placeholder="Password" required>
							</div>
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