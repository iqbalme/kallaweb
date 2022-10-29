<div class="body flex-grow-1 px-3">
	<div class="container">
		<div class="card mb-4">
            <form wire:submit.prevent="saveSettings">
			@csrf			
				<div class="card-body p-5">
					<div class="d-flex justify-content-between">
						<div>
						  <h4 class="card-title mb-0">Permalink</h4>
						  <div class="small text-medium-emphasis">Set link post berdasarkan judul (bukan id)</div>
						</div>
					</div>
					<div class="form-check form-switch mt-2">
						<input class="form-check-input" type="checkbox" role="switch" wire:model="settings.post_slug">
						<label class="form-check-label">SEO Friendly</label>
					</div>
					<div class="row mt-3">
						<div class="col-lg-12">
							<div>
							  <h5 class="card-title mb-0">Judul Website</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model="settings.web_title">
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-3">
						<div class="col-lg-12">
							<div>
							  <h4 class="card-title mb-0">Logo Website</h4>
							</div>
							@if(!is_null($settings['web_logo']))
								@if($isLogoInitialized)
									<div class="mt-1 mb-1 rounded">
										<img src="{{ asset('storage/images/'.$settings['web_logo']) }}" alt="Web Logo" width="300" height="auto">
									</div>
								@else
									<div class="mt-1 mb-1 rounded">
										<img src="{{ $settings['web_logo']->temporaryUrl() }}" alt="Web Logo" width="200" height="200">
									</div>
								@endif
							<div class="d-grid gap-2 d-md-block">
							  <button class="btn btn-danger text-white" type="button" wire:click="removeLogo">Hapus</button>
							</div>
							@else
								<div class="input-group mb-3 mt-2">
								  <input type="file" class="form-control" wire:model.defer="settings.web_logo">
								  <label class="input-group-text">Upload</label>
								</div>
							@endif
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-12">
							<div>
							  <h4 class="card-title mb-0">Gambar Ikon Website</h4>
							  <!--div class="small text-medium-emphasis">January - July 2022</div-->
							</div>
							@if(!is_null($settings['web_icon']))
								@if($isIconInitialized)
									<div class="mb-1 rounded">
										<img src="{{ asset('storage/images/'.$settings['web_icon']) }}" alt="Web Icon" width="200" height="auto">
									</div>
								@else
									<div class="mb-1 rounded">
										<img src="{{ $settings['web_icon']->temporaryUrl() }}" alt="Web Icon" width="200" height="200">
									</div>
								@endif
							<div class="d-grid gap-2 d-md-block">
							  <button class="btn btn-danger text-white" type="button" wire:click="removeIcon">Hapus</button>
							</div>
							@else
								<div class="input-group mb-3 mt-2">
								  <input type="file" class="form-control" wire:model.defer="settings.web_icon">
								  <label class="input-group-text">Upload</label>
								</div>
							@endif
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">Tag Website (Pisahkan dengan koma)</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.web_tag">
							</div>
						</div>
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">Keyword Website (Pisahkan dengan koma)</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.web_keywords">
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="d-flex justify-content-between">
							<div>
							  <h4 class="card-title mb-0">Deskripsi Website</h4>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="input-group mb-3 mt-2">
							  <textarea class="form-control" wire:model.defer="settings.web_description"></textarea>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="d-flex justify-content-between mb-1">
							<div>
							  <h4 class="card-title mb-0">Status Admisi</h4>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" wire:model.defer="settings.status_pendaftaran">
							  <label class="form-check-label">
							  Aktif
							  </label>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="d-flex justify-content-between">
							<div>
							  <h4 class="card-title mb-0">Penautan Katalog dan Admisi</h4>
							</div>
						</div>
						<div class="col-lg-9">
							<div class="input-group mb-3 mt-2">
							  <select class="form-control" wire:model="settings.katalog_admission_assigned">
								<option value="">Pilih Katalog</option>
								@foreach($katalogs as $katalog)
									<option value="{{ $katalog->id }}">{{ $katalog->nama_katalog }}</option>
								@endforeach
							  </select>
							</div>
						</div>
					</div>
					<!--div class="row mt-3">
						<div class="d-flex justify-content-between">
							<div>
							  <h4 class="card-title mb-0">Mode Pembayaran</h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="input-group mb-3 mt-2">
							  <select class="form-control" wire:model.defer="settings.payment_test">
								<option value="test">Test</option>
								<option value="live">Live</option>
							  </select>
							</div>
						</div>
					</div-->
					<div class="row mt-3 mb-4">
						<div class="col-lg-6">
							<div>
							  <h4 class="card-title mb-0">Xendit Public Key</h4>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.xendit_key_public">
							</div>
						</div>
						<div class="col-lg-6">
							<div>
							  <h4 class="card-title mb-0">Xendit Secret Key</h4>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.xendit_key_secret">
							</div>
						</div>
						<div class="col-lg-6">
							<div>
							  <h4 class="card-title mb-0">Xendit Callback Token</h4>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.xendit_callback_token">
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-6">
							<div>
							  <h4 class="card-title mb-0">Facebook Pixel</h4>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.fb_pixel">
							</div>
						</div>
						<div class="col-lg-6">
							<div>
							  <h4 class="card-title mb-0">Google Analytic</h4>
							</div>
						
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.google_analytics">
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