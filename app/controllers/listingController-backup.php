<?php

	session_start();
	// $errorMsg='';
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');
	include_once('../models/watch.php');

	$user = new User();

	$watch = new Watch();
	
	if(!isLoggedIn()){
		$errorMsg = 'Please log in first.';
		include ('../views/login.view.php');
	}

	if(isset($_POST['submit'])){

		debugMsg('OK: submit was pressed.');

		if(
			isset($_POST['brand']) &&
			isset($_POST['model']) &&
			isset($_POST['ref']) &&
			isset($_POST['material']) &&
			isset($_POST['retail'])
			){

				debugMsg('OK: POST variables are set.');

				$brand = sanitize($_POST['brand']);
				$model = sanitize($_POST['model']);
				$ref = sanitize($_POST['ref']);
				$material = sanitize($_POST['material']);
				$retail = sanitize($_POST['retail']);

				$brand = stripFormChars($brand);
				$model = stripFormChars($model);
				$ref = stripFormChars($ref);
				$material = stripFormChars($material);
				$retail = stripFormChars($retail);

				if($brand && $model && $ref && $material && $retail &&
					$brand!='' && $model!='' && $ref!='' && $material!='' && $retail!='' 
					){

					debugMsg('OK: Variables exist and != ""');

					debugMsg('Brand: '.$brand);
					debugMsg('model: '.$model);
					debugMsg('ref: '.$ref);
					debugMsg('material: '.$material);
					debugMsg('retail: '.$retail);

					$conn = DB();

					if ($conn){

						$result = $watch -> findWatch($ref);
						
						if($result -> fetch_assoc()){
							echo 'Watch in DB!';
						}

						else echo 'Not in DB';
						
					}
					else{
						$errorMsg = 'Something went wrong. Please try again.';
						debugMsg('WARNING: Connection failed.');
						include ('../views/login.view.php');
					}
				}
				else{

					// if(!$brand || !$model || !$ref || !$material || !$retail){
					if(!$retail){
						debugMsg('!$var!');
					}
					$errorMsg = 'Please fill in all required fields and try again.';
					debugMsg('WARNING: Variables do not exist or == ""');
					include ('../views/addlisting.view.php');
				}
		}

		else{
			$errorMsg = 'Something went wrong. Please try again.';
			debugMsg('WARNING: One of the variables is not set!');
			include ('../views/login.view.php');
		}
	}

	else if(isset($_GET['action'])){
		if($_GET['action']=='logout'){
			session_destroy();
			header('Location: index');
			// echo 'You logged out';
		}
	}
	
	else include ('../views/addlisting.view.php');
?>