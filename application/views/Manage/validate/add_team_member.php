<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Register Team
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/team/new')?>">Add Team</a></li>
        <li><a href="<?php echo site_url('adm/team/add/'.$mid.'/member')?>">Add Member</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php echo $this->session->flashdata('response'); ?>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Add Member</h3>
      <div id="idx" class="pull-right"> 1 of 15</div>
    </div>
    <div class="box-body">
		<?php 
			echo form_open_multipart(); 
			echo form_label('asd', 'SD');
			echo form_input('asd', 'asd', 'class=\'form-control\''); 
			echo form_label('asd', 'SD');
			echo form_input('asd', 'asd', 'class=\'form-control\'');
			echo form_label('asd', 'SD');
			echo form_input('asd', 'asd', 'class=\'form-control\'');
			echo form_label('asd', 'SD');
			echo form_input('asd', 'asd', 'class=\'form-control\'');
			echo form_label('asd', 'SD');
			echo form_input('asd', 'asd', 'class=\'form-control\'');
			echo form_label('asd', 'SD');
			echo form_input('asd', 'asd', 'class=\'form-control\'');
		?>
    	<center><?php echo '1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16'; ?></center>
    </div>
    <div class="box-footer">
    	<?php 
			echo form_submit();
			echo form_close();  
		?>	
    </div>
  </div>
</section>
<script>
	$('#add_member').carousel(
		interval:false
	);
</script>