<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Register Team
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/team/new')?>">Add Team</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php echo $this->session->flashdata('response'); ?>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Register Team</h3>
    </div>
    <div class="box-body">
        <?php
          echo form_open_multipart(site_url('adm/team/new/add'));
          foreach ($tournament as $key) {
            $tournament_list = array($key->tournament_id => $key->tournament_name); 
          }

          echo '<div class=\'form-group col-sm-12\'>';
          echo '<div class=\'form-group col-sm-3\'>';
          echo form_label('Team Name', 'tName');
          echo form_input('tName', set_value('tName'), 'placeholder=\'Team Name\' class=\'form-control\'');
          echo form_error('tName');
          echo '</div>';
          echo '<div class=\'form-group col-sm-4\'>';
          echo form_label('Team Email', 'tEmail');
          echo form_input('tEmail', set_value('tEmail'), 'placeholder=\'Team Email\' class=\'form-control\'');
          echo form_error('tEmail');
          echo '</div>';
          echo '<div class=\'form-group col-sm-4\'>';
          echo form_label('Team Banner', 'tBanner');
          echo form_upload('tBanner', '', 'placeholder=\'Banner for Team\' class=\'form-control\'');
          echo form_error('tBanner');
          echo '</div>';
          echo '</div>';

          echo '<div class=\'form-group col-sm-12\'>';
          echo '<div class=\'form-group col-sm-3\'>';
          echo form_label('Faculty', 'tFaculty');
          echo form_input('tFaculty', set_value('tFaculty'), 'placeholder=\'Faculty\' class=\'form-control\'');
          echo form_error('tFaculty');
          echo '</div>';
          echo '<div class=\'form-group col-sm-3\'>';
          echo form_label('Major', 'tMajor');
          echo form_input('tMajor', set_value('tMajor'), 'placeholder=\'Major\' class=\'form-control\'');
          echo form_error('tMajor');
          echo '</div>';
          echo '<div class=\'form-group col-sm-2\'>';
          echo form_label('Year', 'tYear');
          echo form_input('tYear', set_value('tYear'), 'placeholder=\'Year (1/2/3/4)\' class=\'form-control\'');
          echo form_error('tYear');
          echo '</div>';
          echo '</div>';

          echo '<div class=\'form-group col-sm-12\'>';
          echo '<div class=\'form-group col-sm-3\'>';
          echo form_label('Choose Tournament', 'trName');
          echo form_dropdown('trName', $tournament_list, '0', 'class=\'form-control select2\'');
          echo form_error('trName');
          echo '</div>';
          echo '<div class=\'form-group col-sm-2\'>';
          echo form_label('Number of Member', 'tnMember');
          echo form_input('tnMember', set_value('tnMember'), ' class=\'form-control\'');
          echo form_error('tnMember');
          echo '</div>';
          echo '</div>';
        ?>
    </div>
    <div class="box-footer">
    <?php
      echo form_submit('submit', 'Register Team', 'class=\'btn btn-info\''); 
      echo form_close(); 
    ?>
    </div>
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->