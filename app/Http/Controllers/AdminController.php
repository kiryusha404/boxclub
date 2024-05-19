<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class AdminController extends Controller
{
    //админ панель
 public function admin(){
     if(Auth()->User() && Auth()->User()->role_id == 3) {

         $users = DB::table('users')->where('role_id', '=', '1')->orderBy('surname', 'asc')->orderBy('name', 'asc')->orderBy('patronymic', 'asc')->orderBy('email', 'asc')->get();

         $moders = DB::table('users')->where('role_id', '=', '2')->orderBy('surname', 'asc')->orderBy('name', 'asc')->orderBy('patronymic', 'asc')->orderBy('email', 'asc')->get();


         return view('admin', ['users' => $users, 'moders' => $moders]);
     }
     return redirect(url('/'));
 }

//добавление роли модератора
 public function add_moder(Request $user){
     if(Auth()->User() && Auth()->User()->role_id == 3) {

         DB::table('users')->where('id', '=', $user->moder)->update(['role_id' => 2]);
     }
     return redirect(route('admin'));
 }

 //удаление роли модератора
    public function del_moder(Request $user){
        if(Auth()->User() && Auth()->User()->role_id == 3) {

            DB::table('users')->where('id', '=', $user->moder)->update(['role_id' => 1]);
        }
        return redirect(route('admin'));
    }

    // добавление тренера
    public function add_coach(Request $coach){
        if(Auth()->User() && Auth()->User()->role_id == 3){
            if(isset($coach->id)){
                $img = $coach->file('image')->store('/images/coach', 'public');
                DB::table('coach')->insert(['user_id' => $coach->id, 'text' => $coach->body, 'img' => $img]);
            }
        }
        return redirect(route('coach'));
    }

    //удаление карточки тренера
    public function del_coach(Request $coach){
        if(Auth()->User() && Auth()->User()->role_id == 3){
            DB::table('coach')->where('user_id', '=', $coach->id)->delete();
        }
        return redirect(route('coach'));
    }

    //удаление любой позиции расписаия
    public function del_schedule_admin(Request $schedule){
        if(Auth()->User() && Auth()->User()->role_id == 3){
            DB::table('schedule')->where('id', '=', $schedule->id)->delete();
        }
        return redirect()->back();
    }
}
