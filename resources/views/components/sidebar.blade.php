<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
  <div class="sidebar-brand d-none d-md-flex">
	<img class="sidebar-brand-full" width="118" height="46" alt="Kalla Group Logo" src="https://i.postimg.cc/ZK5qzGVV/kalla-group.png">
	<img class="sidebar-brand-narrow" width="46" height="46" alt="Kalla Group Logo" src="https://i.postimg.cc/ZK5qzGVV/kalla-group.png">
  </div>
  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
	<li class="nav-item"><a class="nav-link" href="{{ route('dashboard.admin') }}">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-home') }}"></use>
		</svg> Home</a></li>
	<li class="nav-title">MENU</li>
	<li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
		</svg> Kategori</a></li>
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
	<li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
		</svg> User</a></li>
	<li class="nav-item"><a class="nav-link" href="{{ route('setting.index') }}">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
		</svg> Pengaturan</a></li>
  </ul>
</div>