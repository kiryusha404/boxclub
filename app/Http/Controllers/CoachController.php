<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class CoachController extends Controller
{
// страница тренеры
public function coach(){
    $coachs = DB::table('coach')->join('users', 'users.id', '=', 'coach.user_id')->orderBy('coach.user_id', 'asc')->get();
    return view('coach', ['coachs' => $coachs]);
}

}
