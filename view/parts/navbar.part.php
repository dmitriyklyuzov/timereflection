<?php
function getNavbar(){
	?>
	
	<div class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><b>TIME REFLECTION</b></a>
				</div> <!-- navbar-header -->
				<div class="collapse navbar-collapse navbar-right" id="myNavbar">
					<form class="navbar-form navbar-left" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1">
							<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
						</div>
					</form>
					<ul class="nav navbar-nav">
						<li class="dropdown">
					        <a class="dropdown-toggle" data-toggle="dropdown" href="#">BRANDS
					        <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Audemars Piguet</a></li>
								<li><a href="#">IWC</a></li>
								<li><a href="#">Panerai</a></li>
								<li><a href="#">Patek Philippe</a></li>
								<li><a href="#">Rolex</a></li>
					    	</ul>
						</li>
						<!-- <li><a href="#">ABOUT</a></li> -->
						<!-- <li><a href="#">CONTACT</a></li> -->
						<li><a href="addlisting.php">ADD</a></li>
						<li><a href="login.php">LOG IN</a></li>
						<li><a href="register.php">SIGN UP</a></li>
					</ul>	
				</div> <!-- collapse navbar-collapse navbar-right -->
			</div> <!-- container-fluid -->
		</div> <!-- navbar navbar-default -->

		<?php
	}

?>