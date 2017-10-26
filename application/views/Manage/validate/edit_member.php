<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Register Team
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/manage/team')?>">Team</a></li>
        <li><a href="<?php echo site_url('adm/manage/team/'.$dtt->team_id)?>">List Member</a></li>
        <li><a href="<?php echo site_url('adm/team/member/'.$dtt->team_id.'/edit/'.$dtm->member_id)?>">Edit Member</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php echo $this->session->flashdata('response'); ?>
  <div id="kv-avatar-errors-2" class="center-block" style="width:800px;display:none"></div>
  <div class="box box-primary">
    <?php
    	echo form_open_multipart(site_url('adm/team/member/'.$dtt->team_id.'/edit/'.$dtm->member_id.'/confirm')); 
    ?>
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo 'Edit Member '.$dtm->member_id.' from Team '.$dtt->team_name; ?></h3>
    </div>
    <div class="box-body">
		<?php 
			$majorList = array(
	            'AE' => 'Automobile Engineering',
	            'CAD' => 'CAD/CAM (High Diploma Degree)',
	            'CE' => 'Civil Engineering',
	            'CA' => 'Culinary Arts',
	            'ELC' => 'Electronic Engineering',
	            'ELE' => 'Electrical Engineering',
	            'CS' => 'Computer Science',
	            'GME' => 'General Mechanical Engineering',
	            'TH' => 'Tourism and Hospitality'
          	);
			echo '<div class=\'col-sm-4 text-center\'>';
		    echo form_upload('ava', set_value('ava'), 'id=\'avatar-2\' required');
		    echo '</div>';
		    echo '<div class=\'col-sm-8\'>';
			echo form_label('Team ID', 'team');
			echo form_input('team', $dtt->team_id, 'class=\'form-control\' disabled');
			echo form_label('Member ID', 'member');
			echo form_input('member', $dtm->member_id, 'class=\'form-control\' disabled');
			echo '</div>';
		    echo '<div class=\'col-sm-8\'>';
			echo form_label('Member Name', 'mName');
			echo form_input('mName', $dtm->member_name, 'class=\'form-control\' placeholder=\'Member Name\'');
			echo form_error('mName');
			echo form_label('Member Email', 'mMail');
			echo form_input('mMail', $dtm->member_email, 'class=\'form-control\' placeholder=\'Member Email\'');
			echo form_error('mMail');
			echo form_label('Date of Birth', 'dob');
			echo form_input('dob', set_value('dob'), 'class=\'form-control dob\' placeholder=\'Date of Birth\'');
			echo form_error('dob');
			echo form_label('Major', 'mMajor');
			echo form_dropdown('mMajor', $majorList, $dtm->major, 'class=\'form-control\'');
			echo form_error('mMajor');
			echo form_label('Year', 'mYear');
			echo form_input('mYear', $dtm->year, 'class=\'form-control\' placeholder=\'Year\'');
			echo form_error('mYear');
			echo '</div>';
		?>
    </div>
    <hr>
    <div class="box-footer">
    	<?php 
			echo form_submit('update','Save','class=\'btn btn-default pull-right\'');
			echo anchor(site_url('adm/manage/team/'.$dtt->team_id), 'Cancel', 'class=\'btn btn-warning\'');
			echo form_close();  
		?>	
    </div>
  </div>
</section>
<script>
$(document).ready(function () {
	$('.dob').datepicker("setDate","<?php echo date('d/m/Y',$dtm->dob); ?>");
	$("#avatar-2").fileinput({
	    maxFileSize: 1500,
	    showClose: false,
	    showCaption: false,
	    showBrowse: false,
	    browseOnZoneClick: true,
	    removeLabel: 'Reset',
	    removeIcon: '<i class="fa fa-remove"></i>',
	    removeTitle: 'Cancel or reset changes',
	    elErrorContainer: '#kv-avatar-errors-2',
	    msgErrorClass: 'alert alert-block alert-danger',
	    defaultPreviewContent: '<img src="<?php echo site_url('assets/uploads/Team/'.$dtm->member_photo); ?>" alt="Your Avatar"><h6 class="text-muted">Click to select</h6>',
	    layoutTemplates: {main2: '{preview} {remove} {browse}'}
	});
});
</script>
