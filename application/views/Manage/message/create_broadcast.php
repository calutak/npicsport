<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Timeline
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="#"></i> Message</a></li>
        <li><a href="#"></i> Create Broadcast</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Create Broadcast Message</h3>
	</div>
	<div class="box-body">
		<form method="post" action="<?php echo site_url('adm/timeline/create/post'); ?>" role="form">
		<div class="form-group col-md-12">
            <div class="box-header">
				<label>Title</label>
				<input type="text" name="title" class="form-control" placeholder="Name" required>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad form-group">
                <label>Attachment</label>
                <input type="text" name="asd" class="form-control"  placeholder="Attachment.." required>
                <button class="btn btn-default">Insert</button>
            </div>
            <div class="box-body pad col-md-12">
				<label>Content</label>
                <?php echo $this->ckeditor->editor("description"); ?>
            </div> 		
        </div>
		<div class="form-group col-md-4">
			<button type="submit" class="btn btn-info">Send to all.</button>
		</div>
		</form>
	</div>
	</div>
</section>