<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RoleUser;

class TestController extends Controller
{
    public function index(){
		//$user = User::find(1);
		$roles = RoleUser::find(2);
		//return view('tes', ['user' => $user, 'role' => $roles]);
		dd($roles);
	}
}
