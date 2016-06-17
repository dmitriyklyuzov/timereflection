<?php

	include_once 'setting.php';
	include_once 'view/parts/head.part.php';
	include_once 'view/parts/navbar.part.php';

	$_SESSION['user'] = 'test@test.com';
	
	if($_SESSION['user'] != 'test@test.com'){
		header('Location: index.php');
	}
	else{

		function getBrandList(){
			// get a list of watch brands
			$conn = mysqli_connect(HOST, USER, PASS, DB);

			$resultSet = $conn -> query("SELECT DISTINCT watch_brand FROM watch;");
			
			mysqli_close($conn);

			while($rows = $resultSet -> fetch_assoc()){

				echo '<option value='.$rows['watch_brand'].'>'.$rows['watch_brand'].'</option>';
			}
		}

		include ('view/addlisting.view.php');
	}
?>