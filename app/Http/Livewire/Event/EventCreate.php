<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use App\Models\Voucher;
use Livewire\WithFileUploads;
use App\Models\Event;

class EventCreate extends Component
{
	use WithFileUploads;
	
	public $is_voucher = false;
	public $voucher_id = null;
	public $vouchers = null;
	public $nama_event = null;
	public $deskripsi_event = null;
	public $tanggal = null;
	public $waktu_mulai = null;
	public $waktu_akhir = null;
	public $lokasi = null;
	public $gambar = null;
	public $event_voucher = null;
	
	public function mount(){
		$this->vouchers = Voucher::where('aktif', 1)->get();
	}
	
    public function render()
    {
        return view('livewire.event.event-create');
    }
	
	public function hapusGambar(){
		$this->gambar->delete();
		$this->gambar = null;
	}
	
	public function simpan(){
		$gambar = null;
		$voucher_id = null;
		if(isset($this->gambar)){
			$gambar = $this->gambar->getFilename();
			$this->gambar->storeAs('public/images', $gambar);
			//$gambar = $this->gambar->store('public/images');
			$this->hapusGambar();
		}
		if(isset($this->voucher_id)){
			$voucher_id = $this->voucher_id;
		}
		$data = [
			'nama_event' => $this->nama_event,
			'deskripsi_event' => $this->deskripsi_event,
			'tanggal' => $this->tanggal,
			'waktu_mulai' => $this->waktu_mulai,
			'waktu_berakhir' => $this->waktu_akhir,
			'gambar_event' => $gambar,
			'lokasi' => $this->lokasi,
			'voucher_id' => $voucher_id
		];
		dd($data);
		Event::create($data);
		$this->emit('refreshEvent');
		$this->reset();
		$this->closeModal();
	}
	
	public function closeModal(){
		//$this->loading = false;
		$this->dispatchBrowserEvent('closeModalEvent');
	}
}
