<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Schedule
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('schedule/view')?>">Schedule</a></li>
        <li><a href="<?php echo site_url('schedule/create')?>">Create</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="login-box">
			<div class="box box-danger">
				<div class="box-header bg-red-active">
					<i class="fa fa-ban"></i>
					<h3 class="box-title">Alert!</h3>
			    </div>
				<div class="box-body bg-red">
					<?php echo $tid; ?>
			      	No tournament found, create one?
			      	<br><br>
			        <button type="submit" class="btn btn-danger pull-right">Create</button>
				</div>
		    </div>
		    <div class="box box-success">
				<div class="box-header bg-green-active">
					<i class="fa fa-calendar"></i>
					<h3 class="box-title">Choose tournament!</h3>
			    </div>
				<div class="box-body bg-green">
			      	<div class="form-group col-md-9">
		                <select class="form-control select2" style="width: 100%;">
		                  <option selected="selected">Alabama</option>
		                  <option>Alaska</option>
		                  <option>California</option>
		                  <option>Delaware</option>
		                  <option>Tennessee</option>
		                  <option>Texas</option>
		                  <option>Washington</option>
		                </select>
              		</div>
              		<div class="form-group col-md-3">
		                <button type="submit" class="btn btn-success pull-right">Select</button>
		            </div>
		    </div>
	    </div>
    </div>
</section>