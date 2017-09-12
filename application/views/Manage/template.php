<body class="hold-transition skin-green sidebar-mini fixed">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo site_url('adm');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>NPSE</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>NPIC Sport</b> Admin</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-info">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url('assets'); ?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">NPIC Sport Admin</span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('adm/syslogout'); ?>">Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>NPIC Sport Admin</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Navigate</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?php echo site_url('adm');?>"> <i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-trophy"></i> <span>Tournament</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('adm/tournament/create');?>">Create</a></li>
            <li><a href="<?php echo site_url('adm/tournament/manage');?>">Manage</a></li>
            <li><a href="<?php echo site_url('adm/tournament/history');?>">History & Result</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-calendar-o"></i> <span>Schedule</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <?php if($tnumrows>0) 
            { 
              if($schedule>0)
              {
              ?>
              <li><a href="#" data-toggle="modal" data-target="#sch_found">Create Schedule</a></li>
            <?php
              }
              else
              {
            ?>
              <li><a href="#" data-toggle="modal" data-target="#tournament_found">Create Schedule</a></li>
            <?php
              } 
            } else { ?>
            <li><a href="#" data-toggle="modal" data-target="#tournament_notfound">Create Schedule</a></li>
            <?php } ?>
            <?php if($schedule>0) { ?>
            <li><a href="#" data-toggle="modal" data-target="#sch_found">Manage Schedule</a></li>
            <?php } else { ?>
            <li><a href="#" data-toggle="modal" data-target="#sch_notfound">Manage Schedule</a></li>
            <?php } ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-bullhorn"></i> <span>Timeline</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('adm/timeline/create');?>">Create Post</a></li>
            <li><a href="<?php echo site_url('adm/timeline/manage');?>">Manage Post</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-check"></i> <span>Manage Team</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('adm/team/new');?>">Register Team</a></li>
            <li><a href="<?php echo site_url('adm/validate/team');?>">Validate</a></li>
          </ul>
        </li> 
        <li class="treeview">
          <a href="#"><i class="fa fa-comments"></i> <span>Message</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('adm/message/broadcast');?>">Create Broadcast Message</a></li>
            <li><a href="<?php echo site_url('adm/message/manage');?>">Manage Message</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-clock-o"></i> <span>Manage Match</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('adm/match/update');?>">Update Result</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php echo $contents ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Sport Event Information System NPIC
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">SuperSaiyaan</a>.</strong> All rights reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- MODAL Section -->
<div class="modal modal-danger fade" id="tournament_notfound">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-ban"></i> Alert!</h4>
      </div>
      <div class="modal-body">
        <h5>Seems you don't have any Tournament yet, want to create one?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
        <a href="<?php echo site_url('adm/tournament/create'); ?>"><button type="button" class="btn btn-outline">Create</button></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal modal-success fade" id="tournament_found">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <h3 class="box-title"><i class="fa fa-calendar"></i> Choose tournament!</h3>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <form action="<?php echo site_url('adm/schedule/create') ?>" method="post">
        <select name="select2" class="form-control select2" style="width: 100%;">
          <?php foreach ($tournament as $tourname) {
            echo '<option value="'.$tourname->tournament_id.'">'.$tourname->tournament_name.'</option>';
          } ?>
        </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-outline">Choose</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- Modal Manage Schedule -->
<div class="modal modal-danger fade" id="sch_notfound">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-ban"></i> Alert!</h4>
      </div>
      <div class="modal-body">
        <h5>Seems you don't have any Schedule for Tournament yet.</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal modal-success fade" id="sch_found">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <h3 class="box-title"><i class="fa fa-calendar"></i> Choose tournament schedule!</h3>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <form action="<?php echo site_url('adm/schedule/manage') ?>" method="post">
        <select name="select2" class="form-control select2" style="width: 100%;">
          <?php foreach ($tournament as $tourname) {
            echo '<option value="'.$tourname->tournament_id.'">'.$tourname->tournament_name.'</option>';
          } ?>
        </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-outline">Choose</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL Section -->

<!-- START JS Section Create Tournament-->
<script>
$(function () {
  $('#catalog').DataTable();
});
</script>
<!-- END JS Section -->

<!-- START JS Section Schedule -->
<script>
$(function () {
  $(".select2").select2();
});
</script>
<!-- END JS Section Schedule -->

<!-- START JS Section Timeline -->
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<!-- END JS Section Timeline 