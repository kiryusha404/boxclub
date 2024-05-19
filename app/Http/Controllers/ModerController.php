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

    //удаление новости
    public function del_news(Request $news){
        if(Auth()->User() && Auth()->User()->role_id > 1){
            DB::table('news')->where('id', '=', $news->new_id)->delete();
        }
        return redirect(url('/'));
    }

    //создание карточки боксёра
    public function add_boxer(Request $boxer){
        if(Auth()->User() && Auth()->User()->role_id > 1){
            if(isset($boxer->id)){
                $img = $boxer->file('image')->store('/images/boxer', 'public');
                DB::table('boxer')->insert(['user_id' => $boxer->id, 'text' => $boxer->body, 'img' => $img]);
            }
        }
        return redirect(route('boxer'));
    }

    //удаление карточки боксёра
    public function del_boxer(Request $boxer){
        if(Auth()->User() && Auth()->User()->role_id > 1){
            DB::table('boxer')->where('user_id', '=', $boxer->id)->delete();
        }
        return redirect(route('boxer'));
    }

    // удаление любого комментария
    public function del_comment_moder(Request $comment){
        if(Auth()->User() && Auth()->User()->role_id > 1) {
            DB::table('comments')->where('id', '=', $comment->id)->delete();
        }
        return redirect()->back();

    }

    // добавление позиции расписания
    public function add_schedule(Request $schedule){
        if(Auth()->User() && Auth()->User()->role_id > 1) {
            DB::table('schedule')->insert(['user_id' => Auth()->User()->id, 'schedule_name' => $schedule->name, 'weekday_id' => $schedule->weekday, 'time1' => $schedule->time1, 'time2' => $schedule->time2]);
        }
        return redirect()->back();
    }

    // удалеие позиции расписания
    public function del_schedule(Request $schedule){
        if(Auth()->User() && Auth()->User()->role_id > 1) {
            DB::table('schedule')->where('id', '=', $schedule->id)->delete();
        }
        return redirect()->back();
    }
}
