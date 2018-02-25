<section id="content">
			<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.3655637461725!2d120.32606131448395!3d22.751810932103513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjLCsDQ1JzA2LjUiTiAxMjDCsDE5JzQxLjciRQ!5e0!3m2!1szh-TW!2stw!4v1469114093792" style="border:0" allowfullscreen=""></iframe>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h4>Get in touch with us by filling <strong>contact form below</strong></h4>

						<div id="sendmessage">Your message has been sent. Thank you!</div>
						<div id="errormessage"></div>
						<form action="" method="post" role="form" class="contactForm">
							<div class="form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
								<div class="validation"></div>
							</div>

							<div class="text-center"><button type="submit" class="btn btn-theme">Send Message</button></div>
						</form>
					</div>
				</div>
			</div>
		</section>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
	<script>
		jQuery(document).ready(function($) {
			//Google Map
			var get_latitude = $('#google-map').data('latitude');
			var get_longitude = $('#google-map').data('longitude');

			function initialize_google_map() {
				var myLatlng = new google.maps.LatLng(get_latitude, get_longitude);
				var mapOptions = {
					zoom: 14,
					scrollwheel: false,
					center: myLatlng
				};
				var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
				var marker = new google.maps.Marker({
					position: myLatlng,
					map: map
				});
			}
			google.maps.event.addDomListener(window, 'load', initialize_google_map);
		});
	</script>