<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
  <div class="sidebar-brand d-none d-md-flex">
	<img class="sidebar-brand-full" width="118" height="46" alt="Web Logo" src="{{ asset('storage/images/'.$data['web_logo']) }}">
	<img class="sidebar-brand-narrow" width="46" height="46" alt="Web Logo" src="{{ asset('storage/images/'.$data['web_logo']) }}">
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
		<li class="nav-item"><a class="nav-link" href="{{ route('katalog.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-sheet-plastic nav-icon"></i> List</a></li>
		<li class="nav-item"><a class="nav-link" href="{{ route('voucher.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/coreui-icons/sprites/free.svg#cil-gift') }}"></use>
		</svg> Voucher</a></li>
	  </ul>
	</li>
	
	<li class="nav-item"><a class="nav-link" href="#">
		<i class="fa-regular fa-address-card nav-icon"></i> Pendaftar</a></li>
	
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
			<li class="nav-item"><a class="nav-link" href="{{ route('pengaturan.dasar') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-mobile-retro nav-icon"></i> Dasar</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ route('pengaturan.tema') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-display nav-icon"></i> Tema</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ route('pengaturan.menu') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-brands fa-mendeley nav-icon"></i> Menu</a></li>
		  </ul>			
	</li>
  </ul>
  <style>
	.sidebar {
		--cui-sidebar-bg: {{ $data['theme_color_sidebar_bg'] }} !important;
		--cui-sidebar-nav-link-color: {{ $data['theme_color_link'] }} !important;
		--cui-sidebar-nav-link-active-color: {{ $data['theme_color_link_active'] }} !important;
		--cui-sidebar-nav-link-active-bg: {{ $data['theme_color_link_active_bg'] }} !important;
		--cui-sidebar-nav-link-active-icon-color: {{ $data['theme_color_icon_active'] }} !important;
		--cui-sidebar-nav-link-hover-color: {{ $data['theme_color_link_hover'] }} !important;
		--cui-sidebar-nav-link-hover-icon-color: {{ $data['theme_color_icon_hover'] }} !important;
	};
  </style>
</div>