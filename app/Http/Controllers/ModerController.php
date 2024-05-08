<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class ModerController extends Controller
{
    public function application(){
        if(Auth()->User() && Auth()->User()->role_id > 1){
            return view('application');
        }
        return redirect(url('/'));
    }
}
