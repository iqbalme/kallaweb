<div id="bagian-faq">
	@if($data['faqs']->count())
        <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container">
        <div class="section-title">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>
		@foreach($data['faqs'] as $faq)
        <div class="row faq-item d-flex align-items-stretch">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>{{$faq->soal}}</h4>
          </div>
          <div class="col-lg-7">
			{!!$faq->jawaban!!}
          </div>
        </div><!-- End F.A.Q Item-->
		@endforeach
      </div>
    </section><!-- End Frequently Asked Questions Section -->
	<link href="{{asset('frontend/assets/css/boxicons.css')}}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	@endif
</div>
