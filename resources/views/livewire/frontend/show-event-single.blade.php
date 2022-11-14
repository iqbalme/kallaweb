<div>
	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li><a href="{{route('event.list')}}">Event</a></li>
								<li>Detail Event</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
    <div class="course">
		<div class="container">
			<div class="row">

				<!-- Course -->
				<div class="col-lg-8">
					
					<div class="course_container">
						<div class="course_title" style="margin-bottom:68px">{{ucfirst($event->nama_event)}}</div>

						<!-- Course Image -->
						<div class="course_image"><img src="{{asset('storage/images/'.$event->gambar_event)}}" alt=""></div>

						<!-- Course Tabs -->
						<div class="course_tabs_container">
							<div class="tabs d-flex flex-row align-items-center justify-content-start">
								<div class="tab active">Deskripsi</div>
							</div>
							<div class="tab_panels">

								<!-- Description -->
								<div class="tab_panel active">
									<div class="tab_panel_title">{{ucfirst($event->nama_event)}}</div>
									<div class="tab_panel_content">
										<div class="tab_panel_text">
										{!! $event->deskripsi_event !!}
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<!-- Course Sidebar -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Feature -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Informasi Event</div>
							<div class="sidebar_feature">
								<!--div class="course_price">$180</div-->

								<!-- Features -->
								<div class="feature_list">

									<!-- Feature -->
									<div class="feature d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title"><i class="fa fa-calendar" aria-hidden="true"></i><span>Tanggal:</span></div>
										<div class="feature_text ml-auto">{{date('d-m-Y', strtotime($event->waktu_mulai))}}</div>
									</div>

									<!-- Feature -->
									<div class="feature d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Waktu:</span></div>
										<div class="feature_text ml-auto">{{date('H:i', strtotime($event->waktu_mulai))}} - {{date('H:i', strtotime($event->waktu_berakhir))}}</div>
									</div>

									<!-- Feature -->
									<div class="feature d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Lokasi:</span></div>
										<div class="feature_text ml-auto">{{$event->lokasi}}</div>
									</div>

								</div>
							</div>
						</div>
						@if($event_lain->count())
						<!-- Latest Course -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Event Lain</div>
							<div class="sidebar_latest">
								@foreach($event_lain as $event_lain_item)
								<!-- Latest Course -->
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="{{asset('storage/images/'.$event_lain_item->gambar_event)}}" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="{{route('event.show', $event_lain_item->id)}}">{{substr($event_lain_item->nama_event,0,51).'...'}}</a></div>
										<!--div class="latest_price">Free</div-->
									</div>
								</div>
								@endforeach
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<link href="{{asset('frontend/theme/unicat/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/course.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/course_responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog_single.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog_single_responsive.css')}}">

</div>