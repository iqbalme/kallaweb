<div class="body flex-grow-1 px-3">
	<div class="container">
		<div class="card mb-4">
            <form wire:submit.prevent="saveSettings">
			@csrf			
				<div class="card-body p-5">
					<div class="row mt-3">
						<div class="col-lg-3">
							<h5 class="card-title mb-3">Status Admisi</h5>
						</div>
						<div class="col-lg-6">
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" wire:model="settings.status_pendaftaran">
							  <label class="form-check-label">
							  <h6 class="card-title mb-0">&nbsp;&nbsp;Aktif</h6>
							  </label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-lg-3">
							<h5 class="card-title mb-2">Nominal</h5>
						</div>
						<div class="col-lg-4">
							<div class="input-group mb-2">
							  <span class="input-group-text">Rp.</span>
							  <input type="text" class="form-control" wire:model="settings.nominal_admisi">
							  <span class="input-group-text">.00</span>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-lg-3">
							<h5 class="card-title mb-3">Izinkan Voucher</h5>
						</div>
						<div class="col-lg-6">
							<div class="form-check mt-1">
							  <input class="form-check-input" type="checkbox" wire:model="settings.is_voucher">
							  <label class="form-check-label">
							  <h6 class="card-title mb-0">&nbsp;&nbsp;Aktif</h6>
							  </label>
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