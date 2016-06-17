<?php

include_once 'setting.php';
// include_once 'results.php';
include_once 'view/head.php';
include_once 'view/navbar.php';


session_start();

// $conn = mysqli_connect(HOST, USER, PASS, DB);

$page = '';
$module = '';
$url_path = '';
$url_parts = '';
$param = array(); // new empty array to hold the parameters or the url request

if($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/index'){
	$page = 'index';
	$module = 'index';
}
else{
	$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // parse_url splits url into parts
	$url_parts = explode('/', trim($url_path, ' /')); // splits $url_path into an array
	$page = array_shift($url_parts); // first array element - page name
	$module = array_shift($url_parts); // second array element - module name
}

// if(!empty($module)){
// 	// $param = array(); // new empty array to hold the parameters or the url request
// 	for ($i=0; $i < count($url_parts); $i++){ // go through the url_parts
// 		$param[$url_parts[$i]] = $url_parts[$i++];
// 	}
// }

// include ('view/index.php');

if($page == 'index'){
	include ('index.php');
}

else if ($page == 'add'){
	include ('addlisting.php');	
}

else if ($page == 'comment'){ echo 'Комментарии'; }
else echo 'Page "'.$page.'" doesnt exist yet.';

?>