<div>
    <div style="margin-top:50px"></div>
	<div class="container">
		<div class="row justify-content-center align-items-center mb-3">
			<div class="col-12 text-center mb-1">
				<h2><strong>Registrasi Mahasiswa Baru</strong></h2>
			</div>
		</div>
		<hr>
			<div class="row justify-content-center align-items-center mb-3">
				<div class="col-lg-2 col-md-4 d-none d-lg-block">
					<div class="card {{ $currentStep == 1 ? 'bg-info' : 'bg-dark' }} text-light p-3">
						<!--div class="card-header text-center"><strong>Data Diri</strong></div-->
						<h5 class="card-title text-center"><strong>Data Diri</strong></h5>
						<div class="card-body text-center">
							<i class="fa-solid fa-person-chalkboard" style="font-size:4em;"></i>
						</div>
					</div>
				</div>
				<div class="col-lg-1 d-none d-lg-block">
					<i class="fa-solid fa-arrow-right-long text-primary" style="font-size:4em;"></i>
				</div>
				<div class="col-lg-2 col-md-4 d-none d-lg-block">
					<div class="card {{ $currentStep == 2 ? 'bg-info' : 'bg-dark' }} text-light p-3">
						<!--div class="card-header text-center"><strong>Data Diri</strong></div-->
						<h5 class="card-title text-center"><strong>Pembayaran</strong></h5>
						<div class="card-body text-center">
							<i class="fa-regular fa-credit-card" style="font-size:4em;"></i>
						</div>
					</div>
				</div>
				<div class="col-lg-1 d-none d-lg-block">
					<i class="fa-solid fa-arrow-right-long text-primary" style="font-size:4em;"></i>
				</div>
				<div class="col-lg-2 col-md-4 d-none d-lg-block">
					<div class="card {{ $currentStep == 3 ? 'bg-info' : 'bg-dark' }} text-light p-3">
						<!--div class="card-header text-center"><strong>Data Diri</strong></div-->
						<h5 class="card-title text-center"><strong>Konfirmasi</strong></h5>
						<div class="card-body text-center">
							<i class="fa-solid fa-check-double" style="font-size:4em;"></i>
						</div>
					</div>
				</div>
			</div>
	
	
		<div class="row justify-content-center">
			<div class="card col-lg-8" style="background-color:rgba(221, 221, 221, 0.37);color:#000;">
			<form wire:submit.prevent="registrasiBaru">
			@csrf
			<!-- Langkah 1 -->
			@if($currentStep == 1)
			  <div class="card-body">
			  <div class="row justify-content-between card-title">
					<div class="col-5">
						<h5>Data Diri</h5>
					</div>
					<div class="col-5 text-right">
						<h5>Langkah 1/3</h5>
					</div>
			  </div>
			  <hr>
				<div class="mb-3">
				  <label class="form-label">Nama Lengkap</label>
				  <input type="text" class="form-control" wire:model="data.nama_lengkap">
				  @error('data.nama_lengkap') <span class="error">{{ $message }}</span> @enderror
				</div>
				<div class="mb-3">
				  <label class="form-label">No. KTP</label>
				  <input type="text" class="form-control" wire:model="data.no_ktp" maxLength="16">
				  @error('data.no_ktp') <span class="error">{{ $message }}</span> @enderror
				</div>
				<div class="mb-3">
				  <label class="form-label">Email</label>
				  <input type="email" class="form-control" placeholder="name@domain.com" wire:model="data.email">
				  @error('data.email') <span class="error">{{ $message }}</span> @enderror
				</div>
				<div class="mb-3">
				  <label class="form-label">No. HP (Format: 6285xxx)</label>
				  <input type="text" class="form-control" wire:model="data.no_hp" maxLength="13">
				  @error('data.no_hp') <span class="error">{{ $message }}</span> @enderror
				</div>
				<div class="mb-3">
				  <label class="form-label">Pilihan Program Studi</label>
				  <select class="form-control" wire:model="data.prodi">
					@foreach($prodis as $prodi)
						<option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
					@endforeach
				  </select>
				  @error('data.prodi') <span class="error">{{ $message }}</span> @enderror
				</div>
				
			@elseif($currentStep == 2)
			<!-- Langkah 2 -->
			  <div class="card-body">
			  <div class="row justify-content-between card-title">
					<div class="col-5">
						<h5>Metode Pembayaran</h5>
					</div>
					<div class="col-5 text-right">
						<h5>Langkah 2/3</h5>
					</div>
			  </div>
			  <hr>
				<div class="p-3 mb-5" style="background-color:#d4eaff;">
					<div class="row mt-3" style="color:rgba(64, 64, 64, 0.8);">
						<div class="col-6 text-right">
							<h6>{{ strtoupper($katalogAdmisi->nama_katalog) }}</h6>
						</div>
						<div class="col-2 text-left">
							<h6>: Rp. </h6>
						</div>
						<div class="col-3 text-right">
							<h6>{{ number_format($katalogAdmisi->harga) }}</h6>
						</div>
						<div class="col-1"></div>
					</div>
					<div class="row" style="color:#fa4f1b;">
						<div class="col-6 text-right">
							<h6>Potongan</h6>
						</div>
						<div class="col-2 text-left">
							<h6>: Rp. </h6>
						</div>
						<div class="col-3 text-right">
							<h6>{{ number_format($discount) }}</h6>
						</div>
						<div class="col-1"></div>
					</div>
					<div class="row justify-content-end">
						<div class="col-7 text-right">
							<hr>
						</div>
						<div class="col-1"></div>
					</div>
					<div class="row mb-2">
						<div class="col-6 text-right">
							<h6>Total</h6>
						</div>
						<div class="col-2 text-left">
							<h6>: Rp. </h6>
						</div>
						<div class="col-3 text-right">
							<h6>{{ number_format($total) }}</h6>
						</div>
						<div class="col-1"></div>
					</div>
					<div class="row mb-4 mt-5 justify-content-center">
						<div class="col-10">
							<div class="input-group">
							  <input type="text" class="form-control" placeholder="Kode Promo" wire:model="kodeVoucher">
							  <div class="input-group-append">
								<button type="button" wire:click="radeemVoucher" class="btn btn-secondary">Pakai</button>
							  </div>
							</div>
						</div>
					</div>
				</div>
			  @else
			  <!-- Langkah 3 -->
			  <div class="card-body">
			  <div class="row justify-content-between card-title">
					<div class="col-5">
						<h5>Konfirmasi</h5>
					</div>
					<div class="col-5 text-right">
						<h5>Langkah 3/3</h5>
					</div>
			  </div>
			  <hr>
				Berikut Informasi Data Anda:
				<div class="row mt-3" style="color:rgba(64, 64, 64, 0.8);">
					<div class="col-1"></div>
					<div class="col-5">
						<h6>Nama Lengkap</h6>
					</div>
					<div class="col-5">
						<h6>: {{ ucfirst($data['nama_lengkap']) }}</h6>
					</div>
					<div class="col-1"></div>
				</div>
				<div class="row" style="color:rgba(64, 64, 64, 0.8);">
					<div class="col-1"></div>
					<div class="col-5">
						<h6>No. KTP</h6>
					</div>
					<div class="col-5">
						<h6>: {{ $data['no_ktp'] }}</h6>
					</div>
					<div class="col-1"></div>
				</div>
				<div class="row" style="color:rgba(64, 64, 64, 0.8);">
					<div class="col-1"></div>
					<div class="col-5">
						<h6>Email</h6>
					</div>
					<div class="col-5">
						<h6>: {{ $data['email'] }}</h6>
					</div>
					<div class="col-1"></div>
				</div>
				<div class="row" style="color:rgba(64, 64, 64, 0.8);">
					<div class="col-1"></div>
					<div class="col-5">
						<h6>No. HP</h6>
					</div>
					<div class="col-5">
						<h6>: {{ $data['no_hp'] }}</h6>
					</div>
					<div class="col-1"></div>
				</div>
				<hr>
				<div class="row" style="color:rgba(64, 64, 64, 0.8);">
					<div class="col-1"></div>
					<div class="col-10">
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" wire:model="isDataBenar">
						  <label class="form-check-label form-control">
							Dengan ini saya menyatakan bahwa semua informasi yang saya sertakan adalah benar.
						  </label>
						</div>
					</div>
					<div class="col-1"></div>
				</div>
				<div class="mb-5"></div>
			  
			  
			  
			  @endif 
				<div class="mb-5"></div>
				<div class="row justify-content-between">
					@if($currentStep > 1)
						<button type="button" wire:click="previous" class="btn btn-dark">Sebelumnya</button>
						<a href="" class=""></a>
					@endif
					@if($currentStep < 3)
						<a href="" class=""></a>
						<button type="button" wire:click="next" class="btn btn-primary">Selanjutnya</button>
					@endif
					@if($currentStep == 3)
						<button type="submit" class="btn btn-primary">Daftar</button>
					@endif
				</div>
			  </div>
			  </form>
			  <!--button type="button" class="btn btn-primary" wire:click="payment">tes</button-->
			</div>
		</div>
	</div>	
</div>
