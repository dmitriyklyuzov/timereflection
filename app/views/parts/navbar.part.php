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
						<a class="navbar-brand" href="/"><b>TIME REFLECTION</b></a>
					</div> <!-- navbar-header -->
					<div class="collapse navbar-collapse navbar-right" id="myNavbar">
						<form class="navbar-form navbar-left" role="search" action="http://localhost:8888/search" method="GET">
							<div class="input-group">
								<input type="text" name="s" class="form-control" placeholder="Search" aria-describedby="basic-addon1">
								<span class="input-group-addon" id="basic-addon1">
									<span class="glyphicon glyphicon-search"></span>
								</span>
							</div>
						</form>
						<ul class="nav navbar-nav">

							<!-- <li><a href="test">TEST</a></li> -->

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
							<?php if(User::isLoggedIn()): ?>
								<li><a href="/add">ADD</a></li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">HI, <?php echo strtoupper(User::getName()); ?>
									<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="/logout">LOG OUT</a></li>
										<li><a href="/admin">ADMIN PANEL</a></li>
							    	</ul>
								</li>
							<?php endif; ?>
							<?php if(!User::isLoggedIn()):?>
								<li class="hidden-sm"><a href="mailto:timereflectioninc@gmail.com">TIMEREFLECTIONINC@GMAIL.COM</a></li>
								<li><a href="/contact">CONTACT US</a></li>
								<li><a href="/about">ABOUT US</a></li>
								<li><a href="/login">LOG IN</a></li>
								<!-- <li><a href="/register">SIGN UP</a></li> -->
							<?php endif; ?>
						</ul>	
					</div> <!-- collapse navbar-collapse navbar-right -->
				</div> <!-- container-fluid -->
			</div> <!-- navbar navbar-default -->

			<?php
		}
?>