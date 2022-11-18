<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Team;

class TeamList extends Component
{
	public $teams;
	
    public function mount(){
		$this->teams = Team::all();
	}
	
	public function render()
    {
        return view('livewire.frontend.team-list')
			->extends('layouts.app', ['title' => 'List Team'])
			->section('content');
    }
}
