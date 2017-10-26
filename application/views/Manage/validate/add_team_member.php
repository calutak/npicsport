<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Register Team
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/team/new')?>">Add Team</a></li>
        <li><a href="<?php echo site_url('adm/team/add/'.$mid.'/member')?>">Add Member</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php echo $this->session->flashdata('response'); ?>
  <div id="kv-avatar-errors-2" class="center-block" style="width:800px;display:none"></div>
  <div class="box box-primary">
    <?php 
    	echo form_open_multipart(site_url('adm/team/add/'.$mid.'/member/post')); 
    ?>
    <div class="box-header with-border">
      <h3 class="box-title">Add Member</h3>
      <div id="idx" class="pull-right"> <?php echo ($curMem+1).' of '.$maxMem ?></div>
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
		    echo form_upload('ava', set_value('ava'), 'id=\'avatar-2\'');
		    echo '</div>';
		    echo '<div class=\'col-sm-8\'>';
			echo form_label('Team ID', 'team');
			echo form_hidden('teamid', $mid);
			echo form_input('team', $mid, 'class=\'form-control\' disabled');
			echo '</div>';
		    echo '<div class=\'col-sm-8\'>';
			echo form_label('Member Name', 'mName');
			echo form_input('mName', set_value('mName'), 'class=\'form-control\' placeholder=\'Member Name\'');
			echo form_error('mName');
			echo form_label('Member Email', 'mMail');
			echo form_input('mMail', set_value('mMail'), 'class=\'form-control\' placeholder=\'Member Email\'');
			echo form_error('mMail');
			echo form_label('Date of Birth', 'dob');
			echo form_input('dob', set_value('dob'), 'class=\'form-control dob\' placeholder=\'Date of Birth\'');
			echo form_error('dob');
			echo form_label('Major', 'mMajor');
			echo form_dropdown('mMajor', $majorList, $major, 'class=\'form-control\'');
			echo form_error('mMajor');
			echo form_label('Year', 'mYear');
			echo form_input('mYear', $year, 'class=\'form-control\' placeholder=\'Year\'');
			echo form_error('mYear');
			echo '</div>';
		?>
    </div>
    <hr>
    <div class="box-footer">
    	<?php 
			echo form_submit('addmem','Add Member','class=\'btn btn-default pull-right\'');
			echo anchor(site_url('adm/manage/team/'.$mid), 'Cancel', 'class=\'btn btn-warning\'');
			echo form_close();  
		?>	
    </div>
  </div>
</section>
<script>
$(document).ready(function () {
	$('.dob').datepicker();
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
	    defaultPreviewContent: '<img src="<?php echo site_url('assets/dist/img/avatar5.png'); ?>" alt="Your Avatar"><h6 class="text-muted">Click to select</h6>',
	    layoutTemplates: {main2: '{preview} {remove} {browse}'}
	});
});
</script>
