<div>
    <div class="modal fade" id="eventModalEdit" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
			<form wire:submit.prevent="update">
			@csrf
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
				  <h6 class="card-title mb-2">Nama Event</h6>
				  <input type="text" class="form-control" wire:model.lazy="nama_event">
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Deskripsi Event</h6>
				  <div class="form-group" wire:ignore>
						<textarea name="deskripsi_event" id="editor">{{ $deskripsi_event }}</textarea>
					</div>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Tanggal</h6>
				  <input type="date" class="form-control" wire:model.lazy="tanggal">
				</div>
				<div class="row">
					<div class="col-6 mb-3">
					  <h6 class="card-title mb-2">Waktu Mulai</h6>
					  <input type="time" class="form-control" wire:model.lazy="waktu_mulai">
					</div>
					<div class="col-6 mb-3">
					  <h6 class="card-title mb-2">Waktu Berakhir</h6>
					  <input type="time" class="form-control" wire:model.lazy="waktu_akhir">
					</div>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Lokasi</h6>
				  <input type="text" class="form-control" wire:model.lazy="lokasi">
				</div>
				<div class="row mt-3">
					<div class="d-flex justify-content-between">
						<div>
						  <h6 class="card-title mb-2">Gambar Event</h6>
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
							  <input type="file" class="form-control" wire:model="gambar">
							  <label class="input-group-text">Upload</label>
							</div>
						</div>
					@endif
				</div>
				<div class="mt-2 mb-3">
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" wire:model="is_voucher">
					  <label class="form-check-label">
					  <strong>Berikan voucher sebagai reward</strong>
					  </label>
					</div>
				</div>
				@if($is_voucher)
					@if(isset($vouchers))
						<div class="mb-3">
							<h6 class="card-title mb-2">Pilih Voucher</h6>
							<div>
								<select class="form-control" wire:model="voucher_id">
								@foreach($vouchers as $voucher)
									<option value="{{$voucher->id}}">{{$voucher->nama_voucher}}</option>
								@endforeach
								</select>
							</div>
						</div>
					@else
						<div class="mb-3">
							<div class="alert alert-warning" role="alert">
							  Tidak ada voucher yang aktif
							</div>
							<div>
								<a href="{{route('voucher.index')}}" class="btn btn-primary">Buat Voucher</a>
							</div>
						</div>
					@endif
				@endif

            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary text-white" data-dismiss="modal" wire:click="closeModal">Tidak</button>
				<button type="submit" class="btn btn-primary text-white">Simpan</button>
			</div>
			</form>			
          </div>
		</div>
	</div>
	<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
	<script>
	window.addEventListener('closeModalEventUpdate', event => {
		jQuery('#eventModalEdit').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
	ClassicEditor
			.create( document.querySelector( '#editor' ), {
				ckfinder: {
					uploadUrl: "{{route('ckeditor.image-upload') .'?_token='.csrf_token()}}"
				}
			})
			.then( editor => {
				editor.model.document.on('change:data', () => {
					@this.set('deskripsi_event', editor.getData());
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