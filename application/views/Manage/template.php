<body class="hold-transition skin-green sidebar-mini">
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
  <?php $this->load->view('Manage/sidebar'); ?>
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
        <h5>Seems you don't have any Tournament or all of your Tournament already Scheduled, want to create another one?</h5>
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
        <select id="tidt" class="form-control" style="width: 100%;">
          <?php foreach ($ddropdown as $tourname) {
            echo '<option value="'.$tourname->tournament_id.'">'.$tourname->tournament_name.'</option>';
          } ?>
        </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-outline" onclick="findTournament()">Choose</button>
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
        <select id="tids" class="form-control" style="width: 100%;">
          <?php foreach ($mdropdown as $tourname) {
            echo '<option value="'.$tourname->tournament_id.'">'.$tourname->tournament_name.'</option>';
          } ?>
        </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-outline" onclick="findSchedule()">Choose</button>
      </div>
    </div>
  </div>
</div>

<div class="modal modal-danger fade" id="noteam">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <h3 class="box-title">No team participated yet!</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL Section -->

<!-- START JS Section Create Tournament-->
<script>
$(document).ready(function () {
  $('#catalog').DataTable();
  $('[data-toggle="tooltip"]').tooltip();
});
function findSchedule() {
  $.ajax({
    url: '<?php echo site_url('adm/schedule/find_s'); ?>',
    type: 'POST',
    data: {
      tournamentid: $('#tids').val()
    },
    success:function(data) {
      var dt = JSON.parse(data);
      var id = dt.id;
      var url = dt.url;
      window.location.replace(url);
    },
    error:function(data) {
      alert(data);
    }
  });
}
function findTournament() {
  $.ajax({
    url: '<?php echo site_url('adm/schedule/find_t'); ?>',
    type: 'POST',
    data: {
      tournamentid: $('#tidt').val()
    },
    success:function(data) {
      var dt = JSON.parse(data);
      var id = dt.id;
      var url = dt.url;
      window.location.replace(url);
    },
    error:function(data) {
      alert(data);
    }
  });
}
</script>
<!-- END JS Section -->
