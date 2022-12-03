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
	public $waktu_mulai = null;
	public $waktu_akhir = null;
	public $lokasi = null;
	public $gambar = null;
	public $event_voucher = null;
	public $event_id = null;
	public $initGambar = false;
	public $is_link = false;
	public $link_daftar = null;
	public $deskripsi;

	protected $listeners = [
		'getEvent', 'setEventUpdate'
	];

    protected $rules = [
        'event_id' => 'required',
        'nama_event' => 'required',
        'deskripsi_event' => 'required',
        'waktu_mulai' => 'required',
        'waktu_akhir' => 'required',
        'gambar' => 'required',
        'link_daftar' => 'requiredIf:islink,true'
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

	public function setEventUpdate($value){
		$this->deskripsi_event = $value;
	}

	public function getEvent($event){
		//dd(gettype($event['waktu_mulai']));
		$this->is_voucher = false;
		$this->event_id = $event['id'];
		$this->voucher_id = $event['voucher_id'];
		$this->nama_event = $event['nama_event'];
		$this->deskripsi_event = $event['deskripsi_event'];
		$this->waktu_mulai = date('Y-m-d\TH:i', strtotime($event['waktu_mulai'])); //2019-08-18T00:00;
		$this->waktu_akhir = date('Y-m-d\TH:i', strtotime($event['waktu_berakhir']));
		$this->gambar = $event['gambar_event'];
		$this->lokasi = $event['lokasi'];
		$this->link_daftar = $event['link_daftar'];
		if(isset($event['link_daftar'])){
			$this->is_link = true;
		} else {
			$this->is_link = false;
		}
		if(isset($event['gambar_event'])){
			$this->initGambar = true;
		}
		if(isset($event['voucher_id'])){
			$this->is_voucher = true;
		}
		$this->dispatchBrowserEvent('setInitialEventDescription', ['deskripsi_event' => $event['deskripsi_event']]);
	}

	public function update(){
        $this->validate();
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
		$data = [
			'nama_event' => $this->nama_event,
			'deskripsi_event' => $this->deskripsi_event,
			'waktu_mulai' => $this->waktu_mulai,
			'waktu_berakhir' => $this->waktu_akhir,
			'lokasi' => $this->lokasi,
			'link_daftar' => $link_daftar,
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
		if($data['waktu_mulai'] <= $data['waktu_berakhir']){
			Event::find($this->event_id)->update($data);
			$this->emit('refreshEvent');
			$this->reset();
			$this->closeModal();
		}
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

	public function updatedIsLink($value){
		if($value){
			$this->is_voucher = false;
		}
	}
}
