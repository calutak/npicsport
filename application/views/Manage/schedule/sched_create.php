<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Schedule
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('schedule/view')?>">Schedule</a></li>
        <li><a href="<?php echo site_url('schedule/create')?>">Create</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Schedule</h3>
        </div>
        <div class="box-body">
        	<?php 
        	echo form_open() 
                .$team_count
        		.'<h4>Add Times</h4>'
        		.anchor('#', 'Add Times', 'class=\'btn btn-default\'').'&nbsp;'
        		.anchor('#', 'Save', 'class=\'btn btn-default\'').'&nbsp;'
        		.form_submit('create_schedule', 'Create Schedule', 'class=\'btn btn-info\'')
        		.form_close(); 
        	?>
        </div>
        <div class="box-footer with-border">
            <h4>Add Constrain</h4>
        </div>
    </div>
</section>

