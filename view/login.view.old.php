		<div class="container form-container login-form-container panel panel-default">
			
			<h1 class="text-center">Log in</h1>

			<form  action="login.php" method="POST" style="background-color: white;">

				<hr>

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