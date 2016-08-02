<?php
	
	function debugMsg($string){
		if(isset($_SESSION['debugMsg'])){
			$_SESSION['debugMsg'] = $_SESSION['debugMsg'] . $string . '<br>';
		}
	}

	function echoDebugMsg(){
		if(isset($_SESSION['debug']) && isset($_SESSION['debugMsg'])){
			if($_SESSION['debug']){
				echo $_SESSION['debugMsg'];
				$_SESSION['debugMsg']='';
			}
		}
	}

	function clearDebugMsg(){
		if(isset($_SESSION['debugMsg']) && isset($_SESSION['debug'])){
			$_SESSION['debugMsg']='';
		}
	}
?>