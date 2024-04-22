<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class BoxerController extends Controller
{
// страница тренеры
    public function boxer(){
        $boxer = DB::table('boxer')->join('users', 'users.id', '=', 'boxer.user_id')->orderBy('boxer.user_id', 'asc')->get();
        return view('boxer', ['boxers' => $boxer]);
    }

}
