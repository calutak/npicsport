	<!-- Page Heading & Breadcrumbs  -->
	<div class="page-heading-breadcrumbs">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li>Tournament</li>
			</ul>
		</div>
	</div>
	<!-- Page Heading & Breadcrumbs  -->	

	<div class="form-group">
    <center><h3><strong>Choose Tournament Data</strong></h3></center>
    <br>
		<?php echo form_open(site_url('tournament/load_bracket')); ?>
    <div class="col-md-5 col-md-offset-3">
			<select name="select" class="form-control">
        <?php foreach ($tournament as $tourname) {
          echo '<option value=\''.$tourname->tournament_id.'\'>'.$tourname->tournament_name.'</option>';
        } ?>
      </select>
    </div>
    <div class="col-sm-2">
		<?php 
			echo form_submit('submit','Go','class=\'btn btn-success\'');
			echo form_close(); 
		?>
    </div>
	</div>
  <div class="clearfix"></div>
  <br>
  <div class="col-md-8 col-md-offset-2">
    <div id="tournament_details" class="panel panel-default">
      <div class="panel-heading">
        <h3>Tournament Details</h3>
      </div>
      <div class="panel-body">
        <table class="table table-responsive">
          <tr class="tname"></tr>
          <tr class="regdate"></tr>
          <tr class="tdate"></tr>
          <tr class="desc"></tr>
          <tr class="req"></tr>
          <tr class="rules"></tr>
          <tr class="registeredteam"></tr>
          <tr class="stat"></tr>
        </table>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-md-6 col-md-offset-3 bracket panel">
    <div class="panel panel-heading">
      <h3>Result : </h3>
    </div>
    <div id="minimal"><div class="demo"></div></div>
  </div>
</div>
<div class="clearfix"></div>

<script>
$(function () {
  $(".select").select2();
  $('.bracket').hide();
  $('#tournament_details').hide();
	$('form').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
      	type: $(this).attr('method'),
      	url: $(this).attr('action'),
      	data: $(this).serialize(),
      	success: function(data) {
          var d = JSON.parse(data);
          console.log(d);
          var minimalData = {
            teams: d.team,
            results: d.result
          }
          $('.tname').html("<td><strong>Tournament Name</strong></td><td>"+d.tname+"</td><td></td>");
          $('.regdate').html("<td><strong>Registration Open</strong></td><td colspan='2'>"+d.rstart+" - "+d.rend+"</td>");
          $('.tdate').html("<td><strong>Tournament Start</strong></td><td colspan='2'>"+d.tstart+" - "+d.tend+"</td>");
          $('.desc').html("<td><strong>Description</strong></td><td colspan='2'>"+d.desc+"</td>");
          $('.req').html("<td><strong>Requirements</strong></td><td colspan='2'>"+d.req+"</td>");
          $('.rules').html("<td><strong>Rules</strong></td><td colspan='2'>"+d.rules+"</td>");
          $('.registeredteam').html("<td><strong>Team Registered</strong></td><td colspan='2'>"+d.rt+"</td>");
          var stat = '';
          if(d.stat == 0)
          {
            stat = "<td class='info' colspan='2'>Registration Open</td>";
          } 
          else if (d.stat == 1)
          {
            stat = "<td class='warning' colspan='2'>Drawing Match</td>";
          } 
          else if (d.stat == 2)
          {
            stat = "<td class='success' colspan='2'>Drawing End</td>";
          } 
          else if (d.stat == 3)
          {
            stat = "<td class='info' colspan='2'>Scheduled</td>";
          } 
          else if (d.stat == 4)
          {
            stat = "<td class='success' colspan='2'>Start</td>";
          }
          else if (d.stat == 5)
          {
            stat = "<td class='danger' colspan='2'>Ended</td>";
          }
          $('.stat').html("<td><strong>Tournament Status</strong></td>"+stat);
          $('#tournament_details').show();
          if(d.stat > 2)
          {
            $(function() {
              $('.bracket').show();
              $('#minimal .demo').bracket({
                init: minimalData,
                skipConsolationRound: false
              })
            });
          }
      	}
      });
    }); 
});
</script>