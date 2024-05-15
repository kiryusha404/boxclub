<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class BoxerController extends Controller
{
// страница тренеры
    public function boxer(){
        $boxer = DB::table('boxer')->join('users', 'users.id', '=', 'boxer.user_id')->orderBy('boxer.id', 'asc')->get();

        $users = DB::table('users')->select('users.id','users.name', 'users.surname', 'users.patronymic', 'users.email')->leftJoin('boxer', 'users.id', '=', 'boxer.user_id')->where('boxer.user_id', '=', null)->orderBy('users.surname', 'asc')->orderBy('users.name', 'asc')->orderBy('users.patronymic', 'asc')->orderBy('users.email', 'asc')->get();

        return view('boxer', ['boxers' => $boxer, 'users' => $users]);
    }

}
