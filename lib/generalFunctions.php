<?php
	// Capitalizes the first letter of every word
	function toCamelCase($string){
		return ucwords(strtolower($string));
	}

	function echoBr(){
		echo '<br>';
	}

	function replaceSpaceWithUnderscore($s){
		echo str_replace(" ", "_", $s);
	}
?>