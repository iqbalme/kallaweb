<div>
	@if(count($data['testimonis']) >= 2)
    <section class="probootstrap-section probootstrap-bg probootstrap-section-colored probootstrap-testimonial" style="background-image: url({{asset('frontend/assets/images/slider_2.jpg')}});background-size: cover;padding:3em 0;">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2>TESTIMONI</h2>
              <p class="lead">Apa kata mereka?</p>
            </div>
          </div>
          <!-- END row -->
          <div class="row">
            <div class="col-md-12 probootstrap-animate">
              <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">
				@foreach($data['testimonis'] as $testimoni)
                <div class="item">
                  <div class="probootstrap-testimony-wrap text-center">
                    <figure>
                      <img src="{{asset('storage/images/'.$testimoni->gambar)}}" alt="$testimoni->nama">
                    </figure>
                    <blockquote class="quote">&ldquo;{{$testimoni->deskripsi}}&rdquo; <cite class="author"> &mdash; <span>{{$testimoni->nama}}</span></cite></blockquote>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <!-- END row -->
        </div>
    </section>
	@endif
</div>
