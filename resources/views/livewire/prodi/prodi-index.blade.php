<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<h3>Nama Prodi</h3><br>
				@if($isFormVisible)
					@if($isUpdate)
						<livewire:prodi.prodi-update />
					@else
						<livewire:prodi.prodi-create />
					@endif
				@endif
				@if(!$isFormVisible)
					<button type="button" class="btn btn-success text-white mb-2" wire:click="tambahProdi()">Tambah Prodi</button>
				@endif
				<div class="table-responsive">
                    <table class="table border mb-0 table-striped table-hover">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
						  <th></th>
                          <th class="text-center">Prodi</th>
                          <th class="text-center">Deskripsi</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(count($data) === 0)
						<tr class="align-middle">
                          <td class="text-center" colspan="5">
						  Tidak ada data
						  </td>
						</tr>
					  @endif
					  @isset($data)
						@foreach($data as $prodi)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
                          <td>
                            @if(isset($prodi->thumbnail))
								<div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('storage/images/'.$prodi->thumbnail) }}"></div>
							@else
								<div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('admin/thumbnail-default.jpg') }}"></div>
							@endif
                          </td>
						  <td>
                            {{ $prodi->nama_prodi }}
                          </td>
						  <td>
                            {{ $prodi->deskripsi_prodi }}
                          </td>
                          <td>
							<button type="button" class="btn btn-dark" wire:click="getProdi({{ $prodi->id }})" @if($isFormVisible) disabled @endif>Edit</button>
							<button wire:click="setProdiId({{$prodi->id}})" type="button" class="btn btn-danger text-white" data-coreui-toggle="modal" data-coreui-target="#prodiModalEdit">Hapus</button>
                          </td>
                        </tr>
						@endforeach
					@endisset
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="prodiModalEdit" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus Prodi</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusProdi({{$prodi_id}})" data-coreui-toggle="modal" data-coreui-target="#prodiModalEdit">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>
</div>