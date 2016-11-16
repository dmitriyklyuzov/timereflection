<?php

	$debugMsg = '';

	function debugMsg($string){
		if(isset($debugMsg)){
			$debugMsg = $debugMsg . $string . '<br>';	
		}
	}
?>