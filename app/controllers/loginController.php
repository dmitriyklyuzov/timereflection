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

	if( isset($_POST['email']) && isset($_POST['password']) ){

		$debugMsg = $debugMsg . 'POST variables are set.<br>';

		// debugMsg('POST variables are set.');

		if($_POST['email'] && $_POST['password'] && $_POST['email']!='' && $_POST['password']!=''){

			$debugMsg = $debugMsg . 'POST variables exist and =! "" <br>';

			$email = sanitize($_POST['email']);
			$password = sanitize($_POST['password']);

			$email = stripFormChars($email);
			$password = genPass(stripFormChars($password), $email);

			$$debugMsg = $debugMsg . 'Email: ' . $email . ', Password: '. $password . '<br>';

			$conn = DB();

			if ($conn){
				
				$debugMsg = $debugMsg . 'OK: Connection successful.<br>';

				$result = $user -> findEmail($email);

				if($row = $result -> fetch_assoc()){

					$debugMsg = $debugMsg . 'OK: Username exists.<br>';

					$user -> setEmail($row['user_email']);
					$user -> setName($row['user_f_name']);

					if($row['user_login_attempts'] < 3){

						$debugMsg = $debugMsg . 'OK: Login attempts are less than 3 - login allowed.<br>';

						if($row['user_password'] == $password){
						
							$user -> setLoggedIn();
							$user -> updateLastLogin();
							$user -> zeroLoginAttempts();
							echo '1';
						}
						else{
							$user -> incrementLoginAttempts();

							$debugMsg = $debugMsg . 'OK: Incremented login attempts.<br>';
							$debugMsg = $debugMsg . 'OK: Login attempts are now ' . $user -> getLoginAttempts() . '<br>';

							if($user -> getLoginAttempts() == 3){
								$debugMsg = $debugMsg . 'ERROR: Login attempts == getMaxLoginAttempts()<br>';
								$errorMsg = "You tried to log in too many times. Please contact your administrator.";
								include ('../views/parts/error.part.php');
								include ('../views/parts/debug.part.php');
							}
							else{
								$debugMsg = $debugMsg . 'OK: Login attempts != getMaxLoginAttempts()<br>';
								$errorMsg = 'Password is incorrect. Please try again.<br>' . (3 - $user -> getLoginAttempts()) . ' login attempts remaining';
								$debugMsg = $debugMsg . 'ERROR: Password does not match.<br>';
								include ('../views/parts/error.part.php');
								include ('../views/parts/debug.part.php');
							}
							// include ('../views/login.view.php');
						}
					}
					else{
						$errorMsg = "You tried to log in too many times. Please contact your administrator.";
						$debugMsg = $debugMsg . 'ERROR: Login attempts are ' . $user -> getLoginAttempts() . '<br>';
						include ('../views/parts/error.part.php');
						include ('../views/parts/debug.part.php');
					}
				}
				else{
					$errorMsg = 'User name or password are incorrect. Try again.';
					$debugMsg = $debugMsg . 'ERROR: Username does not exist!<br>';
					include ('../views/parts/error.part.php');
					include ('../views/parts/debug.part.php');
				}
			}
			else{
				$errorMsg = 'Connection failed';
				$debugMsg = $debugMsg . 'WARNING: Connection failed!<br>';
				include ('../views/parts/error.part.php');
				include ('../views/parts/debug.part.php');
			}
		}
		else{
			
			$errorMsg = 'User name and password are required. Try again.';
			$debugMsg = $debugMsg . 'One or both fields were left blank.<br>';
			include ('../views/parts/error.part.php');
			include ('../views/parts/debug.part.php');
		}
	}

	// else{
	// 	$errorMsg = 'Something went wrong. Please try again.';
	// 	$debugMsg = $debugMsg . 'WARNING: One of the variables is not set!<br>';
	// 	include ('../views/parts/error.part.php');
	// 	include ('../views/parts/debug.part.php');
	// }

	else include('../views/login.view.php');
?>