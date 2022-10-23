<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<h3>List User</h3><br>
					<button type="button" class="btn btn-success text-white mb-2" wire:click="tambahUser"  data-coreui-toggle="modal" data-coreui-target="#userModal">Tambah User</button>
				<div class="table-responsive">
                    <table class="table border mb-0 table-striped">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
						  <th></th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Email</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(empty($data))
						<tr class="align-middle">
                          <td class="text-center" colspan="6">
						  Tidak ada data
						  </td>
						</tr>
					  @else
						@foreach($data as $user)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
						  <td>
						  @if(isset($user->avatar))
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('storage/images/'.$user->avatar) }}"></div>
						  @else
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('admin/user.png') }}"></div>
						  @endif
						  </td>
                          <td>
                            {{ $user->nama }}
                          </td>
						  <td>
                            {{ $user->email }}
                          </td>
                          <td>
							<button type="button" class="btn btn-dark" wire:click="getUser({{ $user->id }})"  data-coreui-toggle="modal" data-coreui-target="#userModalEdit">Edit</button>
							<button wire:click="getUser({{$user->id}})" type="button" class="btn btn-danger text-white" data-coreui-toggle="modal" data-coreui-target="#userModalHapus">Hapus</button>
                          </td>
                        </tr>
						@endforeach
					@endif
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="userModalHapus" tabindex="-1" wire:ignore.self>
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
			<button type="button" class="btn btn-danger text-white" wire:click="hapusKategori({{$user_id}})" data-coreui-toggle="modal" data-coreui-target="#userModalHapus">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>
	@if($isUpdate)
		<livewire:user.user-update />
	@else
		<livewire:user.user-create />
	@endif
</div>