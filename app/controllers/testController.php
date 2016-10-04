<?php

	session_start();
	// $errorMsg='';
	include_once('../../lib/dependencies.php');
	include_once('../models/user.php');
	include_once('../models/watch.php');
	include_once('../models/listing.php');

	// REDIRECT TO LOGIN IF NOT LOGGED IN
	if(!User::isLoggedIn()){
		$errorMsg = 'Please log in first.';
		include ('../views/login.view.php');
		exit();
	}

	if(isset($_POST['action']) && isset($_POST['id']) && isset($_POST['field']) && isset($_POST['value'])){

		$action = sanitize($_POST['action']);
		$id = sanitize($_POST['id']);
		$field = sanitize($_POST['field']);
		$value = sanitize($_POST['value']);

		if(Listing::exists($id)){

			if($field == 'listing_retail' || $field == 'listing_price' || $field == 'listing_our_cost'){
				$value = currencyToNumber($value);
			}

			$conn = DB();
			$conn -> query('UPDATE listing SET ' . $field . ' = "' . $value . '" WHERE listing_id = "' . $id . '";');
			$conn -> close();

			echo 'true';
		}

		else if(Watch::refExists($id)){

			if($field == 'watch_case_size_xs'){
				$field == 'watch_case_size';
			}

			if($field == 'watch_case_size'){
				$value = str_replace(' ', '', $value);
				$value = str_replace('m', '', $value);
				$value = str_replace('M', '', $value);
			}

			$conn = DB();
			$conn -> query('UPDATE watch SET ' . $field . ' = "' . $value . '" WHERE watch_reference = "' . $id . '";');
			$conn -> close();

			echo 'true';
		}

		else echo 'false';
	}
	
?>