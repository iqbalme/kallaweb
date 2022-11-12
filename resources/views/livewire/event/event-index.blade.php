<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="row justify-content-between p-3">
					<div class="col-4"><h3>List Event</h3></div>
					<div class="col-auto"><button type="button" class="btn btn-success text-white mb-2" wire:click="bukaFormEvent">Tambah Event</button></div>
					<hr>
				</div>
				<div class="table-responsive">
                    <table class="table border mb-0 table-striped">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
                          <th class="text-center" colspan="2">Nama Event</th>
                          <th class="text-center">Tanggal</th>
						  <th class="text-center">Voucher</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(!$data->count())
						<tr class="align-middle">
                          <td class="text-center" colspan="6">
						  Tidak ada data
						  </td>
						</tr>
					  @else
						@foreach($data as $event)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
						  <td>
						  @if(isset($event->gambar_event))
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('storage/images/'.$event->gambar_event) }}"></div>
						  @else
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('admin/thumbnail-default.jpg') }}"></div>
						  @endif
						  </td>
                          <td>
                            {{ substr($event->nama_event,0,49) }}
                          </td>
						  <td class="text-center">
							<span class="badge text-bg-success text-white">{{ date('d-m-Y', strtotime($event->waktu_mulai)) }}</span>
							<div class="small text-medium-emphasis">{{date('H:i', strtotime($event->waktu_mulai)).'-'.date('H:i', strtotime($event->waktu_berakhir))}}</div>
                          </td>
						  <td class="text-center">
							@if($event->voucher_id)
								<span class="badge text-bg-success text-white">Aktif</span>
							@else
								<span class="badge text-bg-danger text-white">Tidak</span>
							@endif
                          </td>
                          <td class="text-center">
							<button type="button" class="btn btn-dark" wire:click="getEvent({{ $event->id }})">Edit</button>
							<button wire:click="hapusEvent({{$event->id}})" type="button" class="btn btn-danger text-white" data-coreui-toggle="modal" data-coreui-target="#eventModalHapus">Hapus</button>
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
	<div class="modal fade" id="eventModalHapus" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus Event</h5>
			<button type="button" class="btn-close" wire:click="closeHapusForm" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" wire:click="closeHapusForm">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusEventItem()">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="modal fade" id="roleModalView" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Role</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary text-white" data-coreui-dismiss="modal">Tutup</button>
		  </div>
		</div>
	  </div>
	</div>
	@if($isUpdate)
		<livewire:event.event-update />
	@else
		<livewire:event.event-create />
	@endif
	<script>
	window.addEventListener('closeHapusEvent', event => {
		jQuery('#eventModalHapus').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
	window.addEventListener('bukaFormEvent', event => {
		jQuery('#eventModal').modal('show');
	});
	window.addEventListener('bukaFormEventEdit', event => {
		jQuery('#eventModalEdit').modal('show');
	});
	</script>
</div>