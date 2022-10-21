<div>
	<form wire:submit.prevent="update">
	@csrf
	<div class="mb-3 row">
		<input type="hidden" name="" wire:model="category_id">
		<label class="col-form-label">Kategori</label>
		<div class="col-sm-12 mb-2">
			<div class="col-sm-4">
			  <input type="text" class="form-control" wire:model="nama_kategori" placeholder="Nama Kategori">
			</div>
		</div>
		<div class="col-sm-12">
			<div class="col-sm-4 mb-2">
			  <textarea class="form-control" wire:model="deskripsi_kategori" placeholder="Deskripsi Kategori"></textarea>
			</div>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-danger text-white mr-2" wire:click="$emit('refreshKategori')">Batalkan</button>
			<button type="submit" class="btn btn-primary text-white">Simpan</button>
		</div>
	</div>
	</form>
</div>