<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use App\Models\Voucher;
use Livewire\WithFileUploads;
use App\Models\Event;

class EventUpdate extends Component
{
	use WithFileUploads;
	
	public $is_voucher = false;
	public $voucher_id = null;
	public $vouchers;
	public $nama_event = null;
	public $deskripsi_event = null;
	public $tanggal = null;
	public $waktu_mulai = null;
	public $waktu_akhir = null;
	public $lokasi = null;
	public $gambar = null;
	public $event_voucher = null;
	public $event_id = null;
	public $initGambar = false;
	
	protected $listeners = [
		'getEvent'
	];
	
	public function mount(){
		$this->vouchers = Voucher::where('aktif', 1)->get();
	}
	
    public function render()
    {
        return view('livewire.event.event-update');
    }
	
	public function hapusGambar(){
		if(!$this->initGambar){
			$this->gambar->delete();
		}
		$this->initGambar = false;
		$this->gambar = null;
	}
	
	public function getEvent($event){
		$this->is_voucher = false;
		$this->event_id = $event['id'];
		$this->voucher_id = $event['voucher_id'];
		$this->nama_event = $event['nama_event'];
		$this->deskripsi_event = $event['deskripsi_event'];
		$this->tanggal = $event['tanggal'];
		$this->waktu_mulai = $event['waktu_mulai'];
		$this->waktu_akhir = $event['waktu_berakhir'];
		$this->gambar = $event['gambar_event'];
		$this->lokasi = $event['lokasi'];
		if(isset($event['gambar_event'])){
			$this->initGambar = true;
		}
		if(isset($event['voucher_id'])){
			$this->is_voucher = true;
		}
	}
	
	public function update(){
		$gambar = null;
		$voucher_id = null;
		if(isset($this->voucher_id)){
			$voucher_id = $this->voucher_id;
		}
		$data = [
			'nama_event' => $this->nama_event,
			'deskripsi_event' => $this->deskripsi_event,
			'tanggal' => $this->tanggal,
			'waktu_mulai' => $this->waktu_mulai,
			'waktu_berakhir' => $this->waktu_akhir,
			'lokasi' => $this->lokasi,
			'voucher_id' => $voucher_id
		];
		if(isset($this->gambar)){
			if(!$this->initGambar){
				$gambar = $this->gambar->getFilename();
				$this->gambar->storeAs('public/images', $gambar);
				$this->gambar = null;
				$data['gambar_event'] = $gambar;
			} else {
				$data['gambar_event'] = $this->gambar;
			}
		} else {
			$data['gambar_event'] = null;
		}
		//dd($data);
		Event::find($this->event_id)->update($data);
		$this->emit('refreshEvent');
		$this->reset();
		$this->closeModal();
	}
	
	public function closeModal(){
		$this->dispatchBrowserEvent('closeModalEventUpdate');
	}
	
	public function updatedIsVoucher(){
		if($this->vouchers){
			if($this->is_voucher){
				$this->voucher_id = $this->vouchers[0]->id;
			} else {
				$this->voucher_id = null;
			}
		}
	}
}
