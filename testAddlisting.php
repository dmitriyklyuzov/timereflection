<?php
session_start();

if(!isset($_POST['submit'])){
	echo 'POST submit not set';
}
else{
	echo 'POST submit is set';
	echo '<br>';
	echo 'brand: '.$_POST['brand'];
	echo '<br>';
	echo 'Model: '.$_POST['model'];
	echo '<br>';
	echo 'Reference: '.$_POST['ref'];
	echo '<br>';
	echo 'material: '.$_POST['material'];
	echo '<br>';
	echo 'condition: '.$_POST['condition'];
	echo '<br>';
	echo 'new_used: '.$_POST['new_used'];
	echo '<br>';
	echo 'notes: '.$_POST['notes'];
	echo '<br>';
	echo 'SKU: '.$_POST['sku'];
	echo '<br>';
	echo 'retail: '.$_POST['retail'];
	echo '<br>';
	echo 'price: '.$_POST['price'];
	echo '<br>';
	echo 'availability: '.$_POST['availability'];
}
?>