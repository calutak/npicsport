<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Gallery
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/gallery')?>">Gallery</a></li>
        <li><a href="<?php echo site_url('adm/gallery/manage')?>">Manage</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php echo $this->session->flashdata('response'); ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Manage Gallery</h3>
        <a href="<?php echo site_url('adm/gallery/clear_timeline/gallery'); ?>" class="btn btn-default pull-right"><i class="fa fa-close"></i>&nbsp; Delete Gallery</a>
        <a href="<?php echo site_url('adm/gallery'); ?>" class="btn btn-default pull-right"><i class="fa fa-plus"></i>&nbsp; Add Gallery</a>
      </div>
      <div class="box-body">
          <table id="catalog" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Image Title</th>
              <th>Image Description</th>
              <th>Posting Date</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($show_gallery_post as $row) {
            echo 
              '<tr>
                <td>'.$row->timeline_id.'</td>
                <td>'.$row->timeline_title.'</td>
                <td>'.$row->timeline_details.'</td>
                <td>'.date('d/M/Y',$row->timeline_date).'</td>
                <td><center>
                  <a href="'.site_url("adm/gallery/manage/edit/".$row->timeline_id).'" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                  <a href="'.site_url("adm/gallery/manage/delete/".$row->timeline_id).'" class="btn btn-xs btn-danger delete" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-times"></i></a>
                </center></td>
              </tr>';
              } 
            ?>
            </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
</section>
<!-- /.content -->

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
  });
</script>