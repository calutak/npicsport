<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Timeline
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm'); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/timeline/manage'); ?>"></i> Timeline</a></li>
        <li><a href="#"></i> Edit</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Timeline</h3>
	</div>
	<div class="box-body">
		<form method="post" action="<?php echo site_url('adm/timeline/manage/save'); ?>" role="form">
		<div class="form-group col-md-12">
      <input type="hidden" name="id" value="<?php echo $tlrow->timeline_id; ?>">
    <div class="form-group">
			<label>Title</label>
			<input type="text" name="title" class="form-control" value="<?php echo $tlrow->timeline_title; ?>" required>
    </div>
    <div class="form-group">
      <label>Label Post</label>
      <select class="form-control select2" name="cat">
        <option value="news">News</option>
      </select>
      <label class="control-label">Select Thumbnail</label>
      <input id="ths" name="thumbnailpost" type="file">
      <script>
        $(document).ready(function(){
          $("#ths").fileinput({showCaption: false, showUpload: false});
        })
      </script>
    </div>        
    <!-- /.box-header -->
    <div class="box-body pad">
				<label>Description</label>
            <textarea name="description" class="description" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $tlrow->timeline_details; ?></textarea>
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
              ],
              images_upload_url: '<?php echo site_url('c_timeline/mediaUpload'); ?>',
            });
            </script>
            <!-- <script type="text/javascript">
                $('.description').wysihtml5();
            </script> -->
            <?php //echo $this->ckeditor->editor("description",$tlrow->timeline_details); ?>
        </div>		
      </div> 
		<div class="form-group col-md-4">
			<button type="submit" class="btn btn-info">Save</button>
		</div>
		</form>
	</div>
	</div>
</section>