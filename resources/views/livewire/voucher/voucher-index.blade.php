<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<h3>Daftar Voucher</h3>
				<div class="row">
					<div class="col">
					<button type="button" class="btn btn-info text-white mb-2" data-coreui-toggle="modal" data-coreui-target="#voucherModal" wire:click="addFormVoucher">Tambah Voucher</button>
					</div>
				</div>
				<div class="table-responsive">
                    <table class="table border mb-0 table-hover table-striped">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
                          <th class="text-center">Nama Voucher</th>
                          <th class="text-center">Deskripsi</th>
						  <th class="text-center">Kode Voucher</th>
                          <th class="text-center">Besar Diskon</th>
                          <th class="text-center">Awal Berlaku</th>
                          <th class="text-center">Akhir Berlaku</th>
                          <th class="text-center">Spesifik</th>
                          <th class="text-center">Aktif</th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(count($data['vouchers'])==0)
						<tr class="align-middle">
                          <td class="text-center" colspan="9">
						  Tidak ada data
						  </td>
						</tr>
					  @endif
					  @isset($data['vouchers'])
						@foreach($data['vouchers'] as $voucher)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
						  <td>
                            <div>{{ ucfirst($voucher->nama_voucher) }}</div>
							<a wire:click="getVoucher({{$voucher->id}})" data-coreui-toggle="modal" data-coreui-target="#voucherModalEdit"><span class="badge text-bg-dark">Edit</span></a>
							<a href="#" wire:click="setVoucherId({{$voucher->id}})" data-coreui-toggle="modal" data-coreui-target="#voucherModalHapus"><span class="badge text-bg-danger text-white">Hapus</span></a>
                          </td>
						  <td>
                            {{ ucfirst($voucher->deskripsi_voucher) }}
                          </td>
						  <td>
                            {{ $voucher->kode_voucher }}
                          </td>
						  <td class="text-right">
						  @if($voucher->tipe_diskon == 'nominal')
						  {{ 'Rp. '.number_format($voucher->nominal_diskon) }}	
						  @else
							{{ $voucher->nominal_diskon.'%' }}
						  @endif
							</td>
							<td>
							@if(isset($voucher->awal_berlaku))
								{{ $voucher->awal_berlaku }}
							@else
								-
							@endif
							</td>
							<td>
							@if(isset($voucher->akhir_berlaku))
								{{ $voucher->akhir_berlaku }}
							@else
								-
							@endif</td>
							<td>
							@if($voucher->katalog_id != '0')
								<span class="badge text-bg-success text-white">Ya</span>
							@else
								<span class="badge text-bg-warning text-white">Tidak</span>
							@endif
							</td>
							<td>
							@if($voucher->aktif)
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
	<div class="modal fade" id="voucherModalHapus" tabindex="-1" wire:ignore.self>
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
			<button type="button" class="btn btn-danger text-white" wire:click="hapusVoucher({{$voucher_id}})" data-coreui-toggle="modal" data-coreui-target="#voucherModalHapus">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>
	@if($isVoucherUpdate)
		<livewire:voucher.voucher-update :voucher_id="5" />
	@else
		<livewire:voucher.voucher-create />
	@endif
</div>