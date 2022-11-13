<div>
	<div style="height:130px">
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
										{!!$event->deskripsi!!}
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
							<div class="sidebar_section_title">Course Feature</div>
							<div class="sidebar_feature">
								<div class="course_price">$180</div>

								<!-- Features -->
								<div class="feature_list">

									<!-- Feature -->
									<div class="feature d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Duration:</span></div>
										<div class="feature_text ml-auto">2 weeks</div>
									</div>

									<!-- Feature -->
									<div class="feature d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>Lectures:</span></div>
										<div class="feature_text ml-auto">10</div>
									</div>

									<!-- Feature -->
									<div class="feature d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span>Lectures:</span></div>
										<div class="feature_text ml-auto">6</div>
									</div>

									<!-- Feature -->
									<div class="feature d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title"><i class="fa fa-list-alt" aria-hidden="true"></i><span>Lectures:</span></div>
										<div class="feature_text ml-auto">Yes</div>
									</div>

									<!-- Feature -->
									<div class="feature d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title"><i class="fa fa-users" aria-hidden="true"></i><span>Lectures:</span></div>
										<div class="feature_text ml-auto">35</div>
									</div>

								</div>
							</div>
						</div>

						<!-- Feature -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Teacher</div>
							<div class="sidebar_teacher">
								<div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
									<div class="teacher_image"><img src="images/teacher.jpg" alt=""></div>
									<div class="teacher_title">
										<div class="teacher_name"><a href="#">Jacke Masito</a></div>
										<div class="teacher_position">Marketing &amp; Management</div>
									</div>
								</div>
								<div class="teacher_meta_container">
									<!-- Teacher Rating -->
									<div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
										<div class="teacher_meta_title">Average Rating:</div>
										<div class="teacher_meta_text ml-auto"><span>4.7</span><i class="fa fa-star" aria-hidden="true"></i></div>
									</div>
									<!-- Teacher Review -->
									<div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
										<div class="teacher_meta_title">Review:</div>
										<div class="teacher_meta_text ml-auto"><span>12k</span><i class="fa fa-comment" aria-hidden="true"></i></div>
									</div>
									<!-- Teacher Quizzes -->
									<div class="teacher_meta d-flex flex-row align-items-center justify-content-start">
										<div class="teacher_meta_title">Quizzes:</div>
										<div class="teacher_meta_text ml-auto"><span>600</span><i class="fa fa-user" aria-hidden="true"></i></div>
									</div>
								</div>
								<div class="teacher_info">
									<p>Hi! I am Masion, I’m a marketing &amp; management  eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum nam nulla ipsum.</p>
								</div>
							</div>
						</div>

						<!-- Latest Course -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Latest Courses</div>
							<div class="sidebar_latest">

								<!-- Latest Course -->
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="images/latest_1.jpg" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="course.html">How to Design a Logo a Beginners Course</a></div>
										<div class="latest_price">Free</div>
									</div>
								</div>

								<!-- Latest Course -->
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="images/latest_2.jpg" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="course.html">Photography for Beginners Masterclass</a></div>
										<div class="latest_price">$170</div>
									</div>
								</div>

								<!-- Latest Course -->
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="images/latest_3.jpg" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="course.html">The Secrets of Body Language</a></div>
										<div class="latest_price">$220</div>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/course.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/course_responsive.css')}}">
	<style>
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
	</style>
</div>