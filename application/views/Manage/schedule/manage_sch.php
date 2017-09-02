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
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Responsive Hover Table</h3>

                  <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
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
                echo form_submit('sd','sd','class=\'btn btn-info\'');
                form_close();
            ?>
        </div>
    </div>
</section>