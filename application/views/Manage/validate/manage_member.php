<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage Member
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/manage/team')?>">Manage</a></li>
        <li><a href="<?php echo site_url('adm/manage/team/'.$teamID)?>">Member</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php echo $this->session->flashdata('response'); ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">List Member for Team : <?php echo $teamname; ?></h3>
      </div>
      <div class="box-body">
        <table id="catalog" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Member ID</th>
            <th>Member Name</th>
            <th>Member Email</th>
            <th>Photo</th>
            <th>DoB</th>
            <th>Major</th>
            <th>Year</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach($member_list as $row) 
          {
            echo 
              '<tr>
                <td>'.$row->member_id.'</td>
                <td>'.$row->member_name.'</td>
                <td>'.$row->member_email.'</td>
                <td><img src=\''.site_url('assets/uploads/team/'.$row->member_photo).'\' alt="image"></td>
                <td>'.date('d/M/Y', $row->dob).'</td>
                <td>'.$row->major.'</td>
                <td>'.$row->year.'</td>
                <td><center>
                  <a href="'.site_url("adm/team/member/".$teamID."/edit/".$row->member_id).'" class="btn btn-xs btn-success validate" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                  <a href="'.site_url("adm/team/member/".$teamID."/delete/".$row->member_id).'" class="btn btn-xs btn-danger delete" data-toggle="tooltip" data-placement="right" title="Delete!"><i class="fa fa-close"></i></a>
                </center></td>
              </tr>';
          } 
          ?>
          </tbody>
        </table>
        <hr>
        <a href="<?php echo site_url('adm/manage/team'); ?>" class="btn btn-warning">Cancel</a>
        <a href="<?php echo site_url('adm/team/add/'.$teamID.'/member'); ?>" class="btn btn-info"><i class="fa fa-add"></i>Add Member</a>
        <a href="<?php echo site_url('adm/team/deleteall/'.$teamID.'/member'); ?>" class="btn btn-danger"><i class="fa fa-add"></i>Delete all Member</a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>

<!-- /.content -->
<script type="text/javascript">
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
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
            swal("Deleted!", "Team has deleted!", "success");
            setTimeout(function(){ window.location.replace(url); }, 1000);
          } else {
            swal("Cancel", "No data deleted.", "error");
          }
        });
    });
  });
</script>