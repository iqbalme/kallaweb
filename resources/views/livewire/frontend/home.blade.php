	<div style="height:100px">
	</div>
	
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
							<a class="btn-play" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
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
				<!-- <livewire:frontend.home.prodi-list /> -->
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
	
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			...
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
		  </div>
		</div>
	  </div>
	</div>

	<livewire:frontend.home.events />	
	<livewire:frontend.home.testimonis />
	<livewire:frontend.home.latest-news />
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style-ezuca.css')}}">
	<style>
	.feature_col .fa {
		font-size: 70px;
	}
	/*********************************
	7. Features
	*********************************/

	.features
	{
		width: 100%;
		background: #FFFFFF;
		padding-top: 10px;
		padding-bottom: 30px;
	}
	.features_row
	{
		margin-top: 55px;
	}
	.feature
	{
		width: 100%;
		padding-top: 30px;
		padding-bottom: 28px;
		padding-left: 15px;
		padding-right: 15px;
		background: #FFFFFF;
	}
	.feature:hover
	{
		box-shadow: 0px 5px 40px rgba(29,34,47,0.15);
	}
	.feature_icon
	{
		height: 55px;
	}
	.feature_icon img
	{
		max-width: 100%;
	}
	.feature_title
	{
		position: relative;
		font-size: 20px;
		margin-top: 23px;
	}

	/*********************************
	8. Courses
	*********************************/

	.courses
	{
		width: 100%;
		padding-top: 93px;
		padding-bottom: 100px;
	}
	.courses_row
	{
		margin-top: 45px;
	}
	.course
	{
		width: 100%;
		border-radius: 6px;
		background: #FFFFFF;
		box-shadow: 0px 1px 10px rgba(29,34,47,0.1);
	}
	.course_image
	{
		width: 100%;
		border-top-left-radius: 6px;
		border-top-right-radius: 6px;
		overflow: hidden;
	}
	.course_image img
	{
		max-width: 100%;
	}
	.course_body
	{
		padding-top: 22px;
		padding-left: 30px;
		padding-right: 30px;
		padding-bottom: 23px;
	}
	.course_title a
	{
		font-family: 'Roboto Slab', serif;
		font-size: 20px;
		color: #384158;
		-webkit-transition: all 200ms ease;
		-moz-transition: all 200ms ease;
		-ms-transition: all 200ms ease;
		-o-transition: all 200ms ease;
		transition: all 200ms ease;
	}
	.course_title a:hover
	{
		color: #14bdee;
	}
	.course_teacher
	{
		font-size: 15px;
		font-weight: 400;
		color: #384158;
		margin-top: 6px;
	}
	.course_text
	{
		margin-top: 13px;
	}
	.course_footer
	{
		padding-left: 30px;
		padding-right: 30px;
	}
	.course_footer_content
	{
		width: 100%;
		border-top: solid 1px #e5e5e5;
		padding-top: 9px;
		padding-bottom: 11px;
	}
	.course_info
	{
		display: inline-block;
		font-size: 14px;
		font-weight: 400;
		color: #55555a;
	}
	.course_info:first-child
	{
		margin-right: 18px;
	}
	.course_info i
	{
		color: #ffc80a;
	}
	.course_price
	{
		font-family: 'Roboto Slab', serif;
		font-size: 20px;
		font-weight: 700;
		color: #14bdee;
	}
	.course_price span
	{
		font-family: 'Roboto Slab', serif;
		font-size: 14px;
		font-weight: 400;
		text-decoration: line-through;
		color: #b5b8be;
		margin-right: 10px;
	}
	.courses_button
	{
		width: 210px;
		height: 46px;
		border-radius: 3px;
		background: #14bdee;
		text-align: center;
		margin: 0 auto;
		margin-top: 41px;
		box-shadow: 0px 5px 40px rgba(29,34,47,0.15);
	}
	.courses_button:hover
	{
		box-shadow: 0px 5px 40px rgba(29,34,47,0.45);
	}
	.courses_button a
	{
		display: block;
		font-size: 14px;
		font-weight: 500;
		text-transform: uppercase;
		line-height: 46px;
		color: #FFFFFF;
	}
	.judulbesar ul {
		list-style: disc;
		margin-bottom: 0px;
	}
	</style>
	<script src="{{asset('frontend/assets/js/custom-ezuca.js')}}"></script>
	<script>
		jQuery('.btn-play').on('click', function(){
			jQuery('#videoModal').modal('show')
		});
	</script>