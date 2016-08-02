<!DOCTYPE html>
<html>
	
	<head>
		<?php getHead('Registration'); ?>
		
	</head>

	<body>

		<div class="registration-confirmation">

		<span class="btn btn-success"  onclick="showModal()">Hello</span>

			<div class="modal fade" id="myModal" role="dialog">
				<div class="vertical-alignment-helper">
					<div class="modal-dialog vertical-align-center">
						<div class="modal-content">
							
							<div class="modal-header">
								<h1 class="modal-title text-center">Great!</h1>
							</div>

							<div class="modal-body">
								<h1 class="text-center"><span class="glyphicon glyphicon-ok text-success"></span></h1>
								<br>
								<p class="text-center">Your account has been created.</p>
							</div>

							<div class="modal-footer">
								<a href="login" class="btn btn-success">LOG IN</a>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
	function showModal(){
		$('#myModal').modal({backdrop:true});
	}
</script>