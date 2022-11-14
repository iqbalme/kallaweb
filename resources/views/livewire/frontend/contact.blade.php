<div>
	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Contact</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
    <div class="contact">
		<!-- Contact Info -->

		<div class="contact_info_container">
			<div class="container">
				<div class="row">

					<!-- Contact Form -->
					<div class="col-lg-6">
						<div class="contact_form">
							<div class="contact_info_title">Hubungi Kami</div>
							<form action="#" class="comment_form">
								<div>
									<div class="form_title">Nama</div>
									<input type="text" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Email</div>
									<input type="text" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Pesan</div>
									<textarea class="comment_input comment_textarea" required="required"></textarea>
								</div>
								<div>
									<button type="submit" class="comment_button trans_200">Kirim Pesan</button>
								</div>
							</form>
						</div>
					</div>

					<!-- Contact Info -->
					<div class="col-lg-6">
						<div class="contact_info">
							<div class="contact_info_title">Contact Info</div>
							<div class="contact_info_text">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a distribution of letters.</p>
							</div>
							<div class="contact_info_location">
								<div class="contact_info_location_title">New York Office</div>
								<ul class="location_list">
									<li>T8/480 Collins St, Melbourne VIC 3000, New York</li>
									<li>1-234-567-89011</li>
									<li>info.deercreative@gmail.com</li>
								</ul>
							</div>
							<div class="contact_info_location">
								<div class="contact_info_location_title">Australia Office</div>
								<ul class="location_list">
									<li>Forrest Ray, 191-103 Integer Rd, Corona Australia</li>
									<li>1-234-567-89011</li>
									<li>info.deercreative@gmail.com</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Contact Map -->

		<div class="contact_map" style="margin-top:20px">

			<!-- Google Map -->
			
			<div class="map">
				<div id="google_map" class="google_map">
					<div class="map_container">
						<div id="map" style="position: relative; overflow: hidden;">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7947.5541558417435!2d119.450046!3d-5.139557!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefd322672b63b%3A0xb9c9aaa7bb2ce719!2sKalla%20Institute!5e0!3m2!1sen!2sid!4v1668422926645!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
				</div>
			</div>

		</div>
		
	</div>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/contact.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/contact_responsive.css')}}">
	<style>
	.contact {
		width: 100%;
		padding-top: 0;
		padding-bottom: 0;
	}
	</style>
</div>
