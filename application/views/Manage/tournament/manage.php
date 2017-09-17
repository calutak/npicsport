<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tournament
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/tournament/view')?>">Tournament</a></li>
        <li><a href="<?php echo site_url('adm/tournament/manage')?>">Manage</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php echo $this->session->flashdata('response'); ?>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Manage Tournament</h3>
      <a href="<?php echo site_url('adm/tournament/create'); ?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i>&nbsp; Create</a>
    </div>
    <div class="box-body">
        <table id="catalog" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Tournament ID</th>
            <th>Tournament Name</th>
            <th>Registration Date</th>
            <th>Tournament Date</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach($tournament as $row) { 
          echo 
            '<tr>
              <td>'.$row->tournament_id.'</td>
              <td>'.$row->tournament_name.'</td>
              <td>'.date('d/M/Y',$row->registration_start).' - '.date('d/M/Y',$row->registration_end).'</td>
              <td>'.date('d/M/Y',$row->tournament_start).' - '.date('d/M/Y',$row->tournament_end).'</td>
              <td><center>
                <a href="'.site_url("adm/tournament/get_details/".$row->tournament_id).'" data-toggle="tooltip" data-placement="left" data-target="#show_details" class="modal_details btn btn-xs btn-info" title="Details">&nbsp;<i class="fa fa-info"></i>&nbsp;</a> 
                <a href="'.site_url("adm/tournament/edit/".$row->tournament_id).'" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="'.site_url("adm/tournament/delete/".$row->tournament_id).'" class="delete btn btn-xs btn-danger" data-toggle="tooltip" data-placement="right" title="Delete!"><i class="fa fa-times"></i></a>
              </center></td>
            </tr>';
            } 
          ?>
          </tbody>
          <tfoot>
            <!-- <tr>
              <td colspan="4">
                <a href="<?php //echo site_url('#'); ?>"><button class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Insert Data</button></a>
              </td>
            </tr> -->
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
      <!-- /.box -->
</section>
<!-- /.content -->

<!-- START MODAL Section -->
<div class="modal modal-default fade" id="show_details">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <a href="<?php echo site_url('adm/tournament/edit/'); ?>" class="btn btn-info edit">Edit</button></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- END MODAL Section -->

<script>
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('.modal_details').click(function (e){
      e.preventDefault();
      $.get($(this).attr('href'), function(data) {
        var d = JSON.parse(data);
        htmlData = '<dl class=\'dl-horizontal\'><dt>Tournament Name</dt><dd>: '+d.tournament_name+'</dd><dt>Tournament</dt><dd>: '+d.tournament_start+' - '+d.tournament_end+'</dd><dt>Registration Date</dt><dd>: '+d.registration_start+' - '+d.registration_end+'</dd><dt>Tournament Type</dt><dd>: '+d.type+'</dd><dt>Tournament Year</dt><dd>: '+d.tournament_year+'</dd><dt>Description</dt><dd>: '+d.tournament_desc+'</dd><dt>Rules</dt><dd>: '+d.tournament_rules+'</dd><dt>Requirements</dt><dd>: '+d.tournament_req+'</dd>';
        $('#show_details').find('.modal-header').html('<h3 class="modal-title">Details for Tournament ID <strong>'+d.tournament_id+'</strong></h3>');
        $('#show_details').find('.modal-body').html(htmlData);
        $('.edit').click(function(e) {
          e.preventDefault();
          var url = $(this).attr('href')+'/'+d.tournament_id;
          $.ajax({
            type:'get',
            url:$(this).attr('href')+d.tournament_id,
            data:$(this).serialize(),
            success:function(){
              window.location.replace(url);
            }
          });
        });
        $('#show_details').modal().show();
      });
    });
    $('.delete').on("click", function(e) {
      e.preventDefault();
      var url = $(this).attr('href');
      swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then(function(isConfirm) {
          if (isConfirm) {
            swal("Deleted!", "Tournament data has been deleted!", "success");
            setTimeout(function(){ window.location.replace(url); }, 1000);
          } else {
            swal("Cancel", "No data deleted.", "error");
          }
        });
    });
  });
</script>