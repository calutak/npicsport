<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Match
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/match/view')?>">Match</a></li>
        <li><a href="<?php echo site_url('adm/match/update')?>">Update</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php echo $this->session->flashdata('response'); ?>
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Update Match Result</h3>
    </div>
    <form id="find" action="<?php echo site_url('adm/match/find') ?>" method="post">
      <div class="box-body">
        <?php if(!isset($mdropdown)) { ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No Match Scheduled!
        </div>
        <?php } else { ?>
        <div class="form-group col-md-3">
          <label style="padding-top: 4%;">Choose Tournament Match</label>
        </div>
        <div class="form-group col-md-2">
          <select class="form-control" name="tid">
            <?php foreach ($mdropdown as $row) 
            {
              echo '<option value="'.$row->tournament_id.'">'.$row->tournament_name.'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-2">
          <button type="submit" class="btn btn-info">Go</button>
        </div>
        <?php } ?>
      </div>
    </form>
    <div class="clearfix"></div>
    <div class="box-body match_list"></div>
    <div class="box-footer with-border">
    </div>
  </div>
</section>

<script>
$(document).ready(function () {
  $('.delete').on("click", function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    console.log(url);
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
  $('#find').submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: $(this).attr('method'),
      url: $(this).attr('action'),
      data: $(this).serialize(),
      success:function(data) {
        $('.match_list').html(data).promise().done(function() {
          $('.edit').click(function(e){
            e.preventDefault();
            var tid = $('input[name=tid]').val();
            var id = $(this).attr('id');
            // $('input[id=scA'+id+']').prop('disabled', false);
            // $('input[id=scB'+id+']').prop('disabled', false);
            // $(this).addClass('update');
            // $(this).html('<i class=\'fa fa-save\'></i>Update');
            // $('.update').click(function(e){
            //   e.preventDefault();
              $.ajax({
                url: $('form[id=upd]').attr('action'),
                type: 'POST',
                data: {
                  mid: id,
                  tid: tid,
                  scoreA: $('input[id=scA'+id+']').val(),
                  scoreB: $('input[id=scB'+id+']').val(),
                  tA: $("#A"+id).text(),
                  tB: $("#B"+id).text()
                },
                success:function(s){
                  var url = JSON.parse(s);
                  console.log(url);
                  window.location.replace(url);
                }
              });
            // });
          });
          $('.updateAll').on("click", function(e) {
            e.preventDefault();
            var tid = $('input[name=tid]').val();
            var urls = '<?php echo site_url('adm/match/updateAll'); ?>';
            $('form[id=upd]').prop('action', urls);
            $('form[id=upd]').submit();
          });
        });
      }
    });
  });
});
</script>