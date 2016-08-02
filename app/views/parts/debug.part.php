<?php if(isset($_SESSION['debugMsg']) && isset($_SESSION['debug']))
{ 
	if($_SESSION['debug']){
		?>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h5 class="text-center">DEBUG MODE</h5>
			<h5 class="text-center">----------</h5>
			<p><?php echoDebugMsg(); ?></p>
		</div>
	</div>
	<?php 
	}
}
?>