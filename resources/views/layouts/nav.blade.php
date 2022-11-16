<!-- Header -->

	<header class="header site-navbar">
			
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
        <div class="row-nav align-items-center">
          
          <div class="col-11 col-xl-2">
            <div class="mb-0 site-logo"><a href="{{route('home')}}" class="text-white mb-0"><img src="{{ asset('storage/images/'.$data['web_logo']) }}"></a></div>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation-nav position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="{{route('home')}}"><span>Beranda</span></a></li>
                <li class="has-children">
                  <a href="about.html"><span>Dropdown</span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                    <li class="has-children">
                      <a href="#">Dropdown</a>
                      <ul class="dropdown">
                        <li><a href="#">Menu One</a></li>
                        <li><a href="#">Menu Two</a></li>
                        <li><a href="#">Menu Three</a></li>
                        <li><a href="#">Menu Four</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="listings.html"><span>Listings</span></a></li>
                <li><a href="about.html"><span>About</span></a></li>
                <li><a href="blog.html"><span>Blog</span></a></li>
                <li><a href="contact.html"><span>Contact</span></a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
	</header>

	<!-- Menu -->

	<div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
	<style>
	a {
	  -webkit-transition: .3s all ease;
	  -o-transition: .3s all ease;
	  transition: .3s all ease; }
	  a, a:hover {
		text-decoration: none !important; }

	.site-navbar {
	  margin-bottom: 0px;
	  z-index: 1999;
	  position: absolute;
	  /* top: 2rem; */
	  width: 100%; }
	  .site-navbar.transparent {
		background: transparent; }
	  .site-navbar.absolute {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%; }
	  .site-navbar .site-logo {
		position: relative;
		left: 0; }
	  .site-navbar .site-logo img { max-height:56px; padding: 5px 0 1px 0; }
	  .site-navbar .site-navigation-nav .site-menu {
		margin-bottom: 0; }
		.site-navbar .site-navigation-nav .site-menu .active > a span {
		  background: #007bff;
		  color: #fff;
		  border-radius: 30px;
		  display: inline-block;
		  padding: 5px 20px; }
		.site-navbar .site-navigation-nav .site-menu a {
		  text-decoration: none !important;
		  display: inline-block; }
		.site-navbar .site-navigation-nav .site-menu > li {
		  display: inline-block; }
		  .site-navbar .site-navigation-nav .site-menu > li > a {
			padding: 10px 0px;
			color: #384158;
			font-size: 16px;
			text-decoration: none !important; }
			.site-navbar .site-navigation-nav .site-menu > li > a > span {
			  padding: 5px 20px;
			  display: inline-block;
			  -webkit-transition: .3s all ease;
			  -o-transition: .3s all ease;
			  transition: .3s all ease;
			  border-radius: 30px; }
			.site-navbar .site-navigation-nav .site-menu > li > a:hover > span {
			  background: #007bff;
			  color: #fff;
			  border-radius: 30px;
			  display: inline-block; }
		.site-navbar .site-navigation-nav .site-menu .has-children {
		  position: relative; }
		  .site-navbar .site-navigation-nav .site-menu .has-children > a span {
			position: relative;
			padding-right: 30px; }
			.site-navbar .site-navigation-nav .site-menu .has-children > a span:before {
			  position: absolute;
			  content: "\e313";
			  font-size: 16px;
			  top: 50%;
			  right: 10px;
			  -webkit-transform: translateY(-50%);
			  -ms-transform: translateY(-50%);
			  transform: translateY(-50%);
			  font-family: 'icomoon'; }
		  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown {
			visibility: hidden;
			opacity: 0;
			top: 100%;
			position: absolute;
			text-align: left;
			border-top: 2px solid #007bff;
			-webkit-box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.1);
			box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.1);
			padding: 0px 0;
			margin-top: 20px;
			margin-left: 0px;
			background: #fff;
			-webkit-transition: 0.2s 0s;
			-o-transition: 0.2s 0s;
			transition: 0.2s 0s; }
			.site-navbar .site-navigation-nav .site-menu .has-children .dropdown.arrow-top {
			  position: absolute; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown.arrow-top:before {
				bottom: 100%;
				left: 20%;
				border: solid transparent;
				content: " ";
				height: 0;
				width: 0;
				position: absolute;
				pointer-events: none; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown.arrow-top:before {
				border-color: rgba(136, 183, 213, 0);
				border-bottom-color: #fff;
				border-width: 10px;
				margin-left: -10px; }
			.site-navbar .site-navigation-nav .site-menu .has-children .dropdown a {
			  text-transform: none;
			  letter-spacing: normal;
			  -webkit-transition: 0s all;
			  -o-transition: 0s all;
			  transition: 0s all;
			  color: #343a40; }
			.site-navbar .site-navigation-nav .site-menu .has-children .dropdown .active > a {
			  color: #007bff !important; }
			.site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li {
			  list-style: none;
			  padding: 0;
			  margin: 0;
			  min-width: 200px; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li > a {
				padding: 9px 20px;
				display: block; }
				.site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li > a:hover {
				  background: #fafafb; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children > a {
				position: relative; }
				.site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children > a:after {
				  position: absolute;
				  right: 0;
				  content: "\e315";
				  right: 20px;
				  font-family: 'icomoon'; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children > .dropdown, .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children > ul {
				left: 100%;
				top: 0; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children:hover > a, .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children:active > a, .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children:focus > a {
				background: #fafafb; }
		  .site-navbar .site-navigation-nav .site-menu .has-children:hover > a, .site-navbar .site-navigation-nav .site-menu .has-children:focus > a, .site-navbar .site-navigation-nav .site-menu .has-children:active > a {
			color: #007bff; }
			.site-navbar .site-navigation-nav .site-menu .has-children:hover > a span, .site-navbar .site-navigation-nav .site-menu .has-children:focus > a span, .site-navbar .site-navigation-nav .site-menu .has-children:active > a span {
			  background: #007bff;
			  color: #fff; }
		  .site-navbar .site-navigation-nav .site-menu .has-children:hover, .site-navbar .site-navigation-nav .site-menu .has-children:focus, .site-navbar .site-navigation-nav .site-menu .has-children:active {
			cursor: pointer; }
			.site-navbar .site-navigation-nav .site-menu .has-children:hover > .dropdown, .site-navbar .site-navigation-nav .site-menu .has-children:focus > .dropdown, .site-navbar .site-navigation-nav .site-menu .has-children:active > .dropdown {
			  -webkit-transition-delay: 0s;
			  -o-transition-delay: 0s;
			  transition-delay: 0s;
			  margin-top: 0px;
			  visibility: visible;
			  opacity: 1; }

	.site-mobile-menu {
	  width: 300px;
	  position: fixed;
	  right: 0;
	  z-index: 2000;
	  padding-top: 20px;
	  background: #fff;
	  height: calc(100vh);
	  -webkit-transform: translateX(110%);
	  -ms-transform: translateX(110%);
	  transform: translateX(110%);
	  -webkit-box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
	  box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
	  -webkit-transition: .3s all ease-in-out;
	  -o-transition: .3s all ease-in-out;
	  transition: .3s all ease-in-out; }
	  .offcanvas-menu .site-mobile-menu {
		-webkit-transform: translateX(0%);
		-ms-transform: translateX(0%);
		transform: translateX(0%); }
	  .site-mobile-menu .site-mobile-menu-header {
		width: 100%;
		float: left;
		padding-left: 20px;
		padding-right: 20px; }
		.site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close {
		  float: right;
		  margin-top: 8px; }
		  .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span {
			font-size: 30px;
			display: inline-block;
			padding-left: 10px;
			padding-right: 0px;
			line-height: 1;
			cursor: pointer;
			-webkit-transition: .3s all ease;
			-o-transition: .3s all ease;
			transition: .3s all ease; }
			.site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span:hover {
			  color: #f8f9fa; }
		.site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo {
		  float: left;
		  margin-top: 10px;
		  margin-left: 0px; }
		  .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a {
			display: inline-block;
			text-transform: uppercase; }
			.site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a img {
			  max-width: 70px; }
			.site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a:hover {
			  text-decoration: none; }
	  .site-mobile-menu .site-mobile-menu-body {
		overflow-y: scroll;
		-webkit-overflow-scrolling: touch;
		position: relative;
		padding: 0 20px 20px 20px;
		height: calc(100vh - 52px);
		padding-bottom: 150px; }
	  .site-mobile-menu .site-nav-wrap {
		padding: 0;
		margin: 0;
		list-style: none;
		position: relative; }
		.site-mobile-menu .site-nav-wrap a {
		  padding: 10px 20px;
		  display: block;
		  position: relative;
		  color: #212529; }
		  .site-mobile-menu .site-nav-wrap a:hover {
			color: #007bff; }
		.site-mobile-menu .site-nav-wrap li {
		  position: relative;
		  display: block; }
		  .site-mobile-menu .site-nav-wrap li.active > a {
			color: #007bff; }
		.site-mobile-menu .site-nav-wrap .arrow-collapse {
		  position: absolute;
		  right: 0px;
		  top: 10px;
		  z-index: 20;
		  width: 36px;
		  height: 36px;
		  text-align: center;
		  cursor: pointer;
		  border-radius: 50%; }
		  .site-mobile-menu .site-nav-wrap .arrow-collapse:hover {
			background: #f8f9fa; }
		  .site-mobile-menu .site-nav-wrap .arrow-collapse:before {
			font-size: 12px;
			z-index: 20;
			font-family: "icomoon";
			content: "\f078";
			position: absolute;
			top: 50%;
			left: 50%;
			-webkit-transform: translate(-50%, -50%) rotate(-180deg);
			-ms-transform: translate(-50%, -50%) rotate(-180deg);
			transform: translate(-50%, -50%) rotate(-180deg);
			-webkit-transition: .3s all ease;
			-o-transition: .3s all ease;
			transition: .3s all ease; }
		  .site-mobile-menu .site-nav-wrap .arrow-collapse.collapsed:before {
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%); }
		.site-mobile-menu .site-nav-wrap > li {
		  display: block;
		  position: relative;
		  float: left;
		  width: 100%; }
		  .site-mobile-menu .site-nav-wrap > li > a {
			padding-left: 20px;
			font-size: 20px; }
		  .site-mobile-menu .site-nav-wrap > li > ul {
			padding: 0;
			margin: 0;
			list-style: none; }
			.site-mobile-menu .site-nav-wrap > li > ul > li {
			  display: block; }
			  .site-mobile-menu .site-nav-wrap > li > ul > li > a {
				padding-left: 40px;
				font-size: 16px; }
			  .site-mobile-menu .site-nav-wrap > li > ul > li > ul {
				padding: 0;
				margin: 0; }
				.site-mobile-menu .site-nav-wrap > li > ul > li > ul > li {
				  display: block; }
				  .site-mobile-menu .site-nav-wrap > li > ul > li > ul > li > a {
					font-size: 16px;
					padding-left: 60px; }
		.site-mobile-menu .site-nav-wrap[data-class="social"] {
		  float: left;
		  width: 100%;
		  margin-top: 30px;
		  padding-bottom: 5em; }
		  .site-mobile-menu .site-nav-wrap[data-class="social"] > li {
			width: auto; }
			.site-mobile-menu .site-nav-wrap[data-class="social"] > li:first-child a {
			  padding-left: 15px !important; }
	.align-items-center {
			-webkit-box-align: center !important;
			-ms-flex-align: center !important;
			align-items: center !important;
		}
	.text-right {
		text-align: right !important;
	}
	@media (min-width: 768px)
		.ml-md-0, .mx-md-0 {
			margin-left: 0 !important;
		}
		.mr-auto, .mx-auto {
			margin-right: auto !important;
		}
	.row-nav {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		margin-right: -15px;
		margin-left: -15px;
	}
	</style>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style-font-nav.css')}}">
	<script src="{{asset('frontend/assets/js/jquery-3.3.1.min.js')}}"></script>
	<!-- Sticky Js inline -->
	<script>
		// Sticky Plugin v1.0.4 for jQuery
		// =============
		// Author: Anthony Garand
		// Improvements by German M. Bravo (Kronuz) and Ruud Kamphuis (ruudk)
		// Improvements by Leonardo C. Daronco (daronco)
		// Created: 02/14/2011
		// Date: 07/20/2015
		// Website: http://stickyjs.com/
		// Description: Makes an element on the page stick on the screen as you scroll
		//              It will only set the 'top' and 'position' of your element, you
		//              might need to adjust the width in some cases.

		(function (factory) {
			if (typeof define === 'function' && define.amd) {
				// AMD. Register as an anonymous module.
				define(['jquery'], factory);
			} else if (typeof module === 'object' && module.exports) {
				// Node/CommonJS
				module.exports = factory(require('jquery'));
			} else {
				// Browser globals
				factory(jQuery);
			}
		}(function ($) {
			var slice = Array.prototype.slice; // save ref to original slice()
			var splice = Array.prototype.splice; // save ref to original slice()

		  var defaults = {
			  topSpacing: 0,
			  bottomSpacing: 0,
			  className: 'is-sticky',
			  wrapperClassName: 'sticky-wrapper',
			  center: false,
			  getWidthFrom: '',
			  widthFromWrapper: true, // works only when .getWidthFrom is empty
			  responsiveWidth: false,
			  zIndex: 'inherit'
			},
			$window = $(window),
			$document = $(document),
			sticked = [],
			windowHeight = $window.height(),
			scroller = function() {
			  var scrollTop = $window.scrollTop(),
				documentHeight = $document.height(),
				dwh = documentHeight - windowHeight,
				extra = (scrollTop > dwh) ? dwh - scrollTop : 0;

			  for (var i = 0, l = sticked.length; i < l; i++) {
				var s = sticked[i],
				  elementTop = s.stickyWrapper.offset().top,
				  etse = elementTop - s.topSpacing - extra;

				//update height in case of dynamic content
				s.stickyWrapper.css('height', s.stickyElement.outerHeight());

				if (scrollTop <= etse) {
				  if (s.currentTop !== null) {
					s.stickyElement
					  .css({
						'width': '',
						'position': '',
						'top': '',
						'z-index': ''
					  });
					s.stickyElement.parent().removeClass(s.className);
					s.stickyElement.trigger('sticky-end', [s]);
					s.currentTop = null;
				  }
				}
				else {
				  var newTop = documentHeight - s.stickyElement.outerHeight()
					- s.topSpacing - s.bottomSpacing - scrollTop - extra;
				  if (newTop < 0) {
					newTop = newTop + s.topSpacing;
				  } else {
					newTop = s.topSpacing;
				  }
				  if (s.currentTop !== newTop) {
					var newWidth;
					if (s.getWidthFrom) {
						padding =  s.stickyElement.innerWidth() - s.stickyElement.width();
						newWidth = $(s.getWidthFrom).width() - padding || null;
					} else if (s.widthFromWrapper) {
						newWidth = s.stickyWrapper.width();
					}
					if (newWidth == null) {
						newWidth = s.stickyElement.width();
					}
					s.stickyElement
					  .css('width', newWidth)
					  .css('position', 'fixed')
					  .css('top', newTop)
					  .css('z-index', s.zIndex);

					s.stickyElement.parent().addClass(s.className);

					if (s.currentTop === null) {
					  s.stickyElement.trigger('sticky-start', [s]);
					} else {
					  // sticky is started but it have to be repositioned
					  s.stickyElement.trigger('sticky-update', [s]);
					}

					if (s.currentTop === s.topSpacing && s.currentTop > newTop || s.currentTop === null && newTop < s.topSpacing) {
					  // just reached bottom || just started to stick but bottom is already reached
					  s.stickyElement.trigger('sticky-bottom-reached', [s]);
					} else if(s.currentTop !== null && newTop === s.topSpacing && s.currentTop < newTop) {
					  // sticky is started && sticked at topSpacing && overflowing from top just finished
					  s.stickyElement.trigger('sticky-bottom-unreached', [s]);
					}

					s.currentTop = newTop;
				  }

				  // Check if sticky has reached end of container and stop sticking
				  var stickyWrapperContainer = s.stickyWrapper.parent();
				  var unstick = (s.stickyElement.offset().top + s.stickyElement.outerHeight() >= stickyWrapperContainer.offset().top + stickyWrapperContainer.outerHeight()) && (s.stickyElement.offset().top <= s.topSpacing);

				  if( unstick ) {
					s.stickyElement
					  .css('position', 'absolute')
					  .css('top', '')
					  .css('bottom', 0)
					  .css('z-index', '');
				  } else {
					s.stickyElement
					  .css('position', 'fixed')
					  .css('top', newTop)
					  .css('bottom', '')
					  .css('z-index', s.zIndex);
				  }
				}
			  }
			},
			resizer = function() {
			  windowHeight = $window.height();

			  for (var i = 0, l = sticked.length; i < l; i++) {
				var s = sticked[i];
				var newWidth = null;
				if (s.getWidthFrom) {
					if (s.responsiveWidth) {
						newWidth = $(s.getWidthFrom).width();
					}
				} else if(s.widthFromWrapper) {
					newWidth = s.stickyWrapper.width();
				}
				if (newWidth != null) {
					s.stickyElement.css('width', newWidth);
				}
			  }
			},
			methods = {
			  init: function(options) {
				return this.each(function() {
				  var o = $.extend({}, defaults, options);
				  var stickyElement = $(this);

				  var stickyId = stickyElement.attr('id');
				  var wrapperId = stickyId ? stickyId + '-' + defaults.wrapperClassName : defaults.wrapperClassName;
				  var wrapper = $('<div></div>')
					.attr('id', wrapperId)
					.addClass(o.wrapperClassName);

				  stickyElement.wrapAll(function() {
					if ($(this).parent("#" + wrapperId).length == 0) {
							return wrapper;
					}
		});

				  var stickyWrapper = stickyElement.parent();

				  if (o.center) {
					stickyWrapper.css({width:stickyElement.outerWidth(),marginLeft:"auto",marginRight:"auto"});
				  }

				  if (stickyElement.css("float") === "right") {
					stickyElement.css({"float":"none"}).parent().css({"float":"right"});
				  }

				  o.stickyElement = stickyElement;
				  o.stickyWrapper = stickyWrapper;
				  o.currentTop    = null;

				  sticked.push(o);

				  methods.setWrapperHeight(this);
				  methods.setupChangeListeners(this);
				});
			  },

			  setWrapperHeight: function(stickyElement) {
				var element = $(stickyElement);
				var stickyWrapper = element.parent();
				if (stickyWrapper) {
				  stickyWrapper.css('height', element.outerHeight());
				}
			  },

			  setupChangeListeners: function(stickyElement) {
				if (window.MutationObserver) {
				  var mutationObserver = new window.MutationObserver(function(mutations) {
					if (mutations[0].addedNodes.length || mutations[0].removedNodes.length) {
					  methods.setWrapperHeight(stickyElement);
					}
				  });
				  mutationObserver.observe(stickyElement, {subtree: true, childList: true});
				} else {
				  if (window.addEventListener) {
					stickyElement.addEventListener('DOMNodeInserted', function() {
					  methods.setWrapperHeight(stickyElement);
					}, false);
					stickyElement.addEventListener('DOMNodeRemoved', function() {
					  methods.setWrapperHeight(stickyElement);
					}, false);
				  } else if (window.attachEvent) {
					stickyElement.attachEvent('onDOMNodeInserted', function() {
					  methods.setWrapperHeight(stickyElement);
					});
					stickyElement.attachEvent('onDOMNodeRemoved', function() {
					  methods.setWrapperHeight(stickyElement);
					});
				  }
				}
			  },
			  update: scroller,
			  unstick: function(options) {
				return this.each(function() {
				  var that = this;
				  var unstickyElement = $(that);

				  var removeIdx = -1;
				  var i = sticked.length;
				  while (i-- > 0) {
					if (sticked[i].stickyElement.get(0) === that) {
						splice.call(sticked,i,1);
						removeIdx = i;
					}
				  }
				  if(removeIdx !== -1) {
					unstickyElement.unwrap();
					unstickyElement
					  .css({
						'width': '',
						'position': '',
						'top': '',
						'float': '',
						'z-index': ''
					  })
					;
				  }
				});
			  }
			};

		  // should be more efficient than using $window.scroll(scroller) and $window.resize(resizer):
		  if (window.addEventListener) {
			window.addEventListener('scroll', scroller, false);
			window.addEventListener('resize', resizer, false);
		  } else if (window.attachEvent) {
			window.attachEvent('onscroll', scroller);
			window.attachEvent('onresize', resizer);
		  }

		  $.fn.sticky = function(method) {
			if (methods[method]) {
			  return methods[method].apply(this, slice.call(arguments, 1));
			} else if (typeof method === 'object' || !method ) {
			  return methods.init.apply( this, arguments );
			} else {
			  $.error('Method ' + method + ' does not exist on jQuery.sticky');
			}
		  };

		  $.fn.unstick = function(method) {
			if (methods[method]) {
			  return methods[method].apply(this, slice.call(arguments, 1));
			} else if (typeof method === 'object' || !method ) {
			  return methods.unstick.apply( this, arguments );
			} else {
			  $.error('Method ' + method + ' does not exist on jQuery.sticky');
			}
		  };
		  $(function() {
			setTimeout(scroller, 0);
		  });
		}));
	</script>
	<script src="{{asset('frontend/assets/js/main-nav.js')}}"></script>
	