<?php

	function getName(){
		if(isset($_SESSION['name']) && !empty($_SESSION['name']) && $_SESSION['name'] != ''){
			return $_SESSION['name'];
		}
		else return 'Not set or empty';
	}

	function ifLoggedIn($string){
		if(isset($_SESSION['logged_in'])){
			if($_SESSION['logged_in']){
				echo $string;
			}
		}
	}

	function ifNotLoggedIn($string){
		if(!isset($_SESSION['logged_in'])){
			echo $string;
		}
	}

	function isLoggedIn(){
		if(isset($_SESSION['logged_in'])){
			if($_SESSION['logged_in']){
				return true;
			}
			else return false;
		}
		else return false;
	}

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
						<a class="navbar-brand" href="index"><b>TIME REFLECTION</b></a>
					</div> <!-- navbar-header -->
					<div class="collapse navbar-collapse navbar-right" id="myNavbar">
						<!-- <form class="navbar-form navbar-left" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1">
								<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
							</div>
						</form> -->
						<ul class="nav navbar-nav">

							<li><a href="test">TEST</a></li>

							<!-- <li class="dropdown">
						        <a class="dropdown-toggle" data-toggle="dropdown" href="#">BRANDS
						        <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Audemars Piguet</a></li>
									<li><a href="#">IWC</a></li>
									<li><a href="#">Panerai</a></li>
									<li><a href="#">Patek Philippe</a></li>
									<li><a href="#">Rolex</a></li>
						    	</ul>
							</li> -->
							<!-- <li><a href="#">ABOUT</a></li> -->
							<!-- <li><a href="#">CONTACT</a></li> -->
							<?php ifLoggedIn('<li><a href="add">ADD</a></li>'); ?>
							<?php // ifLoggedIn('<li><a href="login">LOG IN</a></li>'); ?>
							<?php if(isLoggedIn()){ ?>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">HI, <?php echo strtoupper(getName()); ?>
									<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="logout">LOG OUT</a></li>
										<li><a href="admin">ADMIN PANEL</a></li>
							    	</ul>
								</li>
							<?php }	?>
							<?php ifNotLoggedIn('<li><a href="login">LOG IN</a></li>'); ?>
							<?php ifNotLoggedIn('<li><a href="register">SIGN UP</a></li>'); ?>
						</ul>	
					</div> <!-- collapse navbar-collapse navbar-right -->
				</div> <!-- container-fluid -->
			</div> <!-- navbar navbar-default -->

			<?php
		}

?>