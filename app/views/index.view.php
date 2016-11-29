<!DOCTYPE html>
<html>
	
	<head>
		<?php getHead('Time reflection'); ?>

		<meta property="og:title" content="Time Reflection Inc"/>
		<meta property="og:image" content="http://timereflectioninc.com/public/img/backgrounds/panerai.jpg" />
		<meta property="og:url" content="http://timereflectioninc.com/"/>
		<meta property="og:description" content="We specialize in buying, selling and trading authentic unworn and pre-owned watches. We source the most popular luxury watches with notable savings."/>

		<script type="text/javascript" src="/public/js/isInView.js"></script>
		<script type="text/javascript" src="/public/js/expandList.js"></script>
	</head>

	<body>
		
		<?php include_once("../../lib/analyticsTracking.php"); ?>
		<?php getNavbar(); ?>

	 <div id="my-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
			
			<ol class="carousel-indicators">
				<li data-target="#my-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#my-carousel" data-slide-to="1"></li>
				<li data-target="#my-carousel" data-slide-to="2"></li>
				<li data-target="#my-carousel" data-slide-to="3"></li>
			</ol>

			
			<div class="carousel-inner" role="listbox">
				
				<div class="item active" id="item-1">
					<div class="carousel-caption">
						<div class="shop-button">
							<a href="/brands/ROLEX" class="transition-ease">BROWSE ROLEX</a>
						</div>
					</div>
				</div>

				<div class="item" id="item-2">
					<div class="carousel-caption">
						<div class="shop-button">
							<a href="/brands/IWC" class="transition-ease">BROWSE IWC</a>
						</div>
					</div>
				</div>

				<div class="item" id="item-3">
					<div class="carousel-caption">
						<div class="shop-button">
							<a href="/brands/Audemars_Piguet" class="transition-ease">BROWSE AUDEMARS PIGUET</a>
						</div>
					</div>
				</div>

				<div class="item" id="item-4">
					<div class="carousel-caption">
						<div class="shop-button">
							<a href="/brands/Patek_Philippe" class="transition-ease">BROWSE PATEK PHILIPPE</a>
						</div>
					</div>
				</div>

				
				<a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left hidden-xs" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right hidden-xs" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div> 
		</div>

		<div class="container-fluid padding-top-4em">
			
			<?php  include ('../views/parts/brandsAndModels.part.php'); ?>

			<div class="col-md-9 col-sm-8" id="allWatches">
				<!-- <div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="btn-group" style="float:right">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by <span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li><a href="">Date added</a></li>
										<li><a href="">Price</a></li>
									</ul>
								</div>
								<button class="btn btn-default" style="float:right; margin-right: 1em">
									<span class="glyphicon glyphicon-sort"></span>
								</button>
							</div>
						</div>
					</div>
				</div> -->
				<div class="main-content">
					<div class="row multi-columns-row" id="thumbs">

						<?php getThumbnails(0, 12); ?>

					</div> <!-- row multi-columns-row id=thumbs -->
				</div> <!-- main-content -->
				<p id="loading" class="text-center padding-bottom-2em" style="display:none;">
					Loading ... <img src="/public/img/loading.gif" alt="Loading images...">
				</p>
			</div>
		</div>
	</body>

	<script>
		$(document).ready(function(){
			var win = $(window);

			var busy = false;

			// on scroll
			win.scroll(function(){
				// alert("You're scrolling!");

				// if($(document).height() - win.height() == win.scrollTop() && busy == false){

				if(win.scrollTop() + win.height() >= ($(document).height() - 200) && busy == false){

					busy = true;

					// alert('reached bottom!');
					
					$('#loading').show();

					var numOfElements = $('.myThumb').length;

					$.ajax({
						// url: 'http://test.timereflectioninc.com/start/'+numOfElements,
						url: '?start='+numOfElements,
						type: 'GET',
						dataType: 'html',
						success: function(html){
							$('#thumbs').append(html);
							$('#loading').hide();
							busy = false;
						}
					});

				}
			})
		})
	</script>
	
</html>