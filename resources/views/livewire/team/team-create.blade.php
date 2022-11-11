<div>
    <div class="modal fade" id="TeamModal" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
			<form wire:submit.prevent="simpan">
			@csrf
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Tim</h5>
				<button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
				  <h6 class="card-title mb-2">Nama</h6>
				  <input type="text" class="form-control" wire:model.lazy="nama">
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Deskripsi</h6>
				  <textarea class="form-control" wire:model.lazy="deskripsi"></textarea>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Jabatan</h6>
				  <input type="text" class="form-control" wire:model.lazy="jabatan">
				</div>
				<div class="row">
					<div class="col-6 mb-3">
					  <h6 class="card-title mb-2">Facebook</h6>
					  <input type="text" class="form-control" wire:model.lazy="facebook">
					</div>
					<div class="col-6 mb-3">
					  <h6 class="card-title mb-2">Instagram</h6>
					  <input type="text" class="form-control" wire:model.lazy="instagram">
					</div>
				</div>
				<div class="row">
					<div class="col-6 mb-3">
					  <h6 class="card-title mb-2">Linked In</h6>
					  <input type="text" class="form-control" wire:model.lazy="linkedin">
					</div>
					<div class="col-6 mb-3">
					  <h6 class="card-title mb-2">Email</h6>
					  <input type="text" class="form-control" wire:model.lazy="email">
					</div>
				</div>
				<div class="row mt-3">
					<div class="d-flex justify-content-between">
						<div>
						  <h6 class="card-title mb-2">Gambar</h6>
						  <!--div class="small text-medium-emphasis">January - July 2022</div-->
						</div>
					</div>
					@if(isset($gambar))
					<div class="mb-1 rounded">
						<img src="{{ $gambar->temporaryUrl() }}" alt="avatar" width="200" height="200">
					</div>
					<div class="d-grid gap-2 d-md-block">
					  <button class="btn btn-danger text-white" type="button" wire:click="hapusGambar">Hapus</button>
					</div>
					@else
						<div class="col-lg-12">
							<div class="input-group mb-3 mt-2">
							  <input type="file" class="form-control" wire:model="gambar">
							  <label class="input-group-text">Upload</label>
							</div>
						</div>
					@endif
				</div>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary text-white" wire:click="closeModal">Tidak</button>
				<button type="submit" class="btn btn-primary text-white">Simpan</button>
			</div>
			</form>			
          </div>
		</div>
	</div>
	<script>
	window.addEventListener('closeModalTeam', Tim => {
		jQuery('#TeamModal').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
	</script>
</div>
