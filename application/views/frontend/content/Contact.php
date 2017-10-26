
	<!-- Page Heading & Breadcrumbs  -->
	<div class="page-heading-breadcrumbs">
		<div class="container">
		
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li>contact us</li>
			</ul>
		</div>
	</div>
	<!-- Page Heading & Breadcrumbs  -->
	
	<!-- Main Content -->
	<main class="main-content">

		<!-- Contact -->
		<div class="theme-padding white-bg">
			<div class="container">
			
				<!-- Main Heading -->
				<div class="main-heading-holder">
					<div class="main-heading">
						<h2>contact us</h2>
						<p>If you need more information you can contact us below!</p>
					</div>
				</div>
				<!-- Main Heading -->

				<!-- contact columns -->
				<ul class="row">
					<li class="col-sm-4">
						<div class="address-widget">
							<span class="address-icon"><i class="fa fa-phone"></i></span>
							<h5>OUR NUMBERS</h5>
							<p>+855 239 615 193<span class="red-color">System Administrator</span></p>
						</div>
					</li>
					<li class="col-sm-4">
						<div class="address-widget more-info">
							<span class="address-icon"><i class="fa fa-info"></i></span>
							<h5>MORE INFO</h5>
							<strong>www.npic.edu.kh</strong>
							<p>visit the web adress for mor information about NATIONAL POLYTECHNIC OF CAMBODIA</p>
						</div>
					</li>
					<li class="col-sm-4">
						<div class="address-widget office-adderss">
							<span class="address-icon"><i class="fa fa-map-marker"></i></span>
							<h5>OUR office address</h5>
							<p>Phum Prey Popel, SK. Somrong Krom, Khan Po Sen Chey, (Near Wat Pun Phnom), Phnom Penh 12000</p>
							<p><i class="red-color fa fa-envelope-o"></i>npicsport@gmail.com</p>
						</div>
					</li>
				</ul>
				<!-- contact columns -->

			</div>
		</div>
		<!-- Contact -->

		<!-- Contact Form Holder -->
		<div class="theme-padding-bottom">
			<?php echo $this->session->flashdata('response'); ?>
			<div class="container">
				<h2>Send us an email</h2> 
				<div class="row">
				
					<!-- Form -->
					<form id="contact-form" class="contact-form col-sm-6" action="<?php echo site_url('contact/send_feedback'); ?>" method="post">
						<div class="form-group">
					    	<input type="text" class="form-control" name="sender_name" placeholder="Name">
					    	<i class="fa fa-user"></i>
					   	</div>
					   	<div class="form-group">
					    	<input type="text" class="form-control" name="sender_mail" placeholder="Email *">
					   		<i class="fa fa-envelope"></i>
					   	</div>
					   	<div class="form-group">
					    	<input type="text" class="form-control" name="sender_phone" placeholder="Phone">
					   		<i class="fa fa-phone"></i>
					   	</div>
						<div class="form-group">
							<textarea class="form-control style-d" name="message" rows="6" id="comment" placeholder="Write Comments here..."></textarea>
							<i class="fa fa-pencil-square-o"></i>
						</div>
						<div id="g-recaptcha"></div><br>
					   	<button type="submit" class="btn red-btn">Send Comments</button>
					</form>
					<!-- Form -->

					<!-- Img -->
					<figure class="col-sm-6 tower-img">
						<div id="custom-map" class="contact-map"></div>
					</figure>
					<!-- Img -->

				</div>
			</div>
		</div>
		<!-- Contact Form Holder -->

	</main>
	<!-- Main Content -->
<script>
var onloadCallback = function () {
	grecaptcha.render('g-recaptcha', {
	  'sitekey' : '6Ld2ijMUAAAAAKs5PznzeUSBDaDnk_QHpoUIjDhc',
	  'theme' : 'light'
	});
};
</script>