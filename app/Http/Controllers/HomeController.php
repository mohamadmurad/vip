<?php

namespace App\Http\Controllers;

use App\Models\cards;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function home(){
        return view('dashboard');
        return view('home');
    }
}
