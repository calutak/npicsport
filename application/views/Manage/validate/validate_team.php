<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Timeline
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('timeline/manage')?>">Timeline</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php echo $this->session->flashdata('response'); ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Manage Timeline</h3>
      </div>
      <div class="box-body">
          <table id="catalog" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Timeline ID</th>
              <th>Timeline Title</th>
              <th>Timeline Description</th>
              <th>Posting Date</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($show_timeline_post as $row) { 
            echo 
              '<tr>
                <td>'.$row->timeline_id.'</td>
                <td>'.$row->timeline_title.'</td>
                <td>'.substr($row->timeline_details,0,50).'</td>
                <td>'.date('d/M/Y',$row->timeline_date).'</td>
                <td><center>
                  <a href="'.site_url("timeline/manage/edit/".$row->timeline_id).'"><button class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</button></a>
                  <a href="'.site_url("timeline/manage/delete/".$row->timeline_id).'"><button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</button></a>
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