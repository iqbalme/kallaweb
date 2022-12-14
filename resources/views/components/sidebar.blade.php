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
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}" target="blank"><i class="material-symbols-outlined nav-icon" style="font-size:25px;">preview</i> Preview Web</a></li>
	<li class="nav-title">MENU</li>
    @if(Auth::user()->role_users[0]->role_id == 1)
	<li class="nav-item"><a class="nav-link" href="{{ route('kategori.index') }}">
		<i class="fa-solid fa-code-branch nav-icon"></i> Kategori</a></li>
	<li class="nav-item"><a class="nav-link" href="{{ route('prodi.index') }}">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/coreui-icons/sprites/free.svg#cil-school') }}"></use>
		</svg> Prodi</a></li>
    @endif
	<li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/coreui-icons/sprites/free.svg#cil-note-add') }}"></use>
		</svg> Publikasi</a>
	  <ul class="nav-group-items">
		<li class="nav-item"><a class="nav-link" href="{{ route('post.create') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
		</svg> Buat Post Baru</a></li>
		<li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/coreui-icons/sprites/free.svg#cil-library') }}"></use>
		</svg> List Post</a></li>
		<li class="nav-item"><a class="nav-link" href="{{ route('event.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-calendar-days nav-icon"></i> Event</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('team.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-symbols-outlined nav-icon" style="font-size:25px;">diversity_3</i> Tim</a></li>
        @if(Auth::user()->role_users[0]->role_id == 1)
            <li class="nav-item"><a class="nav-link" href="{{ route('fasilitas.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-symbols-outlined nav-icon" style="font-size:25px;">gallery_thumbnail</i> Fasilitas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('testimoni.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-symbols-outlined nav-icon" style="font-size:25px;">forum</i> Testimoni</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pengumuman.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-symbols-outlined nav-icon" style="font-size:25px;">campaign</i> Pengumuman</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('faq.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-symbols-outlined nav-icon" style="font-size:25px;">quiz</i> FAQ</a></li>
        @endif
	  </ul>
	</li>
    @if(Auth::user()->role_users[0]->role_id == 1)
	<li class="nav-item"><a class="nav-link" href="{{ route('voucher.index') }}">
		<svg class="nav-icon">
		  <use xlink:href="{{ asset('admin/coreui-icons/sprites/free.svg#cil-gift') }}"></use>
		</svg> Voucher</a></li>
	<li class="nav-item"><a class="nav-link" href="{{ route('pendaftar.index') }}">
		<i class="fa-regular fa-address-card nav-icon"></i> Pendaftar</a></li>
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
			<li class="nav-item"><a class="nav-link" href="{{ route('pengaturan.dasar') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-symbols-outlined nav-icon" style="font-size:25px;">web</i> Website</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ route('pengaturan.admisi') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-symbols-outlined nav-icon" style="font-size:25px;">how_to_reg</i> Admisi</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ route('pengaturan.pembayaran') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-symbols-outlined nav-icon" style="font-size:25px;">payments</i> Pembayaran</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ route('pengaturan.tema') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-display nav-icon"></i> Tema</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ route('pengaturan.mail') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-symbols-outlined nav-icon" style="font-size:25px;">contact_mail</i> Mail</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ route('pengaturan.webhook') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-symbols-outlined nav-icon" style="font-size:25px;">webhook</i> Webhook</a></li>
			<li class="nav-item"><a class="nav-link" href="{{ route('pengaturan.database') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-symbols-outlined nav-icon" style="font-size:25px;">delete_sweep</i> Database</a></li>
		  </ul>
	</li>
    @endif
  </ul>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
	.material-symbols-outlined {
	  font-variation-settings:
	  'FILL' 0,
	  'wght' 400,
	  'GRAD' 0,
	  'opsz' 48
	}
  </style>
</div>
