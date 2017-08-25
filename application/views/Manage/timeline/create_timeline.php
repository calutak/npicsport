<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Timeline
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="#"></i> Timeline</a></li>
        <li><a href="#"></i> Create</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Create Timeline</h3>
	</div>
	<div class="box-body">
		<form method="post" action="<?php echo site_url('timeline/create/post'); ?>" role="form">
		<div class="form-group col-md-12">
            <div class="box-header">
				<label>Title</label>
				<input type="text" name="title" class="form-control" placeholder="Name" required>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
				<label>Description</label>
                <textarea name="description" class="description" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                <?php //echo $this->ckeditor->editor("description"); ?>
                <script type="text/javascript">
                    $('.description').wysihtml5();
                </script>
            </div>		
        </div>
		<div class="form-group col-md-4">
			<button type="submit" class="btn btn-info">Post</button>
		</div>
		</form>
	</div>
	</div>
</section>