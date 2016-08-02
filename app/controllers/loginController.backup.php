<?php
	
	session_start();
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');

	$user = new User();

	if(isset($_GET['action'])){
		if($_GET['action']=='logout' && isLoggedIn()){
			session_destroy();
		}
		header('Location: index');
	}

	if($user -> isLoggedIn()){
		header('Location: index');
	}

	if(isset($_POST['submit'])){

		debugMsg('submit was pressed.');

		if( isset($_POST['email']) && isset($_POST['password']) ){

			debugMsg('POST variables are set.');

			if($_POST['email'] && $_POST['password'] && $_POST['email']!='' && $_POST['password']!=''){

				debugMsg('POST variables exist and =! "" ');

				$email = sanitize($_POST['email']);
				$password = sanitize($_POST['password']);

				$email = stripFormChars($email);
				$password = genPass(stripFormChars($password), $email);

				debugMsg('Email: ' . $email . ', Password: '. $password);

				$conn = DB();

				if ($conn){
					
					debugMsg('Connection successful.');

					$result = $user -> findEmail($email);

					if($row = $result -> fetch_assoc()){

						debugMsg('Username exists.');

						$user -> setEmail($row['user_email']);
						$user -> setName($row['user_f_name']);

						if($row['user_login_attempts'] < 3){

							debugMsg('Login attempts are less than 3 - login allowed.');

							if($row['user_password'] == $password){
							
								$user -> setLoggedIn();
								$user -> updateLastLogin();
								$user -> zeroLoginAttempts();

								header('Location: index');
							}
							else{
								$user -> incrementLoginAttempts();

								debugMsg('Incremented login attempts.');
								debugMsg('Login attempts are now ' . $user -> getLoginAttempts());

								if($user -> getLoginAttempts() == 3){
									debugMsg('Login attempts == getMaxLoginAttempts()');
									$errorMsg = "You tried to log in too many times. Please contact your administrator.";
								}
								else{
									debugMsg('Login attempts != getMaxLoginAttempts()');
									$errorMsg = 'Password is incorrect. Please try again.<br>' . (3 - $user -> getLoginAttempts()) . ' login attempts remaining';
									debugMsg('Password does not match.');
								}

								include ('../views/login.view.php');
							}
						}
						else{
							debugMsg('Login attempts are ' . $user -> getLoginAttempts());
							$errorMsg = "You tried to log in too many times. Please contact your administrator.";
							include ('../views/login.view.php');
						}
					}
					else{
						$errorMsg = 'User name or password are incorrect. Try again.';
						debugMsg('Username does not exist!');
						include ('../views/login.view.php');
					}
				}
				else{
					$errorMsg = 'Connection failed';
					debugMsg('WARNING: Connection failed!');
					include ('../views/login.view.php');
				}
			}
			else{
				debugMsg('One or both fields were left blank.');
				$errorMsg = 'User name and password are required. Try again.';
				include ('../views/login.view.php');
			}
		}

		else{
			$errorMsg = 'Something went wrong. Please try again.';
			debugMsg('WARNING: One of the variables is not set!');
			include ('../views/login.view.php');
		}
	}

	else include('../views/login.view.php');
?>