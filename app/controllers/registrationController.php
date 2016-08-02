<?php

	session_start();
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');

	$user = new User();

	if($user -> isLoggedIn()){
		header('Location: index');
	}

	if(isset($_POST['submit'])){

		debugMsg('OK: submit was pressed.');

		if( isset($_POST['f_name']) && isset($_POST['email']) && isset($_POST['password']) ){

			debugMsg('OK: POST variables are set.');

			if( $_POST['f_name'] && $_POST['email'] && $_POST['password'] ){

				debugMsg('OK: POST variables exist and =! "" ');

				$name = sanitize($_POST['f_name']);
				$email = sanitize($_POST['email']);
				$password = sanitize($_POST['password']);

				$name = stripFormChars($name);
				$email = stripFormChars($email);
				$password = genPass(stripFormChars($password), $email);

				debugMsg('First name: ' . $name);
				debugMsg('Email: ' . $email);
				debugMsg('Password: ' . $password);

				if ($name!='' && $email!='' && $password!=''){

					if( $name && $email && $password){

						debugMsg('OK: No error.');

						$conn = DB();

						if ($conn){
							debugMsg('OK: Connection successful.');

							$result = $user -> findEmail($email);

							if($result -> fetch_assoc()){
								$errorMsg = 'This email already exists.';
								$conn -> close();
								debugMsg('Connection closed.');
								include ('../views/register.view.php');
							}
							else{
								debugMsg('This email doesnt yet exist.');

								$user -> create($name, $email, $password);

								$user -> setEmail($email);

								$user -> setRegDate();

								$result = $user -> findEmail($email);

								if($result -> fetch_assoc()){
									// The account was created
									$msg = 'GREAT!';
									$glyphicon = 'glyphicon glyphicon-ok text-success';
									$text = '<p>Your account has been created.</p>';
									// <p>Please check your email for an activation link.</p>';
									$link = 'login.php';
									$btn = 'LOG IN';
								}
								else{
									// The account was not created
									$msg = 'OH NO! :(';
									$glyphicon = 'glyphicon glyphicon-remove text-danger';
									$text = '<p>Something went wrong.</p><p>Please contact your website administrator.</p>';
									$link = 'register.php';
									$btn = 'SIGN UP';
								}
								include('../views/registrationconfirmation.view.php');

								$conn->close();

								// mysqli_close($conn);
								debugMsg('Connection closed.<br>');
							}

						}
						else{
							$errorMsg = 'Something went wrong. Please try again.';
							debugMsg('WARNING: Connection failed.');
							include ('../views/register.view.php');
						}
					}
					else{
						debugMsg('WARNING: !f_name or !email or !password');
						$errorMsg = "Please check the information entered and try again.";
						include ('../views/register.view.php');
					}
				}
				else{
					$errorMsg = 'All fields are required. Please try again.';
					debugMsg('WARNING: Connection failed.');
					include ('../views/register.view.php');
				}

			}
			else{
				debugMsg('WARNING: One or both fields were left blank.');
				$errorMsg = 'All fields are required. Please try again.';
				include ('../views/login.view.php');
			}
		}
		else{
			$errorMsg = 'Something went wrong. Please try again.';
			debugMsg('WARNING: One of the variables is not set.');
			include ('../views/register.view.php');
		}
	}

	else include('../views/register.view.php');

?>