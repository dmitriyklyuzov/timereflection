<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php getHead('Admin'); ?>
		<link rel="stylesheet" href="public/css/dashboard.css">
	</head>
	<body>

		<?php include_once("../../lib/analyticsTracking.php"); ?>
		<?php getNavbar(); ?>

		<div class="container margin-top-2em">
			<div class="row">
				<div class="col-md-2 col-sm-3 sidebar">
					<div class="nav nav-sidebar navbar-default">
						<li><a href="">Overview</a></li>
						<li><a href="">Reports</a></li>
						<li><a href="">Visitors</a></li>
						<li><a href="">Sales</a></li>
					</div>
				</div>
			</div>
			<div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-2">
				<div class="row">
					
					<!-- <div class="hidden-md hidden-sm">LARGE</div> -->
					<!-- <div class="hidden-lg hidden-sm">MEDIUM</div> -->
					<!-- <div class="hidden-lg hidden-md">SMALL</div> -->
					
					<div class="col-md-3 col-sm-5">
						<div class="thumbnail background-primary">
							<div class="caption clearfix">
								<div class="col-md-4">
									<h1 style="color: #fff;" class="text-center">#</h1>
								</div>
								<div class="col-lg-8">
									<h4 style="color: #fff; text-align: right"><?php echo Listing::getTotalCount(); ?></h4>
									<b><p style="color: #fff; text-align: right">LISTINGS</p></b>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-5">
						<div class="thumbnail background-success">
							<div class="caption clearfix">
								<div class="col-md-4">
									<h1 style="color: #fff;" class="text-center">
										<span class="glyphicon glyphicon-thumbs-up"></span>
									</h1>
								</div>
								<div class="col-lg-8">
									<h4 style="color: #fff; text-align: right">$<?php echo number_format(Listing::getProfit()); ?></h4>
									<b><p style="color: #fff; text-align: right">PROFIT</p></b>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="thumbnail background-warning">
							<div class="caption clearfix">
								<div class="col-sm-4">
									<h1 style="color: #fff;" class="text-center">
										<span class="glyphicon glyphicon-shopping-cart"></span>
									</h1>
								</div>
								<div class="col-sm-8">
									<h4 style="color: #fff; text-align: right">$<?php echo number_format(Listing::getTotalPrice()); ?></h4>
									<b><p class="hidden-md hidden-sm hidden-xs" style="color: #fff; text-align: right">TOTAL PRICE</p></b>
									<b><p class="hidden-lg" style="color: #fff; text-align: right">PRICE</p></b>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3">
						<div class="thumbnail background-danger">
							<div class="caption clearfix">
								<div class="col-md-4">
									<h1 style="color: #fff;" class="text-center">
										<span class="fa fa-dollar"></span>
									</h1>
								</div>
								<div class="col-lg-8">
									<h4 style="color: #fff; text-align: right">$<?php echo number_format(Listing::getTotalCost());?></h4>
									<b><p class="hidden-md hidden-sm hidden-xs" style="color: #fff; text-align: right">TOTAL COST</p></b>
									<b><p class="hidden-lg" style="color: #fff; text-align: right">COST</p></b>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="container" style="background-color: #fff">
						<h1>Visitor analytics</h1>
						<section id="auth-button"></section>
						<section id="view-selector"></section>
						<section id="timeline"></section>

						<script>
						(function(w,d,s,g,js,fjs){
							g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
							js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
							js.src='https://apis.google.com/js/platform.js';
							fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
						}(window,document,'script'));
						</script>

						<script>
							gapi.analytics.ready(function() {

							  // Step 3: Authorize the user.

							  var CLIENT_ID = '934146408712-bjklujsv1dm5hs9kqpph5lni8u1nhnhv.apps.googleusercontent.com';

							  gapi.analytics.auth.authorize({
							    container: 'auth-button',
							    clientid: CLIENT_ID,
							  });

							    // Step 4: Create the view selector.

							  var viewSelector = new gapi.analytics.ViewSelector({
							    container: 'view-selector'
							  });

							    // Step 5: Create the timeline chart.

							  var timeline = new gapi.analytics.googleCharts.DataChart({
							    reportType: 'ga',
							    query: {
							      'dimensions': 'ga:date',
							      'metrics': 'ga:sessions',
							      'start-date': '30daysAgo',
							      'end-date': 'yesterday',
							    },
							    chart: {
							      type: 'LINE',
							      container: 'timeline'
							    }
							  });

							    // Step 6: Hook up the components to work together.

							  gapi.analytics.auth.on('success', function(response) {
							    viewSelector.execute();
							  });

							  viewSelector.on('change', function(ids) {
							    var newIds = {
							      query: {
							        ids: ids
							      }
							    }
							    timeline.set(newIds).execute();
							  });
							});
							</script>


					</div>
				</div>
			</div>
		</div>
	</body>
</html>