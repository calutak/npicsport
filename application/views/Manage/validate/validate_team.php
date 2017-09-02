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
      </div>
      <div class="box-body">
          <table id="catalog" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Team Name</th>
              <th>Team Email</th>
              <th>Team Banner</th>
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
                    <td>'.$row->team_name.'</td>
                    <td>'.$row->team_email.'</td>
                    <td>'.$row->team_banner.'</td>
                    <td><center><a href="#" class="btn btn-xs btn-danger">Registered</a></center></td>
                    <td><center>
                      <a href="'.site_url("validate/team/validate".$row->team_id).'" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Validate</a>
                    </center></td>
                  </tr>';
              }
              else if(($row->team_status)==1)
              {
                echo 
                  '<tr>
                    <td>'.$row->team_name.'</td>
                    <td>'.$row->team_email.'</td>
                    <td>'.$row->team_banner.'</td>
                    <td><center><a href="#" class="btn btn-xs btn-warning">Paid</a></center></td>
                    <td><center>
                      <a href="'.site_url("validate/team/validate".$row->team_id).'" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Activate</a>
                    </center></td>
                  </tr>';
              } 
              else if(($row->team_status)==2)
              {
                echo 
                  '<tr>
                    <td>'.$row->team_name.'</td>
                    <td>'.$row->team_email.'</td>
                    <td>'.$row->team_banner.'</td>
                    <td><center><a href="#" class="btn btn-xs btn-success">Approved</a></center></td>
                    <td><center>
                      <a href="'.site_url("validate/team/validate".$row->team_id).'" class="btn btn-xs btn-info"><i class="fa fa-info"></i> &nbsp;Reset Password</a>
                    </center></td>
                  </tr>';
              }
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