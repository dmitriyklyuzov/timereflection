<!DOCTYPE html>
<html>
	<head>
		<?php getHead('Registration'); ?>
		<script type="text/javascript" src="public/js/register.js"></script>
		<script type="text/javascript" src="public/js/modal.js"></script>
	</head>

	<body>

<<<<<<< HEAD
		<?php include_once("../../lib/analyticsTracking.php"); ?>
=======
>>>>>>> 5b04f4f961e8c26c386ef6d08a023e035f5fb694
		<?php getNavbar(); ?>

		<div class="container login-form-container">

			<div class="error" id="errorDiv" style="display: none">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h5 class="text-center">ERROR</h5>
						<p class="text-center" id="errorText"></p>
					</div>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="text-center">New account</h2>
				</div>
				<div class="panel-body">
					<form action="register" method="POST" style="background-color: white;" onsubmit="event.preventDefault(); register()">

						<!-- Name -->
						<div class="form-group text-center">
							<div class="input-group">
								<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
								<input name="f_name" id="f_name" class="form-control input-lg" type="text" placeholder="First name" autofocus required>
							</div>
						</div>

						<!-- Email -->
						<div class="form-group text-center">
							<div class="input-group">
								<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
								<input name="email" id="email" class="form-control input-lg" type="email" placeholder="Email" required>
							</div>
						</div>

						<!-- Password -->
						<div class="form-group text-center">
							<div class="input-group">
								<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
								<input name="password" id="password" class="form-control input-lg" type="password" placeholder="Password" required>
							</div>
						</div>

						<div class="form-group form-inline text-center">
							<input type="submit" name="submit" class="btn btn-success" value="SIGN UP">
							<!-- <a href="login.php" class="btn btn-primary margin-left-2em">LOG IN</a> -->
							<!-- <span class="btn btn-success"  onclick="showModal()">Hello</span> -->
						</div>

					</form>
				</div>
			</div>
		</div>

		<div class="registration-confirmation">

			<div class="modal fade" id="myModal" role="dialog">
				<div class="vertical-alignment-helper">
					<div class="modal-dialog vertical-align-center">
						<div class="modal-content">
							
							<div class="modal-header">
								<h1 class="modal-title text-center">Great!</h1>
							</div>

							<div class="modal-body">
								<h1 class="text-center"><span class="glyphicon glyphicon-ok text-success"></span></h1>
								<br>
								<p class="text-center">Your account has been created.</p>
							</div>

							<div class="modal-footer">
								<a href="login" class="btn btn-success">LOG IN</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>