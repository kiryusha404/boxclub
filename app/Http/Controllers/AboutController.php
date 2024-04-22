<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class AboutController extends Controller
{
    //страница о нас
    public function about(){
        return view('about');
    }
}
