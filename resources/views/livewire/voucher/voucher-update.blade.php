<div>
	<div class="modal fade" id="voucherModalEdit" tabindex="-1" wire:ignore>
	  <div class="modal-dialog">
		<div class="modal-content">
		<form wire:submit.prevent="update">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Edit Voucher</h5>
		<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
		  
	<div class="mb-3 row">
		<div class="col-sm-12 mb-2">
		<label class="col-form-label"><strong>Nama Voucher*</strong></label>
			<div class="col">
			  <input type="text" class="form-control" wire:model="nama_voucher" placeholder="Nama Voucher">
			</div>
		</div>
		<div class="col-sm-12">
		<label class="col-form-label"><strong>Deskripsi Voucher*</strong></label>
			<div class="col mb-2">
			  <textarea class="form-control" wire:model="deskripsi_voucher" placeholder="Deskripsi Voucher"></textarea>
			</div>
		</div>
		<div class="col-sm-6 mb-2">
			<label class="col-form-label"><strong>Tipe Diskon*</strong></label>
			<div class="col">
				<select wire:model="tipe_diskon" class="form-select">
				  <option value="persen" selected>Persentase</option>
				  <option value="nominal">Nominal</option>
				</select>
			</div>
		</div>
		<div class="col-sm-6 mb-2">
			<label class="col-form-label"><strong>Nominal Diskon*</strong></label>
			<div class="col">
				<input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==7) return false;" wire:model="nominal_diskon" class="form-control" >
			</div>
		</div>
		<div class="col-sm-7 mb-2">
		<label class="col-form-label"><strong>Kode Voucher*</strong></label>
			<div class="col">
			  <input type="text" class="form-control" wire:model="kode_voucher" maxlength="10">
			</div>
		</div>
		<div class="col-sm-5 mb-2">
		<label class="col-form-label"><strong>Random Voucher</strong></label>
			<div class="col">
			  <button type="button" class="btn btn-dark text-white w-100" wire:click="generateVoucher()">Buat</button>
			</div>
		</div>
		<div class="col-sm-6 mb-2">
			<label class="col-form-label"><strong>Berlaku Mulai</strong></label>
			<div class="col">
				<div data-coreui-locale="en-US" data-coreui-toggle="date-picker" id="datePicker1" wire:model="awal_berlaku"></div>
			</div>
		</div>
		<div class="col-sm-6 mb-2">
			<label class="col-form-label"><strong>Berlaku hingga</strong></label>
			<div class="col">
				<div data-coreui-locale="en-US" data-coreui-toggle="date-picker" id="datePicker2" wire:model="akhir_berlaku"></div>
			</div>
		</div>
		<div class="col mb-2">
			<label class="col-form-label"><strong>Katalog Khusus</strong></label>
			<div class="col">
				<select wire:model="katalog_id" class="form-select" multiple>
					@foreach($katalogs as $katalog)
					  <option value="{{$katalog->id}}">{{$katalog->nama_katalog}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="mb-3 mt-3">
			<div class="form-check" wire:ignore.self>
			  <input class="form-check-input" type="checkbox" wire:model.defer="aktif">
			  <label class="form-check-label">
			  <strong>Aktifkan</strong>
			  </label>
			</div>
		</div>
	</div>
	</div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="submit" class="btn btn-primary text-white" data-coreui-toggle="modal" data-coreui-target="#voucherModalEdit">Simpan</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
</div>