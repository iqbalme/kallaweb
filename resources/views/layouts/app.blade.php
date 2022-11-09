<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keyword" content="{{ $data['web_keywords'] }}">
	<meta name="description" content="{{ $data['web_description'] }}">
    <meta name="author" content="Kalla Institute">
    <link rel="icon" type="image/png" href="{{ asset('storage/images/'.$data['web_icon']) }}">

    <title>{{ isset($title) ? $title : '' }} - {{ $data['web_title'] }}</title>

	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/theme/css/styles-merged.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/theme/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/theme/css/custom.css') }}">
    
	@isset($data['google_analytics'])
	<!-- Google tag (gtag.js) -->
	<script async src="{{ 'https://www.googletagmanager.com/gtag/js?id=' . $data['google_analytics'] }}"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', {{ $data['google_analytics'] }});
	</script>
	@endisset
	@isset($data['fb_pixel'])
	<!-- Facebook Pixel Code -->
	<script>
	  !function(f,b,e,v,n,t,s)
	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	  n.queue=[];t=b.createElement(e);t.async=!0;
	  t.src=v;s=b.getElementsByTagName(e)[0];
	  s.parentNode.insertBefore(t,s)}(window, document,'script',
	  'https://connect.facebook.net/en_US/fbevents.js');
	  fbq('init', {{ $data['fb_pixel'] }});
	  fbq('track', 'PageView');
	</script>
	<noscript>
	  <img height="1" width="1" style="display:none" src="{{ 'https://www.facebook.com/tr?id=' . $data['fb_pixel'] . '&ev=PageView&noscript=1' }}/>
	</noscript>
	<!-- End Facebook Pixel Code -->
	@endisset
	
	@livewireStyles
  </head>

  <body>

	@include('layouts.nav')
	@yield('content')
	@include('layouts.footer')

    <script src="{{ asset('frontend/theme/js/scripts.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/js/main.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/js/custom.js') }}"></script>
	@livewireScripts
  </body>
</html>
