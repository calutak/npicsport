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
        		
        		.form_submit('add_pools', 'Create Pool', 'class=\'btn btn-default\'')
        		.form_close(); 
        	?>
        </div>
        <div class="box-footer with-border">
            <h3>Add Constrain</h3>
        </div>
    </div>
</section>