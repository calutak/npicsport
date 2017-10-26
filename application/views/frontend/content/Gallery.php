
	<!-- Page Heading & Breadcrumbs  -->
	<div class="page-heading-breadcrumbs">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li>Gallery Views</li>
			</ul>
		</div>
	</div>
	<!-- Page Heading & Breadcrumbs  -->

	<!-- Page Heading banner -->
	<!-- <div class="overlay-dark theme-padding parallax-window" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/inner-banner/img-01.jpg"></div> -->
	<!-- Page Heading banner -->

	<!-- Main Content -->
	<main class="main-content">

		<!-- Gallery Views -->
		<div class="theme-padding white-bg">
			<div class="container">

				<!-- Gallery 3 Column -->
				<div class="gallery style-2">
					<h2>Gallery</h2>
					<div class="row">
						<?php if (!empty($gallery)): ?>
							<?php foreach ($gallery as $key): ?>
								<div class="col-sm-4 col-xs-6 r-full-width">
									<figure class="gallery-figure">
										<img src="<?php echo site_url("assets/uploads/Gallery/".$key->timeline_thumbnail); ?>" alt="">
										<figcaption class="overlay">
											<div class="position-center-center">
												<ul class="btn-list">
													<li><a href="<?php echo site_url("assets/uploads/Gallery/".$key->timeline_thumbnail); ?>" data-rel="prettyPhoto[gallery-v2]" title="<?php echo $key->timeline_details; ?>"><i class="fa fa-search"></i></a></li>
												</ul>
											</div>
										</figcaption>
									</figure>
									<div class="gallery-img-heading">
										<h5><?php echo $key->timeline_title; ?></h5>
									</div>	
								</div>
							<?php endforeach ?>		
						<?php endif ?>

					</div>
				</div>
				<!-- Gallery 3 Column -->

			</div>
		</div>
		<!-- Gallery Views -->

	</main>
	<!-- Main Content -->

</div>