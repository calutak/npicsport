<!-- Page Heading & Breadcrumbs  -->
<div class="page-heading-breadcrumbs">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="#">Home</a></li>
			<li>Team Grid</li>
		</ul>
	</div>
</div>
<!-- Page Heading & Breadcrumbs  -->	

<!-- Main Content -->
<main class="main-content">
<div class="panel panel-default">
	<div class="panel-body col-lg-9 col-md-offset-2">
		<br>
	<h3>Team Registered</h3>
		<table id="teamdata" data-order='[[ 0, "asc" ]]' data-page-length='10' class="table table-striped table-bordered" cellspacing="0" width="100%">
		    <thead>
		    	<tr>
			        <th>No</th>
			        <th>Team</th>
			        <th>Major</th>
			        <th>Year</th>
			        <th>Participated on (Tournament)</th>
			        <th>Action</th>
		      	</tr>
		    </thead>
		    <tbody>
		    <?php $i=1; foreach ($Team as $key) { ?>
		    	<tr>
			        <td><?php echo $i; ?></td>
			        <td><?php echo $key->teamname; ?></td>
			        <td><?php echo $key->major; ?></td>
			        <td><?php echo $key->year; ?></td>
			        <td><?php echo $key->trname; ?></td>
			        <td><a href="<?php echo site_url('team/'.$key->teamid.'/details'); ?>" class="btn-sm btn-info">Details</a></td>
		      	</tr>
			<?php $i++; } ?>
		    </tbody>
	  	</table>
	</div>
	<div class="clearfix"></div>
	<div class="panel-footer">
	<h5><strong>Legend</strong></h5>
		<dl class="dl-horizontal">
		  <dt>AE</dt>
		  <dd>Automobile Engineering</dd>
		  <dt>CAD</dt>
		  <dd>CAD/CAM (High Diploma Degree)</dd>
		  <dt>CE</dt>
		  <dd>Civil Engineering</dd>
		  <dt>CA</dt>
		  <dd>Culinary Arts</dd>
		  <dt>ELC</dt>
		  <dd>Electronic Engineering</dd>
		  <dt>ELE</dt>
		  <dd>Electrical Engineering</dd>
		  <dt>CS</dt>
		  <dd>Computer Science</dd>
		  <dt>ME</dt>
		  <dd>General Mechanical Engineering</dd>
		  <dt>TH</dt>
		  <dd>Tourism and Hospitality</dd>
		</dl>
	</div>	
</div>
</main>
<!-- Main Content -->
<script>
$(document).ready(function() {
	$('#teamdata').DataTable();
});
</script>