<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Reply
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="#"></i> Message</a></li>
        <li><a href="#"></i> Reply</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php echo $this->session->flashdata('response'); ?>
	<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Reply Message</h3>
	</div>
	<div class="box-body">
		<form method="post" action="<?php echo site_url('adm/message/reply/'.$contact_details->message_id.'/post'); ?>" role="form" enctype="multipart/form-data">
		<div class="form-group col-md-12">
      <div class="box-header">
        <label>Subject</label>
        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
      </div>
      <div class="box-header">
        <label>To</label>
        <input type="text" name="recipient" class="form-control" value="<?php echo $contact_details->sender_mail; ?>" readonly>
      </div>
      <div class="clearfix">
      <!-- /.box-header -->
      <div class="box-body pad col-md-12">
			 <label>Body</label>
        <textarea name="body" class="description" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
    <a href="<?php echo site_url('adm/message/manage'); ?>" class="btn btn-warning pull-right">Cancel</a>
		<button type="submit" class="btn btn-info pull-right">Reply</button>
		</form>
	</div>
	</div>
</section>