<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;

class EventIndex extends Component
{
	use WithPagination;
	
	public $data;
	public $event_id = null;
	public $event = null;
	public $isUpdate = false;
	public $perhalaman = 5;
	public $cari_event = '';
	
	protected $listeners = [
		'refreshEvent'
	];
	
	public function mount(){
		
	}
	
    public function render()
    {
		$this->data['events'] = Event::orderBy('waktu_mulai', 'asc')->orderBy('waktu_berakhir', 'asc')->where('nama_event', 'LIKE', '%'.$this->cari_event.'%')->paginate($this->perhalaman);
		//dd($this->data);
		$this->emit('getEvent', $this->event);
        return view('livewire.event.event-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Event']);
    }
	
	public function refreshEvent(){
		$this->reset();
	}
	
	public function getEvent($id){
		$this->event = Event::find($id);
		$this->isUpdate = true;
		$this->bukaFormEventEdit();
	}
	
	public function hapusEvent($id){
		$this->event_id = $id;
		$this->isUpdate = false;
	}
	
	public function hapusEventItem(){
		Event::find($this->event_id)->delete();
		$this->closeHapusForm();
	}
	
	public function closeHapusForm(){
		$this->dispatchBrowserEvent('closeHapusEvent');
	}
	
	public function bukaFormEvent(){
		$this->reset();
		$this->dispatchBrowserEvent('bukaFormEvent');
	}
	
	public function bukaFormEventEdit(){
		$this->dispatchBrowserEvent('bukaFormEventEdit');
	}

}
