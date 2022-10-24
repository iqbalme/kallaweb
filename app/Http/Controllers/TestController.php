<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
		return bcrypt('123');
	}
}
