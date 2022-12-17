<div>
    <div class="modal fade" id="TeamModalEdit" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
			<form wire:submit.prevent="update">
			@csrf
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Tim</h5>
				<button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
				  <h6 class="card-title mb-2">Nama</h6>
				  <input type="text" class="form-control" wire:model.lazy="nama" required>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Deskripsi</h6>
					<div class="form-group" wire:ignore>
						<textarea id="editor-tim-update"></textarea>
					</div>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Jabatan</h6>
				  <input type="text" class="form-control" wire:model.lazy="jabatan" required>
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
					  <input type="text" class="form-control" wire:model.lazy="email" required>
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
						@if($initGambar)
							<img src="{{ asset('storage/images/'.$gambar) }}" alt="avatar" width="200" height="200">
						@else
							<img src="{{ $gambar->temporaryUrl() }}" alt="avatar" width="200" height="200">
						@endif
					</div>
					<div class="d-grid gap-2 d-md-block">
					  <button class="btn btn-danger text-white" type="button" wire:click="hapusGambar">Hapus</button>
					</div>
					@else
						<div class="col-lg-12">
							<div class="input-group mb-3 mt-2">
							  <input type="file" class="form-control" wire:model="gambar" required>
							  <label class="input-group-text">Upload</label>
							</div>
						</div>
					@endif
				</div>
                <hr>
                <div class="mt-3 mb-3">
                    <h6 class="card-title mb-1">Tampilkan pada</h6>
                    @foreach($data['prodis'] as $prodi)
                    <div class="form-check" wire:ignore>
                      <input class="form-check-input" type="checkbox" value="{{ $prodi['id'] }}" wire:model="team_prodis">
                      <label class="form-check-label">
                      {{ ucfirst($prodi['nama_prodi'])}}
                      </label>
                    </div>
                    @endforeach
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
	<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
	<script>
	window.addEventListener('closeModalTeamUpdate', Tim => {
		jQuery('#TeamModalEdit').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
    let cckeditor = ClassicEditor
			.create( document.querySelector( '#editor-tim-update' ), {
				ckfinder: {
					uploadUrl: "{{route('ckeditor.image-upload') .'?_token='.csrf_token()}}"
				}
			});

	cckeditor.then( editor => {
				editor.model.document.on('change:data', () => {
					@this.set('deskripsi_tim', editor.getData());
				});
                editor.setData();
			})
			.catch( error => {
				//console.error( error );
		});
        window.addEventListener('setInitialDataTim', event => {
            cckeditor.then(editor => {
                editor.setData(event.detail.deskripsi_tim);
            });
        });
	</script>
	<style>
		.ck-editor__editable_inline {
			min-height: 250px !important;
		}
	</style>
</div>
