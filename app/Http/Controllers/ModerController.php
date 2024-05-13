<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class ModerController extends Controller
{
    //просмотр заявок
    public function application(){
        if(Auth()->User() && Auth()->User()->role_id > 1){
            return view('application');
        }
        return redirect(url('/'));
    }
    //добавление новости
    public function add_news(Request $news){
        if(Auth()->User() && Auth()->User()->role_id > 1){
            $img = $news->file('image')->store('/images/news', 'public');
            DB::table('news')->insert(['name' => $news->name, 'text' => $news->body, 'img' => $img]);
        }
        return redirect(url('/'));
    }
}
