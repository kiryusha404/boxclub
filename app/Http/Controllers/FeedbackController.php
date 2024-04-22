<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class FeedbackController extends Controller
{
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
