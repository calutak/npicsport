<div class="page-heading-breadcrumbs">

	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="#">Home</a></li>
			<li>News</li>
		</ul>
	</div>
</div>
<!-- Page Heading & Breadcrumbs  -->

<!-- Main Content -->
<main class="main-content">	
	<!-- Team Detail -->
	<div class="news-post-holder">
		<div class="container">
		<!-- Row Holder -->
		<div class="row">
		<div class="panel-heading">
			<h4><?php echo $news->timeline_title; ?></h4>
			<h5 class="text-muted pull-right"><?php echo date('l, d M Y',$news->timeline_date); ?></h5>
		</div>
		<div class="panel-body">
			<div class="news-post-widget">
				<img src="<?php echo site_url('assets/uploads/ThumbnailPost/').$news->timeline_thumbnail; ?>" alt="img">
			</div>
			<div class="news-post-detail">
				<?php echo $news->timeline_details; ?>
			</div>
		</div>
	    </div>
		</div>
	</div>
	<!-- Team Detail -->

</main>
<!-- Main Content -->
