<div>
    <div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Berita</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_post_container" style="position:relative;height: auto;">
						@if(isset($data['posts']))
							@foreach($data['posts'] as $post)
								<!-- Blog Post -->
								<div class="blog_post trans_200" style="position:relative;" id="post-{{$loop->iteration}}" data-index="{{$loop->iteration}}">
									@isset($post->thumbnail)
										<a href="{{route('post.single', ['post_val' => $post->slug])}}"><div class="blog_post_image" style="background-image:url('{{asset('storage/images/'.$post->thumbnail)}}');background-size:cover;"></div></a>
									@endisset
									<div class="blog_post_body">
										<div class="blog_post_title"><a href="{{route('post.single', ['post_val' => $post->slug])}}">{{$post->judul}}</a></div>
										<div class="blog_post_meta">
											<ul>
												<li>admin</li>
												<li>{{date('d M Y', strtotime('$post->created_at'))}}</li>
											</ul>
										</div>
										<div class="blog_post_text">
											{!!$post->post_excerpt!!}
										</div>
									</div>
								</div>
							@endforeach
						@else
							
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<!-- Pagination -->
				{{ $data['posts']->links('vendor.livewire.bootstrap') }}
				<!--nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-center">
					<li class="page-item disabled">
					  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
					  <a class="page-link" href="#">Selanjutnya</a>
					</li>
				  </ul>
				</nav>
				<!--div class="col text-center">
					<div class="load_more trans_200"><a href="#">load more</a></div>
				</div-->
			</div>
		</div>
	</div>
	<script>
		jQuery( document ).ready(function() {
			// let blog_count = jQuery('.blog_post_container').children().length;
			// for(let i=1;i<=blog_count;i++){
				// if(i%3==1){
					// jQuery("#post-"+i).css('left', 0);
				// } else if(i%3==2){
					// jQuery("#post-"+i).css('left', ((jQuery(".blog_post_container").width()-60)/3)+30);
				// } else if(i%3==0){
					// jQuery("#post-"+i).css('left', (((jQuery(".blog_post_container").width()-60)/3)*2)+30);
				// }
			// }
			jQuery(".blog_post_image").height((jQuery(".blog_post_image").width()*0.54));
		});
	</script>
	<style>
		.blog_post_container {
			display: flex;
			flex-wrap: wrap;
			gap: 10px 30px;
		}
		.blog_post {
			display: flex;
			flex-direction: column;
			flex-grow: 1;
			/* width: calc((100% - 60px) / 3); */
			border-radius: 6px;
			overflow: hidden;
			box-shadow: 0px 1px 10px rgb(29 34 47 / 10%);
			margin-bottom: 30px;
		}
		.blog_post_meta ul {
			padding-left: 0px;
		}
	</style>
	<link href="{{asset('frontend/assets/css/kalla-style.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog_responsive.css')}}">
</div>
