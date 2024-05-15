<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class CoachController extends Controller
{
// страница тренеры
public function coach(){
    $coachs = DB::table('coach')->join('users', 'users.id', '=', 'coach.user_id')->orderBy('coach.id', 'asc')->get();

    $users = DB::table('users')->select('users.id','users.name', 'users.surname', 'users.patronymic', 'users.email')->leftJoin('coach', 'users.id', '=', 'coach.user_id')->where('coach.user_id', '=', null)->where('users.role_id', '>', '1')->orderBy('users.surname', 'asc')->orderBy('users.name', 'asc')->orderBy('users.patronymic', 'asc')->orderBy('users.email', 'asc')->get();

    return view('coach', ['coachs' => $coachs, 'users' => $users]);
}

}
