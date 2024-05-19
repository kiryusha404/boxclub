<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class ScheduleController extends Controller
{
    //страница расписание
    public function schedule(){
        $coach = DB::table('schedule')->select('schedule.user_id', 'users.name', 'users.surname', 'users.patronymic')->join('users', 'users.id', '=', 'schedule.user_id')->groupBy('user_id')->get();
        foreach ($coach as $schedule){
            $schedule->position = $this->schedule_position($schedule->user_id);
        }
        if(Auth()->User()){
            $id = Auth()->User()->id;
        }
        else{
            $id = 0;
        }
        $weekday = DB::table('weekday')->get();
        $form = DB::table('application')->where('application.user_id', '=', $id)->count('application.id');
        return view('schedule',['schedule' => $coach, 'form' => $form, 'weekday' => $weekday]);
    }

    //функция возращающая позиции в расписании
    private function schedule_position($id){
        $position = DB::table('schedule')->select(DB::raw('*, schedule.id as schedule_id'))->join('weekday', 'weekday.id', '=', 'schedule.weekday_id')->where('schedule.user_id', '=', $id)->get();
        return $position;
    }

    //функция отправления заявки
    public function add_application(Request $data){
        DB::table('application')->insert(['user_id' => Auth()->User()->id]);
        return redirect(route('application_information'));
    }

    //информация о статусе заявки
    public function application_information(){
        return view('application_information');
    }

    //фунция удаления заявки
    public function del_application(){
        DB::table('application')->where('user_id', '=', Auth()->User()->id)->delete();
        return redirect()->back();
    }
}
