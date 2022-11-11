<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use App\Models\Team;

class TeamIndex extends Component
{
	public $data;
	public $team_id = null;
	public $team = null;
	public $isUpdate = false;
	
	protected $listeners = [
		'refreshTeam'
	];
	
	public function mount(){
		
	}
	
    public function render()
    {
		$this->data = Team::all();
		$this->emit('getTeam', $this->team);
        return view('livewire.team.team-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Team']);
    }
	
	public function refreshTeam(){
		$this->reset();
	}
	
	public function getTeam($id){
		$this->team = Team::find($id);
		$this->isUpdate = true;
		$this->bukaFormTeamEdit();
	}
	
	public function hapusTeam($id){
		$this->team_id = $id;
		$this->isUpdate = false;
		$this->bukaFormHapus();
	}
	
	public function hapusTeamItem(){
		Team::find($this->team_id)->delete();
		$this->closeHapusForm();
	}
	
	public function closeHapusForm(){
		$this->dispatchBrowserEvent('closeHapusTeam');
	}
	
	public function bukaFormHapus(){
		$this->dispatchBrowserEvent('bukaFormHapus');
	}
	
	public function bukaFormTeam(){
		$this->dispatchBrowserEvent('bukaFormTeam');
	}
	
	public function bukaFormTeamEdit(){
		$this->dispatchBrowserEvent('bukaFormTeamEdit');
	}

}
