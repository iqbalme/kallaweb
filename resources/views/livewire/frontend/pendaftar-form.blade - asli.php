<div>
	<div style="height:100px">
	</div>
    <div style="margin-top:50px"></div>
	<div class="container">
		<div class="row justify-content-center align-items-center mb-3">
			<div class="col-12 text-center mb-1">
				<h2><strong>Registrasi Mahasiswa Baru</strong></h2>
			</div>
		</div>
		<hr>
				
		<div class="row justify-content-center">
			<div class="card col-lg-12" style="background-color:rgba(221, 221, 221, 0.37);color:#000;">
			<form wire:submit.prevent="registrasiBaru" class="probootstrap-form">
			@csrf
			<div class="card-body step" style="padding:25px 15px;">
			<!-- Langkah 1 -->
			@if($currentStep == 1)
				  <div class="row justify-content-between card-title mt-5">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<h3>Data Diri</h3>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 text-right">
								<h3>Langkah 1/3</h3>
							</div>
				  </div>
					<div style="padding:0 20px;">
						<div class="form-group mb-3">
							<div class="col-md-4">
								<label class="form-label">Nama Lengkap</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control form-control-lg" wire:model="data.nama_lengkap">
							</div>
							<div style="clear:both;"></div>
						</div>
						<div class="form-group mb-3">
							<div class="col-md-4">
								<label class="form-label">No. KTP</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control form-control-lg" wire:model="data.no_ktp" maxLength="16">
							</div>
							<div style="clear:both;"></div>
						</div>
						<div class="form-group mb-3">
							<div class="col-md-4">
								<label class="form-label">Email</label>
							</div>
							<div class="col-md-8">
								<input type="email" class="form-control form-control-lg" placeholder="name@domain.com" wire:model="data.email">
							</div>
							<div style="clear:both;"></div>
						</div>
						<div class="form-group mb-3">
							<div class="col-md-4">
								<label class="form-label">No. HP (Format: 6285xxx)</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control form-control-lg" wire:model="data.no_hp" maxLength="13">
							</div>
							<div style="clear:both;"></div>
						</div>
						<div class="form-group mb-3">
							<div class="col-md-4">
								<label class="form-label">Pilihan Program Studi</label>
							</div>
							<div class="col-md-8">
								<select class="form-control form-control-lg" wire:model="data.prodi">
								@foreach($prodis as $prodi)
									<option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
								@endforeach
								</select>
							</div>
							<div style="clear:both;"></div>
						</div>
					</div>
			@elseif($currentStep == 2)
			<!-- Langkah 2 -->
				<div class="row justify-content-between card-title mt-5">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<h3>Pembayaran</h3>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 text-right">
								<h3>Langkah 2/3</h3>
							</div>
				</div>
				<div style="padding:0 20px;">
					<div class="form-group mb-3">
						<div class="col-md-6 col-sm-6 col-xs-6 text-right">
							<h4>Registrasi Mahasiswa Baru :</h4>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h4>{{ 'Rp. '.number_format($settings['nominal_admisi']) }}</h4>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-6 text-right">
							<h4>Potongan :</h4>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h4>Rp. {{number_format($discount)}}</h4>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div height="2px">
						<div class="col-md-6 col-xs-6 col-sm-6">&nbsp;
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3" style="border-top: 1px solid black;">
						</div>
						<div style="clear:both;"></div>
					</div>
					<div class="form-group mb-5">
						<div class="col-md-6 col-sm-6 col-xs-6 text-right">
							<h4>Total :</h4>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4">
						<h4>{{ 'Rp. '.number_format($total) }}</h4>
						</div>
						<div style="clear:both;"></div>
					</div>
					@if($settings['is_voucher'])
					<div class="row mb-4 justify-content-center">
						<div class="col-md-10">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Kode Promo" wire:model="kodeVoucher">
								<button type="button" wire:click="radeemVoucher" class="btn btn-secondary">Pakai</button>
							</div>
						</div>
					</div>
					@endif
				</div>
			  @else
			  <!-- Langkah 3 -->
			  <div class="row justify-content-between card-title mt-5">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<h3>Konfirmasi</h3>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 text-right">
								<h3>Langkah 3/3</h3>
							</div>
				</div>
				<div style="padding:0 20px;">
					<div class="form-group mb-3">
						<div class="col-md-12 col-sm-12 col-xs-12 text-center">
							<h3>Berikut Informasi Data Anda:</h3>
						</div>
					</div>
				<div class="form-group mb-3">
						<div class="col-md-6 col-sm-6 col-xs-6 text-right">
							<h4>Nama Lengkap:</h4>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h4>{{ ucfirst($data['nama_lengkap']) }}</h4>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-6 text-right">
							<h4>No. KTP:</h4>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h4>{{ $data['no_ktp'] }}</h4>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-6 text-right">
							<h4>Email:</h4>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h4>{{ $data['email'] }}</h4>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-6 text-right">
							<h4>No. HP.:</h4>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<h4>{{ $data['no_hp'] }}</h4>
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
				
				<div class="row" style="color:rgba(64, 64, 64, 0.8);">
					<div class="col-md-1 col-sm-1 col-xs-1 text-right">
						<input class="form-check-input" type="checkbox" wire:model="isDataBenar">
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<div class="form-check">
						  <label class="form-check-label form-control">
							Dengan ini saya menyatakan bahwa semua informasi yang saya sertakan adalah benar.
						  </label>
						</div>
					</div>
					<div class="col-1"></div>
				</div>
				<div class="mb-5"></div>

			  @endif 
				<div style="clear:both;margin-top:15px;"></div>
				<div class="form-group">
					<div class="col-md-12 text-right" style="padding:25px;">
					@if($currentStep > 1)
						<button type="button" wire:click="previous" class="btn btn-lg btn-dark" style="margin-right:7px;">Sebelumnya</button>
						<a href="" class=""></a>
					@endif
					@if($currentStep < 3)
						<a href="" class=""></a>
						<button type="button" wire:click="next" class="btn btn-lg btn-primary">Selanjutnya</button>
					@endif
					@if($currentStep == 3)
						<button type="submit" class="btn btn-lg btn-primary">Daftar</button>
					@endif
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	<div style="clear:both;margin-bottom:25px;"></div>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<style>
		
	</style>
</div>