<hr>
<form id="upd" action="<?php echo site_url('adm/match/update'); ?>" method="post">
	<input type="hidden" name="tid" value="<?php echo $tid; ?>">
	<div class="col-md-12">
	<label>List Match</label><br>
	<?php
	$i=0; 
	foreach ($match_list as $row) 
	{ 
		$score = explode('v', $row->score);
		if(!empty($row->teamA) && !empty($row->teamB))
		{
	?>	
		<div class="col-sm-3" style="border: .5px solid;">
		<label>Group <?php echo ($i+1); ?> - Round <?php echo $row->round; ?></label><br>
		<label id="A<?php echo $row->mId; ?>">
			<?php echo (!empty($row->teamA) ? $row->teamA : "Upcoming");  ?>
		</label>
		<input type="text" id="scA<?php echo $row->mId; ?>" class="form-control" name="updateallA[]" value="<?php echo $score[0]; ?>">
		<center><h4>VS</h4></center>
		<input type="text" id="scB<?php echo $row->mId; ?>" class="form-control" name="updateallB[]" value="<?php echo $score[1]; ?>">
		<label class="pull-right" id="B<?php echo $row->mId; ?>">
			<?php echo (!empty($row->teamB) ? $row->teamB : "Upcoming");  ?>
		</label><br>
		<div class="clearfix"></div>
		<center><button id="<?php echo $row->mId; ?>" class="btn btn-app edit"><i class="fa fa-save"></i>Update</button></center>
		</div>
	<?php
	$i++; 
		}
	} 
	?>
	</div>
	<div class="clearfix"></div>
	<hr>
	<div class="col-md-2 pull-right">
		<button class="btn btn-default updateAll"><i class="fa fa-save"></i> Update All Match</button>
		<!-- <a href="<?php //echo site_url('adm/match/updateAll'); ?>" class="btn btn-default updateAll"><i class="fa fa-save"></i> Update All Match</a> -->
	</div>
</form>