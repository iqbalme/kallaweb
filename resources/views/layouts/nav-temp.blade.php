<div>
    <nav class="navbar navbar-expand-md navbar-dark">
		<div class="container">
			<a href="{{ route('home') }}" class="navbar-brand"><img src="{{ asset('storage/images/'.$data['web_icon']) }}"></a>
			
			<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav">
				<span class="menu-icon-bar"></span>
				<span class="menu-icon-bar"></span>
				<span class="menu-icon-bar"></span>
			</button>
			
			<div id="main-nav" class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
					<li><a href="{{ route('home') }}" class="nav-item nav-link">Beranda</a></li>
					<li class="dropdown">
						<a href="#" class="nav-item nav-link" data-toggle="dropdown">Profil</a>
						<div class="dropdown-menu">
							<a href="#" class="dropdown-item">Tentang</a>
							<a href="#" class="dropdown-item">Sambutan Rektor</a>
							<a href="#" class="dropdown-item">Visi Misi</a>
							<a href="#" class="dropdown-item">Struktur Organisasi</a>
							<a href="#" class="dropdown-item">Informasi Publik</a>
							<a href="#" class="dropdown-item">Tim</a>
						</div>
					</li>
					<li class="dropdown">
						<a href="#" class="nav-item nav-link" data-toggle="dropdown">Akademik</a>
						<div class="dropdown-menu">
							<a href="#" class="dropdown-item">Prodi Bisnis Digital</a>
							<a href="#" class="dropdown-item">Prodi Kewirausahaan</a>
							<a href="#" class="dropdown-item">Prodi Manajemen Retail</a>
							<a href="#" class="dropdown-item">Prodi Sistem Informasi</a>
						</div>
					</li>
					<li class="dropdown">
						<a href="#" class="nav-item nav-link" data-toggle="dropdown">Publikasi</a>
						<div class="dropdown-menu">
							<a href="#" class="dropdown-item">Berita</a>
							<a href="#" class="dropdown-item">Pengumuman</a>
							<a href="#" class="dropdown-item">Artikel/Opini</a>
							<a href="#" class="dropdown-item">Tulisan</a>
						</div>
					</li>
					<li><a href="{{ route('registrasi') }}" class="nav-item btn btn-warning admisi-menu">Admisi</a></li>
				</ul>
			</div>
		</div>
	</nav>
  <style>
	@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700,800');
	@import url('https://fonts.googleapis.com/css?family=Lobster');
	html {
	  font-size: 62.5%;
	}
	body {
	  font-family: 'Open Sans', sans-serif;
	  font-size: 1.6rem;
	  font-weight: 400;
	}
	h1 {
	  margin-bottom: 0.5em;
	  font-size: 3.6rem;
	}
	p {
	  margin-bottom: 0.5em;
	  font-size: 1.6rem;
	  line-height: 1.6;
	}
	.overlay::after {
	  content: '';
	  position: absolute;
	  bottom: 0;
	  left: 0;
	  right: 0;
	  top: 0;
	  background-color: rgba(0, 0, 0, .3);
	}

	.navbar .navbar-toggler {
	  position: relative;
	  height: 50px;
	  width: 50px;
	  border: none;
	  cursor: pointer;
	  outline: none;
	}
	.navbar {
		background-color: #e6e6e6;
	}
	
	.navbar .navbar-toggler .menu-icon-bar {
	  position: absolute;
	  left: 15px;
	  right: 15px;
	  height: 2px;
	  background-color: #000;
	  opacity: 0;
	  -webkit-transform: translateY(-1px);
	  -ms-transform: translateY(-1px);
	  transform: translateY(-1px);
	  transition: all 0.3s ease-in;
	}
	
	.navbar .navbar-toggler .menu-icon-bar:first-child {
	  opacity: 1;
	  -webkit-transform: translateY(-1px) rotate(45deg);
	  -ms-sform: translateY(-1px) rotate(45deg);
	  transform: translateY(-1px) rotate(45deg);
	}
	.navbar .navbar-toggler .menu-icon-bar:last-child {
	  opacity: 1;
	  -webkit-transform: translateY(-1px) rotate(135deg);
	  -ms-sform: translateY(-1px) rotate(135deg);
	  transform: translateY(-1px) rotate(135deg);
	}
	.navbar .navbar-toggler.collapsed .menu-icon-bar {
	  opacity: 1;
	}
	.navbar .navbar-toggler.collapsed .menu-icon-bar:first-child {
	  -webkit-transform: translateY(-7px) rotate(0);
	  -ms-sform: translateY(-7px) rotate(0);
	  transform: translateY(-7px) rotate(0);
	}
	.navbar .navbar-toggler.collapsed .menu-icon-bar:last-child {
	  -webkit-transform: translateY(5px) rotate(0);
	  -ms-sform: translateY(5px) rotate(0);
	  transform: translateY(5px) rotate(0);
	}
	.navbar-dark .navbar-nav .nav-link {
	  position: relative;
	  color: #000;
	  font-size: 1.6rem;
	  font-weight:bold;
	}
	
	.navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover {
	  background-color: #F5E802;
	  padding: 7px;
	  color: #000;
	}
	
	.navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link.active {
	  background-color: #006e02;
	  padding: 7px;
	  color: #fff;
	}
	
	.navbar .dropdown-menu {
	  padding: 0;
	  background-color: rgba(0, 0, 0, .9);
	}
	.navbar .dropdown-menu .dropdown-item {
	  position: relative;
	  padding: 10px 20px;
	  color: #fff;
	  font-size: 1.4rem;
	  border-bottom: 1px solid rgba(255, 255, 255, .1);
	  transition: color 0.2s ease-in;
	}
	.navbar .dropdown-menu .dropdown-item:last-child {
	  border-bottom: none;
	}
	.navbar .dropdown-menu .dropdown-item:hover {
	  background: transparent;
	  color: #c0ca33;
	}
	.navbar .dropdown-menu .dropdown-item::before {
	  content: '';
	  position: absolute;
	  bottom: 0;
	  left: 0;
	  top: 0;
	  width: 5px;
	  background-color: #c0ca33;
	  opacity: 0;
	  transition: opacity 0.2s ease-in;
	}
	.navbar .dropdown-menu .dropdown-item:hover::before {
	  opacity: 1;
	}
	.navbar.fixed-top {
	  position: fixed;
	  -webkit-animation: navbar-animation 0.6s;
	  animation: navbar-animation 0.6s;
	  background-color: #e6e6e6;
	  color: #000 !important;
	}
	
	.navbar.fixed-top.navbar-dark .navbar-nav .nav-link {
	  color: #000;
	}
	
	.navbar.fixed-top.navbar-dark .navbar-nav .nav-link.active {
	  color: #fff;
	  background-color: #006e02;
	}
	
	.navbar.fixed-top.navbar-dark .navbar-nav .nav-link:hover {
	  color: #fff;
	  background-color: #006e02;
	}
	
	.navbar-brand > img {
		max-height: 90px;
	}
	.content {
	  padding: 120px 0;
	}
	@media screen and (max-width: 768px) {
	  .navbar-brand {
		margin-left: 20px;
	  }
	  .navbar-nav {
		padding: 10px 20px;
		background-color: #fff;
	  }
	  .navbar.fixed-top .navbar-nav {
		background: transparent;
	  }
	  
	  .admisi-menu {		
			margin-top: 5px !important;
			color: #fff;
			font-size: 1.6rem;
			padding: 5px 11px;
			border-radius: 15px;
		}
	}
	
	@media screen and (min-width: 767px) {
	  .navbar-dark .navbar-nav .nav-link {
		padding: 10px 15px;
	  }

	  .dropdown-menu {
		min-width: 200px;
		-webkit-animation: dropdown-animation 0.3s;
		animation: dropdown-animation 0.3s;
		-webkit-transform-origin: top;
		-ms-transform-origin: top;
		transform-origin: top;
	  }
	  
	  .admisi-menu {		
			margin-top: 5px !important;
			color: #fff;
			font-size: 1.6rem;
			padding: 5px 11px;
			border-radius: 15px;
			margin-left: 13px;
		}
	}
	
	.admisi-menu:hover {
		color: #fff;
		background-color: #05a141;
		border: 0px;
	}
	
	@-webkit-keyframes navbar-animation {
	  0% {
		opacity: 0;
		-webkit-transform: translateY(-100%);
		-ms-transform: translateY(-100%);
		transform: translateY(-100%);
	  }
	  100% {
		opacity: 1;
		-webkit-transform: translateY(0);
		-ms-transform: translateY(0);
		transform: translateY(0);
	  }
	}
	@keyframes navbar-animation {
	  0% {
		opacity: 0;
		-webkit-transform: translateY(-100%);
		-ms-transform: translateY(-100%);
		transform: translateY(-100%);
	  }
	  100% {
		opacity: 1;
		-webkit-transform: translateY(0);
		-ms-transform: translateY(0);
		transform: translateY(0);
	  }
	}
	@-webkit-keyframes dropdown-animation {
	  0% {
		-webkit-transform: scaleY(0);
		-ms-transform: scaleY(0);
		transform: scaleY(0);
	  }
	  75% {
		-webkit-transform: scaleY(1.1);
		-ms-transform: scaleY(1.1);
		transform: scaleY(1.1);
	  }
	  100% {
		-webkit-transform: scaleY(1);
		-ms-transform: scaleY(1);
		transform: scaleY(1);
	  }
	}
	@keyframes dropdown-animation {
	  0% {
		-webkit-transform: scaleY(0);
		-ms-transform: scaleY(0);
		transform: scaleY(0);
	  }
	  75% {
		-webkit-transform: scaleY(1.1);
		-ms-transform: scaleY(1.1);
		transform: scaleY(1.1);
	  }
	  100% {
		-webkit-transform: scaleY(1);
		-ms-transform: scaleY(1);
		transform: scaleY(1);
	  }
	}
  </style>
</div>