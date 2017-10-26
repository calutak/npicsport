<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Message
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/timeline/manage')?>">Message</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php echo $this->session->flashdata('response'); ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Manage Message</h3>
        <a href="<?php echo site_url('adm/message/delete_all'); ?>" class="btn btn-danger delete_selected pull-right"><i class="fa fa-close"></i>&nbsp; Delete Selected</a>
      </div>
      <div class="box-body">
        <form id="message_data" method="post">
          <table id="catalog" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th><i class="fa fa-check"></i></th>
              <th>Message Title</th>
              <th>Sender Mail</th>
              <th>Phone</th>
              <th>Message</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($message as $row) {
            echo  
              '<tr>
                <td>'.form_checkbox('sel[]',$row->message_id,false).'</td>
                <td>'.$row->message_subject.'</td>
                <td>'.$row->sender_mail.'</td>
                <td>'.$row->sender_phone.'</td>
                <td>'.$row->message_content.'</td>
                <td>'.date('d/M/Y',$row->message_date).'</td>
                <td><center>
                  <a href="'.site_url("adm/message/manage/reply/".$row->message_id).'" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="left" title="Reply"><i class="fa fa-reply"></i></a>
                  <a href="'.site_url("adm/message/manage/delete/".$row->message_id).'" class="btn btn-xs btn-danger delete" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-times"></i></a>
                </center></td>
              </tr>';
              } 
            ?>
            </tbody>
            <tfoot>
            </tfoot>
          </table>
          </form>
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
          <div id="txt_ttitle"></div>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <a href="<?php echo site_url('timeline/manage/edit/'); ?>"><button type="button" class="btn btn-outline">Edit</button></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- END MODAL Section -->

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
    $('.delete_selected').on("click", function(e) {
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
            $('#message_data').prop('action',url);
            $('#message_data').submit();
            swal("Deleted!", "All data cleared!", "success");
            setTimeout(function(){ window.location.replace(url); }, 1000);
          } else {
            swal("Cancel", "No data deleted.", "error");
          }
        });
    });
  });
</script>