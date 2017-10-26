<form action="<?php echo site_url('adm/schedule/edit/').$sid.'/'.$mid.'/'.$tid; ?>" method="POST">
<?php
  echo '<div class="modal-body">'; 
  echo '<div class=\'form-group\'>';
  echo form_label('Schedule ID', 'sid');
  if(isset($row_schedule)) {
    echo form_input('sid', $row_schedule->schedule_id, 'class=\'form-control\' readonly');
  } else {
    echo form_input('sid', '', 'class=\'form-control\' readonly');
  }
  echo '</div>';
  echo '<div class=\'form-group\'>';
  echo '<div class=\'col-sm-6\'>';
  echo form_label('List Unused Date', 'dates');
  echo '<div id=\'schedule-list\'>';
  foreach ($list_schedule as $sc) {
    echo date('d/M/Y',$sc->schedule_date).' - '.date('h:i a',$sc->schedule_time).'<br>';
  }
  echo '</div>';
  echo '</div>';
  echo '<div class=\'col-sm-6\'>';
  echo form_label('Schedule Date', 'date');
  echo '<div class="has-error date_err"><span class="help-block">Date Used!</span></div>';
  if(isset($row_schedule)) {
    echo form_input('date', date('m/d/Y',$row_schedule->schedule_date), 'id=\'dates\' class=\'form-control\'');
  } else {
    echo form_input('date', '', 'id=\'dates\' class=\'form-control\'');
  }
  echo form_label('Schedule Time', 'time');
  echo '<div class="has-error time_err"><span class="help-block">Time Used!</span></div>';
  if(isset($row_schedule)) {
    echo form_input('time', date('h:i a',$row_schedule->schedule_time), 'id=\'times\' class=\'form-control\'');
  } else {
    echo form_input('time', '', 'id=\'times\' class=\'form-control\'');
  }
  echo '</div>';
  echo '</div>';
  echo '<div class=\'clearfix\'></div>';
  echo '</div>';
  echo '<div class="modal-footer">';
  echo form_submit('update', 'Update', 'class=\'btn btn-default\'');
  echo '</div>';
?> 
<input type="hidden" id="sDate" value="<?php echo date('m/d/Y',$data_tournament->tournament_start); ?>">
<input type="hidden" id="eDate" value="<?php echo date('m/d/Y',$data_tournament->tournament_end); ?>">
</form>
