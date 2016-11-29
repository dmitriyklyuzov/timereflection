<?php
	
	include_once('../../lib/dependencies.php');
	session_start();
	include_once('../models/user.php');

	$user = new User();

	if(isset($_GET['action'])){
		if($_GET['action']=='logout' && User::isLoggedIn()){
			session_destroy();
		}
		header('Location: index');
	}

	if($user -> isLoggedIn()){
		header('Location: index');
	}

	if( isset($_POST['email']) && isset($_POST['password']) ){

		if($_POST['email'] && $_POST['password'] && $_POST['email']!='' && $_POST['password']!=''){

			$debugMsg = $debugMsg . 'POST variables exist and =! "" <br>';

			$email = sanitize($_POST['email']);
			$password = sanitize($_POST['password']);

			$email = stripFormChars($email);
			$password = genPass(stripFormChars($password), $email);

			$conn = DB();

			if ($conn){

				$result = $user -> findEmail($email);

				if($row = $result -> fetch_assoc()){

					$user -> setEmail($row['user_email']);
					$user -> setName($row['user_f_name']);

					if($row['user_login_attempts'] < 3){

						if($row['user_password'] == $password){
						
							$user -> setLoggedIn();
							$user -> updateLastLogin();
							$user -> updateLastIP($_SERVER['REMOTE_ADDR']);
							$user -> zeroLoginAttempts();
							echo '1';
						}
						else{
							$user -> incrementLoginAttempts();

							if($user -> getLoginAttempts() == 3){
								$errorMsg = "You tried to log in too many times. Please contact your administrator.";
								echo $errorMsg;
							}
							else{
								$errorMsg = 'Password is incorrect. Please try again.<br>' . (3 - $user -> getLoginAttempts()) . ' login attempts remaining';
								echo $errorMsg;
							}
						}
					}
					else{
						$errorMsg = "You tried to log in too many times. Please contact your administrator.";
						echo $errorMsg;
					}
				}
				else{
					$errorMsg = 'User name or password are incorrect. Try again.';
					echo $errorMsg;
				}
			}
			else{
				$errorMsg = 'Connection failed';
				echo $errorMsg;
			}
		}
		else{
			
			$errorMsg = 'User name and password are required. Try again.';
			echo $errorMsg;
		}
	}

	else include('../views/login.view.php');
?>