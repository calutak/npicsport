
<!-- Page Heading & Breadcrumbs  -->
		<div class="page-heading-breadcrumbs">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li>Match</li>
			</ul>
		</div>
	</div>
	<div class="form-group">
		<?php echo form_open(site_url('tournament/load_bracket')); ?>
			<select name="select" class="form-control select">
	          <?php foreach ($tournament as $tourname) {
	            echo '<option value=\''.$tourname->tournament_id.'\'>'.$tourname->tournament_name.'</option>';
	          } ?>
	        </select>
		<?php 
			echo form_submit('submit','Go','class=\'btn btn-default\'');
			echo form_close(); 
		?>
	</div>
	<main class="main-content">	

		<!-- Match -->
		<div class="theme-padding white-bg">
			<div class="container">
				<div class="row">
					
					<!-- match Contenet -->
					<div class="matches-shedule-holder">
						<div class="col-lg-9 col-sm-8">

							<!-- Matches Dates Shedule -->
							<div class="matches-dates-shedule">
								<ul>
								<?php 
								$round = array(1 => '1st Round', 2 => 'Quarter Final', 3 => 'Semi Final', 4 => 'Final');
								foreach ($Match as $key) { ?>
									<li>
										<h3> <?php echo $round[$key->round]; ?> </h3>
										<div class="detail">
											<a href="#">Match Detail<i class="fa fa-angle-double-right"></i></a>
											<strong><?php 
											if(empty($key->teamA)) { echo 'TBD'; } else { echo $key->teamA; } ?>
											<i class="red-color"> <?php echo date('l, d/M/Y h:i A', $key->dates).' '; ?></i><?php
											if(empty($key->teamB)) { echo 'TBD'; } else { echo $key->teamB; } ?></strong>
											<span class="location-marker"><i class="fa fa-map-marker"></i><?php echo $key->loc; ?></span>
										</div>
									</li>
								<?php } ?>
									<!-- <li>
										<span class="pull-left"><img src="images/matches-logo/img-03.png" alt=""></span>
										<span class="pull-right"><img src="images/matches-logo/img-04.png" alt=""></span>
										<div class="detail">
											<a href="#">Match Detail<i class="fa fa-angle-double-right"></i></a>
											<strong>southampton<i class="red-color"> 6 Feb 2016 15:00</i> liverpool</strong>
											<span class="location-marker"><i class="fa fa-map-marker"></i>3358 Evergreen Lane England</span>
										</div>
									</li>
									<li>
										<span class="pull-left"><img src="images/matches-logo/img-05.png" alt=""></span>
										<span class="pull-right"><img src="images/matches-logo/img-06.png" alt=""></span>
										<div class="detail">
											<a href="#">Match Detail<i class="fa fa-angle-double-right"></i></a>
											<strong>southampton<i class="red-color"> 6 Feb 2016 15:00</i> liverpool</strong>
											<span class="location-marker"><i class="fa fa-map-marker"></i>3358 Evergreen Lane England</span>
										</div>
									</li>
									<li>
										<span class="pull-left"><img src="images/matches-logo/img-01.png" alt=""></span>
										<span class="pull-right"><img src="images/matches-logo/img-02.png" alt=""></span>
										<div class="detail">
											<a href="#">Match Detail<i class="fa fa-angle-double-right"></i></a>
											<strong>southampton<i class="red-color"> 6 Feb 2016 15:00</i> liverpool</strong>
											<span class="location-marker"><i class="fa fa-map-marker"></i>3358 Evergreen Lane England</span>
										</div>
									</li>
									<li>
										<span class="pull-left"><img src="images/matches-logo/img-03.png" alt=""></span>
										<span class="pull-right"><img src="images/matches-logo/img-04.png" alt=""></span>
										<div class="detail">
											<a href="#">Match Detail<i class="fa fa-angle-double-right"></i></a>
											<strong>southampton<i class="red-color"> 6 Feb 2016 15:00</i> liverpool</strong>
											<span class="location-marker"><i class="fa fa-map-marker"></i>3358 Evergreen Lane England</span>
										</div>
									</li>
									<li>
										<span class="pull-left"><img src="images/matches-logo/img-05.png" alt=""></span>
										<span class="pull-right"><img src="images/matches-logo/img-06.png" alt=""></span>
										<div class="detail">
											<a href="#">Match Detail<i class="fa fa-angle-double-right"></i></a>
											<strong>southampton<i class="red-color"> 6 Feb 2016 15:00</i> liverpool</strong>
											<span class="location-marker"><i class="fa fa-map-marker"></i>3358 Evergreen Lane England</span>
										</div>
									</li>
									<li>
										<span class="pull-left"><img src="images/matches-logo/img-01.png" alt=""></span>
										<span class="pull-right"><img src="images/matches-logo/img-02.png" alt=""></span>
										<div class="detail">
											<a href="#">Match Detail<i class="fa fa-angle-double-right"></i></a>
											<strong>southampton<i class="red-color"> 6 Feb 2016 15:00</i> liverpool</strong>
											<span class="location-marker"><i class="fa fa-map-marker"></i>3358 Evergreen Lane England</span>
										</div>
									</li>
									<li>
										<span class="pull-left"><img src="images/matches-logo/img-03.png" alt=""></span>
										<span class="pull-right"><img src="images/matches-logo/img-04.png" alt=""></span>
										<div class="detail">
											<a href="#">Match Detail<i class="fa fa-angle-double-right"></i></a>
											<strong>southampton<i class="red-color"> 6 Feb 2016 15:00</i> liverpool</strong>
											<span class="location-marker"><i class="fa fa-map-marker"></i>3358 Evergreen Lane England</span>
										</div>
									</li>
									<li>
										<span class="pull-left"><img src="images/matches-logo/img-05.png" alt=""></span>
										<span class="pull-right"><img src="images/matches-logo/img-06.png" alt=""></span>
										<div class="detail">
											<a href="#">Match Detail<i class="fa fa-angle-double-right"></i></a>
											<strong>southampton<i class="red-color"> 6 Feb 2016 15:00</i> liverpool</strong>
											<span class="location-marker"><i class="fa fa-map-marker"></i>3358 Evergreen Lane England</span>
										</div>
									</li> -->
								</ul>
							</div>
							<!-- Matches Dates Shedule -->

							<!-- Pagination -->
							<div class="pagination-holder">
								<ul class="pagination">
									<li><a href="#"><i class="fa fa-angle-double-left"></i>Previous</a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">7</a></li>
									<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
									<li><a href="#">28</a></li>
									<li><a href="#">Next<i class="fa fa-angle-double-right"></i></a></li>
								</ul>
							</div>
							<!-- Pagination -->

						</div>
					</div>
					<!-- match Contenet -->

					<!-- Aside -->
					<div class="col-lg-3 col-sm-4">

						<!-- Aside Widget -->
						<div class="aside-widget">
							<a href="#"><img src="images/adds-02.jpg" alt=""></a>
						</div>
						<!-- Aside Widget -->

						<!-- Aside Widget -->
						<div class="aside-widget">
							<h3><span>Popular News</span></h3>
							<div class="Popular-news">
								<ul>
									<li>
										<img src="images/popular-news/img-01.jpg" alt="">
										<h5><a href="#">Two touch penalties, imaginary cards</a></h5>
										<span class="red-color"><i class="fa fa-clock-o"></i>22 Feb, 2016</span>
									</li>
									<li>
										<img src="images/popular-news/img-02.jpg" alt="">
										<h5><a href="#">Two touch penalties, imaginary cards</a></h5>
										<span class="red-color"><i class="fa fa-clock-o"></i>22 Feb, 2016</span>
									</li>
									<li>
										<img src="images/popular-news/img-03.jpg" alt="">
										<h5><a href="#">Two touch penalties, imaginary cards</a></h5>
										<span class="red-color"><i class="fa fa-clock-o"></i>22 Feb, 2016</span>
									</li>
									<li>
										<img src="images/popular-news/img-04.jpg" alt="">
										<h5><a href="#">Two touch penalties, imaginary cards</a></h5>
										<span class="red-color"><i class="fa fa-clock-o"></i>22 Feb, 2016</span>
									</li>
								</ul>
							</div>
						</div>
						<!-- Aside Widget -->

						<!-- Aside Widget -->
						<div class="aside-widget">
							<h3><span>Archive</span></h3>
							<div id="calendar" class="calendar"></div>
						</div>
						<!-- Aside Widget -->

					</div>
					<!-- Aside -->

				</div>
			</div>
		</div>
		<!-- Match -->

	</main>
	<!-- Main Content -->

	<!-- Footer -->
	<footer class="main-footer style-2">

		<!-- Footer Columns -->
		<div class="container">

			<!-- Footer columns -->
			<div class="footer-column border-0">
				<div class="row">
					
					<!-- Footer Column -->
					<div class="col-sm-4 col-xs-6 r-full-width-2 r-full-width">
						<div class="column-widget h-white">
							<div class="logo-column p-white">
								<img class="footer-logo" src="images/footer-logo.png" alt="">
								<ul class="address-list style-2">
									<li><span>Address:</span>1782 Harrison Street  Sun Prairie</li>
									<li><span>Phone Number:</span>49 30 47373795</li>
									<li><span>Email Address:</span>moin@blindtextgenerator.de</li>
								</ul>
								<span class="follow-us">follow us </span>
								<ul class="social-icons">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
									<li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a class="tumblr" href="#"><i class="fa fa-tumblr"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Footer Column -->

					<!-- Footer Column -->
					<div class="col-sm-4 col-xs-6 r-full-width-2 r-full-width">
						<div class="column-widget h-white">
							<h5>Advertisment</h5>
							<a href="#"><img src="images/footer-add.jpg" alt=""></a>
						</div>
					</div>
					<!-- Footer Column -->

					<!-- Footer Column -->
					<div class="col-sm-4 col-xs-6 r-full-width-2 r-full-width">
						<div class="column-widget h-white">
							<h5>Sponcer</h5>
							<ul id="brand-icons-slider-2" class="brand-icons-slider-2">
								<li>
									<a href="#"><img src="images/brand-icons/img-1-1.png" alt=""></a>
									<a href="#"><img src="images/brand-icons/img-1-2.png" alt=""></a>
									<a href="#"><img src="images/brand-icons/img-1-3.png" alt=""></a>
									<a href="#"><img src="images/brand-icons/img-1-4.png" alt=""></a>
									<a href="#"><img src="images/brand-icons/img-1-5.png" alt=""></a>
									<a href="#"><img src="images/brand-icons/img-1-6.png" alt=""></a>
								</li>
								<li>
									<a href="#"><img src="images/brand-icons/img-1-1.png" alt=""></a>
									<a href="#"><img src="images/brand-icons/img-1-2.png" alt=""></a>
									<a href="#"><img src="images/brand-icons/img-1-3.png" alt=""></a>
									<a href="#"><img src="images/brand-icons/img-1-4.png" alt=""></a>
									<a href="#"><img src="images/brand-icons/img-1-5.png" alt=""></a>
									<a href="#"><img src="images/brand-icons/img-1-6.png" alt=""></a>
								</li>
							</ul>
						</div>
					</div>
					<!-- Footer Column -->

				</div>
			</div>
			<!-- Footer columns -->

		</div>
		<!-- Footer Columns -->

		<!-- Copy Rights -->
		<div class="copy-rights">
			<div class="container">
				<p>© Copyright by <i class="red-color">FineLayers</i> All rights reserved.</p>
				<a class="back-to-top scrollup" href="#"><i class="fa fa-angle-up"></i></a>
			</div>
		</div>
		<!-- Copy Rights -->

	</footer> 
	<!-- Footer -->

</div>