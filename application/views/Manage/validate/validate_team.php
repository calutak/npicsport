<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Validate
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/validate/team')?>">Validate</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php echo $this->session->flashdata('response'); ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Validate Registered Team</h3>
        <a href="<?php echo site_url('adm/team/new'); ?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i>&nbsp; Add Team</a>
      </div>
      <div class="box-body">
          <form id="team_data" method="post">
          <table id="catalog" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th><i class="fa fa-check"></i></th>
              <th>Team Name</th>
              <th>Team Email</th>
              <th>Tournament ID</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($team_list as $row) 
            {
              if(($row->team_status)==0) 
              {
                echo 
                  '<tr>
                    <td>'.form_checkbox('sel[]',$row->team_id,false).'</td>
                    <td>'.$row->team_name.'</td>
                    <td>'.$row->team_email.'</td>
                    <td>'.$row->tournament_id.'</td>
                    <td><center><span class="label label-danger">Registered</span></center></td>
                    <td><center>
                      <a href="'.site_url('adm/team/details/').$row->team_id.'" class="btn btn-xs btn-warning validate" data-toggle="tooltip" data-placement="left" title="Validating"><i class="fa fa-check"></i></a>
                      <a href="'.site_url("adm/team/account/delete/".$row->team_id).'" class="btn btn-xs btn-danger delete" data-toggle="tooltip" data-placement="right" title="Delete!"><i class="fa fa-close"></i></a>
                    </center></td>
                  </tr>';
              }
              else if(($row->team_status)==1)
              {
                echo 
                  '<tr>
                    <td>'.form_checkbox('sel[]',$row->team_id,false).'</td>
                    <td>'.$row->team_name.'</td>
                    <td>'.$row->team_email.'</td>
                    <td>'.$row->tournament_id.'</td>
                    <td><center><span class="label label-warning">Paid</span></center></td>
                    <td><center>
                      <a href="'.site_url("adm/team/account/activate/".$row->team_id).'" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="left" title="Activating"><i class="fa fa-check"></i></a>
                      <a href="'.site_url("adm/team/account/delete/".$row->team_id).'" class="btn btn-xs btn-danger delete" data-toggle="tooltip" data-placement="right" title="Delete!"><i class="fa fa-close"></i></a>
                    </center></td>
                  </tr>';
              } 
              else if(($row->team_status)==2)
              {
                echo 
                  '<tr>
                    <td>'.form_checkbox('sel[]',$row->team_id,false).'</td>
                    <td>'.$row->team_name.'</td>
                    <td>'.$row->team_email.'</td>
                    <td>'.$row->tournament_id.'</td>
                    <td><center><span class="label label-success">Approved</span></center></td>
                    <td><center>
                      <a href="'.site_url("adm/manage/team/".$row->team_id).'" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="left" title="Manage Member"><i class="fa fa-user"></i></a>
                      <a href="'.site_url("adm/manage/team/edit/".$row->team_id).'" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Edit Team"><i class="fa fa-edit"></i></a>
                      <a href="'.site_url("adm/team/account/delete/".$row->team_id).'" class="btn btn-xs btn-danger delete" data-toggle="tooltip" data-placement="right" title="Delete!"><i class="fa fa-close"></i></a>
                    </center></td>
                  </tr>';
              }
            } 
            ?>
            </tbody>
            <tfoot>
            </tfoot>
          </table>
            <hr>
              <a href="<?php echo site_url('adm/team/multi_delete'); ?>" class="btn btn-danger delete_selected"><i class="fa fa-close"></i>&nbsp; Delete Selected</a>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
</section>

<div class="modal modal-default fade" id="team_details">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <h3 class="box-title"><i class="fa fa-user"></i> Team info details</h3>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Decline</button>
        <a href="<?php echo site_url('adm/team/validate/'); ?>" id="validating" class="btn btn-info">Validate</a>
      </div>
    </div>
  </div>
</div>

<!-- /.content -->
<script type="text/javascript">
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('.validate').on('click', function (e) {
      e.preventDefault();
      var team_detail = $('#team_details');
      $.get($(this).attr('href'), function(data) {
        var d = JSON.parse(data);
        htmlData = '<div class=\'form-group\'><center><img src=\'../../'+d.team_banner+'\' alt=\'\' /></center></div><div class=\'form-group\'><label class=\'control-label\'>Team ID</label><input class=\'form-control\' type=\'text\' value=\''+d.team_id+'\' disabled></div>'+
        '<div class=\'form-group\'><label class=\'control-label\'>Team Email</label><input class=\'form-control\' type=\'text\' value=\''+d.team_email+'\' disabled></div>'+
        '<div class=\'form-group\'><label class=\'control-label\'>Team Faculty</label><input class=\'form-control\' type=\'text\' value=\''+d.major+'\' disabled></div>'+
        '<div class=\'form-group\'><label class=\'control-label\'>Team Year</label><input class=\'form-control\' type=\'text\' value=\''+d.year+'\' disabled></div>';
        team_detail.find('.modal-body').html(htmlData);
        $('#validating').click(function(e) {
          e.preventDefault();
          $.ajax({
            type:'get',
            url:$(this).attr('href')+d.team_id+'/TRUE/2',
            data:$(this).serialize(),
            success:function(){
              window.location.href = '';
            }
          });
        });
        team_detail.modal().show();
      });
    });
    $('.delete').on("click", function(e) {
      e.preventDefault();
      var url = $(this).attr('href');
      console.log(url);
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
            swal("Deleted!", "Team has deleted!", "success");
            setTimeout(function(){ window.location.replace(url); }, 1000);
          } else {
            swal("Cancel", "No data deleted.", "error");
          }
        });
    });
    $('.delete_selected').on("click", function(e) {
      e.preventDefault();
      var url = $(this).attr('href');
      console.log(url);
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
            $('#team_data').prop('action', url);
            $('#team_data').submit();
            swal("Deleted!", "Team has deleted!", "success");
            setTimeout(function(){ window.location.replace(url); }, 1000);
          } else {
            swal("Cancel", "No data deleted.", "error");
          }
        });
    });
  });
</script>