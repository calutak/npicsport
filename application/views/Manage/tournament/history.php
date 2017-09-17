<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tournament
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('tournament/view')?>">Tournament</a></li>
        <li><a href="<?php echo site_url('tournament/manage')?>">History</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="nodata"></div>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">History Tournament and Tournament Result</h3>
    </div>
    <form action="<?php echo site_url('adm/tournament/history/filter') ?>" method="post">
    <div class="box-body">
      <div class="form-group col-md-3">
        <label style="padding-top: 4%;">Choose year of tournament</label>
      </div>
      <div class="form-group col-md-2">
        <select class="form-control select2" name="year">
          <?php foreach ($yearlist as $row) 
          {
            echo '<option value="'.$row->tournament_year.'">'.$row->tournament_year.'</option>';
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-2">
        <button type="submit" class="btn btn-info">Go</button>
      </div>
    </div>
    </form>
    <div class="box-body ltour">
      <div class="form-group col-md-3">
        <label style="padding-top: 4%;">Choose tournament</label>
      </div>
      <div class="form-group col-md-2">
        <select class="form-control select2" id="tlistyear" name="tlistyear">
          
        </select>
      </div>
      <div class="form-group col-md-2">
        <button class="btn btn-info btournament">Go</button>
      </div>
    </div>
</section>
<!-- /.content -->
<script>
  $(document).ready(function () {
    $('.ltour').hide();
    $('form').submit(function (e) {
      e.preventDefault();
      $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success:function(data){
          var d = JSON.parse(data);
          if(d.status=='nodata')
          {
            $('.nodata').html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No Tournament History in '+d.year+'</div>');
          }
          else
          {
            for(var i=0;i<d.length;i++) {
              $('#tlistyear').append('<option value=\''+d[i].tournament_id+'\'>'+d[i].tournament_name+'</option>');
            }
            $('.ltour').show();
          }
        }
      });
    });
  });
</script>