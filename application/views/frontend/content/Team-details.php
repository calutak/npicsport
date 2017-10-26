<div class="page-heading-breadcrumbs">

	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="#">Home</a></li>
			<li><a href="<?php echo site_url('team'); ?>">Team</a></li>
			<li><?php echo $tname; ?></li>
		</ul>
	</div>
</div>
<!-- Page Heading & Breadcrumbs  -->

<!-- Main Content -->
<main class="main-content">	
	<!-- Team Detail -->
	<div class="team-detail-holder theme-padding white-bg">
		<div class="container">
		<!-- Row Holder -->
		<div class="row">
		<?php if(!empty($member)) { ?>
		<div class="panel-body">
			<?php foreach ($member as $key): ?>
			<div class='col-sm-4 text-center'>
				<div id="avatar-2">
					<img src="<?php echo site_url('assets/uploads/Team/'.$key->photo); ?>" alt="asda">
				</div>
			</div>
			<div class='col-sm-8'>
				<label>Team Name</label>
				<input type="text" class="form-control" value="<?php echo $key->teamname; ?>" readonly>
			</div>
			<div class='col-sm-8'>
				<label>Member Name</label>
				<input type="text" class="form-control" value="<?php echo $key->mname; ?>" readonly>
				<label>Member Major</label>
				<input type="text" class="form-control" value="<?php echo $key->major; ?>" readonly>
				<label>Year</label>
				<input type="text" class="form-control" value="<?php echo $key->year; ?>" readonly>
			</div>
			<div class="clearfix"></div>
			<hr>
			<?php endforeach ?>
		</div>
		<?php } else { ?>
		<div class="panel-body">
			<h2>No Member!</h2>
		</div>
		<?php } ?>
	    </div>
		</div>
	</div>
	<!-- Team Detail -->

</main>
<!-- Main Content -->
