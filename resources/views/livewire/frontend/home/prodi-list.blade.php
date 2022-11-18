<div>
	@if(isset($data['prodis']))
    <div class="prodi">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_prodi_container" style="position:relative;height: auto;">
						
							@foreach($data['prodis'] as $prodi)
								<!-- Blog Post -->
								<div class="blog_prodi trans_200" style="position:relative;" id="post-{{$loop->iteration}}" data-index="{{$loop->iteration}}">
									@isset($prodi->thumbnail)
										<a href="{{route('post.single', ['post_val' => $prodi->slug])}}"><div class="blog_post_image" style="background-image:url('{{asset('storage/images/'.$prodi->thumbnail)}}');background-size:cover;"></div></a>
									@endisset
									<div class="blog_post_body">
										<div class="blog_post_title text-center"><a href="#">{{$prodi->nama_prodi}}</a></div>
										<div class="blog_post_text">
										{{substr($prodi->deskripsi_prodi,0,77).'...'}}
										</div>
									</div>
								</div>
							@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		jQuery( document ).ready(function() {
			jQuery(".blog_post_image").height(jQuery(".blog_post_image").width()*0.53);
		});
	</script>
	@endisset
</div>
