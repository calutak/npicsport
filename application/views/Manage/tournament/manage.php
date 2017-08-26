<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tournament
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('tournament/view')?>">Tournament</a></li>
        <li><a href="<?php echo site_url('tournament/manage')?>">Manage</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php echo $this->session->flashdata('response'); ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Manage Tournament</h3>
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
                  <a href="#" id="'.$row->tournament_id.'" data-toggle="modal" data-target="#show_details" class="modal_details btn btn-xs btn-info"><i class="fa fa-edit"></i> Details</a> 
                  <a href="'.site_url("tournament/edit/".$row->tournament_id).'" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a>
                  <a href="'.site_url("tournament/delete/".$row->tournament_id).'" class="delete btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</a>
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
<div class="modal modal-info fade" id="show_details">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <div class="txt_ttitle"></div>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <a href="<?php echo site_url('tournament/edit/'); ?>" class="btn btn-outline">Edit</button></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- END MODAL Section -->

<script>
  $(document).ready(function () {
    $('.modal_details').click(function (){
      var id = $(this).attr('id');
      var title = $('.t_name'+id).val();
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