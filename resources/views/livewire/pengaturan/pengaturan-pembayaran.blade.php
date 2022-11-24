<div class="body flex-grow-1 px-3">
	<div class="container">
		<div class="card mb-4">
            <form wire:submit.prevent="saveSettings">
			@csrf			
				<div class="card-body p-5">
					<!---div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Xendit Public Key</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="text" class="form-control" wire:model.defer="settings.xendit_key_public">
							</div>
						</div>
					</div-->
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Xendit Secret Key</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="text" class="form-control" wire:model.defer="settings.xendit_key_secret">
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Xendit Callback Token</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="text" class="form-control" wire:model.defer="settings.xendit_callback_token">
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Mode Pembayaran</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <select class="form-control" wire:model="settings.mode_pembayaran">
								<option value="test">Test</option>
								<option value="live">Live</option>
							  </select>
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Xendit Invoice Callback</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="text" class="form-control" value="{{route('xendit.invoice.update')}}" disabled>
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Informasi</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <ul>
								<li>Buka link ini: <a href="https://dashboard.xendit.co/settings/developers#callbacks" target="blank">https://dashboard.xendit.co/settings/developers#callbacks</a></li>
								<li>Cari Invoices -> Invoice Terbayarkan, lalu isi <i>Xendit Invoice Callback</i> di atas pada kotak input tersebut dan atur pengaturan lainnya seperti gambar di bawah ini:<br><br><a href="{{asset('admin/xendit-invoice-callback.png')}}" target="blank"><img src="{{asset('admin/xendit-invoice-callback.png')}}" style="max-width:95%"></a></li>
								<li>Selanjutnya tekan <i>"Tes dan Simpan"</i></li>
							  </ul>
							</div>
						</div>
					</div>
					<hr>
					<div class="row mb-2">
						<button type="submit" class="btn btn-primary btn-lg">Simpan</button>
					</div>
					@if($messageSave)
						<div class="alert alert-success alert-dismissible fade show" role="alert" id="alertsave">
						  Pengaturan telah disimpan
						  <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
				</div>
            </form>
          </div>
	</div>
	<script>
	function closeAlert(){
		const alert = coreui.Alert.getOrCreateInstance('#alertsave')
		alert.close();
	}
	function refreshPage(){
		location.reload();
	}
	</script>
</div>