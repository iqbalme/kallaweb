<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
  <div class="sidebar-brand d-none d-md-flex">
	<img class="sidebar-brand-full" width="118" height="46" alt="Web Logo" src="{{ asset('storage/images/'.$web_logo) }}">
	<img class="sidebar-brand-narrow" width="46" height="46" alt="Web Logo" src="{{ asset('storage/images/'.$web_logo) }}">
  </div>
  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
	<li class="nav-item"><a class="nav-link" href="{{ route('dashboard.admin') }}">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-home') }}"></use>
		</svg> Home</a></li>
	<li class="nav-title">MENU</li>
	<li class="nav-item"><a class="nav-link" href="{{ route('kategori.index') }}">
		<i class="fa-solid fa-code-branch nav-icon"></i> Kategori</a></li>
	<li class="nav-item"><a class="nav-link" href="{{ route('prodi.index') }}">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/coreui-icons/sprites/free.svg#cil-school') }}"></use>
		</svg> Prodi</a></li>
	
	<li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/coreui-icons/sprites/free.svg#cil-note-add') }}"></use>
		</svg> Publikasi</a>
	  <ul class="nav-group-items">
		<li class="nav-item"><a class="nav-link" href="{{ route('post.create') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
		</svg> Buat Baru</a></li>
		<li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/coreui-icons/sprites/free.svg#cil-library') }}"></use>
		</svg> List</a></li>
		<li class="nav-item"><a class="nav-link" href="{{ route('post.create') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-sliders nav-icon"></i> Carousel</a></li>
	  </ul>
	</li>
	
	<li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/coreui-icons/sprites/free.svg#cil-notes') }}"></use>
		</svg> Katalog</a>
	  <ul class="nav-group-items">
		<li class="nav-item"><a class="nav-link" href="{{ route('katalog.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-cart') }}"></use>
		</svg> List</a></li>
		<li class="nav-item"><a class="nav-link" href="{{ route('voucher.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/coreui-icons/sprites/free.svg#cil-gift') }}"></use>
		</svg> Voucher</a></li>
	  </ul>
	</li>
	
	<li class="nav-item"><a class="nav-link" href="#">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/coreui-icons/sprites/free.svg#cil-color-border') }}"></use>
		</svg> Pendaftar</a></li>
	
	<!--li class="nav-item"><a class="nav-link" href="#">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
		</svg> Statistik</a></li-->
	<li class="nav-divider"></li>
	<li class="nav-item"><a class="nav-link" href="{{ route('role.index') }}">
		<i class="fa-solid fa-list-check nav-icon"></i> Role</a></li>
	<li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
		</svg> User</a></li>
	
	<li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
		</svg> Pengaturan</a>
		<ul class="nav-group-items">
			<li class="nav-item"><a class="nav-link" href="{{ route('pengaturan.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-mobile-retro nav-icon"></i> Umum</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ route('voucher.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-brands fa-mendeley nav-icon"></i> Menu</a></li>
		  </ul>			
	</li>
  </ul>
</div>