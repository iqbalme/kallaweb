<div>
    <!-- Latest News -->
	<div class="news">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Berita Terbaru</h2>
						<!--div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div-->
					</div>
				</div>
			</div>
			<div class="row news_row">
				<div class="col-lg-7 news_col">
					
					<!-- News Post Large -->
					<div class="news_post_large_container">
						<div class="news_post_large">
							<div class="news_post_image">
							@isset($headlined_post->thumbnail)
							<div class="news_post_image_thumbnail" style="background-image:url('{{asset('storage/images/'.$headlined_post->thumbnail)}}');background-size:cover;"></div>
							@endisset
							</div>
							
							<div class="news_post_large_title">
							@if($is_seo)
								<a href="{{route('post.single', ['post_val' => $headlined_post->slug])}}">
							@else
								<a href="{{route('post.single', ['post_val' => $headlined_post->id])}}">
							@endif
							{{ucfirst($headlined_post->judul)}}</a></div>
							<div class="news_post_meta">
								<ul>
									<li>{{$headlined_post->post_user->nama}}</li>
									<li>{{date('d M Y', strtotime($headlined_post->created_at))}}</li>
								</ul>
							</div>
							<div class="news_post_text">
								<p>Policy analysts generally agree on a need for reform, but not on which path policymakers should take. Can America learn anything from other nations...</p>
							</div>
							<div class="news_post_link">
							@if($is_seo)
								<a href="{{route('post.single', ['post_val' => $headlined_post->slug])}}">
							@else
								<a href="{{route('post.single', ['post_val' => $headlined_post->id])}}">
							@endif
							Selengkapnya</a></div>
						</div>
					</div>
				</div>

				<div class="col-lg-5 news_col">
					<div class="news_posts_small">
						@foreach($posts as $post)
						<!-- News Posts Small -->
						<div class="news_post_small">
							<div class="news_post_small_title">@if($is_seo)
								<a href="{{route('post.single', ['post_val' => $post->slug])}}">
							@else
								<a href="{{route('post.single', ['post_val' => $post->id])}}">
							@endif
							{{ucfirst($post->judul)}}</a></div>
							<div class="news_post_meta">
								<ul>
									<li>{{ucfirst($post->post_user->nama)}}</li>
									<li>{{date('d-m-Y', strtotime($post->created_at))}}</li>
								</ul>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<style>
	.news_post_meta ul {
		padding: 0;
	}
	.news_post_image_thumbnail {
		max-height: 291px;
	}
	</style>
	<script>
		jQuery( document ).ready(function() {
			let news_width = jQuery(".news_row").width();
			jQuery('.news_post_image_thumbnail').height(news_width/100*31);
		});
	</script>
</div>