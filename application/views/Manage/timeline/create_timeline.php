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
		<form method="post" action="<?php echo site_url('adm/timeline/create/post'); ?>" role="form" enctype="multipart/form-data">
		<div class="form-group col-md-12">
      <div class="box-header">
				<label>Title</label>
				<input type="text" name="title" class="form-control" placeholder="Name" required>
      </div>
      <!-- /.box-header -->
      <div class="box-body pad">
        <div class="form-group">
          <label>Label Post</label>
          <select class="form-control" name="cat">
            <option value="news">News</option>
          </select>
          <label class="control-label">Select Thumbnail</label>
          <input id="th" name="thumbnailpost" type="file" required>
          <script>
            $(document).ready(function(){
              $("#th").fileinput({showCaption: false, showUpload: false});
            })
          </script>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="check_headlines" value="true">Set as Top Headlines</label>
        </div>
				<label>Description</label>
        <textarea name="description" enctype="multipart/form-data" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        <input name="image" type="file" id="upload" class="hidden" onchange="">
        <?php //echo $this->ckeditor->editor("description"); ?>
        <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            paste_data_images: true,
            plugins: [
              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
              "searchreplace wordcount visualblocks visualchars code fullscreen",
              "insertdatetime media nonbreaking save table contextmenu directionality",
              "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: false,
            file_picker_callback: function(callback, value, meta) {
              if (meta.filetype == 'image') {
                $('#upload').trigger('click');
                $('#upload').on('change', function() {
                  var file = this.files[0];
                  var reader = new FileReader();
                  reader.onload = function(e) {
                    callback(e.target.result, {
                      alt: ''
                    });
                  };
                  reader.readAsDataURL(file);
                });
              }
            }
        });
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