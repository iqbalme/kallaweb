@extends('admin.layout.template')
@section('content')
<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="mb-3">
				  <h6 class="card-title mb-1">Judul</h6>
				  <input type="judul" class="form-control">
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-1">Isi Post</h6>
					<form method="post" action="" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
						</div>
					</form>
				</div>
				@if(count($data['categories']))
				<div class="mb-3">
					<h6 class="card-title mb-1">Kategori</h6>
					@foreach($data['categories'] as $category)
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="{{ $category->id }}">
					  <label class="form-check-label">
					  {{ $category->nama_kategori }}
					  </label>
					</div>
					@endforeach
				</div>
				@endif
				<div class="mb-3">
					<h6 class="card-title mb-1">Prodi</h6>
					@foreach($data['prodis'] as $prodi)
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="{{ $prodi->id }}">
					  <label class="form-check-label">
					  {{ $prodi->nama_prodi}}
					  </label>
					</div>
					@endforeach
				</div>
				<div class="row mt-3">
					<div class="d-flex justify-content-between">
						<div>
						  <h6 class="card-title mb-1">Logo Website</h6>
						  <!--div class="small text-medium-emphasis">January - July 2022</div-->
						</div>
					</div>
					<div class="mb-1">
						<img src="{{ asset('admin/thumbnail-default.jpg') }}" alt="thumbnail post" width="100" height="100">
					</div>
					<div class="d-grid gap-2 d-md-block">
					  <button class="btn btn-danger text-white" type="button">Hapus</button>
					</div>
					<div class="col-lg-7">
						<div class="input-group mb-3 mt-2">
						  <input type="file" class="form-control" id="inputGroupFile02">
						  <label class="input-group-text" for="inputGroupFile02">Upload</label>
						</div>
					</div>
				</div>
            </div>
          </div>
	</div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
<script type="text/javascript">
	CKEDITOR.replace('wysiwyg-editor', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
	jQuery(document).ready(function () {
        jQuery('.ckeditor').ckeditor();
    });
</script>
@endsection