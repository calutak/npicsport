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
            $list_sport_type = array('footbal(soccer)' => 'Football (Soccer)'); 
        	echo form_open(site_url('schedule/create/add_new'))
                .'<h4><strong>Tournament Information</strong></h4><hr>'
                .'<div class=\'form-group col-md-2\'>'
                .form_label('Total Team', 'team_c')
                .form_input('team_c', $team_count, 'class=\'form-control\' disabled')
                .form_hidden('team_count',$team_count)
                .'</div>'
                .'<div class=\'form-group col-md-3\'>'
                .form_label('Tournament Date', 'tdate')
                .'<div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>'
                    .form_input('tdate', date('d/M/Y',$row_tournament->tournament_start).' - '.date('d/M/Y',$row_tournament->tournament_end), 'class=\'form-control\' disabled')
                .form_hidden('start_tour',$row_tournament->tournament_start)
                .form_hidden('end_tour',$row_tournament->tournament_end)
                .'</div></div><div class=\'form-group col-md-2\'>'
                .form_label('Game Duration', 'gamedur')
                .form_input('gamedur', $row_tournament->game_duration, 'class=\'form-control\' disabled')
                .form_hidden('gameduration',$row_tournament->game_duration)
                .'</div>
                <div class=\'form-group col-md-5\'>'
                .form_label('Sport Type', 'sport_type')
                .form_dropdown('sport_type', $list_sport_type, 'football(soccer)', 'class=\'form-control\'')
                .'</div>
                <div class=\'col-md-12\'>
                <h4><strong>Add Times</strong></h4>
                <hr>
                <h5>Setting</h5>
                </div>
                <div class=\'form-group col-md-12\'>
                <span class=\'button-checkbox\'>'
                .form_button('mon', 'Monday', 'class=\'btn\' data-color=\'primary\'')
                .form_checkbox('day[]', 'Mon', false, 'class=\'hidden\'')
                .'</span>'
                .'<span class=\'button-checkbox\'>'
                .form_button('tue', 'Tuesday', 'class=\'btn\' data-color=\'primary\'')
                .form_checkbox('day[]', 'Tue', false, 'class=\'hidden\'')
                .'</span>'
                .'<span class=\'button-checkbox\'>'
                .form_button('wed', 'Wednesday', 'class=\'btn\' data-color=\'primary\'')
                .form_checkbox('day[]', 'Wed', false, 'class=\'hidden\'')
                .'</span>'
                .'<span class=\'button-checkbox\'>'
                .form_button('thu', 'Thursday', 'class=\'btn\' data-color=\'primary\'')
                .form_checkbox('day[]', 'Thu', false, 'class=\'hidden\'')
                .'</span>'
                .'<span class=\'button-checkbox\'>'
                .form_button('fri', 'Friday', 'class=\'btn\' data-color=\'primary\'')
                .form_checkbox('day[]', 'Fri', false, 'class=\'hidden\'')
                .'</span>'
                .'<span class=\'button-checkbox\'>'
                .form_button('sat', 'Saturday', 'class=\'btn\' data-color=\'primary\'')
                .form_checkbox('day[]', 'Sat', false, 'class=\'hidden\'')
                .'</span>'
                .'<span class=\'button-checkbox\'>'
                .form_button('sun', 'Sunday', 'class=\'btn\' data-color=\'primary\'')
                .form_checkbox('day[]', 'Sun', false, 'class=\'hidden\'')
                .'</span>'
                .'</div>'
                .'<div class=\'form-group col-md-2\'>'
                .form_input('start_time', '', 'class=\'form-control\' id=\'start_time\' placeholder=\'Start\' required')
                .'</div>'
                .'<div class=\'form-group col-md-2\'>'
                .form_input('end_time', '', 'class=\'form-control\' id=\'end_time\' placeholder=\'End\' required')
                .'</div>'
                .'<div class=\'form-group col-md-2\'>'
                .form_input('time_gap', '', 'class=\'form-control\' placeholder=\'Gap in minutes\' required')
                .'</div>'
        		.form_submit('create_schedule', 'Create Schedule', 'class=\'btn btn-info\'')
        		.form_close(); 
        	?>
        </div>
        <div class="box-footer with-border">
            <!-- <h4><strong>Add Constrain</strong></h4> -->
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        $('#start_time').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '8',
            maxTime: '6:00pm',
            startTime: '08:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
        $('#end_time').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '8',
            maxTime: '6:00pm',
            startTime: '08:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    });
</script>
