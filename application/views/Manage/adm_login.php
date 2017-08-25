<!-- end of headers -->
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Sport Event Information System NPIC</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login to system</p>

    <form action="<?php echo base_url('c_auth/auth'); ?>" method="post">
      <?php echo $this->session->flashdata('msg'); ?>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
				<div class="col-xs-4"> </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
				<div class="col-xs-4"> </div>
        <!-- /.col -->
      </div>
      </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- footer start -->
