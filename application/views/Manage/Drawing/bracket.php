<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Drawing
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/drawing')?>">Drawing</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php echo $this->session->flashdata('response'); ?>
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Drawing Bracket for Tournament</h3>
    </div>
    <form id="br" action="<?php echo site_url('adm/drawing/bracket/draw') ?>" method="post">
      <div class="box-body">
        <div id="minimal"><div class="demo"></div></div>
      </div>
    </form>
  </div>
</section>
<script>
$(document).ready(function () {
  $.post($('form[id="br"]').attr('action'),function(data) {
    var d = JSON.parse(data);
    console.log(d);
    var minimalData = {
      teams: d.team,
      results: d.result
    }
    $(function() {
      $('#minimal .demo').bracket({
        init: minimalData,
        skipConsolationRound: true
      })
    });
  });
})
</script>