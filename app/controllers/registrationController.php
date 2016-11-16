<?php

	session_start();
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');

	$user = new User();

	if($user -> isLoggedIn()){
		header('Location: index');
	}

	if( isset($_POST['f_name']) && isset($_POST['email']) && isset($_POST['password']) ){

		// debugMsg('OK: POST variables are set.');

		if( $_POST['f_name'] && $_POST['email'] && $_POST['password'] ){

			// debugMsg('OK: POST variables exist and =! "" ');

			$name = sanitize($_POST['f_name']);
			$email = sanitize($_POST['email']);
			$password = sanitize($_POST['password']);

			$name = stripFormChars($name);
			$email = stripFormChars($email);
			$password = genPass(stripFormChars($password), $email);

			// debugMsg('First name: ' . $name);
			// debugMsg('Email: ' . $email);
			// debugMsg('Password: ' . $password);

			if ($name!='' && $email!='' && $password!=''){

				if( $name && $email && $password){

					// debugMsg('OK: No error.');

					$conn = DB();

					if ($conn){
						// debugMsg('OK: Connection successful.');

						$result = $user -> findEmail($email);

						if($result -> fetch_assoc()){
							$errorMsg = 'This email already exists.';
							echo $errorMsg;
							$conn -> close();
							// debugMsg('Connection closed.');
						}
						else{
							// debugMsg('This email doesnt yet exist.');

							$user -> create($name, $email, $password);

							$user -> setEmail($email);

							$user -> setRegDate();

							$result = $user -> findEmail($email);

							if($result -> fetch_assoc()){
								echo '1';
							}
							else{
								$errorMsg = 'Something went wrong and the account was not created. Please try again or contact your administrator.';
								echo $errorMsg;
							}

							$conn->close();

							// debugMsg('Connection closed.<br>');
						}

					}
					else{
						$errorMsg = 'Something went wrong. Please try again.';
						// debugMsg('WARNING: Connection failed.');
						echo $errorMsg;
					}
				}
				else{
					$errorMsg = "Please check the information entered and try again.";
					echo $errorMsg;
					// debugMsg('WARNING: !f_name or !email or !password');
				}
			}
			else{
				$errorMsg = 'All fields are required. Please try again.';
				echo $errorMsg;
				// debugMsg('WARNING: Connection failed.');
			}

		}
		else{
			// // debugMsg('WARNING: One or both fields were left blank.');
			$errorMsg = 'All fields are required. Please try again.';
			echo $errorMsg;
		}
	}
	else include('../views/register.view.php');

?>