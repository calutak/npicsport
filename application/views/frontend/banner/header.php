
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content=""/>
<!-- Document Title -->
<title>NPIC SPORT INFORMATION SYSTEM</title>
<!-- StyleSheets -->
<link rel="stylesheet" href="<?php echo site_url('assets/Frontend/css/bootstrap/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/Frontend/css/main.css');?>">	
<link rel="stylesheet" href="<?php echo site_url('assets/Frontend/css/icomoon.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/Frontend/css/animate.css'); ?>">
<link rel="stylesheet" href="<?php echo site_url('assets/Frontend/css/transition.css');?>">
<link rel="stylesheet" href="<?php echo site_url('assets/Frontend/css/font-awesome.min.css');?>">
<link rel="stylesheet" href="<?php echo site_url('assets/Frontend/style.css');?>">
<link rel="stylesheet" href="<?php echo site_url('assets/Frontend/css/color.css');?>">
<link rel="stylesheet" href="<?php echo site_url('assets/Frontend/css/responsive.css');?>">
<!-- FontsOnline -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800|Open+Sans:400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<!-- JavaScripts -->
<script src="<?php echo site_url('assets/Frontend/js/vendor/modernizr.js'); ?>"></script>
</head>
<body class="index-2">
	<!-- Header -->
	<header class="header style-2">
		<!-- Top bar Nd Logo Bar -->
		<div class="topbar-and-logobar">
			<div class="container">

				<!-- Top bar -->
				<div class="top-bar">
					<div class="row">
						<!-- Login Option -->
						<div class="col-sm-12 col-xs-12">
							<ul class="login">
								<li class="login-modal">
									<a href="#" class="login" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user"></i>Login</a>
									<div class="modal fade" id="login-modal">
									  	<div class="login-form position-center-center">
											<h2>Login<button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button></h2>
											<form>
												<div class="form-group">
													<input type="text" class="form-control" name="user" placeholder="domain@live.com">
													<i class=" fa fa-envelope"></i>	
												</div>
												<div class="form-group">
													<input type="password" class="form-control" name="pass" placeholder="**********">
													<i class=" fa fa-lock"></i>	
												</div>
												<div class="form-group custom-checkbox">
												    <label>
												    	<input type="checkbox"> Stay login
												    </label>
												    <a class="pull-right forgot-password" href="#"></a>
												    <a href="#" class="pull-right forgot-password" data-toggle="modal" data-target="#login-modal-2">Forgot password?</a>
												</div>
												<div class="form-group">
												    <button class="btn full-width red-btn">Login</button>
												</div>
											</form>
											<span class="or-reprater"></span>
										</div>
									</div>
									<div class="modal fade" id="login-modal-2">
									  	<div class="login-form position-center-center">
											<h2>Forgot password<button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button></h2>
											<form>
												<div class="form-group">
													<input type="text" class="form-control" name="user" placeholder="domain@live.com">
													<i class=" fa fa-envelope"></i>	
												</div>
												<div class="form-group">
													<input type="password" class="form-control" name="pass" placeholder="**********">
													<i class=" fa fa-lock"></i>	
												</div>
												<div class="form-group">
												    <button class="btn full-width red-btn">Login</button>
												</div>
											</form>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<!-- Login Option -->

					</div>
				</div>
				<!-- Top bar -->
				
			</div>	
		</div>
		<!-- Top bar Nd Logo Bar -->
		<!-- Nav -->
		<div class="container">
			<div class="nav-holder">
				<div class="maga-drop-wrap">
				
					<!-- Responsive Button -->
					<div class="responsive-btn pull-right">
						<a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
					</div>
					<!-- Responsive Button -->

					<!-- Logo -->
					<div class="logo">
						<a href="#"><img src="<?php echo site_url('assets/Frontend/images/logo-3.png'); ?>" alt=""></a>
					</div>
					<!-- Logo -->

					<!-- Search Bar -->
					<div class="search-bar-holder pull-right">
						<div class="search-bar">
							<input type="text" class="form-control font-italic" placeholder="search enter please...">
							<i class="fa fa-search"></i>
						</div>
					</div>
					<!-- Search Bar -->

					<!-- Nav List -->
					<ul class="nav-list pull-right">
						<li>
					    	<a href="#">Home</a>
						</li>
						<li><a href="about.html">about</a></li>
						<li>
					    	<a href="team.html">team</a>
					    	<ul>
							    <li><a href="team.html">team</a></li>
							    <li><a href="team-detail.html">Team detail</a></li>
							    <li><a href="team-width-sidebar.html">team-widthsidebar</a></li>
						  	</ul>
						</li>
						<li class="mega-dropdown">
					    	<a href="#">news</a>
					    	<ul>
							    <li class="row">
							    	<div class="col-lg-3 col-md-3 col-sm-3">
							    		<div class="blog-categories">
							    		<h2>Blog Categories</h2>
								    		<ul class="blog-categories-list">
								    			<li><a href="#">Blog 1 Column (Right Sidebar)</a></li>
								    			<li><a href="#">Blog Medium With Right Sidebar</a></li>
								    			<li><a href="#">Masonry (Right Sidebar)</a></li>
								    			<li><a href="#">Blog 4 Columns</a></li>
								    			<li><a href="#">Blog 1 Column (Right Sidebar)</a></li>
								    			<li><a href="#">Masonry (Right Sidebar)</a></li>
								    			<li><a href="#">Blog 1 Column (Right Sidebar)</a></li>
								    		</ul>
							    		</div>
							    	</div>
							    	<div class="col-lg-9 col-md-9 col-sm-9">
							    		<div id="mega-blog-slider" class="mega-blog-slider">

							    			<!-- Post Img -->
											<div class="item">

												<!-- Post Img -->
												<div class="large-post-img">
													<img src="<?php echo site_url('assets/Frontend/images/blog-grid-view/img-2-1.jpg'); ?>" alt="">
												</div>
												<!-- Post Img -->

												<!-- Post Detail -->
												<div class="large-post-detail style-3 p-0">
													<span class="red-color">LIGA GOJEK</span>
													<h2>Man United reunion for Ibrahimovic,</h2>
												</div>
												<!-- Post Detail -->

											</div>
											<!-- Post Img -->

											<!-- Post Img -->
											<div class="item">

												<!-- Post Img -->
												<div class="large-post-img">
													<img src="<?php echo site_url('assets/Frontend/images/blog-grid-view/img-2-2.jpg'); ?>" alt="">
												</div>
												<!-- Post Img -->

												<!-- Post Detail -->
												<div class="large-post-detail style-3 p-0">
													<span class="red-color">Englis FA Cup</span>
													<h2>Man United reunion for Ibrahimovic,</h2>
												</div>
												<!-- Post Detail -->

											</div>
											<!-- Post Img -->

											<!-- Post Img -->
											<div class="item">

												<!-- Post Img -->
												<div class="large-post-img">
													<img src="<?php echo site_url('assets/Frontend/images/blog-grid-view/img-2-3.jpg'); ?>" alt="">
												</div>
												<!-- Post Img -->

												<!-- Post Detail -->
												<div class="large-post-detail style-3 p-0">
													<span class="red-color">LIGA GOJEK</span>
													<h2>Man United reunion for Ibrahimovic,</h2>
												</div>
												<!-- Post Detail -->

											</div>
											<!-- Post Img -->

											<!-- Post Img -->
											<div class="item">

												<!-- Post Img -->
												<div class="large-post-img">
													<img src="<?php echo site_url('assets/Frontend/images/blog-grid-view/img-2-4.jpg'); ?>" alt="">
												</div>
												<!-- Post Img -->

												<!-- Post Detail -->
												<div class="large-post-detail style-3 p-0">
													<span class="red-color">Englis FA Cup</span>
													<h2>Man United reunion for Ibrahimovic,</h2>
												</div>
												<!-- Post Detail -->

											</div>
											<!-- Post Img -->

											<!-- Post Img -->
											<div class="item">

												<!-- Post Img -->
												<div class="large-post-img">
													<img src="<?php echo site_url('assets/Frontend/images/blog-grid-view/img-2-1.jpg'); ?>" alt="">
												</div>
												<!-- Post Img -->

												<!-- Post Detail -->
												<div class="large-post-detail style-3 p-0">
													<span class="red-color">Englis FA Cup</span>
													<h2>Man United reunion for Ibrahimovic,</h2>
												</div>
												<!-- Post Detail -->

											</div>
											<!-- Post Img -->

											<!-- Post Img -->
											<div class="item">

												<!-- Post Img -->
												<div class="large-post-img">
													<img src="<?php echo site_url('assets/Frontend/images/blog-grid-view/img-2-2.jpg'); ?>" alt="">
												</div>
												<!-- Post Img -->

												<!-- Post Detail -->
												<div class="large-post-detail style-3 p-0">
													<span class="red-color">Englis FA Cup</span>
													<h2>Man United reunion for Ibrahimovic,</h2>
												</div>
												<!-- Post Detail -->

											</div>
											<!-- Post Img -->

							    		</div>
							    	</div>
							    </li>
						  	</ul>
						</li>
						<li>
					    	<a href="#">Match</a>
					    	<ul>
					    		<li><a href="match.html">Match</a></li>
							    <li><a href="match-detail.html">Match Detail</a></li>
							    <li><a href="match-result.html">Match Result</a></li>
						  	</ul>
						</li>                                                             
						<li><a href="contact.html">contact</a></li>                                                                  
					</ul>
					<!-- Nav List -->

				</div>
			</div>
		</div>
		<!-- Nav -->

	</header>