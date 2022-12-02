<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use App\Models\Voucher;
use Livewire\WithFileUploads;
use App\Models\Team;

class TeamUpdate extends Component
{
	use WithFileUploads;

	public $team_id = null;
	public $nama = null;
	public $deskripsi_tim = null;
	public $jabatan = null;
	public $facebook = null;
	public $instagram = null;
	public $linkedin = null;
	public $email = null;
	public $gambar = null;
	public $initGambar = true;

	protected $listeners = [
		'getTeam'
	];

    public function render()
    {
        return view('livewire.team.team-update');
    }

	public function hapusGambar(){
		if(!$this->initGambar){
			$this->gambar->delete();
		}
		$this->initGambar = false;
		$this->gambar = null;
	}

	public function getTeam($team){
		$this->team_id = $team['id'];
		$this->nama = $team['nama'];
		$this->deskripsi = $team['deskripsi'];
		$this->jabatan = $team['jabatan'];
		$this->gambar = $team['gambar'];

		$media_sosial = unserialize($team['media_sosial']);
		foreach($media_sosial as $key => $medsos){
			if($key == 'facebook'){
				$this->facebook = $medsos;
			} elseif($key == 'instagram'){
				$this->instagram = $medsos;
			} elseif($key == 'linkedin'){
				$this->linkedin = $medsos;
			} else {
				$this->email = $medsos;
			}
		}
	}

	public function update(){
		$gambar = null;
		$media_sosial = [];
		if(isset($this->gambar)){
			if($this->initGambar){
				$gambar = $this->gambar;
			} else {
				$gambar = $this->gambar->getFilename();
				$this->gambar->storeAs('public/images', $gambar);
				$this->gambar = null;
			}
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
		$team = Team::find($this->team_id);
		$team->update($data);
		$this->emit('refreshTeam');
		$this->reset();
		$this->closeModal();
	}

	public function closeModal(){
		$this->dispatchBrowserEvent('closeModalTeamUpdate');
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
