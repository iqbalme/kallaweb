<div>
    <div class="body flex-grow-1 px-3">
		<div class="container-lg">
			<div class="card mb-4">
			<form wire:submit.prevent="publishPost">
			@csrf
				<div class="card-body">
					<div class="mb-3">
					  <h6 class="card-title mb-2">Judul</h6>
					  <input type="text" class="form-control" wire:model.lazy="judul">
					</div>
					<div class="mb-3">
					  <h6 class="card-title mb-2">Isi Post</h6>
							<div class="form-group" wire:ignore>
								<textarea name="konten" id="editor">{{ $konten }}</textarea>
							</div>
					</div>
					<div class="mb-3">
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" wire:model="is_headline">
						  <label class="form-check-label">
						  <strong>&nbsp;&nbsp;Jadikan Headline</strong>
						  </label>
						</div>
					</div>
					@if(count($data['categories']))
					<div class="mb-3">
						<h6 class="card-title mb-2">Kategori</h6>
						@foreach($data['categories'] as $category)
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="{{ $category->id }}" wire:model.defer="categories">
						  <label class="form-check-label">
						  {{ ucfirst($category->nama_kategori) }}
						  </label>
						</div>
						@endforeach
					</div>
					@endif
					@if(count($data['prodis']))
					<div class="mb-3">
						<h6 class="card-title mb-1">Prodi</h6>
						@foreach($data['prodis'] as $prodi)
						<div class="form-check">
						  <input class="form-check-input" type="radio" value="{{ $prodi->id }}" wire:model="prodis">
						  <label class="form-check-label">
						  {{ ucfirst($prodi->nama_prodi)}}
						  </label>
						</div>
						@endforeach
					</div>
					@endif
					<div class="mb-3">
					  <h6 class="card-title mb-2">Tag (Pisahkan dengan koma)</h6>
					  <input type="text" class="form-control" wire:model.lazy="tags">
					</div>
					<div class="row mt-3">
						<div class="d-flex justify-content-between">
							<div>
							  <h6 class="card-title mb-2">Thumbnail</h6>
							  <!--div class="small text-medium-emphasis">January - July 2022</div-->
							</div>
						</div>
						@if($thumbnail !== null)
						<div class="mb-1 rounded">
							<img src="{{ $thumbnail->temporaryUrl() }}" alt="thumbnail post" width="200" height="200">
						</div>
						<div class="d-grid gap-2 d-md-block">
						  <button class="btn btn-danger text-white" type="button" wire:click="removeThumbnail">Hapus</button>
						</div>
						@else
						<div class="col-lg-7">
							<div class="input-group mb-3 mt-2">
							  <input type="file" class="form-control" wire:model.lazy="thumbnail">
							  <label class="input-group-text">Upload</label>
							</div>
							@error('thumbnail') <span class="error">{{ $message }}</span> @enderror
						</div>
						@endif
					</div>
					<div class="row mt-5">
						<hr>
						<div class="col-lg-6 mb-2">
								<button type="button" class="btn btn-warning btn-lg text-white w-100" wire:click="publishPost(false)">Simpan</button>
						</div>
						<div class="col-lg-6 mb-2">
							<button type="submit" class="btn btn-primary btn-lg w-100">Publish</button>
						</div>
					</div>
				</div>
			</form>	
            </div>		
        </div>
	</div>
	<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
	<script type="text/javascript">
		ClassicEditor
			.create( document.querySelector( '#editor' ), {
				ckfinder: {
					uploadUrl: "{{route('ckeditor.image-upload') .'?_token='.csrf_token()}}"
				}
			})
			.then( editor => {
				editor.model.document.on('change:data', () => {
					@this.set('konten', editor.getData());
				})
			})
			.catch( error => {
				//console.error( error );
		});
	</script>
	<style>
		.ck-editor__editable_inline {
			min-height: 250px !important;
		}
	</style>
</div>