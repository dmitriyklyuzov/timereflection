<?php
include_once 'setting.php';
// session_start();

include_once 'setting.php';

session_start();

$conn = mysqli_connect(HOST, USER, PASS, DB);

if ($conn){
	echo 'connection successful';
}
else echo 'unsuccessful';

$resultSet = $conn -> query("SELECT *
					FROM listing
					INNER JOIN watch on listing.watch_id = watch.watch_id;");

$rows = $resultSet -> fetch_assoc();

echo '<br>';
echo $rows['watch_brand'];
echo '<br>';
echo $rows['watch_model'];


?>