<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use App\Models\Voucher;
use Livewire\WithFileUploads;
use App\Models\Team;
use App\Models\Prodi;

class TeamCreate extends Component
{
	use WithFileUploads;

	public $nama = null;
	public $deskripsi = null;
	public $jabatan = null;
	public $facebook = null;
	public $instagram = null;
	public $linkedin = null;
	public $email = null;
	public $gambar = null;
    public $team_prodis = [];
    public $data;

    protected $rules = [
        'nama' => 'required',
        'deskripsi' => 'required',
        'jabatan' => 'required',
        'gambar' => 'required'
    ];

	public function mount(){
		$this->resetExcept('data');
        $this->data['prodis'] = Prodi::all();
	}

    public function render()
    {
        return view('livewire.team.team-create');
    }

	public function hapusGambar(){
		$this->gambar->delete();
		$this->gambar = null;
	}

	public function simpan(){
        $this->validate();
		$gambar = null;
		$media_sosial = [];
        $team_prodis = [];
		if(isset($this->gambar)){
			$gambar = $this->gambar->getFilename();
			$this->gambar->storeAs('public/images', $gambar);
			$this->gambar = null;
		}
		if(isset($this->facebook)){
			$media_sosial['facebook'] = $this->facebook;
		}
		if(isset($this->instagram)){
			$media_sosial['instagram'] = $this->instagram;
		}
		if(isset($this->linkedin)){
			$media_sosial['linkedin'] = $this->linkedin;
		}
		if(isset($this->email)){
			$media_sosial['email'] = $this->email;
		}
		$data = [
			'nama' => $this->nama,
			'deskripsi' => $this->deskripsi,
			'jabatan' => $this->jabatan,
			'media_sosial' => count($media_sosial) ? serialize($media_sosial) : null,
			'gambar' => $gambar
		];
        foreach($this->team_prodis as $team_prodi){
            $team_prodis[] = ['prodi_id' => $team_prodi];
        }
		$team = Team::create($data);
        $team->team_prodi()->createMany($team_prodis);
		$this->emit('refreshTeam');
		$this->resetExcept('data');
		$this->closeModal();
	}

	public function closeModal(){
		$this->dispatchBrowserEvent('closeModalTeam');
	}
}
