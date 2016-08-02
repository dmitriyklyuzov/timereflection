<?php

session_start();

include_once '../lib/dependencies.php';

if ($_SERVER['REQUEST_URI'] == '/timereflection/' || $_SERVER['REQUEST_URI'] == '/timereflection/index' || 
	$_SERVER['REQUEST_URI'] == '/timereflection/index.php'){
	$Page = 'index';
	$Module = 'index';
}
else {
	$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$URL_Parts = explode('/', trim($URL_Path, ' /'));
	array_shift($URL_Parts);
	$Page = array_shift($URL_Parts);
	$Module = array_shift($URL_Parts);
}

if($Page == 'index'){
	echo 'Index page requested.';
	// include '../app/views/index.view.php';
}

else if($Page == 'login'){
	// echo $Page.' page requested.<br>';
	include '../app/controllers/loginController.php';
}

else if($Page == 'register'){
	// echo $Page.' page requested.<br>';
	include '../app/controllers/registrationController.php';
}

else if($Page == 'logout'){
	// echo $Page.' page requested.<br>';
	include '../app/controllers/logout.php';
}

else if($Page == 'test'){
	include '../app/controllers/testController.php';
}

// else include '../app/views/404.view.php';

else{
	echo $Page.' page requested.<br>';
	echo 'This page does not exist!';
}

?>