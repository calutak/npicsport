<!-- jQuery 2.2.3 -->
<script src="<?php echo site_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo site_url('assets/plugins/morris/morris.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo site_url('assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo site_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo site_url('assets/plugins/knob/jquery.knob.js'); ?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo site_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- datepicker -->
<script src="<?php echo site_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo site_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo site_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo site_url('assets/plugins/fastclick/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url('assets/dist/js/app.min.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php echo site_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<!-- CKEditor -->
<script src="<?php echo site_url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
<!-- Sweet alert 2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Data Toogle -->
<script src="<?php echo site_url('assets/bootstrap/js/bootstrap-toggle.min.js'); ?>"></script>
<!-- CheckButton JS -->
<script src="<?php echo site_url('assets/bootstrap/js/checkbutton.js'); ?>"></script>
<!-- Time Picker -->
<script src="<?php echo site_url('assets/plugins/timepicker/jquery.timepicker.js'); ?>"></script>
<!-- TinyMCE -->
<script src="<?php echo site_url('assets/plugins/tinymce/tinymce.min.js'); ?>"></script>
<!-- Input File -->
<script src="<?php echo site_url('assets/plugins/fileInput/piexif.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/plugins/fileInput/purify.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/plugins/fileInput/sortable.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/fileinput.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/locales/LANG.js'); ?>"></script>
<script src="<?php echo site_url('assets/plugins/fileInput/fa/theme.min.js'); ?>"></script>

<script>
	$(document).ready(function() {
		var loc = window.location;
		var path = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
		var basePath = loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - path.length));
		setInterval(function() {
			$.get(basePath+'check_date', {}, function() {

			});
		}, 20000);
	});
</script>

</body>
</html>
