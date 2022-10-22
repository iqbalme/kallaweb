<div>
    <main role="main" class="container" style="margin-top:70px;">
      <div class="row">
        <div class="col-md-8 blog-main">
          <div class="blog-post">
            <h2 class="blog-post-title mb-3">{{ $post->judul }}</h2>
            
            {!! $post->konten !!}
          </div><!-- /.blog-post -->
		@if($tags)
          <nav class="blog-pagination">
			@foreach($tags as $tag)
            <a class="btn btn-outline-primary" href="#">{{ $tag }}</a>
			@endforeach
          </nav>
		@endif

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">Info</h4>
				<div class="blog-post-meta">
					<div class="row ml-1">
						<div class="col-md-5">Tanggal</div>
						<div class="col-md-7">: {{ $post->created_at->format('d F Y') }}</div>
					</div>
				</div>
				<div class="blog-post-meta">
					<div class="row ml-1">
						<div class="col-md-5">Penulis</div>
						<div class="col-md-7">: {{ $author }}</div>
					</div>
				</div>
				@isset($categories)
					<div class="blog-post-meta">
						<div class="row ml-1">
							<div class="col-md-5">Kategori</div>
							<div class="col-md-7">: {{ $categories }}</div>
						</div>
					</div>
				@endisset
				@isset($prodis)
					<div class="blog-post-meta">
						<div class="row ml-1">
							<div class="col-md-5">Program Studi</div>
							<div class="col-md-7">: {{ $prodis }}</div>
						</div>
					</div>
				@endisset
          </div>
		@isset($data['prodis'])
          <div class="p-3">
            <h4 class="font-italic">Prodi</h4>
            <ol class="list-unstyled mb-0">
				@foreach($data['prodis'] as $prodi)
					<li><a href="#">{{ $prodi->nama_prodi }}</a></li>
				@endforeach
				</ol>
          </div>
		@endisset
		@isset($data['categories'])
          <div class="p-3">
            <h4 class="font-italic">Kategori</h4>
            <ol class="list-unstyled">
				@foreach($data['categories'] as $category)
					<li><a href="#">{{ $category->nama_kategori }}</a></li>
				@endforeach
            </ol>
          </div>
		@endisset
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main>
	<!--link href="https://getbootstrap.com/docs/4.0/examples/blog/blog.css" rel="stylesheet"-->
</div>
