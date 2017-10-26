<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Gallery
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="#"></i> Gallery</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php echo $this->session->flashdata('response'); ?>
	<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Post Gallery</h3>
	</div>
	<div class="box-body">
		<form method="post" action="<?php echo site_url('adm/gallery/post'); ?>" role="form" enctype="multipart/form-data">
		<div class="form-group col-md-12">
      <div class="box-header">
        <label>Title</label>
        <input type="text" name="title" class="form-control" placeholder="Title" required>
      </div>
      <div class="box-header">
        <label>Description</label>
        <textarea name="description" class="form-control" placeholder="Place some text here" required></textarea>
      </div>
      <div class="clearfix">
      <!-- /.box-header -->
      <div class="box-body pad form-group col-md-12">
        <label>Images</label>
        <input id="imgupload" name="imgupload" type="file" multiple required>
        <div id="errorBlock" class="help-block"></div>
        <script>
          $(document).ready(function(){
            $("#imgupload").fileinput({
              showUpload: false,
              maxFileCount: 1,
              validateInitialCount: true,
              browseLabel: 'Select File...',
              previewFileIcon: '<i class="fa fa-file"></i>',
              allowedPreviewTypes: null, // set to empty, null or false to disable preview for all types
              previewFileIconSettings: {
                  'jpg': '<i class="fa fa-file-photo-o text-warning"></i>',
                  'mov': '<i class="fa fa-file-movie-o text-warning"></i>',
              },
              previewFileExtSettings: {
                  'jpg': function(ext) {
                      return ext.match(/(jp?g|png|gif|bmp)$/i);
                  },
                  'mov': function(ext) {
                      return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
                  }
              },
              allowedFileExtensions: ["jpg", "jpeg", "png", "gif", "bmp", "avi", "mp4", "webm", "wmv"]
          });
          })
        </script>
      </div> 		
    </div>
		<button type="submit" class="btn btn-info pull-right">Save to gallery</button>
		</form>
	</div>
	</div>
</section>