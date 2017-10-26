
	<!-- Page Heading & Breadcrumbs  -->
	<div class="page-heading-breadcrumbs">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li>Match Fixtures</li>
			</ul>
		</div>
	</div>
	<!-- Page Heading & Breadcrumbs  -->

	<!-- Main Content -->
	<main class="main-content">	

	<div class="form-group">
    <center><h3><strong>Filter Match Data</strong></h3></center>
    <br>
		<?php echo form_open(site_url('matchr/load_match')); ?>
	<div class="col-md-6 col-md-offset-3">
    <div class="col-md-5">
      <label>Tournament Name</label>	
	  <select id="tname" name="tid" class="form-control">
	  	<option selected disabled>Select Tournament</option>
        <?php foreach ($tournament as $tourname) {
          echo '<option value=\''.$tourname->tournament_id.'\'>'.$tourname->tournament_name.'</option>';
        } ?>
      </select>
    </div>
    <div class="col-md-6">
      <label>Date</label>
	  <select id="comboDate" name="date" class="form-control" disabled>
	  	<option selected disabled>Select Date</option>
      </select>
    </div>
    <div class="col-md-1">
    	<label>&nbsp;</label>
		<?php 
			echo form_submit('submit','Go','class=\'btn btn-success\'');
			echo form_close(); 
		?>
    </div>
	</div>
	<div class="clearfix"></div>
	</div>	
	<!-- Match Result -->
	<div class="theme-padding white-bg">
		<div class="container">
			<div class="row">
				
				<!-- Match Result Contenet -->
				<div class="col-lg-9 col-sm-8 col-lg-offset-2">

					<!-- Matches Result Shedule -->
					<div id="listM" class="matches-dates-shedule style-2">
						<div class="result-top-bar">
							<span class="pull-left">Match Fixtures</span>
							<span class="pull-right"></span>
						</div>
						<ul>

						</ul>
					</div>

				</div>
				<!-- Match Result Contenet -->
			</div>
		</div>
	</div>
	<!-- Match Result -->
</main>
<!-- Main Content -->
<script>
$(document).ready(function () {
	$('#listM').hide();
	$('#tname').change(function() {
	var url = '<?php echo site_url('matchr/retrieve_list_date/'); ?>'+$(this).val();
	// console.log(url);
		$.get(url,function(data) {
			var d = JSON.parse(data);
			var option = '';
			console.log(d);
			$.each(d, function(key, value) {
				option += '<option value="'+key+'">'+value+'</option>';
			});
			$('#comboDate').prop('disabled', false);
			$('#comboDate').html(option);
		});	
	});
	$('form').on('submit', function(e) {
    	e.preventDefault();
    	$.ajax({
    		type: $(this).attr('method'),
	      	url: $(this).attr('action'),
	      	data: $(this).serialize(),
	      	success: function(data) {
	      		var d = JSON.parse(data);
	      		console.log(d);
	      		var mdata = '';
				$.each(d, function(key, value) {
					if (value.stat!=0) {
					mdata += '<li> '+
							'<span class="pull-left">'+value.teamA+'</span>' +
							'<span class="pull-right">'+value.teamB+'</span>' +
							'<div class="detail">' +
								'<span class="result-vs">'+value.score+'</span>' +
								'<div class="location-marker">' +
									'<ul>' +
										'<li><i class="fa fa-map-info"></i>Finished</li>' +
										'<li><i class="fa fa-map-marker"></i>'+value.loc+'</li>' +
									'</ul>' +
								'</div>' +
							'</div>' +
							'</li>';
					} else {
					mdata += '<li> '+
					'<span class="pull-left">'+value.teamA+'</span>' +
					'<span class="pull-right">'+value.teamB+'</span>' +
					'<div class="detail">' +
						'<span class="result-vs">'+value.score+'</span>' +
						'<div class="location-marker">' +
							'<ul>' +
								'<li><i class="fa fa-map-info"></i>Upcoming</li>' +
								'<li><i class="fa fa-map-marker"></i>'+value.loc+'</li>' +
							'</ul>' +
						'</div>' +
					'</div>' +
					'</li>';
					}
					$('#listM ul').html(mdata);
					$('#listM').show();
				});
	      	}
    	});
    });
});
</script>