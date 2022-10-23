<div>
    <div class="modal fade" id="userModalEdit" tabindex="-1" wire:ignore>
	  <div class="modal-dialog">
		<div class="modal-content">
			<form wire:submit.prevent="update">
			@csrf
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
				<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
				  <h6 class="card-title mb-2">Nama</h6>
				  <input type="text" class="form-control" wire:model.lazy="nama">
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Email</h6>
				  <input type="text" class="form-control" wire:model.lazy="email">
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Password</h6>
				  <input type="password" class="form-control" wire:model.lazy="password">
				</div>
				<div class="row mt-3">
					<div class="d-flex justify-content-between">
						<div>
						  <h6 class="card-title mb-2">Gambar Profil</h6>
						  <!--div class="small text-medium-emphasis">January - July 2022</div-->
						</div>
					</div>
					@if(isset($avatar))
					<div class="mb-1 rounded">
						<img src="{{ $avatar->temporaryUrl() }}" alt="avatar" width="200" height="200">
					</div>
					<div class="d-grid gap-2 d-md-block">
					  <button class="btn btn-danger text-white" type="button" wire:click="removeThumbnail">Hapus</button>
					</div>
					@else
						<div class="col-lg-12">
							<div class="input-group mb-3 mt-2">
							  <input type="file" class="form-control" wire:model="avatar">
							  <label class="input-group-text">Upload</label>
							</div>
							@error('avatar') <span class="error">{{ $message }}</span> @enderror
						</div>
					@endif
				</div>	
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
				<button type="submit" class="btn btn-primary text-white" data-coreui-toggle="modal" data-coreui-target="#userModalEdit">Simpan</button>
			</div>
			</form>			
          </div>
		</div>
	</div>
</div>
