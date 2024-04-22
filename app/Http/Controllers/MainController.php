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


    // страница новости
    public function welcome()
    {
        $news = DB::table('news')->orderBy('news.date', 'DESC')->get();
        foreach ($news as $new){
            $new->comments = $this->comment($new->id, 3);
        }
        return view('welcome', ['news' => $news]);
    }
    // страница отдельной новости
    public function new($id){
        $news = DB::table('news')->where('id', $id)->get();
        foreach ($news as $new){
            $new->comments = $this->comment($new->id, null);
        }
        return view('new', ['news' => $news]);
    }
    // функция вызова комментариев
    private function comment($id, $limit){
        $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->where('comments.news_id', $id)->orderBy('comments.date', 'DESC')->limit($limit)->get();
        return $comments;
    }
    // функция добавления комментария
    public function add_comment(Request $comment){
        DB::table('comments')->insert(['news_id' => $comment->new_id, 'user_id' => auth()->user()->id, 'text' => $comment->comment]);
        return redirect()->back();
    }

    //страница расписание
    public function schedule(){
        $coach = DB::table('schedule')->select('schedule.user_id', 'users.name', 'users.surname', 'users.patronymic')->join('users', 'users.id', '=', 'schedule.user_id')->groupBy('user_id')->get();
        foreach ($coach as $schedule){
            $schedule->position = $this->schedule_position($schedule->user_id);
        }
        dd($coach);
        return view('schedule');
    }
    //функция возращающая позиции в расписании
    private function schedule_position($id){
        $position = DB::table('schedule')->join('weekday', 'weekday.id', '=', 'schedule.weekday_id')->get();
        return $position;
    }

    //страница о нас
    public function about(){
        return view('about');
    }


    //страница отзывов
    public function feedback(){
        if(Auth()->User()) {
            $id = Auth()->User()->id;
        }
        else{
            $id = 0;
        }
        $form = DB::table('feedback')->where('feedback.user_id', '=', $id)->count('feedback.id');
        $feedbacks = DB::table('feedback')->join('users', 'users.id', '=', 'feedback.user_id')->orderBy('feedback.date', 'desc')->get();
        return view('feedback', ['form' => $form, 'feedbacks' => $feedbacks]);
    }
    // функция удаления отзыва
    public function del_feedback(Request $feedback){
        $id = Auth()->User()->id;
        DB::table('feedback')->where('user_id', '=', $id)->delete();
        return redirect()->back();
    }
    // функция добавления отзыва
    public function add_feedback(Request $feedback){
        $id = Auth()->User()->id;
        DB::table('feedback')->insert(['user_id' => $id, 'text' => $feedback->feedback]);
        return redirect()->back();
    }
}
