<div>
	<form wire:submit.prevent="update">
	@csrf
	<div class="row">
		<label class="col-form-label">Program Studi</label>
		<div class="col-sm-12 mb-2">
			<div class="col-sm-4">
			  <input type="text" class="form-control" wire:model="nama_prodi" placeholder="Nama Program Studi">
			</div>
		</div>
	</div>
	<div class="row">
		<label class="col-form-label">Deskripsi Program Studi</label>
		<div class="col-sm-12">
			<div class="col-sm-4 mb-2">
			  <textarea class="form-control" wire:model="deskripsi_prodi" placeholder="Deskripsi Program Studi"></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<label class="col-form-label">Program Studi</label>
		<div class="col-sm-5">
			@if(isset($thumbnail))
				<div class="mb-1 rounded">
					@if($first_thumbnail)
						<img src="{{ asset('storage/images/'.$thumbnail) }}" alt="thumbnail prodi" width="200" height="200">
					@else
						<img src="{{ $thumbnail->temporaryUrl() }}" alt="thumbnail prodi" width="200" height="200">
					@endif
				</div>
				<div class="d-grid gap-2 d-md-block mb-3">
				  <button class="btn btn-danger text-white" type="button" wire:click="removeThumbnail">Hapus</button>
				</div>
			@else
				<div class="input-group mb-3 mt-2">
				  <input type="file" class="form-control" wire:model.defer="thumbnail">
				  <label class="input-group-text">Upload</label>
				</div>
			@endif
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-sm-3">
			<button type="button" class="btn btn-danger text-white mr-2" wire:click="$emit('refreshProdi')">Batalkan</button>
			<button type="submit" class="btn btn-primary text-white">Simpan</button>
		</div>
	</div>
	</form>
</div>