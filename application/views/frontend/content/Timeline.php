	<!-- Banner slider -->
    <div id="animated-slider" class="carousel slide carousel-fade">
       <!-- Nan Control -->
       <!--  <a class="slider-nav next" href="#inner-slider" data-slide="prev"><i class="fa fa-long-arrow-right"></i></a>
        <a class="slider-nav prev" href="#inner-slider" data-slide="next"><i class="fa fa-long-arrow-left"></i></a> -->
        <!-- Nan Control -->

        <!-- News Slider -->
		<div class="news-slider style-2">
			<div class="container">
				<div class="news-slider-holder">
			  		<div class="alert-spinner">
			    		<div class="double-bounce1"></div>
			    		<div class="double-bounce2"></div>
			  		</div>
					<ul id="ticker" class="ticker">
						<?php 
						if(empty($topheadlines))
						{
							echo '<li>No headlines!</li>';
						}
						else
						{
							foreach ($topheadlines as $t) {
								echo '<li>'.date('l, d M Y h:i', $t->timeline_date).' <i>'.$t->timeline_title.'</i></li>';
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<!-- News Slider -->

    </div>
	<!-- Banner slider -->

	<!-- Main Content -->
	<main class="main-content">
		<!-- Next Match -->
		<div class="next-match style-2">
			<div class="container p-0">
				<div class="left-match-time">
				<?php if(isset($nextmatch)) { ?>
				<h5>Next Match</h5>
					<h2><strong><?php echo $nextmatch['teamA'].' VS '.$nextmatch['teamB']; ?></strong></h2>
					<ul id="countdown-1" class="countdown">
					  	<li><span><?php echo date('d M Y',$nextmatch['date']); ?></span></li>
					  	<li><span><?php echo date('h:i A',$nextmatch['time']); ?></span></li>
					</ul>
					<span>Venue : <strong><?php echo $nextmatch['loc']; ?></strong></span>
				<?php } ?>
				</div>
			</div>
		</div>
		<!-- Next Match -->

		<!-- Mtach Detail Content -->
		<section class="theme-padding">
			<div class="container">
				<div class="row">
					<!-- Top Stroy Nd Add -->
					<div class="col-lg-3 col-sm-6 col-xs-6 r-full-width">
						
						<!-- Top Story -->
						<div class="content-widget top-story">
							<div class="top-stroy-header">
								<h2>Top Headlines Story</h2>
								<span class="date"><?php echo date('l, d M Y',$topheadlines[0]->timeline_date); ?>
									<a href="<?php echo site_url('news/'.$topheadlines[0]->timeline_id); ?>" class="text-muted"><?php echo $topheadlines[0]->timeline_title; ?></a>
								</span>
								<h2>Other Headlines</h2>
							</div>
							<ul class="other-stroies">
							<?php foreach ($Headlines as $post) { ?>
								<li><a href="<?php echo site_url('news/'.$post->timeline_id); ?>"><?php echo $post->timeline_title; ?></a></li>
							<?php } ?>
							</ul>
						</div>
						<!-- Top Story -->

					</div>
					<!-- Top Stroy Nd Add -->

					<!-- Top Stroy Nd Add -->
					<div class="col-lg-3 col-sm-6 col-xs-6 r-full-width pull-right nonex	">
						
						<div class="match-fixture">
							<h5 class="text-muted">Match Fixture</h5>
							<div class="content-widget position-r ">
								<div class="item">
									<div class="team-btw-match style-2">
									<?php 
									if(!empty($Match))
									{
										foreach ($Match as $key) 
										{
											echo '<ul>';
											echo '<small><strong>'.$key->tName.'</strong></small><br>';
											echo '<p class=\'pull-right\'>'.date('d/M/Y',$key->dates).' - '.date('h:i A',$key->times).'</p>';
											echo '<div class=\'clearfix\'></div>
											<li>
												<span>'.$key->teamA.'</span>
											</li>
											<li>
												<span>'.$key->teamB.'</span>
											</li>
											</ul><br>';
										}
									}
									else
									{
										echo '<label>No match available!</label><br>';
									}
									 ?>
									 <br>
									<a class="btn-xs btn-default pull-right" href="<?php echo site_url('matchr'); ?>">Show details <i class="fa fa-caret-right"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Match Fixture -->
						<!-- Latest Result -->
						<div class="match-fixture">
							<h5 class="text-muted">Latest Result</h5>
							<div class="content-widget position-r ">
								<div class="item">
									<div class="team-btw-match style-2">
									<?php 
									if(!empty($result))
									{
										foreach ($result as $key) 
										{
											$score = explode('v', $key->score);
											echo '<ul>
											<small><strong>'.$key->tName.'</strong></small><br>
											<li>
												<span><span>'.$score[0].'</span><h5>'.$key->teamA.'</h5></span>
											</li>
											<li>
												<span><span>'.$score[1].'</span><h5>'.$key->teamB.'</h5></span>
											</li>
											</ul>';
											echo '<div class=\'clearfix\'></div>';
											echo '<br>';
										}
									}
									else
									{
										echo '<label>No match available!</label><br>';
									}
									 ?>
									<a class="btn-xs btn-default pull-right" href="<?php echo site_url('matchr'); ?>">Show details <i class="fa fa-caret-right"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- latest result -->
					</div>
					<!-- Top Stroy Nd Add -->

					<!-- News Post -->
					<div class="col-lg-6 col-xs-12">
					<h5><strong class="text-muted">Latest Post</strong></h5>
						<div class="news-post-holder">
						<?php foreach ($Timeline as $post) { ?>
							<!-- Widget -->
							<div class="news-post-widget">
								<img src="<?php echo site_url('assets/uploads/ThumbnailPost/').$post->timeline_thumbnail; ?>" alt="img">
								<div class="news-post-detail">
									<span class="date"><?php echo date('l, d M Y', $post->timeline_date); ?></span>
									<h2><a href="<?php echo site_url('news/'.$post->timeline_id); ?>"><?php echo $post->timeline_title; ?></a></h2>
									<?php echo substr($post->timeline_details, 0, 200); ?>
									<br>
									<a href="<?php echo site_url('news/'.$post->timeline_id); ?>">See more</a>
								</div>
							</div>
							<!-- Widget -->
						<?php }  ?>
						</div>
					</div>
					<!-- News Post -->

				</div>
			</div>	
		</section>
		<!-- Mtach Detail Content -->
	</main>
	<!-- Main Content -->
<script>
$(document).ready(function() {
	$('#ticker').newsTicker({
		max_rows:1,
		duration:4000,
		pauseOnHover:1,
		direction: 'up',

	});
});
</script>