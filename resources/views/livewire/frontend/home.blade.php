<div>
	<div class="top-div" style="margin-bottom:25px;">&nbsp;</div>
	<section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 align-content-lg-stretch judulbesar">
                    <header class="heading">
                        <h2 class="entry-title">Kalla Institute</h2>

                        <p><h4>VISI:</h4></p>
						<p>Menjadi perguruan tinggi unggul dalam pengembangan kewirausahaan berbasis teknologi yang inovatif berlandaskan moral agama pada tahun 2034</p>
						<p><h4>MISI:</h4></p>
						<p><ul><li>Menyelenggarakan Pendidikan Tinggi dengan tata kelola yang baik, ditunjang Teknologi Informasi dan Sistem Manajemen Mutu</li>
						<li>Melaksanakan Penelitian Terapan dan Pengabdian, dalam Bidang Bisnis dan Teknologi, untuk meningkatkan kesejahteraan masyarakat</li>
						<li>Membangun sumber daya manusia yang berkarakter insan KALLA, berjiwa kepemimpinan dan kewirausahaan yang berbasis teknologi</li></ul></p>
                    </header><!-- .heading -->

                    <!--div class="entry-content ezuca-stats">
                        <div class="stats-wrap flex flex-wrap justify-content-lg-between">
                            <div class="stats-count">
                                50<span>M+</span>
                                <p>STUDENTS LEARNING</p>
                            </div>

                            <div class="stats-count">
                                30<span>K+</span>
                                <p>ACTIVE COURSES</p>
                            </div>

                            <div class="stats-count">
                                340<span>M+</span>
                                <p>INSTRUCTORS ONLINE</p>
                            </div>

                            <div class="stats-count">
                                20<span>+</span>
                                <p>Country Reached</p>
                            </div>
                        </div>
                    <!--/div-->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 flex align-content-center mt-5 mt-lg-0">
                    <div class="ezuca-video position-relative">
                        <div class="video-play-btn position-absolute">
							<a class="btn-play" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#exampleModal">
								<img src="{{asset('frontend/assets/images/video-icon.png')}}" alt="Video Play">
							</a>
                            
                        </div><!-- .video-play-btn -->

                        <img src="https://i3.ytimg.com/vi/dVCJlFXY9r0/maxresdefault.jpg" alt="">
                    </div><!-- .ezuca-video -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section>
	
	<div class="features" style="margin-top: 25px;">
		<div class="container">
			<div class="row mb-5">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Program Studi</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<livewire:frontend.home.prodi-list />
			</div>
		</div>
	</div>
	<!-- Features -->
	<div class="features" style="margin-top: 25px;">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Kenapa Memilih Kami?</h2>
					</div>
				</div>
			</div>
			<div class="row features_row">
				
				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><i class="fa fa-briefcase"></i></div>
						<h3 class="feature_title">Jaminan Kerja</h3>
						<div class="feature_text"><p>Lulusan berkesempatan bergabung di perusahaan Kalla Group</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><i class="fa fa-users"></i></div>
						<h3 class="feature_title">Tim Pengajar Berkualitas</h3>
						<div class="feature_text"><p>Perpaduan antara akademisi dan praktisi kewirausahaan dan Manager/Direksi Kalla Group</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><i class="fa fa-building"></i></div>
						<h3 class="feature_title">Lokasi Strategis</h3>
						<div class="feature_text"><p>Berlokasi di pusat kota, tepatnya di salah satu Mall di Kota Makassar, Nipah Mall.</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><i class="fa fa-globe"></i></div>
						<h3 class="feature_title">Konsep Milenial</h3>
						<div class="feature_text"><p>Konsep pengajaran yang menyenangkan, nyaman, dan milenial</p></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<livewire:frontend.home.events />	
	<livewire:frontend.home.testimonis />
	<livewire:frontend.home.latest-news />
	
	<!--link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"-->
	<!--script src="{{asset('frontend/theme/js/vendor/jquery.min.js')}}"></script-->
	<!--script src="{{asset('frontend/theme/js/vendor/bootstrap.min.js')}}"></script-->
	
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-body">
			<div class="embed-responsive embed-responsive-16by9">
                    <iframe id="introVideo" class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/dVCJlFXY9r0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
		  </div>
		</div>
	  </div>
	</div>
	</div>
	<!-- End Modal -->
	
	<script>
		$(document).ready(function(){
			jQuery('.top-div').height(jQuery('header .header').height());
			/* Get iframe src attribute value i.e. YouTube video url
			and store it in a variable */
			var url = jQuery("#introVideo").attr('src');
			
			/* Assign empty url value to the iframe src attribute when
			modal hide, which stop the video playing */
			jQuery("#exampleModal").on('hide.bs.modal', function(){
				jQuery("#introVideo").attr('src', '');
			});
			
			/* Assign the initially stored url back to the iframe src
			attribute when modal is displayed again */
			jQuery("#exampleModal").on('show.bs.modal', function(){
				jQuery("#introVideo").attr('src', url);
			});
			if($(".super_container").width() <= 600){
				$("#introVideo").width($(".super_container").width()-50);
			}
		});
	</script>
	<style>
		.top-div {
			height: 100px;
		}
		.modal-content {
			width: auto;
		}
		.modal-dialog iframe{
			margin: 0 auto;
			display: block;
		}
	</style>
</div>