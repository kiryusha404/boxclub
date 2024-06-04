<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class MainController extends Controller
{
// лицензионное соглашение
    public function license()
    {
        return view('license');
    }
    public function baned(){
        if(Auth()->User() && Auth()->User()->role_id == 0){
            return view('baned');
        }
        return redirect(url('/'));
    }

}
