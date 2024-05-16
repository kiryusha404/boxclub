<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class NewsController extends Controller
{
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
        $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')->select(DB::raw('*, comments.id as comment_id'))->where('comments.news_id', $id)->orderBy('comments.date', 'DESC')->limit($limit)->get();
        return $comments;
    }

    // функция добавления комментария
    public function add_comment(Request $comment){
        DB::table('comments')->insert(['news_id' => $comment->new_id, 'user_id' => auth()->user()->id, 'text' => $comment->comment]);
        return redirect()->back();
    }

    // функция удаления комментария
    public function del_comment(Request $comment){
        if(Auth()->User()){
            $com = DB::table('comments')->where('id', '=', $comment->id)->where('user_id', '=', Auth()->User()->id)->count();

            if ($com == 1){
                DB::table('comments')->where('id', '=', $comment->id)->delete();
            }
        }
        return redirect()->back();
    }
}
