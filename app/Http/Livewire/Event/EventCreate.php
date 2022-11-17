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
	public $is_link = false;
	public $link_daftar = null;
	
	protected $listeners = ['setEvent'];
	
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
	
	public function setEvent($value){
		$this->deskripsi_event = $value;
	}
	
	public function simpan(){
		$gambar = null;
		$voucher_id = null;
		$link_daftar = null;
		if($this->is_link){
			$voucher_id = null;
			$link_daftar = $this->link_daftar;
		} else {
			$link_daftar = null;
			if(isset($this->voucher_id)){
				$voucher_id = $this->voucher_id;
			}
		}
		if(isset($this->gambar)){
			$gambar = $this->gambar->getFilename();
			$this->gambar->storeAs('public/images', $gambar);
			$this->gambar = null;
		}
		$data = [
			'nama_event' => $this->nama_event,
			'deskripsi_event' => $this->deskripsi_event,
			'waktu_mulai' => $this->tanggal.' '.$this->waktu_mulai,
			'waktu_berakhir' => $this->tanggal.' '.$this->waktu_akhir,
			'gambar_event' => $gambar,
			'lokasi' => $this->lokasi,
			'link_daftar' => $link_daftar,
			'voucher_id' => $voucher_id
		];
		//dd($data);
		Event::create($data);
		$this->emit('refreshEvent');
		$this->reset();
		$this->closeModal();
	}
	
	public function closeModal(){
		$this->dispatchBrowserEvent('closeModalEvent');
	}
	
	public function updatedIsLink($value){
		if($value){
			$this->is_voucher = false;
		}
	}
}
