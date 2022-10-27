<div>
	<main role="main" class="container" style="margin-top:70px;">
		<h3>{{ ucfirst($meta['type']) .': '. ucfirst($meta['value']) }}</h3>
		<hr>
		<div class="row mb-2">
			@foreach($data['posts'] as $post)
				<div class="col-md-6">
				  <div class="card flex-md-row mb-4 box-shadow h-md-250">
					<div class="card-body d-flex flex-column align-items-start">
					  <!--strong class="d-inline-block mb-2 text-primary">World</strong-->
					  <h3 class="mb-0">
						@if($data['is_seo_post'])
							<a class="text-dark" href="{{ route('post.single', $post->slug) }}">{{ ucfirst($post->judul) }}</a>
						@else
							<a class="text-dark" href="{{ route('post.single', $post->id) }}">{{ ucfirst($post->judul) }}</a>
						@endif
					  </h3>
					  <div class="mb-1 text-muted">{{ $post->created_at->format('d F Y') }}</div>
					  <p class="card-text mb-auto">{!! substr(preg_replace('/<(\s*)img[^<>]*>/i', '', $post->konten),0,200) !!}</p>
					  @if($data['is_seo_post'])
						<a href="{{ route('post.single', $post->slug) }}">Baca selengkapnya ...</a>
					  @else
						<a href="{{ route('post.single', $post->slug) }}">Baca selengkapnya ...</a>
					  @endif
					</div>
					<img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ isset($post->thumbnail) ? asset('storage/images/'.$post->thumbnail) : 'https://i.postimg.cc/sXkTpdCQ/no-image.png' }}" data-holder-rendered="true">
				  </div>
				</div>
			@endforeach			
      </div>
	  
	  <!-- Pagination -->
		  {{ $data['posts']->links('vendor.livewire.bootstrap') }}
	</div>
</div>