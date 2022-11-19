<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keyword" content="{{ $data['web_keywords'] }}">
<meta name="description" content="{{ $data['web_description'] }}">
<meta name="author" content="Kalla Institute">
<link rel="icon" type="image/png" href="{{ asset('storage/images/'.$data['web_icon']) }}">

<title>{{ isset($title) ? $title : '' }} - {{ $data['web_title'] }}</title>

<!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"-->
<link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('frontend/theme/unicat/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/responsive.css')}}">
<script src="{{asset('frontend/theme/js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('frontend/theme/js/vendor/bootstrap.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script-->
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
	<link href="{{asset('frontend/assets/css/kalla-style.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{asset('frontend/assets/css/style-ezuca.css')}}">
	@livewireStyles
</head>
<body>
<div class="super_container">

@include('layouts.nav')
@yield('content')
@include('layouts.footer')
	
</div>
<!--script src="{{asset('frontend/theme/unicat/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('frontend/theme/unicat/plugins/greensock/TimelineMax.min.js')}}"></script-->
<script src="{{asset('frontend/theme/unicat/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<!--script src="{{asset('frontend/theme/unicat/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('frontend/theme/unicat/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('frontend/theme/unicat/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('frontend/theme/unicat/plugins/easing/easing.js')}}"></script-->
<script src="{{asset('frontend/theme/unicat/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('frontend/theme/unicat/js/custom.js')}}"></script>

@livewireScripts
</body>
</html>