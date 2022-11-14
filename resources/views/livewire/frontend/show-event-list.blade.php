<div>
	<div style="height:100px">
	</div>
    @if($data['events']->count())
	<!-- Events -->
	<section class="featured-courses horizontal-column courses-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="heading flex justify-content-between align-items-center">
                        <h2 class="section_title">Upcoming Events</h2>
                    </header><!-- .heading -->
                </div><!-- .col -->
				@foreach($data['events'] as $event)
                <div class="col-12 col-lg-6">
                    <div class="course-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="course-thumbnail">
                            <a href="{{route('event.show', $event->id)}}"><img src="{{asset('storage/images/'.$event->gambar_event)}}" alt=""></a>
							<div class="posted-date position-absolute">
                                <div class="day">{{date('d',strtotime($event->waktu_mulai))}}</div>
                                <div class="month">{{date('M',strtotime($event->waktu_mulai))}}</div>
                            </div>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <!--div class="course-ratings flex align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->

                                <h2 class="entry-title"><a href="{{route('event.show', $event->id)}}">{{substr($event->nama_event,0,37)}}</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                <div class="event-time"><i class="fa fa-calendar"></i>&nbsp;{{date('d-m-Y H:i',strtotime($event->waktu_mulai))}}</div>
								@if(isset($event->lokasi))
								<div class="event-time"><i class="fa fa-map-marker"></i>&nbsp;{{ucfirst($event->lokasi)}}</div>
								@endif
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
								<div class="course-author">{{substr($event->deskripsi,0,91).'...'}}</div>
                                <!--div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div><!-- .course-cost -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->
				@endforeach
				
            </div><!-- .row -->
        </div><!-- .container -->
    </section>
	<style>
	.event-time {
		width:100%;
		margin-top: 8px;
		font-size: 14px;
		text-transform: uppercase;
		color: #c0c1cd;
	}
	.event-time .fa {
		margin-right: 6px;
		color: #34d986;
	}
	.posted-date {
		bottom: 0;
		left: 0;
		padding: 10px 16px;
		background: #f3a90b;
		color: #fff;
		line-height: 1;
		text-align: center;
	}
	.position-absolute {
		position: absolute!important;
	}
	/*********************************
	6. Home
	*********************************/

	.home
	{
		width: 100%;
		height: 182px;
		background: #f2f4f5;
		border-bottom: solid 1px #edeff0;
	}
	.breadcrumbs_container
	{
		position: absolute;
		left: 0;
		bottom: 0;
		width: 100%;
		padding-bottom: 13px;
		padding-left: 3px;
	}
	.breadcrumbs ul li
	{
		display: inline-block;
		position: relative;
	}
	.breadcrumbs ul li:not(:last-child)::after
	{
		display: inline-block;
		font-family: 'FontAwesome';
		content: '\f105';
		margin-left: 7px;
		margin-right: 4px;
		color: #384158;
	}
	.breadcrumbs ul li a
	{
		font-size: 14px;
		font-weight: 400;
		color: #384158;
		-webkit-transition: all 200ms ease;
		-moz-transition: all 200ms ease;
		-ms-transition: all 200ms ease;
		-o-transition: all 200ms ease;
		transition: all 200ms ease;
	}
	.breadcrumbs ul li a:hover
	{
		color: #14bdee;
	}

	</style>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog_single.css')}}">
	<link href="{{asset('frontend/assets/css/style-ezuca.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('frontend/theme/unicat/js/jquery-3.2.1.min.js')}}"></script>
	<script>
		jQuery( document ).ready(function() {
			jQuery(".course-thumbnail img").height(jQuery(".course-thumbnail img").width());
		});
	</script>
	@endif
</div>
