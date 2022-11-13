<div>
@if(count($data['testimonis']))
	<section class="testimonial-section">
        <!-- Swiper -->
        <div class="swiper-container testimonial-slider swiper-container-fade swiper-container-horizontal swiper-container-wp8-horizontal">
            <div class="swiper-wrapper" style="transition-duration: 0ms;">
				@foreach($data['testimonis'] as $testimoni)
					@php
						$swiper_class = '';
						$style = '';
						if($loop->iteration == 1){
							$swiper_class = 'swiper-slide-prev';
							$style = 'width: 1349px; opacity: 1; transform: translate3d(-2698px, 0px, 0px); transition-duration: 0ms;';
						} elseif($loop->iteration == 2){
							$swiper_class = 'swiper-slide-active';
							$style = 'width: 1349px; opacity: 1; transform: translate3d(-4047px, 0px, 0px); transition-duration: 0ms;';
						} elseif($loop->iteration == 3) {
							$swiper_class = 'swiper-slide-prev';
							$style = 'width: 1349px; opacity: 1; transform: translate3d(-1349px, 0px, 0px); transition-duration: 0ms;';
						}
					@endphp
                <div class="swiper-slide " style="{{$style}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 order-2 order-lg-1 flex align-items-center mt-5 mt-lg-0">
                                <figure class="user-avatar">
									@if($loop->index == 0)
										<img src="{{asset('storage/images/'.$data['testimonis'][1]->gambar)}}" alt="">
									@elseif($loop->index == 1)
										<img src="{{asset('storage/images/'.$data['testimonis'][2]->gambar)}}" alt="">
									@elseif($loop->index == 2)
										<img src="{{asset('storage/images/'.$data['testimonis'][0]->gambar)}}" alt="">
									@endif
                                </figure><!-- .user-avatar -->
                            </div><!-- .col -->

                            <div class="col-12 col-lg-6 order-1 order-lg-2 content-wrap h-100">
                                <div class="entry-content">
                                    <p>{{substr($testimoni->deskripsi,0,103)}}</p>
                                </div><!-- .entry-content -->

                                <div class="entry-footer">
                                    <h3 class="testimonial-user">{{$testimoni->nama}} - <span>{{$testimoni->keterangan}}</span></h3>
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
    <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper.css')}}" scoped>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.css')}}" scoped>

	<script type="text/javascript" src="{{asset('frontend/assets/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/assets/js/swiper.min.js')}}"></script>
	<!--script type="text/javascript" src="{{asset('frontend/assets/js/masonry.pkgd.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/assets/js/jquery.collapsible.min.js')}}"></script-->
	<script type="text/javascript" src="{{asset('frontend/assets/js/custom-ezuca.js')}}"></script>
@endif
</div>
