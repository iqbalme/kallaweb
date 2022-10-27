<div>
    <div style="margin-top:70px"></div>
	<div class="container">
		<div class="row justify-content-center align-items-center mb-3">
			<div class="col-12 text-center mb-1">
				<h2><strong>Registrasi Mahasiswa Baru</strong></h2>
			</div>
		</div>
		<hr>
			<div class="row justify-content-center align-items-center mb-3">
				<div class="col-2">
					<div class="card {{ $current_step == 1 ? 'bg-info' : 'bg-dark' }} text-light p-3">
						<!--div class="card-header text-center"><strong>Data Diri</strong></div-->
						<h5 class="card-title text-center"><strong>Data Diri</strong></h5>
						<div class="card-body text-center">
							<i class="fa-solid fa-person-chalkboard" style="font-size:4em;"></i>
						</div>
					</div>
				</div>
				<div class="col-1">
					<i class="fa-solid fa-arrow-right-long text-primary" style="font-size:4em;"></i>
				</div>
				<div class="col-2">
					<div class="card {{ $current_step == 2 ? 'bg-info' : 'bg-dark' }} text-light p-3">
						<!--div class="card-header text-center"><strong>Data Diri</strong></div-->
						<h5 class="card-title text-center"><strong>Pembayaran</strong></h5>
						<div class="card-body text-center">
							<i class="fa-regular fa-credit-card" style="font-size:4em;"></i>
						</div>
					</div>
				</div>
				<div class="col-1">
					<i class="fa-solid fa-arrow-right-long text-primary" style="font-size:4em;"></i>
				</div>
				<div class="col-2">
					<div class="card {{ $current_step == 3 ? 'bg-info' : 'bg-dark' }} text-light p-3">
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
			@if($current_step == 1)
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
				  <input type="text" class="form-control">
				</div>
				<div class="mb-3">
				  <label class="form-label">No. KTP</label>
				  <input type="text" class="form-control">
				</div>
				<div class="mb-3">
				  <label class="form-label">Email</label>
				  <input type="email" class="form-control" placeholder="name@domain.com">
				</div>
				<div class="mb-3">
				  <label class="form-label">No. HP</label>
				  <input type="text" class="form-control">
				</div>
				
			@elseif($current_step == 2)
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
				<div class="row mb-5">
					<div class="col-12">
						<h6>Pilih Channel Pembayaran</h6>
						<select class="form-select form-control">
						@foreach($payment_channels as $val)
						  <option value="">{{ $val['name'] }}</option>
						@endforeach
						</select>
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
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  @endif
				<div class="row justify-content-between">
					@if($current_step > 1)
						<button wire:click="previous" class="btn btn-dark">Sebelumnya</button>
						<a href="" class=""></a>
					@endif
					@if($current_step < 3)
						<a href="" class=""></a>
						<button wire:click="next" class="btn btn-primary">Selanjutnya</button>
					@endif
					@if($current_step == 3)
						<button type="submit" class="btn btn-primary">Daftar</button>
					@endif
				</div>
			  </div>
			  </form>
			</div>
		</div>
		
		<button wire:click="payment" class="btn btn-primary">Tes payment</button>
	</div>	
</div>
