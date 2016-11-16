<?php
	
	function setMaxLoginAttempts($n){
		$_SESSION['maxLoginAttempts'] = $n;
	}

	function getMaxLoginAttempts(){
		if(isset($_SESSION['maxLoginAttempts']) && !empty($_SESSION['maxLoginAttempts'])){
			return $_SESSION['maxLoginAttempts'];
		}
		else return '3';
	}
?>