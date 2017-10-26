<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo $registered_team; ?></h3>

            <p>Team Registered</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo site_url('adm/manage/team'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal">
          <div class="inner">
            <h3><?php echo $match_count; ?></h3>

            <p>Match Ready for Update</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-football-outline"></i>
          </div>
          <a href="<?php echo site_url('adm/match'); ?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-blue">
          <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Events</span>
            <span class="info-box-number"><?php echo $tournament_count; ?> Event</span>

            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
                <span class="progress-description">
                  Scheduled
                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
          <span class="info-box-icon"><i class="fa fa-envelope"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Message</span>
            <span class="info-box-number"><?php echo $message_count; ?> Messages</span>

            <div class="progress">
              <div class="progress-bar" style="width: 100%"></div>
            </div>
                <span class="progress-description">
                  Recieved
                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
    <!-- /.row -->
    
</section>
<!-- /.content -->