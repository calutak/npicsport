<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Schedule
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/schedule/view')?>">Schedule</a></li>
        <li><a href="<?php echo site_url('adm/schedule/create')?>">Create</a></li>
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
            <div class="col-md-12">
                <div class="box-body">
                    <h4> Match Found </h4>
                    <?php 
                    $i = 0;
                        foreach ($match as $m) {
                            echo '<div class="col-sm-3">';
                            echo '<label>'.($i+1).' Group</label>';
                            echo '<input type=\'text\' value=\''.$m['team_a'].'\' class=\'form-control\' disabled>';
                            echo '<center><h4>VS</h4></center>';
                            echo '<input type=\'text\' value=\''.$m['team_b'].'\' class=\'form-control\'disabled>';
                            echo '</div>';
                            $i++;
                        }
                    ?>
                </div>
            </div>
        	<?php
            $list_type = array('Knockout' => 'Knockout'); 
        	echo form_open(site_url('adm/schedule/create/'.$tid.'/add_new'))
                .'<div class=\'col-md-12\'>
                <h4><strong>Tournament Information</strong></h4>
                <hr>'
                .'<div class=\'form-group col-md-2\'>'
                .form_label('Total Team', 'team_c')
                .form_input('team_c', $team_count, 'class=\'form-control\' disabled')
                .form_hidden('team_count',$team_count)
                .'</div>
                <div class=\'form-group col-md-3\'>'
                .form_label('* Venue', 'venue')
                .form_input('venue', '', 'class=\'form-control\' placeholder=\'Venue\' required')
                .'</div>
                <div class=\'form-group col-md-2\'>'
                .form_label('Tournament Type', 'type')
                .form_dropdown('type', $list_type, 'Knockout', 'class=\'form-control\'')
                .'</div>
                <div class=\'form-group col-md-3\'>'
                .form_label('Tournament Date', 'tdate')
                .form_input('tdate', date('d/M/Y',$row_tournament->tournament_start).' - '.date('d/M/Y',$row_tournament->tournament_end), 'class=\'form-control\' disabled')
                .form_hidden('start_tour',$row_tournament->tournament_start)
                .form_hidden('end_tour',$row_tournament->tournament_end)
                .'</div>
                <div class=\'form-group col-md-2\'>'
                .form_hidden('gameduration',$setting->game_duration)
                .'</div>
                </div>
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
                .form_label('Start Time', 'start_time')
                .form_input('start_time', '', 'class=\'form-control\' id=\'start_time\' placeholder=\'Start\' required')
                .'</div>'
                .'<div class=\'form-group col-md-2\'>'
                .form_label('End Time', 'end_time')
                .form_input('end_time', '', 'class=\'form-control\' id=\'end_time\' placeholder=\'End\' required')
                .'</div>'
                .'<div class=\'form-group col-md-3\'>'
                .form_label('Time Gap per Games', 'time_gap')
                .form_input('time_gap', '', 'class=\'form-control\' placeholder=\'Gap in minutes\' required')
                .'</div>
                <div class=\'col-md-12\'>
                <h4><strong>Action</strong></h4>
                <hr>'
                .form_submit('create_schedule', 'Create Schedule', 'class=\'btn btn-info\'')
                .'</div>'
        		.form_close(); 
        	?>
        </div>
        <div class="box-footer with-border">
            <?php 
            if(isset($list_date))
            {
                foreach ($list_date as $key) {
                    echo $key.'<br>';
                }
            } 
            ?>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        $('#start_time').timepicker({
            timeFormat: 'h:i a',
              minTime: '08:00am',
              maxTime: '02:00pm',
              scrollbar: true
        });
        $('#end_time').timepicker({
            timeFormat: 'h:i a',
              minTime: '12:00pm',
              maxTime: '05:00pm',
              scrollbar: true
        });
    });
</script>
