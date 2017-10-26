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
		<form method="post" action="<?php echo site_url('adm/message/send/mail'); ?>" role="form" enctype="multipart/form-data">
		<div class="form-group col-md-12">
      <div class="box-header">
        <label>Subject</label>
        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
      </div>
      <div class="box-header col-md-4">
        <label>Choose Tournament</label>
        <select name="tid" class="form-control">
          <?php foreach ($tlist as $key): ?>
            <option value="<?php echo $key->tournament_id; ?>"><?php echo $key->tournament_name; ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="clearfix">
      <!-- /.box-header -->
      <div class="box-body pad form-group col-md-12">
        <label>Attachment</label>
        <input id="att" name="attach[]" type="file" multiple required>
        <div id="errorBlock" class="help-block"></div>
        <script>
          $(document).ready(function(){
            $("#att").fileinput({
              showUpload: false,
              maxFileCount: 3,
              browseLabel: 'Select Folder...',
              previewFileIcon: '<i class="fa fa-file"></i>',
              allowedPreviewTypes: null, // set to empty, null or false to disable preview for all types
              previewFileIconSettings: {
                  'doc': '<i class="fa fa-file-word-o text-primary"></i>',
                  'xls': '<i class="fa fa-file-excel-o text-success"></i>',
                  'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
                  'jpg': '<i class="fa fa-file-photo-o text-warning"></i>',
                  'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
                  'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
                  'htm': '<i class="fa fa-file-code-o text-info"></i>',
                  'txt': '<i class="fa fa-file-text-o text-info"></i>',
                  'mov': '<i class="fa fa-file-movie-o text-warning"></i>',
                  'mp3': '<i class="fa fa-file-audio-o text-warning"></i>',
              },
              previewFileExtSettings: {
                  'doc': function(ext) {
                      return ext.match(/(doc|docx)$/i);
                  },
                  'xls': function(ext) {
                      return ext.match(/(xls|xlsx)$/i);
                  },
                  'ppt': function(ext) {
                      return ext.match(/(ppt|pptx)$/i);
                  },
                  'jpg': function(ext) {
                      return ext.match(/(jp?g|png|gif|bmp)$/i);
                  },
                  'zip': function(ext) {
                      return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
                  },
                  'htm': function(ext) {
                      return ext.match(/(php|js|css|htm|html)$/i);
                  },
                  'txt': function(ext) {
                      return ext.match(/(txt|ini|md)$/i);
                  },
                  'mov': function(ext) {
                      return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
                  },
                  'mp3': function(ext) {
                      return ext.match(/(mp3|wav)$/i);
                  },
              }
          });
          })
        </script>
      </div>
      <div class="box-body pad col-md-12">
			 <label>Body</label>
        <textarea name="description" class="description" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        <script type="text/javascript">
        tinymce.init({ selector: 'textarea',
          height: 500,
          theme: 'modern',
          plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'template paste textcolor colorpicker textpattern imagetools codesample toc help emoticons hr'
          ],
          toolbar1: 'formatselect | fontselect | fontsizeselect | bold italic  strikethrough link | forecolor backcolor | alignleft aligncenter alignright alignjustify  | bullist numlist outdent indent  | removeformat',
          image_advtab: false,
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
          ]
        });
        </script>
      </div> 		
    </div>
		<button type="submit" class="btn btn-info pull-right">Send mail to all</button>
		</form>
	</div>
	</div>
</section>