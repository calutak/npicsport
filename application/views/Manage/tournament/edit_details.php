<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tournament
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="#"></i> Tournament</a></li>
        <li><a href="#"></i> Edit</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Tournament</h3>
	</div>
	<div class="box-body">
		<form method="post" action="<?php echo site_url('adm/tournament/update/confirm'); ?>" role="form">
		<div class="form-group col-md-4">
			<label>Tournament ID</label>
			<input type="hidden" name="t_id" class="form-control" value="<?php echo $rowbyid->tournament_id; ?>">
			<input type="text" class="form-control" value="<?php echo $rowbyid->tournament_id; ?>" disabled>
		</div>
		<div class="form-group col-md-4">
			<label>* Tournament Name</label>
			<input type="text" name="t_name" class="form-control" value="<?php echo $rowbyid->tournament_name; ?>" required>
		</div>
		<div class="form-group col-md-4">
		    <label>* Registration Date</label>
		    <div class="input-group">
		      <div class="input-group-addon">
		        <i class="fa fa-calendar"></i>
		      </div>
		      <input class="form-control pull-right" name="rdate" id="reservation2" type="text">
		    </div>
		</div>
		<div class="form-group col-md-4">
		    <label>* Tournament Date</label>
		    <div class="input-group">
		      <div class="input-group-addon">
		        <i class="fa fa-calendar"></i>
		      </div>
		      <input class="form-control pull-right" name="tdate" id="reservation" type="text">
		    </div>
		</div>
		<div class="form-group col-xs-4">
			<label>* Sport type</label>
			<select name="select2" class="form-control select2">
				<option value="Football (Soccer)" selected>Football (Soccer)</option>
			</select>
		</div>
		<div class="form-group col-xs-2">
			<label>* Max Team / Faculty</label>
			<input type="text" name="max_team_fac" class="form-control col-xs-2" value="<?php echo $setting->max_team_faculty; ?>">
		</div>
		<div class="form-group col-xs-2">
			<label>* Max Team</label>
			<input type="text" name="max_team" class="form-control col-xs-2" value="<?php echo $setting->max_team; ?>">
		</div>
		<div class="form-group col-xs-2">
			<label>* Max Member</label>
			<input type="text" name="max_mem" class="form-control col-xs-2" value="<?php echo $setting->max_member; ?>">
		</div>
		<div class="form-group col-xs-2">
			<label>* Game Duration</label>
			<input type="text" name="game_dur" class="form-control col-xs-3" value="<?php echo $setting->game_duration; ?>" required>
		</div>
		<div class="form-group col-md-12">
			<label>Description</label>
			<textarea name="description" class="form-control" rows="3"><?php echo $rowbyid->tournament_desc; ?></textarea>
		</div>
		<div class="form-group col-md-12">
			<label>Rules</label>
			<textarea name="rules" class="form-control" rows="6"><?php echo $rowbyid->tournament_rules; ?></textarea>
		</div>
		<div class="form-group col-md-12">
			<label>Requirements</label>
			<textarea name="req" class="form-control" rows="6"><?php echo $rowbyid->tournament_req; ?></textarea>
	</div>
	<div class="box-footer">
		<div class="form-group col-md-1">
			<button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
		</div>
		</form>
		<div class="form-group col-md-1">
			<a href="<?php echo site_url('adm/tournament/manage'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
		</div>
	</div>
	</div>
</section>

<script>
$('#reservation').daterangepicker({
    "startDate": "<?php echo date('m/d/Y',$rowbyid->tournament_start); ?>",
    "endDate": "<?php echo date('m/d/Y',$rowbyid->tournament_end); ?>"
});
$('#reservation2').daterangepicker({
    "startDate": "<?php echo date('m/d/Y',$rowbyid->registration_start); ?>",
    "endDate": "<?php echo date('m/d/Y',$rowbyid->registration_end); ?>"
});
</script>