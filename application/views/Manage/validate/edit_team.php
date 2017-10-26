<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Register Team
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/manage/team/')?>">Team</a></li>
        <li><a href="<?php echo site_url('adm/manage/team/'.$dtt->team_id)?>"><?php echo $dtt->team_id; ?></a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php echo $this->session->flashdata('response'); ?>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Team</h3>
    </div>
    <div class="box-body">
        <?php
          echo form_open_multipart(site_url('adm/team/edit/'.$dtt->team_id));
          $majorList = array(
            'AE' => 'Automobile Engineering',
            'CAD' => 'CAD/CAM (High Diploma Degree)',
            'CE' => 'Civil Engineering',
            'CA' => 'Culinary Arts',
            'ELC' => 'Electronic Engineering',
            'ELE' => 'Electrical Engineering',
            'CS' => 'Computer Science',
            'GME' => 'General Mechanical Engineering',
            'TH' => 'Tourism and Hospitality'
          );

          echo '<div class=\'form-group col-sm-12\'>';
          echo '<div class=\'form-group col-sm-3\'>';
          echo form_label('Team Name', 'tName');
          echo form_input('tName', $dtt->team_name, 'placeholder=\'Team Name\' class=\'form-control\'');
          echo form_error('tName');
          echo '</div>';
          echo '<div class=\'form-group col-sm-4\'>';
          echo form_label('Team Email', 'tEmail');
          echo form_input('tEmail', $dtt->team_email, 'placeholder=\'Team Email\' class=\'form-control\'');
          echo form_error('tEmail');
          echo '</div>';
          echo '</div>';

          echo '<div class=\'form-group col-sm-12\'>';
          echo '<div class=\'form-group col-sm-4\'>';
          echo form_label('Major', 'tMajor');
          echo form_dropdown('tMajor', $majorList, 'AE', 'class=\'form-control\'');
          echo form_error('tMajor');
          echo '</div>';
          echo '<div class=\'form-group col-sm-2\'>';
          echo form_label('Year', 'tYear');
          echo form_input('tYear', $dtt->year, 'placeholder=\'Year (1/2/3/4)\' class=\'form-control\'');
          echo form_error('tYear');
          echo '</div>';
          echo '</div>';

          echo '<div class=\'form-group col-sm-12\'>';
          echo '<div class=\'form-group col-sm-3\'>';
          echo form_label('Choose Tournament', 'trName');
          echo form_input('trName', $dtt->tournament_id, 'class=\'form-control select2\' disabled');
          echo '</div>';
          echo '<div class=\'form-group col-sm-2\'>';
          echo form_label('Number of Member', 'tnMember');
          echo form_input('tnMember', $dts->num_member, 'class=\'form-control\' placeholder=\'Num of Member\'');
          echo form_error('tnMember');
          echo '</div>';
          echo '</div>';
        ?>
    </div>
    <div class="box-footer">
    <?php
      echo form_submit('submit', 'Update', 'class=\'btn btn-info\''); 
      echo anchor(site_url('adm/manage/team/'), 'Cancel', 'class=\'btn btn-warning\'');
      echo form_close(); 
    ?>
    </div>
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->