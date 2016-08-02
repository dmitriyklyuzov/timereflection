<?php 

if(isset($debugMsg) && isset($debugMode)){
	if($debugMode){
 	?>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h5 class="text-center">DEBUG MODE</h5>
				<h5 class="text-center">----------</h5>
				<p class="text-center"><?php echo $debugMsg; $debugMsg=''; ?></p>
			</div>
		</div>
	<?php 
	}
}
?>