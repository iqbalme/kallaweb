<div>
@if(count($data['testimonis']))
	<section class="testimonial-section">
        <!-- Swiper -->
        <div class="swiper-container testimonial-slider swiper-container-fade swiper-container-horizontal swiper-container-wp8-horizontal">
            <div class="swiper-wrapper" style="transition-duration: 0ms;">
				@foreach($data['testimonis'] as $data)
					@php
						$swiper_class = '';
						$style = '';
						if($loop->index == 0){
							$swiper_class = 'swiper-slide-prev';
							$style = 'width: 1349px; opacity: 1; transform: translate3d(-2698px, 0px, 0px); transition-duration: 0ms;';
						} elseif($loop->index == 1){
							$swiper_class = 'swiper-slide-active';
							$style = 'width: 1349px; opacity: 1; transform: translate3d(-4047px, 0px, 0px); transition-duration: 0ms;';
						} else {
							$swiper_class = 'swiper-slide-next';
							$style = 'width: 1349px; opacity: 1; transform: translate3d(-1349px, 0px, 0px); transition-duration: 0ms;';
						}
					@endphp
                <div class="swiper-slide {{$swiper_class}}" data-swiper-slide-index="{{$loop->index}}" style="{{$style}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 order-2 order-lg-1 flex align-items-center mt-5 mt-lg-0">
                                <figure class="user-avatar">
                                    <img src="{{asset('storage/images/'.$data->gambar)}}" alt="">
                                </figure><!-- .user-avatar -->
                            </div><!-- .col -->

                            <div class="col-12 col-lg-6 order-1 order-lg-2 content-wrap h-100 isi_testimoni">
                                <div class="entry-content">
                                    <p>{{$data->deskripsi}}</p>
                                </div><!-- .entry-content -->

                                <div class="entry-footer">
                                    <h3 class="testimonial-user">{{$data->nama}} - <span>{{$data->keterangan}}</span></h3>
                                </div><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .swiper-slide -->
			@endforeach
			</div><!-- .swiper-wrapper -->

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                        <div class="swiper-pagination position-relative flex justify-content-center align-items-center swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span></div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .testimonial-slider -->
    </section>
	<!-- Swiper CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper.css')}}">
    <!--link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.css')}}"-->
	<style>
	
	@media (min-width: 1200px)
	.container {
		max-width: 1140px;
	}
	@media (min-width: 992px)
	.container {
		max-width: 960px;
	}

	@media (min-width: 768px)
	.container {
		max-width: 720px;
	}
	@media (min-width: 576px)
	.container {
		max-width: 540px;
	}
	.container {
		width: 100%;
		padding-right: 15px;
		padding-left: 15px;
		margin-right: auto;
		margin-left: auto;
	}
	*, ::after, ::before {
		box-sizing: border-box;
	}
	.row {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		margin-right: -15px;
		margin-left: -15px;
	}
	
	.position-relative {
		position: relative!important;
	}
	.align-items-center {
		-ms-flex-align: center!important;
		align-items: center!important;
	}
	.justify-content-center {
		-ms-flex-pack: center!important;
		justify-content: center!important;
	}

	/*
	# About Section: Video
	--------------------------------*/
	.ezuca-video {
		width: 100%;
	}

	.ezuca-video .video-play-btn {
		top: 50%;
		left: -40px;
		z-index: 99;
		width: 80px;
		height: 80px;
		margin-top: -40px;
		cursor: pointer;
	}

	.ezuca-video img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	@media screen and (max-width: 992px) {
		.about-section .heading {
			padding-right: 0;
		}

		.ezuca-stats {
			padding-right: 0;
		}

		.ezuca-video .video-play-btn {
			left: 50%;
			margin-left: -40px;
		}
	}

	/*
	# About Section: Testimonial
	--------------------------------*/
	.testimonial-section {
		padding: 100px 0;
		background: #F7F7F7;
	}

	.testimonial-slider .swiper-slide .user-avatar {
		opacity: .3;
		margin-bottom: 0;
	}

	.testimonial-slider .swiper-slide.swiper-slide-active .user-avatar {
		opacity: 1;
	}

	.testimonial-slider .swiper-slide:nth-of-type(2) .user-avatar,
	.testimonial-slider .swiper-slide:nth-of-type(5) .user-avatar {
		margin-left: calc(50% - 150px);
	}

	.testimonial-slider .swiper-slide:nth-of-type(3) .user-avatar {
		margin-left: calc(50% - 40px);
	}

	.testimonial-slider .swiper-slide:nth-of-type(1) .user-avatar,
	.testimonial-slider .swiper-slide:nth-of-type(4) .user-avatar {
		margin-left: calc(50% + 70px);
	}


	.testimonial-slider .swiper-slide-next {
		opacity: 1 !important;
	}

	.testimonial-slider .user-avatar {
		width: 80px;
		height: 80px;
		border-radius: 50%;
		overflow: hidden;
	}

	.testimonial-slider .user-avatar img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.testimonial-slider .content-wrap {
		background: #fff;
		padding: 20px;
		border-radius: 30px;
	}

	.testimonial-slider .entry-content p {
		font-size: 26px;
		color: #383749;
	}

	.testimonial-slider .testimonial-user {
		display: inline-block;
		position: relative;
		font-size: 16px;
		font-weight: 300;
		text-transform: uppercase;
		color: #19c880;
	}

	.testimonial-slider .testimonial-user::after {
		content: '';
		position: absolute;
		top: -12px;
		right: -100px;
		width: 38px;
		height: 32px;
		background: url("https://technext.github.io/ezuca/images/quote-icon.png") no-repeat center;
	}

	.testimonial-slider .testimonial-user span {
		font-size: 14px;
		color: #c0c1cd;
		text-transform: initial;
	}

	.testimonial-slider .swiper-pagination-bullet {
		width: 12px;
		height: 12px;
		margin: 0 6px;
		border: 2px solid #c6adb8;
		background: transparent;
		opacity: 1;
	}

	.testimonial-slider .swiper-pagination-bullet.swiper-pagination-bullet-active {
		background: #19c880;
		border: transparent;
	}
	
	</style>
	<script type="text/javascript" src="{{asset('frontend/assets/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/assets/js/swiper.min.js')}}"></script>
	<!--script type="text/javascript" src="{{asset('frontend/assets/js/masonry.pkgd.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/assets/js/jquery.collapsible.min.js')}}"></script-->
	<script type="text/javascript" src="{{asset('frontend/assets/js/custom-ezuca.js')}}"></script>
@endif
</div>
