<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use App\Models\Team;
use App\Models\Prodi;

class TeamIndex extends Component
{
	public $data;
	public $team_id = null;
	public $team = null;
	public $isUpdate = false;
    public $team_prodis = [];
    public $single_team;

	protected $listeners = [
		'refreshTeam'
	];

	public function mount(){

	}

    public function render()
    {
        $teams = Team::all();
        $team_prodis = [];
		$this->data['teams'] = $teams;
        foreach($teams as $team){
            $prodi_ids = [];
            foreach($team->team_prodi as $team_id){
                $prodi_ids[] = Prodi::find($team_id->prodi_id)->nama_prodi;
            }
            $team_prodis[] = $prodi_ids;
        }
        $this->single_team['team'] = $this->team;
        $this->single_team['prodi_ids'] = $this->team_prodis;
        $this->data['nama_prodi'] = $team_prodis;
		$this->emit('getTeam', $this->single_team);
        return view('livewire.team.team-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Team']);
    }

	public function refreshTeam(){
		$this->reset();
	}

	public function getTeam($id){
		$this->team = Team::find($id);
        foreach($this->team->team_prodi as $team_prodi){
            $this->team_prodis[] = $team_prodi->prodi_id;
        }
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
		$this->reset();
		$this->dispatchBrowserEvent('bukaFormTeam');
	}

	public function bukaFormTeamEdit(){
		$this->dispatchBrowserEvent('bukaFormTeamEdit');
	}

}
