<div>
    @if($data['events']->count())
	<section>
        <div class="events">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_event text-center">
						<h2 class="section_title">UPCOMING EVENTS</h2>
						<div class="section_subtitle"><p>Agenda selanjutnya</p></div>
					</div>
				</div>
			</div>
			<div class="row events_row">
				@foreach($data['events'] as $event)
				<!-- Event -->
				<div class="col-lg-4 event_col">
					<div class="event event_left">
						<div class="event_image"><img src="{{asset('storage/images/'.$event->gambar_event)}}" alt=""></div>
						<div class="event_body d-flex flex-row align-items-start justify-content-start">
							<div class="event_date">
								<div class="d-flex flex-column align-items-center justify-content-center trans_200">
									<div class="event_day trans_200">{{ date('d', strtotime($event->tanggal)) }}</div>
									<div class="event_month trans_200">{{ date('M', strtotime($event->tanggal)) }}</div>
								</div>
							</div>
							<div class="event_content">
								<div class="event_title"><a href="#">{{substr($event->nama_event,0,29).'...'}}</a></div>
								<div class="event_info_container">
									<div class="event_info"><i class="fa fa-clock-o" aria-hidden="true"></i><span>{{ date('H:i', strtotime($event->waktu_mulai)).'-'.date('H:i', strtotime($event->waktu_berakhir)) }}</span></div>
									<div class="event_info"><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{$event->lokasi}}</span></div>
									<div class="event_text">
									<p>{{ substr($event->event_excerpt, 0, 85).'...' }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			</div>
		</div>

      </section>
	@endif
	<!-- End Events -->
	<style>
		.event_image img {
			max-width: 340px;
			max-height: 223px;
		}
	</style>
</div>
