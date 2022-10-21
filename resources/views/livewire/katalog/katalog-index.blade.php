<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<h3>Daftar Katalog</h3>
				<div class="row">
					<div class="col">
				@if($isFormVisible)
					@if($isUpdate)
						<livewire:katalog.katalog-update />
					@else
						<livewire:katalog.katalog-create />
					@endif
				@endif
				@if (!$isFormVisible)
					<button type="button" class="btn btn-success text-white mb-2 mr-2" wire:click="tambahKatalog()">Tambah Item</button>
				@endif
				<button type="button" class="btn btn-info text-white mb-2" data-coreui-toggle="modal" data-coreui-target="#voucherModal" @if($isFormVisible) disabled @endif>Tambah Voucher</button>
					</div>
				</div>
				<div class="table-responsive">
                    <table class="table border mb-0 table-striped">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
                          <th class="text-center">Nama Item</th>
                          <th class="text-center">Deskripsi</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Single Item</th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(count($data['katalog'])==0)
						<tr class="align-middle">
                          <td class="text-center" colspan="8">
						  Tidak ada data
						  </td>
						</tr>
					  @endif
					  @isset($data['katalog'])
						@foreach($data['katalog'] as $katalog)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
						  <td>
                            <div>{{ ucfirst($katalog->nama_katalog) }}</div>
							<span class="badge text-bg-warning text-white">Lihat</span>
							<a wire:click="getKatalog({{ $katalog->id }})"><span class="badge text-bg-dark">Edit</span></a>
							<a href="#" wire:click="setPostId({{$katalog->id}})" data-coreui-toggle="modal" data-coreui-target="#katalogModalEdit"><span class="badge text-bg-danger text-white">Hapus</span></a>
                          </td>
						  <td>
                            {{ ucfirst($katalog->deskripsi_katalog) }}
                          </td>
						  <td>
						  {{ number_format($katalog->harga) }}
                          </td>
						  <td>
							@if($katalog->allow_in_cart)
								<span class="badge text-bg-success text-white">Ya</span>
							@else
								<span class="badge text-bg-warning text-white">Tidak</span>
							@endif
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
	<div class="modal fade" id="katalogModalEdit" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus Item</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusKatalog({{$katalog_id}})" data-coreui-toggle="modal" data-coreui-target="#katalogModalEdit">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="modal fade" id="voucherModal" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <form wire:submit.prevent="tambahVoucher">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Tambah Voucher</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			@if($isVoucherUpdate)
				<livewire:voucher.voucher-update />
			@else
				<livewire:voucher.voucher-create />
			@endif
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="submit" class="btn btn-primary text-white" data-coreui-toggle="modal" data-coreui-target="#voucherModal">Simpan</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
</div>