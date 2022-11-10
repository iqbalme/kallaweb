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