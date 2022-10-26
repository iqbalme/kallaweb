<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="{{ $data['web_description'] }}">
    <meta name="author" content="Kalla Institute">
    <meta name="keyword" content="{{ $data['web_keywords'] }}">
    <title>Admin Dashboard - {{ $data['web_title'] }}</title>
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('storage/images/'.$data['web_icon']) }}">
    <link rel="icon" type="image/png" sizes="114x114" href="{{ asset('storage/images/'.$data['web_icon']) }}">
    <link rel="manifest" href="{{ asset('admin/assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('storage/images/'.$data['web_icon']) }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('admin/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="{{ asset('admin/css/examples.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/icons@2.0.0-rc.0/css/free.min.css" integrity="sha256-vejWHgYduBq3SYXJHSWSRJp7ktQpZ6d+8HGFtb9Fz9k=" crossorigin="anonymous">
	
	<!-- Font Awesome -->
	<!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/8b91ad4956.js" crossorigin="anonymous"></script>

	@livewireStyles
  </head>
  <body>
    @include('components.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      @include('components.header')
		<div class="header-divider"></div>
		<div class="container-fluid">
		  <nav aria-label="breadcrumb">
			<ol class="breadcrumb my-0 ms-2">
			  <li class="breadcrumb-item">
				<!-- if breadcrumb is single--><span>Home</span>
			  </li>
			  <li class="breadcrumb-item active"><span>{{ $breadcrumb }}</span></li>
			</ol>
		  </nav>
		</div>
		</header>
		{{ $slot }}
      @include('components.footer')
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('admin/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/simplebar/js/simplebar.min.js') }}"></script>
	<script src="https://kit.fontawesome.com/8b91ad4956.js" crossorigin="anonymous"></script>
    <!--script src="{{ asset('admin/js/main.js') }}"></script-->

	@livewireScripts
  </body>
</html>