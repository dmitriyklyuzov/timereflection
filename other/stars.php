<?php
	$stars = '';

	for($i=1; $i<=$condition/2; $i++){
		$stars = $stars . '<i class="fa fa-star"></i>';
	}
	if($condition%2==1){
		$stars = $stars . '<i class="fa fa-star-half-o"></i>';
	}
	if(10-$condition!=0){
		for($i=1; $i<=(10-$condition)/2; $i++){
			$stars = $stars . '<i class="fa fa-star-o"></i>';
		}
	}

?>