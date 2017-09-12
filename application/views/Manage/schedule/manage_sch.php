<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Schedule
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/schedule/view')?>">Schedule</a></li>
        <li><a href="<?php echo site_url('adm/schedule/manage')?>">Manage</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary">
      <div class="box-header with-border">
          <h3 class="box-title">Manage Schedule</h3>
      </div>
      <?php form_open(); ?>
      <div class="box-body">
          <div class="col-xs-9">
          <div class="box no-border box-list">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover no-border">
                <?php
                foreach ($list_match as $matches) 
                { ?>
                  <tr class="bg-gray-active color-palette">
                    <th>
                    <?php 
                      if(empty($matches->dates))
                      {
                        echo 'TBD';
                      }
                      else
                      {
                        echo date('l, d/M/Y', $matches->dates);
                      } 
                    ?>
                    </th>
                    <th></th>
                    <th></th>
                  </tr>
                  <tr class="bg-gray color-palette">
                    <td class="pull-left"><?php echo $matches->loc; ?></td>
                    <td><?php echo date('h:i A', $matches->times); ?></td>
                    <td class="pull-right"><a href="#"><i class="fa fa-edit"></i></a></td>
                  </tr>
                  <tr>
                    <?php
                    $score = explode('v', $matches->score);
                    if(!empty($matches->teamA)) {
                      echo '<td class="pull-left">'.$matches->teamA.'</td>';
                    } else {
                      echo '<td class="pull-left"> Waiting Opponent </td>';
                    }
                    echo '<td>'.$score[0].' VS '.$score[1].'</td>';
                    if(!empty($matches->teamB)) {
                      echo '<td class="pull-right">'.$matches->teamB.'</td>';
                    } else {
                      echo '<td class="pull-right"> Waiting Opponent </td>';
                    } 
                    ?>
                  </tr>
                <?php 
                } 
                ?>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <div class="col-xs-3">
          <div class="box-list pull-right">
          <h4>List Uncsheduled Dates & Times</h4>
          <?php
              foreach ($list_schedule as $schedule) 
              {
                  echo date('h:i A', $schedule->schedule_time).' - '.date('d/M/Y', $schedule->schedule_date).'<br>';
              }
          ?>
          </div>
          </div>
      </div>
      <div class="box-footer with-border">
          <?php
              echo form_submit('update','Update Schedule','class=\'btn btn-info\'');
              form_close();
              echo anchor(site_url('adm/schedule/clear/'.$tid),'Erase Schedule','class=\'btn btn-danger delete\'');
          ?>
      </div>
  </div>
</section>

<script>
  $(document).ready(function () {
    $('.delete').on("click", function(e) {
      e.preventDefault();
      var url = $(this).attr('href');
      swal({
          title: 'Are you sure to clear all the schedule data?',
          text: "This will also clear all the match data!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then(function(isConfirm) {
          if (isConfirm) {
            swal("Deleted!", "All data cleared!", "success");
            setTimeout(function(){ window.location.replace(url); }, 1000);
          } else {
            swal("Cancel", "No data deleted.", "error");
          }
        });
    });
  });
</script>