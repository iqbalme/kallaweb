<!-- Header -->

	<header class="header">
			
		<!-- Top Bar -->
		<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									<li>
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div>{{$data['no_kontak']}}</div>
									</li>
									<li>
										<i class="fa fa-envelope-o" aria-hidden="true"></i>
										<div>{{$data['email']}}</div>
									</li>
								</ul>
								<!--div class="top_bar_login ml-auto">
									<div class="login_button"><a href="{{route('registrasi')}}">Register</a></div>
								</div-->
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>

		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="{{route('home')}}">
									<div class="logo_text"><img src="{{ asset('storage/images/'.$data['web_logo']) }}"></div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li><a href="{{route('home')}}">Home</a></li>
									<li><a href="about.html">Profil</a></li>
									<li><a href="courses.html">Akademik</a></li>
									<li><a href="blog.html">Berita</a></li>
									<li><a href="#">Page</a></li>
									<li><a href="{{route('kontak')}}">Kontak</a></li>
								</ul>

								<!-- Hamburger -->

								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Search Panel -->
		<div class="header_search_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
							<form action="#" class="header_search_form">
								<input type="search" class="search_input" placeholder="Search" required="required">
								<button class="header_search_button d-flex flex-column align-items-center justify-content-center">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</div>			
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<!--div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div-->
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="{{route('home')}}">Home</a></li>
				<li class="menu_mm"><a href="#">About</a></li>
				<li class="menu_mm"><a href="#">Courses</a></li>
				<li class="menu_mm"><a href="#">Blog</a></li>
				<li class="menu_mm"><a href="#">Page</a></li>
				<li class="menu_mm"><a href="{{route('kontak')}}">Contact</a></li>
			</ul>
		</nav>

	<style>
		.ml-auto, .mx-auto {
			margin-left: auto!important;
		}
		.navbar.sticky-top {
			top: -100px;
			transition: .5s;
		}
		.navbar .navbar-brand, .navbar a.btn {
			height: 80px;
		}
		.top_bar {
			width: 100%;
			background: #02803E;
		}
		.logo_text img {
			max-height: 27px;
		}
	</style>
	</div>