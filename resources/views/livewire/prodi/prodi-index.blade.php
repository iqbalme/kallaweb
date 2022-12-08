<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="row justify-content-between p-3">
					<div class="col-4"><h3>List Program Studi</h3></div>
					@if(!$isFormVisible)
						<div class="col-auto"><button type="button" class="btn btn-success text-white mb-2" wire:click="tambahProdi()">Tambah Program Studi</button></div>
					@endif
					<hr>
				</div>
				@if($isFormVisible)
					@if($isUpdate)
						<livewire:prodi.prodi-update />
					@else
						<livewire:prodi.prodi-create />
					@endif
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
                          <th class="text-center">Visi Misi</th>
                          <th class="text-center">Subdomain</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(count($data) === 0)
						<tr class="align-middle">
                          <td class="text-center" colspan="6">
						  Tidak ada data
						  </td>
						</tr>
					  @endif
					  @if($data->count()>1)
						@foreach($data as $prodi)
                            @if($prodi->id > 1)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->index }}
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
                            {{ substr($prodi->deskripsi_prodi,0,45) }}
                          </td>
                          <td>
                            @if(isset($prodi->visi_misi))
								<div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('storage/images/'.$prodi->visi_misi) }}"></div>
							@else
								<div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('admin/thumbnail-default.jpg') }}"></div>
							@endif
                          </td>
                          <td>
                            {{ $prodi->slug}}
                          </td>
                          <td class="text-end">
							<button type="button" class="btn btn-dark" wire:click="getProdi({{ $prodi->id }})" @if($isFormVisible) disabled @endif>Edit</button>
							<button wire:click="setProdiId({{$prodi->id}})" type="button" class="btn btn-danger text-white" data-coreui-toggle="modal" data-coreui-target="#prodiModalEdit">Hapus</button>
                          </td>
                        </tr>
                            @endif
						@endforeach
					@endif
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
    <style>
        .avatar img {
            height: 32px;
        }
    </style>
    <!--script src="{{asset('frontend/theme/js/vendor/jquery.min.js')}}"></script>
    <script>
        //$('.avatar-img').height($('.avatar-img').width()*0.7);
    </script-->
</div>
